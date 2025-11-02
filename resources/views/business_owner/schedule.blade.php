<style>
.container {
  max-width: 1200px;
  margin: 30px auto;
  padding: 20px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #1a202c;
  background: #f9fafb;
  border-radius: 10px;
}

header h1 {
  font-weight: 700;
  font-size: 1.5rem;
}

header p {
  color: #718096;
  margin-top: 4px;
  font-size: 0.9rem;
}

/* Main Content Grid */
.main-content {
  display: flex;
  gap: 20px;
  margin-top: 20px;
}

/* Calendar View */
.calendar-view {
  flex: 3;
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 8px rgba(0,0,0,0.05);
}

.calendar-view h2 {
  font-weight: 600;
  margin-bottom: 6px;
}

.calendar-view .note {
  font-size: 0.85rem;
  color: #718096;
  margin-bottom: 15px;
}

.calendar-header {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 15px;
  margin-bottom: 10px;
}

.nav-btn {
  background: transparent;
  border: none;
  font-size: 1.1rem;
  cursor: pointer;
  color: #4a5568;
}

.month-year {
  font-weight: 600;
  font-size: 1.1rem;
}

.calendar-table {
  width: 100%;
  border-collapse: collapse;
  text-align: center;
  font-size: 0.95rem;
  color: #4a5568;
}

.calendar-table th {
  font-weight: 600;
  padding-bottom: 8px;
}

.calendar-table td {
  padding: 8px 6px;
  border-radius: 6px;
  cursor: pointer;
}

.calendar-table .prev-month {
  color: #cbd5e0;
}

.calendar-table .selected {
  background-color: #bee3f8;
  color: #1a202c;
}

.legend {
  font-size: 0.85rem;
  color: #718096;
  margin-top: 12px;
  display: flex;
  align-items: center;
  gap: 8px;
}

.closed-indicator {
  width: 16px;
  height: 16px;
  background-color: #e53e3e;
  border-radius: 4px;
  display: inline-block;
}

/* Upcoming Closures */
.upcoming-closures {
  flex: 1.3;
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 8px rgba(0,0,0,0.05);
}

.upcoming-closures h2 {
  font-weight: 600;
  margin-bottom: 4px;
}

.subheader {
  font-size: 0.85rem;
  color: #718096;
  margin-bottom: 20px;
}

.closure-item {
  background: #f7fafc;
  border-radius: 6px;
  padding: 14px 16px;
  margin-bottom: 20px;
  position: relative;
}

.closure-tag {
  display: inline-block;
  padding: 4px 10px;
  font-size: 0.8rem;
  font-weight: 600;
  border-radius: 12px;
  color: white;
  margin-bottom: 6px;
}

.holiday {
  background-color: #e53e3e;
}

.private {
  background-color: #f56565;
}

.closure-room {
  font-weight: 600;
  margin: 0;
  font-size: 1rem;
}

.closure-date {
  font-size: 0.85rem;
  color: #718096;
  margin: 2px 0;
  font-style: italic;
}

.closure-desc {
  font-size: 0.8rem;
  color: #a0aec0;
  margin: 0;
}

.delete-btn {
  position: absolute;
  top: 14px;
  right: 14px;
  background: transparent;
  border: none;
  color: #e53e3e;
  cursor: pointer;
  font-size: 1.2rem;
}

/* Add Button */
.add-closure-btn {
  margin-top: 20px;
  background-color: #3182ce;
  color: white;
  border: none;
  border-radius: 6px;
  padding: 10px 18px;
  font-weight: 600;
  cursor: pointer;
  float: right;
}

</style>

<div class="container">
  <header>
    <h1>Room Availability Schedule</h1>
    <p>Manage room closures for holidays, maintenance, and special events</p>
  </header>

  <div class="main-content">
    <section class="calendar-view">
      <h2>Calendar View</h2>
      <p class="note">Red dates indicate closure periods</p>

      <div class="calendar-container">
        <div class="calendar-header">
          <button class="nav-btn">&lt;</button>
          <span class="month-year">November 2025</span>
          <button class="nav-btn">&gt;</button>
        </div>

        <table class="calendar-table">
          <thead>
            <tr>
              <th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th>
            </tr>
          </thead>
          <tbody>
            <!-- Calendar rows with days and special styling for selected and closed -->
            <tr>
              <td class="prev-month">26</td>
              <td class="prev-month">27</td>
              <td class="prev-month">28</td>
              <td class="prev-month">29</td>
              <td class="prev-month">30</td>
              <td class="prev-month">31</td>
              <td>1</td>
            </tr>
            <tr>
              <td class="selected">2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td>
            </tr>
            <!-- Additional weeks -->
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
