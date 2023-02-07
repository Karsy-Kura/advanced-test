<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/common.css">
  <link rel="stylesheet" href="/css/@yield('css')">
</head>
<body>
  <header class="common-header">
    @yield('header')
  </header>
  <div class="common-content">
    @yield('content')
  </div>
</body>
<script src="/js/@yield('script')"></script>
</html>