@extends('layout.admin.dashboard')

@section('content')

<link href="{{ URL::asset('public/admin/css/dropzone.css') }}" rel="stylesheet">
<script src="{{ URL::asset('public/admin/js/dropzone.js') }}"></script>

<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Edit Product</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/admin/products')}}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section class="section">
    <form class="form w-100 productForm" id="pageForm" action="#">
      <div class="row">
        <div class="col-9 col-md-9">
        	<div class="card">
        	<div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true">General Info</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link" id="image-tab" data-bs-toggle="tab" href="#images"
                                                    role="tab" aria-controls="images" aria-selected="false">Images/Video</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo"
                                                    role="tab" aria-controls="seo" aria-selected="false">SEO Info</a> </li>
              </ul>
              <div class="tab-content mt-5" id="myTabContent replaceHtml">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" value="{{$rowData->title}}" name="title" id="title">
                      </div>
                    </div>    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Category</label>
                        <select id="category_id" name="category_id" value="index,nofollow" class="form-select">
                        	<option value="">Select Category</option>
                        	@if(isset($categories) && $categories->count() > 0)
                            	@foreach($categories as $key => $category)
                            		<option {{ $rowData->category_id == $category->id?'selected':'' }} value="{{$category->id}}">{{$category->title}}</option>
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
                            <option {{ $rowData->type == '1 BHK'?'selected':'' }} value="1 BHK">1 BHK</option>
                            <option {{ $rowData->type == '2 BHK'?'selected':'' }} value="2 BHK">2 BHK</option>
                            <option {{ $rowData->type == '3 BHK'?'selected':'' }} value="3 BHK">3 BHK</option>
                            <option {{ $rowData->type == '4+ BHK'?'selected':'' }} value="4+ BHK">4+ BHK</option>
                            <option {{ $rowData->type == 'Plots'?'selected':'' }} value="Plots">Plots</option>
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
                            		<option {{ $rowData->city_id == $city->id?'selected':'' }} value="{{$city->id}}">{{$city->city}}</option>
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
                            <option {{ $rowData->property_status == 'New Launch'?'selected':'' }} value="New Launch">New Launch</option>
                            <option {{ $rowData->property_status == 'Possession Ready'?'selected':'' }} value="Possession Ready">Possession Ready</option>
                            <option {{ $rowData->property_status == 'Under Construction'?'selected':'' }} value="Under Construction">Under Construction</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Price</label>
                        <input type="text" class="form-control numberonly" maxlength="9" placeholder="Enter price" value="{!! $rowData->price !!}" name="price" id="price">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Possession</label>
                        <input type="month" class="form-control" placeholder="Enter possession date" min="{{ date('Y-m'); }}" value="{!! $rowData->possession_date !!}" name="possession_date" id="possession_date">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Location</label>
                        <input type="text" class="form-control" placeholder="Enter Location" value="{!! $rowData->location !!}" name="location" id="location">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Address</label>
                        <input type="text" class="form-control" placeholder="Enter Address" value="{!! $rowData->address !!}" name="address" id="address">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Description</label>
                        <textarea class="form-control editorBox" placeholder="Enter Description" name="description" id="description">{!! $rowData->description !!}</textarea>
                      </div>
                    </div>                    
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Banner</label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
                        <input type="hidden" name="old_image" value="{!! $rowData->banner !!}" />
                      </div>
                    </div>                     
                    @if($rowData->banner != "")
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="basicInput">&nbsp;</label>
                        <img src="{{URL::asset('public/img/products/')}}/{!! $rowData->banner !!}" style="max-width: 150px;height: auto;"> 
                      </div>
                    </div>
                    @endif              
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Banner Video</label>
                        <input type="text" class="form-control" name="video_url" id="video_url" placeholder="Youtube URL" value="{!! $rowData->video_url !!}" accept="image/*">
                      </div>
                    </div> 
                    </div>                     
                </div>
                <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="image-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Gallery Images (1450x870)</label>
                        <div id="my-awesome-dropzone" class="dropzone"></div>
                        <div id="productsimgall"></div>                        
                      </div>
                      	@if(isset($banner_images) && count($banner_images) > 0)
                            <div class="col-12" ><label for="basicInput">Banner Images</label></div>
                            <div class="col-12" id="replaceHtmls">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Youtube</th>
                                    <th width="12%">Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th width="10%">Created</th> 
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($banner_images as $key => $value)
                                <tr>
                                  <td>{{ $key+1; }}</td>
                                  <td>
                                    <a target="_blank" href="{{ URL::asset('public/img/products/') }}/{!! $value->image !!}" data-sub-html="Image"> 
                                    	<img width="80px" class="img-responsive" src="{{ URL::asset('public/img/products/') }}/{!! $value->image !!}"> 
                                    </a>
                                    <input style="width:150px" type="file" id="file_{{$value->id}}" name="file" onchange="profile_image('{!! $value->id !!}')"/>
                                    <input type="hidden" name="old_image" id="oldImg{{ $value->id; }}" value="{{$value->image}}"/>
                                  </td>
                                  <td>
                                  	<input type="text" name="title_img" id="title_img_{{$value->id}}" onchange="updateRow(this.value,{{$value->id}},'title')" value="{{$value->title}}" class="form-control">
                                  </td>
                                  <td>
                                  	@if(!empty($value->url))
                                    	<a href="{{$value->url}}" class="badge bg-warning" target="_blank"/>Play Video</a>
                                    @endif
                                  	<input type="text" name="youtube_url" id="youtube_url_{{$value->id}}" onchange="updateRow(this.value,{{$value->id}},'url')" value="{{$value->url}}" placeholder="Youtube URL" class="form-control" />
                                  </td>
                                  <td>
                                  	<select name="type_img" id="type_img_{{$value->id}}" onchange="updateRow(this.value,{{$value->id}},'type')" value="{{$value->type}}" class="form-select" >
                                        <option value="">Select Type</option>
                                        <option {{$value->type == 'Banner'?'selected':''}} value="Banner">Banner</option>
                                        <option {{$value->type == 'Master Plan'?'selected':''}} value="Master Plan">Master Plan</option>
                                        <option {{$value->type == 'Unit Plan'?'selected':''}} value="Unit Plan">Unit Plan</option>
                                        <option {{$value->type == 'Gallery'?'selected':''}} value="Gallery">Gallery</option>
                                        <option {{$value->type == 'Video'?'selected':''}} value="Video">Video</option>
                                        <option {{$value->type == 'Main Amenities'?'selected':''}} value="Main Amenities">Main Amenities</option>
                                        <option {{$value->type == 'Other Amenities'?'selected':''}} value="Other Amenities">Other Amenities</option>
                                        <option disabled="true" value="">-----</option>
                                        <option {{$value->type == 'Villa One'?'selected':''}} value="Villa One">Villa One</option>
                                        <option {{$value->type == 'Villa Two'?'selected':''}} value="Villa Two">Villa Two</option>
                                        <option {{$value->type == 'G+2'?'selected':''}} value="G+2">G+2 Apartment</option>
                                        <option {{$value->type == 'G+3'?'selected':''}} value="G+3">G+3 Apartment</option>
                                    </select>
                                  </td>
                                  <td> 
                                  	@if($value->status == 1)
                                    <a href="javascript:void(0);" onclick="changeStatus('product_images','{!!$value->id!!}','{!!$value->status!!}');" class="badge bg-success">Active</a>
                                    @else
                                    <a href="javascript:void(0);" onclick="changeStatus('product_images','{!!$value->id!!}','{!!$value->status!!}');"  class="badge bg-danger">In-Active</a>
                                    @endif
                                  </td>
                                  <td><a href="javascript:void(0);" onclick="deleteData('product_images','{{ $value->id }}');" class="btn btn-sm btn-danger"  title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </a></td>
                                  <td>{{ date("F jS, Y h:i A",strtotime($value->created_at)); }}</td> 
                                </tr>
                                @endforeach
                                </tbody>
                              </table>
                            </div>
                    	@endif 
                    </div>                     
                  </div>
                </div>
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">SEO Title</label>
                        <input type="text" class="form-control" placeholder="Enter SEO Title" value="{!! $rowData->seo_title !!}" name="seo_title" id="seo_title">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">SEO Description</label>
                        <textarea class="form-control" rows="6" placeholder="Enter SEO Description" name="seo_description" id="seo_description">{!! $rowData->seo_description !!}</textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">SEO Keywords</label>
                        <textarea class="form-control" rows="6" placeholder="Enter SEO Keywords" name="seo_keyword" id="seo_keyword">{!! $rowData->seo_keyword !!}</textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                    	<div class="form-group">
                        	<label for="basicInput">SEO Robots</label>
                        	<select id="robot_tags" name="robot_tags" value="index,nofollow" class="form-select">
                                <option {{ $rowData->robot_tags == 'index,follow'?'selected':'' }} value="index,follow">index,follow</option>
                                <option {{ $rowData->robot_tags == 'index,nofollow'?'selected':'' }} value="index,nofollow">index,nofollow</option>
                                <option {{ $rowData->robot_tags == 'noindex,follow'?'selected':'' }} value="noindex,follow">noindex,follow</option>
                                <option {{ $rowData->robot_tags == 'noindex,nofollow'?'selected':'' }} value="noindex,nofollow">noindex,nofollow</option>
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
	function filterData(){
		window.location.href = '';
		//$('#replaceHtml').load(location.href + "#replaceHtml");
	}
	function profile_image(id){
		var manish = 1;
		var ext = $('#file_'+id).val().split('.').pop().toLowerCase();
	
		if($.inArray(ext, ['jpeg', 'jpg', 'png', 'webp']) == -1){
			swal("Error",'Only jpg, png, webp files are allowed.','error');
			manish = 0;
			return false;
		}
	
		if(manish == 1){
			var formData = new FormData($('.productForm')[0]);
			var old_image = $('#oldImg'+id).val();
			formData.append('file', $('#file_'+id)[0].files[0]);
			formData.append('id', id);
			formData.append('old_image', old_image);			
			$.ajax({
				url: "{{url('admin/update-product-file')}}",
				data: formData,
				contentType: false,
		   		processData:false,
				type: 'POST',
				dataType: 'JSON',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success:function(response){
					swal("Success",'Image updated successfully.','success');
				},
				error: function(ts){
					console.log(ts);
                    swal("Error!", 'Something went wrong, please try after sometime.', "error");
                    return false;
                }
			});
			return false;
		}
	}
 
	function updateRow(value,id,field){
		if(id != '' && field != ''){
			$.ajax({
				type: 'POST',
				url: "{{url('admin/update-product-title')}}",
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data: {value:value,id:id,field:field},
				success: function(response){
					if(response == 'Success'){
						//swal("Success!", 'Row updated successfully', "success");
					}else {
						swal({
							title: "Oops!",
							text: 'Something went wrong.',
							type: "warning",
							timer: 3000
						});
					}
				}
			});
		}
	}
	$('#my-awesome-dropzone').attr('class', 'dropzone');
	var myDropzone = new Dropzone('#my-awesome-dropzone',{
		url: "{{url('admin/upload-product-images')}}",
		clickable: true,
		method: 'POST',
		maxFiles: 50,
		parallelUploads: 50,
		maxFilesize: 20,
		addRemoveLinks: false,
		dictRemoveFile: 'Remove',
		dictCancelUpload: 'Cancel',
		dictCancelUploadConfirmation: 'Confirm cancel?',
		dictDefaultMessage: 'Drop files here to upload',
		dictFallbackMessage: 'Your browser does not support drag n drop file uploads',
		dictFallbackText: 'Please use the fallback form below to upload your files like in the olden days',
		paramName: 'file',
		forceFallback: false,
		createImageThumbnails: true,
		maxThumbnailFilesize: 5,
		//acceptedFiles: ".jpeg,.jpg,.webp,.png,.svg",
		acceptedFiles: "image/*",
		autoProcessQueue: true,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		init: function() {
			this.on('thumbnail', function(file) {
				if (file.width < 50 || file.height < 50) {
					//file.rejectDimensions();
					file.acceptDimensions();
				} else {
					file.acceptDimensions();
				}
			});
		},
		accept: function(file, done) {
			file.acceptDimensions = done;
			file.rejectDimensions = function() {
				done('The image must be at least 50 x 50px')
			};
		}
	});
	
	myDropzone.on("complete", function(file) {
		var status = file.status;
		if (status == 'success') {
	
		}
		console.log(file);
	});
	
	var count = 1;
	myDropzone.on("success", function(file, responseText) {
		var fnamenew = file.name;
		var fname = fnamenew.trim().replace(/["~!@#$%^&*\(\)_+=`{}\[\]\|\\:;'<>,.\/?"\- \t\r\n]+/g, '');
		$("#productsimgall").append('<input type="hidden" name="images[]" class="img_eng" id="img_eng' + fname + '" value="' + responseText + '">');
	   
		count++;
	});
		
	myDropzone.on("addedfile", function(file) {
		
	});
	
    $(document).ready(function(){
		$('.numberonly').keypress(function(e){
			var charCode = (e.which) ? e.which : event.keyCode
			if(String.fromCharCode(charCode).match(/[^0-9+]/g))
			return false;
		});
    });
    let saveDataURL = "{{url('/admin/edit-product/'.$row_id)}}";
	let editid = "{{base64_decode($row_id)}}";
	if(editid == 3){
		var returnURL = "{{url('/admin/inner-pages')}}";
	}else{
		var returnURL = "{{url('/admin/products')}}";	
	}    
</script> 
<script src="{{ asset('public/admin/js/pages/products/add-page.js') }}"></script> 
@endsection