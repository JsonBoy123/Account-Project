@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Vendor Details View</h1>
          <p>Details View</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Details View-Form</li>
          <li class="breadcrumb-item"><a href="{{  route('vendor.index') }}">Vendor List</a></li>
        </ul>
      </div>
     {{--   @if($message = Session::get('mgs'))
      <div class="alert alert-success">  {{$message}}
      </div>
       @endif --}}
       
       <p><a class="btn btn-primary icon-btn" href="{{  route('vendor.index') }}">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="" method="post">
              @csrf
              @method('PATCH')
              <h3><b>Vendor Details</b></h3>
            <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="vendor_type">Vendor Type</label>
                    <input class="form-control" type="text" name="vendor_type" value=" {{ $vendors->vendor->name }}" placeholder="" autocomplete="off" readonly="">
                     @error('vendor_type')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="firm_type">Firm Type</label>
                  <input class="form-control" type="text" name="firm_type" value="{{$vendors->firm->name }}" placeholder="" autocomplete="off" readonly="">
                     @error('firm_type')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="firm_name">Firm Name</label>
                    <input class="form-control" type="text" name="firm_name" value="{{ $vendors->firm_name }}" placeholder="" autocomplete="off" readonly="">
                     @error('firm_name')
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
                    <label for="email">Email</label>
                   <input class="form-control" type="text" name="email" value="{{ $vendors->email }}" placeholder="" readonly="">
                     @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="mobile">Mobile No.</label>
                   <input class="form-control" type="number" name="mobile" value="{{ $vendors->mobile }}" placeholder="" readonly="">
                     @error('mobile')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control" type="text" name="address" value="{{ $vendors->address }}" placeholder="" autocomplete="off" readonly="">
                     @error('address')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-lg-6">
                 <div class="form-group">
                    <label for="city">City</label>
                      <input class="form-control" type="text" name="city" value="{{ $vendors->city  }}" placeholder="" autocomplete="off" readonly="">
                     @error('city')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-6">
                  <div class="form-group">
                    <label for="postal_code">Postal Code</label>

                   <input class="form-control" type="text" name="postal_code" value="{{ $vendors->postal_code }}" placeholder="" autocomplete="off" readonly="">
                     @error('postal_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
             {{--   <h3><b>Bank Details</b></h3>
               <div class="row">
              <div class="col-lg-6">
                 <div class="form-group">
                    <label for="user_id">Bank</label>
                   <input class="form-control" type="text" name="bank_name" value="{{ old('bank_name')}}" placeholder="Enter Bank name">
                     @error('bank_name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                   <div class="form-group">
                    <label for="beneficiary_id">Branch Name</label>
                   <input class="form-control" type="text" name="branch_address" value="{{ old('branch_address') }}" placeholder="Enter  Bank Branch">
                     @error('branch_address')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
                 <div class="row">
              <div class="col-lg-6">
                 <div class="form-group">
                    <label for="user_id">Bank A/c Number</label>
                   <input class="form-control" type="number" name="account_no" value="{{ old('account_no')}}" placeholder="Enter Bank A/c Number">
                     @error('account_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                   <div class="form-group">
                    <label for="beneficiary_id">IFSC- code</label>
                   <input class="form-control" type="text" name="ifsc_code" value="{{ old('ifsc_code') }}" placeholder="Enter  IFSC- code">
                     @error('ifsc_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> --}}
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="state_code">State</label>
                   <input class="form-control" type="text" name="state_code" value="{{ $vendors->state->state_name }}" placeholder="" autocomplete="off" readonly="">
                     @error('state_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="city_code">District</label>
                 <input class="form-control" type="text" name="city_code" value="{{ $vendors->cities->city_name }}" placeholder="" autocomplete="off" readonly="">
                     @error('city_code')
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
                    <label for="name">Contact Person</label>
                 <input class="form-control" type="text" name="name" value="{{ $vendors->name }}" placeholder="" autocomplete="off" readonly="">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="phone">Phone</label>
               <input class="form-control" type="number" name="phone" value="{{ $vendors->phone }}" placeholder="" autocomplete="off" readonly="">
                     @error('phone')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="fax">Fax</label>
                  <input class="form-control" type="text" name="fax" value="{{ $vendors->fax }}" placeholder="" autocomplete="off" readonly="">
                     @error('fax')
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
                    <label for="website">Website</label>
                   <input class="form-control" type="text" name="website" value="{{ $vendors->website }}" placeholder="" autocomplete="off" readonly="">
                     @error('website')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-4">
                  <div class="form-group">
                    <label for="pan_no">Pan No.</label>
                   <input class="form-control" type="text" id="pan_no" name="pan_no" value="{{ $vendors->pan_no  }}" placeholder="" autocomplete="off" readonly="">
                     @error('pan_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-4">
                  <div class="form-group">
                    <label for="aadhar_no">Aadhar No.</label>
                   <input class="form-control" type="text" name="aadhar_no" value="{{ $vendors->aadhar_no  }}" placeholder="" autocomplete="off" readonly="">
                     @error('aadhar_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
                <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="gst_number">GSTIN</label>
                   <input class="form-control" type="text" id="gst_number" name="gst_number" value="{{ $vendors->gst_number }}" placeholder="" autocomplete="off" readonly="">
                   <span id="gstin"></span>
                     @error('gst_number')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-6">
                  <div class="form-group">
                    <label for="annual_turnover">Annual Turnover</label>
                   <input class="form-control" type="text" name="annual_turnover" value="{{ $vendors->annual_turnover }}" placeholder="" autocomplete="off" readonly="">
                     @error('annual_turnover')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="contract">Reference Name 1</label>
                   <input class="form-control" type="text" name="reference_name1" value="{{ $vendors->reference_name1 }}" placeholder="" autocomplete="off" readonly="">
                     @error('reference_name1')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-6">
                  <div class="form-group">
                    <label for="reference_name2">Reference Name 2</label>
                   <input class="form-control" type="text" name="reference_name2" value="{{ $vendors->reference_name2 }}" placeholder="" autocomplete="off" readonly="">
                     @error('reference_name2')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
              </div>  
              </div>
            </form>
        </div>
      </div>

        </div>
           
    </main>



@endsection