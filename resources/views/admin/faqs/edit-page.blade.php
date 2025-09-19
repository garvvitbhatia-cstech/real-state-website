@extends('layout.admin.dashboard')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Edit FAQ</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/admin/faqs')}}">FAQs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit FAQ</li>
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
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Type</label>
                        <select class="form-select" placeholder="Enter Type" value="" name="type" id="type">
                        	<option {{ $rowData->type == 'FAQ'?'selected':'' }} value="FAQ">FAQ</option>
                            <option {{ $rowData->type == 'Terms & Conditions'?'selected':'' }} value="Terms & Conditions">Terms & Conditions</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Question</label>
                        <input type="text" class="form-control" placeholder="Enter Question" value="{!! $rowData->question !!}" name="question" id="question">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Answer</label>
                        <textarea class="form-control editorBox" placeholder="Enter Answer" name="answer" id="answer">{!! $rowData->answer !!}</textarea>
                      </div>
                    </div>
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
    let saveDataURL = "{{url('/admin/edit-faq/'.$row_id)}}";
    let returnURL = "{{url('/admin/faqs')}}";
</script> 
<script src="{{ asset('public/admin/js/pages/faqs	/add-page.js') }}"></script> 
@endsection