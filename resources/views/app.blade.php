
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <link rel="stylesheet" href="css/app.css">
</head>

<body>

<nav class="navbar navbar-inverse bg-custom navbar-toggleable-md">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleContainer" aria-controls="navbarsExampleContainer" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">NFZE</a>

        <div class="collapse navbar-collapse" id="navbarsExampleContainer">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
            </ul>

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
        <p>
            @if (date('Y') == 2017)
                {{ date('Y') }},
            @else
                2017 - {{ date('Y') }},
            @endif

            Andreas Wiedel
        </p>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<script src="https://use.fontawesome.com/22a395d1f9.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>