@extends('layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Site Receiver:-{{ $site }}</h1>
          <p>Site Receiver</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Site Receiver</li>
          <li class="breadcrumb-item"><a href="">Receiver Item</a></li>
        </ul>
      </div>
        <div class="row">
        <div class="col-md-12">
          <div class="tile">
          	Your are not Authorize to Access
          </div>
      </div>
  </div>
      </main>
@endsection