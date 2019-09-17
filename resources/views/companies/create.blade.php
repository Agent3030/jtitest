@extends('adminlte::page')
@section('content_header')
    @empty($id)
   <h1>Create New Company</h1>
    @endempty
    @isset($id)
        <h1>Update Company</h1>
    @endisset
@stop
@section('content')


    @isset($id)
      <form method="POST" action="/companies/{{$id}}" enctype="multipart/form-data" >
          @method('PUT')
          @csrf

          <div class="form-group">
              <label for="name">Company Name</label>

              <input id="name" name ="name" type="text" value="{{$company->name}}" class="@error('name') is-invalid @enderror form-control">

              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <label for="email">Company Email</label>

              <input id="email" name ="email" type="text" value="{{$company->email}}" class="@error('email') is-invalid @enderror form-control">

              @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <label for="website">Company Website</label>

              <input id="website" name ="website" type="text" value="{{$company->website}}" class="@error('website') is-invalid @enderror form-control">

              @error('website')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <label for="logo">Company Logo</label>

              <input id="logo" name ="logo" type="file"  value="{{$company->logo}}" class="@error('logo') is-invalid @enderror form-control">

              @error('logo')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror

          </div>


        <input type="hidden" name="id" value="{{$id}}">
          <button type="submit" class ="btn-lg btn-success">Update</button>
      </form>

@stop
    @endisset
     @empty($id)
@section('content')
      <form method="POST" action="/companies" enctype="multipart/form-data" >
          @csrf
    <div class="form-group">
    <label for="name">Company Name</label>

    <input id="name" name ="name" type="text" class="@error('name') is-invalid @enderror form-control">

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="email">Company Email</label>

    <input id="email" name ="email" type="text"  class="@error('email') is-invalid @enderror form-control">

    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="website">Company Website</label>

    <input id="website" name ="website" type="text"  class="@error('website') is-invalid @enderror form-control">

    @error('website')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

        <label for="logo">Company Logo</label>

        <input id="logo" name ="logo" type="file" class="@error('logo') is-invalid @enderror form-control">

        @error('logo')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>
    <button type="submit" class ="btn-lg btn-success">SAVE</button>
</form>
@stop
@endempty


