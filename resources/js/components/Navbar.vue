<template>
  <div class="leftbar">
  <!-- Start Sidebar -->
  <div class="sidebar">
  <!-- Start Logobar -->
  <div class="logobar">
  <a href="#" class="logo logo-large"><img src="img/logo/logo-footer.png" class="img-fluid" alt="logo"></a>
  <a href="#" class="logo logo-small"><img src="img/logo/logo-footer.png" class="img-fluid" alt="logo"></a>
  </div>
  <!-- End Logobar -->
  <!-- Start Navigationbar -->
  <div class="navigationbar">
  <ul class="vertical-menu">
      <li>
        <router-link active-class="active"
                     exact :to="{ name: 'home' }"
                     class="nav-link">
            <img src="assets\images\svg-icon\dashboard.svg" class="img-fluid" alt="dashboard"><span>Dashboard</span>
        </router-link>
      </li>
      <li>
        <router-link active-class="active"
                     exact :to="{ name: 'coupons' }"
                     class="nav-link">
        <img src="assets\images\svg-icon\basic.svg" class="img-fluid" alt="basic"><span>Coupons</span>
        </router-link>
      </li>
      <li>
        <router-link active-class="active"
                   exact :to="{ name: 'customers' }"
                   class="nav-link">
        <img src="assets\images\svg-icon\basic.svg" class="img-fluid" alt="basic"><span>Customers</span>
        </router-link>
      </li>
      <li>
        <router-link active-class="active"
                 exact :to="{ name: 'dealers' }"
                 class="nav-link">
        <img src="assets\images\svg-icon\basic.svg" class="img-fluid" alt="basic"><span>Dealers</span>
      </router-link>
      </li>
      <li>
        <router-link active-class="active"
                 exact :to="{ name: 'brands' }"
                 class="nav-link">
        <img src="assets\images\svg-icon\basic.svg" class="img-fluid" alt="basic"><span>Brands</span>
      </router-link>
      </li>
      <li>
        <router-link active-class="active"
                 exact :to="{ name: 'models' }"
                 class="nav-link">
        <img src="assets\images\svg-icon\basic.svg" class="img-fluid" alt="basic"><span>Models</span>
      </router-link>
      </li>
      </li>
      <li>
        <router-link active-class="active"
                 exact :to="{ name: 'settings' }"
                 class="nav-link">
        <img src="assets\images\svg-icon\basic.svg" class="img-fluid" alt="basic"><span>Settings</span>
      </router-link>
      </li>
  </ul>
  </div>
  <!-- End Navigationbar -->
  </div>
  <!-- End Sidebar -->
  </div>
</template>
