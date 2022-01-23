@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>users </h2>
              <p class="fw-bolder">if is_admin=0 this is user </p>
              <p class="fw-bolder">if is_admin=0 this is admin </p>


            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/admin/dashboard"> Back</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th class="text-center">Name </th>
            
            <th class="text-center">E-mail</th>
            <th class="text-center">Phone </th>
            <th class="text-center">Is Admin</th>
         
            <th class="text-center">Actions</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td class="text-center">{{ $user->name}}</td>
            <td class="text-center">{{ $user->email }}</td>
            <td class="text-center">{{ $user->phone }}</td>
            <td class="text-center">{{ $user->is_admin}}</td>
          

            <td class="text-center">
          
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
              
            </td>
        </tr>
        @endforeach
    </table>

@endsection