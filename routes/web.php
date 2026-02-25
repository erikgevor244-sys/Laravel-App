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
    return ($user->role === 'admin') ? redirect('/dashboard') : redirect('/dashboard');
});

Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::post('/login', function (Request $request) {
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        return (Auth::user()->role === 'admin') ? redirect('/dashboard') : redirect('/dashboard');
    }
    return back();
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user_role = auth()->user()->role;
        $products = Product::with('user')->get();
        return view('dashboard', compact('products','user_role'));
    })->name('dashboard');

    Route::middleware(['auth','role:admin'])->group(function () {
   Route::get('/product/create', function () {
            $user_role = auth()->user()->role;

        return view('products.add_product', compact('user_role'));
    })->name('add_product');

        Route::post('/product/store', function (Request $request) {
                Product::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'price' => $request->price,
                    'user_id' => Auth::id()
                ]);
                return back();
            })->name('product.store');
    });


    Route::get('/product/edit/{id}', function ($id) {
        $user_role = auth()->user()->role;
        $product = Product::findOrFail($id);

        return view('products.edit_product', compact('product','user_role'));
    })->name('product.edit');

    Route::post('product/update/{id}', function (Request $request, $id) {
        Product::findOrFail($id)->update($request->only('title', 'description', 'price'));
        return redirect('/dashboard');
    })->name('product.update');

    Route::post('/product/delete/{id}', function ($id) {
        Product::findOrFail($id)->delete();
        return back();
    })->name('product.delete');

    Route::post('/logout', function (Request $request) {
    Auth::logout();
    return redirect('/login');
    })->name('logout');
});