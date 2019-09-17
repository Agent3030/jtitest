@extends('adminlte::page')
@section('content_header')
    @empty($id)
        <h1>Create New Employee</h1>
    @endempty
    @isset($id)
        <h1>Update Employee</h1>
    @endisset
@stop
@isset($id)
@section('content')<form method="POST" action="/employees/{{$id}}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="first_name">Employee First Name</label>

        <input id="first_name" name ="first_name" type="text" value="{{$employee-> first_name}}" class="@error('first_name') is-invalid @enderror form-control">
        @error('first_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="last_name">Employee Last Name</label>

        <input id="last_name" name ="last_name" type="text" value="{{$employee-> last_name}}" class="@error('last_name') is-invalid @enderror form-control">

        @error('last_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="website">Employee Company</label>

        <select name="company_id" value="{{$employee-> company_id}}" class="@error('company_id') is-invalid @enderror form-control">
            @foreach ($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>

        @error('company_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="email">Employee Email</label>

        <input id="email" name ="email" type="text"value="{{$employee-> email}}" class="@error('email') is-invalid @enderror form-control">

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="phone">Employee Phone</label>

        <input id="phone" name ="phone" type="text" value="{{$employee-> phone}}" class="@error('phone') is-invalid @enderror form-control">

        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="hidden" name="id" value="{{$id}}">

    </div>
    <button type="submit" class ="btn-lg btn-success">UPDATE EMPLOYEE</button>
</form>


@stop
@endisset
@empty($id)
@section('content')<form method="POST" action="/employees" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
    <label for="first_name">Employee First Name</label>

    <input id="first_name" name ="first_name" type="text" class="@error('first_name') is-invalid @enderror form-control">

    @error('first_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="last_name">Employee Last Name</label>

    <input id="last_name" name ="last_name" type="text" class="@error('last_name') is-invalid @enderror form-control">

    @error('last_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="website">Employee Company</label>

        <select name="company_id" class="@error('company_id') is-invalid @enderror form-control">
             @foreach ($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>

        @error('company_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="email">Employee Email</label>

        <input id="email" name ="email" type="text" class="@error('email') is-invalid @enderror form-control">

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="phone">Employee Phone</label>

        <input id="phone" name ="phone" type="text" class="@error('phone') is-invalid @enderror form-control">

        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror



    </div>
    <button type="submit" class ="btn-lg btn-success">SAVE EMPLOYEE</button>
</form>


@stop
@endempty
