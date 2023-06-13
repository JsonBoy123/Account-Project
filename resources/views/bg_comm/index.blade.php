@extends('layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>BG Commission (%)</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">BG Commission (%)</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">BG Commission (%)</a></li>
        </ul>
      </div>
      {{-- <p><a class="btn btn-primary icon-btn" href="{{ route('fund-request') }}"><i class="fa fa-plus"></i>Add Fund Request</a></p> --}}
      <div class="row">
        <div class="col-md-12">
        	@if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>S.no.</th>
                      <th>BG Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach($bGcomm as $gua)
                    <tr>
                      
                      <td>{{ $s_no }}</td>
                      <td>{{ $gua->bg_comm_per }}</td>
                      <td><a href="{{ route('BGComm.edit',$gua->id) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a>
                        <form action="{{ route('BGComm.destroy',$gua->id) }}" method="POST">  
                          @csrf
                          @method('DELETE')   
                          <button class="btn btn-danger btn-xs"><i class="fa fa-lg fa-trash"></i></button>
                        </form>
                      </td>
                      
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $bGcomm->links() }}
              </div>
            </div>
          </div>
          <div class="tile-footer">
            <a href="{{ route('BGComm.create') }}"><button class="btn btn-primary">Add New BG Commission</button></a>
          </div>
        </div>
      </div>
    </main>

@endsection