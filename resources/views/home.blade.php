@extends('layouts.app')

@section('css')
<link href="{{ asset('css/dashboard.css')}}" rel="stylesheet">
@endsection

@section('content')

  <div class="container-fluid">
    <div class="row">

      @include('layouts.sidenav')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h2>Test Project</h2>

      </main>
    </div>
  </div>

@endsection
