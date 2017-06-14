<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} Forum</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Space out content a bit */
        body.forum {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        /* Everything gets side spacing for mobile first views */
        .forum .header,
        .forum .footer {
            padding-right: 15px;
            padding-left: 15px;
        }

        /* Custom page header */
        .forum .header {
            padding-bottom: 20px;
        }

        @media screen and (min-width: 768px) {
            .forum .header {
                border-bottom: 1px solid #e5e5e5;
            }
        }

        /* Make the masthead heading the same height as the navigation */
        .forum .header h3 {
            margin-top: 0;
            margin-bottom: 0;
            line-height: 40px;
        }

        /* Custom page footer */
        .forum .footer {
            padding-top: 19px;
            color: #777;
            border-top: 1px solid #e5e5e5;
        }

        /* Customize container */
        .forum .container-narrow > hr {
            margin: 30px 0;
        }

        /* Responsive: Portrait tablets and up */
        @media screen and (min-width: 768px) {
            /* Remove the padding we set earlier */
            .forum .header,
            .forum .footer {
                padding-right: 0;
                padding-left: 0;
            }

            /* Space out the masthead */
            .forum .header {
                margin-bottom: 30px;
            }
        }

        /* Sidebar */
        .forum #sidebar a.btn-block {
            margin-bottom: 15px;
        }

        .forum #sidebar .list-group {
            margin-bottom: 0;
        }

        /* Discussions */
        .forum #content .list-group .list-group-item p.meta {
            margin: 0;
        }

        .forum.discussions #content .panel-options:first-of-type {
            margin-right: 5px;
        }

        .forum.discussions #content .panel-options {
            display: inline;
        }

        .forum.discussions #content .row.post {
            display: flex;
        }

        .forum.discussions #content .row.post .user {
            border-right: 1px solid #ddd;
        }

        @media screen and (min-width: 768px) {
            .forum.discussions #content .quick-reply .btn {
                width: 50%;
            }
        }
    </style>

    @yield('head')
</head>
<body class="{{ collect(request()->segments())->implode(' ') }}">
    <div class="container">
        @include('forum::partials.header')

        <div class="row">
            <div class="col-xs-12 col-sm-3" id="sidebar">
                @include('forum::partials.sidebar')
            </div>

            <div class="col-xs-12 col-sm-9" id="content">
                @yield('content')
            </div>
        </div>

        @include('forum::partials.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    @yield('foot')
</body>
</html>
