@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Vérification du code OTP</h2>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf
        <div class="form-group">
            <label for="otp">Code OTP</label>
            <input id="otp" type="text" name="otp" class="form-control" required autofocus>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Vérifier</button>
    </form>
</div>
@endsection
