<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\User;

class SettingsController extends Controller
{
    //Güncelle
    public function update(Request $request){
      try {

        if(isset($request->name)){//Kullanıcı Adı ise

          $request->validate([
            'name'=>'required'
          ]);

          $user = User::findOrFail(Auth::user()->id);
          $user->name = $request->name;
          $user->save();

        }elseif(isset($request->email)){//Email ise

          $request->validate([
            'email'=>'required | email'
          ]);

          $user = User::findOrFail(Auth::user()->id);
          $user->email = $request->email;
          $user->save();

        }else{//Şifre ise

          $request->validate([
            'password'=>'required | min:6'
          ]);

          $user = User::findOrFail(Auth::user()->id);
          $user->password = Hash::make($request->password);
          $user->save();

        }

        toast('Güncelleme Başarılı!','success')->autoClose(3000)->timerProgressBar();
        return redirect()->route('settings.index');
      } catch (\Exception $e) {
        Alert::Error('Hata', $e->getMessage());
        return redirect()->route('settings.index');
      }
    }
}
