@extends('layouts.app')

@section('css')
<link href="{{ asset('css/dashboard.css')}}" rel="stylesheet">
@endsection

@section('content')

  <div class="container">
      <div class="row">
        @include('layouts.sidenav')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

          {!! Form::model($employee, [
              'method' => $employee->exists ? 'PUT' : 'POST',
              'route' => $employee->exists ? ['employee.update', $employee->id] : 'employee.store',
              'id' => 'employee_form'
          ]) !!}

            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="company">Select Company</label>
                  {!! Form::select('company_id', ['' => '--- SELECT COMPANY ---']+$companies, null, [
                      'class' => "form-control",
                  ]) !!}
                  <span class="alert-danger">{{ $errors->first('company_id') }}</span>
              </div>

              <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                {!! Form::text('first_name', null, [
                    'class' => "form-control",
                    'placeholder' => "First Name"
                ]) !!}
                <span class="alert-danger">{{ $errors->first('first_name') }}</span>
              </div>

              <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                {!! Form::text('last_name', null, [
                    'class' => "form-control",
                    'placeholder' => "Last Name"
                ]) !!}
                <span class="alert-danger">{{ $errors->first('last_name') }}</span>
              </div>
            </div>

            <div class="form-row">

              <div class="form-group col-md-6">
                <label for="email">Email</label>
                {!! Form::email('email', null, [
                    'class' => "form-control",
                    'placeholder' => "Email"
                ]) !!}
                <span class="alert-danger">{{ $errors->first('email') }}</span>
              </div>

              <div class="form-group col-md-6">
                <label for="name">Phone</label>
                {!! Form::text('phone', null, [
                    'class' => "form-control",
                    'placeholder' => "Phone",
                    'maxlength' => 10
                ]) !!}
                <span class="alert-danger">{{ $errors->first('phone') }}</span>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('employee.index') }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
          {!! Form::close() !!}
        </main>
      </div>
  </div>
  @endsection
