
<style>
  html,
  body {
    overflow: auto;
    -ms-overflow-style: none;
    scrollbar-width: none;
  }

  html::-webkit-scrollbar,
  body::-webkit-scrollbar {
    display: none;
  }

  .container {
    margin-top: 170px;

  }

  .dropdown {
  position: relative;
  display: inline-block;
}

.settings-button {
  background: none;
  border: none;
  cursor: pointer;
  padding: 8px;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: white;
  min-width: 140px;
  box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
  border-radius: 8px;
  z-index: 10;
}

.dropdown-content a {
  color: #333;
  padding: 10px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #f0f0f0;
}

/* 顯示下拉選單 */
.dropdown:hover .dropdown-content {
  display: block;
}

  <?php
     $role = session('role');
  ?>
</style>

<div class="topheader">
  <header>
  <div class="header-left">
    <div class="logo-container" aria-label="TripMate logo with building icon">
      <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
        <path d="M8 21V9M16 21V5M12 21V1M4 21H20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <rect x="7" y="14" width="2" height="2" fill="white" />
        <rect x="7" y="10" width="2" height="2" fill="white" />
        <rect x="7" y="6" width="2" height="2" fill="white" />
        <rect x="15" y="18" width="2" height="2" fill="white" />
        <rect x="15" y="14" width="2" height="2" fill="white" />
        <rect x="15" y="10" width="2" height="2" fill="white" />
        <rect x="11" y="18" width="2" height="2" fill="white" />
        <rect x="11" y="14" width="2" height="2" fill="white" />
        <rect x="11" y="10" width="2" height="2" fill="white" />
      </svg>
    </div>
    <div>
  
    <div class="hotel-name">Unknown</div>

      <div class="hotel-subtitle">Grand Palace Resort &amp; Spa</div>
    </div>
  </div>

  <img class="hlogo" alt="TripMate logo" height="92" src="{{ asset('image/tripmate.png') }}" width="92" />

  <div class="header-right">
    <div class="dropdown">
      <button class="settings-button" aria-label="Settings">
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="12" r="3" stroke="#64748b" stroke-width="1.5" />
          <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33h.09a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51h.09a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82v.09a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"
            stroke="#64748b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>

      <div class="dropdown-content">
        <a href="#" id="theme-toggle">Theme</a>
        <a href="{{ url('/logout') }}">Logout</a>
      </div>
    </div>
  </div>
</header>

  <div id="scrollProgressBar"></div>
  <nav aria-label="Main navigation">
   <a href="{{ url(($role == 'owner' ? 'business_owner' : 'staff') . '/dashboard') }}" 
   class="active-ow" aria-current="false">
   <i class="fas fa-chart-line"></i> Overview</a>


    <a href="{{ url(($role == 'owner' ? 'business_owner' : 'staff') . '/staff') }}" class="active-st" aria-current="false"><i class="fas fa-user-friends"></i> Staff</a>
 
    <a href="{{ url(($role == 'owner' ? 'business_owner' : 'staff') . '/location') }}" class="active-lo" aria-current="false"><i class="fas fa-map-marker-alt"></i> Locations</a>
    <?php
    ?>
    <a href="{{ url(($role == 'owner' ? 'business_owner' : 'staff') . '/room') }}" class="active-ro" aria-current="false"><i class="fas fa-bed"></i> Rooms</a>
    <?php
    ?>
    <a href="{{ url(($role == 'owner' ? 'business_owner' : 'staff') . '/promotion') }}" class="active-pro" aria-current="page"><i class="fas fa-star"></i> Promotions</a>
  </nav>
</div>

<script>
  window.addEventListener('scroll', function() {
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const scrollPercent = (scrollTop / docHeight) * 100;
    document.getElementById('scrollProgressBar').style.width = scrollPercent + '%';
  });
</script>