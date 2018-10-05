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
            color: #fff;
            background-color: #34495e;
            text-align: center;
            line-height: 60px;
        }

        .el-aside {
            text-align: center;
            line-height: 200px;
        }

        .el-main {
            text-align: center;
            line-height: 160px;
        }

        body>.el-container {
            margin-bottom: 10px;
        }

        .el-container:nth-child(5) .el-aside,
        .el-container:nth-child(6) .el-aside {
            line-height: 260px;
        }

        .el-container:nth-child(7) .el-aside {
            line-height: 320px;
        }
    </style>

    @yield('css_style')

    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dplayer@1.25.0/dist/DPlayer.min.css">
    <script src="https://cdn.jsdelivr.net/npm/dplayer@1.25.0/dist/DPlayer.min.js"></script>
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
                <el-row>
                    <el-col :span="24">
                        <div>Copyright © 2018 Jason Wang</div>
                    </el-col>
                </el-row>
                @show
            </el-footer>
        </el-container>

    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    @yield('js_script')
</body>

</html>