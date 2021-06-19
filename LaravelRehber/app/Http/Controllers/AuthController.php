<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\User;

class AuthController extends Controller
{

    public function login(Request $request){

      try {
          $user = User::where('email', $request->email)->first();

          if (!$user || !Hash::check($request->password, $user->password))
          {
            Alert::Error('Hata', 'Giriş işlemi başarısız. Lütfen mailinizin ve şifrenizin doğruluğundan emin olunuz.');
            return redirect()->route('admin.login.page');
          }

          Auth::login($user);
          toast('Giriş Başarılı!','success')->autoClose(3000)->timerProgressBar();
          return redirect()->route('content.index');

          Alert::Error('Hata', 'Giriş işlemi başarısız. Lütfen mailinizin ve şifrenizin doğruluğundan emin olunuz.');
          return redirect()->route('admin.login.page');

      } catch (\Exception $e) {
        Alert::Error('Hata', $e->getMesssage());
        return redirect()->route('admin.login.page');
      }
    }

    public function logout(){
        Auth::logout();
        toast('Çıkış Başarılı!','success')->autoClose(3000)->timerProgressBar();
        return redirect()->route('admin.login.page');
    }

}
