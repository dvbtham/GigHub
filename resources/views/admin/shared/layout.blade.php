<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/vendors/bootadmin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendors/bootadmin/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/vendors/bootadmin/css/datatables.min.css">
    <link rel="stylesheet" href="/vendors/bootadmin/css/fullcalendar.min.css">
    <link rel="stylesheet" href="/vendors/bootadmin/css/bootadmin.min.css">

    <title>@yield('title') | GigHub Admin</title>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand navbar-dark bg-primary">
        <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">GigHub Admin</a>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bell"></i> 3</a></li>
                <li class="nav-item dropdown">
                    <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Doe</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex">
        <div class="sidebar sidebar-dark bg-dark">
            <ul class="list-unstyled">
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
                <li>
                    <a href="#sm_base" data-toggle="collapse">
                        <i class="fa fa-fw fa-cube"></i> Base
                    </a>
                    <ul id="sm_base" class="list-unstyled collapse">
                        <li><a href="https://bootadmin.net/demo/base/colors">Colors</a></li>
                        <li><a href="https://bootadmin.net/demo/base/typography">Typography</a></li>
                        <li><a href="https://bootadmin.net/demo/base/tables">Tables</a></li>
                        <li><a href="https://bootadmin.net/demo/base/progress">Progress</a></li>
                        <li><a href="https://bootadmin.net/demo/base/modal">Modal</a></li>
                        <li><a href="https://bootadmin.net/demo/base/alerts">Alerts</a></li>
                        <li><a href="https://bootadmin.net/demo/base/popover">Popover</a></li>
                        <li><a href="https://bootadmin.net/demo/base/tooltip">Tooltip</a></li>
                        <li><a href="https://bootadmin.net/demo/base/dropdown">Dropdown</a></li>
                        <li><a href="https://bootadmin.net/demo/base/navs">Navs</a></li>
                        <li><a href="https://bootadmin.net/demo/base/collapse">Collapse</a></li>
                        <li><a href="https://bootadmin.net/demo/base/lists">Lists</a></li>
                    </ul>
                </li>
                <li><a href="https://bootadmin.net/demo/icons"><i class="fa fa-fw fa-flag"></i> Icons</a></li>
                <li><a href="https://bootadmin.net/demo/buttons"><i class="fa fa-fw fa-toggle-on"></i> Buttons</a></li>
                <li><a href="https://bootadmin.net/demo/forms"><i class="fa fa-fw fa-edit"></i> Forms</a></li>
                <li><a href="https://bootadmin.net/demo/datatables"><i class="fa fa-fw fa-table"></i> Datatables</a></li>
                <li><a href="https://bootadmin.net/demo/cards"><i class="fa fa-fw fa-address-card"></i> Cards</a></li>
                <li><a href="https://bootadmin.net/demo/calendar"><i class="fa fa-fw fa-calendar-alt"></i> Calendar</a></li>
                <li><a href="https://bootadmin.net/demo/charts"><i class="fa fa-fw fa-chart-pie"></i> Charts</a></li>
                <li><a href="https://bootadmin.net/demo/maps"><i class="fa fa-fw fa-map-marker-alt"></i> Maps</a></li>
                <li>
                    <a href="#sm_examples" data-toggle="collapse" aria-expanded="true">
                        <i class="fa fa-fw fa-lightbulb"></i> Examples
                    </a>
                    <ul id="sm_examples" class="list-unstyled collapse show">
                        <li class="active"><a href="https://bootadmin.net/demo/examples/blank">Blank/Starter</a></li>
                        <li><a href="https://bootadmin.net/demo/examples/pricing">Pricing</a></li>
                        <li><a href="https://bootadmin.net/demo/examples/invoice">Invoice</a></li>
                        <li><a href="https://bootadmin.net/demo/examples/faq">FAQ</a></li>
                        <li><a href="https://bootadmin.net/demo/examples/login">Login</a></li>
                    </ul>
                </li>
                <li><a href="https://bootadmin.net/demo/docs"><i class="fa fa-fw fa-book"></i> Documentation</a></li>
            </ul>
        </div>

        <div class="content p-4">
            @yield('body')
        </div>
    </div>

    <script src="/vendors/bootadmin/js/jquery.min.js"></script>
    <script src="/vendors/bootadmin/js/bootstrap.bundle.min.js"></script>
    <script src="/vendors/bootadmin/js/datatables.min.js"></script>
    <script src="/vendors/bootadmin/js/moment.min.js"></script>
    <script src="/vendors/bootadmin/js/fullcalendar.min.js"></script>
    <script src="/vendors/bootadmin/js/bootadmin.min.js"></script>

</body>

</html>
