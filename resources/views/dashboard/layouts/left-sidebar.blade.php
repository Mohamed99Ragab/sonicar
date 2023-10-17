<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{route('dashboard')}}">
            <img style="max-width: 80px" src="{{asset('Dashboard/src/images/sonicar-logo-white.png')}}" alt="" class="dark-logo" />


            <img style="max-width: 30px"
                src="{{asset('website/images/icon.png')}}"
                alt=""
                class="light-logo"
            />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

                <li>
                    <a href="{{url('/admin')}}" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-house"></span
                                ><span class="mtext">Home</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-person-workspace"></span
                                ><span class="mtext">Projects</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('projects.index')}}">view projects</a></li>

                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.contacts.index')}}" class="dropdown-toggle no-arrow">
								<span class="micon fa fa-mail-reply"></span
                                ><span class="mtext">Contacts</span>
                    </a>
                </li>


                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-quote"></span
                                ><span class="mtext">Free Qoutes</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('free.qoute.index')}}">view FreeQoutes</a></li>
                        <li><a href="{{route('free.quote.report.index')}}">Notify Users</a></li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-app"></span
                                ><span class="mtext">Blogs</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('blog.index')}}">View Blogs</a></li>
                        <li><a href="{{route('blog.create')}}">Add Blog</a></li>
                        <li><a href="{{route('category.index')}}">Categories</a></li>

                    </ul>
                </li>


                <li>
                    <a href="{{url('/')}}" target="_blank" class="dropdown-toggle no-arrow">
								<span class="micon fa fa-eye"></span
                                ><span class="mtext">Visit Site</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</div>
