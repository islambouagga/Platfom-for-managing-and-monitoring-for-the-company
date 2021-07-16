@extends('layouts.app')

@section('content')
    <div class="card-body">
        <section>
            <div class="container col-md-6" style="background-image: url('{{ asset('img/imgAcceuil/1.svg')}}');
                background-size: cover;">
                <div class="row">
                    <div class="col login-sec">
                        <h2 class="text-center">Register Now</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col">
                                    <label for="email" class="text-uppercase">{{ __('Nom') }}</label>
                                    <input id="nomUtilis" type="text" class="form-control @error('nomUtilis') is-invalid @enderror" name="nomUtilis" value="{{ old('nomUtilis') }}" required autocomplete="nomUtilis" autofocus>
                                    @error('nomUtilis')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="prenomUtilis" class="text-uppercase">{{ __('Prenom') }}</label>
                                    <input id="prenomUtilis" type="text" class="form-control @error('prenomUtilis') is-invalid @enderror" name="prenomUtilis" value="{{ old('prenomUtilis') }}" required autocomplete="prenomUtilis" autofocus>
                                    @error('prenomUtilis')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="dateNUtilis" class="text-uppercase">{{ __('Date de Naissance') }}</label>
                                    <input id="dateNUtilis" type="date" class="form-control @error('dateNUtilis') is-invalid @enderror" name="dateNUtilis" value="{{ old('dateNUtilis') }}" required autocomplete="dateNUtilis">
                                    @error('dateNUtilis')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="adressUtilis" class="text-uppercase">{{ __('Adresse') }}</label>
                                    <input id="adressUtilis" type="text" class="form-control @error('adressUtilis') is-invalid @enderror" name="adressUtilis" value="{{ old('adressUtilis') }}" required autocomplete="adressUtilis" autofocus>
                                    @error('adressUtilis')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div></div>

                            <div class="row">
                                <div class="form-group col">
                                    <label for="tel" class="text-uppercase">{{ __('Telephone') }}</label>
                                    <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus>
                                    @error('tel')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="email" class="text-uppercase">{{ __('E-Mail') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label for="password" class="text-uppercase">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="password-confirm" class="text-uppercase">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <input type="hidden" name="usertable_type" value="AgentTC">

                            <div class="form-check">
                                <button type="submit" class="btn btn-login float-right">{{ __('Register') }}</button>
                            </div>

                        </form>
{{--                        <div class="copy-text">Created with <i class="fa fa-heart"></i> BY R&A</div>--}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
