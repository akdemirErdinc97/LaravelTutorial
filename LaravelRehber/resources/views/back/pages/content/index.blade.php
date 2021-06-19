@extends('back.index')

@section('title')
  Yönetim Paneli | İçerikler
@endsection

@section('style')
  .page-item.active > span{
    background-color:#da3f30 !important;
  }
@endsection

@section('content')

  <div class="bg-white d-flex justify-content-between rounded shadow p-3">
    <h3><b>İçerikler ({{$content->count()}})</b></h3>
    <button class="btn btn-success" data-toggle="modal" data-target="#createModal">
      <i class="fas fa-plus"></i>
    </button>
  </div>

  <!-- Create Modal -->
  <div id="createModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title" id="exampleModalLabel">İçerik Oluştur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('content.create')}}">
            @csrf
            <div class="form-group">
              <label>Başlık</label>
              <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
              <label>İçerik</label>
              <textarea name="content" class="summernote form-control"></textarea>
            </div>

            <div class="form-group">
              <button class="btn btn-success">Oluştur</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="table-responsive my-3">
    <table class="table table-bordered table-hover text-center">
      <thead class="thead-dark">
        <tr>
          <th style="width:10%;">Başlık</th>
          <th style="width:60%;">İçerik</th>
          <th style="width:10%;">Oluşturulma Tarihi</th>
          <th style="width:15%;">İşlemler</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($content as $key => $cont)
          <tr>
            <td>{{$cont->title}}</td>
            <td>
              <div class="text-justify p-3 bg-white rounded" style="height:80px; overflow: hidden; overflow-y: auto;">
                {!! $cont->content !!}
              </div>
            </td>
            <td>{{$cont->created_at}}</td>
            <td>
              <div class="btn-group-vertical w-75">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModal{{$cont->id}}"><i class="fas fa-pen"></i></button>
                <button value="{{$cont->id}}" type="button" class="btnDelete btn btn-danger"><i class="fas fa-trash"></i></button>
              </div>
            </td>
          </tr>

          <!-- update Modal -->
          <div id="updateModal{{$cont->id}}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header ">
                  <h5 class="modal-title" id="exampleModalLabel">İçerik Düzenle</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="{{route('content.update')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$cont->id}}">
                    <div class="form-group">
                      <label>Başlık</label>
                      <input type="text" name="title" class="form-control" value="{{$cont->title}}">
                    </div>

                    <div class="form-group">
                      <label>İçerik</label>
                      <textarea name="content" class="summernote form-control">{!!$cont->content!!}</textarea>
                    </div>

                    <div class="form-group">
                      <button class="btn btn-success">Kaydet</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

          <form id="deleteForm{{$cont->id}}" method="post" action="{{route('content.delete')}}">
            @csrf
            <input type="hidden" name="id" value="{{$cont->id}}">
          </form>
        @endforeach
      </tbody>
    </table>
    <!-- SAYFALAMA -->
    {{$content->links("pagination::bootstrap-4")}}
  </div>


@endsection

@section('js')
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
  $(document).ready(function(){

    $(document).ready(function() {
      $('.summernote').summernote();
    });

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
