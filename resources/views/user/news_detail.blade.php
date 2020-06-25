@extends('layouts.user')
@section('judul','User | News Page')
@section('content')
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
                                <h2><span>Blog Post Title</span></h2>
                                <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Blog</a><span>Blog Single</span></div>
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
                                                    <h3>Aliquam erat volutpat. Curabitur convallis.</h3>
                                                </div>
                                                <p>
                                                    Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien dui. Nulla auctor sit amet sem non porta. Integer iaculis tellus nulla, quis imperdiet magna venenatis vitae..
                                                </p>
                                                <p>Ut nec hinc dolor possim. An eros argumentum vel, elit diceret duo eu, quo et aliquid ornatus delicatissimi. Cu nam tale ferri utroque, eu habemus albucius mel, cu vidit possit ornatus eum. Eu ius postulant salutatus definitionem,  explicari. Graeci viderer qui ut, at habeo facer solet usu. Pri choro pertinax indoctum ne, ad partiendo persecuti forensibus est.</p>
                                                <blockquote>
                                                    <p>Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.</p>
                                                </blockquote>
                                                <p>Ut nec hinc dolor possim. An eros argumentum vel, elit diceret duo eu, quo et aliquid ornatus delicatissimi. Cu nam tale ferri utroque, eu habemus albucius mel, cu vidit possit ornatus eum. Eu ius postulant salutatus definitionem, an e trud erroribus explicari. Graeci viderer qui ut, at habeo facer solet usu. Pri choro pertinax indoctum ne, ad partiendo persecuti forensibus est.</p>
                                                <div class="post-author"><a href="#"><img src="assets/user/images/avatar/1.jpg" alt=""><span>By , Alisa Noory</span></a></div>
                                                <div class="post-opt">
                                                    <ul>
                                                        <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>
                                                        <li><i class="fa fa-tags"></i> <a href="#">Photography</a></li>
                                                        <li>
                                                        	<div class="share-holder hid-share">
	                                                    		<div class="showshare"><span style="color: white;">Share </span><i class="fa fa-share"></i></div>
	                                                    		<div class="share-container  isShare"></div>
                                                			</div>
                                                		</li>
                                                    </ul>
                                                </div>
                                                <span class="fw-separator"></span>
                                                <div class="post-nav fl-wrap">
                                                    <a href="#" class="post-link prev-post-link"><i class="fa fa-angle-left"></i>Prev <span class="clearfix">Judul Prev Artikel</span></a>
                                                    <a href="#" class="post-link next-post-link"><i class="fa fa-angle-right"></i>Next<span class="clearfix">Judul Next Artikel</span></a>
                                                </div>
                                            </div>
                                        </article>
                                        <!-- article end -->       
                                        <span class="section-separator"></span>
                                        <!-- list-single-main-item -->   
                                        <div class="list-single-main-item fl-wrap" id="sec4">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Komen -  <span> 3 </span></h3>
                                            </div>
                                            <div class="reviews-comments-wrap">
                                                <!-- reviews-comments-item -->  
                                                <div class="reviews-comments-item" id="">
                                                    <div class="review-comments-avatar">
                                                        <img src="assets/user/images/avatar/1.jpg" alt=""> 
                                                    </div>
                                                    <div class="reviews-comments-item-text">
                                                    	<a class="new-dashboard-item" id="btn-reply-comment-1" onclick="addInputComment('1')">Balas</a>
                                                        <h4><a href="#">Jessie Manrty</a></h4>
                                                        <div class="clearfix"></div>
                                                        <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                                                        <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>27 May 2018</span>
                                                    </div>
                                                    <span class="fw-separator"></span>
                                                    <div class="container">
                                                    	<div id="#send">
                                                			<div class="col-md-10" id="input-text-1" style="margin-top: 20px;">
                                                		
                                                			</div>
                                                			<div class="col-md-2" id="btn-reply-1" style="margin-top: 20px;" id="btn-send">
                                                		
                                                			</div>
                                                		</div>
                                                	</div>
                                                </div>
                                                <!--reviews-comments-item end-->  
                                                <!-- reviews-comments-item -->  
                                                <div class="reviews-comments-item reply-comment-item " id="reply1">
                                                    <div class="review-comments-avatar">
                                                        <img src="images/avatar/1.jpg" alt=""> 
                                                    </div>
                                                    <div class="reviews-comments-item-text">
                                                        <a href="" class="new-dashboard-item">Balas</a>
                                                        <h4><a href="#">Mark Rose</a></h4>
                                                        <div class="clearfix"></div>
                                                        <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                                                        <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>12 April 2018</span>
                                                    </div>
                                                    <span class="fw-separator"></span>
                                                </div>
                                                <!--reviews-comments-item end--> 
                                                <!-- reviews-comments-item -->  
                                                <div class="reviews-comments-item" id="comment2">
                                                    <div class="review-comments-avatar">
                                                        <img src="assets/user/images/avatar/1.jpg" alt=""> 
                                                    </div>
                                                    <div class="reviews-comments-item-text">
                                                        <a class="new-dashboard-item" id="btn-reply-comment-2" onclick="addInputComment('2')">Balas</a>
                                                        <h4><a href="#">Adam Koncy</a></h4>
                                                        <div class="clearfix"></div>
                                                        <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                                                        <span class="reviews-comments-item-date"><i class="fa fa-calendar-check-o"></i>03 December 2017</span>
                                                    </div>
                                                    <span class="fw-separator"></span>
                                                    <div class="container">
                                                    	<div id="#send">
                                                			<div class="col-md-10" id="input-text-2" style="margin-top: 20px;">
                                                		
                                                			</div>
                                                			<div class="col-md-2" id="btn-reply-2" style="margin-top: 20px;" id="btn-send">
                                                		
                                                			</div>
                                                		</div>
                                                	</div>
                                                </div>
                                                <!--reviews-comments-item end-->                                                                  
                                            </div>
                                        </div>
                                        <!-- list-single-main-item end -->   
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
                                                            <div class="col-md-6">
                                                                <label><i class="fa fa-user-o"></i></label>
                                                                <input type="text" placeholder="Your Name *" value=""/>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label><i class="fa fa-envelope-o"></i>  </label>
                                                                <input type="text" placeholder="Email Address*" value=""/>
                                                            </div>
                                                        </div>
                                                        <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                                                    </fieldset>
                                                    <button class="btn  big-btn  color-bg flat-btn">Kirim Komentar <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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
                                                <h3>Cari Berita : </h3>
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
                                                        <li class="clearfix">
                                                            <a href="#"  class="widget-posts-img"><img src="assets/user/images/all/1.jpg"  alt=""></a>
                                                            <div class="widget-posts-descr">
                                                                <a href="#" title="">Cafe "Lollipop"</a>
                                                                <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 21 Mar 2017 </span> 
                                                            </div>
                                                        </li>
                                                        <li class="clearfix">
                                                            <a href="#"  class="widget-posts-img"><img src="assets/user/images/all/1.jpg"  alt=""></a>
                                                            <div class="widget-posts-descr">
                                                                <a href="#" title=""> Apartment in the Center</a>
                                                                <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span> 
                                                            </div>
                                                        </li>
                                                        <li class="clearfix">
                                                            <a href="#"  class="widget-posts-img"><img src="assets/user/images/all/1.jpg"  alt=""></a>
                                                            <div class="widget-posts-descr">
                                                                <a href="#" title="">Event in City Mol</a>
                                                                <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix">
                                                            <a href="#"  class="widget-posts-img"><img src="assets/user/images/all/1.jpg"  alt=""></a>
                                                            <div class="widget-posts-descr">
                                                                <a href="#" title="">Event in City Mol</a>
                                                                <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                                                            </div>
                                                        </li>
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
                <!--content end --> 
            </div>
            <!-- wrapper end -->
@endsection