<!-- Back to top start -->
<div class="back-to-top">
    <i class="fa-solid fa-turn-up"></i>
</div>
<!-- Back to top end -->

<!-- Header start -->
<header class="header">
    <div class="topbar">
        <div class="container">
            <div class="topbar-content">
                <ul class="topbar-list m-0">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Privacy & Policy</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
                <ul class="topbar-social m-0">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-menu">
        <div class="container">
            <div class="main-menu-content">
                <div class="logo">
                    <a href="{{ route('front.index') }}">
                        <img src="{{ asset('front/images/logo.png') }}" alt="logo">
                    </a>
                </div>
                <ul class="menu-list">
                    <li class="active"><a href="{{ route('front.index') }}">Home</a></li>
                    <li><a href="{{ route('front.contact') }}">Contact</a></li>
                </ul>
                <div class="search">
                    <i class="fas fa-search"></i>

                    <div class="search-area">
                        <div class="form">
                            <form>
                                <input type="search" name="search" placeholder="Search here...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="mobile-icon d-md-none">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="page-overlay"></div>
            </div>
            
        </div>
    </div>
</header>
<!-- Header end -->