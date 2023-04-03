@extends('layouts.header')
@section('content')
<section style="margin-top: 40px">
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="contact-infolist">
                        <ul
                            style="background: url(dist/images/resources/cotact-info-bg.jpg) no-repeat scroll center / cover;">
                            <li>
                                <i class="fa fa-phone"></i>
                                <strong>Phone Number</strong>
                                099203 42080
                            </li>
                            <li>
                                <i class="fa fa-map-signs"></i>
                                <strong>Site Location</strong>
                                Mumbai, Maharashtra, India 400004
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <strong>Email Address</strong>
                                <a href="#" title=""></a>
                                <a href="#" title="">jrjrindia@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- contact info -->

<section>
    <div class="gap no-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="contact-page">
                        <div class="contact-form black">
                            <form method="post" action="http://wpkixx.com/html/lifeaid/contact.php" id="contactform">
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <input type="text" placeholder="first name *" id="name">
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <input type="email" placeholder="email *" id="email">
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <input type="text" placeholder="cause title *">
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <textarea name="s" id="comments" cols="30" rows="8"
                                            placeholder="message *"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <button type="submit" id="submit" data-ripple="">submit</button>
                                        <img src="images/ajax-loader.gif" class="loader" alt="" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <aside>
                        <div class="widget fadein">
                            <div class="search">
                                <form>
                                    <input type="text" placeholder="search...">
                                    <button><i class="ion-search"></i></button>
                                </form>
                            </div>
                        </div><!-- search widget -->
                        <div class="widget fadein">
                            <h4 class="widget-title">twitter feeds</h4>
                            <ul class="twitter-feed">
                                <li>
                                    <div class="twiter-post">
                                        <i class="ion ion-social-twitter"></i>
                                        <p>
                                            <a href="#" title="">@Dewwatertheme</a>
                                            We are the most proud on the #health care NGO, who is working day and night
                                            for saving the childes of #africa
                                            #Dewwater <a href="#" title="">Dewwater.com/healthcare</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="twiter-post">
                                        <i class="ion ion-social-twitter"></i>
                                        <p>
                                            <a href="#" title="">@Dewwatertheme</a>
                                            We are the most proud on the #health care NGO, who is working day and night
                                            for saving the childes of #africa
                                            #Dewwater <a href="#" title="">Dewwater.com/healthcare</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="twiter-post">
                                        <i class="ion ion-social-twitter"></i>
                                        <p>
                                            <a href="#" title="">@Dewwatertheme</a>
                                            We are the most proud on the #health care NGO, who is working day and night
                                            for saving the childes of #africa
                                            #Dewwater <a href="#" title="">Dewwater.com/healthcare</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- twitter feed widget -->
                    </aside>
                </div><!-- side widgets -->
            </div>
        </div>
    </div>
</section><!-- contact form with sidebar-->
@endsection
