@extends('layouts.app')
@push('css')
<style type="text/css">
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    margin-left: 10px;
  }

  /* Hide default HTML checkbox */
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #9a33b2;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #9a33b2;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>
@endpush
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">User Create</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('create.user') }}" id="data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group bmd-form-group">
                                        <label for="name" class="bmd-label-floating">{{ __('Name') }}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group bmd-form-group">
                                        <label for="password" class="bmd-label-floating">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="name">Status</label>
                                        <label class="switch">
                                            <input type="checkbox" @if(old('status') == 'Active') checked="checked" @endif name="status" value="Active" />
                                            <span class="slider round"></span>
                                        </label>
                                        </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group bmd-form-group">
                                        <label for="email" class="bmd-label-floating">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group bmd-form-group">
                                        <label for="password-confirm" class="bmd-label-floating">{{ __('Confirm Password') }}</label>
                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" data-rule-minlength="5" data-rule-maxlength="16"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                                    <div class="text-left text-md-right pb-1">
                                        <button type="submit" name="_submit" class="btn btn-primary mb-2" value="reload_page">Save</button>
                                        <button type="submit" name="_submit" class="btn btn-primary mb-2" value="redirect">Save &amp; Go Back</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $("#data").validate({
        ignore: ":hidden",
        rules: {
            name: {
                    required: true,
                    rangelength: [5, 30],
                },
            email: {
                    required: true,
                    email: true,
                    pattern: /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm
                },          
            password: {
                    required: true,
                    rangelength: [5, 16],
                },
            password_confirm: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
        },
        messages: {
            name: {
                    required: "Please enter title of lesson.",
                    rangelength: "Title maxlength should be 30 characters long."
                },
            email: {
                required: "Please enter email address.",
                email: "Please enter email in valid format.",
                pattern: "Email format is invalid."
            },
            password:{
                required: "Please enter your password.",
                rangelength: "Title maxlength should be 16 characters long."
            },
            password_confirmation: {
                equalTo:"Confirm password must be equal to password."
            }
        },
        submitHandler: function (form) {
            form.submit();
        }

    });
});
</script>
@endpush