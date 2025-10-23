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
});

Route::get('/product/{product}/items/{item}', function($productId,$itemId){
return "Product $productId, Item $itemId";   //Route Parameter
});


Route::get('/categories/{id}', function($categoryId){
    return "Category $categoryId";

})->where('id', '[0-9]+');


