@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit contact</h2>
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

    <form action="{{ route('contacts.update',$contact->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
         <div class="row">
            <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="fname" value="{{ $contact->fname }}" class="form-control" >
                </div>
            </div>

            <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="lname" value="{{ $contact->lname }}" class="form-control" >
                </div>
            </div>

            <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input class="form-control" value="{{ $contact->email }}"  name="email" placeholder="E-mail"></input>
                </div>
            </div>

           
    
    
           <div class="col-xs-6 col-sm-12 col-md-6 mx-5">
                <div class="form-group ">
                  <strong>Phone:</strong>
                    <input class="form-control" value="{{ $contact->phone }}"  name="phone" placeholder="Website"></input>
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
                    <input class="form-control" value="{{ $contact->linkedIn }}"  name="linkedIn" placeholder="linkedIn"></input>
                </div>
            </div>
    

            <div class="col-xs-6 col-sm-6 col-md-6 text-center my-3">
              <button type="submit" class="btn btn-primary w-50">Submit</button>
            </div>
        </div>
    </form>
@endsection