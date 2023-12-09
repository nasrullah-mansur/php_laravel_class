<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.html"><img src="{{ asset('back/images/logo.svg')}}" width="25" alt="Aero"><span class="m-l-10">Aero</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="{{ asset('back/images/profile_av.jpg') }}" alt="User"></a>
                    <div class="detail">
                        <h4>Michael</h4>
                        <small>Super Admin</small>                        
                    </div>
                </div>
            </li>
            <li><a href="index.html"><i class="zmdi zmdi-blogger"></i><span>Dashboard</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>App</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('back.email.create') }}">Email</a></li>
                    <li><a href="{{ route('back.appearance.create') }}">Appearance</a></li>
                    <li><a href="#">Social</a></li>                   
                    <li><a href="{{ route('back.contact.create') }}">Contact</a></li>                   
                    <li><a href="#">Cache Clear</a></li>                   
                </ul>
            </li>

            <li class="{{ Route::is('back.category.*') ? 'active' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Category</span></a>
                <ul class="ml-menu">
                    <li class="{{ Route::is('back.category.index') ? 'active' : '' }}"><a href="{{ route('back.category.index') }}">All Category</a></li>
                    <li class="{{ Route::is('back.category.create') ? 'active' : '' }}"><a href="{{ route('back.category.create') }}">Create Category</a></li>                    
                </ul>
            </li>

            <li class="{{ Route::is('back.slider.*') ? 'active' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Slider</span></a>
                <ul class="ml-menu">
                    <li class="{{ Route::is('back.slider.index') ? 'active' : '' }}"><a href="{{ route('back.slider.index') }}">All Sliders</a></li>
                    <li class="{{ Route::is('back.slider.create') ? 'active' : '' }}"><a href="{{ route('back.slider.create') }}">Create Slider</a></li>                    
                </ul>
            </li>

            <li class="{{ Route::is('user.*') ? 'active' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Users</span></a>
                <ul class="ml-menu">
                    <li class="{{ Route::is('user.index') ? 'active' : '' }}"><a href="{{ route('user.index') }}">All User</a></li>
                    <li class="{{ Route::is('user.create') ? 'active' : '' }}"><a href="{{ route('user.create') }}">Create User</a></li>                    
                </ul>
            </li>

            <li class="{{ Route::is('back.blog.*') ? 'active' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Blog</span></a>
                <ul class="ml-menu">
                    <li class="{{ Route::is('back.blog.index') ? 'active' : '' }}"><a href="{{ route('back.blog.index') }}">All Blogs</a></li>
                    <li class="{{ Route::is('back.blog.create') ? 'active' : '' }}"><a href="{{ route('back.blog.create') }}">Create Blog</a></li>                    
                </ul>
            </li>

            <li><a href="index.html"><i class="zmdi zmdi-blogger"></i><span>Comment</span></a></li>
        </ul>
    </div>
</aside>