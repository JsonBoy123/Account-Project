@extends('layouts.master')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Avaiable Items-{{ strtoupper($site) }}</h1>
          <p>Avaiable Site Item</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Site </li>
          <li class="breadcrumb-item"><a href="">Site Item Avaiable</a></li>
        </ul>
      </div>
      @if(session()->has('mgs'))
    <div class="alert alert-success"> 
    {!! session('mgs') !!}
    </div>
@endif
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <form action="{{ route('site-in') }}" method="post">
                @csrf
             <table class="table table-striped table-dark text-white table-hover">
            <thead>
                <tr>
                    <th class="text-center"><input type="checkbox"></th>
                    <th colspan="2">Item No.</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                  
                    <th>Status</th>
                    {{-- <th>Type</th> --}}
                    <th></th>
                </tr>
            </thead>

            <tbody>
               
                    <input type="hidden" name="quoapp" value="">
                    

              @foreach($item as $sitem)  

                <tr>
                    <input type="hidden" name="site_id" value="{{ $sitem->site_id }}" readonly>
                    <td class="text-center"><input type="checkbox" name="itemss[]"></td>
                    <td colspan="2">
                        <input type="text" name="item[]" value="{{ $sitem->item_number }}" readonly >  
                        <input type="hidden" name="wareh_id[]" value="{{ $sitem->wareh_id }}" readonly >                   
                    </td>
                    <td>
                        <input type="text" name="item_name[]" value="{{ $sitem->itemname->title }}" readonly>

                    </td>
                    <td>
                        <input type="text" name="quantity[]" value="{{ $sitem->quantity }}" readonly>
                        <div class="d-flex align-items-center"><span class="ml-2"></span></div>
                    </td>
                   
                    <td class="font-weight-bold">Site In</td>
                   {{--  <td>Business</td> --}}
                    <td><i class="fa fa-external-link external-link"></i></td>
                </tr>
                @endforeach
            
            </tbody>
        </table>
                 @if($item->isEmpty())
                    <marquee><p>No Item Found On Site</p></marquee>
                @endif  
        <p  class= "btn btn-primary">All Item Are On Site</p>
                </form>
       
        </div>
          
     
        </div>
          </div>
        </div>
    </main>

  <script type="text/javascript">
    $(document).ready(function(){
$("#contact").on('blur',function(){
  $('#person').show();

});
});
  </script>
@endsection