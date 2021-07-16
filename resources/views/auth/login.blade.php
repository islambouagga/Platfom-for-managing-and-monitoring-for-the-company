@extends('layouts.app')

@section('content')

    <div class="card-body" >

            <section>
                <div class="container col-md-4" style="background-image: url('{{ asset('img/imgAcceuil/1.svg')}}');
                    background-size: cover;">
                    <div class="row">
                        <div class="col login-sec">
                            <h2 class="text-center">Login Now</h2>
                            <form class="login-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="text-uppercase">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-uppercase">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="remember">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <small>{{ __('Remember Me') }}</small>
                                    </label>
                                    <button type="submit" class="btn btn-login float-right">{{ __('Login') }}</button>
                                </div>
                            </form>
                            <div class="copy-text">


                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif


                            </div>
                        </div>

{{--                        <div class="col-md-8 banner-sec">--}}
{{--                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
{{--                                <ol class="carousel-indicators">--}}
{{--                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
{{--                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
{{--                                </ol>--}}
{{--                                <div class="carousel-inner" role="listbox">--}}
{{--                                    <div class="carousel-item active">--}}
{{--                                        <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">--}}
{{--                                        <div class="carousel-caption d-none d-md-block">--}}
{{--                                            <div class="banner-text">--}}
{{--                                                <h2>This is first slide</h2>--}}
{{--                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="carousel-item">--}}
{{--                                        <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">--}}
{{--                                        <div class="carousel-caption d-none d-md-block">--}}
{{--                                            <div class="banner-text">--}}
{{--                                                <h2>This is seconde slide</h2>--}}
{{--                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
                </div>
            </section>
    </div>


@endsection
