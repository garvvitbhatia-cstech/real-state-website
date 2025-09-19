@php
	$action =  Route::getCurrentRoute()->getName();
@endphp
 <div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
     <div class="sidebar-header">
      <div class="d-flex justify-content-between">
         <div class="logo"> <a href="{{ url('/admin/dashboard'); }}"><img style="width:130px; height:auto" src="{{ asset('public/admin/images/logo/navkar_white_logo.png') }}" /></a> </div>
         <div class="toggler"> <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a> </div>
       </div>
    </div>
     <div class="sidebar-menu">
      <ul class="menu">
         <li class="sidebar-item {{$action =='admin.dashboard' ?'active':''}}"> 
         	<a href="{{ url('/admin/dashboard'); }}" class='sidebar-link'> <i class="bi bi-grid-fill"></i> <span>{{Session::get('admin_type')}} Dashboard</span> </a> 
         </li>
         @php
         $managerActive =
         $profile =
         $changePassword =
         $accounts =
         $settings =
         $toll_free =
         false;         
         if($action =='admin.update-profile'){
         	$managerActive = $profile = true;
         }
         if($action =='admin.change-password'){
         	$managerActive = $changePassword = true;
         }
         if($action =='admin.accounts'){
         	$managerActive = $accounts = true;
         }  
         if($action =='admin.settings'){
         	$managerActive = $settings = true;
         }    
         if($action =='admin.toll-free' ||  $action =='admin.add-toll-free' ||  $action =='admin.edit-toll-free'){
         	$managerActive = $toll_free = true;
         }        
         @endphp
         <li class="sidebar-item  has-sub {{$managerActive?'active':''}}"> 
         	<a href="#" class='sidebar-link'> <i class="bi bi-person-fill"></i> <span>My Profile</span> </a>
          <ul class="submenu {{$managerActive?'active':''}}">
             <li class="submenu-item {{$profile?'active':''}}"> 
             	<a href="{{ url('/admin/update-profile'); }}">Update Profile</a> 
             </li>
             <li class="submenu-item {{$changePassword?'active':''}} "> 
             	<a href="{{ url('/admin/change-password'); }}">Change Password</a> 
             </li>
             
             @if(Session::get('admin_type') == 'Admin')
             <!--<li class="submenu-item {{$accounts?'active':''}}"> 
             	<a href="{{ url('/admin/accounts'); }}">Accounts</a> 
             </li>-->
             <li class="submenu-item {{$settings?'active':''}}"> 
             	<a href="{{ url('/admin/settings'); }}">Settings</a> 
             </li>
             <li class="submenu-item {{$toll_free?'active':''}}"> 
             	<a href="{{ url('/admin/toll-free'); }}">Toll Free</a> 
             </li>
             @endif
           </ul>
        </li>
         @if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account')
         @php
         $managerActive =
         $users =
         $admins =
         $teams =
         $contacts =
         $inner_pages =
         $banners =
         $faqs =
         $schedule =
         false;
         if($action =='admin.admins' ||  $action =='admin.add-admins' ||  $action =='admin.edit-admins'){
         	$managerActive = $admins = true;
         }
         if($action =='admin.users' ||  $action =='admin.add-user' ||  $action =='admin.edit-user'){
         	$managerActive = $users = true;
         }
         if($action =='admin.schedule' ||  $action =='admin.view-schedule'){
         	$managerActive = $schedule = true;
         }
         if($action =='admin.our-team' ||  $action =='admin.add-our-team' ||  $action =='admin.edit-our-team'){
         	$managerActive = $teams = true;
         }
         if($action =='admin.inner-pages' ||  $action =='admin.edit-inner-page'){
         	$managerActive = $inner_pages = true;
         }
         if($action =='admin.banners' ||  $action =='admin.edit-banner' ||  $action =='admin.add-banner'){
         	$managerActive = $banners = true;
         }
         if($action =='admin.faqs' ||  $action =='admin.edit-faq' ||  $action =='admin.add-faq'){
         	$managerActive = $faqs = true;
         }
         @endphp
         <li class="sidebar-item  has-sub {{$managerActive?'active':''}}"> 
         	<a href="#" class='sidebar-link'> <i class="bi bi-images"></i> <span>Banners</span> </a>
          <ul class="submenu {{$managerActive?'active':''}}">
          
             <?php /*?><li class="submenu-item {{$users?'active':''}}"> 
             	<a href="{{ url('/admin/users'); }}">Customers </a> 
             </li>
             @if(Session::get('admin_type') == 'Admin')
             <li class="submenu-item {{$admins?'active':''}}"> 
             	<a href="{{ url('/admin/admins'); }}">Admin Manager</a> 
             </li>
             @endif<?php */?>
             <li class="submenu-item {{$schedule?'active':''}}"> 
             	<a href="{{ url('/admin/schedules'); }}">Schedule</a> 
             </li>
             <li class="submenu-item {{$teams?'active':''}}"> 
             	<a href="{{ url('/admin/our-team'); }}">Our Team</a> 
             </li>
             <li class="submenu-item {{$inner_pages?'active':''}}"> 
             	<a href="{{ url('/admin/inner-pages'); }}">Inner Pages</a> 
             </li>
             <li class="submenu-item {{$banners?'active':''}}"> 
             	<a href="{{ url('/admin/banners'); }}">Banners</a> 
             </li>
             <li class="submenu-item {{$faqs?'active':''}}"> 
             	<a href="{{ url('/admin/faqs'); }}">Faqs</a> 
             </li>
           </ul>
        </li>
         @endif
         
         @if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account')
         @php                        
         $managerActive =         
         $contacts =
         $newsletter =
         $news =
         $blogs =
         $testimonials =
         
         false;         
         if($action =='admin.blogs' ||  $action =='admin.add-blog' ||  $action =='admin.edit-blog'){
         	$managerActive = $blogs = true;
         }
         if($action =='admin.newsletter'){
         	$managerActive = $newsletter = true;
         }
         if($action =='admin.news' ||  $action =='admin.add-news' ||  $action =='admin.edit-news'){
         	$managerActive = $news = true;
         }
         if($action =='admin.testimonials' ||  $action =='admin.add-testimonial' ||  $action =='admin.edit-testimonial'){
         	$managerActive = $testimonials = true;
         }
         
         @endphp
         <li class="sidebar-item  has-sub {{$managerActive?'active':''}}"> 
         	<a href="#" class='sidebar-link'> <i class="bi bi-person-fill"></i> <span>Blogs</span> </a>
          <ul class="submenu {{$managerActive?'active':''}}">          
             <li class="submenu-item {{$blogs?'active':''}}"> 
             	<a href="{{ url('/admin/blogs'); }}">Blogs</a> 
             </li>
             <li class="submenu-item {{$newsletter?'active':''}}"> 
             	<a href="{{ url('/admin/newsletter'); }}">Newsletter</a> 
             </li>
             <li class="submenu-item {{$news?'active':''}}"> 
             	<a href="{{ url('/admin/news'); }}">News</a> 
             </li>
             <li class="submenu-item {{$testimonials?'active':''}}"> 
             	<a href="{{ url('/admin/testimonials'); }}">User Reviews</a> 
             </li>
           </ul>
        </li>
         @endif
         
         @if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account')
         @php                        
         $managerActive =
         $categories =
         $products =
         false;
         if($action =='admin.categories' ||  $action =='admin.add-category' ||  $action =='admin.edit-category'){
         	$managerActive = $categories = true;
         }
         if($action =='admin.products' ||  $action =='admin.add-product' ||  $action =='admin.edit-product'){
         	$managerActive = $products = true;
         }
         @endphp
         <li class="sidebar-item  has-sub {{$managerActive?'active':''}}"> 
         	<a href="#" class='sidebar-link'> <i class="bi bi-briefcase-fill"></i><span>Product Management</span></a>
          	<ul class="submenu {{$managerActive?'active':''}}">
          
             <li class="submenu-item {{$categories?'active':''}}"> 
             	<a href="{{ url('/admin/categories'); }}">Categories</a> 
             </li>
             <li class="submenu-item {{$products?'active':''}}"> 
             	<a href="{{ url('/admin/products'); }}">Products</a> 
             </li>
             
           </ul>
        </li>
         @endif
         <li class="sidebar-item"> <a href="{{ url('/admin/logout'); }}" class='sidebar-link'> <i class="bi bi-box-arrow-right"></i> <span>Log Out</span> </a> </li>
       </ul>
    </div>
     <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
   </div>
</div>