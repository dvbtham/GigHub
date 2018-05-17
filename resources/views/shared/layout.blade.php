<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - GigHub</title>
    <link href="{{url ('css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{url ('css/toastr.min.css')}}" rel="stylesheet"/>
    <link href="{{url ('css/animate.min.css')}}" rel="stylesheet"/>
    <link href="{{url ('css/site.css')}}" rel="stylesheet"/>

    <script src="{{url ('js/modernizr-2.6.2.js')}}"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class = "navbar-brand">GigHub</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('gigs.create') }}" class = "navbar-brand">Add a Gig</a></li>
                </ul>
                @if(\Auth::check())
                 {!! Form::open(['route' => 'logout', 'id' => 'logoutForm']) !!}
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
                                <li><a href="/">My Upcoming Gigs</a></li>
                                <li><a href="/">Gigs I'm Going</a></li>
                                <li><a href="/">Artist I'm following</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="javascript:document.getElementById('logoutForm').submit()">Log off</a></li>
                            </ul>
                        </li>
                    </ul>
                    {!! Form::close() !!}
                    @else
                    <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('register') }}">Đăng ký</a></li>
                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                        </ul>
                    @endif
            </div>
        </div>
    </div>
    <div class="container body-content">
        @yield('body')
    <hr />
    <footer>
        <p>&copy; 2018 - GigHub</p>
    </footer>
    </div>

    <script src="/js/jquery-1.10.2.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/bootbox.min.js"></script>
    <script src="/js/underscore-min.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <script src="/js/toastr.min.js"></script>
    <script src="/js/toggle-attendances.js"></script>
    <script src="/js/toggle-following.js"></script>

    @yield("scripts")
    <script type="text/x-template" id="notifications-template">
        <ul class="notifications-box">
            <%
                _.each(notifications, function(notification){
                    if(notification.type == 1){ %>
                        <li>
                           <span class="highlight"><%= notification.gig.artist.name %></span> has canceled the gig at <%= notification.gig.venue %> at <%= moment(notification.gig.dateTime).format("D MMM HH:mm") %>.
                        </li>
                    <% }
                    else if(notification.type == 2){
                        var changes = [],
                            originalValues = [],
                            newValues = [];

                        if(notification.originalVenue != notification.gig.venue){
                            changes.push('venue');
                            originalValues.push(notification.originalVenue);
                            newValues.push(notification.gig.venue);
                        }
                        if(notification.originalDateTime != notification.gig.dateTime){
                            changes.push('date/time');
                            originalValues.push(moment(notification.originalDateTime).format("D MMM HH:mm"));
                            newValues.push(moment(notification.gig.dateTime).format("D MMM HH:mm"));
                        } %>
                        <li>
                            <span class="highlight"> <%= notification.gig.artist.name %></span> has changed the <%= changes.join(' and ') %> of the gig from <%= originalValues.join('/') %> to <%= newValues.join('/')  %>.
                        </li>
                   <%
                    }
                })
            %>

        </ul>
    </script>

    <script src="/js/app.js"></script>
</body>
</html>
