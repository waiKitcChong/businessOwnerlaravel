<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>TripMate Hotel Manager - Promotions</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@vite('resources/css/navigation.css')
@vite('resources/css/header.css')
@vite('resources/css/page/promotion.css')
<style>
   nav a.active-pro {
    background-color: white;
    color: #1e293b;
    font-weight: 600;
    box-shadow: 0 0 0 1px #e2e8f0;
  }
  nav a.active-pro svg {
    stroke: #1e293b;
  }
</style>
</head>
<body>
 

@include('component.header')
 @include('../form/add_promotion')
<main>
  <div class="page-header container">
    <div>
      <h1>Promotions Management</h1>
      <p>Create and manage promotional offers</p>
    </div>
    <button class="btn-create" type="button" aria-label="Create Promotion" id="openModalBtn">
      <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
        <line x1="12" y1="5" x2="12" y2="19" stroke="white" stroke-width="2" stroke-linecap="round"/>
        <line x1="5" y1="12" x2="19" y2="12" stroke="white" stroke-width="2" stroke-linecap="round"/>
      </svg>
      Create Promotion
    </button>
  </div>
  <section class="promotions-list" aria-label="List of promotions">
    <article class="promotion-card" aria-labelledby="promo1-title">
      <div class="star" aria-label="1 star rating"><i class="fas fa-star"></i> 1</div>
      <h2 id="promo1-title" class="promotion-title">Early Bird Special</h2>
      <div class="labels-row">
        <span class="label-green" aria-label="20 percent off">20% off</span>
        <span class="label-green" aria-label="Active status">Active</span>
      </div>
      <p class="promotion-subtitle">Book 30 days in advance and save 20% on your stay</p>
      <div class="promotion-info">
        <div><i class="fas fa-calendar-alt" aria-hidden="true"></i> <strong>Duration:</strong> <span style="float:right; color:#475569;">2024/1/1 - 2024/12/31</span></div>
        <div><i class="fas fa-user-friends" aria-hidden="true"></i> <strong>Usage:</strong> <span style="float:right; color:#475569;">45 / 100</span></div>
        <div><i class="fas fa-clock" aria-hidden="true"></i> <strong>Min. Stay:</strong> <span style="float:right; color:#475569;">2 nights</span></div>
        <div><i class="fas fa-barcode" aria-hidden="true"></i> <strong>Code:</strong> <span class="code" aria-label="Promotion code EARLY20">EARLY20</span></div>
        <div class="room-types" aria-label="Room types">
          Room Types:
          <span class="tag" aria-label="Standard room type">Standard</span>
          <span class="tag" aria-label="Deluxe room type">Deluxe</span>
        </div>
        <div class="locations" aria-label="Locations">
          Locations:
          <span class="tag" aria-label="Main Campus location">Main Campus</span>
          <span class="tag" aria-label="Downtown location">Downtown</span>
        </div>
      </div>
      <div class="actions-row">
        <button class="btn-deactivate" type="button" aria-label="Deactivate Early Bird Special promotion">Deactivate</button>
        <button class="btn-icon" type="button" aria-label="Edit Early Bird Special promotion">
          <svg fill="none" stroke="#475569" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path></svg>
        </button>
        <button class="btn-delete" type="button" aria-label="Delete Early Bird Special promotion">
          <svg fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M3 6h18"></path><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"></path><path d="M10 11v6"></path><path d="M14 11v6"></path><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"></path></svg>
        </button>
      </div>
    </article>
    <article class="promotion-card" aria-labelledby="promo2-title">
      <div class="star" aria-label="2 star rating"><i class="fas fa-star"></i> 2</div>
      <h2 id="promo2-title" class="promotion-title">Weekend Getaway</h2>
      <div class="labels-row">
        <span class="label-orange" aria-label="50 dollar off">$50 off</span>
        <span class="label-green" aria-label="Active status">Active</span>
      </div>
      <p class="promotion-subtitle">Special weekend rates for Friday-Sunday stays</p>
      <div class="promotion-info">
        <div><i class="fas fa-calendar-alt" aria-hidden="true"></i> <strong>Duration:</strong> <span style="float:right; color:#475569;">2024/2/1 - 2024/6/30</span></div>
        <div><i class="fas fa-user-friends" aria-hidden="true"></i> <strong>Usage:</strong> <span style="float:right; color:#475569;">23 / 50</span></div>
        <div><i class="fas fa-clock" aria-hidden="true"></i> <strong>Min. Stay:</strong> <span style="float:right; color:#475569;">2 nights</span></div>
        <div><i class="fas fa-barcode" aria-hidden="true"></i> <strong>Code:</strong> <span class="code" aria-label="Promotion code WEEKEND50">WEEKEND50</span></div>
        <div class="room-types" aria-label="Room types">
          Room Types:
          <span class="tag" aria-label="Deluxe room type">Deluxe</span>
          <span class="tag" aria-label="Suite room type">Suite</span>
        </div>
        <div class="locations" aria-label="Locations">
          Locations:
          <span class="tag" aria-label="Main Campus location">Main Campus</span>
        </div>
      </div>
      <div class="actions-row">
        <button class="btn-deactivate" type="button" aria-label="Deactivate Weekend Getaway promotion">Deactivate</button>
        <button class="btn-icon" type="button" aria-label="Edit Weekend Getaway promotion">
          <svg fill="none" stroke="#475569" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path></svg>
        </button>
        <button class="btn-delete" type="button" aria-label="Delete Weekend Getaway promotion">
          <svg fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M3 6h18"></path><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"></path><path d="M10 11v6"></path><path d="M14 11v6"></path><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"></path></svg>
        </button>
      </div>
    </article>
    <article class="promotion-card" aria-labelledby="promo3-title">
      <div class="star" aria-label="3 star rating"><i class="fas fa-star"></i> 3</div>
      <h2 id="promo3-title" class="promotion-title">Luxury Suite Upgrade</h2>
      <div class="labels-row">
        <span class="label-gray" aria-label="Free upgrade">Free upgrade</span>
        <span class="label-gray" aria-label="Inactive status">Inactive</span>
      </div>
      <p class="promotion-subtitle">Complimentary upgrade to suite for bookings over $300</p>
      <div class="promotion-info">
        <div><i class="fas fa-calendar-alt" aria-hidden="true"></i> <strong>Duration:</strong> <span style="float:right; color:#475569;">2024/3/1 - 2024/8/31</span></div>
        <div><i class="fas fa-user-friends" aria-hidden="true"></i> <strong>Usage:</strong> <span style="float:right; color:#475569;">8 / 25</span></div>
        <div><i class="fas fa-clock" aria-hidden="true"></i> <strong>Min. Stay:</strong> <span style="float:right; color:#475569;">3 nights</span></div>
        <div><i class="fas fa-barcode" aria-hidden="true"></i> <strong>Code:</strong> <span class="code" aria-label="Promotion code UPGRADE">UPGRADE</span></div>
        <div class="room-types" aria-label="Room types">
          Room Types:
          <span class="tag" aria-label="Standard room type">Standard</span>
          <span class="tag" aria-label="Deluxe room type">Deluxe</span>
        </div>
        <div class="locations" aria-label="Locations">
          Locations:
          <span class="tag" aria-label="Main Campus location">Main Campus</span>
          <span class="tag" aria-label="Downtown location">Downtown</span>
          <span class="tag" aria-label="Airport location">Airport</span>
        </div>
      </div>
      <div class="actions-row">
        <button class="btn-activate" type="button" aria-label="Activate Luxury Suite Upgrade promotion">Activate</button>
        <button class="btn-icon" type="button" aria-label="Edit Luxury Suite Upgrade promotion">
          <svg fill="none" stroke="#475569" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path></svg>
        </button>
        <button class="btn-delete" type="button" aria-label="Delete Luxury Suite Upgrade promotion">
          <svg fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M3 6h18"></path><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"></path><path d="M10 11v6"></path><path d="M14 11v6"></path><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"></path></svg>
        </button>
      </div>
    </article>
  </section>
</main>
@vite('resources/js/promote.js')
</body>
</html>