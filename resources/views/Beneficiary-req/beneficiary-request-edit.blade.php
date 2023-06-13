@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Edit Beneficiary Request</h1>
          <p>Edit Beneficiary Request</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Edit Beneficiary Request</li>
          <li class="breadcrumb-item"><a href="{{-- {{route('salelist')}} --}}">Edit Beneficiary Request</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('beneficiary-request-update',[$edit->id]) }}" method="post">
              @csrf
            <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="user_id">User</label>
                   <input class="form-control" type="text" name="user_name"  value="{{ $edit->username->name }}" readonly="">
                   <input class="form-control" type="hidden" name="user_id"  value="{{ $edit->username->id }}">
                     @error('beneficiary_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    @php 
                    $benf = App\Client::all();
                    @endphp
                    <label for="beneficiary_id">Beneficiary</label>
                    <select name="beneficiary_id" class="form-control" id="beneficiary">
                    <option value="">choose</option>
                   @foreach($benf as $ven)
                   <option @if($ven->id == $edit->beneficiary_id) selected  @endif value="{{ $ven->id }}"
                >{{ $ven->name }}</option>
                    @endforeach
                  </select>
                     @error('beneficiary_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">On Behalf  of</label>
                    <input class="form-control" type="text" name="on_behalf_of" value="{{ $edit->on_behalf_of }}" placeholder="Enter Email Address" autocomplete="off">
                     @error('on_behalf_of')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-lg-4">
                    <label for="job_id">Job</label>
                 <select name="job_id" class="form-control" id="job_id_new" style="display: none">
                  <option value="">--select--</option>
                 </select>
                 <input type="text" name="job_name" class="form-control" value="{{ $edit->workname->job_describe }}" id="job_id_old" >
                 <input type="hidden" name="job_id" class="form-control" value="{{ $edit->job_id }}" id="jobid" >
                </div>
                <div class="col-lg-4">
                  @php 
                  $bg_request_type =  App\bg_request_type::all();
                  @endphp
                  <div class="form-group">
                    <label for="request_type_id">Request-Type</label>
                     <select name="request_type_id" class="form-control" id="">
                    <option value="">choose</option>
                   @foreach($bg_request_type as $ven)
                   <option @if($ven->id == $edit->request_type_id) selected  @endif value="{{ $ven->id }}"
                >{{ $ven->name }}</option>
                    @endforeach
                  </select>
                     @error('request_type_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  @php 
                  $bg_type = App\bg_type_mast::all();
                  @endphp
                <div class="form-group">
                    <label for="bg_type_id">BG-Type</label>
                     <select name="bg_type_id" class="form-control" id="">
                    <option value="">choose</option>
                     @foreach($bg_type as $ven)
                   <option @if($ven->id == $edit->bg_type_id) selected  @endif value="{{ $ven->id }}"
                >{{ $ven->name }}</option>
                    @endforeach
                  </select>
                     @error('bg_type_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> 
              <div class="row">
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="invoive_number">Amount</label>
                     <input class="form-control" type="text" name="amount" value="{{ $edit->amount}}" placeholder="Enter Contact Name" autocomplete="off">
                     @error('amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="contract">Generate Date</label>
                    <input class="form-control" type="text" name="bg_request_date" id="sales_date" placeholder="Enter Contact Name" value="{{ $edit->bg_request_date }}" autocomplete="off">
                     @error('bg_request_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="note">Submission Date</label>
                    <input class="form-control" type="text" name="submission_date" placeholder="Enter Contact Name" autocomplete="off" value="{{ $edit->submission_date }}" id="purchase_date">
                     @error('submission_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div><div class="row">
                  <div class="col-lg-5">
                   <div class="form-group">
                    <label for="tender_no"></label>
                    <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" {{ ($edit->adoption_type == 'domestic') ? ("checked") : ( '' ) }} value="domestic" name="adoption_type"><b>Domestic</b>
                    </label>
                    <div class="clear-fix"></div>
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" {{ ($edit->adoption_type == 'international') ? ("checked") : ( '' ) }} value="international" name="adoption_type"><b>Internation</b>
                    </label>
                  </div>
                  </div>
                </div>
                 <div class="col-lg-7">
                   <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" name="note"  rows="4" placeholder="Enter Details" autocomplete="off">{{ $edit->note }}</textarea>
                     @error('note')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                </div>
              </div>  
                <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
              </div>
            </form>
        </div>
      </div>
    </main>
    <script type="text/javascript">
      $(document).ready(function (){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
       $("#beneficiary").on("change",function(){
       var rec_id = $(this).val();
        $("#job_id_old").hide();
        $("#jobid").attr("disabled","disabled");
        $("#job_id_new").show();
        //alert(rec_id);

       $.ajax({
                 type: "GET",
                 url: "{{ route('get-job-sale') }}?id="+rec_id,
                 success: function(res){
                  console.log(res);
                 $("#job_id_new").empty();
                 $("#job_id_new").val();
                    $("#job_id_new").append('<option value="">Job/Workname</option>');
                    $.each(res,function(index, recev){
                      //console.log(recev.company['name']);
                    $("#job_id_new").append('<option value='+recev.id+'>'+recev.job_describe+'</option>');
              });
              
                        
                   }
                      });

            
      
       });
    });

    </script>
@endsection

