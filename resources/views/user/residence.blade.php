@extends('layouts.user')
@section('judul','User | Perumahan Page')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#beranda').removeClass('act-link');
        $('#news').removeClass('act-link');
        $('#kpr').removeClass('act-link');
        $('#perumahan').addClass('act-link');
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
                                        <h3>Results For : <span>All Listings</span></h3>
                                        <div class="listing-view-layout">
                                            <ul>
                                                <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                                                <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- listsearch-input-wrap  -->  
                                    <div class="listsearch-input-wrap fl-wrap">
                                        <div class="listsearch-input-item">
                                            <i class="mbri-key single-i"></i>
                                            <input type="text" placeholder="Keywords?" value=""/>
                                        </div>
                                        <div class="listsearch-input-item">
                                            <select data-placeholder="Location" class="chosen-select" name="category_properti">
                                                <option value="semua">Semua</option>
                                                <option value="rumah">Rumah</option>
                                                <option value="tanah">Tanah</option>
                                            </select>
                                        </div>
                                        <div class="listsearch-input-item" id="test">
                                            <select class="chosen-select" name="category_detail">
                                                <option>Pilih Kategori Properti Dahulu</option>
                                            </select>
                                        </div>
                                        <!-- hidden-listing-filter -->
                                        <div class="hidden-listing-filter fl-wrap">
                                            <div class="distance-input fl-wrap">
                                                <div class="distance-title min"> Min Harga <span></span> juta</div>
                                                <div class="distance-radius-wrap fl-wrap">
                                                    <input class="distance-radius rangeslider--horizontal min" id="min-price" type="range" min="100" max="1000000" step="1" value="100" data-title="Radius around selected destination">
                                                </div>
                                            </div>
                                            <div class="distance-input fl-wrap">
                                                <div class="distance-title max"> Max Harga <span></span> juta</div>
                                                <div class="distance-radius-wrap fl-wrap">
                                                    <input class="distance-radius rangeslider--horizontal max" id="max-price" type="range" min="100" max="1000000" step="2" value="100" data-title="Radius around selected destination">
                                                </div>
                                            </div>
                                            <!-- Checkboxes -->
                                            <div class=" fl-wrap filter-tags">
                                                <h4>Filter by Tags</h4>
                                                <div class="filter-tags-wrap">
                                                    <input id="check-a" type="checkbox" name="check" checked>
                                                    <label for="check-a">Elevator in building</label>
                                                </div>
                                                <div class="filter-tags-wrap">
                                                    <input id="check-b" type="checkbox" name="check">
                                                    <label for="check-b">Friendly workspace</label>
                                                </div>
                                                <div class="filter-tags-wrap">	
                                                    <input id="check-c" type="checkbox" name="check">
                                                    <label for="check-c">Instant Book</label>
                                                </div>
                                                <div class="filter-tags-wrap">
                                                    <input id="check-d" type="checkbox" name="check">
                                                    <label for="check-d">Wireless Internet</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- hidden-listing-filter end -->
                                        <button class="button fs-map-btn">Update</button>
                                        <div class="more-filter-option">More Filters <span></span></div>
                                    </div>
                                    <!-- listsearch-input-wrap end -->   
                                </div>
                                <!-- list-main-wrap-->
                                <div class="list-main-wrap fl-wrap card-listing">
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
                                                <h3><a href="/residence">Perumahan {{$i}}</a></h3>
                                                <p>Kelebihan 1.</p>
                                                <div class="geodir-category-options fl-wrap">
                                                    <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Alamat perumahan {{$i}}</a></div>
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