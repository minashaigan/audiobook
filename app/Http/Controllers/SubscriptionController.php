<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Support\Facades\Config;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::all();
        foreach ($subscriptions as $subscription){
            $subscription["type_name"] = value(Config::get('subscriptionstypes.type.'.$subscription->type));
            $subscription["users_number"] = count($subscription->users()->get());
        }
        return response()->json(['data'=>['subscriptions'=>$subscriptions],'result'=>1,'description'=>'list of subscriptions with number of users that buy that subscription','message'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscription = Subscription::query()->findOrFail($id);
        $subscription["type_name"] = value(Config::get('subscriptionstypes.type.'.$subscription->type));
        $subscription["users_number"] = count($subscription->users()->get());
    }

}
