@if(isset($news) && $news->count() > 0)
@foreach($news as $key => $data)
<a class="news-single mt-4 d-flex pointer align-items-center" href="{{url(asset('public/img/news/'.$data->image))}}" target="_blank">
  <div class="download-icon">
    <svg width="1em" height="1em" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M18 13.453V18.5H1v-5.047M9.5 2v11.5m0 0L14 10m-4.5 3.5L5 10" stroke="#2D61A2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg>
  </div>
  <div class="news-content d-flex flex-column">
    <h3>{{$data->title}}</h3>
    <span class="mt-2">
      <p>{!! $data->description !!}</p>
    </span>
  </div>
</a>
@endforeach
@endif