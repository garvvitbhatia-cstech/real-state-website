@extends('layout.admin.dashboard')
@section('content')

<link href="{{ URL::asset('public/admin/css/dropzone.css') }}" rel="stylesheet">
<script src="{{ URL::asset('public/admin/js/dropzone.js') }}"></script>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Event Images</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/admin/blogs')}}">Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Event Image</li>
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
                            <div class="col-12">
                            	<label for="basicInput">Event Images (1450x870)</label>
                                <div id="my-awesome-dropzone" class="dropzone"></div>
                            </div>
                            @if(isset($banner_images) && count($banner_images) > 0)
                            <div class="col-12"><label for="basicInput">Banner Images</label></div>
                            <div class="col-12" id="replaceHtml">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Created</th> 
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($banner_images as $key => $value)
                                <tr>
                                  <td>{{ $key+1; }}</td>
                                  <td>
                                    <a target="_blank" href="{{ URL::asset('public/admin/images/images/') }}/{!! $value->banner !!}" data-sub-html="Image"> 
                                    <img width="100px" class="img-responsive" src="{{ URL::asset('public/admin/images/images/') }}/{!! $value->banner !!}"> 
                                    </a>
                                  </td>
                                  <td> 
                                  	@if($value->status == 1)
                                    <a href="javascript:void(0);" onclick="changeStatus('event_images','{!!$value->id!!}','{!!$value->status!!}');" class="badge bg-success ">Active</a>
                                    @else
                                    <a href="javascript:void(0);" onclick="changeStatus('event_images','{!!$value->id!!}','{!!$value->status!!}');"  class="badge bg-danger">In-Active</a>
                                    @endif
                                  </td>
                                  <td><a href="javascript:void(0);" onclick="deleteData('event_images','{{ $value->id }}');" class="btn btn-sm btn-danger"  title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </a></td>
                                  <td>{{ date("F jS, Y h:i A",strtotime($value->created_at)); }}</td> 
                                </tr>
                                @endforeach
                                </tbody>
                              </table>
                            </div>
                            @endif 
                            <div class="text-left  p-3 p-l-20">
                                <!--begin::Submit button-->
                                <a href=""><button type="button" id="form_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2">
                                    <span class="indicator-label" id="formSubmit">Submit</span>                                    
                                </button></a>
                                <!--end::Submit button-->
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
	function filterData(){
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			type: 'POST',
			success: function(response){
				setTimeout(window.location.href = '',5000);
			}
		});
	}
	$('#my-awesome-dropzone').attr('class', 'dropzone');
	var myDropzone = new Dropzone('#my-awesome-dropzone', {
		url: "{{url('admin/upload-banner-images')}}",
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
		params:{'gallery_id':'{{$RowID}}'},
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
		$("#productsimgall").append('<input type="hidden" name="image[]" class="img_eng" id="img_eng' + fname + '" value="' + responseText + '">');
	   
		count++;
	});
	
	/*myDropzone.on("removedfile", function(file) {
		var fname = file.name;
		fname2 = fname.trim().replace(/["~!@#$%^&*\(\)_+=`{}\[\]\|\\:;'<>,.\/?"\- \t\r\n]+/g, '_');    
		var image = $('#img_eng'+fname2).val();
		$.ajax({
			url: "{{url('admins/upload-wedding-images')}}",
			type:'POST',
			data:{imgname:image}, 
			success:function (success){
				$(this).parents('li').remove();
				$("#productsimgall #img_eng" + fname2 + "").replaceWith('');   
			}
		});	
		return false; 
	});*/
	
	myDropzone.on("addedfile", function(file) {
		
	});
</script>
@endsection