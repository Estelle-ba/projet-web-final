@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div style="width:25%;background-image: linear-gradient(to bottom, #8f0868 , #650da3);border-radius: 50px; margin-left: 30%; margin-right: 25%; margin-top : 10%; padding-left:5%; padding-right: 5%; padding-top: 2.5%; padding-bottom: 2.5%">
            <h1 style="color:white; font-size: 50px">Se connecter</h1>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div style="margin-top:5%">
                            <label for="email" style="color:white; font-size: 20px">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" style="width:100%;padding:10px; border-radius: 20px; border: 2px solid #d246a9; background-color: white; text-decoration: none; color:#d246a9" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div style="margin-top:5%">
                            <label for="password" style="color:white; font-size: 20px">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" style="width:100%;padding:10px; border-radius: 20px; border: 2px solid #d246a9; background-color: white; text-decoration: none; color:#d246a9" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div style="margin-top:10%;display:flex ;justify-content: space-evenly">
                                <button type="submit" style="width:45%;background-color: #d246a9 ; padding:10px; border-radius: 20px; color: white; text-decoration: none; border: 2px solid #d246a9">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
