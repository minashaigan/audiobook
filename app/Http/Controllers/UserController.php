<?php

namespace App\Http\Controllers;

use App\Discount;
use App\Subscription;
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
        $response = ['data'=>[],'result' => '0','description'=>'','message'=>''];
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
                        $Code = $request->input('code');
                        $response['result']=1;
                        $response['description']=' it will buy with discount ';
                        $response['message']='success';
                    }
                    catch ( \Illuminate\Database\QueryException $e){
                        $response['result']=0;
                        $response['description']='can not save discount after changing its count so it will buy with all price';
                        $response['message']='failed';
                    }
                    if ($discount->type == 0) {
                        $price = $subscription->price * (100-$discount->value) / 100;
                    } else {
                        $price = $subscription->price - $discount->value;
                    }
                }
                else{
                    $response['result']=0;
                    $response['description']='there is no more code to use so it will buy with all price';
                    $response['message']='failed';
                }
            }
            else{
                $response['result']=0;
                $response['description']='wrong code inserted so it will buy with all price';
                $response['message']='failed';
            }
        }
        else{
            $response['result']=1;
            $response['description']=' it will buy with all price ';
            $response['message']='success';
        }
        $amount = $price*10000;
        $api = 'ad19e8fe996faac2f3cf7242b08972b6';
        $redirect = 'http://vestacamp.vestaak.com/course/verify';
        $result = $this->send($api,$amount,$redirect);
        $result = json_decode($result);
        if($result->status) {
            $trans=new Transactions();
            $trans->user_id=$user->id;
            $trans->transid=$result->transId;
            $trans->amount=$amount;
//            $trans->type = 'subscription.' . $subscription->id . $Code;
            $trans->type = $subscription->id ;

            try{
                $trans->save();
            }
            catch ( \Illuminate\Database\QueryException $e){
                return 0;
            }
            $go = "https://pay.ir/payment/gateway/$result->transId";
            $user->subscriptions()->attach($subscription->id, ['paid' => 0]);
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

    public function buySubscriptionVerify(Request $request)
    {
        $user = User::where('api_token',Input::get('api_token'))->first();
        $response = ['data'=>[],'result' => '0','description'=>'','message'=>''];
        $api = 'ad19e8fe996faac2f3cf7242b08972b6';
        $transId = $request->input('transId');
        $result = $this->verify($api,$transId);
        $result = json_decode($result);
        $trans=Transactions::where('transid',$transId)->first();
        if(is_null($trans) || $trans->user_id!=$user->id || $result->status!=1 || $result->amount!=$trans->amount){
            $response['message']="مشکلی در تراکنش شما به وجود آمده است، لطفا کمی بعد تلاش کنید.";
            return response()->json($response);
        }
        else{
            $user->subscriptions()->save($trans->type, ['paid' => 1]);
            $response['result']=1;
            $response['message']="subscription take successfully";
            return response()->json($response);
        }
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
        //verify
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.ir/payment/verify');
        curl_setopt($ch, CURLOPT_POSTFIELDS, "api=$api&transId=$transId");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
        //verify
    }

    public function getBook(Request $request,$id)
    {
        $user = User::where('api_token',$request->input('api_token'))->first();
        $subscriptions = $user->subscriptions()->where('paid',1)->get();
        if(count($subscriptions)){
            foreach ($subscriptions as $subscription){
                echo $subscription->pivot->created_at,"\n";
            }
            return date("Y-m-d h:m:s");
        }
        else{
            return response()->json(['data'=>[],'result'=>1,'description'=>'user has no subscription to get a book','message'=>'failed by no subscription']);
        }
    }
}
