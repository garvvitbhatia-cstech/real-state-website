@extends('layout.default')
@if(isset($innerPage->id))
@section('title',isset($innerPage->seo_title)?$innerPage->seo_title:'')
@section('description',isset($innerPage->seo_description)?$innerPage->seo_description:'')
@section('keywords',isset($innerPage->seo_keyword)?$innerPage->seo_keyword:'')
@section('robots','index, follow')
@endif
@section('content')

@if(isset($innerPage->id)) 
<div class="header-slider owl-carousel">
    <div class="">
      <img src="{{ asset('public/img/banners/'.$innerPage->banner) }}">
    </div>
</div>
@endif

<!--Overview section start here-->
<div id="overview" class="overview-section pt-20 pb-24">
  <div class="media-content-section container">
      <div class="filter-group mx-auto d-flex align-items-center justify-content-center px-4">
        <select class="year" id="newsyear" onchange="getLatestNews()">
        	@for($i=date('Y'); $i>=2012; $i--)
            	<option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
        <select name="month" id="newsmonth" class="month" onchange="getLatestNews()">
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

      <div class="media-container news-container container mx-auto max-w-screen-lg">
        <div class="developer-list mt-4" id="replaceHtml"></div>
      </div>
    </div>

</div>
<!--Overview section end here-->

<script type="text/javascript">
	$(document).ready(function(e){
        getLatestNews();
    });
	function getLatestNews(){
		var newsyear = $('#newsyear').val();
		var newsmonth = $('#newsmonth').val();	
		if(newsyear != '' && newsmonth != ''){
			$('#replaceHtml').html('<h5 class="align-items-center">Processing...</h5>');
			$.ajax({
				type: 'POST',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url: "{{url('/get-news')}}",
				data: {newsyear:newsyear,newsmonth:newsmonth},
				success: function(response){
					$('#replaceHtml').html(response);
				},error: function(ts) {
					swal("Error!", 'Something went wrong, please try after sometime.', "error");
					return false;
				}
			});
			return false;
		}
	}
</script>

@endsection