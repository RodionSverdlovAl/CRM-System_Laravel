<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('user.profile')}}" class="nav-link">
                <i class="nav-icon far fa-solid fa-user"></i>
                <p>
                    Профиль

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('user.job.create')}}" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Учесть наряд

                </p>
            </a>
        </li>
    </ul>
</nav>
