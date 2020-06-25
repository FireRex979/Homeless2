@extends('layouts.user')
@section('judul','User | News Page')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#beranda').removeClass('act-link');
        $('#perumahan').removeClass('act-link');
        $('#kpr').removeClass('act-link');
        $('#news').addClass('act-link');
    });
</script>
<!-- wrapper -->	
            <div id="wrapper">
                <!-- content -->
                <div class="content">
                    <!--section -->
                    <section class="parallax-section" data-scrollax-parent="true">
                        <div class="bg par-elem "  data-bg="assets/user/images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title center-align">
                                <h2><span>Our News - Blog</span></h2>
                                <div class="breadcrumbs fl-wrap"><a href="/home">Home</a><span>News</span></div>
                                <span class="section-separator"></span>
                            </div>
                        </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec1" class="custom-scroll-link">Let's Start</a></div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->   
                    <section class="gray-section" id="sec1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                    	@for($i=1;$i<=5;$i++)
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
                                                    <h3><a href="blog-single.html">Aliquam erat volutpat. Curabitur convallis.</a></h3>
                                                </div>
                                                <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                                                <div class="post-author"><a href="#"><img src="assets/user/images/avatar/1.jpg" alt=""><span>By , Alisa Noory</span></a></div>
                                                <div class="post-opt">
                                                    <ul>
                                                        <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>
                                                        <li><i class="fa fa-tags"></i> <a href="#">Photography</a> , <a href="#">Design</a> </li>
                                                    </ul>
                                                </div>
                                                <span class="fw-separator"></span>
                                                <a href="/news-detail" class="btn transparent-btn float-btn">Selengkapnya <i class="fa fa-eye"></i></a>
                                            </div>
                                        </article>
                                        <!-- article end -->       
                                        <span class="section-separator"></span>
                                        @endfor                              
                                        <div class="pagination">
                                            <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                            <a href="#" class="current-page">1</a>
                                            <a href="#">2</a>
                                            <a href="#">3</a>
                                            <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-wrap -->
                                <div class="col-md-4">
                                    <div class="box-widget-wrap">
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget-item-header">
                                                <h3>Cari Artikel : </h3>
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
                                                <h3>Artikel Populer : </h3>
                                            </div>
                                            <div class="box-widget widget-posts blog-widgets">
                                                <div class="box-widget-content">
                                                    <ul>
                                                        @for($i=1;$i<=5;$i++)
                                                        <li class="clearfix">
                                                            <a href="#"  class="widget-posts-img"><img src="assets/user/images/all/1.jpg"  alt=""></a>
                                                            <div class="widget-posts-descr">
                                                                <a href="#" title="">Cafe "Lollipop"</a>
                                                                <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 21 Mar 2017 </span> 
                                                            </div>
                                                        </li>
                                                        @endfor
                                                    </ul>
                                                </div>
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
                <!-- content end -->
            </div>
            <!-- wrapper end -->
@endsection