@php 
$url = request()->segment(1); 
@endphp

@if($url == 'auction')
<div class="footer d-none">
@else
<div class="footer">
@endif
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
          <li><a class="footer-links" href="{{ url('FAQs') }}">FAQs</a></li>
          <li><a class="footer-links" href="{{ route('contact-us') }}">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-xs-12 mt-3">
        <h2 class="footer-headings">Privacy</h2>
        <ul class="ml-0 mb-3">
          <li><a class="footer-links" href="{{ asset('files/WeBuyBakkiesOnline_AuctionTermsConditions_revised042023_1.pdf') }}" target="_blank">Terms and Conditions</a></li>
          <li><a class="footer-links" href="{{ asset('files/WeBuyBakkiesOnlineAuctions_PrivacyPolicy_revised042023_1.pdf') }}" target="_blank">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-lg-4 col-xs-12 mt-3">
        <h2 class="footer-headings">contact</h2>
        <ul class="m-0">
          <a class="footer-links footer-email-link" href="mailto:info@bakkieauctions.co.za"><img class="img-fluid" src="{{ asset('images/wbbonline_img_18.png') }}" alt="mail"> info@bakkieauctions.co.za</a>
        </ul>
        <div class="row ml-4">
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
              <a  class="scrollBtn" href=""><img class="img-fluid" src="{{ asset('images/wbbonline_btn_11.png') }}" alt="scroll" onclick="scrollToTop()"></a>
          </div>
          <!--<div class="col-sm-6 follow-us-div">-->
          <!--    <h2 class="footer-headings">follow us</h2>-->
          <!--    <a class="footer-links" href="https://www.facebook.com/WeBuyBakkies" target="blank"><img class="img-fluid" src="{{ asset('images/wbbonline_btn_14.png') }}" alt="facebook"></a>-->
          <!--    <a class="footer-links" href=""><img class="img-fluid" src="{{ asset('images/wbbonline_btn_15.png') }}" alt="whatsapp"></a>-->
          <!--</div>-->
          <div class="col-sm-6">
              <a class="wbb-logo" href="JavaScript:void(0);"><img class="img-fluid" src="{{ asset('img/wbbonline_logo_footer.png') }}" alt="logo"></a>  
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <div class="row footer-row mt-5">
      <div class="col copyright text-center">
        <p class="copyright-text mt-4">Copyright © 2023 We Buy Bakkies Online | All rights reserved | Powered by <a href="https://thinktank.co.za" target="blank">ThinkTank Creative</a></p>
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