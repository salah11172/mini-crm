@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>companies </h2>
                
                    <div class="mx-auto pull-right">
                            <form action="{{ route('companies.index') }}" method="GET" role="search">
                                <div class=" my-3">
                                    <input type="text" class=" col-lg-3" name="term" placeholder="Search with name" id="term">
                                    <button class="btn btn-info" type="submit" title="Search copmpanies">
                                        Search
                                    </button>
                                    <a href="{{ route('companies.index') }}" class=" mt-1">
                                            <button class="btn btn-danger" type="button" title="Refresh page">
                                                Refresh
                                            </button>
                                    </a>
                                </div>
                            </form>
                        
                    </div>
                


            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/admin/dashboard"> Back</a>
                <a class="btn btn-success" href="{{ route('companies.create') }}"> Create New Company</a>
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
            <th class="text-center">logo </th>
            <th class="text-center">website</th>
            <th class="text-center">Actions</th>
        </tr>
        @foreach ($companies as $company)
        <tr>
            <td class="text-center">{{ $company->name}}</td>
            <td class="text-center">{{ $company->email }}</td>
            <td><img class="ms-5" src="{{asset('images/logo/' .$company['logo'])}}" width="200px" height="80px"></td>
            <td class="text-center"><a href="{{ $company->website }}" target="_blanck">{{ $company->website }}</a></td>
            <td class="text-center">
          
                    <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
                <form style="display: inline" action="{{ route('companies.destroy',$company->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $companies->onEachSide(5)->links() }}    


@endsection