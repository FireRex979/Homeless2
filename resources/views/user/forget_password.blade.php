@extends('layouts.user')
@section('judul','User | Forgot Password Page')
@section('content')
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
                                                    	<li><a href="/profile"><i class="fa fa-user-o"></i> Profile</a></li>
                                                        <li><a href="/message"><i class="fa fa-envelope-o"></i> Pesan <span>3</span></a></li>
                                                        <li><a href="/forget-password" class="user-profile-act"><i class="fa fa-unlock-alt"></i>Ganti Password</a></li>
                                                    </ul>
                                                </div>
                                                <!-- user-profile-menu end-->                                       
                                                <a href="#" class="log-out-btn">Log Out</a>
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
                                                    <label>Password Sekarang</label>
                                                    <input type="password" class="pass-input" placeholder="" value=""/>
                                                    <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                                </div>
                                                <div class="pass-input-wrap fl-wrap">
                                                    <label>Password Baru</label>
                                                    <input type="password" class="pass-input" placeholder="" value=""/>
                                                    <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                                </div>
                                                <div class="pass-input-wrap fl-wrap">
                                                    <label>Masukkan Ulang Password Baru</label>
                                                    <input type="password" class="pass-input" placeholder="" value=""/>
                                                    <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                                </div>
                                                <button class="btn  big-btn  color-bg flat-btn">Simpan Perubahan<i class="fa fa-angle-right"></i></button>
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
@endsection
