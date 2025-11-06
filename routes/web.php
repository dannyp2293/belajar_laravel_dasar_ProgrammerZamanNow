<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Carbon;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/pzn', function(){
    return"Hello Programmer Zaman Now ";
});

Route::redirect('/youtube','/pzn');

Route::fallback(function () {
return "404 by Programmer Zaman Now";
});

Route::view('/hello', 'hello', ['name' => 'Danny']);

Route::get('/hello-again', function(){
    return view('hello', ['name' => 'Danny']);
});

Route::get('/hello-world', function(){
    return view('hello.world', ['name' => 'Danny']);
});

Route::get('/product/{id}', function($productId){
return "Product $productId";
})->name('product.detail');

Route::get('/product/{product}/items/{item}', function($productId,$itemId){
return "Product $productId, Item $itemId";   //Route Parameter
})->name('product.item.detail');


Route::get('/categories/{id}', function($categoryId){
    return "Category $categoryId";

})->where('id', '[0-9]+')->name('category.detail');

Route::get('/users/{id?}', function ($userId = '404'){
return  "User $userId";
})->name('user.detail');

Route::get('/conflict/danny', function(){
    return "Conflict Danny Parlin Butar Butar";
});

Route::get('/conflict/{name}', function ($name){
return "Conflict $name";
});
Route::get('/product/{id}', function($id){
    $link = route('product(product.detail', ['id'=> $id]);
    return "Link $link";
});
Route::get('/product-redirect/{id}', function($id){
    return redirect()->route('product.detail', ['id' => $id]);
});
Route::get('/controller/hello/request', [\App\Http\Controllers\HelloController::class,'request']);
Route::get('/controller/hello/{name}', [\App\Http\Controllers\HelloController::class,'hello']);



Route::controller(InputController::class)->group(function () {
    Route::get('/input/hello', 'hello');
    Route::post('/input/hello', 'hello');
    Route::post('/input/hello/first', 'helloFirstName');
    Route::post('/input/hello/input', 'helloInput');
    Route::post('/input/hello/array', 'helloArray');
    Route::post('/input/type', 'inputType');
    Route::post('/input/filter/only', 'filterOnly');
    Route::post('/input/filter/except', 'filterExcept');
    Route::post('/input/filter/merge', 'filterMerge');
});

Route::post('/file/upload', [\App\Http\Controllers\FileController::class,'upload']);

Route::get('/response/hello', [\App\Http\Controllers\ResponseController::class,'response']);
Route::get('/response/header', [\App\Http\Controllers\ResponseController::class,'header']);

Route::get('/cookie/set', [\App\Http\Controllers\CokiesCOntroller::class,'createCookie']);
Route::get('/cookie/get', [\App\Http\Controllers\CokiesCOntroller::class,'getCookie']);
Route::get('/cookie/clear', [\App\Http\Controllers\CokiesCOntroller::class,'clearCookie']);

Route::get('/redirect/from',[RedirectController::class, 'redirectFrom']);
Route::get('/redirect/to',[RedirectController::class, 'redirectTo']);
Route::get('/redirect/name', [RedirectController::class,'redirectName']);
Route::get('/redirect/name/{name}', [RedirectController::class,'redirectHello'])
->name('redirect-hello');

Route::get('/redirect/action', [RedirectController::class,'redirectAction']);
Route::get('/redirect/away', [RedirectController::class,'redirectAway']);


//midlleware
Route::middleware('contoh')->get('/middleware/api', function () {
    return "OK";
});

Route::middleware('Pbb')->get('/cek-pbb', function () {
    return "Route PBB OK";
});



Route::get('/movie', function () {
    return "Selamat nonton film dewasa!";
})->middleware('cekUmur');

Route::get('/underage', function () {
    return "Maaf, kamu belum cukup umur.";
});


