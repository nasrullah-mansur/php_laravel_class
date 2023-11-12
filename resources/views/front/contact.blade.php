@extends('front.layout.layout')

@section('content')
<!-- Contact start -->
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-info">
                    <h1>Keep in touch</h1>
                    <div class="info-item">
                        <h4>Phone</h4>
                        <ul>
                            <li><a href="tel:+22254362524">+ 22 254 362 52 4</a></li>
                            <li><a href="tel:+22254362524">+ 22 254 362 52 4</a></li>
                        </ul>
                    </div>
                    <div class="info-item">
                        <h4>Email</h4>
                        <ul>
                            <li><a href="mailto:nasrullah.cit.bd@gmail.com">nasrullah.cit.bd@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="info-item">
                        <h4>Address</h4>
                        <ul>
                            <li>Dhaka: 252 W 43rd St New York, NY Bangladesh</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="contact-form">
                    <h2>Do you have any question?</h2>
                    <form>
                        <input class="half" type="text" placeholder="Name">
                        <input class="half" type="email" placeholder="Email">
                        <input type="text" placeholder="Subject">
                        <textarea placeholder="Message"></textarea>
                        <button type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact end -->
@endsection