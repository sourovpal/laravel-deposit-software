<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="user-box">
    
                <div class="float-left">
                    <img src="{{ asset('/backend/images/users/avatar-1.jpg') }}" alt="" class="avatar-md rounded-circle">
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe <i class="mdi mdi-chevron-down"></i></a>
                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-face-profile mr-2"></i> Profile<div class="ripple-wrapper"></div></a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-settings mr-2"></i> Settings</a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-lock mr-2"></i> Lock screen</a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-power-settings mr-2"></i> Logout</a></li>
                        </ul>
                    </div>
                    <p class="font-13 text-muted m-0">Administrator</p>
                </div>
            </div>

            <ul class="metismenu" id="side-menu">

                <li>
                    <a href="{{ route('dashboard.index') }}" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.admin.index') }}" class="waves-effect">
                        <i class="fa fa-user"></i>
                        <span> Admins </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.user.index') }}" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span> Users </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.deposit.index') }}" class="waves-effect">
                        <i class="fas fa-dollar-sign"></i>
                        <span> Withdraw & Deposit </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.product.index') }}" class="waves-effect">
                        <i class="mdi mdi-widgets"></i>
                        <span> Products </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.about.index') }}" class="waves-effect">
                        <i class="mdi mdi-information"></i>
                        <span> About Us </span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('dashboard.brand.index') }}" class="waves-effect">
                        <i class="mdi mdi-border-all"></i>
                        <span> Brand Slider </span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('dashboard.faq.index') }}" class="waves-effect">
                        <i class="mdi mdi-calendar-question"></i>
                        <span> FAQ </span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('dashboard.event.index') }}" class="waves-effect">
                        <i class="mdi mdi-calendar-month"></i>
                        <span> Event </span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('dashboard.contract.index') }}" class="waves-effect">
                        <i class="mdi mdi-file-certificate-outline"></i>
                        <span> Contract </span>
                    </a>
                </li>
                
                
                <li>
                    <a href="{{ route('dashboard.certificate.index') }}" class="waves-effect">
                        <i class="mdi mdi-file-certificate"></i>
                        <span> Certificate </span>
                    </a>
                </li>
                
                
                <li>
                    <a href="{{ route('dashboard.setting.index') }}" class="waves-effect">
                        <i class="mdi mdi-settings"></i>
                        <span> Setting </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>