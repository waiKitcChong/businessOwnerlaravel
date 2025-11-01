<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>TripMate Hotel Manager</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

@vite('resources/css/navigation.css')
@vite('resources/css/header.css')
@vite('resources/css/page/location.css')
<style>
   nav a.active-lo {
    background-color: white;
    color: #1e293b;
    font-weight: 600;
    box-shadow: 0 0 0 1px #e2e8f0;
  }
  nav a.active-lo svg {
    stroke: #1e293b;
  }
</style>
</head>
<body>
    @include('component.header')
    @include('../form/add_location')
  <div class="container">
    <main>
      <h2>Locations Management</h2>
      <p class="subtitle">Manage your hotel locations and properties</p>
      <button class="btn-add-location" aria-label="Add New Location">
        <i class="fas fa-plus"></i> Add New Location
      </button>
      <div class="locations-grid">
        <article class="location-card" aria-label="Grand Palace Resort - Main Campus location card">
          <div class="location-header">
            <h3 class="location-title">Grand Palace Resort - Main Campus</h3>
            <div class="status-badge status-active" aria-label="Active status">active</div>
          </div>
          <div class="location-subtitle"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Miami Beach, USA</div>
          <div class="rating" aria-label="Rating 4.8 out of 5 stars">
            <i class="fas fa-star" aria-hidden="true"></i> <strong>4.8</strong> / 5.0
          </div>
          <p class="location-description">Luxury beachfront resort with world-class amenities and stunning ocean views.</p>
          <div class="location-info"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <strong>123 Ocean Boulevard</strong></div>
          <div class="location-info"><i class="fas fa-phone-alt" aria-hidden="true"></i> +1 (305) 555-0123</div>
          <div class="location-info"><i class="fas fa-globe" aria-hidden="true"></i> <a href="http://www.grandpalace.com/miami" target="_blank" rel="noopener noreferrer">www.grandpalace.com/miami</a></div>
          <div class="total-rooms">Total Rooms: 250</div>
          <div class="amenities">
            <span class="amenity">Pool</span>
            <span class="amenity">Spa</span>
            <span class="amenity">Beach Access</span>
            <span class="amenity">Restaurant</span>
            <span class="amenity">Gym</span>
            <span class="amenity">Conference Rooms</span>
          </div>
          <div class="location-actions">
            <button class="btn-status" type="button">Change Status</button>
            <button class="btn-edit" type="button" aria-label="Edit location"><i class="fas fa-edit"></i></button>
            <button class="btn-delete" type="button" aria-label="Delete location"><i class="fas fa-trash-alt"></i></button>
          </div>
        </article>
        <article class="location-card" aria-label="Grand Palace Resort - Downtown location card">
          <div class="location-header">
            <h3 class="location-title">Grand Palace Resort - Downtown</h3>
            <div class="status-badge status-active" aria-label="Active status">active</div>
          </div>
          <div class="location-subtitle"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Miami, USA</div>
          <div class="rating" aria-label="Rating 4.6 out of 5 stars">
            <i class="fas fa-star" aria-hidden="true"></i> <strong>4.6</strong> / 5.0
          </div>
          <p class="location-description">Modern business hotel in the heart of the financial district.</p>
          <div class="location-info"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <strong>456 Business District</strong></div>
          <div class="location-info"><i class="fas fa-phone-alt" aria-hidden="true"></i> +1 (305) 555-0456</div>
          <div>Total Rooms: 180</div>
          <div class="amenities" style="margin-top:8px;">
            <span class="amenity">Business Center</span>
            <span class="amenity">Meeting Rooms</span>
            <span class="amenity">Restaurant</span>
            <span class="amenity">Gym</span>
            <span class="amenity">Parking</span>
          </div>
          <div class="location-actions" style="margin-top:12px;">
            <button class="btn-status" type="button">Change Status</button>
            <button class="btn-edit" type="button" aria-label="Edit location"><i class="fas fa-edit"></i></button>
            <button class="btn-delete" type="button" aria-label="Delete location"><i class="fas fa-trash-alt"></i></button>
          </div>
        </article>
        <article class="location-card" aria-label="Grand Palace Resort - Airport location card">
          <div class="location-header">
            <h3 class="location-title">Grand Palace Resort - Airport</h3>
            <div class="status-badge status-maintenance" aria-label="Maintenance status">maintenance</div>
          </div>
          <div class="location-subtitle"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Miami, USA</div>
          <div class="rating" aria-label="Rating 4.2 out of 5 stars">
            <i class="fas fa-star" aria-hidden="true"></i> <strong>4.2</strong> / 5.0
          </div>
          <p class="location-description">Convenient airport hotel with shuttle service and modern facilities.</p>
          <div class="location-info"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <strong>789 Airport Way</strong></div>
          <div class="location-info"><i class="fas fa-phone-alt" aria-hidden="true"></i> +1 (305) 555-0789</div>
          <div>Total Rooms: 120</div>
          <div class="amenities" style="margin-top:8px;">
            <span class="amenity">Airport Shuttle</span>
            <span class="amenity">24/7 Front Desk</span>
            <span class="amenity">Restaurant</span>
            <span class="amenity">Business Center</span>
          </div>
          <div class="location-actions" style="margin-top:12px;">
            <button class="btn-status" type="button">Change Status</button>
            <button class="btn-edit" type="button" aria-label="Edit location"><i class="fas fa-edit"></i></button>
            <button class="btn-delete" type="button" aria-label="Delete location"><i class="fas fa-trash-alt"></i></button>
          </div>
        </article>
      </div>
    </main>
  </div>
@vite('resources/js/location.js')
</body>
</html>