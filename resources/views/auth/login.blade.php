@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        @if(Session::has('error'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="text-danger">{{Session::get('error')}}</h4>
                                </div>
                            </div>
                        @endif
                    </form>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href="{{ route('login.social', ['provider' => 'facebook']) }}" class="btn btn-fb btn-outline-dark"><i class="fa fa-facebook fa-lg"></i></a>
                            <a href="{{ route('login.social', ['provider' => 'google']) }}" class="btn btn-google btn-outline-dark"><i class="fa fa-google fa-lg"></i></a>
                            <a href="{{ route('login.social', ['provider' => 'github']) }}" class="btn btn-github btn-outline-dark"><i class="fa fa-github fa-lg"></i></a>
                            <a href="{{ route('login.social', ['provider' => 'twitter']) }}" class="btn btn-twitter btn-outline-dark"><i class="fa fa-twitter fa-lg"></i></a>
                            <a href="{{ route('login.social', ['provider' => 'linkedin']) }}" class="btn btn-linkedin btn-outline-dark"><i class="fa fa-linkedin fa-lg"></i></a>
                        </div>
                        {{-- <div class="col-sm-3">
                            <a href="{{ route('login.social', ['provider' => 'facebook']) }}" class="btn btn-primary btn-block" type="button">Facebook</a>
                        </div>
                         <div class="col-sm-3">
                            <a href="{{ route('login.social', ['provider' => 'google']) }}" class="btn btn-danger btn-block" type="button">Google</a>
                        </div>
                         <div class="col-sm-3">
                            <a href="{{ route('login.social', ['provider' => 'github']) }}" class="btn btn-default btn-block" type="button">Github</a>
                        </div>
                         <div class="col-sm-3">
                            <a href="{{ route('login.social', ['provider' => 'twitter']) }}" class="btn btn-success btn-block" type="button">Twitter</a>
                        </div> --}}
                    </div>
                    {{-- <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="{{ route('login.social', ['provider' => 'linkedin']) }}" class="btn btn-warning btn-block" type="button">Linkedin</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
