
@extends('layouts.layout_login')
@section('content')

<div class="h5 modal-title text-center">
    <h4 class="mt-2">
        <div>Welcome back,</div>
        <span>ĐĂNG NHẬP</span>
    </h4>
</div> 
                                      
                                <form method="POST" action="{{ route('login') }}">
                                            @csrf
                    
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                       
                                                              <input id="email" placeholder="Email here..." type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                            <input id="password"  placeholder="Password here..." type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="position-relative form-check">
                                                  <input class="form-check-input" type="checkbox" name="remember" id="exampleCheck" {{ old('remember') ? 'checked' : '' }}>
                        
                                                            <label class="form-check-label" for="exampleCheck">
                                                                {{ __('Keep me logged in') }}
                                                            </label>
                                            </div>
                                  
                                </div>
                                <div class="modal-footer clearfix">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Đăng nhập ') }}
                                        </button>
        
                                        {{-- @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif --}}
                                         @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('register') }}">
                                                {{ __('Bạn chưa có tài khoản? Đăng ký ngay!') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            @endsection