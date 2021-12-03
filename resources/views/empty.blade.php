@extends('layouts.mainlayout')

@section('content')

    <!-- Main Search start from here -->
    <section class="main-search-field main-search-field-two main-search-field-three at-over-layer-black" id="welcome-video">
        <a class="yt-bg-video" data-property="{videoURL:'https://www.youtube.com/watch?v=oIABm5MGcSA',containment:'#welcome-video', showControls:false, autoPlay:true, mute:true, loop:true, startAt:0, quality:'default', opacity:1,}"></a>


        <div class="container">

            {{-- words that will appears in the slider --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="at-col-default-mar clearfix">
                        <h1 id="text-animation">we are real estate company, find your dream home from here, we are very
                            helpful, We are very modern, we are very experienced</h1>
                    </div>
                </div>
            </div>

            {{-- search section --}}
            <div class="at-search-box">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="at-col-default-mar">
                            <select>
                                <option value="0" selected>Location</option>
                                <option value="1">Alabama</option>
                                <option value="2">Alaska</option>
                                <option value="3">California</option>
                                <option value="4">Colorado</option>
                                <option value="5">Delaware</option>
                                <option value="6">District of Columbia</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="at-col-default-mar">
                            <select class="div-toggle" data-target=".my-info-1">
                                <option value="0" data-show=".acitveon" selected>Property Status</option>
                                <option value="1" data-show=".sale">For Sale</option>
                                <option value="2" data-show=".rent">For Rent</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="at-col-default-mar">
                            <input class="at-input" type="text" name="min-area" placeholder="Squre Fit Min">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="at-col-default-mar">
                            <input class="at-input" type="text" name="max-area" placeholder="Squre Fit Max">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="at-col-default-mar">
                            <select>
                                <option value="0" selected>Bedroom</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="at-col-default-mar">
                            <select>
                                <option value="0" selected>Bathroom</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="at-col-default-mar">
                            <div class="at-pricing-range">
                                <div class="my-info-1">
                                    <h4>At first select Property Status</h4>
                                    <div class="acitveon sale hide">
                                        <label>Price : </label>
                                        <input type="text" class="amount at-input-price" readonly>
                                        <div class="slider-range"></div>
                                    </div>
                                    <div class="rent hide">
                                        <label>Price : </label>
                                        <input type="text" class="amount-two at-input-price" readonly>
                                        <div class="slider-range-two"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="at-col-default-mar">
                            <button class="btn btn-default hvr-bounce-to-right" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Search End -->

    <!-- About start from here -->
    <section class="at-about-sec">
        <div class="container justify-content-center">
            <div class="row animatedParent animateOnce">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="at-about-col at-col-default-mar">
                        <div class="at-about-title">
                            <h1>Few description<br> <span>about Homy</span></h1>
                            <h6>Real Estate</h6>
                        </div>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable. If you are going to use a passage of Lorem Ipsum.</p> <br>

                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable. If you are going to use a passage of Lorem Ipsum.</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="at-about-col animated fadeInRightShort slow delay-250">
                        <img src="{{ asset('app-assets/images/about/1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->

    <!-- Call start from here -->
    <section class="at-Call-sec jarallax at-over-layer-black">
        <div class="at-Call-both-side clearfix">
            <div class="at-Call-left">
                <div class="at-inside-Call">
                    <h5>BOOK YOUR</h5>
                    <h2>APPARTMENT OR HOUSE</h2>
                </div>
            </div>
            <div class="at-Call-right">
                <div class="at-Call-right-inside">
                    <h2>we are ready to receive your call</h2>
                    <div class="at-short-line"></div>
                    <h3><span>+0412 001 123</span></h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Call End -->

    <!-- Property start from here -->
    <section class="at-property-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="at-sec-title at-sec-title-left">
                        <h2>Awesome <span>Property</span></h2>
                        <div class="at-heading-under-line">
                            <div class="at-heading-inside-line"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum totam et dolores voluptatem porro
                            tempore temporibus ducimus</p>
                    </div>
                </div>
            </div>
            <div class="row animatedParent animateOnce">
                <div class="col-md-4 col-sm-6">
                    <div class="at-property-item at-col-default-mar animated fadeInUpShort slow">
                        <div class="at-property-img">
                            <img src="images/property/1.jpg" alt="">
                            <div class="at-property-overlayer"></div>
                            <a class="btn btn-default at-property-btn" href="properties-details.html" role="button">View
                                Details</a>
                            <h4>For Sale</h4>
                            <h5>$59,999</h5>
                        </div>
                        <div class="at-property-dis">
                            <ul>
                                <li><i class="fa fa-object-group" aria-hidden="true"></i> 520 sq ft</li>
                                <li><i class="fa fa-bed" aria-hidden="true"></i> 6</li>
                                <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>
                            </ul>
                        </div>
                        <div class="at-property-location">
                            <h4><i class="fa fa-home" aria-hidden="true"></i><a href="properties-details.html">New Superb
                                    Villa</a></h4>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> 123 1st Width Road, , summit, new york
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="at-property-item at-col-default-mar animated fadeInUpShort slow delay-250">
                        <div class="at-property-img">
                            <img src="images/property/2.jpg" alt="">
                            <div class="at-property-overlayer"></div>
                            <a class="btn btn-default at-property-btn" href="properties-details.html" role="button">View
                                Details</a>
                            <h4 class="at-bg-black">For Rent</h4>
                            <h5 class="at-bg-black">$59,999</h5>
                        </div>
                        <div class="at-property-dis">
                            <ul>
                                <li><i class="fa fa-object-group" aria-hidden="true"></i> 520 sq ft</li>
                                <li><i class="fa fa-bed" aria-hidden="true"></i> 6</li>
                                <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>
                            </ul>
                        </div>
                        <div class="at-property-location">
                            <h4><i class="fa fa-home" aria-hidden="true"></i><a href="properties-details.html">New Superb
                                    Villa</a></h4>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> 123 1st Width Road, , summit, new york
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="at-property-item at-col-default-mar animated fadeInUpShort slow delay-500">
                        <div class="at-property-img">
                            <img src="images/property/3.jpg" alt="">
                            <div class="at-property-overlayer"></div>
                            <a class="btn btn-default at-property-btn" href="properties-details.html" role="button">View
                                Details</a>
                            <h4>For Sale</h4>
                            <h5>$59,999</h5>
                        </div>
                        <div class="at-property-dis">
                            <ul>
                                <li><i class="fa fa-object-group" aria-hidden="true"></i> 520 sq ft</li>
                                <li><i class="fa fa-bed" aria-hidden="true"></i> 6</li>
                                <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>
                            </ul>
                        </div>
                        <div class="at-property-location">
                            <h4><i class="fa fa-home" aria-hidden="true"></i><a href="properties-details.html">New Superb
                                    Villa</a></h4>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> 123 1st Width Road, , summit, new york
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="at-property-item at-col-default-mar animated fadeInUpShort slow delay-750">
                        <div class="at-property-img">
                            <img src="images/property/4.jpg" alt="">
                            <div class="at-property-overlayer"></div>
                            <a class="btn btn-default at-property-btn" href="properties-details.html" role="button">View
                                Details</a>
                            <h4 class="at-bg-black">For Rent</h4>
                            <h5 class="at-bg-black">$59,999</h5>
                        </div>
                        <div class="at-property-dis">
                            <ul>
                                <li><i class="fa fa-object-group" aria-hidden="true"></i> 520 sq ft</li>
                                <li><i class="fa fa-bed" aria-hidden="true"></i> 6</li>
                                <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>
                            </ul>
                        </div>
                        <div class="at-property-location">
                            <h4><i class="fa fa-home" aria-hidden="true"></i><a href="properties-details.html">New Superb
                                    Villa</a></h4>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> 123 1st Width Road, , summit, new york
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="at-property-item at-col-default-mar animated fadeInUpShort slow delay-1000">
                        <div class="at-property-img">
                            <img src="images/property/5.jpg" alt="">
                            <div class="at-property-overlayer"></div>
                            <a class="btn btn-default at-property-btn" href="properties-details.html" role="button">View
                                Details</a>
                            <h4>For Sale</h4>
                            <h5>$59,999</h5>
                        </div>
                        <div class="at-property-dis">
                            <ul>
                                <li><i class="fa fa-object-group" aria-hidden="true"></i> 520 sq ft</li>
                                <li><i class="fa fa-bed" aria-hidden="true"></i> 6</li>
                                <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>
                            </ul>
                        </div>
                        <div class="at-property-location">
                            <h4><i class="fa fa-home" aria-hidden="true"></i><a href="properties-details.html">New Superb
                                    Villa</a></h4>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> 123 1st Width Road, , summit, new york
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="at-property-item at-col-default-mar animated fadeInUpShort slow delay-1250">
                        <div class="at-property-img">
                            <img src="images/property/6.jpg" alt="">
                            <div class="at-property-overlayer"></div>
                            <a class="btn btn-default at-property-btn" href="properties-details.html" role="button">View
                                Details</a>
                            <h4 class="at-bg-black">For Rent</h4>
                            <h5 class="at-bg-black">$59,999</h5>
                        </div>
                        <div class="at-property-dis">
                            <ul>
                                <li><i class="fa fa-object-group" aria-hidden="true"></i> 520 sq ft</li>
                                <li><i class="fa fa-bed" aria-hidden="true"></i> 6</li>
                                <li><i class="fa fa-bath" aria-hidden="true"></i> 3</li>
                            </ul>
                        </div>
                        <div class="at-property-location">
                            <h4><i class="fa fa-home" aria-hidden="true"></i><a href="properties-details.html">New Superb
                                    Villa</a></h4>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> 123 1st Width Road, , summit, new york
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 text-center">
                    <a class="btn btn-default hvr-bounce-to-right" href="properties-col-3.html" role="button">More
                        Properties</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Property End -->

    <!-- Agents start from here -->
    <section class="at-agents-sec at-agents-sec-two jarallax  at-over-layer-black">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="at-sec-title">
                        <h2>Our valuable <span>Agents</span></h2>
                        <div class="at-heading-under-line">
                            <div class="at-heading-inside-line"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum totam et dolores voluptatem porro
                            tempore temporibus ducimus</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="agent-carousel" data-slick='{"slidesToShow": 4, "slidesToScroll": 1}'>
                        <div class="at-agent-col">
                            <div class="at-agent-img">
                                <img src="images/agents/1.png" alt="">
                                <div class="at-agent-social">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                                    <div class="at-agent-call">
                                        <p>+101 4326 0055</p>
                                    </div>
                                </div>
                            </div>
                            <div class="at-agent-info">
                                <h4><a href="agents-details.html">Martin Guptil</a></h4>
                                <p>sales executive</p>
                            </div>
                        </div>
                        <div class="at-agent-col">
                            <div class="at-agent-img">
                                <img src="images/agents/2.png" alt="">
                                <div class="at-agent-social">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                                    <div class="at-agent-call">
                                        <p>+101 4326 0055</p>
                                    </div>
                                </div>
                            </div>
                            <div class="at-agent-info">
                                <h4><a href="agents-details.html">Jesica Mile</a></h4>
                                <p>sales executive</p>
                            </div>
                        </div>
                        <div class="at-agent-col">
                            <div class="at-agent-img">
                                <img src="images/agents/3.png" alt="">
                                <div class="at-agent-social">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                                    <div class="at-agent-call">
                                        <p>+101 4326 0055</p>
                                    </div>
                                </div>
                            </div>
                            <div class="at-agent-info">
                                <h4><a href="agents-details.html">Thomas Jons</a></h4>
                                <p>sales executive</p>
                            </div>
                        </div>
                        <div class="at-agent-col">
                            <div class="at-agent-img">
                                <img src="images/agents/4.png" alt="">
                                <div class="at-agent-social">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                                    <div class="at-agent-call">
                                        <p>+101 4326 0055</p>
                                    </div>
                                </div>
                            </div>
                            <div class="at-agent-info">
                                <h4><a href="agents-details.html">Cris Jordan</a></h4>
                                <p>sales executive</p>
                            </div>
                        </div>
                        <div class="at-agent-col">
                            <div class="at-agent-img">
                                <img src="images/agents/5.png" alt="">
                                <div class="at-agent-social">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                                    <div class="at-agent-call">
                                        <p>+101 4326 0055</p>
                                    </div>
                                </div>
                            </div>
                            <div class="at-agent-info">
                                <h4><a href="agents-details.html">Marri Guptil</a></h4>
                                <p>sales executive</p>
                            </div>
                        </div>
                        <div class="at-agent-col">
                            <div class="at-agent-img">
                                <img src="images/agents/6.png" alt="">
                                <div class="at-agent-social">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                                    <div class="at-agent-call">
                                        <p>+101 4326 0055</p>
                                    </div>
                                </div>
                            </div>
                            <div class="at-agent-info">
                                <h4><a href="agents-details.html">Martin Mozina</a></h4>
                                <p>sales executive</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Agents End -->

    <!-- Blog start from here -->
    <section class="at-blog-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="at-sec-title at-sec-title-left">
                        <h2>Our <span>Blog</span></h2>
                        <div class="at-heading-under-line">
                            <div class="at-heading-inside-line"></div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum totam et dolores voluptatem porro
                            tempore temporibus ducimus</p>
                    </div>
                </div>
            </div>
            <div class="row animatedParent animateOnce">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="at-blog-box at-col-default-mar animated fadeInUpShort slow">
                        <div class="at-blog-img">
                            <img src="images/blog/1.jpg" alt="">
                            <div class="at-blog-date">
                                <ul>
                                    <li><i class="icofont icofont-businessman"></i><a href="#">Mark Jonson</a>
                                    </li>
                                    <li><i class="icofont icofont-calendar"></i><a href="#">June 28, 2017</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="at-blog-content">
                            <h4><a href="blog-details.html">latest design of house</a></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard</p>
                            <a href="blog-details.html">Read More <i class="zmdi zmdi-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="at-blog-box at-col-default-mar animated fadeInUpShort slow delay-250">
                        <div class="at-blog-img">
                            <img src="images/blog/2.jpg" alt="">
                            <div class="at-blog-date">
                                <ul>
                                    <li><i class="icofont icofont-businessman"></i><a href="#">Thomas Roy</a>
                                    </li>
                                    <li><i class="icofont icofont-calendar"></i><a href="#">June 29, 2017</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="at-blog-content">
                            <h4><a href="blog-details.html">strong house project</a></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard</p>
                            <a href="blog-details.html">Read More <i class="zmdi zmdi-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="at-blog-box at-col-default-mar animated fadeInUpShort slow delay-500">
                        <div class="at-blog-img">
                            <img src="images/blog/3.jpg" alt="">
                            <div class="at-blog-date">
                                <ul>
                                    <li><i class="icofont icofont-businessman"></i><a href="#">Nelson Monika</a>
                                    </li>
                                    <li><i class="icofont icofont-calendar"></i><a href="#">June 30, 2017</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="at-blog-content">
                            <h4><a href="blog-details.html">popular design of house</a></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard</p>
                            <a href="blog-details.html">Read More <i class="zmdi zmdi-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Newsletter start from here -->
    <section class="at-newsletter-sec jarallax at-over-layer-black">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-8">
                    <h2>subscribe <span>newsletter</span></h2>
                    <p>consectetur adipisicing elit. Beatae ducimus in enim quae</p>
                    <form class="input-group">
                        <input type="email" class="form-control" placeholder="Enter Your Email">
                        <div class="input-group-append">
                            <span class="input-group-text at-sub-btn"><a href="#"
                                    class="hvr-bounce-to-right">SUBSCRIBE</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter end -->

    <!-- Brand start from here -->
    <section class="at-brand-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-carousel" data-slick='{"slidesToShow": 6, "slidesToScroll": 1}'>
                        <div class="item">
                            <a href="#"><img src="images/brand/1.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/2.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/3.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/4.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/5.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/6.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/1.jpg" alt="">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="images/brand/2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand End -->

@endsection
