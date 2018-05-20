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
    @include('shared.nav')
    <div class="container body-content">
        <div class="row">
            <div class="col-md-9">
                @yield('body')
            </div>
            <div class="col-md-3">
                <h2>New gigs</h2>
                <ul class="gigs voffset40">
                    <li class="gig-item">
                        <div class="date">
                            <div class="month">
                                May
                            </div>
                            <div class="day">
                                23
                            </div>
                        </div>
                        <div class="details">
                            <div class="artist">
                                Thâm Davies
                            </div>

                            <div class="genre">
                                Blues
                            </div>
                            <div class="actions">
                                <button data-following-id="81aaeb77-1997-4f39-b38d-5f77fd3f359b" class="btn btn-default btn-sm js-toggle-following">Follow</button>
                                <button data-gig-id="4" class="btn btn-default btn-sm js-toggle-attendance">Going?</button>
                            </div>

                        </div>
                    </li>
                    <li class="gig-line"></li>
                </ul>
            </div>
        </div>
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
