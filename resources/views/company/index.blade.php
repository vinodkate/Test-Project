@extends('layouts.app')

@section('css')
<link href="{{ asset('css/dashboard.css')}}" rel="stylesheet">
@endsection

@section('content')

  <div class="container-fluid">
    <div class="row">

      @include('layouts.sidenav')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="row">
          <div class="col-sm-2">
            <h2>Companies</h2>
          </div>
          <div class="col-sm-2">
            <a href="{{ route('company.create') }}">
              <button type="button" class="btn btn-primary">Add Company</button>
            </a>
          </div>
          <div class="col-sm-8">
            @if(session('message'))
            <div class="alert alert-success" role="alert">
                <p class="mb-0">
                    {{session('message')}}
                </p>
            </div>
            @endif
          </div>
        </div>


        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Website</th>
              <th>Logo</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($companies as $company)
            <tr>
               <td>{{ $company->id }}</td>
               <td>{{ $company->name }}</td>
               <td>{{ $company->email }}</td>
               <td>{{ $company->website }}</td>
               <td> <img height="40" width="80" src="{{ asset('storage/logo/'.$company->logo) }}" /></td>
               <td><a href="{{ route('company.edit', $company->id) }}"><button type="button" class="btn btn-info">Edit</button></a></td>
               <td>
                  <form action="{{ route('company.destroy',$company->id) }}" method="POST">
                   @method('DELETE')
                   @csrf
                   <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $companies->links() }}
      </main>
    </div>
  </div>

@endsection
