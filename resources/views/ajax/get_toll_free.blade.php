@if(isset($toll_free->id))
<div class="toll-free"> 
<div class="map-pin me-3">
  <svg width="1em" height="1em" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path stroke="#E4D8B6" d="M.5.5h27v27H.5z"></path><g clip-path="url(#phone_svg__a)"><path d="m23.458 18.678-2.791-2.791c-.997-.997-2.691-.598-3.09.698-.3.897-1.296 1.395-2.193 1.196-1.994-.498-4.685-3.09-5.183-5.183-.3-.898.299-1.895 1.196-2.194 1.296-.398 1.694-2.093.697-3.09l-2.79-2.79c-.798-.698-1.994-.698-2.692 0L4.718 6.416c-1.894 1.994.2 7.277 4.884 11.962 4.685 4.685 9.968 6.878 11.962 4.884l1.894-1.894c.698-.797.698-1.993 0-2.691Z" fill="#E4D8B6"></path></g><defs><clipPath id="phone_svg__a"><path fill="#fff" transform="translate(4 4)" d="M0 0h20v20H0z"></path></clipPath></defs></svg>
</div>
<h5>{{$toll_free->contact}}</h5> 
</div>    
<div class="toll-free">
<div class="map-pin me-3">
  <svg width="1em" height="1em" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path stroke="#E4D8B6" d="M.5.5h27v27H.5z"></path><g clip-path="url(#time_svg__a)"><path d="M14 4C8.5 4 4 8.5 4 14s4.5 10 10 10 10-4.5 10-10S19.5 4 14 4Zm4.2 14.2L13 15V9h1.5v5.2l4.5 2.7-.8 1.3Z" fill="#E4D8B6"></path></g><defs><clipPath id="time_svg__a"><path fill="#fff" transform="translate(4 4)" d="M0 0h20v20H0z"></path></clipPath></defs></svg>
</div>
<h5>
    @php
        $explode = explode('-',$toll_free->time);
        echo $explode[0];
        if($explode[0] > 11){
            echo ' pm ';
        }else{
            echo ' am ';
        }
        
        echo ' to 6:00'; 
        
        if($explode[1] > 11){
            echo ' pm ';
        }else{
            echo ' am ';
        }
    @endphp
</h5>
</div>
@endif