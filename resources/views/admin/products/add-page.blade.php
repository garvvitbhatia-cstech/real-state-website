@extends('layout.admin.dashboard')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Add Product</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/admin/products')}}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                <li class="nav-item" role="presentation"> <a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo"
                                                    role="tab" aria-controls="seo" aria-selected="false">SEO Info</a> </li>
              </ul>
              <hr />
              <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" value="" name="title" id="title">
                      </div>
                    </div>    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Category</label>
                        <select id="category_id" name="category_id" value="index,nofollow" class="form-select">
                        	<option value="">Select Category</option>
                        	@if(isset($categories) && $categories->count() > 0)
                            	@foreach($categories as $key => $category)
                            		<option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            @endif
                        </select>
                      </div>
                    </div>                
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Type</label>
                        <select id="type" name="type" value="index,nofollow" class="form-select">
                        	<option value="">Select Type</option>
                            <option value="1 BHK">1 BHK</option>
                            <option value="2 BHK">2 BHK</option>
                            <option value="3 BHK">3 BHK</option>
                            <option value="4+ BHK">4+ BHK</option>
                            <option value="Plots">Plots</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">City</label>
                        <select id="city_id" name="city_id" value="index,nofollow" class="form-select">
                        	<option value="">Select City</option>
                        	@if(isset($cities) && $cities->count() > 0)
                            	@foreach($cities as $key => $city)
                            		<option value="{{$city->id}}">{{$city->city}}</option>
                                @endforeach
                            @endif
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Status</label>
                        <select id="property_status" name="property_status" value="index,nofollow" class="form-select">
                        	<option value="">Select Status</option>
                            <option value="New Launch">New Launch</option>
                            <option value="Possession Ready">Possession Ready</option>
                            <option value="Under Construction">Under Construction</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Price</label>
                        <input type="text" class="form-control numberonly" maxlength="9" placeholder="Enter price" value="" name="price" id="price">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Possession</label>
                        <input type="date" class="form-control" placeholder="Enter possession date" min="{{ date('Y-m-d'); }}" value="" name="possession_date" id="possession_date">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Location</label>
                        <input type="text" class="form-control" placeholder="Enter Location" value="" name="location" id="location">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Address</label>
                        <input type="text" class="form-control" placeholder="Enter Address" value="" name="address" id="address">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Description</label>
                        <textarea class="form-control editorBox" placeholder="Enter Description" name="description" id="description"></textarea>
                      </div>
                    </div>                    
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Banner</label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Banner Video</label>
                        <input type="text" class="form-control" name="video_url" id="video_url" placeholder="Youtube URL" accept="image/*">
                      </div>
                    </div>                     
                    </div>                     
                </div>
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">SEO Title</label>
                        <input type="text" class="form-control" placeholder="Enter SEO Title" value="" name="seo_title" id="seo_title">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">SEO Description</label>
                        <textarea class="form-control" rows="6" placeholder="Enter SEO Description" name="seo_description" id="seo_description"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">SEO Keywords</label>
                        <textarea class="form-control" rows="6" placeholder="Enter SEO Keywords" name="seo_keyword" id="seo_keyword"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                    	<div class="form-group">
                        	<label for="basicInput">SEO Robots</label>
                        	<select id="robot_tags" name="robot_tags" value="index,nofollow" class="form-select">
                                <option value="index,follow">index,follow</option>
                                <option value="index,nofollow">index,nofollow</option>
                                <option value="noindex,follow">noindex,follow</option>
                                <option value="noindex,nofollow">noindex,nofollow</option>
                        	</select>
                        </div>
                    </div>
                  </div>
                </div>                
              </div>
            </div>
          </div>
        </div>
        <div class="col-3 col-md-3 ">
          <div class="card">
            <div class="col-md-12">
              <div class="text-left  p-3 p-l-20"> 
                <!--begin::Submit button-->
                <button type="button" id="form_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Submit</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
                <!--end::Submit button--> 
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
    let saveDataURL = "{{url('/admin/add-product/')}}";
    let returnURL = "{{url('/admin/products')}}";
</script> 
<script src="{{ asset('public/admin/js/pages/products/add-page.js') }}"></script> 
@endsection