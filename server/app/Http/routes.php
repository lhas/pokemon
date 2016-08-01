<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return Redirect::to('/panel');
});

Route::post('/api/subscriber', function(Request $request) {

    $subscriber = new \App\Subscriber($request->input('user'));

    if(!empty($subscriber->email)) {

        try {
            $subscriber->save();
        } catch (Exception $e) {

            if($e->errorInfo[0] == '23000') {
                return Response::json('user_already_subscribed', 500);
            } else {
                return Response::json('unknown_error', 500);
            }
        }
    }

    return Response::json($subscriber);
});