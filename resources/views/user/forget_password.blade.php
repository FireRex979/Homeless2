@extends('layouts.user')
@section('judul','User | Forgot Password Page')
@section('content')
<input type="hidden" name="route" value="{{$route}}">
<script type="text/javascript">
    $(document).ready(function(){
        var route = $('input[name=route]').val();
        if (route=='profile') {
            var form = "event.preventDefault();"+
                        "document.getElementById('logout-form').submit();";
            $('#btn-logout').attr('href', '{{route("logout")}}').attr('onclick', form);
            $('#btn-logout-2').attr('href', '{{route("logout")}}').attr('onclick', form);
        }
    })
</script>
            <!-- wrapper -->	
            <div id="wrapper">
                <!--content -->  
                <div class="content">
                    <!--section --> 
                    <section id="sec1">
                        <!-- container -->
                        <div class="container">
                            <!-- profile-edit-wrap -->
                            <div class="profile-edit-wrap">
                                <div class="profile-edit-page-header">
                                    <h2>Change Password</h2>
                                    <div class="breadcrumbs"><a href="#">Home</a><span>Ganti Password</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="fixed-bar fl-wrap">
                                            <div class="user-profile-menu-wrap fl-wrap">
                                                <!-- user-profile-menu-->
                                                <div class="user-profile-menu">
                                                    <h3>Menu</h3>
                                                    <ul>
                                                    	<li><a href="/user/{{Auth::user()->id}}"><i class="fa fa-user-o"></i> Profile</a></li>
                                                        <li><a href="/message"><i class="fa fa-envelope-o"></i> Pesan <span>3</span></a></li>
                                                        <li><a href="/forget-password" class="user-profile-act"><i class="fa fa-unlock-alt"></i>Ganti Password</a></li>
                                                    </ul>
                                                </div>
                                                <!-- user-profile-menu end-->                                       
                                                <a href="#" id="btn-logout-2" class="log-out-btn">Log Out</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <!-- profile-edit-container--> 
                                        <div class="profile-edit-container">
                                            <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                                <h4>Ubah Password</h4>
                                            </div>
                                            <div class="custom-form no-icons">
                                                <div class="pass-input-wrap fl-wrap">
                                                    <label>Password Sekarang*</label>
                                                    <p id="old-password-eror" style="color: red; float: left;"></p>
                                                    <input type="password" class="pass-input" name="oldpassword" placeholder="" value="" required="" />
                                                    <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                                </div>
                                                <div class="pass-input-wrap fl-wrap">
                                                    <label>Password Baru*</label>
                                                    <input type="password" class="pass-input" name="newpassword" placeholder="" value="" required="" />
                                                    <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                                </div>
                                                <div class="pass-input-wrap fl-wrap">
                                                    <label>Masukkan Ulang Password Baru*</label>
                                                    <p id="confirmed-password-eror" style="color: red; float: left;"></p>
                                                    <input type="password" class="pass-input" name="newpassword_confirmed" placeholder="" value="" required="" />
                                                    <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                                </div>
                                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                                <button class="btn  big-btn  color-bg flat-btn" id="btn-reset-password" type="button">Simpan Perubahan<i class="fa fa-angle-right"></i></button>
                                            </div>
                                        </div>
                                        <!-- profile-edit-container end-->                                        
                                    </div>
                                </div>
                            </div>
                            <!--profile-edit-wrap end -->
                        </div>
                        <!--container end -->
                    </section>
                    <!-- section end -->
                    <div class="limit-box fl-wrap"></div>
                </div>
            </div>
            <!-- wrapper end -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('input[name=newpassword_confirmed]').keyup(function(){
            var newpassword = $('input[name=newpassword]').val();
            var newpassword_confirmed = $(this).val();
            if (newpassword != newpassword_confirmed) {
                $('#confirmed-password-eror').html('password tidak cocok!');
            }else{
                $('#confirmed-password-eror').empty();
            }
        });
        $('#btn-reset-password').on('click', function(){
            var oldpassword = $('input[name=oldpassword]').val();
            var newpassword = $('input[name=newpassword]').val();
            var id = $('input[name=id]').val();
            $.ajax({
                url: '/user/change/password/'+id,
                method: 'POST',
                data: {
                    oldpassword: oldpassword,
                    newpassword: newpassword,
                },
                success: function(response){
                    if (response.notif == 'success') {
                        $('#old-password-eror').empty();
                        $('input[name=newpassword]').val('');
                        $('input[name=oldpassword]').val('');
                        $('input[name=newpassword_confirmed]').val('');
                        alert("Ganti Password Berhasil");
                    }else if(response.notif == 'failed'){
                        $('#old-password-eror').html('Password Lama Salah!');
                        $('input[name=newpassword]').val('');
                        $('input[name=oldpassword]').val('');
                        $('input[name=newpassword_confirmed]').val('');
                    }
                }
            });
        });
    </script>
@endsection
