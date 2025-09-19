@extends('layout.default')
@section('title',$slug)
@section('description','')
@section('keywords','')
@section('robots','index, follow')
@section('content')

<div id="gallery" class="gallery-section pt-30 wow fadeInUp mt-12" style="visibility: visible; animation-name: fadeInUp;">
<div class="container">
    <div class="section-title tex-center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="line before"><img src="https://navkar.city/public/img/home/line_before.svg"></div>
        <h2 class="text-uppercase">({{$slug}}) Unit Plan</h2>
        <div class="line after"><img src="https://navkar.city/public/img/home/line_before.svg"></div>
      </div>
  </div>
</div>
  
<div class="row">
	<div class="col-6 col-md-3">
		<select class="form-select" onchange="getCategoryImages(this.value)" id="category_slug">
            @foreach($typeArr as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>    
    </div>
    <div class="col-6 col-md-3" style="padding-top:5px">  
        <a style="border:1px solid #000;padding:6px;color:#000;border-radius:4px;" href="https://navkar.city/">Back to Home</a>
    </div>
</div>
<hr />

<div id="replaceHtml"></div>

<script type="text/javascript">
	$(document).ready(function(e){
		var type = $('#category_slug').val();
        getCategoryImages(type);
    });
	function getCategoryImages(type){
		if(type != ''){
			$.ajax({
				type:'POST',
				url:"{{url('/get-unit-images')}}", 
				async:false,
				headers:{
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data:{type:type},
				success: function(response){
					if(response != ''){
						$('#replaceHtml').html(response);
					}
					return false;
				},error: function(ts){
					console.log(ts);
					return false;
				}							
			});
			return false;
		}else{
			alert("Something went wrong");
		}
		return false;
	}
</script>

@endsection