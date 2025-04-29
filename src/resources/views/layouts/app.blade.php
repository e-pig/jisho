<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dictionary</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
        @yield('css')
    </head>

    <body>
        <header class="header">
            <div class="header__inner">
            </div>
        </header>

        <main>
            <!-- 後で入力 --!>
            @yield('content')
        </main>
    </body>

</html>
