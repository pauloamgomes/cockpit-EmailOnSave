<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <style>
            pre { margin: 0}
            .field { margin-top: 10px}
        </style>
    </head>
    <body>
        <div class="container">

            <strong>{{ $app['app.name'] }}</strong> - [<strong>{{ $name }}</strong>]

            <div>
              {{ $body }}
            </div>

        </div>
    </body>
</html>