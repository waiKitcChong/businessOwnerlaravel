
<style>
  * {
    box-sizing: border-box;
  }

  /* Modal overlay hidden by default */
  .modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(26, 26, 26, 0.8);
    display: none; /* hidden initially */
    align-items: center;
    justify-content: center;
    padding: 16px;
    z-index: 1000;
    opacity: 0;
  }
  .modal-overlay.show {
    display: flex;
    animation: fadeIn 0.3s ease forwards;
  }

  /* Modal box animation */
  .modal {
    background: #f7faff;
    border-radius: 12px;
    width: 100%;
    max-width: 600px;
    padding: 24px 32px 32px 32px;
    box-shadow: 0 0 20px rgb(0 0 0 / 0.1);
    color: #1f2937;
    position: relative;
    opacity: 0;
    transform: translateY(30px) scale(0.95);
    animation: slideUp 0.35s ease forwards;
  }
  .modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    border: none;
    background: transparent;
    font-size: 16px;
    cursor: pointer;
    color: #6b7280;
    line-height: 1;
  }
  .modal-close:hover {
    color: #111827;
  }
  .modal-title {
    font-weight: 600;
    font-size: 16px;
    margin: 0 0 6px 0;
    color: #111827;
  }
  .modal-subtitle {
    font-weight: 400;
    font-size: 13px;
    color: #4b5563;
    margin: 0 0 20px 0;
  }
  form {
    width: 100%;
  }
  .form-row {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
    margin-bottom: 16px;
  }
  .form-group {
    display: flex;
    flex-direction: column;
    font-size: 13px;
    color: #374151;
    flex: 1 1 0;
    min-width: 100px;
  }
  .form-group.wide {
    flex: 1 1 100%;
  }
  label {
    margin-bottom: 6px;
    font-weight: 600;
  }
  input[type="text"],
  input[type="number"],
  select,
  textarea {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    padding: 8px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    background: #f7faff;
    color: #374151;
    outline-offset: 2px;
    outline-color: transparent;
    transition: outline-color 0.2s ease;
  }
  input[type="text"]::placeholder,
  input[type="number"]::placeholder,
  textarea::placeholder {
    color: #9ca3af;
  }
  input[type="text"]:focus,
  input[type="number"]:focus,
  select:focus,
  textarea:focus {
    outline-color: #3b82f6;
  }
  textarea {
    resize: vertical;
    min-height: 60px;
  }
  .amenities-container {
    border: 1px solid #d1d5db;
    border-radius: 6px;
    background: #f7faff;
    max-height: 100px;
    overflow-y: auto;
    padding: 8px 12px;
  }
  .amenities-list {
    display: flex;
    flex-wrap: wrap;
    gap: 12px 24px;
  }
  .amenity-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: #374151;
    min-width: 120px;
  }
  .switch {
    position: relative;
    display: inline-block;
    width: 34px;
    height: 18px;
  }
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0; left: 0; right: 0; bottom: 0;
    background-color: #e5e7eb;
    border-radius: 9999px;
    transition: 0.2s;
  }
  .slider:before {
    position: absolute;
    content: "";
    height: 14px;
    width: 14px;
    left: 2px;
    bottom: 2px;
    background-color: white;
    border-radius: 50%;
    transition: 0.2s;
  }
  input:checked + .slider {
    background-color: #3b82f6;
  }
  input:checked + .slider:before {
    transform: translateX(16px);
  }
  .buttons-row {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 8px;
  }
  button.cancel {
    background: transparent;
    border: none;
    color: #374151;
    font-size: 13px;
    padding: 8px 16px;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.2s ease;
  }
  button.cancel:hover {
    background-color: #e5e7eb;
  }
  button.add-room {
    background: linear-gradient(90deg, #14aaf5 0%, #0d8de1 100%);
    border: none;
    color: white;
    font-size: 13px;
    padding: 8px 16px;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.2s ease;
  }
  button.add-room:hover {
    background: linear-gradient(90deg, #0d8de1 0%, #14aaf5 100%);
  }
  @media (max-width: 480px) {
    .form-row {
      flex-direction: column;
    }
    .form-group {
      min-width: 100%;
    }
    .amenities-list {
      gap: 12px 12px;
    }
    .amenity-item {
      min-width: auto;
      flex: 1 1 45%;
    }
  }

  /* Animations */
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }
  @keyframes slideUp {
    from { opacity: 0; transform: translateY(30px) scale(0.95); }
    to { opacity: 1; transform: translateY(0) scale(1); }
  }
</style>




<!-- Modal -->
<div class="modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modal-title">
  <div class="modal">
    <button class="modal-close" aria-label="Close modal">&times;</button>
    <h2 id="modal-title" class="modal-title">Add New Room</h2>
    <p class="modal-subtitle">Add a new room to your hotel inventory.</p>
<form id="addRoomForm" action="{{ url('/business_owner/room/store') }}" method="POST">
  @csrf
  <div class="form-row">
    <div class="form-group" style="flex:1 1 33%;">
      <label for="room-number">Room Number</label>
      <input type="text" id="room-number" name="room-number" placeholder="e.g., 101" />
    </div>
    <div class="form-group" style="flex:1 1 33%;">
      <label for="room-type">Room Type</label>
      <select id="room-type" name="room-type" aria-label="Room Type">
        <option>Standard</option>
        <option>Deluxe</option>
        <option>Suite</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group" style="flex:1 1 20%;">
      <label for="floor">Floor</label>
      <input type="number" id="floor" name="floor" min="0" value="1" />
    </div>
    <div class="form-group" style="flex:1 1 20%;">
      <label for="capacity">Capacity</label>
      <input type="number" id="capacity" name="capacity" min="0" value="2" />
    </div>
    <div class="form-group" style="flex:1 1 20%;">
      <label for="size">Size (m²)</label>
      <input type="number" id="size" name="size" min="0" value="0" />
    </div>
    <div class="form-group" style="flex:1 1 30%;">
      <label for="price">Price per Night</label>
      <input type="number" id="price" name="price" min="0" value="0" />
    </div>
  </div>

  <div class="form-row">
    <div class="form-group wide">
      <label for="bed-type">Bed Type</label>
      <select id="bed-type" name="bed-type" aria-label="Bed Type">
        <option>Queen</option>
        <option>King</option>
        <option>Twin</option>
        <option>Double</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group wide">
      <label>Amenities</label>
      <div class="amenities-container" tabindex="0" aria-label="Amenities list with toggle switches">
        <div class="amenities-list">
          <label class="amenity-item"><span class="switch"><input type="checkbox" name="amenities[]" value="wifi" /><span class="slider"></span></span>WiFi</label>
          <label class="amenity-item"><span class="switch"><input type="checkbox" name="amenities[]" value="tv" /><span class="slider"></span></span>TV</label>
          <label class="amenity-item"><span class="switch"><input type="checkbox" name="amenities[]" value="air-conditioning" /><span class="slider"></span></span>Air Conditioning</label>
          <label class="amenity-item"><span class="switch"><input type="checkbox" name="amenities[]" value="mini-bar" /><span class="slider"></span></span>Mini Bar</label>
          <label class="amenity-item"><span class="switch"><input type="checkbox" name="amenities[]" value="ocean-view" /><span class="slider"></span></span>Ocean View</label>
          <label class="amenity-item"><span class="switch"><input type="checkbox" name="amenities[]" value="balcony" /><span class="slider"></span></span>Balcony</label>
          <label class="amenity-item"><span class="switch"><input type="checkbox" name="amenities[]" value="kitchenette" /><span class="slider"></span></span>Kitchenette</label>
          <label class="amenity-item"><span class="switch"><input type="checkbox" name="amenities[]" value="living-area" /><span class="slider"></span></span>Living Area</label>
          <label class="amenity-item"><span class="switch"><input type="checkbox" name="amenities[]" value="work-desk" /><span class="slider"></span></span>Work Desk</label>
          <label class="amenity-item"><span class="switch"><input type="checkbox" name="amenities[]" value="safe" /><span class="slider"></span></span>Safe</label>
          <label class="amenity-item"><span class="switch"><input type="checkbox" name="amenities[]" value="room-service" /><span class="slider"></span></span>Room Service</label>
          <label class="amenity-item"><span class="switch"><input type="checkbox" name="amenities[]" value="jacuzzi" /><span class="slider"></span></span>Jacuzzi</label>
        </div>
      </div>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group wide">
      <label for="description">Description</label>
      <textarea id="description" name="description" placeholder="Brief description of the room"></textarea>
    </div>
  </div>

  <div class="buttons-row">
    <button type="button" class="cancel">Cancel</button>
    <button type="submit" class="add-room">Add Room</button>
  </div>
</form>

  </div>
</div>



