@extends('layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Expenses</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Expense List</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">Expense-From</a></li>
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
                      <th>Purchased from</th>
                      <th>Items</th>
                      <th>Alloted by Manager</th>
                      <th>Received By</th>
                      {{-- <th>Total Cost</th> --}}
                      <th>Detail View</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@php $i=1 @endphp
                  	@foreach($show as $shw)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $shw->vendor->firm_name }}</td>
                      <td>{{ count(json_decode($shw->items))}}</td>
                      <td>{{ $shw->infosite->manager->name}}</td>
                      <td>{{ $shw->infosite->user->name}}</td>
                      {{-- <td>trey</td> --}}
                      <td><a href=""><button class="btn btn-primary">Details</button></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $show->links() }}
              </div>
            </div>
          </div>
      </div>
  </div>
  @if($count > 0)
   <div class="row">
        <div class="col-md-12">
          <div class="tile">
         <h4>Total Expenses on Site Item Wise</h4>
            <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Item No.</th>
                      <th>Item</th>
                      <th>Quantity</th>
                      <th>unit Price</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cost as $sot)
                    <tr>
                      <td>{{ $sot->item_number }}</td>
                      <td>{{ $sot->name->title }}</td>
                      <td>{{ $sot->send_on_site }}</td>
                      <td>{{ number_format($sot->price,2) }}</td>
                      <td>{{ number_format(($sot->price * $sot->send_on_site),2) }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <p class="text-right font-weight-bold">Total Cost-{{ number_format(totalexpense($sot->site_id),2) }}</p>
          </div>
      </div>
  </div>
  @endif
   @if($count2 > 0)
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
         <h4>Current Item Expenses on sites</h4>
            <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Item No.</th>
                      <th>Item</th>
                      <th>used Quantity</th>
                      <th>Avaible</th>
                      <th>Totalcurrcost</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($currcost as $used)
                     <tr>
                      <td>{{ $used->item_number }}</td>
                      <td>{{ $used->usedQuantity->title }}</td>
                      <td>{{ $used->total }}</td>
                      <td>{{ (App\expensedetail::where(['site_id'=>$id,'item_number'=>$used->item_number])->first()->send_on_site - $used->total) }}</td>
                      <td>{{ number_format((App\expensedetail::where(['site_id'=>$id,'item_number'=>$used->item_number])->first()->price * $used->total),2) }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <p class="text-right font-weight-bold"></p>
                <a href="{{ route("site-pdf",['id'=>$id]) }}" class="btn btn-danger">GET PDF</a>
          </div>
      </div>
  </div>
@endif
</main>
@endsection
