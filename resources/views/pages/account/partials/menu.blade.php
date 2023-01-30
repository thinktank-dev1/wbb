<div class="col-md-3 home-aside m-0 p-0">
    <div class="aside-gap"></div>
    <div class="home-navigation">
        <ul class="account-menu">
            <li class="account-menu-link">
                <a href="{{ url('dashboard') }}">
                    <i class="fa fa-th-large icon"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="account-menu-link">
                <a href="{{ url('profile') }}">
                    <i class="fa fa-user icon"></i>
                    <span class="title">My Account</span>
                </a>
            </li>
            <li class="account-menu-link">
                <a href="{{ url('payments') }}">
                    <i class="fa fa-credit-card icon"></i>
                    <span class="title">Payments</span>
                </a>
            </li>
            <li class="account-menu-link">
                <a href="{{ url('my-lots') }}">
                    <i class="fa fa-gavel icon"></i>
                    <span class="title">My Lots</span>
                </a>
            </li>
            <li class="account-menu-link">
                <form method="POST" action="{{ route('logout') }}" id="logout">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa fa-window-close icon"></i>
                        <span class="title">Logout</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function(){
        var url = '{{ Request::url() }}';
        $('.account-menu li a').each(function(){
            if ($(this).attr('href') == url){
                $(this).parent().addClass('active');
            }
        });
    });
</script>
@endpush