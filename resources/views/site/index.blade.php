 @extends('layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Banks</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Banks</li>
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
                      <th>Site</th>
                      <th>Work Amount</th>
                      <th>Expenses</th>
                      <th>At</th>
                      <th>Engineer</th>
                      <th>Purchase</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $i=0; @endphp
                  	@foreach($site as $exp)
               
                    <tr>
                      <td>{{ $i++}}</td>
                      <td>{{ $exp->job_describe }}</td>
                      <td class="text-success">{{ number_format($exp->work_value,2) }}</td>
                      <td class="text-danger">{{ number_format(totalexpense($exp->id),2) }}</td>
                      <td>{{ $exp->place_of_supply }}</td>
                      <td>{{ optional($exp->siteeng)->user->name }}</td>
                       <td><a href="{{ route('site-cost' ,$exp->id) }}"><button class="btn btn-warning btn-sm mr-2">PHExp</button></a></td>
                        <td><a href=""><button class="btn btn-primary btn-sm">Other</button></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $site->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>




@endsection