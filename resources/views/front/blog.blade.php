@extends('front.layout.layout')

@section('content')

<!-- Post start -->
<section class="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="post-item-bg">
                    <div class="img">
                        <a href="#">
                            <img class="img-fluid w-100" src="{{ asset('front/images/blog-full4.jpg') }}" alt="a">
                        </a>
                    </div>
                    <div class="calendar">
                        <a href="#" class="category">Web development</a>
                        <div class="info">
                            <div class="date">
                                <i class="fas fa-calendar-alt"></i>
                                <span>01 SEP 2018</span>
                            </div>
                            <div class="comment">
                                <i class="fas fa-comment"></i>
                                <span>(20)</span>
                            </div>
                        </div>
                    </div>
                    <h3 class="title"><a href="#">Women just broke a record: The mosfemale nominees for governor single mistaken.</a></h3>
                    <p class="description">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure,</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
                <div class="post-item-bg">
                    <div class="img">
                        <a href="#">
                            <img class="img-fluid w-100" src="{{ asset('front/images/blog-full4.jpg') }}" alt="a">
                        </a>
                    </div>
                    <div class="calendar">
                        <a href="#" class="category">Web development</a>
                        <div class="info">
                            <div class="date">
                                <i class="fas fa-calendar-alt"></i>
                                <span>01 SEP 2018</span>
                            </div>
                            <div class="comment">
                                <i class="fas fa-comment"></i>
                                <span>(20)</span>
                            </div>
                        </div>
                    </div>
                    <h3 class="title"><a href="#">Women just broke a record: The mosfemale nominees for governor single mistaken.</a></h3>
                    <p class="description">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure,</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
                <div class="post-item-bg">
                    <div class="img">
                        <a href="#">
                            <img class="img-fluid w-100" src="{{ asset('front/images/blog-full4.jpg') }}" alt="a">
                        </a>
                    </div>
                    <div class="calendar">
                        <a href="#" class="category">Web development</a>
                        <div class="info">
                            <div class="date">
                                <i class="fas fa-calendar-alt"></i>
                                <span>01 SEP 2018</span>
                            </div>
                            <div class="comment">
                                <i class="fas fa-comment"></i>
                                <span>(20)</span>
                            </div>
                        </div>
                    </div>
                    <h3 class="title"><a href="#">Women just broke a record: The mosfemale nominees for governor single mistaken.</a></h3>
                    <p class="description">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure,</p>
                    <a href="#" class="read-more">Read More</a>
                </div>

                <ul class="custom-pagination">
                    <li><a href="#">Prev</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar">
                    <!-- Categories -->
                    <div class="sidebar-item">
                        <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-category">
                            <ul class="mb-0">
                                <li>
                                    <a href="#">
                                        <span>Business</span>
                                        <span>20</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Politic</span>
                                        <span>10</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Fashion</span>
                                        <span>10</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Sports</span>
                                        <span>10</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Football</span>
                                        <span>10</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Food</span>
                                        <span>10</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Popular post -->
                    <div class="sidebar-item">
                        <h3 class="sidebar-title">Popular Post</h3>
                        <div class="sidebar-popular-post">
                            <div class="post-item">
                                <div class="img">
                                    <img src="{{ asset('front/images/t1.jpg') }}" alt="img">
                                </div>
                                <div class="content">
                                    <a href="#" class="category">Fashion</a>
                                    <a href="#" class="title">Husar asks expenses authority to entitlements after Bruno</a>
                                    <div class="calendar">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span> 01 Sep 2018</span>
                                    </div>
                                </div>
                            </div>
                            <div class="post-item">
                                <div class="img">
                                    <img src="{{ asset('front/images/t2.jpg') }}" alt="img">
                                </div>
                                <div class="content">
                                    <a href="#" class="category">Fashion</a>
                                    <a href="#" class="title">Husar asks expenses authority to entitlements after Bruno</a>
                                    <div class="calendar">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span> 01 Sep 2018</span>
                                    </div>
                                </div>
                            </div>
                            <div class="post-item">
                                <div class="img">
                                    <img src="{{ asset('front/images/t3.jpg') }}" alt="img">
                                </div>
                                <div class="content">
                                    <a href="#" class="category">Fashion</a>
                                    <a href="#" class="title">Husar asks expenses authority to entitlements after Bruno</a>
                                    <div class="calendar">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span> 01 Sep 2018</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subscribe -->
                    <div class="sidebar-item">
                        <h3 class="sidebar-title">Subscribe our Newsletter!</h3>
                        <div class="subscribe-area">
                            <p>Subscribe to our email newsletter to receive useful articles and special offers.</p>
                            <form>
                                <input type="text" placeholder="Enter your email:">
                                <button type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>

                    <!-- Most visited -->
                    <div class="sidebar-item">
                        <h3 class="sidebar-title">Most visited</h3>
                        <div class="most-visited">
                            <div class="img">
                                <img class="img-fluid w-100" src="{{ asset('front/images/t1.jpg') }}" alt="img">
                            </div>
                            <div class="info">
                                <div class="date">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>01 SEP 2018</span>
                                </div>
                                <div class="comment">
                                    <i class="fas fa-comment"></i>
                                    <span>(20)</span>
                                </div>
                            </div>
                            <h4 class="mb-0"><a href="#">Paul Manafort’s Accountant Testifies She Helped Alter Financial Documents</a></h4>
                        </div>
                    </div>

                    <!-- Popular tags -->
                    <div class="sidebar-item">
                        <h3 class="sidebar-title">Popular Tags</h3>
                        <ul class="popular-tags mb-0">
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Politic</a></li>
                            <li><a href="#">Modern</a></li>
                            <li><a href="#">Tips</a></li>
                            <li><a href="#">Jason</a></li>
                            <li><a href="#">Roster</a></li>
                            <li><a href="#">Boat</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- Post end -->

@endsection