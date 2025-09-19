@extends('layout.admin.dashboard')

@section('content')

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>News Management</h3>
                    <p class="text-subtitle text-muted">Our Team list.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">News</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
               <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Compact form-->
                    <form id="searchForm" name="searchForm" class="float-start">
                        <div class="d-flex align-items-center  w-md-800px">
                            <!--begin::Input group-->
                            <div class="position-relative w-md-200px me-md-2">
                                <input id="title" name="title" confirmation="false" class="form-control" placeholder="Search By title">
                            </div>
                            <div class="position-relative w-md-200px me-md-2">
                                <input id="year" name="year" confirmation="false" class="form-control" placeholder="Search By year">
                            </div>
                            <div class="position-relative w-md-200px me-md-2">
                                <select name="month" id="month" class="form-select">
                                	<option value="">Select Month</option>
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
                            <!--end::Input group-->
                            <!--begin:Action-->
                            <div class="d-flex align-items-center">
                                <button type="button" id="searchbuttons" onclick="filterData('search');" style="margin-right:10px;" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Search</button>
                                <button type="reset" class="btn btn-sm btn-dark btn-active-light-primary me-5" data-kt-menu-dismiss="true"  onclick="resetFilterForm();">Reset</button>
                            </div>
                            <!--end:Action-->
                        </div>
                    </form>
                    <!--<a onclick="exportData();" id="exportCsvBtn" class="btn icon btn-sm btn-outline-primary float-end" style="margin-left:10px">Export CSV</a>
                    <a data-bs-toggle="modal" data-bs-target="#uploadCsvModal" class="btn icon btn-sm btn-outline-warning float-end" style="margin-left:10px">Import CSV</a>-->
                    <a href="{{url('/admin/add-news')}}" class="btn icon btn-sm btn-outline-success float-end">Add News</a>
                </div>
                <!--end::Card body-->
            </div>
        </section>
        <!-- Table head options start -->
        <section class="section">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">

                        <div class="card-content">
                            <!-- table head dark -->
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>TITLE</th>
                                            <th>DATE</th>
                                            <th>STATUS</th>
                                            <th>CREATED</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody id="replaceHtml">
                                        <tr>
                                            <td colspan="10" class="text-center"><img src="{{ asset('public/admin/images/svg/oval.svg') }}" class="me-4" style="width: 3rem" alt="audio"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Table head options end -->
    </div>    
<script>
$(document).ready(function(){
    filterData('simple');
});
function filterData(type = null){
    if(type =='search'){$('#searchbuttons').html('Searching..');}
	$.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
		data: $('#searchForm').serialize(),
		url: "{{ url('/admin/news_paginate') }}",
		success: function(response){
			$('#replaceHtml').html(response);
            $('#searchbuttons').html('Search');
		}
	});
}
function exportData(){
	$('#exportCsvBtn').html('......');
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: "POST",
		url: "{{route('exports.news')}}",
		data: $('#searchForm').serialize(),
		success: function(msg){
			$('#exportCsvBtn').html('Export CSV');
			window.location.href = msg;
		},error: function(ts){
			$('#error500').modal('show');
		}
	});
	return false;
}
</script>

@endsection