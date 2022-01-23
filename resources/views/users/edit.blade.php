@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit user and make user admin</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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

    <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
         <div class="row">
            <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
                <div class="form-group">
                    <strong> Name:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" >
                </div>
            </div>

            

            <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input class="form-control" value="{{ $user->email }}"  name="email" placeholder="E-mail"></input>
                </div>
            </div>

           
    
    
           <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
                <div class="form-group ">
                  <strong>Phone:</strong>
                    <input class="form-control" value="{{ $user->phone }}"  name="phone" placeholder="Website"></input>
                </div>
            </div>


       

            <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
                <div class="form-group ">
                  <strong> is_admin:</strong>
                    <input class="form-control" value="{{ $user->is_admin }}"  name="is_admin" placeholder="Enter 1 to make this user admin"></input>
                </div>
            </div>
    

            <div class="col-xs-6 col-sm-6 col-md-6 text-center my-3">
              <button type="submit" class="btn btn-primary w-50">Submit</button>
            </div>
        </div>
    </form>
@endsection