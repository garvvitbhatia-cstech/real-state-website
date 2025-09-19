@extends('layout.admin.dashboard')

@section('content')

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Gallery Management</h3>
                    <p class="text-subtitle text-muted">Gallery list.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
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
                                <select class="form-select" placeholder="Enter Category" value="" name="category" id="category">
                                    <option value="">Select Category</option>
                                    <option value="Amenities">Amenities</option>
                                    <option value="Houses">Houses</option>
                                    <option value="Landscape">Landscape</option>
                                    <option value="Highlights">Highlights</option>
                                </select>
                            </div>
                            <div class="position-relative w-md-200px me-md-2">
                                <select class="form-select" placeholder="Enter Status" value="" name="status" id="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">In-Active</option>
                                </select>
                            </div>
                            <input type="hidden" name="product_id" id="product_id" value="{{base64_decode($row_id)}}"/>
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
                    <a href="{{url('/admin/add-gallery',$row_id)}}" class="btn icon btn-sm btn-outline-success float-end">Add New Gallery</a>
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
                                            <th>BANNER</th>
                                            <th>CATEGORY</th>
                                            <th>TITLE</th>
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
		url: "{{ url('/admin/gallery_paginate') }}",
		success: function(response){
			$('#replaceHtml').html(response);
            $('#searchbuttons').html('Search');
		}
	});
}
</script>

@endsection