@extends('layouts.user')
@section('judul','User | Detail Perumahan')
@section('content')
<!-- wrapper -->	
            <div id="wrapper">
                <!--  content--> 
                <div class="content">
                    <!--  carousel--> 
                    <div class="list-single-carousel-wrap fl-wrap" id="sec1">
                        <div class="fw-carousel fl-wrap full-height lightgallery">
                            @for($i=1;$i<=5;$i++)
                            <!-- slick-slide-item -->
                            <div class="slick-slide-item">
                                <div class="box-item">
                                    <img  src="assets/user/images/all/single/1.jpg"   alt="">
                                    <a href="assets/user/images/all/single/1.jpg" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                </div>
                            </div>
                            <!-- slick-slide-item end -->
                            @endfor
                        </div>
                        <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                        <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                    </div>
                    <!--  carousel  end--> 
                    <div class="scroll-nav-wrapper fl-wrap">
                        <div class="container">
                            <nav class="scroll-nav scroll-init">
                                <ul>
                                    <li><a class="act-scrlink" href="#sec1">Foto</a></li>
                                    <li><a href="#sec2">Detail</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--  section   --> 
                    <section class="gray-section no-top-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <!-- list-single-main-wrapper -->
                                    <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                        <!-- list-single-header -->
                                        <div class="list-single-header list-single-header-inside fl-wrap">
                                            <div class="container">
                                                <div class="list-single-header-item">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="list-single-header-item-opt fl-wrap">
                                                                <div class="list-single-header-cat fl-wrap">
                                                                    <a href="#">Perumahan</a>
                                                                </div>
                                                            </div>
                                                            <h2>Perumahan X</h2>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="fl-wrap list-single-header-column">
                                                                <div class="share-holder hid-share">
                                                                    <div class="showshare"><span>Share </span><i class="fa fa-share"></i></div>
                                                                    <div class="share-container  isShare"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- list-single-header end -->
                                        <div class="list-single-facts fl-wrap gradient-bg">
                                            <!-- inline-facts -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <i class="fa fa-home"></i>
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="45">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>Rumah Dibangun</h6>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                            <!-- inline-facts  -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <i class="fa fa-male"></i>
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="2557">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>Orang yang Tinggal</h6>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                            <!-- inline-facts  -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <i class="fa fa-cutlery"></i>
                                                    <div class="milestone-counter">
                                                        <div class="stats animaper">
                                                            <div class="num" data-content="0" data-num="5">0</div>
                                                        </div>
                                                    </div>
                                                    <h6>Toko Kebutuhan</h6>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->                            
                                        </div>
                                        <div class="list-single-main-item fl-wrap">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Tentang Perumahan </h3>
                                            </div>
                                            <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                                            <a href="#" class="btn transparent-btn float-btn modal-input-open">Hubungi Pengembang <i class="fa fa-angle-right"></i></a>
                                            <span class="fw-separator"></span>
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Kelebihan</h3>
                                            </div>
                                            <div class="listing-features fl-wrap">
                                                <ul>
                                                    <li><i class="fa fa-rocket"></i> Elevator in building</li>
                                                    <li><i class="fa fa-wifi"></i> Free Wi Fi</li>
                                                    <li><i class="fa fa-motorcycle"></i> Free Parking</li>
                                                    <li><i class="fa fa-cloud"></i> Air Conditioned</li>
                                                    <li><i class="fa fa-shopping-cart"></i> Online Ordering</li>
                                                    <li><i class="fa fa-paw"></i> Pet Friendly</li>
                                                    <li><i class="fa fa-tree"></i> Outdoor Seating</li>
                                                    <li><i class="fa fa-wheelchair"></i> Wheelchair Friendly</li>
                                                </ul>
                                            </div>
                                        </div>                                                        
                                    </div>
                                </div>
                                <!--box-widget-wrap -->
                                <div class="col-md-4">
                                    <div class="box-widget-wrap">
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget-item-header">
                                                <h3>Tipe Rumah yang Tersedia : </h3>
                                            </div>
                                            <div class="box-widget opening-hours">
                                                <div class="box-widget-content">
                                                    <span class="current-status"><i class="fa fa-home"></i> List Tipe</span>
                                                    <ul>
                                                        @for($i=1;$i<=7;$i++)
                                                        <li><span class="opening-hours-day">Tipe {{$i}} </span><span class="opening-hours-time"><a href="" class="modal-tipe-open"><i class="fa fa-eye" style="background-color: #3EAAFD; padding: 10px 10px; border-radius: 5px; color: white;"></i></a></span></li>
                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->     														
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget-item-header">
                                                <h3>Pengembang : </h3>
                                            </div>
                                            <div class="box-widget list-author-widget">
                                                <div class="list-author-widget-header shapes-bg-small  color-bg fl-wrap">
                                                    <span class="list-author-widget-link"><a href="author-single.html">Alisa Noory</a></span>
                                                    <img src="assets/user/images/avatar/1.jpg" alt=""> 
                                                </div>
                                                <div class="box-widget-content">
                                                    <div class="list-author-widget-text">
                                                        <div class="list-author-widget-contacts">
                                                            <ul>
                                                                <li><span><i class="fa fa-phone"></i> Telepon :</span> <a href="#">+6287752122xxx</a></li>
                                                                <li><span><i class="fa fa-envelope-o"></i> Email :</span> <a href="#">admin@email.com</a></li>
                                                            </ul>
                                                        </div>
                                                        <a href="" class="btn transparent-btn modal-input-open">Hubungi Pengembang</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->   
                                    </div>
                                </div>
                                <!--box-widget-wrap end -->
                            </div>
                        </div>
                    </section>
                    <!--  section  end--> 
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!--  content  end--> 
            </div>
            <!-- wrapper end -->
            <!--register form -->
            <div class="main-register-wrap modal-input">
                <div class="main-overlay"></div>
                <div class="main-register-holder">
                    <div class="main-register fl-wrap">
                        <div class="close-reg close-reg-input"><i class="fa fa-times"></i></div>
                        <h3>Hubungi Pengembang</h3>
                        <div class="soc-log fl-wrap">
                            <div class="custom-form">
                                <form method="GET"  name="registerform" action="/sendbasicemail">
                                    <label>Kirim ke</label>
                                    <input name="emaildestination" type="text"   onClick="this.select()" value="admin@gmail.com" readonly="">
                                    <label>Subject</label>
                                    <input name="subject" type="text"   onClick="this.select()" placeholder="Subject Email">
                                    <label >Pesan</label>
                                    <textarea cols="50" rows="3" placeholder="Ketikkan Pertanyaan Anda" name="message"></textarea>
                                    <button type="submit"  class="log-submit-btn"><span>Kirim</span></button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--register form end -->
            <div class="main-register-wrap modal-tipe">
                <div class="main-overlay"></div>
                <div class="main-register-holder">
                    <div class="main-register fl-wrap">
                        <div class="close-reg close-reg-tipe"><i class="fa fa-times"></i></div>
                        <h3>Detail Tipe X</h3>
                        <div class="list-single-carousel-wrap fl-wrap">
                        <div class="fw-carousel fl-wrap full-height lightgallery">
                            @for($i=1;$i<=5;$i++)
                            <!-- slick-slide-item -->
                            <div class="slick-slide-item">
                                <div class="box-item" style="height: 66%;">
                                    <img  src="assets/user/images/all/single/1.jpg"   alt="">
                                    <a href="assets/user/images/all/single/1.jpg" class="gal-link popup-image" style="margin-left: 50%;margin-right: 35%;"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <!-- slick-slide-item end -->
                            @endfor
                        </div>
                        <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                        <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                    </div>
                    <div id="tabs-container">
                            <ul class="tabs-menu">
                                <li class="current"><a href="#tab-1-tipe">Fasilitas</a></li>
                                <li><a href="#tab-2-tipe">Detail</a></li>
                            </ul>
                            <div class="tab">
                                <div id="tab-1-tipe" class="tab-content">
                                    <div class="listing-features">
                                        <ul>
                                            <li><i class="fa fa-bed"></i> 2</li>
                                            <li><br></li>
                                            <li><br></li>
                                            <li><i class="fa fa-bath"></i> 1</li>
                                            <li><br></li>
                                            <li><br></li>
                                            <li>Luas Tanah : -</li>
                                            <li><br></li>
                                            <li><br></li>
                                            <li>Luas Bangunan : -</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div id="tab-2-tipe" class="tab-content">
                                        <p style="text-align: justify;">Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection