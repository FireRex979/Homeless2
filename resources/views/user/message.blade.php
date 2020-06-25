@extends('layouts.user')
@section('judul','User | Profile Page')
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
                                    <h2>Pesan </h2>
                                    <div class="breadcrumbs"><a href="/home#">Home</a><span>Pesan</span></div>
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
                                                        <li><a href="/message" class="user-profile-act"><i class="fa fa-envelope-o"></i> Pesan <span>3</span></a></li>
                                                        <li><a href="/forget-password"><i class="fa fa-unlock-alt"></i>Ganti Password</a></li>
                                                    </ul>
                                                </div>
                                                <!-- user-profile-menu end-->                                        
                                                <a href="#" class="log-out-btn">Log Out</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="dashboard-header fl-wrap">
                                            <h3>Indox</h3>
                                        </div>
                                        <div class="dashboard-list-box fl-wrap">
                                            <div style="overflow-y: scroll; height: 300px; overflow-x: hidden;">
                                            @for($i=1;$i<=9;$i++)
                                            @if($i%2==0)
                                            <!-- dashboard-list end-->    
                                            <div class="dashboard-list">
                                                <div class="dashboard-message" style="margin-left: 0;">
                                                    <div class="dashboard-message-text">
                                                        <h4>Andy Smith - <span>27 December 2018</span></h4>
                                                        <p style="width: 70%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>	
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- dashboard-list end-->
                                            @else
                                            <!-- dashboard-list end-->    
                                            <div class="dashboard-list">
                                                <div class="dashboard-message">
                                                    <div class="dashboard-message-text">
                                                        <h4 style="text-align: right;">Andy Smith - <span>27 December 2018</span></h4>
                                                        <p style="text-align: right; width: 70%; float: right;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>   
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- dashboard-list end-->
                                            @endif
                                            @endfor
                                            </div>                                                                                        
                                        </div>
                                        <div class="input-message fl-wrap">
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="custom-form">
                                                    <form method="GET"  name="registerform" action="/sendbasicemail">
                                                            <input name="send" placeholder="Ketik Pesan" type="text" value="">
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn color-bg flat-btn" style="border: none;">Kirim</button>
                                            </div>
                                            </div>
                                        </div>
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