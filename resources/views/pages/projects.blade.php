@extends('layout.default')
@if(isset($innerPage->id))
@section('title',isset($innerPage->seo_title)?$innerPage->seo_title:'')
@section('description',isset($innerPage->seo_description)?$innerPage->seo_description:'')
@section('keywords',isset($innerPage->seo_keyword)?$innerPage->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')


<!--Overview section start here-->
<div id="overview" class="overview-section pt-30 pb-24">
  <div class="container">
    <!--breadcrumbs start here-->
    <ul class="breadcrumbs mb-4">
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="{{url('/')}}">Home</a>
      </li>
      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link" href="{{url('/projects')}}">Projects</a>
      </li>

      <li class="breadcrumbs__item">
        <a class="breadcrumbs__link breadcrumbs__link--active" href="#">Residential</a>
      </li>
    </ul>
    <!--breadcrumbs end here-->

    <div class="section-title tex-center">
      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
      <h2 class="text-uppercase">Find where you belong</h2>
      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
    </div>

    <div class="list-mapview nav-pills mb-3" id="pills-tab" role="tablist">
      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">List View</button>
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>        
    </div>

    <div class="tab-content" id="pills-tabContent">
        
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
          
            <div class="find-search-box">
            	<form id="search_project" method="post">
              <div class="search-list-wrapper property-search">
                <input type="text" placeholder="Enter Project Name" id="project_name" name="project_name" onkeyup="searchProduct()" value="">
              </div>

              <div class="reset-filter-box mt-4">
                <div class="select-container ">
                    <div class="select-dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Projects
                    </div>
                    <ul class="dropdown-menu dropdown-menu-start find-select-dorp-down p-4">
                    	
                        @if(isset($category) && $category->count() > 0)
                        	@foreach($category as $key => $cat)
                      		<li class="form-check">
                              <input class="form-check-input" type="radio" name="category" onclick="searchProduct()" value="{{$key}}" id="flexRadioDefault{{rand()}}">
                              <label class="form-check-label" for="flexRadioDefault{{rand()}}">
                                {{$cat}}
                              </label>
                          	</li>   
                            @endforeach                         
                        @endif
                      
                    </ul>

                </div>
                <div class="select-container ">
                    <div class="select-dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Cities
                    </div>
                    <ul class="dropdown-menu dropdown-menu-start find-select-dorp-down p-4">
                      	@if(isset($city_array) && count($city_array) > 0)
                        	@foreach($city_array as $key => $city)
                              <li class="form-check">
                                  <input class="form-check-input" type="checkbox" name="city[]" onclick="searchProduct()" value="{{$city['id']}}" id="flexRadioDefault1">
                                  <label class="form-check-label" for="flexRadioDefault1">
                                    {{$city['city']}}
                                  </label>
                              </li>
                      		@endforeach                         
                        @endif                      
                    </ul>
                </div>
                <div class="select-container ">
                   <div class="select-dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Types
                    </div>
                    <ul class="dropdown-menu dropdown-menu-start find-select-dorp-down p-4">
                      <li class="form-check">
                          <input class="form-check-input" type="checkbox" name="types[]" onclick="searchProduct()" value="1 BHK" id="bhk">
                          <label class="form-check-label" for="bhk">
                            1 BHK
                          </label>
                      </li>
                      <li class="form-check">
                          <input class="form-check-input" type="checkbox" name="types[]" onclick="searchProduct()" value="2 BHK" id="bhk2">
                          <label class="form-check-label" for="bhk2">
                            2 BHK
                          </label>
                      </li>
                      <li class="form-check">
                          <input class="form-check-input" type="checkbox" name="types[]" onclick="searchProduct()" value="3 BHK" id="bhk3">
                          <label class="form-check-label" for="bhk3">
                            3 BHK
                          </label>
                      </li>
                      <li class="form-check">
                          <input class="form-check-input" type="checkbox" name="types[]" onclick="searchProduct()" value="4 BHK" id="bhk4">
                          <label class="form-check-label" for="bhk4">
                            4 BHK
                          </label>
                      </li>
                      <li class="form-check">
                          <input class="form-check-input" type="checkbox" name="types[]" onclick="searchProduct()" value="4+ BHK" id="bhk5">
                          <label class="form-check-label" for="bhk5">
                            4+ BHK
                          </label>
                      </li>
                      <li class="form-check">
                          <input class="form-check-input" type="checkbox" name="types[]" onclick="searchProduct()" value="Plots" id="plot">
                          <label class="form-check-label" for="plot">
                            Plots
                          </label>
                      </li>
                    </ul>
                </div>
                <div class="select-container ">
                  <div class="select-dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Status
                    </div>
                    <ul class="dropdown-menu dropdown-menu-start find-select-dorp-down p-4">
                      <li class="form-check">
                          <input class="form-check-input" type="checkbox" name="construction[]" onclick="searchProduct()" value="New Launch" id="new">
                          <label class="form-check-label" for="new">
                            New Launch
                          </label>
                      </li>
                      <li class="form-check">
                          <input class="form-check-input" type="checkbox" name="construction[]" onclick="searchProduct()" value="Possession Ready" id="ready">
                          <label class="form-check-label" for="ready">
                            Possession Ready
                          </label>
                      </li>
                      <li class="form-check">
                          <input class="form-check-input" type="checkbox" name="construction[]" onclick="searchProduct()" value="Under Construction" id="construction">
                          <label class="form-check-label" for="construction">
                            Under Construction
                          </label>
                      </li>
                    </ul>
                </div>
                <div class="select-container ">
                  <div class="select-dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Budget
                    </div>
                    <ul class="dropdown-menu dropdown-menu-start find-select-dorp-down p-4">
                      <li>
                          <label for="budget" class="form-label fs-5">INR 0 - <span id="range_slider_maxvals">20.00 Cr.</span></label>
                          <input type="range" class="form-range" min="0" max="200000000" name="budget" onchange="searchProduct()" id="budget">
                          <span id="range_slider_maxval"></span>
                      </li>                      
                    </ul>
                </div>
                <a href="javascript:void(0)" class="btn-black text-center d-flex align-items-center justify-content-center me-2" onclick="resetProduct()">Reset</a>
              </div>
              </form>
            </div>

            <!--Explore Homes section start here-->
              <div class="explore-homes-section pt-20 pb-24">
                    <div class="section-title tex-center">
                      <div class="line before"><img src="{{ asset('public/img/home/line_before.svg') }}"></div>
                      <h2 class="text-uppercase">Explore Homes</h2>
                      <div class="line after"><img src="{{ asset('public/img/home/line_after.svg') }}"></div>
                    </div>
					<div id="replaceHtml"></div>
              </div> 
            <!--Explore Homes section end here-->

        </div>

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">            
            <div class="map-view-section pb-24">
              <img src="{{ asset('public/img/home/map_bg.png') }}">
            </div>
        </div>      
    </div>
  </div>
</div>
<!--Overview section end here-->

<!--Get in touch section start here-->
@include('element.newsletter');
<!--Get in touch section end here-->

<!--Get in touch section start here-->
@include('element.schedule');
<!--Get in touch section end here-->

<script type="text/javascript">
	$(document).ready(function(){
		searchProduct();
		$('#replaceHtml').on('click', '.pagging li a', function(){
			var url = $(this).attr("href");
			$('#replaceHtml').load(url);
			return false; 
		});	
	});
	function resetProduct(){
		$('#search_project')[0].reset();
		searchProduct();	
	}
	function searchProduct(){
		$('#replaceHtml').html('');
		$('#range_slider_maxval').html($('#budget').val());
		$.ajax({
			type: 'POST',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: "{{url('/search-projects')}}",
			data: $('#search_project').serialize(),
			success: function(response){
				$('#replaceHtml').html(response);
			},error: function(ts) {
				swal("Error",'Something went to wrong, please try after sometime.','error');				
				return false;
			}
		});
		return false;
	}
</script>


@endsection