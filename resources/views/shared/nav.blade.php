<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a href="/" class="navbar-brand">GigHub</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('gigs.create') }}" class="navbar-brand">Add a Gig</a></li>
            </ul>
            @if(\Auth::check()) {!! Form::open(['route' => 'logout', 'id' => 'logoutForm']) !!}
            <ul class="nav navbar-nav navbar-right">
                <li class="notifications">
                    <a href="#">
                                <i class="glyphicon glyphicon-globe"></i>
                                <span class="badge js-notifications-count hide">2</span>
                            </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">My Profile</a></li>
                        <li><a href="{{ route('gigs.mine') }}">My Upcoming Gigs</a></li>
                        <li><a href="/">Gigs I'm Going</a></li>
                        <li><a href="/">Artist I'm following</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void()" id="logoff">Log off</a></li>
                    </ul>
                </li>
            </ul>
            {!! Form::close() !!} @else
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
            @endif
        </div>
    </div>
</nav>
