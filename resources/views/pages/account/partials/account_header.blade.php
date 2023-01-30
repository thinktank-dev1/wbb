<div class="card-header">
    <div class="d-flex">
        <h5 class="home-card-header">User Id: <span class="home-card-header-id">{{ Auth::user()->id }}</span></h5>
        <div class="ml-auto">
            <div class="dropdown">
                <a class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->first_name }}
                </a>
                <span class="fa-stack fa-small">                 
                    <i class="fa fa-circle fa-stack-2x" style="color: #FFF"></i>                 
                    <i class="fa fa-user fa-stack-1x" style="color: #8cd50a"></i>
                </span>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Another action</a>
                </div>
            </div>
        </div>
    </div>
</div>