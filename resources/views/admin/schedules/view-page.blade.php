@extends('layout.admin.dashboard')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>View Schedule</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/admin/schedules')}}">Schedules</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Schedule</li>
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
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Name</label>: <span>{!! $rowData->name!!}</span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Email</label>: <span>{!! $rowData->email!!}</span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Contact</label>: <span>{!! $rowData->contact!!}</span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Date</label>: <span>{!! $rowData->date !!}</span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Time</label>: <span>{!! $rowData->time !!}</span>
                      </div>
                    </div>                   
                </div>
                <a href="{{url('/admin/schedules')}}" class="btn btn-sm btn-primary fw-bolder me-3 my-2">Back</a>
              </div>
            </div>
        </div>         
      </div> 
    </form>
  </section>
</div>
@endsection