<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <script href="{{ mix('/js/app.js') }}"></script>

    <title>{{ $title ?? 'つぶやきアプリ' }}</title>
    @stack('css')
</head>
<body class="bg-gray-50">
{{ $slot }}
<script href="{{ mix('/js/app.js') }}"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

</body>
</html>
