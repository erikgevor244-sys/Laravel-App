<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;

Route::get('/', function () { return redirect('/login'); });

Route::get('/register', function () { return view('auth.register'); })->name('register');
Route::post('/register', function (Request $request) {
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);
    Auth::login($user);
    return ($user->role === 'admin') ? redirect('/admin/dashboard') : redirect('/user/dashboard');
});

Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::post('/login', function (Request $request) {
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        return (Auth::user()->role === 'admin') ? redirect('/admin/dashboard') : redirect('/user/dashboard');
    }
    return back();
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', function () {
        $products = Product::where('user_id', Auth::id())->get();
        return view('user.dashboard', compact('products'));
    })->name('user.dashboard');

    Route::post('/products/store', function (Request $request) {
        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => Auth::id()
        ]);
        return back();
    })->name('products.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        $products = Product::with('user')->get();
        return view('admin.dashboard', compact('products'));
    })->name('admin.dashboard');

    Route::get('/admin/products/edit/{id}', function ($id) {
        $product = Product::findOrFail($id);
        return view('admin.edit_product', compact('product'));
    })->name('admin.products.edit');

    Route::post('/admin/products/update/{id}', function (Request $request, $id) {
        Product::findOrFail($id)->update($request->only('title', 'description', 'price'));
        return redirect('/admin/dashboard');
    })->name('admin.products.update');

    Route::post('/admin/products/delete/{id}', function ($id) {
        Product::findOrFail($id)->delete();
        return back();
    })->name('admin.products.delete');
});