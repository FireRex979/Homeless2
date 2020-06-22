@extends('layouts.user')
@section('judul','User | Home Page')
@section('content')
        <!--  wrapper  -->
            <div id="wrapper">
                <!-- Content-->
                <div class="content">
                    <!--section -->
                    <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
                        <div class="bg"  data-bg="assets/user/images/bg/bg-home-1920x1080.jpg" data-scrollax="properties: { translateY: '200px' }"></div>
                        <div class="overlay"></div>
                        <div class="hero-section-wrap fl-wrap">
                            <div class="container">
                                <div class="intro-item fl-wrap">
                                    <h2>We will help you to find all</h2>
                                    <h3>Find great places for your family.</h3>
                                </div>
                                <div class="main-search-input-wrap">
                                    <div class="main-search-input fl-wrap">
                                        <div class="main-search-input-item">
                                            <input type="text" placeholder="Cari Properti" value=""/>
                                        </div>
                                        <div class="main-search-input-item">
                                            <select data-placeholder="All Categories" class="chosen-select" >
                                                <option>Jenis Properti</option>
                                                <option>Tanah</option>
                                                <option>Rumah</option>
                                                <option>Ruko</option>
                                            </select>
                                        </div>
                                        <div class="main-search-input-item">
                                            <select data-placeholder="All Categories" class="chosen-select" >
                                                <option>Tipe Rumah</option>
                                                <option>Tipe 1</option>
                                                <option>Tipe 2</option>
                                                <option>Tipe 3</option>
                                                <option>Tipe 4</option>
                                                <option>Tipe 5</option>
                                            </select>
                                        </div>
                                        <button class="main-search-button" onclick="window.location.href='listings-half-screen-map-list.html'">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bubble-bg"> </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec2" class="custom-scroll-link">Let's Start</a></div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section id="sec2">
                        <div class="container">
                            <div class="section-title">
                                <h2>Tipe - Tipe Rumah</h2>
                                <!-- <div class="section-subtitle">Catalog of Categories</div> -->
                                <span class="section-separator"></span>
                                <p>Explore some of the best tips from around the city from our partners and friends.</p>
                            </div>
                            <!-- portfolio start -->
                            <div class="gallery-items fl-wrap mr-bot spad">
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <img  src="assets/user/images/all/tipe-rumah-21.jpg"   alt="">
                                            <div class="listing-counter"><span>Tersedia </span> 10 Buah</div>
                                            <div class="listing-item-cat">
                                                <h3><a href="listing.html">Rumah Tipe 21/24</a></h3>
                                                <p> Dimensi rumah mulai dari 3 x 7 meter atau 4 x 6 meter.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item gallery-item-second">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <img  src="assets/user/images/bg/tipe-rumah-120.jpg"   alt="">
                                            <div class="listing-counter"><span>Tersedia </span> 6 Buah</div>
                                            <div class="listing-item-cat">
                                                <h3><a href="listing.html">Rumah Tipe 120</a></h3>
                                                <p> Dimensi rumah mulai dari 10 x 12 meter atau 8 x 15 meter.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <img  src="assets/user/images/all/tipe-rumah-36.jpg"   alt="">
                                            <div class="listing-counter"><span>Tersedia </span> 21 Buah</div>
                                            <div class="listing-item-cat">
                                                <h3><a href="listing.html">Rumah Tipe 36</a></h3>
                                                <p>Luas Rumah ini 36 meter persegi.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <img  src="assets/user/images/all/tipe-rumah-45.jpg"   alt="">
                                            <div class="listing-counter"><span>Tersedia </span> 7 Buah</div>
                                            <div class="listing-item-cat">
                                                <h3><a href="listing.html">Tipe Rumah 45</a></h3>
                                                <p>Dimensi rumah 7,5 x 6 meter.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <img  src="assets/user/images/all/1.jpg"   alt="">
                                            <div class="listing-counter"><span>15 </span> Locations</div>
                                            <div class="listing-item-cat">
                                                <h3><a href="listing.html">Shop - Store</a></h3>
                                                <p>Constant care and attention to the patients makes good record</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                            </div>
                            <!-- portfolio end -->
                            <a href="listing.html" class="btn  big-btn circle-btn dec-btn  color-bg flat-btn">View All<i class="fa fa-eye"></i></a>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section class="gray-section">
                        <div class="container">
                            <div class="section-title">
                                <h2>List Perumahan</h2>
                                <span class="section-separator"></span>
                                <p>Nulla tristique mi a massa convallis cursus. Nulla eu mi magna.</p>
                            </div>
                        </div>
                        <!-- carousel -->
                        <div class="list-carousel fl-wrap card-listing ">
                            <!--listing-carousel-->
                            <div class="listing-carousel  fl-wrap ">
                                <!--slick-slide-item-->
                                @for($i=0;$i<6;$i++)
                                <div class="slick-slide-item">
                                    <!-- listing-item -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img src="assets/user/images/all/1.jpg" alt="">
                                                <div class="overlay"></div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <a class="listing-geodir-category" href="/residence">Lihat</a>
                                                <h3><a href="listing-single.html">Perumahan {{$i}}</a></h3>
                                                <p>Kelebihan Perumahan 1.  </p>
                                                <p>Kelebihan Perumahan 2.  </p>
                                                <div class="geodir-category-options fl-wrap">
                                                    <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Alamat Perumahan {{$i}}</a></div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end-->
                                </div>
                                @endfor
                                <!--slick-slide-item end-->
                            </div>
                            <!--listing-carousel end-->
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                        </div>
                        <!--  carousel end-->
                    </section>
                    <!-- section end -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <h2>Berita</h2>
                                <span class="section-separator"></span>
                                <p>Browse the latest articles from our blog.</p>
                            </div>
                            <div class="row home-posts">
                                @for($i=1;$i<=3;$i++)
                                <div class="col-md-4">
                                    <article class="card-post">
                                        <div class="card-post-img fl-wrap">
                                            <a href="blog-single.html"><img src="assets/user/images/all/1.jpg"   alt=""></a>
                                        </div>
                                        <div class="card-post-content fl-wrap">
                                            <h3><a href="blog-single.html">Berita {{$i}}</a></h3>
                                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                            <div class="post-author"><a href="#"><img src="images/avatar/1.jpg" alt=""><span>By , Alisa Noory</span></a></div>
                                            <div class="post-opt">
                                                <ul>
                                                    <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>
                                                    <li><i class="fa fa-eye"></i> <span>264</span></li>
                                                    <li><i class="fa fa-tags"></i> <a href="#">Photography</a>  </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endfor
                            </div>
                            <a href="blog.html" class="btn  big-btn circle-btn  dec-btn color-bg flat-btn">Read All<i class="fa fa-eye"></i></a>
                        </div>
                    </section>
                    <!--section -->
                    <!--section -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <h2>Bagaimana Cara membeli Rumah?</h2>
                                <span class="section-separator"></span>
                                <p>Explore some of the best tips from around the world.</p>
                            </div>
                            <!--process-wrap  -->
                            <div class="process-wrap fl-wrap">
                                <ul>
                                    <li>
                                        <div class="process-item">
                                            <span class="process-count">01 . </span>
                                            <div class="time-line-icon"><i class="fa fa-map-o"></i></div>
                                            <h4> Find Interesting Place</h4>
                                            <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut, convallis eros sollicitudin turpis.</p>
                                        </div>
                                        <span class="pr-dec"></span>
                                    </li>
                                    <li>
                                        <div class="process-item">
                                            <span class="process-count">02 .</span>
                                            <div class="time-line-icon"><i class="fa fa-envelope-open-o"></i></div>
                                            <h4> Contact a Few Owners</h4>
                                            <p>Faucibus ante, in porttitor tellus blandit et. Phasellus tincidunt metus lectus sollicitudin feugiat pharetra consectetur.</p>
                                        </div>
                                        <span class="pr-dec"></span>
                                    </li>
                                    <li>
                                        <div class="process-item">
                                            <span class="process-count">03 .</span>
                                            <div class="time-line-icon"><i class="fa fa-hand-peace-o"></i></div>
                                            <h4> Make a Listing</h4>
                                            <p>Maecenas pulvinar, risus in facilisis dignissim, quam nisi hendrerit nulla, id vestibulum metus nullam viverra porta.</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="process-end"><i class="fa fa-check"></i></div>
                            </div>
                            <!--process-wrap   end-->
                        </div>
                    </section>
                    <!--section -->
                    <section class="color-bg">
                        <div class="shapes-bg-big"></div>
                        <div class="container">
                            <div class=" single-facts fl-wrap">
                                <!-- inline-facts -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="254">154</div>
                                            </div>
                                        </div>
                                        <h6>New Visiters Every Week</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="12168">12168</div>
                                            </div>
                                        </div>
                                        <h6>Happy customers every year</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="172">172</div>
                                            </div>
                                        </div>
                                        <h6>Won Awards</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                                <!-- inline-facts  -->
                                <div class="inline-facts-wrap">
                                    <div class="inline-facts">
                                        <div class="milestone-counter">
                                            <div class="stats animaper">
                                                <div class="num" data-content="0" data-num="732">732</div>
                                            </div>
                                        </div>
                                        <h6>New Listing Every Week</h6>
                                    </div>
                                </div>
                                <!-- inline-facts end -->
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <h2>Testimoni</h2>
                                <div class="section-subtitle">Clients Reviews</div>
                                <span class="section-separator"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                            </div>
                        </div>
                        <!-- testimonials-carousel -->
                        <div class="carousel fl-wrap">
                            <!--testimonials-carousel-->
                            <div class="testimonials-carousel single-carousel fl-wrap">
                                <!--slick-slide-item-->
                                @for($i=1;$i<=4;$i++)
                                <div class="slick-slide-item">
                                    <div class="testimonilas-text">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi arch itecto beatae vitae dicta sunt explicabo. </p>
                                    </div>
                                    <div class="testimonilas-avatar-item">
                                        <div class="testimonilas-avatar"><img src="assets/user/images/avatar/1.jpg" alt=""></div>
                                        <h4>Tester {{$i}}</h4>
                                        <span>Pekerjaan Tester {{$i}}</span>
                                    </div>
                                </div>
                                @endfor
                                <!--slick-slide-item end-->
                            </div>
                            <!--testimonials-carousel end-->
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                        </div>
                        <!-- carousel end-->
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section class="gray-section">
                        <div class="container">
                            <div class="fl-wrap spons-list">
                                <ul class="client-carousel">
                                    <li><a href="#" target="_blank"><img src="assets/user/images/clients/1.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="assets/user/images/clients/1.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="assets/user/images/clients/1.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="assets/user/images/clients/1.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="assets/user/images/clients/1.png" alt=""></a></li>
                                    <li><a href="#" target="_blank"><img src="assets/user/images/clients/1.png" alt=""></a></li>
                                </ul>
                                <div class="sp-cont sp-cont-prev"><i class="fa fa-angle-left"></i></div>
                                <div class="sp-cont sp-cont-next"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->
                    
                    <!-- section end -->
                    <!--section -->
                    <section class="gradient-bg">
                        <div class="cirle-bg">
                            <div class="bg" data-bg="assets/user/images/bg/circle.png"></div>
                        </div>
                        <div class="container">
                            <div class="join-wrap fl-wrap">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3>Do You Have Questions ?</h3>
                                        <p>Lorem ipsum dolor sit amet, harum dolor nec in, usu molestiae at no.</p>
                                    </div>
                                    <div class="col-md-4"><a href="contacts.html" class="join-wrap-btn">Get In Touch <i class="fa fa-envelope-o"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                </div>
                <!-- Content end -->
            </div>
            <!-- wrapper end -->
@endsection