<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserControllerUrlGenerations;
use Illuminate\Support\Carbon;
use App\Http\Controllers\UserControllerSession;


Route::get('/', function () {
    return view('home');
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
// Route::get('/product/{id}', function($id){
//     $link = route('product.detail', ['id'=> $id]);
//     return "Link $link";
// });
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

Route::prefix("/response/type")->group(function () {
Route::get('/hello', [\App\Http\Controllers\ResponseController::class,'hello']);
Route::get('/header', [\App\Http\Controllers\ResponseController::class,'header']);
});

// Route::get('/view', [\App\Http\Controllers\ResponseController::class,'responseView']);
// Route::get('/json', [\App\Http\Controllers\ResponseController::class,'responseJson']);
// Route::get('/file', [\App\Http\Controllers\ResponseController::class,'responseFile']);
// Route::get('/download', [\App\Http\Controllers\ResponseController::class,'responseDownload']);

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
// Route::middleware('contoh')->get('/middleware/api', function () {
//     return "OK";
// });

// Route::middleware('Pbb')->get('/cek-pbb', function () {
//     return "Route PBB OK";
// });

Route::middleware('contoh')->prefix('/middleware')->group(function () {
    Route::get('/api', function () {
        return "OK";
    });

    Route::get('/group', function () {
        return "GROUP";
    });

    Route::middleware('Pbb')->get('/cek-pbb', function () {
        return "Route PBB OK";
    });
});


// Challenge Level 3 – Role-Based / Premium Access Middleware
Route::get('/admin', function () {
    return 'Halo Admin!';
})->middleware('role:admin');

Route::get('/user', function () {
    return 'Halo User!';
})->middleware('role:user');

Route::get('/premium-content', function () {
    return 'Selamat datang di konten premium!';
})->middleware('premium');

Route::get('/form', [FormController::class, 'form']);
Route::post('/form', [FormController::class, 'submitForm']);


Route::get('/profile', [UserControllerUrlGenerations::class, 'profile'])->name('profile');

Route::get('/user/{id}', [UserControllerUrlGenerations::class, 'show'])->name('user.show');

Route::get('/user/{id}/edit', [UserControllerUrlGenerations::class, 'edit'])->name('user.edit');

//session
Route::get('/set-session', function (Request $request) {
    // Simpan data ke session
    $request->session()->put('nama', 'Danny Parlin');
    $request->session()->put('role', 'Programmer');

    return "Session sudah diset!";
});

Route::get('/get-session', function (Request $request) {
    // Ambil data dari session
    $nama = $request->session()->get('nama');
    $role = $request->session()->get('role');

    return "Nama: $nama | Role: $role";
});

Route::get('/hapus-session', function (Request $request) {
    // Hapus satu nilai session
    $request->session()->forget('nama');

    return "Session nama sudah dihapus!";
});

// Controller atau Route
Route::get('/flash', function () {
    session()->flash('success', 'Data berhasil disimpan!');
    return redirect('/show-flash');
});

Route::get('/show-flash', function () {
    return view('flash');
});
Route::get('/session/create', [SessionController::class, 'createSession']);
Route::get('/session/get', [SessionController::class, 'getSession']);


Route::get('/error/sample', function(){
    throw new Exception("Sample Error");
});

