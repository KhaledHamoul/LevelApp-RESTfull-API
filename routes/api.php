<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use App\User;
use App\Pref;
use App\Application;
use App\Setting;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// login route
Route::get('signin/{username}/{password}',function($username , $password){
    $exist = false;
    $users = User::all();
    foreach( $users as $user ) {
        if ($user->name == $username){
            if (Hash::check( $password , $user->getAuthPassword() )) return response()->json(['data'=> 'OK', 'id'=> $user->id ],200);
            else return response()->json(['data'=> 'PASS_ERR'],200);
        } 
    }
     return response()->json(['data'=> 'USER_NOT_FOUND'],200); 
});

// get user preferences 
Route::get('prefs/{id}',function($id){
    $prefs = Pref::where('userID',$id)->get();
    return response()->json(['data'=> 'OK','prefs'=> $prefs],200); 
});

// set user preference
Route::get('prefs/{id}/{pref}', function( $id , $pref ){
    $pref = Pref::firstOrCreate(['pref' => $pref , 'userID'=> $id , 'suggest'=>'']);
    return response()->json(['data'=>'OK'],200);
});

// get user blocked apps
Route::get('apps/{id}',function($id){
    $apps = Application::where('userID',$id)->get();
    return response()->json(['data'=> 'OK','apps'=> $apps],200); 
});

// set blocked app
Route::get('apps/{id}/{appID}', function( $id , $appID ){
    $pref = Application::firstOrCreate(['appID' => $appID , 'userID'=> $id ]);
    return response()->json(['data'=>'OK'],200);
});

// get user settings
Route::get('settings/{id}',function($id){
    $settings = Setting::where('userID',$id)->get();
    return response()->json(['data'=> 'OK','settings'=> $settings],200); 
});

// set user settings
Route::get('settings/{id}/{begin}/{end}', function( $id , $begin , $end ){
    $pref = Setting::where('userID',$id)->update(['begin' => $begin , 'end'=> $end ]);
    return response()->json(['data'=>'OK'],200);
});

// update user settings
Route::get('settings_set/{id}/{begin}/{end}', function( $id , $begin , $end ){
    $pref = Setting::create(['begin' => $begin , 'end'=> $end , 'userID'=> $id]);
    return response()->json(['data'=>'OK'],200);
});
