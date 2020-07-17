@extends('layouts.auth')

@section('konten')
<div class="auth-box p-4 bg-white rounded">
    <div id="loginform">
        <div class="logo">
            <h3 class="box-title mb-3">Login Admin</h3>
        </div>
        <!-- Form -->
        <div class="row">
            <div class="col-12">
                <form class="form-horizontal mt-3 form-material" id="loginform" action="/login/admin" method="POST">
                    @if (count($errors) > 0)
                        <br>
                        <div class="alert alert-danger">
                            <span>Username or Password were wrong</span>
                        </div>
                    @endif
                    @csrf
                    <div class="form-group mb-3">
                        <div class="">
                            <input class="form-control" type="text" required="" placeholder="Username" name="username"> </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex">
                            <div class="checkbox checkbox-info pt-0">
                                <input id="checkbox-signup" type="checkbox" class="material-inputs chk-col-indigo">
                                <label for="checkbox-signup"> Remember me </label>
                            </div> 
                            <div class="ml-auto">
                                <a href="javascript:void(0)" id="to-recover" class="text-muted float-right"><i class="fa fa-lock mr-1"></i> Forgot pwd?</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center mt-4">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="recoverform">
        <div class="logo">
            <h3 class="font-weight-medium mb-3">Recover Password</h3>
            <span class="text-muted">Enter your Email and instructions will be sent to you!</span>
        </div>
        <div class="row mt-3 form-material">
            <!-- Form -->
            <form class="col-12" action="index.html">
                <!-- email -->
                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="email" required="" placeholder="Email" name="email">
                    </div>
                </div>
                <!-- pwd -->
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-block btn-lg btn-primary text-uppercase" type="submit" name="action">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection