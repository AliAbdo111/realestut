@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> -->
                
                <div class="login-box">
                    <h2>Login</h2>
                    <form method="POST" id="GFG" action="{{ route('login') }}">
                        @csrf
                        <div class="user-box">
                          <input id="email" type="email"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          <label>{{ __('Email Address') }}</label>
                        </div>
                        
                        <div class="user-box">
                        <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          <label for="password">{{ __('Password') }}</label>
                        </div>
                        

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                         <div class="col-md-8 offset-md-4">
                            <!-- <a href="{{ route('login') }}" type="submit">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            {{ __('Login') }}
                            </a> --> 
                            
                           <a href="#" onclick="myFunction()"> 
                                   
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                                    
                            Login
                            </a>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                            </div>
                        </div>
                    </form>
                    <script>
                   function myFunction() {
                document.getElementById("GFG").submit();
                }
               </script>
            </div>
             </div>
        </div>
    </div>
</div>
@endsection
