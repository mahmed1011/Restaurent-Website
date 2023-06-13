@extends('layout')
@section('content')
@include('sweetalert::alert')
    <!DOCTYPE html>
    <html lang="en">

    <body>

        <!-- ***** Preloader Start ***** -->
        <div id="preloader">rtisan serve
            <div class="jumper">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- ***** Preloader End ***** -->



        <!-- ***** Main Banner Area Start ***** -->
        <div id="top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="left-content">
                            <div class="inner-content">
                                <h4>KlassyCafe</h4>
                                <h6>THE BEST EXPERIENCE</h6>
                                <div class="main-white-button scroll-to-section">
                                    <a href="#reservation">Make A Reservation</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-banner header-text">
                            <div class="Modern-Slider">
                                <!-- Item -->
                                <div class="item">
                                    <div class="img-fill">
                                        <img src="{{ asset('') }}assets/images/slide-01.jpg" alt="">
                                    </div>
                                </div>
                                <!-- // Item -->
                                <!-- Item -->
                                <div class="item">
                                    <div class="img-fill">
                                        <img src="{{ asset('') }}assets/images/slide-02.jpg" alt="">
                                    </div>
                                </div>
                                <!-- // Item -->
                                <!-- Item -->
                                <div class="item">
                                    <div class="img-fill">
                                        <img src="{{ asset('') }}assets/images/slide-03.jpg" alt="">
                                    </div>
                                </div>
                                <!-- // Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Main Banner Area End ***** -->

        <!-- ***** About Area Starts ***** -->
        <section class="section" id="about">
            <div class="container" style="max-width: 1326px">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="left-text-content">
                            <div class="section-heading">
                                <h6>About Us</h6>
                                <h2>We Leave A Delicious Memory For You</h2>
                            </div>
                            <p>Klassy Cafe is one of the best <a href="https://templatemo.com/tag/restaurant"
                                    target="_blank" rel="sponsored">restaurant HTML templates</a> with Bootstrap v4.5.2 CSS
                                framework. You can download and feel free to use this website template layout for your
                                restaurant business. You are allowed to use this template for commercial purposes.
                                <br><br>You are NOT allowed to redistribute the template ZIP file on any template donwnload
                                website. Please contact us for more information.
                            </p>
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('') }}assets/images/about-thumb-01.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img src="{{ asset('') }}assets/images/about-thumb-02.jpg" alt="">
                                </div>
                                <div class="col-4">
                                    <img src="{{ asset('') }}assets/images/about-thumb-03.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="right-content">
                            <div class="thumb">
                                <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
                                <img src="{{ asset('') }}assets/images/about-video-bg.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** About Area Ends ***** -->

        <!-- ***** Menu Area Starts ***** -->
        <section class="section" id="menu" style="max-width: 1326px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-heading">
                            <h6>Our Menu</h6>
                            <h2>Our selection of cakes with quality taste</h2>
                        </div>
                    </div>
                    <form action="{{ route('search') }}" method="GET" class="form-inline ml-5"
                        style=" display: flex;
                        float: right; padding-bottom: 3%; padding-left: 69%;">
                        @csrf
                        <input type="search" class="form-control" name="search" placeholder="search">
                        <input type="submit" value="search" class="btn btn-outline-success">
                    </form>
                </div>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="submit" class="close" data-dismiss="alert">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="container" style="max-width: 1326px;">

                <div class="row ">
                    @foreach ($foods as $food)
                        <div class="col-lg-3 mb-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('/image/' . $food->image) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h2 class="card-title" style="font-weight: bolder;font-size: 21px;">
                                        {{ $food->heading }}</h2>
                                    <p class="card-text">{{ $food->discription }}</p>
                                    <a href="#" class="btn btn-primary">Rs. {{ $food->price }}</a>
                                </div>

                            </div>
                            <form action="{{ route('addcart', $food->id) }}" method="POST">
                                @csrf
                                <div class="mt-3  text-center">
                                    <input type="number" name="quantity" min="1" value="1"
                                        style="text-align: center;width: 80px;border-color: red;border-radius: 50px;margin-right: 18px;">
                                    <input type="submit" class="btn btn-outline-success" value="Add to Cart">
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

            @if (method_exists($foods, 'links'))
                <div style="padding-left: 42%;margin-top: 55px;">
                    {{ $foods->links() }}
                </div>
            @endif
        </section>

        <!-- ***** Menu Area Ends ***** -->

        <!-- ***** Chefs Area Starts ***** -->
        <section class="section" id="chefs">
            <div class="container" style="max-width: 1326px">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <div class="section-heading">
                            <h6>Our Chefs</h6>
                            <h2>We offer the best ingredients for you</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($chefs as $chef)
                        <div class="col-lg-4">
                            <div class="chef-item">
                                <div class="thumb">
                                    <div class="overlay"></div>
                                    <ul class="social-icons">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                    <img src="{{ asset('/image/' . $chef->image) }}" alt="Chef #1">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $chef->name }}</h4>
                                    <span>{{ $chef->speciality }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ***** Chefs Area Ends ***** -->

        <!-- ***** Reservation Us Area Starts ***** -->
        <section class="section" id="reservation">
            <div class="container" style="max-width: 1326px">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="left-text-content">
                            <div class="section-heading">
                                <h6>Contact Us</h6>
                                <h2>Here You Can Make A Reservation Or Just walkin to our cafe</h2>
                            </div>
                            <p>Donec pretium est orci, non vulputate arcu hendrerit a. Fusce a eleifend riqsie, namei
                                sollicitudin urna diam, sed commodo purus porta ut.</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="phone">
                                        <i class="fa fa-phone"></i>
                                        <h4>Phone Numbers</h4>
                                        <span><a href="#">080-090-0990</a><br><a
                                                href="#">080-090-0880</a></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="message">
                                        <i class="fa fa-envelope"></i>
                                        <h4>Emails</h4>
                                        <span><a href="#">hello@company.com</a><br><a
                                                href="#">info@company.com</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form id="contact" action="{{ route('store.reservation') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        @if (session()->has('success'))
                                            <div class="alert alert-success">
                                                <button type="submit" class="close" data-dismiss="alert">x</button>
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif
                                        <h4>Table Reservation</h4>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <fieldset>
                                            <input name="name" type="text" id="name" placeholder="Your Name*"
                                                required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <fieldset>
                                            <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                                placeholder="Your Email Address" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <fieldset>
                                            <input name="phone" type="text" id="phone"
                                                placeholder="Phone Number*" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="number" name="guest" placeholder="Number of Guest">
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="filterDate2">
                                            <div class="input-group">
                                                <input name="date" type="date" class="form-control"
                                                    placeholder="Date">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="time" name="time">
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button-icon">Make A
                                                Reservation</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Reservation Area Ends ***** -->

        <!-- ***** Menu Area Starts ***** -->
        <section class="section" id="offers">
            <div class="container" style="max-width: 1326px">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <div class="section-heading">
                            <h6>Klassy Week</h6>
                            <h2>This Week’s Special Meal Offers</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="tabs">
                            <div class="col-lg-12">
                                <div class="heading-tabs">
                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <ul>
                                                <li><a href='#tabs-1'><img
                                                            src="{{ asset('') }}assets/images/tab-icon-01.png"
                                                            alt="">Breakfast</a></li>
                                                <li><a href='#tabs-2'><img
                                                            src="{{ asset('') }}assets/images/tab-icon-02.png"
                                                            alt="">Lunch</a></a></li>
                                                <li><a href='#tabs-3'><img
                                                            src="{{ asset('') }}assets/images/tab-icon-03.png"
                                                            alt="">Dinner</a></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <section class='tabs-content'>
                                    <article id='tabs-1'>
                                        <div class="row">

                                            @foreach ($breakfasts as $breakfast)
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="left-list">
                                                            <div class="col-lg-12">
                                                                <div class="tab-item">
                                                                    <img src="{{ asset('/image/' . $breakfast->image) }}"
                                                                        alt="">
                                                                    <h4>{{ $breakfast->heading }}</h4>
                                                                    <p>{{ $breakfast->discription }}</p>
                                                                    <div class="price">
                                                                        <h6>Rs. {{ $breakfast->price }}</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </article>
                                    <article id='tabs-2'>
                                        <div class="row">
                                            @foreach ($lunchs as $lunch)
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="left-list">
                                                            <div class="col-lg-12">
                                                                <div class="tab-item">
                                                                    <img src="{{ asset('/image/' . $lunch->image) }}"
                                                                        alt="">
                                                                    <h4>{{ $lunch->heading }}</h4>
                                                                    <p>{{ $lunch->discription }}</p>
                                                                    <div class="price">
                                                                        <h6>Rs. {{ $lunch->price }}</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </article>
                                    <article id='tabs-3'>
                                        <div class="row">
                                            @foreach ($dinners as $dinner)
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="left-list">
                                                            <div class="col-lg-12">
                                                                <div class="tab-item">
                                                                    <img src="{{ asset('/image/' . $dinner->image) }}"
                                                                        alt="">
                                                                    <h4>{{ $dinner->heading }}</h4>
                                                                    <p>{{ $dinner->discription }}</p>
                                                                    <div class="price">
                                                                        <h6>Rs. {{ $dinner->price }}</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </article>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Chefs Area Ends ***** -->




    </body>

    </html>
@endsection
