<?php

namespace App\Http\Controllers;

use App\Discount;
use App\Subscription;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
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
                $user=User::find($user->id);
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|int
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
        $redirect = 'http://vestacamp.vestaak.com/subscription/verify';
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
        $trans=Transaction::query()->findorfail($trans->id);
        $trans->save();
        $pieces = explode(".", $trans->type);
        $subscription=Subscription::query()->findorfail(intval($pieces[1]));
        $cardnumber = $_POST['cardNumber'];
        $trans->type=$trans->type.'='.$cardnumber;
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
                $user->subscriptions()->attach($subscription->id, ['paid' => $trans->amount, 'expiration_date' => date('Y-m-d H:i:s', $date)]);
            }
            if($subscription->type == 1) {
                $date = strtotime("+7 day", $date);
                $user->subscriptions()->attach($subscription->id, ['paid' => $trans->amount, 'expiration_date' => date('Y-m-d H:i:s', $date)]);
            }
            if($subscription->type == 2) {
                $date = strtotime("+31 day", $date);
                $user->subscriptions()->attach($subscription->id, ['paid' => $trans->amount, 'expiration_date' => date('Y-m-d H:i:s', $date)]);
            }
            if($subscription->type == 3) {
                $date = strtotime("+365 day", $date);
                $user->subscriptions()->attach($subscription->id, ['paid' => $trans->amount, 'expiration_date' => date('Y-m-d H:i:s', $date)]);
            }
        }
        catch ( \Illuminate\Database\QueryException $e){
            $response['error']=$e;
            $message="تراکنش با موفقیت انجام شد، ولی مشکلی به وجود آمده است ، با بخش پشتیبانی تماس بگیرید. | "." کد پیگیری تراکنش :$transId ";
            return view('pay-error.pay-error')->with(['message'=>$message]);
        }

        try{
            $trans->save();
        }
        catch ( \Illuminate\Database\QueryException $e){
            $message="مشکلی در تراکنش شما به وجود آمده است، لطفا کمی بعد تلاش کنید.";
            return view('pay-error.pay-error')->with(['message'=>$message]);
        }

        return  response()->json(['transId'=>$transId,'subscription'=>$subscription,'price'=>$trans->amount/10000]);
    }
    /**
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

    public function getBook(Request $request,$id)
    {
        $user = User::where('api_token',$request->input('api_token'))->first();
        $subscriptions = $user->subscriptions()->where('paid','<>',0)->get();
        if(count($subscriptions)){
            $mostRecent = 0;
            foreach ($subscriptions as $subscription){
                if ($subscription->pivot->expiration_date > $mostRecent) {
                    $mostRecent = $subscription->pivot->expiration_date;
                }
            }
            $now = date('Y-m-d H:i:s');
            if($mostRecent>$now){
                $book = $user->books()->wherePivot('book_id',$id)->first();
                if($book){
                    return response()->json(['data'=>[],'result'=>0,'description'=>'user already got this book','message'=>'failed']);
                }
                else{
                    $user->books()->attach($id);
                    $books = $user->books()->get();
                    return response()->json(['data'=>['books'=>$books],'result'=>0,'description'=>'user already got this book','message'=>'failed']);
                }
            }
            return response()->json(['data'=>['d'=>$now],'result'=>1,'description'=>'user has no subscription to get a book','message'=>'failed by no subscription']);
        }
        else{
            return response()->json(['data'=>['d'=>$subscriptions],'result'=>1,'description'=>'user has no subscription to get a book or his subscriptions expired','message'=>'failed by no subscription']);
        }
    }
}
