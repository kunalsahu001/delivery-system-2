<aside class="pe-app-sidebar horizontal-sidebar" id="horizontal-aside">
   <div class="pe-app-sidebar-logo px-6 d-flex align-items-center position-relative">
      <a href="{{ route('dashboard.index') }}" class="fs-18 fw-semibold">
         <img height="30" alt="Logo" src="{{ asset('backend/assets/images/logo-dark.png') }}">
      </a>
   </div>

   <nav class="pe-app-sidebar-menu nav nav-pills">
      <ul class="pe-horizontal-menu list-unstyled" id="horizontal-menu">

         <li class="pe-menu-title">Main</li>

         <!-- Dashboard -->
         <li class="pe-slide">
            <a href="{{ route('dashboard.index') }}" class="pe-nav-link">
               <i class="bi bi-speedometer2 pe-nav-icon"></i>
               <span class="pe-nav-content">Dashboard</span>
            </a>
         </li>

         

         
      </ul>
   </nav>
</aside>
