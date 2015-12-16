<!-- main nav -->
<nav class="navbar navbar-default navbar-fixed-top">

    <div class="container">

        <!-- nav header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-main" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::route('frontpage') }}">
                {{ $app_name }}
            </a>
        </div>
        <!-- /nav header -->

        <!-- nav body -->
        <div class="collapse navbar-collapse" id="nav-main">

            <!-- navbar right -->
            <ul class="nav navbar-nav navbar-right">

                @if (Auth::guest())
                    <li>
                        <a href="{{ URL::route('login') }}">
                            {{ Lang::get('navbar.login_btn') }}
                        </a>
                    </li>
                    <li>
                        <a class="navbar-btn btn btn-primary" href="{{ URL::route('signup') }}">
                            {{ Lang::get('navbar.signup_btn') }}
                        </a>
                    </li>
                @else
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::route('logout') }}"><i class="fa fa-sign-out"></i> {{ Lang::get('navbar.logout_btn') }}</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
            <!-- /navbar right -->

        </div>
        <!-- /nav body -->

    </div>

</nav>
<!-- /main nav -->