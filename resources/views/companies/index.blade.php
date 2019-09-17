@extends('adminlte::page')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')

<a href="companies/create" class="btn-lg btn-primary">Create New Company</a>
<br/>
<br/>

<table id="companies" class="table table-bordered">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>logo</th>
        <th>website</th>
        <th>Update Action</th>
    <th>delete Action</th>
    </th>
    </thead>
    <tbody>
    @foreach ($companies as $company)
       <tr>
           <td>{{$company->id}}</td>
        <td><a href="/companies/{{$company->id}}"> {{ $company->name }}</a></td>
        <td> {{ $company->email }}</td>
        <td> <img src="{{asset($company->logo)}}" alt=""class="img img-responsive" width="100" height="100"></td>
        <td> {{ $company->website }}</td>
        <td><a href="companies/{{$company->id}}/edit" class="btn-lg btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
            </td>
        <td><form action="companies/{{$company->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
            </form></td>
       </tr>
    @endforeach
    </tbody>
</table>
{{ $companies->links() }}





@stop
