<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['middleware' => 'auth'], function(){
//    //тут роуты для которых нужна авторизация
//    Route::get('/home/protected/user', function () {
//        return view('user');
//    });
//    Route::group(['middleware' => 'admin', 'auth'], function(){
//        //тут роуты только для админа + авторизация
//        Route::get('home/protected/admin', function () {
//            $users = DB::table('users')->get();
//            return view('admin', compact('users'));
//        });
//    });
//});


Route::group(['middleware' => 'auth'], function(){
    //тут роуты для которых нужна авторизация
    Route::get('/home/protected/user', 'UserController@index')->name('user');

    Route::group(['middleware' => 'admin', 'auth'], function(){
        //тут роуты только для админа + авторизация
        Route::get('/home/protected/admin', 'AdminController@index')->name('admin');
    });
});




Route::get(
    '/socialite/{provider}',
    [
        'as' => 'socialite.auth',
        function ( $provider ) {
            return \Socialite::driver( $provider )->redirect();
        }
    ]
);

Route::get( '/socialite/{provider}/callback', [
    function ( $provider ) {
        $user = \Socialite::driver( $provider )->user();
        dd( $user );
    }
] );