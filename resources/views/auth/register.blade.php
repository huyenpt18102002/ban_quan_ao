@extends('layouts.layout_login')
@section('content')
<div class="h5 modal-title text-center">
    <h4 class="mt-2">
        <div>Welcome back,</div>
        <span>ĐĂNG KÝ</span>
    </h4>
</div>           
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <input id="name" placeholder="Họ & Tên..." type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                      <input id="email" placeholder="Email..." type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                               
            
                                <input id="password" placeholder="Mật khẩu..." type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                               
                                      <input id="password-confirm" placeholder="Nhập lại mật khẩu..." type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <input id="phone" placeholder="Điện thoại..." type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <input id="address" placeholder="Địa chỉ..." type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng ký') }}
                                </button>
                            </div>
                        </div>

                    </form>
          @endsection