@extends('back.index')

@section('title')
  Yönetim Paneli | Ayarlar
@endsection

@section('style')

@endsection

@section('content')

  <div class="bg-white rounded shadow p-3">
    <h3><b>Hesap Ayarları</b></h3>
  </div>

  <div class="bg-white rounded shadow my-3 p-3">
    <form method="post" action="{{route('settings.update')}}">
      @csrf
      <div class="form-group">
        <label>Kullanıcı Adı</label>
        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required>
      </div>
        <button class="btn btn-success">Kaydet</button>
    </form>
  </div>

  <div class="bg-white rounded shadow my-3 p-3">
    <form method="post" action="{{route('settings.update')}}">
      @csrf
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" required>
      </div>
        <button class="btn btn-success">Kaydet</button>
    </form>
  </div>

  <div class="bg-white rounded shadow my-3 p-3">
    <form method="post" action="{{route('settings.update')}}">
      @csrf
      <div class="form-group">
        <label>Şifre Değiştir</label>
        <input type="password" class="form-control" placeholder="Yeni Şifre" name="password" required>
      </div>
        <button class="btn btn-success">Kaydet</button>
    </form>
  </div>

@endsection

@section('js')
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script>
  $(document).ready(function(){

    //İçerik Sil
    $(".btnDelete").click(function(){
      var id = $(this).val();
      Swal.fire({
          title: 'Uyarı',
          text: "İçeriği silmek istediğinizden emin misiniz?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Evet',
          cancelButtonText: 'Vazgeç'
      }).then((result) =>
      {
          if (result.isConfirmed)
          {
            $('#deleteForm'+id).submit();
          }
      });
    });

  });
  </script>
@endsection
