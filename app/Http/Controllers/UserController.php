<?php

namespace App\Http\Controllers;

use App\Discount;
use App\Subscription;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

/**
 * @resource User
 * 
 * all related operations to specified user
 * 
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * register specified user
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $rules = array(
            'name' => 'required|min:7',
            'email' => 'required|email',
            'password' => 'required|min:3'
        );
        $messages = [
            'name.required' => 'وارد کردن نام شما ضروری است ',
            'email.required' => 'وارد کردن ایمیل شما ضروری است ',
            'password.required' => 'وارد کردن گذرواژه  شما ضروری است ',
            'name.min' => 'نام کامل ( حداقل ۷ کاراکتر) خود را وارد نمایید  ',
            'email.email' => 'ایمیل معتبر نیست',
            'password.min' => 'حداقل 3 کاراکتر لازم است'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if (! $validator->fails()) {
            try {
                User::create([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => bcrypt($request->get('password')),

                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['data' => [], 'result' => 0, 'description' => 'repetetive user', 'message' => 'Token Not Created']);
            }
            $condition = ['email' => $request->get('email')];
            $user = User::where($condition)->first();
            $api_code = str_random(60);
            $user->api_token = $api_code;
            try {
                $user->save();
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['data' => [], 'result' => 0, 'description' => 'failed to save user', 'message' => 'Token Not Created']);
            }
            return response()->json(['data' => ['user' => $user], 'result' => 1, 'description' => 'success to save user', 'message' => ['User registered successfully']]);
        }else{
            return response()->json(['data' => ['errors'=>$validator->errors()], 'result' => 0, 'description' => 'wrong input', 'message' => 'failed by Validator']);
        }
    }

    /**
     * login specified user
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $response = ['data'=>[],'result' => '0','description'=>'','message'=>''];
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:3'
        );
        $messages = [
            'email.required' => 'وارد کردن ایمیل شما ضروری است ',
            'password.required' => 'وارد کردن گذرواژه  شما ضروری است ',
            'email.email' => 'ایمیل معتبر نیست',
            'password.min' => 'حداقل 3 کاراکتر لازم است'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if (! $validator->fails()) {
            $email = Input::get('email');
            $condition=['email'=> $email];
            $user=User::where($condition)->first();
            if(is_null($user)){
                $response['message']='user not exist';
                return response()->json($response);
            }
            else{
                if(!password_verify(Input::get('password'),$user->password))
                {
                    $response['message']='password mistmatch';
                    return response()->json($response);
                }
                $api_code=str_random(60);
                $user=User::query()->find($user->id);
                $user->api_token=$api_code;
                try{
                    $user->save();
                }
                catch ( \Illuminate\Database\QueryException $e){
                    $response['message']='Token Not Created';
                    return response()->json($response);
                }
                $user = User::where($condition)->first();
                $response['data']=$user;
                $response['message']='successful Login';
                $response['result']='1';
            }
            return response()->json($response);
        }else{
            $response['data']=['errors'=>$validator->errors()];
            $response['description']='wrong input';
            $response['message']='validator error';
            return response()->json($response);
        }

    }
    /**
     * logout specified user
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {

        $user=User::where('api_token',Input::get('api_token'))->first();
        if (! is_null($user)){
            $user->api_token=null;
            $user->save();
            return response()->json(['data' => [], 'result' => 1, 'description' => 'loged out', 'message' => 'Token Not Created']);
        }
        else{
            return response()->json(['data' => [], 'result' => 0, 'description' => 'authentication failed', 'message' => 'Token Not Created']);

        }
    }

    /**
     * buy specified subscription
     * 
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function buySubscription(Request $request,$id)
    {
        $response = ['data'=>[],'result' => '1','description'=>'','message'=>'success'];
        
        $user = User::where('api_token',Input::get('api_token'))->first();
        $subscription = Subscription::query()->findOrFail($id);
        $price = $subscription->price;
        $Code = '0';
        if($request->input('code')){
            $discount = Discount::where(['code'=>$request->input('code'),'subscription_id'=>$id])->first();
            if($discount){
                if($discount->count>0){
                    $discount->count -= 1;
                    try{
                        $discount->save();
                    }
                    catch ( \Illuminate\Database\QueryException $e){
                        $response['description'] = "after finding the discount couldn't change his count and save it";
                        $response['message'] = 'failed discount';
                        return response()->json($response);
                    }
                    $Code = $request->input('code');
                    if ($discount->type == 0) {
                        $price = $subscription->price * (100-$discount->value) / 100;
                    } else {
                        $price = $subscription->price - $discount->value;
                    }
                }
                else{
                    $Code = '0';
                }
            }
            else{
                $Code = '0';
            }
        }
        $amount = $price*10000;
        $api = 'ad19e8fe996faac2f3cf7242b08972b6';
        $redirect = 'http://vestacamp.vestaak.com/subscriptions/verify';
        $result = $this->send($api,$amount,$redirect);
        $result = json_decode($result);
        if($result->status) {
            $trans = new Transaction();
            $trans->user_id=$user->id;
            $trans->transid=$result->transId;
            $trans->amount=$amount;
            $trans->type = 'subscription.' . $subscription->id . $Code;
            try{
                $trans->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                $response['description'] = "couldn't save new transaction";
                $response['message'] = 'failed transaction';
            }
            $go = "https://pay.ir/payment/gateway/$result->transId";
            return redirect($go);
        } else {
            $message="مشکلی در اتصال به درگاه پرداخت به وجود آمده است لطفا کمی بعد تلاش کنید.";
            $response['data']=['message'=>$message];
            $response['result']=0;
            $response['description']=' there was a problem';
            $response['message']='failed';
        }
        return response()->json($response);
    }

    /**
     * verify bought subscription 
     * 
     * @return $this|\Illuminate\Http\JsonResponse
     */
    public function buySubscriptionVerify()
    {
        $user = User::where('api_token',Input::get('api_token'))->first();
        $api = 'ad19e8fe996faac2f3cf7242b08972b6';
        $transId = $_POST['transId'];
        $result = $this->verify($api,$transId);
        $result = json_decode($result);
        $trans=Transaction::where('transid',$transId)->first();
        if(is_null($trans) || $trans->user_id!=$user->id || $result->status!=1 || $result->amount!=$trans->amount){
            $message="مشکلی در تراکنش شما به وجود آمده است، لطفا کمی بعد تلاش کنید.";
            return view('pay-error.pay-error')->with(['message'=>$message]);
        }
        $trans=Transaction::query()->findOrFail($trans->id);
        $trans->save();
        $pieces = explode(".", $trans->type);
        $subscription=Subscription::query()->findOrFail(intval($pieces[1]));
        $Code=$pieces[2];
        $cardnumber = $_POST['cardNumber'];
        $trans->type=$trans->type.'='.$cardnumber;
        if ($Code=='0'){
            $Code=0;
        }
        $res=$this->takeSubscription($subscription,$user,$Code);
        if(! $res['error']){
            $trans->condition=1;
            try{
                $trans->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                $message="مشکلی در تراکنش شما به وجود آمده است، لطفا کمی بعد تلاش کنید.";
                return view('pay-error.pay-error')->with(['message'=>$message]);
            }
            return  response()->json(['transId'=>$transId,'subscription'=>$subscription,'price'=>$trans->amount/10000]);
        }
        else{
            $message="تراکنش با موفقیت انجام شد، ولی مشکلی به وجود آمده است ، با بخش پشتیبانی تماس بگیرید. | "." کد پیگیری تراکنش :$transId ";
            return view('pay-error.pay-error')->with(['message'=>$message]);
        }
        
    }
    /**
     * send
     * 
     * @param $api
     * @param $amount
     * @param $redirect
     * @param null $factorNumber
     * @return mixed
     */
    function send($api, $amount, $redirect, $factorNumber=null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.ir/payment/send');
        curl_setopt($ch, CURLOPT_POSTFIELDS,"api=$api&amount=$amount&redirect=$redirect&factorNumber=$factorNumber");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    /**
     * verify
     * 
     * @param $api
     * @param $transId
     * @return mixed
     */
    public function verify($api, $transId)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.ir/payment/verify');
        curl_setopt($ch, CURLOPT_POSTFIELDS, "api=$api&transId=$transId");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    /**
     * takeSubscription
     * 
     * @param $subscription
     * @param $user
     * @param $code
     * @return $this|array
     */
    public function takeSubscription($subscription,$user,$code)
    {
        $response=[];
        $price = $subscription->price;
        if($code) {
            $discount = Discount::where(['code'=>$code,'subscription_id'=>$subscription->id])->first();
            if (is_null($discount)) {
                $response['error'] = 'not such a code in valid';
                $response['price'] = $price;
                return $response;
            }
            else
            {
                if(!is_null($discount)) {
                    if ($discount->count <= 0 or $discount->disable == 1|| $discount->subscription_id!=$subscription->id) {
                        $response['error'] = 'not available as it is expired';
                        $response['price'] = $price;
                        return $response;
                    }
                    else
                    {
                        $discount->count -= 1;
                        try{
                            $discount->save();
                        }
                        catch ( \Illuminate\Database\QueryException $e){
                            $response['error']= 'can not save discount';
                            return $response;
                        }
                        $response['error'] = 'there is no error';
                        if ($discount->type == 0) {
                            $newprice = $price * (100-$discount->value) / 100;
                        } else {
                            $newprice = $price - $discount->value;
                        }
                        $response['price'] = $newprice;

                        $subscriptions = $user->subscriptions()->get();
                        $mostRecent = 0;
                        foreach ($subscriptions as $subscription){
                            if ($subscription->pivot->expiration_date > $mostRecent) {
                                $mostRecent = $subscription->pivot->expiration_date;
                            }
                        }
                        $date = $mostRecent;
                        $date = strtotime($date);
                        try{
                            if($subscription->type == 0) {
                                $date = strtotime("+1 day", $date);
                                $user->subscriptions()->attach($subscription->id, ['paid' => $price, 'expiration_date' => date('Y-m-d H:i:s', $date)]);
                            }
                            if($subscription->type == 1) {
                                $date = strtotime("+7 day", $date);
                                $user->subscriptions()->attach($subscription->id, ['paid' => $price, 'expiration_date' => date('Y-m-d H:i:s', $date)]);
                            }
                            if($subscription->type == 2) {
                                $date = strtotime("+31 day", $date);
                                $user->subscriptions()->attach($subscription->id, ['paid' => $price, 'expiration_date' => date('Y-m-d H:i:s', $date)]);
                            }
                            if($subscription->type == 3) {
                                $date = strtotime("+365 day", $date);
                                $user->subscriptions()->attach($subscription->id, ['paid' => $price, 'expiration_date' => date('Y-m-d H:i:s', $date)]);
                            }
                        }
                        catch ( \Illuminate\Database\QueryException $e){
                            $response['error']=$e;
                            $response['price']=$price;
                            return $response;
                        }
                        return $response;
                    }
                }
                else{
                    $response['error']=1;
                    $response['price']=$price;
                    return $response;
                }
            }
        }
        else{
            $subscriptions = $user->subscriptions()->get();
            $mostRecent = 0;
            foreach ($subscriptions as $subscription){
                if ($subscription->pivot->expiration_date > $mostRecent) {
                    $mostRecent = $subscription->pivot->expiration_date;
                }
            }
            $date = $mostRecent;
            $date = strtotime($date);
            try{
                if($subscription->type == 0) {
                    $date = strtotime("+1 day", $date);
                    $user->subscriptions()->attach($subscription->id, ['paid' => $price, 'expiration_date' => date('Y-m-d H:i:s', $date)]);
                }
                if($subscription->type == 1) {
                    $date = strtotime("+7 day", $date);
                    $user->subscriptions()->attach($subscription->id, ['paid' => $price, 'expiration_date' => date('Y-m-d H:i:s', $date)]);
                }
                if($subscription->type == 2) {
                    $date = strtotime("+31 day", $date);
                    $user->subscriptions()->attach($subscription->id, ['paid' => $price, 'expiration_date' => date('Y-m-d H:i:s', $date)]);
                }
                if($subscription->type == 3) {
                    $date = strtotime("+365 day", $date);
                    $user->subscriptions()->attach($subscription->id, ['paid' => $price, 'expiration_date' => date('Y-m-d H:i:s', $date)]);
                }
            }
            catch ( \Illuminate\Database\QueryException $e){
                $response['error']=$e;
                $message="تراکنش با موفقیت انجام شد، ولی مشکلی به وجود آمده است ، با بخش پشتیبانی تماس بگیرید. | "." کد پیگیری تراکنش :$transId ";
                return view('pay-error.pay-error')->with(['message'=>$message]);
            }
            $response['error']=0;
            $response['price']=$price;
            return $response;
        }
    }
    /**
     * get specified book by subscription the user bought
     * 
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBook(Request $request,$id)
    {
        $user = User::where('api_token',$request->input('api_token'))->first();
        if($user) {
            $subscriptions = $user->subscriptions()->where('paid', '<>', 0)->get();
            if (count($subscriptions)) {
                $mostRecent = 0;
                foreach ($subscriptions as $subscription) {
                    if ($subscription->pivot->expiration_date > $mostRecent) {
                        $mostRecent = $subscription->pivot->expiration_date;
                    }
                }
                $now = date('Y-m-d H:i:s');
                if ($mostRecent > $now) {
                    $book = $user->books()->wherePivot('book_id', $id)->first();
                    if ($book) {
                        return response()->json(['data' => [], 'result' => 0, 'description' => 'user already got this book', 'message' => 'failed']);
                    } else {
                        try{
                            $user->books()->attach($id);
                        }
                        catch ( \Illuminate\Database\QueryException $e){
                            return response()->json(['data'=>['error'=>$e],'result'=>0,'description'=>'cannot save book','message'=>'failed']);
                        }
                        $books = $user->books()->get();
                        return response()->json(['data' => ['books' => $books], 'result' => 1, 'description' => 'user got this book successfully', 'message' => 'successfully']);
                    }
                } else {
                    return response()->json(['data' => ['today_date' => $now], 'result' => 0, 'description' => 'all user subscriptions expired', 'message' => 'failed by no subscription']);
                }
            } else {
                return response()->json(['data' => ['subscriptions' => $subscriptions], 'result' => 0, 'description' => 'user has no subscription to get a book ', 'message' => 'failed by no subscription']);
            }
        }else{
            return response()->json(['data' => [], 'result' => 0, 'description' => 'wrong api_token ', 'message' => 'failed']);
        }
    }

    /**
     * add new wish book
     * 
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWishBook(Request $request,$id)
    {
        $user = User::where('api_token',$request->input('api_token'))->first();
        if($user){
            $wish = $user->wishlist()->wherePivot('book_id',$id)->first();
            if($wish){
                return response()->json(['data'=>[],'result'=>0,'description'=>'user already wish this book','message'=>'failed']);
            }
            else{
                try{
                    $user->wishlist()->attach($id);
                }
                catch ( \Illuminate\Database\QueryException $e){
                    return response()->json(['data'=>['error'=>$e],'result'=>0,'description'=>'cannot wish book ','message'=>'failed']);
                }
                $wishes = $user->wishlist()->get();
                return response()->json(['data'=>['books'=>$wishes],'result'=>1,'description'=>'user got wish book successfully','message'=>'success']);
            }
        }else{
            return response()->json(['data' => [], 'result' => 0, 'description' => 'wrong api_token ', 'message' => 'failed']);
        }
    }

    /**
     * add new genre for user
     * 
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getGenre(Request $request,$id)
    {
        $user = User::where('api_token',$request->input('api_token'))->first();
        if($user){
            $genre = $user->genres()->wherePivot('genre_id',$id)->first();
            if($genre){
                return response()->json(['data'=>[],'result'=>0,'description'=>'user already get this genre','message'=>'failed']);
            }
            else{
                try{
                    $user->genres()->attach($id);
                }
                catch ( \Illuminate\Database\QueryException $e){
                    return response()->json(['data'=>['error'=>$e],'result'=>0,'description'=>'cannot save genre','message'=>'failed']);
                }
                $genres = $user->genres()->get();
                return response()->json(['data'=>['genres'=>$genres],'result'=>1,'description'=>'user got genre succesfully','message'=>'success']);
            }
        }
        else{
            return response()->json(['data' => [], 'result' => 0, 'description' => 'wrong api_token ', 'message' => 'failed']);
        }
    }
    /**
     * change password
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function ChangePass()
    {
        $user = User::where('api_token',Input::get('api_token'))->first();
        if($user) {
            $input = Input::all();
            if (!Input::has('oldpass') || !Input::has('newpass')) {
                return response()->json(['data' => [], 'result' => 0, 'description' => 'there is no information', 'message' => 'failed']);
            }

            if (!password_verify(Input::get('oldpass'), $user->password))
                return response()->json(['data' => [], 'result' => 0, 'description' => 'there is mismatch in password', 'message' => 'failed']);
            $rules = array(
                'newpass' => 'required|min:6',
            );
            $messages = [
                'newpass.required' => 'رمز عبور ضروری میباشد ',
                'newpass.min' => 'حداقل طول پسورد ۶ است ',
            ];
            $validator = Validator::make($input, $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['data' => ['errors' => $validator->errors()], 'result' => 0, 'dscription' => 'validator failed', 'message' => 'failed']);
            }
            $user->password = bcrypt(Input::get('newpass'));
            try {
                $user->save();
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['data' => ['errors' => $e], 'result' => 0, 'dscription' => 'cannot save the user', 'message' => 'failed']);
            }
            $user = User::where('api_token', Input::get('api_token'))->first();
            return response()->json(['data' => ['user' => $user], 'result' => 1, 'dscription' => 'password change successfully', 'message' => 'success']);
        }
        else{
            return response()->json(['data' => [], 'result' => 0, 'description' => 'wrong api_token ', 'message' => 'failed']);
        }
    }

    /**
     * upload photo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function UploadPhoto()
    {
        $user = User::where('api_token',Input::get('api_token'))->first();
        if($user) {
            if (Input::hasFile('image')) {
                $file = array('image' => Input::file('image'));
                $rules = array('image' => 'max:100000|mimes:jpeg,JPEG,PNG,png');
                $messages = [
                    'image.max' => 'حجم فایل بسیار زیاد است ',
                    'image.mimes' => 'فرمت فایل شما ساپورت نمیشود.',
                ];
                $validator = Validator::make($file, $rules, $messages);
                if ($validator->fails()) {
                    return response()->json(['data' => ['errors' => $validator->errors()], 'result' => 0, 'dscription' => 'validator failed', 'message' => 'failed']);
                }
                if (Input::file('image')->isValid()) {
                    $destinationPath = 'uploads/' . $user->id; // upload path
                    $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                    $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                    Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                    $user->image = $destinationPath . '/' . $fileName;
                    try {
                        $user->save();
                    } catch (\Illuminate\Database\QueryException $e) {
                        return response()->json(['data' => ['errors' => $e], 'result' => 0, 'dscription' => 'cannot save the user', 'message' => 'failed']);
                    }
                    $user = User::where('api_token',Input::get('api_token'))->first();
                    return response()->json(['data' => ['user' => $user], 'result' => 1, 'dscription' => 'the user successfully save', 'message' => 'success']);
                } else {
                    return response()->json(['data' => [], 'result' => 0, 'description' => 'the image is not valid ', 'message' => 'failed']);
                }
            } else
                return response()->json(['data' => 0, 'result' => 0, 'description' => 'no image file ', 'message' => 'failed']);
        }
        else{
            return response()->json(['data' => [], 'result' => 0, 'description' => 'wrong api_token ', 'message' => 'failed']);
        }
    }
    

}
