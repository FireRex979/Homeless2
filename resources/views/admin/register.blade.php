@extends('layouts.auth')

@section('konten')
<div class="auth-box p-4 bg-white rounded">
    <div>
        <div class="logo">
            <h3 class="box-title mb-3">Registar Admin</h3>
        </div>
        <!-- Form -->
        <div class="row">
            <div class="col-12">
                <form class="form-horizontal mt-3 form-material" action="{{route('register.admin.store')}}" method="POST">
                    @if (count($errors) > 0)
                        <br>
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    @csrf
                    <div class="form-group mb-3">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Name" name="name">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="username">
                        </div>
                    </div>
                    <div class="form-group mb-3 ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Nomor Telepon" name="no_tlp">
                        </div>
                    </div>
                    <div class="form-group mb-3 ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Confirm Password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group text-center mb-3">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group mb-0 mt-2 ">
                        <div class="col-sm-12 text-center ">
                            Already have an account? <a href="/login/admin" class="text-info ml-1 ">Sign In</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection