<div class="footer">
<div class="container-fluid footer-container">
  <div class="row mobile-center more-padding-top">
    <div class="col-lg-3 col-xs-12 mt-3 no-margin">
      <h2 class="footer-headings mb-3">HOME</h2>
      <h2 class="footer-headings">Auctions</h2>
      <ul class="ml-0 mb-3">
        <li><a class="footer-links" href="{{ route('auction') }}">Live Auction</a></li>
        <li><a class="footer-links" href="{{ route('catalogue') }}">Auction Catalogue</a></li>
      </ul>
      <h2 class="footer-headings">My Favourites</h2>
      <ul class="ml-0">
        <li><a class="footer-links" href="{{ route('favourites', 'favourites') }}">Selected Vehicles</a></li>
      </ul>
    </div>
    <div class="col-lg-2 col-xs-12 mt-3">
      <h2 class="footer-headings">Dealers</h2>
      <ul class="ml-0 mb-3">
        <li><a class="footer-links" href="{{ url('profile') }}">My Account</a></li>
        <li><a class="footer-links" href="{{ url('dashboard') }}">Dashboard</a></li>
        @if(Auth::user())
        <li>
          <form method="POST" action="{{ route('logout') }}" id="logout">
              @csrf
              <a class="footer-links" href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
          </form>
        </li>
        @endif
      </ul>

      <h2 class="footer-headings">Company</h2>
      <ul class="ml-0 mb-3">
        <li><a class="footer-links" href="{{ route('about-us') }}">About</a></li>
        <li><a class="footer-links" href="{{ url('about-us') }}">FAQs</a></li>
        <li><a class="footer-links" href="{{ route('contact-us') }}">Contact Us</a></li>
      </ul>
    </div>
    <div class="col-lg-3 col-xs-12 mt-3">
      <h2 class="footer-headings">Dealers</h2>
      <ul class="ml-0 mb-3">
        <li><a class="footer-links" href="{{ route('favourites', 'favourites') }}">Terms and Conditions</a></li>
        <li><a class="footer-links" href="{{ route('favourites', 'favourites') }}">Privacy Policy</a></li>
      </ul>
    </div>
    <div class="col-lg-4 col-xs-12 mt-3">
      <h2 class="footer-headings">contact</h2>
      <ul class="mb-3">
        <a class="footer-links footer-email-link" href="mailto:info@webuybakkiesonline.co.za"><img class="img-fluid" src="{{ asset('images/wbbonline_img_18.png') }}" alt="mail"> info@webuybakkiesonline.co.za</a>
      </ul>
      <div class="row ml-4 mb-3 no-margin">
        <div class="col-sm-6">
          <div class="col-sm-12 mb-3 footer-btn-div">
            @if(Auth::user())
            @else
            <a class="btn btn-primary footer-register-btn" href="{{ route('register') }}">REGISTER</a>
            @endif
          </div>
          <div class="col-sm-12 footer-btn-div">
            @if(Auth::user())
            @else
            <a class="btn btn-secondary footer-login-btn" href="{{ route('login') }}">LOG IN</a>  
            @endif
          </div>
           
        </div>
        <div class="col-sm-6 scrollTop" id="stop">
            <a  href=""><img class="img-fluid" src="{{ asset('images/wbbonline_btn_11.png') }}" alt="scroll" onclick="scrollToTop()"></a>
        </div>
      </div>

      <h2 class="footer-headings">follow us</h2>
        <a class="footer-links" href="https://www.facebook.com/WeBuyBakkies" target="blank"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_14.png') }}" alt="facebook"></a>
        <a class="footer-links" href=""><img class="img-fluid" src="{{ asset('images/wbbonline_btn_15.png') }}" alt="whatsapp"></a>
    </div>
  </div>
  
</div>
<div class="row footer-row mt-5">
    <div class="col copyright text-center">
      <p class="copyright-text mt-4">Copyright © 2022 We Buy Bakkies Online | All rights reserved | Powered by <a href="https://thinktank.co.za" target="blank">ThinkTank Creative</a></p>
    </div>
  </div>
</div>

@push('scripts')
    <script>
     $(document).ready(function() {
    var scrollTop = $(".scrollTop");
    $(window).scroll(function() {
    var topPos = $(this).scrollTop();
      if (topPos > 100) {
        $(scrollTop).css("opacity", "1");
      } else {
        $(scrollTop).css("opacity", "0");
      }
    }); 

    $(scrollTop).click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 800);
    return false;
    }); 
}); 
    </script>
@endpush