@extends('layouts.master')

@section('content')
    <div class="showcase">
        <div class="text-center text-white">
            <h1>Brainster.xyz Labs</h1>
            <p>Проекти од академиите на Brainster</p>
        </div>
    </div>

    <div class="row m-5">
        @foreach ($cards as $card)

            <div class="col-lg-4 col-md-6 mb-3 card-holder">
                <div class="card card-height">
                    <img src="{{ $card->image }}" class="card-img-top" alt="">
                    <div class="card-body text-center">
                        <h6 class="card-class text-center">{{ $card->title }}</h6>
                        <h5 class="card-title">{{ $card->subtitle }}</h5>
                        <p class="card-text text-height">{{ $card->description }}</p>

                        <a href="{{ $card->url }}" target=_blank class="btn
                  btn-danger float-right">Дознај повеќе</a>

                    </div>
                </div>

            </div>

        @endforeach
    </div>
@endsection
