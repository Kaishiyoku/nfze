
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Andreas Wiedel">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

    {{ Html::style('css/app.css') }}
    {{ Html::script('js/app.js') }}
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-custom">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">NFZE</a>

        <div class="collapse navbar-collapse" id="navbar">
            {!! Menu::render() !!}

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/Kaishiyoku"><i class="fa fa-github" aria-hidden="true"></i> GitHub</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="https://twitter.com/Kaishiyoku"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="https://www.andreas-wiedel.de"><i class="fa fa-home" aria-hidden="true"></i> Website</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="mailto:dmp@nfze.de"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container p-t-50">
    @yield('content')

    <footer class="footer p-t-50">
        <div class="row p-b-20 text-muted">
            <div class="col-sm-6">
                @if (date('Y') == 2017)
                    {{ date('Y') }},
                @else
                    2017 - {{ date('Y') }},
                @endif

                Andreas Wiedel
            </div>

            <div class="col-sm-6 text-right hidden-sm-down">
                Timezone: {{ config('app.timezone') }}
            </div>

            <div class="col-sm-6 hidden-sm-up">
                Timezone: {{ config('app.timezone') }}
            </div>
        </div>
    </footer>
</div>
</body>
</html>