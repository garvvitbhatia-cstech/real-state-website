@extends('layout.admin.dashboard')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Edit Gallery</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/admin/gallery/'.base64_encode($rowData->product_id))}}">Gallery</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Gallery</li>
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
            	<div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="basicInput">Category</label>
                    <select class="form-select" placeholder="Enter category" value="" name="category" id="category">
                        <option value="">Select Category</option>
                        <option {{$rowData->category == 'Amenities'?'selected':''}} value="Amenities">Amenities</option>
                        <option {{$rowData->category == 'Houses'?'selected':''}} value="Houses">Houses</option>
                        <option {{$rowData->category == 'Landscape'?'selected':''}} value="Landscape">Landscape</option>
                        <option {{$rowData->category == 'Highlights'?'selected':''}} value="Highlights">Highlights</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="basicInput">Title</label>
                    <input type="text" class="form-control" placeholder="Enter Title" value="{!! $rowData->title !!}" name="title" id="title">
                  </div>
                </div>                                   
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="basicInput">Image</label>
                    <input type="file" class="form-control" name="banner" id="banner" accept="image/*">
                    <input type="hidden" name="old_image" value="{!! $rowData->image !!}" />
                  </div>
                </div>
                @if($rowData->image != "")
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="basicInput">&nbsp;</label>
                    <img src="{{URL::asset('public/img/products/')}}/{!! $rowData->image !!}" style="max-width:100px;height:auto;"> 
                  </div>
                </div>
                @endif                              
                </div>                    
             	<button type="button" id="form_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Submit</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
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
    let saveDataURL = "{{url('/admin/edit-gallery/'.$row_id)}}";
    let returnURL = "{{url('/admin/gallery/'.base64_encode($rowData->product_id))}}";
</script> 
<script src="{{ asset('public/admin/js/pages/galleries/edit-page.js') }}"></script> 
@endsection