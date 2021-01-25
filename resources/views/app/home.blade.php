@extends('layouts.main')

@section('content')

        <div class="container">
            <div class="content">
                <div class="col-md-12" style="text-align:justify; font-size:normal;font-family:sans-serif;">
                    
                <h2 style="text-align: center;font-weight:bold; font-size:medium; padding: 5px 0;"> Druk Geo-Portal</h2>

                <p>
                Druk geoportal is a type of web portal used to view geographic information and associated geographic services via the Internet.</p>
                <p><strong> Read Here: </strong><a href="{{route('apps.geoportal')}}">Druk Geo-Portal</a></p>
                </div>
            </div>

            <div class="content">
                <div class="col-md-12" style="text-align:justify; font-size:normal;font-family:sans-serif;">
                    
                <h2 style="text-align: center;font-weight:bold; font-size:medium; padding: 5px 0;">Tourism Information System</h2>

                <p>
                The tourism information system serves as tourism information centres which offers well organised, customer friendly and high quality tourism information to both internal tourists and foreign visitors.</p>
                <p><strong> Read Here: </strong><a href="{{route('apps.tis')}}">Bhutan Geo-Portal</a></p>
                </div>
            </div>

        </div>

@endsection