<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <li>
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="mdi mdi-gavel"></i>
                        <span data-key="t-auction">Auctions</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ url('admin/auction-groups') }}">
                                <span data-key="t-auction-group">Auction Groups</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/auction-results') }}">
                                <span data-key="t-auction-result">Auction Results</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('auction') }}">
                        <i class="mdi mdi-web"></i>
                        <span data-key="t-live-auction">Live Auction</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="mdi mdi-car-multiple"></i>
                        <span data-key="t-vehicles">Vehicles</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ url('admin/vehicles/create') }}">
                                <span data-key="t-add-vehicles">Add Vehicles</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/vehicles') }}">
                                <span data-key="t-list-vehicles">List All Vehicles</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/vehicles/status/sold') }}">
                                <span data-key="t-sold-vehicles">Sold Vehicles</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/vehicles/status/not-sold') }}">
                                <span data-key="t-not-sold-vehicles">Not Sold Vehicles</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title mt-2" data-key="t-components">Settings</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="mdi mdi-human-queue"></i>
                        <span data-key="t-users">Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('admin/users/create') }}" data-key="t-user-create">Create User</a></li>
                        <li><a href="{{ url('admin/users') }}" data-key="t-user-list">List Users</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>