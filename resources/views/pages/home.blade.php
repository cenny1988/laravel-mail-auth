@extends('layouts.main-layout')
@section('content')

{{-- Visualizza errori nella digitazione dei campi form precedenti --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  
{{-- Guest login/register --}}
@guest
    <h3>Login:</h3>
    <form action="{{route('login')}}" method="POST">
        @method('POST')
        @csrf

        <h3>Effettua il tuo Login:</h3>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
            <div class="col-md-6">
                <input type="email" name="email">
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
            <div class="col-md-6">
                <input type="password" name="password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary" value="LOGIN">
                    Login
                </button>
                
                <a href="{{ route('register') }}" type="submit" class="btn btn-primary" value="REGISTER">
                    Registrati
                </a>
            </div>
        </div>
    </form>
@endguest

{{-- lista videogame in componente vue --}}
<div class="my-3">
    <game-component user="{{Auth::check()}}"></game-component>  
</div>

@endsection