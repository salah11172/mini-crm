@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>contacts </h2>


            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/admin/dashboard"> Back</a>
                <a class="btn btn-success" href="{{ route('contacts.create') }}"> Create New Contact</a>
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
            <th class="text-center">FirstName </th>
            <th class="text-center">LastName </th>
            <th class="text-center">E-mail</th>
            <th class="text-center">Phone </th>
            <th class="text-center">Company</th>
            <th class="text-center">LinkedIn</th>
            <th class="text-center">Actions</th>
        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <td class="text-center">{{ $contact->fname}}</td>
            <td class="text-center">{{ $contact->lname}}</td>
            <td class="text-center">{{ $contact->email }}</td>
            <td class="text-center">{{ $contact->phone }}</td>
            <td class="text-center">{{ $contact->company }}</td>
            <td class="text-center">{{ $contact->linkedIn }}</td>

            <td class="text-center">
          
                    <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>
                <form style="display: inline" action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        
        @endforeach
    </table>
    {{ $contacts->onEachSide(5)->links() }}    

@endsection