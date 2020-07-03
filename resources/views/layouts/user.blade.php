<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>@yield('judul')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="{{asset('assets/user/css/reset.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('assets/user/css/plugins.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('assets/user/css/style.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('assets/user/css/color.css')}}">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="assets/user/images/favicon.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin"></div>
            <div class="pulse"></div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
            <!-- header-->
            <header class="main-header dark-header fs-header sticky">
                <div class="header-inner">
                    <div class="logo-holder">
                        <a href="/home"><img src="assets/user/images/logo.png" alt=""></a>
                    </div>
                    @if(Auth::check())
                    <div class="show-reg-form modal-open" id="sign-form" style="display: none;"><i class="fa fa-sign-in"></i>Sign In</div>
                    <div class="header-user-menu" id="profile-header">
                        <div class="header-user-name">
                            <span><img src="/images/user/{{Auth::user()->profile_image}}" alt="" id="profile-image-header"></span>
                            {{Auth::user()->name}}
                        </div>
                        <ul>
                            <li><a href="/user/{{Auth::user()->id}}"> Profile</a></li>
                            <li><a href="javascript:void(0)" id="btn-logout">Log Out</a></li>
                        </ul>
                    </div>
                    @else
                    <div id="auth-header">
                        <div class="show-reg-form modal-open" id="sign-form"><i class="fa fa-sign-in"></i>Sign In</div>
                        <div class="header-user-menu" style="display: none;" id="profile-header">
                        <div class="header-user-name">
                                <span><img id="image-user" alt=""></span>
                                <div id="user-name"></div>
                            </div>
                            <ul>
                                <li><a href="" id="profile-user"> Profile</a></li>
                                <li><a href="javascript:void(0)" id="btn-logout">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif
                    <!-- nav-button-wrap-->
                    <div class="nav-button-wrap color-bg">
                        <div class="nav-button">
                            <span></span><span></span><span></span>
                        </div>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    <!-- nav-button-wrap end-->
                    <!--  navigation -->
                    <div class="nav-holder main-menu">
                        <nav>
                            <ul>
                                <li>
                                    <a href="/home" class="act-link" id="beranda">Beranda</a>
                                </li>
                                <li>
                                    <a href="/residence" id="perumahan">Perumahan</a>
                                </li>
                                <li>
                                    <a href="/furniture" id="furniture">Furniture</a>
                                </li>
                                <li>
                                    <a href="/news" id="news">Berita</a>
                                </li>
                                <li>
                                    <a href="blog.html" id="kpr">KPR</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- navigation  end -->
                </div>
            </header>
            <!--  header end -->
            @yield('content')
            <!--footer -->
            <footer class="main-footer dark-footer  ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="footer-widget fl-wrap">
                                <h3>About Us</h3>
                                <div class="footer-contacts-widget fl-wrap">
                                    <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam. </p>
                                    <ul  class="footer-contacts fl-wrap">
                                        <li><span><i class="fa fa-envelope-o"></i> Mail :</span><a href="#" target="_blank">yourmail@domain.com</a></li>
                                        <li> <span><i class="fa fa-map-marker"></i> Adress :</span><a href="#" target="_blank">USA 27TH Brooklyn NY</a></li>
                                        <li><span><i class="fa fa-phone"></i> Phone :</span><a href="#">+7(111)123456789</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-widget fl-wrap">
                                <h3>Our Last News</h3>
                                <div class="widget-posts fl-wrap">
                                    <ul>
                                        <li class="clearfix">
                                            <a href="#"  class="widget-posts-img"><img src="assets/user/images/all/1.jpg" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Vivamus dapibus rutrum</a>
                                                <span class="widget-posts-date"> 21 Mar 09.05 </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="#"  class="widget-posts-img"><img src="assets/user/images/all/1.jpg" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title=""> In hac habitasse platea</a>
                                                <span class="widget-posts-date"> 7 Mar 18.21 </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="#"  class="widget-posts-img"><img src="assets/user/images/all/1.jpg" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Tortor tempor in porta</a>
                                                <span class="widget-posts-date"> 7 Mar 16.42 </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-widget fl-wrap">
                                <h3>Our  Twitter</h3>
                                <div id="footer-twiit"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-widget fl-wrap">
                                <h3>Subscribe</h3>
                                <div class="subscribe-widget fl-wrap">
                                    <p>Want to be notified when we launch a new template or an udpate. Just sign up and we'll send you a notification by email.</p>
                                    <div class="subcribe-form">
                                        <form id="subscribe">
                                            <input class="enteremail" name="email" id="subscribe-email" placeholder="Email" spellcheck="false" type="text">
                                            <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fa fa-rss"></i> Subscribe</button>
                                            <label for="subscribe-email" class="subscribe-message"></label>
                                        </form>
                                    </div>
                                </div>
                                <div class="footer-widget fl-wrap">
                                    <div class="footer-menu fl-wrap">
                                        <ul>
                                            <li><a href="#">Home </a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Listing</a></li>
                                            <li><a href="#">Contacts</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sub-footer fl-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="about-widget">
                                    <img src="assets/user/images/logo.png" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="copyright"> &#169; CityBook 2018 .  All rights reserved.</div>
                            </div>
                            <div class="col-md-4">
                                <div class="footer-social">
                                    <ul>
                                        <li><a href="#" target="_blank" ><i class="fa fa-facebook-official"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" target="_blank" ><i class="fa fa-chrome"></i></a></li>
                                        <li><a href="#" target="_blank" ><i class="fa fa-vk"></i></a></li>
                                        <li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--footer end  -->
            <!--register form -->
            <div class="main-register-wrap modal">
                <div class="main-overlay"></div>
                <div class="main-register-holder">
                    <div class="main-register fl-wrap">
                        <div class="close-reg"><i class="fa fa-times"></i></div>
                        <h3>Sign In <span>City<strong>Book</strong></span></h3>
                        <div class="soc-log fl-wrap">
                            <p>Login Cepat menggunakan akun Facebook Anda.</p>
                            <a href="/auth/facebook" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in dengan Facebook</a>
                        </div>
                        <div class="log-separator fl-wrap"><span>or</span></div>
                        <div id="tabs-container">
                            <ul class="tabs-menu">
                                <li class="current"><a href="#tab-1">Login</a></li>
                                <li><a href="#tab-2">Register</a></li>
                            </ul>
                            <div class="tab">
                                <div id="tab-1" class="tab-content">
                                    <div class="custom-form">
                                        <div id="form-login">
                                            <label>Email Address * <span style="color: red; font-style: bold;" id="eror-email-login"></span></label>
                                            <input name="email_login" type="email"   onClick="this.select()" value="" required="">
                                            <label >Password * <span style="color: red; font-style: bold;" id="eror-password-login"></span></label>
                                            <input name="password_login" type="password"   onClick="this.select()" value="" required="">
                                            <button type="submit" id="btn-login" class="log-submit-btn"><span>Log In</span></button>
                                            <div class="clearfix"></div>
                                            <div class="filter-tags">
                                                <input id="check-a" type="checkbox" name="remember" id="remember">
                                                <label for="check-a">Remember me</label>
                                            </div>

                                            <div class="lost_password">
                                                <a href="javascript:void(0)" id="forget-password">Lupa Password?</a>
                                            </div>
                                        </div>
                                        <div id="form-forget-password" style="display: none;">
                                            <label id="name-regis-label">Email * <span style="color: red; font-style: bold" id="eror-email-not-register"></label>
                                            <input name="email_forget_password" type="text" value="" required="">
                                            <button type="submit" class="log-submit-btn" id="btn-send-otp-code"><span>Kirim Kode OTP</span></button>
                                        </div>
                                        <div id="form-forget-password-code" style="display: none;">
                                            <label>Token 6 digit * <span style="color: red; font-style: bold" id="eror-token-not-match"></span></label>
                                            <input name="token_reset_password" type="text" value="" required="">
                                            <label>Masukkan Password Baru *</label>
                                            <input type="password" name="newpassword" required="" readonly="">
                                            <label>Masukkan ulang Password Baru *<span style="color: red; font-style: bold" id="eror-newpassword-not-match"></span></label>
                                            <input type="password" name="passwordconfirmed" required="" readonly="">
                                            <button type="submit" class="log-submit-btn" id="btn-reset-password"><span>Ganti Password</span></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div id="tab-2" class="tab-content">
                                        <div id="tab2-line-1">
                                            <div class="custom-form">
                                                <label id="name-regis-label">Nama * <span style="color: red; font-style: bold" id="eror-name-span"></span></label>
                                                <input name="name" type="text" value="" required="">
                                                <input name="role" type="hidden" value="user">
                                                <input type="hidden" name="link" value="http://127.0.0.1:8000/verify/">
                                                <label id="email-regis-label">Email * <span style="color: red; font-style: bold" id="eror-email-span"></label>
                                                <input name="email_register" type="email" value="" required="" id="#email">
                                                <label id="password-regis-label">Password *</label>
                                                <input name="password_register" type="password" value="" required="">
                                                <label>Konfirmasi Password * <span style="color: red; font-size: bold;" id="eror-password-confirmed"></span></label>
                                                <input type="password" name="password_confirmed" value="" required="">
                                                <button type="submit" class="log-submit-btn" id="btn-register" disabled=""><span>Register</span></button>
                                            </div>    
                                        </div>
                                        <div id="link-resend-email">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--register form end -->
            <a class="to-top"><i class="fa fa-angle-up"></i></a>
        </div>
        <input type="hidden" name="user_new" value="">
        <input type="hidden" name="otp_code" value="">
        <input type="hidden" name="id_user_forget_password" value="">
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="{{asset('assets/user/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/user/js/plugins.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/user/js/scripts.js')}}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&libraries=places&callback=initAutocomplete"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#btn-register').on('click', function(){
                    var name = $('input[name=name]').val();
                    var email = $('input[name=email_register]').val();
                    var password = $('input[name=password_register]').val();
                    var role = $('input[name=role]').val();
                    var link = $('input[name=link]').val();
                    $.ajax({
                        url: '/register-user',
                        method: 'POST',
                        data:{
                            name: name,
                            email: email,
                            role: role,
                            password: password,
                            link: link
                        },
                        success: function(response){
                            if (response.notif == 'eror-name') {
                                $('#eror-email-span').empty();
                                $('#eror-name-span').html( 'nama tidak boleh ada nomor!');
                                $('input[name=password_register]').val("");
                                $('input[name=password_confirmed]').val("");
                            }else if(response.notif == 'eror-email') {
                                $('#eror-name-span').empty();
                                $('#eror-email-span').html( 'email telah terdaftar!');
                                $('input[name=password_register]').val("");
                                $('input[name=password_confirmed]').val("");
                            }else if(response.notif == 'eror-name-email'){
                                $('#eror-name-span').html( 'nama tidak boleh ada nomor!');
                                $('#eror-email-span').html( 'email telah terdaftar!');
                                $('input[name=password_confirmed]').val("");
                            }else if(response.notif == 'success'){
                                var string = '<p style="text-align: justify;">Email Verifikasi Telah Dikirimkan ke Email Anda. Mohon untuk melakukan verifikasi email sebelum login.</p>';
                                var link = '<a href="javascript:void(0)" class="resend" style="text-decoration: underline; float: left;"> Belum Mendapatkan Email?</a>'
                                $('#tab2-line-1').html(string);
                                $('#link-resend-email').html(link);
                                $('input[name=user_new]').val(response.id);
                            }
                        },
                        error: function(){
                            alert('eror');
                        }
                    });
                });
                $('#btn-login').on('click', function(){
                    var email = $('input[name=email_login]').val();
                    var password = $('input[name=password_login]').val();
                    var remember = $('input[name=remember]').val();
                    $.ajax({
                        url: '/login/user',
                        method: 'POST',
                        data: {
                            email: email,
                            password: password,
                            remember: remember,
                        },
                        success: function(response){
                            if (response.notif == 'success') {
                                var image_link = '/images/user/'+response.profile_image;
                                var profile_link = '/user/'+response.id;
                                $('meta[name="csrf-token"]').attr('content', response.token);
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': response.token
                                    }
                                });
                                $('#sign-form').attr('style', 'display: none;');
                                $('#user-name').text(response.name);
                                $('#profile-user').attr('href', profile_link);
                                $('#image-user').attr('src', image_link);
                                $('#profile-header').removeAttr('style');
                                $('.modal').fadeOut();
                                $("html, body").removeClass("hid-body");
                            }else if(response.notif == 'failed'){
                                $('#eror-email-login').html('invalid email or password');
                            }else if(response.notif == 'need verified'){
                                $('#eror-email-login').html('Email belum terverifikasi, mohon cek email!');
                            }
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#link-resend-email').on('click', function(){
                var id = $('input[name=user_new]').val();
                $.ajax({
                    url: '/verify/resend/'+id,
                    method: 'GET',
                    success: function(response){
                        if (response.notif == 'belum verify') {
                            alert('Email Verification Berhasil dikirimkan.');
                        }else{
                            alert('Email Sudah Terverifikasi, mohon untuk melanjutkannya ke Login');
                        }
                    },
                    eror: function(){
                        alert('eror');
                    }
                });
            });
            $('#btn-logout').on('click', function(){
                $.ajax({
                    url: '/logout/user',
                    method: 'GET',
                    success: function(response){
                        $('meta[name="csrf-token"]').attr('content', response.token);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': response.token
                            }
                        });
                        $('#profile-header').attr('style', 'display: none');
                        $('#sign-form').removeAttr('style');
                        $('input[name=password_login]').val('');
                    }
                });
            });
            $('input[name=password_confirmed]').keyup(function(){
                var password = $('input[name=password_register]').val();
                var password_confirmed = $('input[name=password_confirmed]').val();
                if (password != password_confirmed) {
                    $('#eror-password-confirmed').html('password tidak sama');
                }else{
                    $('#eror-password-confirmed').empty();
                    $('#btn-register').removeAttr('disabled');
                }
            });
            $('#forget-password').on('click', function(){
                $('#form-login').attr('style', 'display: none');
                $('#form-forget-password-code').attr('style', 'display: none');
                $('#form-forget-password').removeAttr('style');
            });
            $('#btn-send-otp-code').on('click', function(){
                var email = $('input[name=email_forget_password]').val();
                $.ajax({
                    url: '/user/forget-password/get-otp-code',
                    method: 'POST',
                    data: {
                        email: email,
                    },
                    success: function(response){
                        if (response.notif == 'success') {
                            $('input[name=otp_code]').val(response.otp['code']);
                            $('input[name=id_user_forget_password]').val(response.id);
                            $('#form-login').attr('style', 'display: none');
                            $('#form-forget-password').attr('style', 'display: none');
                            $('#form-forget-password-code').removeAttr('style');
                            $('#eror-email-not-register').empty();
                            alert("Kode OTP Telah dikirimkan ke Email Anda, mohon dicek.");
                        }else if(response.notif == 'failed'){
                            $('#eror-email-not-register').html('Email Belum Terdaftar');
                        }
                    }
                });
            });
            $('input[name=token_reset_password]').keyup(function(){
                var otp = $('input[name=otp_code]').val();
                var token = $('input[name=token_reset_password]').val();
                if (otp != token) {
                    $('#eror-token-not-match').html('token salah');
                }else{
                    $('input[name=newpassword]').removeAttr('readonly');
                    $('input[name=passwordconfirmed]').removeAttr('readonly');
                    $('#eror-token-not-match').empty();
                }
            });
            $('input[name=passwordconfirmed').keyup(function(){
                var password = $('input[name=newpassword]').val();
                var passwordconfirmed = $('input[name=passwordconfirmed]').val();
                if (password != passwordconfirmed) {
                    $('#eror-newpassword-not-match').html('password tidak cocok!');
                }else{
                    $('#eror-newpassword-not-match').empty();
                }
            });
            $('#btn-reset-password').on('click', function(){
                var id = $('input[name=id_user_forget_password]').val();
                var newpassword = $('input[name=newpassword]').val();
                $.ajax({
                    url: '/user/forget-password/'+id,
                    method: 'POST',
                    data: {
                        newpassword: newpassword,
                    },
                    success: function(response){
                        alert("Password berhasil dirubah, Silahkan Login Ulang!");
                        $('#form-login').removeAttr('style');
                        $('#form-forget-password').attr('style', 'display: none');
                        $('#form-forget-password-code').attr('style', 'display: none');
                        $('input[name=email_forget_password]').val('');
                        $('input[name=otp_code]').val('');
                        $('input[name=token_reset_password]').val('');
                        $('input[name=newpassword]').val('');
                        $('input[name=passwordconfirmed]').val('');
                    }
                });
            });
        </script>
    </body>
</html>