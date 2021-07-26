<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        {{-- linko CSS --}}
        {{-- !asset() x puntare direttamente a public! --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        {{-- root Vue --}}
        <div id="root">

        </div>
    {{-- linko JS FrontOffice  --}}
    <script src=" {{ asset('js/front.js') }}"></script>
    </body>
</html>
