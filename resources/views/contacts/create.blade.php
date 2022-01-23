@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Contact</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
            <div class="form-group  ">
                <strong>First Name:</strong>
                <input type="text" name="fname" class="form-control" placeholder="First Name">
            </div>
        </div>
        <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
            <div class="form-group  ">
                <strong>Last Name:</strong>
                <input type="text" name="lname" class="form-control" placeholder="Last Name">
            </div>
        </div>

        <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
            <div class="form-group ">
              <strong>Email:</strong>
                <input class="form-control"  name="email" placeholder="E-mail"></input>
            </div>
        </div>

        <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
            <div class="form-group ">
              <strong>Phone:</strong>
                <input class="form-control"  name="phone" placeholder="Phone"></input>
            </div>
        </div>

        <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
        <div class="form-group">
            <label >select company name:</label>
            <select name="company" class="form-control" id="sel1">
                @foreach ($dervied as $item  )
                <option value="{{$item['name']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        </div>

       


       <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
            <div class="form-group ">
              <strong>Linked In:</strong>
                <input class="form-control"  name="linkedIn" placeholder="Linked In"></input>
            </div>
        </div>

        <div class="col-xs-6 col-sm-12 col-md-6 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection