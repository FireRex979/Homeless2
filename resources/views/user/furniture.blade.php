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
                    <!--  section  --> 
                    <section class="gray-bg no-pading no-top-padding" id="sec1">
                        <div class="col-list-wrap  center-col-list-wrap left-list">
                            <div class="container">
                                <div class="listsearch-maiwrap box-inside fl-wrap">
                                    <div class="listsearch-header fl-wrap">
                                        <h3>Furniture <span>dan</span> Paket Furniture</h3>
                                    </div>
                                    <!-- listsearch-input-wrap  -->  
                                    <div class="listsearch-input-wrap fl-wrap">
                                        <div class="listsearch-input-item">
                                            <i class="mbri-key single-i"></i>
                                            <input type="text" placeholder="Cari Sesuatu?" value=""/>
                                        </div>
                                        <div class="listsearch-input-item">
                                            <select data-placeholder="Location" class="chosen-select" name="category_properti">
                                                <option value="semua">Semua</option>
                                                <option value="paket">Paket</option>
                                                <option value="furniture">Furniture</option>
                                            </select>
                                        </div>
                                        <div class="listsearch-input-item" id="test">
                                            <select class="chosen-select" name="category_detail">
                                                <option>Pilih Kategori Properti Dahulu</option>
                                            </select>
                                        </div>
                                        <!-- hidden-listing-filter -->
                                        <div class="hidden-listing-filter fl-wrap" style="margin-top: 20px;">
                                            <div class="listsearch-input-item">
                                                <select data-placeholder="Location" class="chosen-select" name="category_properti">
                                                    <option value="semua">Minimal Harga</option>
                                                    <option value="rumah">10 juta</option>
                                                    <option value="tanah">50 juta</option>
                                                    <option value="tanah">100 juta</option>
                                                    <option value="tanah">150 juta</option>
                                                </select>
                                            </div>
                                            <div class="listsearch-input-item">
                                                <select data-placeholder="Location" class="chosen-select" name="category_properti">
                                                    <option value="semua">Maksimal Harga</option>
                                                    <option value="rumah">10 juta</option>
                                                    <option value="tanah">50 juta</option>
                                                    <option value="tanah">100 juta</option>
                                                    <option value="tanah">150 juta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- hidden-listing-filter end -->
                                        <button class="button fs-map-btn" style="margin-top: 10px;">Update</button>
                                        <div class="more-filter-option">More Filters <span></span></div>
                                    </div>
                                    <!-- listsearch-input-wrap end -->   
                                </div>
                                <!-- list-main-wrap-->
                                 <!--section -->
                    <section class="gray-section">
                        <div class="container">
                            <div class="section-title">
                                <h2>List Paket Furniture</h2>
                                <span class="section-separator"></span>
                                <p>Dapatkan Paket Furniture yang lebih murah!</p>
                            </div>
                        </div>
                        <!-- carousel -->
                        <div class="list-carousel fl-wrap card-listing ">
                            <!--listing-carousel-->
                            <div class="listing-carousel  fl-wrap ">
                                <!--slick-slide-item-->
                                @for($i=1;$i<=9;$i++)
                                    <!-- listing-item -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img src="assets/user/images/all/1.jpg" alt="">
                                                <div class="overlay"></div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <a class="listing-geodir-category" href="/residence-detail">Lihat</a>
                                                <h3><a href="/furniture-detail">Paket Furniture {{$i}}</a></h3>
                                                <p>Deskripsi Paket Furniture</p>
                                                <div class="geodir-category-options fl-wrap">
                                                    <div class="geodir-category-location"><p > Rp. {{$i * 1000000}}</p></div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    @endfor
                            </div>
                            <!--listing-carousel end-->
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                        </div>
                        <!--  carousel end-->
                    </section>
                    <!-- section end -->
                                <div class="list-main-wrap fl-wrap card-listing">
                                    <div class="section-title">
                                        <h2>List Furniture</h2>
                                        <span class="section-separator"></span>
                                        <p>Dapatkan Furniture yang Berkelas!</p>
                                    </div>
                                    @for($i=1;$i<=9;$i++)
                                    <!-- listing-item -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img src="assets/user/images/all/1.jpg" alt="">
                                                <div class="overlay"></div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <a class="listing-geodir-category" href="/residence-detail">Lihat</a>
                                                <h3><a href="/furniture-detail">Furniture {{$i}}</a></h3>
                                                <p>Deskripsi Furniture</p>
                                                <div class="geodir-category-options fl-wrap">
                                                    <div class="geodir-category-location"><p > Rp. {{$i * 1000000}}</p></div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    @if($i%3==0)
                                        <div class="clearfix"></div>  
                                    @endif
                                    <!-- listing-item end-->
                                    @endfor                                                                           
                                    <!-- pagination-->
                                    <div class="pagination">
                                        <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                        <a href="#" class="blog-page current-page transition">1</a>
                                        <a href="#" class="blog-page transition">2</a>
                                        <a href="#" class="blog-page transition">3</a>
                                        <a href="#" class="blog-page transition">4</a>
                                        <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                    </div>
                                </div>
                                <!-- list-main-wrap end-->                           
                            </div>
                        </div>
                    </section>
                    <!--  section  end--> 
                </div>
                <!--  content  end--> 
            </div>
            <!-- wrapper end -->
@endsection