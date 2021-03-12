@extends('layouts.master')

@section('content')
    <div class="container m-5 pb-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('cards.update', ['id' => $card->id]) }}" method="post">
            @if (Session::get('success'))
                <div class=" alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::get('fail'))
                <div class=" alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="image">URL</label>
                <input type="text" name="url" class="form-control" id="url" value="{{ $card->url }}">
            </div>
            <div class="form-group">
                <label for="image">Слика</label>
                <input type="text" class="form-control" name="image" id="image" value="{{ $card->image }}">
            </div>
            <div class="form-group">
                <label for="title">Име</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $card->title }}">
            </div>
            <div class="form-group">
                <label for="subtitle">Поднаслов</label>
                <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ $card->subtitle }}">
            </div>
            <div class="form-group">
                <label for="description">Опис</label>
                <textarea name="description" class="form-control" id="description"
                    placeholder="{{ $card->description }}">{{ $card->description }}</textarea>
            </div>

            <button type="submit">Зачувај</button>
            <button><a href="{{ route('admin.dashboard') }}">Откажи</a></button>
        </form>
    </div>
@endsection
