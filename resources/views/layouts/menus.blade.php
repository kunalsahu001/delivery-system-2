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

         <!-- Orders -->
         <li class="pe-slide">
            <a href="{{ route('orders.index') }}" class="pe-nav-link">
               <i class="bi bi-bag-check pe-nav-icon"></i>
               <span class="pe-nav-content">Orders</span>
            </a>
         </li>

         <!-- Assignments -->
         <li class="pe-slide">
            <a href="{{ route('assignments.index') }}" class="pe-nav-link">
               <i class="bi bi-arrow-left-right pe-nav-icon"></i>
               <span class="pe-nav-content">Assignments</span>
            </a>
         </li>

         <!-- Delivery Personnel -->
         <li class="pe-slide">
            <a href="{{ route('delivery-personnel.index') }}" class="pe-nav-link">
               <i class="bi bi-people pe-nav-icon"></i>
               <span class="pe-nav-content">Delivery Personnel</span>
            </a>
         </li>

         
      </ul>
   </nav>
</aside>
