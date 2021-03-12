<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome Link-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <!-- Google Font Link -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital@0;1&display=swap" rel="stylesheet">
    <!-- Bootstrap Link -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Brainster Git Lab</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    {{-- Navigation Bar --}}
    <div class="container-fluid nav-color mx-md-auto">
        <nav class="navbar navbar-expand-md navbar-light container">
            <div class="logo text-center mx-auto mx-lg-0">
                <a href="{{ route('home') }}">
                    <img src="/images/logo_footer_black.png" alt="Logo">
                    <h6 class="font-weight-bold">Brainster</h6>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav-links navbar-nav mx-md-auto text-md-center">
                    <li class="px-md-3 py-3">
                        <a href="http://codepreneurs.co/" target="_blank" class="academyLink">Академија
                            за
                            програмирање</a>
                    </li>
                    <li class="px-md-3 py-3">
                        <a href="https://marketpreneurs.brainster.co/" target="_blank" class="academyLink">Aкадемија
                            за
                            маркетинг</a>
                    </li>

                    <li class="px-md-3 py-3">
                        <a href="https://design.brainster.co" target="_blank" class="academyLink">Академија
                            за дизајн</a>
                    </li>
                    <li class="px-md-3 py-3">
                        <a href="https://blog.brainster.co/" target="_blank" class="academyLink">Блог</a>
                    </li>

                    <li class="px-md-3 py-3">
                        <a href="" data-toggle="modal" data-target="#exampleModal">Вработи
                            наш
                            студент</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    {{-- Modal --}}
    <form method="post" action='{{ route('newsletter') }}'>

        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    @if (Session::get('status'))
                        <div class="alert alert-success">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Вработи
                            наш
                            студент</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-secondary">Внесете Ваши информации за да стапиме во контакт</p>

                        <div class="form-group">
                            <label for="email" class="col-form-label">Е-мејл</label>
                            <input type="text" class="form-control" id="email" name="email">
                            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-form-label">Телефон</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                            <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="company" class="col-form-label">Компанија</label>
                            <input type="text" class="form-control" id="company" name="company">
                            <span class="text-danger">@error('company') {{ $message }} @enderror</span>
                        </div>
    </form>
    </div>
    <div class="modal-footer modal-change">
        <button type="submit" class="btn btn-block" id="formSubmit">Испрати</button>
    </div>
    </div>
    </div>
    </div>
