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
/*
Route::get('/', function () {
    return view('welcome', [
        "title" => "Laravel",
        "hello" => "world!"
    ]);
});

Route::get('profile/{id}', 'SiteController@profile');

Route::get('page', 'SiteController@index');

//шаблон article/{id}
Route::get('article/{id}', 'SiteController@show')->name('articleShow');

Route::get('page/add', 'SiteController@add');

Route::post('page/add', 'SiteController@store')->name('articleStore');

//Route::delete('page/delete/{article}', function ($article){
//    $article_tmp = \App\Article::where('id', $article)->first();
//    $article_tmp->delete();
//    return redirect('/');
//})->name('articleDelete');
// либо
Route::delete('page/delete/{article}', function (\App\Article $article){
    $article->delete();
    return redirect('/');
})->name('articleDelete');

Route::get('combine', 'SiteController@combine');

Route::get('logout', 'SiteController@logout');
Route::match(['get', 'post'], 'login', 'SiteController@login')->name('userLogin');

Route::get('registrate', 'SiteController@registration');

Route::post('form', 'SiteController@store')->name('articleStore');
*/

Route::namespace('Frontend')->group(function () {
    Route::get('/', 'HomeController@index');
//    Route::get('/', 'HomeController@index')->name('home');
//    Route::group(['middleware' => ['auth']], function () {
//        Route::get('accounts', 'AccountsController@index')->name('accounts');
//        Route::get('checkout', 'CheckoutController@index')->name('checkout.index');
//        Route::post('checkout', 'CheckoutController@store')->name('checkout.store');
//        Route::get('checkout/execute', 'CheckoutController@executePayPalPayment')->name('checkout.execute');
//        Route::post('checkout/execute', 'CheckoutController@charge')->name('checkout.execute');
//        Route::get('checkout/cancel', 'CheckoutController@cancel')->name('checkout.cancel');
//        Route::get('checkout/success', 'CheckoutController@success')->name('checkout.success');
//        Route::resource('customer.address', 'CustomerAddressController');
//    });
//    Route::resource('cart', 'CartController');
//    Route::get("category/{slug}", 'CategoryController@getCategory')->name('front.category.slug');
//    Route::get("search", 'ProductController@search')->name('search.product');
//    Route::get("{product}", 'ProductController@show')->name('front.get.product');
});

Route::get('about', function()
{
    return View::make('pages.about');
});
Route::get('projects', function()
{
    return View::make('pages.projects');
});
Route::get('contact', function()
{
    return View::make('pages.contact');
});
