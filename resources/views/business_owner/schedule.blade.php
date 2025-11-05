<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>TripMate Hotel Manager - Rooms</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <title>Room Availability Schedule</title>
  @vite('resources/css/navigation.css')
  @vite('resources/css/header.css')
  @vite('resources/css/page/schedule.css')
  @vite('resources/css/pagination.css')
  <style>
    nav a.active-sch {
      background-color: white;
      color: #1e293b;
      font-weight: 600;
      box-shadow: 0 0 0 1px #e2e8f0;
    }

    nav a.active-sch svg {
      stroke: #1e293b;
    }

    /* Add this in your main page <style> or schedule.css */
    .overlay {
      position: fixed;
      inset: 0;
      background-color: rgba(26, 28, 35, 0.8);
      display: none;
      /* hidden by default */
      align-items: center;
      justify-content: center;
      z-index: 999;
    }

    .overlay.active {
      display: flex;
    }
  </style>
</head>

<body>
  @include('component.header')

  <div id="overlay" class="overlay">
    @include('../form/add_schedule')
  </div>

  <div class="container">

    <header class="headers">
      <h1>Room Availability Schedule</h1>
      <p>Manage room closures for holidays, maintenance, and special events</p>
    </header>


    <div class="main-content">
      <section class="calendar-view">
        <h2>Calendar View</h2>
        <p class="note">Red dates indicate closure periods</p>

        <div style="margin-bottom: 1rem;">
          <label for="roomSelect">Select Room:</label>
          <select id="roomSelect">
            <option value=""  disabled selected>--Please select room--</option>
          </select>
        </div>

        <div class="calendar-container">
          <div class="calendar-header">
            <button class="nav-btnn" id="prevMonth">&lt;</button>
            <span class="month-year" id="monthYear"></span>
            <button class="nav-btnn" id="nextMonth">&gt;</button>
          </div>

          <table class="calendar-table">
            <thead>
              <tr>
                <th>Su</th>
                <th>Mo</th>
                <th>Tu</th>
                <th>We</th>
                <th>Th</th>
                <th>Fr</th>
                <th>Sa</th>
              </tr>
            </thead>
            <tbody id="calendarBody">

            </tbody>
          </table>
        </div>

        <p class="legend"><span class="closed-indicator"></span> Closed dates</p>
      </section>

      <aside class="upcoming-closures">
        <h2>Upcoming Closures</h2>
        <p class="subheader">2 scheduled</p>

        <div class="closure-item">
          <span class="closure-tag holiday">Holiday Closure</span>
          <p class="closure-room">All Rooms</p>
          <p class="closure-date">Dec 24 - Dec 26, 2025</p>
          <p class="closure-desc">Christmas closure</p>
          <button class="delete-btn" aria-label="Delete Holiday Closure">&#128465;</button>
        </div>

        <div class="closure-item">
          <span class="closure-tag private">Private Event</span>
          <p class="closure-room">Building A</p>
          <p class="closure-date">Dec 31 - Jan 1, 2026</p>
          <p class="closure-desc">New Year celebration booking</p>
          <button class="delete-btn" aria-label="Delete Private Event">&#128465;</button>
        </div>
      </aside>
    </div>

    <button class="add-closure-btn">+ Add Closure Period</button>
  </div>

  @vite('resources/js/schedule.js')

</body>

</html>