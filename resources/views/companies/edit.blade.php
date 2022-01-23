@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Company</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
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

    <form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
         <div class="row">
            <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $company->name }}" class="form-control" >
                </div>
            </div>

            <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input class="form-control" value="{{ $company->email }}"  name="email" placeholder="E-mail"></input>
                </div>
            </div>

            <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
                <div class="form-group ">
                  <strong>Logo:</strong>
                    <input type="file" class="form-control"   name="logo" placeholder="logo"></input>
                </div>
            </div>
    
    
           <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
                <div class="form-group ">
                  <strong>Website:</strong>
                    <input class="form-control" value="{{ $company->website }}"  name="website" placeholder="Website"></input>
                </div>
            </div>
    

            <div class="col-xs-6 col-sm-6 col-md-6 text-center my-3">
              <button type="submit" class="btn btn-primary w-50">Submit</button>
            </div>
        </div>
    </form>
@endsection