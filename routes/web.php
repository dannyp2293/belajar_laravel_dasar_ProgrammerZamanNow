<?php

use Illuminate\Support\Facades\Route;

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




