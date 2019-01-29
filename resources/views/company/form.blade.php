@extends('layouts.app')

@section('css')
<link href="{{ asset('css/dashboard.css')}}" rel="stylesheet">
@endsection

@section('content')

  <div class="container">
      <div class="row">
        @include('layouts.sidenav')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

          {!! Form::model($company, [
              'method' => $company->exists ? 'PUT' : 'POST',
              'route' => $company->exists ? ['company.update', $company->id] : 'company.store',
              'id' => 'company_form',
              'files' => true,
          ]) !!}

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Company Name</label>
                {!! Form::text('name', null, [
                    'class' => "form-control",
                    'placeholder' => "Company Name"
                ]) !!}
                <span class="alert-danger">{{ $errors->first('name') }}</span>
              </div>

              <div class="form-group col-md-6">
                <label for="email">Email</label>
                {!! Form::email('email', null, [
                    'class' => "form-control",
                    'placeholder' => "Email"
                ]) !!}
                <span class="alert-danger">{{ $errors->first('email') }}</span>
              </div>
            </div>
            <div class="form-group">
              <label for="website">Website e.g. http://www.google.com</label>
              {!! Form::text('website', null, [
                  'class' => "form-control",
                  'placeholder' => "Website"
              ]) !!}
              <span class="alert-danger">{{ $errors->first('website') }}</span>
            </div>
            <div class="form-group">
              <label for="logo">Logo (Min : 100px x 100px)</label>
              <input type="file" class="form-control-file" id="logo" name="logo">
              <span class="alert-danger">{{ $errors->first('logo') }}</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('company.index') }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
          {!! Form::close() !!}
        </main>
      </div>
  </div>
  @endsection
