<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Content;

class ContentController extends Controller
{
    public function index(){
      $content = Content::paginate(20);
      return view("back.pages.content.index")->with("content",$content);
    }

    public function create(Request $request){
      try {

        $request->validate([
          'title'=>'required',
          'content'=>'required'
        ]);

        $data = new Content;
        $data->title = $request->title;
        $data->content = $request->content;
        $data->save();

        toast('İçerik Oluşturuldu!','success')->autoClose(3000)->timerProgressBar();
        return redirect()->route('content.index');
      } catch (\Exception $e) {
        Alert::Error('Hata', $e->getMessage());
        return redirect()->route('content.index');
      }
    }

    public function update(Request $request){
      try {

        $request->validate([
          'title'=>'required',
          'content'=>'required'
        ]);

        $data = Content::findOrFail($request->id);
        $data->title = $request->title;
        $data->content = $request->content;
        $data->save();

        toast('İçerik Düzenlendi!','success')->autoClose(3000)->timerProgressBar();
        return redirect()->route('content.index');
      } catch (\Exception $e) {
        Alert::Error('Hata', $e->getMessage());
        return redirect()->route('content.index');
      }
    }

    public function delete(Request $request){
      try {

        $data = Content::findOrFail($request->id);
        $data->delete();

        toast('İçerik Silindi!','success')->autoClose(3000)->timerProgressBar();
        return redirect()->route('content.index');
      } catch (\Exception $e) {
        Alert::Error('Hata', $e->getMessage());
        return redirect()->route('content.index');
      }
    }
}
