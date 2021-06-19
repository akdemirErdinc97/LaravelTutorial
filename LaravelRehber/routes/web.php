<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\FrontController;

//FRONT/////////////////////////////////////////////////

//Anasayfa
Route::get('/',[FrontController::class,'index'])->name('front.index');


//ADMİN/////////////////////////////////////////////////
Route::prefix('/admin')->group(function(){

  //Admin Giriş Sayfası
  Route::get('/', function () {
    if(Auth::check()){
      return redirect()->route('content.index');
    }else{
      return view('back.auth.login');
    }
  })->name('admin.login.page');

  //Admin Giriş
  Route::post('/login',[AuthController::class,'login'])->name('admin.login');
  //auth = Admin giriş yapmışşsa
  //prevent-back-history = Çıkış yapılmışsa tarayıcı geri tuşuyla girilmesin.
  Route::middleware(['auth','prevent-back-history'])->group(function (){
    //İçerikler
    Route::prefix('/content')->group(function ()
    {
      //İçerikler Tablosu
      Route::get('/',[ContentController::class,'index'])->name('content.index');
      //Oluştur
      Route::post('/create',[ContentController::class,'create'])->name('content.create');
      //Düzenle
      Route::post('/update',[ContentController::class,'update'])->name('content.update');
      //Sil
      Route::post('/delete',[ContentController::class,'delete'])->name('content.delete');
    });

    //Ayarlar
    Route::prefix('/settings')->group(function ()
    {
      //Ayarlar Sayfası
      Route::get('/', function () {
        return view('back.pages.settings.index');
      })->name('settings.index');
      //Düzenle
      Route::post('/update',[SettingsController::class,'update'])->name('settings.update');
    });
    //Admin Çıkış
    Route::get('/logout',[AuthController::class,'logout'])->name('admin.logout');
  });

});
