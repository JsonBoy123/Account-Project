@extends('layouts.master')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Site Receiver:- {{ $site}}</h1>
          <p>Site Receiver</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Site Receiver</li>
          <li class="breadcrumb-item"><a href="">Receiver Item</a></li>
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
          <b>Check Code:- {{ $grcode }}</b><br>
            <div class="row">
               @if($sum == 0)
              <form action="{{ route('site-in') }}" method="post">
                @csrf
                 
             <table class="table table-striped table-dark text-white table-hover">
            <thead>
                <tr>
                    <th class="text-center"><input type="checkbox"></th>
                    <th colspan="2">Item No.</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>W-house</th>
                  
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
                     <td>
                        <p>{{ $sitem->house->name }}</p>

                    </td>
                   
                    <td class="font-weight-bold">Site In</td>
                   {{--  <td>Business</td> --}}
                    <td><i class="fa fa-external-link external-link"></i></td>
                </tr>
                @endforeach
            
            </tbody>
        </table>
        <button type= "submit" class= "btn btn-warning">Site In</button>
        @else
         <h5>Hello.. {{ $acuser."->" }}</h5></br>
          <p>  You can assigned this site to another person also <b>Update Available</b> Item Quantity</p>
          <form action="{{ route('iqsupdate') }}" method="post">
            <select name="user" class="form-control mb-3">
                     <option value="">select user</option>
                     @foreach($canuser as $usr)
                     <option value="{{ $usr->user_id }}"{{ ($usr->user_id == $user ) ? 'selected' : '' }}>{{ $usr->emp_name }}</option>
                     @endforeach
                  </select>  
                  
                @csrf
                 
             <table class="table table-striped table-dark text-white table-hover">
            <thead>
                <tr>
                    
                    <th colspan="2">Item No.</th>
                    <th>Item Name</th>
                    <th>Site quantity</th>
                    <th>Used quantity</th>
                    <th>W-house</th>
                  
                    <th>Status</th>
                    {{-- <th>Type</th> --}}
                    <th></th>
                </tr>
            </thead>
            
            <tbody>
        <tbody>
               
                    <input type="hidden" name="quoapp" value="">
                    @php $sno = 1; @endphp
              @foreach($item as $sitem)  

                <tr>
                    <input type="hidden" name="site_id" value="{{ $sitem->site_id }}" readonly>
                    <input type="hidden" name="old_user" value="{{ $user }}" readonly>
                   {{--  <td class="text-center"><input type="checkbox" name="itemss[]"></td> --}}
                    <td colspan="2">
                        <input type="text" name="item[]" value="{{ $sitem->item_number }}" readonly >  
                        <input type="hidden" name="wareh_id[]" value="{{ $sitem->wareh_id }}" readonly >                   
                    </td>
                    <td>
                        <input type="text" name="item_name[]" value="{{ $sitem->itemname->title }}" readonly>
                        

                    </td>
                    <td>
                        <input type="number"  name="quantityy[]" id="{{ "count".$sno }}"   value="{{ $sitem->quantity }}">
                        <div class="d-flex align-items-center"><span class="ml-2" readonly></span></div>
                    </td>
                   <td>
                        <input type="number" class="quanuse" id="{{ "quse".$sno }}" name="quantity[]" value="0">
                        <div class="d-flex align-items-center"><span class="ml-2"></span></div>
                    </td>
                  <td><p>{{ $sitem->house->name }}</p></td>
                        

                    @if($sitem->item_in == 0 )
                    <td><a href="{{ route('site-again',[$sitem->site_id,$sitem->wareh_id,$sitem->item_number]) }}" class="font-weight-bold">Site In</a></td>
                    @endif
                   {{--  <td>Business</td> --}}
                    <td><i class="fa fa-external-link external-link"></i></td>
                </tr>
                @php $sno++ @endphp
                @endforeach
            
            </tbody>
        </table>
        @if($sum == $count)
        <button type= "submit" class= "btn btn-primary">Update</button>
        @else
        <h4>Pls Site In New Item First</h4>
        @endif
        @endif
                </form>
       
        </div>
          
     
        </div>
          </div>
        </div>
    </main>
   

  <script type="text/javascript">
 $(document).ready(function(){
  $('.quanuse').on('keyup', function(){
     var idnos = $(this).attr('id');
     var n = Array.from(idnos);
     var prev = parseInt($("#count"+n[4]).val());
     var rec = parseInt($("#quse"+n[4]).val());
     if(prev >= rec){
        return true;
     }else{
        alert("can not send quantity more than in w-house");
        $("#quse"+n[4]).val(0)
     }
   
    
  })
});
  </script>
@endsection