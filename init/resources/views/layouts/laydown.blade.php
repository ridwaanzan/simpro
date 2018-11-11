<!DOCTYPE html>
<html>
<head>
    <meta name="csrf_token" content="{{ csrf_token() }}">
	<title>SIPP (Sistem Informasi Progress Project)</title>
    {!!Html::style('css/bootstrap.css')!!}
    {!!Html::style('datatables/datatables.min.css')!!}
    <style type="text/css">
    </style>
</head>
<body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        SI-Progress Project
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{url('admin/jurusan')}}">
                                Jurusan
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/mahasiswa')}}">
                                Mahasiswa
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/slider')}}">
                                Slider
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>

    {!!Html::script('datatables/jQuery-3.2.1/jquery-3.2.1.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('datatables/datatables.min.js')!!}
    {!!Html::script('admin/ckeditor/ckeditor.js')!!}
    @yield('scripting')
</body>
</html>