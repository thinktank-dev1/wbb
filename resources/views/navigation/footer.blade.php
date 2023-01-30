<div class="footer">
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-xs-12 mt-3">
      <h2 class="footer-headings mb-3">HOME</h2>
      <h2 class="footer-headings">Auctions</h2>
      <ul class="ml-0 mb-3">
        <li><a class="footer-links" href="{{ route('auction') }}">Live Auction</a></li>
        <li><a class="footer-links" href="{{ route('catalogue') }}">Auction Catalogue</a></li>
      </ul>
      <h2 class="footer-headings">My Favourites</h2>
      <ul class="ml-0">
        <li><a class="footer-links" href="{{ route('favourites') }}">Selected Vehicles</a></li>
      </ul>
    </div>
    <div class="col-lg-2 col-xs-12 mt-3">
      <h2 class="footer-headings">Dealers</h2>
      <ul class="ml-0 mb-3">
        <li><a class="footer-links" href="{{ url('profile') }}">My Account</a></li>
        <li><a class="footer-links" href="{{ url('dashboard') }}">Dashboard</a></li>
        <li>
          <form method="POST" action="{{ route('logout') }}" id="logout">
              @csrf
              <a class="footer-links" href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
          </form>
        </li>
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
        <li><a class="footer-links" href="{{ route('favourites') }}">Terms and Conditions</a></li>
        <li><a class="footer-links" href="{{ route('favourites') }}">Privacy Policy</a></li>
      </ul>
    </div>
    <div class="col-lg-4 col-xs-12 mt-3">
      <h2 class="footer-headings">contact</h2>
      <ul class="mb-3">
        <a class="footer-links" href="mailto:info@webuybakkiesonline.co.za"><img class="img-fluid" src="{{ asset('images/wbbonline_img_18.png') }}" alt="mail"> info@webuybakkiesonline.co.za</a>
      </ul>
      <div class="row ml-4 mb-3">
        <div class="col-sm-6">
          <div class="col-sm-12 mb-3">
            <a class="btn btn-primary" href="{{ route('register') }}">REGISTER</a>
          </div>
          <div class="col-sm-12">
            <a class="btn btn-secondary" href="{{ route('login') }}">LOG IN</a>  
          </div>
        </div>
        <div class="col-sm-6">
            <a  href=""><img class="img-fluid" src="{{ asset('images/wbbonline_btn_11.png') }}" alt="scroll"></a>
        </div>
      </div>

      <h2 class="footer-headings">follow us</h2>
        <a class="footer-links" href=""><img class="img-fluid" src="{{ asset('images/wbbonline_btn_14.png') }}" alt="facebook"></a>
        <a class="footer-links" href=""><img class="img-fluid" src="{{ asset('images/wbbonline_btn_15.png') }}" alt="whatsapp"></a>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col copyright">
      <p class=""><small class="text-white-50">© 2019. All Rights Reserved.</small></p>
    </div>
  </div>
</div>
</div>