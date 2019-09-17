@extends('adminlte::page')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')

<a href="companies/create" class="btn-lg btn-primary">Create New Employee</a>
<br/>
<br/>
<table id="companies" class="table table-bordered">
    <thead>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Company</th>
        <th>email</th>
h        <th>Update Action</th>
         <th>delete Action</th>
    </thead>
    <tbody>
    @foreach ($employees as $employee)
       <tr>
        <td> {{ $employee->id }}</td>
           <td> <a href="/employees/{{$employee->id}}">{{ $employee->first_name }}</a></td>
        <td> {{ $employee->Last_name }}</td>
        <td> {{ $employee->company->name }}</td>
        <td> {{ $employee->email }}</td>
        <td> {{ $employee->phone }}</td>
        <td><a href="employees/{{$employee->id}}/edit" class="btn-lg btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
            </td>
        <td><form action="employees/{{$employee->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
            </form></td>
       </tr>
    @endforeach
    </tbody>
</table>
{{ $employees->links() }}




@stop
