@extends('layouts.user')
@section('judul','User | Detail Furniture Page')
@section('content')
<script>
    $(document).ready(function(){
        $('#beranda').removeClass('act-link');
        $('#perumahan').removeClass('act-link');
        $('#kpr').removeClass('act-link');
        $('#furniture').addClass('act-link');
    });
</script>
   <!-- wrapper -->	
            <div id="wrapper">
                <!-- content -->
                <div class="content">
                    <!--section -->   
                    <section class="gray-section" id="sec1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                        <!-- article> --> 
                                        <article>
                                            <div class="list-single-main-media fl-wrap">
                                                <div class="single-slider-wrapper fl-wrap">
                                                    <div class="single-slider fl-wrap"  >
                                                        <div class="slick-slide-item"><img src="assets/user/images/all/1.jpg" alt=""></div>
                                                        <div class="slick-slide-item"><img src="assets/user/images/all/1.jpg" alt=""></div>
                                                        <div class="slick-slide-item"><img src="assets/user/images/all/1.jpg" alt=""></div>
                                                    </div>
                                                    <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                                                    <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                                                </div>
                                            </div>
                                            <div class="list-single-main-item fl-wrap">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Nama Furniture</h3>
                                                </div>
                                                <p>
                                                    Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. Integer iaculis tellus nulla, quis imperdiet magna venenatis vitae..
                                                </p>
                                                <div class="post-opt">
                                                    <ul>
                                                        <li><i class="fa fa-dollar"></i> <span>Rp. 10000000</span></li>
                                                        <li><i class="fa fa-tags"></i> <a href="#">Photography</a></li>
                                                    </ul>
                                                </div>
                                                <span class="fw-separator"></span>
                                                <a href="#" class="btn transparent-btn float-btn modal-input-open">Booking Sekarang <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </article>
                                        <!-- article end -->       
                                        <span class="section-separator"></span> 
                                        <!-- list-single-main-item -->   
                                        <div class="list-single-main-item fl-wrap" id="sec5">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Tambah Komentar</h3>
                                            </div>
                                            <!-- Add Review Box -->
                                            <div id="add-review" class="add-review-box">
                                                <!-- Review Comment -->
                                                <form id="add-comment" class="add-comment custom-form">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label><i class="fa fa-user-o"></i></label>
                                                                <input type="text" placeholder="Your Name *" value=""/>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label><i class="fa fa-envelope-o"></i>  </label>
                                                                <input type="email" placeholder="Email Address*" value=""/>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label><i class="fa fa-phone"></i>  </label>
                                                                <input type="text" placeholder="No Telepon*" value=""/>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label><i class="fa fa-home"></i>  </label>
                                                                <input type="text" value="Nama Furniture" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label><i class="fa fa-shopping-cart"></i>  </label>
                                                                <input type="number" value="0" style="float: left; border: 1px solid #eee; background: #f9f9f9; width: 100%; padding: 15px 20px 15px 55px; border-radius: 6px; color: #666; font-size:13px;" min="0" />
                                                            </div>
                                                            <div class="col-md-9">
                                                                <label><i class="fa fa-money"></i></label>
                                                                <input type="text" name="" value="Rp. 0">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <button class="btn  big-btn  color-bg flat-btn">Booking</button>
                                                </form>
                                            </div>
                                            <!-- Add Review Box / End -->
                                        </div>
                                        <!-- list-single-main-item end -->                                
                                    </div>
                                </div>
                                <!--box-widget-wrap -->
                                <div class="col-md-4">
                                    <div class="box-widget-wrap">
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget-item-header">
                                                <h3>Cari Furniture : </h3>
                                            </div>
                                            <div class="box-widget search-widget">
                                                <form action="#" class="fl-wrap">
                                                    <input name="se" id="se" type="text" class="search" placeholder="Search.." value="" />
                                                    <button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->   
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget-item-header">
                                                <h3>Kategori: </h3>
                                            </div>
                                            <div class="list-single-tags tags-stylwrap">
                                                <a href="#">Event</a>
                                                <a href="#">Design</a>
                                                <a href="#">Photography</a>
                                                <a href="#">Trends</a>
                                                <a href="#">Video</a>
                                                <a href="#">News</a>                                                                               
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->                 
                                    </div>
                                </div>
                                <!--box-widget-wrap end -->
                            </div>
                        </div>
                    </section>
                </div>
                <!--content end --> 
            </div>
            <!-- wrapper end -->
@endsection