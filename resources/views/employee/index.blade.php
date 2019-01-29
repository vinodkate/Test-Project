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
            <h2>Employees</h2>
          </div>
          <div class="col-sm-2">
            <a href="{{ route('employee.create') }}">
              <button type="button" class="btn btn-primary">Add Employee</button>
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
              <th>Company</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($employees as $employee)
            <tr>
               <td>{{ $employee->id }}</td>
               <td>{{ $employee->company->name }}</td>
               <td>{{ $employee->first_name }}</td>
               <td>{{ $employee->last_name }}</td>
               <td>{{ $employee->email }}</td>
               <td>{{ $employee->phone }}</td>
               <td><a href="{{ route('employee.edit', $employee->id) }}"><button type="button" class="btn btn-info">Edit</button></a></td>
               <td>
                  <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
                   @method('DELETE')
                   @csrf
                   <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $employees->links() }}
      </main>
    </div>
  </div>

@endsection
