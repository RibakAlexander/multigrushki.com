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

Route::get('/', 'MainController@index');

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
