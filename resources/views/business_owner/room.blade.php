<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>TripMate Hotel Manager - Rooms</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@vite('resources/css/navigation.css')
@vite('resources/css/header.css')
@vite('resources/css/page/room.css')
<style>
   nav a.active-ro {
    background-color: white;
    color: #1e293b;
    font-weight: 600;
    box-shadow: 0 0 0 1px #e2e8f0;
  }
  nav a.active-ro svg {
    stroke: #1e293b;
  }
</style>
</head>
<body>
 @include('component.header')
 @include('../form/add_room')
<main class="container" role="main">
  <div class="main-header">
    <div class="main-header-left">
      <h2>Room Management</h2>
      <p>Manage hotel rooms across all locations</p>
    </div>
    <button class="btn-add-room" type="button" aria-label="Add New Room">
      <svg fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false" viewBox="0 0 24 24" width="16" height="16"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Add New Room
    </button>
  </div>

  <section class="search-filter-container" aria-label="Search and filter rooms">
    <h3>Search &amp; Filter Rooms</h3>
    <div class="search-input-wrapper" style="position:relative;">
      <input type="search" placeholder="Search by room number, type, or location..." aria-label="Search rooms" />
      <span class="search-icon" aria-hidden="true" style="position:absolute; left:0; top:0; bottom:0; display:flex; align-items:center; padding-left:12px;">
        <svg fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      </span>
      <select class="filter-select" aria-label="Filter by room type" title="Filter by room type">
        <option selected>All Types</option>
        <option>Standard</option>
        <option>Deluxe</option>
      </select>
      <select class="filter-select" aria-label="Filter by location" title="Filter by location">
        <option selected>All Locations</option>
        <option>Main Campus</option>
        <option>Downtown</option>
      </select>
      <select class="filter-select" aria-label="Filter by status" title="Filter by status">
        <option selected>All Statuses</option>
        <option>Available</option>
        <option>Occupied</option>
        <option>Maintenance</option>
      </select>
    </div>
  </section>

  <section class="rooms-container" aria-label="Rooms list">
    <h3>Rooms (3)</h3>
    <p>Manage your hotel rooms and their availability</p>
    <table role="table" aria-describedby="rooms-desc">
      <thead>
        <tr>
          <th scope="col">Room</th>
          <th scope="col">Type</th>
          <th scope="col">Location</th>
          <th scope="col">Details</th>
          <th scope="col">Price</th>
          <th scope="col">Status</th>
          <th scope="col">Amenities</th>
          <th scope="col" style="text-align:right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="room" style="min-width: 80px;">
            <div class="room-info">#101</div>
            <div class="room-floor">Floor 1</div>
          </td>
          <td class="type" style="min-width: 80px;">
            <span class="type-badge type-standard" aria-label="Standard room type">Standard</span>
          </td>
          <td class="location" style="min-width: 110px;">Main Campus</td>
          <td class="details" style="min-width: 140px;">
            <div class="guests" aria-label="2 guests">
              <svg fill="none" stroke="#64748b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><path d="M17 21v-2a4 4 0 0 0-3-3.87"/><path d="M7 21v-2a4 4 0 0 1 3-3.87"/><circle cx="12" cy="7" r="4"/></svg>
              2 guests
            </div>
            <div class="bed" aria-label="queen bed">
              <svg fill="none" stroke="#64748b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><rect x="3" y="7" width="18" height="10" rx="2" ry="2"/><line x1="3" y1="17" x2="21" y2="17"/></svg>
              queen bed
            </div>
            <div class="size" aria-label="25 square meters">25m²</div>
          </td>
          <td class="price" style="min-width: 80px;">
           RM 150
            <small>per night</small>
          </td>
          <td class="status" style="min-width: 90px;">
            <span class="status-badge status-available" aria-label="Available status">available</span>
          </td>
          <td class="amenities" style="min-width: 160px;">
            <span class="amenity wifi" aria-label="WiFi available">WiFi</span>
            <span class="amenity tv" aria-label="TV available">TV</span>
            <span class="amenity" aria-label="Air Conditioning available">Air Conditioning</span>
            <span class="amenity" aria-label="1 more amenity">+1</span>
          </td>
          <td class="actions" style="min-width: 160px;">
            <button class="btn-disable" type="button" aria-label="Disable room #101">Disable</button>
            <button class="btn-icon" type="button" aria-label="Edit room #101">
              <svg fill="none" stroke="#475569" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
            </button>
            <button class="btn-delete" type="button" aria-label="Delete room #101">
              <svg fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
            </button>
          </td>
        </tr>
        <tr>
          <td class="room" style="min-width: 80px;">
            <div class="room-info">#201</div>
            <div class="room-floor">Floor 2</div>
          </td>
          <td class="type" style="min-width: 80px;">
            <span class="type-badge type-deluxe" aria-label="Deluxe room type">Deluxe</span>
          </td>
          <td class="location" style="min-width: 110px;">Main Campus</td>
          <td class="details" style="min-width: 140px;">
            <div class="guests" aria-label="2 guests">
              <svg fill="none" stroke="#64748b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><path d="M17 21v-2a4 4 0 0 0-3-3.87"/><path d="M7 21v-2a4 4 0 0 1 3-3.87"/><circle cx="12" cy="7" r="4"/></svg>
              2 guests
            </div>
            <div class="bed" aria-label="king bed">
              <svg fill="none" stroke="#64748b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><rect x="3" y="7" width="18" height="10" rx="2" ry="2"/><line x1="3" y1="17" x2="21" y2="17"/></svg>
              king bed
            </div>
            <div class="size" aria-label="35 square meters">35m²</div>
          </td>
          <td class="price" style="min-width: 80px;">
            RM 220
            <small>per night</small>
          </td>
          <td class="status" style="min-width: 90px;">
            <span class="status-badge status-occupied" aria-label="Occupied status">occupied</span>
          </td>
          <td class="amenities" style="min-width: 160px;">
            <span class="amenity wifi" aria-label="WiFi available">WiFi</span>
            <span class="amenity tv" aria-label="TV available">TV</span>
            <span class="amenity" aria-label="Air Conditioning available">Air Conditioning</span>
            <span class="amenity" aria-label="3 more amenities">+3</span>
          </td>
          <td class="actions" style="min-width: 160px;">
            <button class="btn-enable" type="button" aria-label="Enable room #201">Enable</button>
            <button class="btn-icon" type="button" aria-label="Edit room #201">
              <svg fill="none" stroke="#475569" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
            </button>
            <button class="btn-delete" type="button" aria-label="Delete room #201">
              <svg fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
            </button>
          </td>
        </tr>
        <tr>
          <td class="room" style="min-width: 80px;">
            <div class="room-info">#102</div>
            <div class="room-floor">Floor 1</div>
          </td>
          <td class="type" style="min-width: 80px;">
            <span class="type-badge type-standard" aria-label="Standard room type">Standard</span>
          </td>
          <td class="location" style="min-width: 110px;">Downtown</td>
          <td class="details" style="min-width: 140px;">
            <div class="guests" aria-label="2 guests">
              <svg fill="none" stroke="#64748b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><path d="M17 21v-2a4 4 0 0 0-3-3.87"/><path d="M7 21v-2a4 4 0 0 1 3-3.87"/><circle cx="12" cy="7" r="4"/></svg>
              2 guests
            </div>
            <div class="bed" aria-label="double bed">
              <svg fill="none" stroke="#64748b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><rect x="3" y="7" width="18" height="10" rx="2" ry="2"/><line x1="3" y1="17" x2="21" y2="17"/></svg>
              double bed
            </div>
            <div class="size" aria-label="22 square meters">22m²</div>
          </td>
          <td class="price" style="min-width: 80px;">
            RM 130
            <small>per night</small>
          </td>
          <td class="status" style="min-width: 90px;">
            <span class="status-badge status-maintenance" aria-label="Maintenance status">maintenance</span>
          </td>
          <td class="amenities" style="min-width: 160px;">
            <span class="amenity wifi" aria-label="WiFi available">WiFi</span>
            <span class="amenity tv" aria-label="TV available">TV</span>
            <span class="amenity" aria-label="Air Conditioning available">Air Conditioning</span>
            <span class="amenity" aria-label="1 more amenity">+1</span>
          </td>
          <td class="actions" style="min-width: 160px;">
            <button class="btn-enable" type="button" aria-label="Enable room #102">Enable</button>
            <button class="btn-icon" type="button" aria-label="Edit room #102">
              <svg fill="none" stroke="#475569" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/></svg>
            </button>
            <button class="btn-delete" type="button" aria-label="Delete room #102">
              <svg fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" focusable="false"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </section>
</main>
@vite('resources/js/room.js')
</body>
</html>