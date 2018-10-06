<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        .el-header {
            padding: 20px 0;
        }

        .el-footer {
            padding: 20px 0;
            text-align: center;
            line-height: 23px;
        }

        .el-aside {
            text-align: center;
            line-height: 23px;
        }

        .el-main {
            text-align: center;
            line-height: 23px;
        }

        body>.el-container {
            margin-bottom: 10px;
        }

        .el-container:nth-child(5) .el-aside,
        .el-container:nth-child(6) .el-aside {
            line-height: 23px;
        }

        .el-container:nth-child(7) .el-aside {
            line-height: 23px;
        }
    </style>

    @yield('css_style')

    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dplayer@1.25.0/dist/DPlayer.min.css">
    
</head>

<body>
    <div id="app">
        <el-container>
            <el-header>
                @section('header')
                <navbar-component></navbar-component>
                @show
            </el-header>
            <el-main>
                @section('main')
                @show
            </el-main>
            <el-footer>
                @section('footer')    
                <footer-component></footer-component>
                @show
            </el-footer>
        </el-container>

    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dplayer@1.25.0/dist/DPlayer.min.js"></script>
    @yield('js_script')
</body>

</html>