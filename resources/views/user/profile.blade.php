@extends('layouts.user')
@section('judul','User | Profile Page')
@section('content')
<!-- wrapper -->	
            <div id="wrapper">
                <!--content -->  
                <div class="content">
                    <!--section --> 
                    <section>
                        <!-- container -->
                        <div class="container">
                            <!-- profile-edit-wrap -->
                            <div class="profile-edit-wrap">
                                <div class="profile-edit-page-header">
                                    <h2>Profile User</h2>
                                    <div class="breadcrumbs"><a href="/home">Home</a><span>profile</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="fixed-bar fl-wrap">
                                            <div class="user-profile-menu-wrap fl-wrap">
                                                <!-- user-profile-menu-->
                                                <div class="user-profile-menu">
                                                    <h3>Menu</h3>
                                                    <ul>															
                                                        <li><a href="/profile" class="user-profile-act"><i class="fa fa-user-o"></i> Profile</a></li>
                                                        <li><a href="/message"><i class="fa fa-envelope-o"></i> Pesan <span>3</span></a></li>
                                                        <li><a href="/forget-password"><i class="fa fa-unlock-alt"></i>Ganti Password</a></li>
                                                    </ul>
                                                </div>
                                                <!-- user-profile-menu end-->                                       
                                                <a href="#" class="log-out-btn">Log Out</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <!-- profile-edit-container--> 
                                        <div class="profile-edit-container">
                                            <div class="profile-edit-header fl-wrap">
                                                <h4>Profile</h4>
                                            </div>
                                            <div class="custom-form">
                                                <label>Nama <i class="fa fa-user-o"></i></label>
                                                <input type="text" placeholder="AlisaNoory" value=""/>
                                                <label>Email<i class="fa fa-envelope-o"></i>  </label>
                                                <input type="text" placeholder="AlisaNoory@domain.com" value=""/>
                                                <label>No Telepon<i class="fa fa-phone"></i>  </label>
                                                <input type="text" placeholder="+7(123)987654" value=""/>
                                                <label> Alamat <i class="fa fa-map-marker"></i>  </label>
                                                <input type="text" placeholder="USA 27TH Brooklyn NY" value=""/>
                                                <button class="btn  big-btn  color-bg flat-btn">Save Changes<i class="fa fa-angle-right"></i></button>
                                            </div>
                                        </div>
                                        <!-- profile-edit-container end--> 
                                        <!-- profile-edit-container--> 
                                        <div class="profile-edit-container add-list-container">
                                            
                                        </div>
                                        <!-- profile-edit-container end--> 		                                      
                                    </div>
                                    <div class="col-md-2">
                                        <div class="edit-profile-photo fl-wrap">
                                            <img src="assets/user/images/avatar/1.jpg" class="respimg" alt="">
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload">
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