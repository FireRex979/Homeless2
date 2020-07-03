@extends('layouts.user')
@section('judul','User | Furniture')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#beranda').removeClass('act-link');
        $('#news').removeClass('act-link');
        $('#kpr').removeClass('act-link');
        $('#perumahan').removeClass('act-link');
        $('#furniture').addClass('act-link');
    });
</script>
 <!-- wrapper -->	
            <div id="wrapper">
                <!--  content  --> 
                <div class="content">
                    <!--  section  end--> 
                    <!--  section  --> 
                    <section class="parallax-section" data-scrollax-parent="true">
                        <div class="bg par-elem "  data-bg="assets/user/images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title center-align">
                                <h2><span>Furniture</span></h2>
                                <div class="breadcrumbs fl-wrap"><a href="#">Beranda</a><span>Furniture</span></div>
                                <span class="section-separator"></span>
                            </div>
                        </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec1" class="custom-scroll-link">Let's Start</a></div>
                        </div>
                    </section>
                    <!--  section  end--> 
                    <!--  section  --> 
                    <section class="gray-bg no-pading no-top-padding" id="sec1">
                        <div class="col-list-wrap fh-col-list-wrap  left-list">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="listsearch-header fl-wrap">
                                            <h3>Results For : <span>Semua</span></h3>
                                            <div class="listing-view-layout">
                                                <ul>
                                                    <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                                                    <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- list-main-wrap-->
                                        <div class="list-main-wrap fl-wrap card-listing">
                                            <!-- listing-item -->
                                            @for($i=1;$i<=3;$i++)
                                            <div class="listing-item">
                                                <article class="geodir-category-listing fl-wrap">
                                                    <div class="geodir-category-img">
                                                        <img src="assets/user/images/all/1.jpg" alt="">
                                                        <div class="overlay"></div>
                                                    </div>
                                                    <div class="geodir-category-content fl-wrap">
                                                        <a class="listing-geodir-category" href="listing.html">Cek</a>
                                                        <h3><a href="listing-single.html">Furniture {{$i}}</a></h3>
                                                        <p>Sed interdum metus at nisi tempor laoreet. Integer gravida orci a justo sodales, sed lobortis est placerat.</p>
                                                        <div class="geodir-category-options fl-wrap">
                                                            <div class="geodir-category-location"><a href="#"><i class="fa fa-money-bill-wave" aria-hidden="true"></i> Rp. 10000000</a></div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <!-- listing-item end-->                           
                                            <!-- listing-item -->
                                            <div class="listing-item">
                                                <article class="geodir-category-listing fl-wrap">
                                                    <div class="geodir-category-img">
                                                        <img src="assets/user/images/all/1.jpg" alt="">
                                                        <div class="overlay"></div>
                                                    </div>
                                                    <div class="geodir-category-content fl-wrap">
                                                        <a class="listing-geodir-category" href="listing.html">Cek</a>
                                                        <h3><a href="listing-single.html">Furniture {{$i+1}}</a></h3>
                                                        <p>Morbi suscipit erat in diam bibendum rutrum in nisl. Aliquam et purus ante.</p>
                                                        <div class="geodir-category-options fl-wrap">
                                                            <div class="geodir-category-location"><a href="#"><i class="fa fa-money-bill-wave" aria-hidden="true"></i> Rp. 10000000</a></div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <!-- listing-item end-->  
                                            <div class="clearfix"></div>
                                            @endfor
                                            <!-- listing-item end-->   
                                            <!-- pagination-->
                                            <div class="pagination">
                                                <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                                <a href="#" class="blog-page transition">1</a>
                                                <a href="#" class="blog-page current-page transition">2</a>
                                                <a href="#" class="blog-page transition">3</a>
                                                <a href="#" class="blog-page transition">4</a>
                                                <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- list-main-wrap end-->                           
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fl-wrap">
                                            <!-- listsearch-input-wrap  -->  
                                            <div class="listsearch-input-wrap fl-wrap">
                                                <div class="listsearch-input-item">
                                                    <i class="mbri-key single-i"></i>
                                                    <input type="text" placeholder="Cari Sesuatu?" value=""/>
                                                </div>
                                                <div class="listsearch-input-item">
                                                    <select data-placeholder="All Categories" class="chosen-select" >
                                                        <option>Semua Kategori</option>
                                                        <option>Shops</option>
                                                        <option>Hotels</option>
                                                        <option>Restaurants</option>
                                                        <option>Fitness</option>
                                                        <option>Events</option>
                                                    </select>
                                                </div>
                                                <!-- hidden-listing-filter end -->
                                                <button class="button fs-map-btn">Cari</button>
                                            </div>
                                            <!-- listsearch-input-wrap end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--  section  end--> 
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!-- content end--> 
            </div>
            <!-- wrapper end -->
@endsection