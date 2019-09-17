@extends('adminlte::page')
@section('content_header')
    <h1>EMPLOYEE PROILE</h1>
@stop

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-5 col-md-offset-4">
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <h3 class="profile-username text-center">{{$employee->first_name}}{{$employee->Last_name}}</h3>
                        <p class="text-muted text-center"><a>{{$employee->email}}</a></p>
                        <p class="text-muted text-center"><a >{{$employee->phone}}</a></p>
                        <h4 class="text-muted text-left"><b>COMPANY:</b></h4>
                        <hr>

                            <img class="profile-user-img img-responsive img-circle" src="{{$employee-> company->logo}}"  alt="Company {{$employee->company->name}} Logo">

                                <p class="text-muted text-center"><a href="/companies/{{$employee->company->id}}">{{$employee->company->name}}</a></p>
                                <p class="text-muted text-center">{{$employee->company->email}} </p>
                        <p class="text-muted text-center"><a href="{{$employee->company->website}}">{{$employee->company->website}}</a> </p>
                                <hr>


                    </div>
                </div>

            </div>

        </div>

    </div>
@stop
