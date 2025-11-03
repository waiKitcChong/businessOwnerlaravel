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

</style>
</head>
<body>
@include('component.header')
<div class="container">

  <header class="headers">
    <h1>Room Availability Schedule</h1>
    <p>Manage room closures for holidays, maintenance, and special events</p>
  </header>
 

  <div class="main-content">
    <section class="calendar-view">
      <h2>Calendar View</h2>
      <p class="note">Red dates indicate closure periods</p>

      <div class="calendar-container">
        <div class="calendar-header">
          <button class="nav-btnn" id="prevMonth">&lt;</button>
          <span class="month-year" id="monthYear"></span>
          <button class="nav-btnn" id="nextMonth">&gt;</button>
        </div>

        <table class="calendar-table">
          <thead>
            <tr>
              <th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th>
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

<script>
let currentDate = new Date();
let closedDates = []; 

async function fetchClosures() {
  try {
    const response = await fetch('/business_owner/closures');
    closedDates = await response.json();
    renderCalendar(currentDate);
  } catch (error) {
    console.error('Error loading closures:', error);
  }
}

function renderCalendar(date) {
  const monthYear = document.getElementById('monthYear');
  const calendarBody = document.getElementById('calendarBody');
  const year = date.getFullYear();
  const month = date.getMonth();
  const today = new Date();

  const monthNames = [
    "January","February","March","April","May","June",
    "July","August","September","October","November","December"
  ];
  monthYear.textContent = `${monthNames[month]} ${year}`;

  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const prevMonthDays = new Date(year, month, 0).getDate();

  let days = [];
  for (let i = firstDay - 1; i >= 0; i--) {
    days.push(`<td class="prev-month">${prevMonthDays - i}</td>`);
  }

  for (let i = 1; i <= daysInMonth; i++) {
    const fullDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
    const isToday = i === today.getDate() && month === today.getMonth() && year === today.getFullYear();
    const isClosed = closedDates.includes(fullDate);

    let classes = "";
    if (isToday) classes += " selected";
    if (isClosed) classes += " closed-day";

    days.push(`<td class="${classes.trim()}">${i}</td>`);
  }

  while (days.length % 7 !== 0) {
    days.push(`<td class="prev-month"></td>`);
  }

  let rows = '';
  for (let i = 0; i < days.length; i += 7) {
    rows += `<tr>${days.slice(i, i + 7).join('')}</tr>`;
  }

  calendarBody.innerHTML = rows;
}

document.getElementById('prevMonth').addEventListener('click', () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  renderCalendar(currentDate);
});

document.getElementById('nextMonth').addEventListener('click', () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  renderCalendar(currentDate);
});

fetchClosures();
</script>

</body>
</html>
