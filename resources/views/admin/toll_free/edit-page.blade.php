@extends('layout.admin.dashboard')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Edit Toll Free</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/admin/toll-free')}}">Toll Free</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Toll Free</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section class="section">
    <form class="form w-100" id="pageForm" action="#">
      <div class="row">
        <div class="col-9 col-md-9">
        	<div class="card">
            	<div class="card-body">
              <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                	<div class="row">
                       <div class="col-md-4">
                          <div class="form-group">
                            <label for="basicInput">Country</label>
                            <select class="form-select" placeholder="Enter Country" value="" onchange="getStateByCountry(this.value)" name="country" id="country">
                            	<option value="">Select Country</option>
                                @foreach($country_list as $key => $country)
                                	<option {{($rowData->country == $key?'selected':'')}} value="{{$key}}">{{$country}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                          	@php
                                $states = Helper::getStateByCountry($rowData->country);
                            @endphp
                            <label for="basicInput">State</label>
                            <select class="form-select" placeholder="Enter State" value="" name="state" onchange="getCityByState(this.value)" id="state">
                            	<option value="">Select State</option>                                
                                @foreach($states as $key => $state)
                                	<option {{($rowData->state == $key?'selected':'')}} value="{{$key}}">{{$state}}</option>  
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                          	@php
                                $cities = Helper::getCityByState($rowData->state);
                            @endphp
                            <label for="basicInput">City</label>
                            <select class="form-select" placeholder="Enter City" value="" name="city" id="city">
                            	<option value="">Select City</option>
                                @foreach($cities as $key => $city)
                                	<option {{($rowData->city == $key?'selected':'')}} value="{{$key}}">{{$city}}</option>  
                                @endforeach
                            </select>
                          </div>
                        </div>                    
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="basicInput">Flag</label>
                            <input type="file" class="form-control" name="flag" id="flag" accept="image/*">
                          </div>
                        </div>  
                        @if($rowData->flag != "")
                        <div class="col-md-1">
                          <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                            <img src="{{URL::asset('public/img/blogs/')}}/{!! $rowData->flag !!}" style="max-width:90px;height: auto;"> </div>
                        </div>  
                        @endif   
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="basicInput">Contact</label>
                            <input type="text" class="numberonly form-control" maxlength="15" value="{!! $rowData->contact !!}" name="contact" id="contact" placeholder="Contact">
                          </div>
                        </div>  
                        @php
                        	$from = $to = '';
                        	if(!empty($rowData->time)){
                            	$explode = explode('-',$rowData->time);
                                $from = $explode[0];
                                $to = $explode[1];
                           	}
                        @endphp
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="basicInput">From</label>
                            <input type="time" class="form-control" name="from" id="from" value="{!! $from !!}">
                          </div>
                        </div> 
                        <div class="col-md-2">
                          <div class="form-group">
                            <label for="basicInput">To</label>
                            <input type="time" class="form-control" name="to" id="to" value="{!! $to !!}">
                          </div>
                        </div>  
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="basicInput">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{!! $rowData->address !!}">
                          </div>
                        </div> 
                         
                        
                        </div>
                        
                            <button type="button" id="form_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Submit</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>           
                </div>
                                
              </div>
            </div>
        </div> 
        </div>
               
      </div> 
    </form>
  </section>
</div>
<!-- end plugin js --> 
<script type="text/javascript"> 
	function getStateByCountry(countryId){
		$('#state').html('<option value="">Select State</option>');
		if(countryId != ''){
			$.ajax({
				type: 'POST',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url: "{{url('/admin/get-sate')}}",
				data: {countryId:countryId},
				success: function(response){
					$('#state').html(response);
				},error: function(ts) {
					swal("Error!", "Something went wrong", "error");
				}
			});
			return false;
		}
	}
	function getCityByState(stateId){
		$('#city').html('<option value="">Select City</option>');
		if(stateId != ''){
			$.ajax({
				type: 'POST',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url: "{{url('/admin/get-city')}}",
				data: {stateId:stateId},
				success: function(response){
					$('#city').html(response);
				},error: function(ts) {
					swal("Error!", "Something went wrong", "error");
				}
			});
			return false;
		}
	}
    $(document).ready(function(){
		$('.numberonly').keypress(function(e){
			var charCode = (e.which) ? e.which : event.keyCode
			if(String.fromCharCode(charCode).match(/[^0-9+ -]/g))
			return false;
		});
    });
    let saveDataURL = "{{url('/admin/edit-toll-free/'.$row_id)}}";
    let returnURL = "{{url('/admin/toll-free')}}";
</script> 
<script src="{{ asset('public/admin/js/pages/toll_free/edit-page.js') }}"></script> 
@endsection