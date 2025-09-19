@extends('layout.admin.dashboard')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Edit Testimonial</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/admin/testimonials')}}">Testimonial</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Testimonial</li>
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
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true">General Info</a> </li>                
              </ul>
              <hr />
              <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">NAME</label>
                        <input type="text" class="form-control" placeholder="Enter NAME" value="{!! $rowData->name !!}" name="name" id="name">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Description</label>
                        <textarea class="form-control" placeholder="Enter Description" name="description" id="description">{!! $rowData->description !!}</textarea>
                      </div>
                    </div>                    
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="basicInput">Cover Image</label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
                        <input type="hidden" name="old_image" value="{!! $rowData->image !!}" />
                      </div>
                    </div>
                    @if($rowData->image != "")
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">&nbsp;</label>
                        <img src="{{URL::asset('public/img/testimonials/')}}/{!! $rowData->image !!}"  style="max-width: 80px;height: auto;"> </div>
                    </div>
                    @endif  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Youtube Url</label>
                        <input type="text" class="form-control" name="url" id="url" value="{!! $rowData->url !!}">
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
    $(document).ready(function(){
		$('.numberonly').keypress(function(e){
			var charCode = (e.which) ? e.which : event.keyCode
			if(String.fromCharCode(charCode).match(/[^0-9+]/g))
			return false;
		});
    });
    let saveDataURL = "{{url('/admin/edit-testimonial/'.$row_id)}}";
    let returnURL = "{{url('/admin/testimonials')}}";
</script> 
<script src="{{ asset('public/admin/js/pages/testimonials/add-page.js') }}"></script> 
@endsection