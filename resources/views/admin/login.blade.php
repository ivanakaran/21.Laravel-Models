@extends('layouts.master')

@section('content')
  <div class="container col-md-4 offset-md-4 py-5 mx-auto">
<form action="{{ route('admin.check') }}" method="post">
  @if(Session::get('fail'))
  <div class=" alert alert-danger">
    {{ Session::get('fail') }}
  </div>
  @endif
  @csrf
    <div class="form-group">
      <label for="login_email">Е-мејл</label>
      <input type="text" name ='login_email' class="form-control" id="login_email" value='{{ old('login_email') }}'>
      <span class="text-danger">@error('login_email') {{ $message }} @enderror</span>
    </div>

    <div class="form-group">
      <label for="password">Пасворд</label>
      <input type="password" name ='password' class="form-control" id="password">
      <span class="text-danger">@error('password') {{ $message }} @enderror</span>
    </div>
    <button type="submit" class="btn btn-block" id="addBtn">Логирај се</button>
  </form>
  </div>


  
@endsection