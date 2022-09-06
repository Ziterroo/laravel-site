@extends('admin.layouts.layout')
@section('content')
<div class="container mt-5">
<form action="{{ route('user.login-store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="user-email" class="form-label">Email</label>
        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="user-email" aria-describedby="emailHelp" value="{{ old('email') }}" name="email">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Войти в аккаунт</button>
</form>
</div>
@endsection
