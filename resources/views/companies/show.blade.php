@extends('adminlte::page')
@section('content_header')
<h1>COMPANY PROILE</h1>
@stop

@section('content')
<div class="content">
<div class="row">
<div class="col-md-5 col-md-offset-4">
<div class="box box-primary">
    <div class="box-body box-profile">
       <img class="profile-user-img img-responsive img-circle" src="{{$company->logo}}"  alt="Company {{$company->name}} Logo">
        <h3 class="profile-username text-center">{{$company->name}}</h3>
        <p class="text-muted text-center"><a>{{$company->email}}</a></p>
        <p class="text-muted text-center"><a href ="{{$company->website}}">{{$company->website}}</a></p>
        <h4 class="text-muted text-left"><b>EMPLOYEES:</b></h4>
        <hr>
        @isset($company->employees)
        @foreach ($company->employees as $employee)
            <p class="text-muted text-center">{{$employee->first_name}}  {{$employee->Last_name}}</p>
            <p class="text-muted text-center">{{$employee->email}} </p>
            <p class="text-muted text-center">{{$employee->phone}} </p>
            <hr>
        @endforeach
        @endisset

    </div>
</div>

</div>

</div>

</div>

@stop
