<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-solid fa-user"></i>
                <p>
                    Персонал
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.employee.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Просмотр персонала</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>Добавить работника</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-duotone fa-address-book"></i>
                <p>
                    Должности
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('positions.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Просмотр должностей</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('position.create')}}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>Добавить должность</p>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Услуги
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.service.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Просмотр услуг</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.service.create')}}" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>Добавить услугу</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Наряды (заказы)
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                        <a href="{{route('admin.job.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Просмотр выполненных нарядов</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Статистика
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.statistic.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Повременная ЗП</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.statistic.index2')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Сдельная ЗП</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.statistic.PieChartPositions')}}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>Должности</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.statistic.PieChartServices')}}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>Выполненные работы</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('companyIncomeStatistic')}}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-coins"></i>
                        <p>Доход по месяцам</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('companyJobsStatistic')}}" class="nav-link">

                        <i class="nav-icon fas fa-solid fa-chart-line"></i>
                        <p>Работы по месяцам</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-solid fa-file-excel"></i>
                <p>
                    Экспорт Exel
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('export.users')}}" class="nav-link">
                        <i class="nav-icon far fa-solid fa-id-card"></i>
                        <p>Выгрузить работников</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('export.salary')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Повременная З/П</p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="./index3.html" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Редактировать услугу</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </li>

    </ul>
</nav>
