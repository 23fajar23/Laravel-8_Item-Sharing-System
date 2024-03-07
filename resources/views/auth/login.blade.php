@extends('layouts.app')

@section('content')
<title>Masuk</title>
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                <button type="submit" class="greenTrans1 btntran2 raise">
                                    <span>{{ __('Login') }}</span>
                                </button>

                                @if (Route::has('password.request'))
                                    <!-- <a class="btn btn-link" href="{{ route('password.request') }}"> -->
                                    <a class="btn btn-link" data-toggle="modal" data-target="#forgot">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="forgot">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="forgot"><b> Pusat Pelayanan</b> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="nama" class="col-sm-12 control-label"><b>Anda dapat menghubungi kami melalui :</b></label>
                    <label for="nama" class="col-sm-12 control-label"><b>WhatsApp :</b> </label>
                    <label for="nama" class="col-sm-12 control-label">&emsp; &emsp; - Fajar (+62 896-9713-4531)</label>
                    <label for="nama" class="col-sm-12 control-label">&emsp; &emsp; - Ilham (+62 896-9323-5492)</label>
                    <label for="nama" class="col-sm-12 control-label">&emsp; &emsp; - Harist (+62 878-6395-8048)</label>
                    <label for="nama" class="col-sm-12 control-label"><b>E - Mail :</b> </label>
                    <label for="nama" class="col-sm-12 control-label">&emsp; &emsp; - dominuslapidiscompany@gmail.com</label>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
