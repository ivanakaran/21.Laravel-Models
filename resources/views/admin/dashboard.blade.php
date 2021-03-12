@extends('layouts.master')

@section('content')

    <div class="container py-5">
        @if (Session::get('deleted'))
            <div class=" alert alert-success">
                {{ Session::get('deleted') }}
            </div>
        @endif
        <div class="worko-tabs">

            <input class="state" type="radio" title="tab-one" name="tabs-state" id="tab-one" checked />
            <input class="state" type="radio" title="tab-two" name="tabs-state" id="tab-two" />
            <input class="state" type="radio" title="tab-three" name="tabs-state" id="tab-three" />

            <div class="tabs flex-tabs">
                <label for="tab-one" id="tab-one-label" class="tab"><a href="">Додај</a></label>
                <label for="tab-two" id="tab-two-label" class="tab">Измени</label>
                <label for="tab-three" id="tab-three-label" class="tab"><a href="{{ route('admin.logout') }}">Одјави
                        се</a></label>


                <div id="tab-one-panel" class="panel active">
                    @include('admin.addproduct')
                </div>

                <div id="tab-two-panel" class="panel">
                    <div class="row m-5">
                        @foreach ($cards as $card)

                            <div class="col-md-6 mb-3 card-holder">

                                <div class="card card-height">
                                    <img src="{{ $card->image }}" class="card-img-top" alt="">
                                    <div class="card-body text-center">
                                        <h6 class="card-class text-center">{{ $card->title }}</h6>
                                        <h5 class="card-title">{{ $card->subtitle }}</h5>
                                        <p class="card-text text-height">{{ $card->description }}</p>

                                        <a href="{{ $card->url }}" target=_blank
                                            class="btn
                                                                                                      btn-danger float-right">Дознај
                                            повеќе</a>
                                    </div>

                                    <div class="card-footer text-center">
                                        <a href="{{ route('cards.edit', ['id' => $card->id]) }}"
                                            class="btn btn-primary btn-sm float-left" target="_blank" style="color:white">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm float-right" id="right" style="color:white"
                                            data-toggle="modal" data-target="#exampleModal2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Избриши</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body border-bottom">
                                    <p>Дали сте сигурни дека сакате да го избришете проектот?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('admin.dashboard') }}" type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Откажи</a>
                                    <a href="{{ route('destroy', ['id' => $card->id]) }}" type="button"
                                        class="btn btn-warning">Избриши</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


@endsection
