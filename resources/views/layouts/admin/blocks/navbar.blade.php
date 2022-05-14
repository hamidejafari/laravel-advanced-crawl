<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <ul class="navbar-nav" style="width: 100%">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>

        <li class="nav-item d-none d-sm-inline-block" style="width: 50%;text-align: center;">
            <p>قیمت دلار خام ‌: {{number_format($price_dollar_side) . ' تومان  '}}</p>
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="width: 50%;text-align: right;">
            <p>قیمت دلار با سود پی پال ‌: {{number_format($profit_dollar_side) . ' تومان  '}}</p>
        </li>
    </ul>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                    class="fa fa-th-large"></i></a>
        </li>
    </ul>
</nav>
