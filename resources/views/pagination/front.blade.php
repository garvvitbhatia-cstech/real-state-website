@if ($paginator->hasPages())
<div class="paggnation-section mt-4 mt-md-5">
  <ul class="pagging">
  
  	@if ($paginator->onFirstPage()) 
    <li class="page-item disabled">
      <a class="prev pagger" href="#" tabindex="-1">
      	<svg width="1em" height="1em" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m20.16 7.802-7.2 7.2 7.2 7.2-1.44 2.88-10.08-10.08 10.08-10.08 1.44 2.88Z"></path></svg>
      </a>
    </li>
    @else
    <li class="page-item">
      <a class="prev pagger" href="{{ $paginator->previousPageUrl() }}" tabindex="-1">
      	<svg width="1em" height="1em" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m20.16 7.802-7.2 7.2 7.2 7.2-1.44 2.88-10.08-10.08 10.08-10.08 1.44 2.88Z"></path></svg>
      </a>
    </li>
    @endif
    
    @foreach ($elements as $element)
    @if(is_string($element))
    <li class="page-item disabled"><span>{{ $element }}</span></li>
    @endif
    @if(is_array($element))
        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="active">
            	<a href="#" class="pagger">{{ $page }}</a>
            </li>
            @else
                <li class="">
                    <a href="{{ $url }}" class="pagger">{{ $page }}</a>
                </li>
            @endif
        @endforeach
    @endif    
    @endforeach
    
     @if ($paginator->hasMorePages()) 
        <li class="">
          <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
          	<svg width="1em" height="1em" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m9.242 22.202 7.2-7.2-7.2-7.2 1.44-2.88 10.08 10.08-10.08 10.08-1.44-2.88Z"></path></svg>
          </a>
        </li>
        @else
        <li class="disabled page-item">
          <a class="page-link" href="#">
          	<svg width="1em" height="1em" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m9.242 22.202 7.2-7.2-7.2-7.2 1.44-2.88 10.08 10.08-10.08 10.08-1.44-2.88Z"></path></svg>          
          </a>
        </li>
	@endif

  </ul>
</div>
@endif