<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fay Kasir</title>
    <link rel="apple-touch-icon" href="{{asset('original-asset/logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('original-asset/logo.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('custom-assets/css/login.css')}}">
    <!-- MY fONT -->
    <style>
        @font-face /*perintah untuk memanggil font eksternal*/
        {
            font-family: 'Tw Cen MT'; /*memberikan nama bebas untuk font*/
            src: url('../../original-asset/Kasir/font/TCM_____\ \(1\).TTF');/*memanggil file font eksternalnya di folder nexa*/
        }

        p,label,a
        {
            font-family: 'Tw Cen MT';
        }
    </style>
{{--    <link rel="stylesheet" href="stylelogin.css">--}}

    <title>Login</title>
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-light">
    <a class="navbar-brand" href="#">
        <img src="{{asset('original-asset/Kasir/img/logo.png')}}" width="300" height="119.45" alt="" class="img-fluid">
    </a>
</nav>
<!-- akhir Nav -->
<div class="container-fluid h-600" >
    <div class="row  justify-content-center mb-4">
        <div class="col-7">

        </div>
        <div class="col-md-4 col-9 login">
            <div class="row  ">
                <div class="col text-center">
                    <img src="{{asset('original-asset/Kasir/img/lapak logo.jpeg')}}"  class="img img-fluid rounded-circle" alt="main" width="150px" >
                    <p>Login</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 input  ">
                    <form action="{{route('login.process')}}" method="post">
                        @csrf
                        <div class="form-group isi">
                            <input  type="text" class="form-control"  name="username" id="InputEmail" aria-describedby="emailHelp" placeholder="Username" required>
                        </div>
                        <div class="form-group isi">
                            <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Ingat Saya</label>
                        </div>
                        <button type="submit" class="btn tombol" style="font-weight: 400; color: white;">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row  align-items-center  d-none d-sm-block   pt-2" >
        <div class="col-12 col-lg-7 content" >
            <span>Selamat Datang di <img src="{{asset('original-asset/Kasir/img/faykasir2.png')}}" alt=""></span>
            <p>Aplikasi kasir online punya lapak Bang Fay, memudahkan mengelola bisnis <br>dari mana saja!!</p>
        </div>
    </div>
</div>







<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
