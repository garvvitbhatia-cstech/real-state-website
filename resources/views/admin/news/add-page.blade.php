@extends('layout.admin.dashboard')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Add News</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/admin/news')}}">News</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add News</li>
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
                    <label for="basicInput">Title</label>
                    <input type="text" class="form-control" placeholder="Enter Title" value="" name="title" id="title">
                  </div>
                </div>                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="basicInput">Description</label>
                    <textarea class="form-control" placeholder="Enter Description" name="description" id="description"></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="basicInput">Year</label>
                    <input type="text" class="form-control numberonly" maxlength="4" placeholder="Enter Year" value="" name="year" id="year">
                  </div>
                </div> 
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="basicInput">Month</label>
                    <select name="month" id="month" class="form-select">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                  </div>
                </div>                    
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="basicInput">File (PDF)</label>
                    <input type="file" class="form-control" name="image" id="image" accept="application/pdf">
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
			if(String.fromCharCode(charCode).match(/[^0-9]/g))
			return false;
		});
    });
    let saveDataURL = "{{url('/admin/add-news/')}}";
    let returnURL = "{{url('/admin/news')}}";
</script> 
<script src="{{ asset('public/admin/js/pages/news/add-page.js') }}"></script> 
@endsection