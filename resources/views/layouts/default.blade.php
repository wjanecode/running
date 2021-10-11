{{-- 先声明文档类型，doctype 文档类型 --}}
<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title','running App') - Laravel 入门二刷</title>
    {{-- Laravel 在运行时，是以 public 文件夹为根目录的，因此我们可以使用下面这行代码来为 Laravel 引入样式： --}}
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
  </head>
  <body>
    {{-- 引入头部导航栏 --}}
    @include('layouts._header')


    <div class="container">
      {{-- 引入底部 --}}
      <div class="offset-md-1 col-md-10">
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>
  </body>
</html>
























