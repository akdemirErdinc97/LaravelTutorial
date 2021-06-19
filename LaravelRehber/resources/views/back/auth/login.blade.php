<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Yönetim Paneli Giriş</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-danger">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                                <div class="p-3 p-sm-5 mt-3">
                                    <div class="text-center mb-3">
                                        <h1 class="h4 text-gray-900"><b></b>Yönetim Paneli</h1>
                                        <small>Yetkiniz yoksa buraya erişemezsiniz.</small>
                                    </div>
                                    <form class="p-2" action="{{route('admin.login')}}" method="POST" autocomplete="off">
                                      @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="email"
                                                placeholder="E-mail" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                              placeholder="Şifre" required>
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-user btn-block">
                                            Giriş Yap
                                        </button>
                                    </form>
                                </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.js')}}"></script>

    @include('sweetalert::alert')

</body>

<script>
$(document).ready(function(){

});
</script>
</html>
