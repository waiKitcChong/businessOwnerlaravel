<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>TripMate Hotel Manager</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

@vite('resources/css/navigation.css')
@vite('resources/css/header.css')
@vite('resources/css/page/index.css')
<style>
   nav a.active-ow {
    background-color: white;
    color: #1e293b;
    font-weight: 600;
    box-shadow: 0 0 0 1px #e2e8f0;
  }
  nav a.active-ow svg {
    stroke: #1e293b;
  }
</style>
</head>
<body>
  @include('component.header')
  
  <div class="container">
    <main>
      <section class="stats-cards" aria-label="Hotel statistics summary">
        <article class="card total-rooms" aria-labelledby="total-rooms-title">
          <div class="title" id="total-rooms-title">Total Rooms</div>
          <div class="value"><span>125</span> <i class="fas fa-bed icon" aria-hidden="true"></i></div>
          <div class="subtext">98 occupied</div>
        </article>
        <article class="card occupancy-rate" aria-labelledby="occupancy-rate-title">
          <div class="title" id="occupancy-rate-title">Occupancy Rate</div>
          <div class="value"><span style="font-weight: 700; font-size: 18px; color:#15803d;">78%</span></div>
          <div class="subtext">+ 2.1% from last month</div>
        </article>
        <article class="card revenue" aria-labelledby="revenue-title">
          <div class="title" id="revenue-title">Revenue</div>
          <div class="value"><span style="font-weight: 700; font-size: 18px; color:#ea580c;">RM45,670</span> <span style="font-weight: 600; font-size: 14px; color:#ea580c;">RM</span></div>
          <div class="subtext">+ 12.5% from last month</div>
        </article>
        <article class="card active-staff" aria-labelledby="active-staff-title">
          <div class="title" id="active-staff-title">Active Staff</div>
          <div class="value"><span>45</span> <i class="fas fa-user-friends icon" aria-hidden="true"></i></div>
          <div class="subtext">3 new this month</div>
        </article>
      </section>

      <section class="bottom-cards">
        <section class="recent-bookings" aria-labelledby="recent-bookings-title">
          <h2 id="recent-bookings-title">Recent Bookings</h2>
          <div class="subtitle">Latest reservations today</div>
          <div class="booking-list">
            <div class="booking-item">
              <div class="booking-info">
                <p class="booking-name">John Smith</p>
                <p class="booking-room">Deluxe Suite 301</p>
              </div>
              <div class="booking-status-time">
                <span class="status-badge status-confirmed" aria-label="Booking confirmed">confirmed</span>
                <span class="booking-time">2 hours ago</span>
              </div>
            </div>
            <div class="booking-item">
              <div class="booking-info">
                <p class="booking-name">Maria Garcia</p>
                <p class="booking-room">Standard Room 205</p>
              </div>
              <div class="booking-status-time">
                <span class="status-badge status-pending" aria-label="Booking pending">pending</span>
                <span class="booking-time">4 hours ago</span>
              </div>
            </div>
            <div class="booking-item">
              <div class="booking-info">
                <p class="booking-name">David Chen</p>
                <p class="booking-room">Presidential Suite</p>
              </div>
              <div class="booking-status-time">
                <span class="status-badge status-confirmed" aria-label="Booking confirmed">confirmed</span>
                <span class="booking-time">6 hours ago</span>
              </div>
            </div>
          </div>
        </section>

        <section class="quick-actions" aria-labelledby="quick-actions-title">
          <h2 id="quick-actions-title">Quick Actions</h2>
          <div class="subtitle">Manage your hotel efficiently</div>
          <button class="action-button primary" type="button"><i class="fas fa-plus"></i> Add New Room</button>
          <button class="action-button" type="button"><i class="fas fa-user-friends"></i> Manage Staff</button>
          <button class="action-button" type="button"><i class="fas fa-star"></i> Create Promotion</button>
        </section>
      </section>
    </main>
  </div>
</body>
</html>