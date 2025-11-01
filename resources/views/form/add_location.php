
<style>
  * { box-sizing: border-box; }


  /* Overlay hidden by default */
  .overlay {
    position: fixed;
    inset: 0;
    background-color: rgba(26, 28, 35, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
    z-index: 1000;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
  }
  .overlay.active {
    opacity: 1;
    pointer-events: auto;
  }

  /* Modal */
  .modal {
    background-color: #f7f9fc;
    border-radius: 12px;
    width: 100%;
    max-width: 520px;
    padding: 24px 32px 32px 32px;
    box-shadow: 0 0 12px rgb(0 0 0 / 0.15);
    position: relative;
    transform: scale(0.9);
    opacity: 0;
    transition: transform 0.3s ease, opacity 0.3s ease;
  }
  .overlay.active .modal {
    transform: scale(1);
    opacity: 1;
  }

  .modal-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 8px;
  }
  .modal-title {
    font-weight: 600;
    font-size: 14px;
    line-height: 20px;
    color: #1a1c23;
  }
  .modal-subtitle {
    font-weight: 400;
    font-size: 12px;
    line-height: 16px;
    color: #7a8a9f;
    margin-bottom: 24px;
  }
  .close-button {
    background: none;
    border: none;
    color: #7a8a9f;
    font-size: 16px;
    cursor: pointer;
    padding: 0;
    line-height: 1;
    transition: color 0.2s ease;
  }
  .close-button:hover { color: #1a1c23; }

  /* Form Styles */
  .row { display: flex; gap: 16px; margin-bottom: 16px; }
  .row.single { display: block; }
  label {
    font-weight: 600;
    font-size: 12px;
    line-height: 16px;
    color: #1a1c23;
    margin-bottom: 6px;
    display: block;
  }
  input[type="text"],
  input[type="number"],
  input[type="email"],
  textarea {
    width: 100%;
    font-family: 'Inter', sans-serif;
    font-weight: 400;
    font-size: 12px;
    line-height: 16px;
    color: #7a8a9f;
    background-color: #f7f9fc;
    border: 1px solid #d9e2ec;
    border-radius: 6px;
    padding: 8px 12px;
    transition: border-color 0.2s ease;
  }
  input:focus,
  textarea:focus {
    outline: none;
    border-color: #3bb4f2;
    color: #1a1c23;
    background-color: #fff;
  }
  textarea { resize: vertical; min-height: 64px; }
  .row.half > div { flex: 1; }

  .actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 8px;
  }
  button.cancel {
    background-color: transparent;
    border: 1px solid #d9e2ec;
    border-radius: 6px;
    font-weight: 400;
    font-size: 12px;
    line-height: 16px;
    color: #1a1c23;
    padding: 8px 16px;
    cursor: pointer;
    transition: background-color 0.2s ease, border-color 0.2s ease;
  }
  button.cancel:hover {
    background-color: #e1e8f0;
    border-color: #a0aec0;
  }
  button.submit {
    background-color: #3bb4f2;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    font-size: 12px;
    line-height: 16px;
    color: #fff;
    padding: 8px 16px;
    cursor: pointer;
    transition: background-color 0.2s ease;
  }
  button.submit:hover { background-color: #2a9bd6; }

  @media (max-width: 480px) {
    .row { flex-direction: column; }
    .row.half > div { flex: none; width: 100%; }
  }
</style>



<!-- Overlay & Modal -->
<div class="overlay" id="modalOverlay" role="dialog" aria-modal="true" aria-labelledby="modalTitle" aria-describedby="modalDesc">
  <div class="modal">
    <div class="modal-header">
      <h2 id="modalTitle" class="modal-title">Add New Location</h2>
      <button class="close-button" aria-label="Close modal">&times;</button>
    </div>
    <p id="modalDesc" class="modal-subtitle">Add a new hotel location to your property portfolio.</p>
    <form>
      <div class="row half">
        <div>
          <label for="locationName">Location Name</label>
          <input type="text" id="locationName" placeholder="e.g., Grand Palace Resort - Downtown" />
        </div>
        <div>
          <label for="totalRooms">Total Rooms</label>
          <input type="number" id="totalRooms" placeholder="0" min="0" />
        </div>
      </div>
      <div class="row single">
        <div>
          <label for="address">Address</label>
          <input type="text" id="address" placeholder="Street address" />
        </div>
      </div>
      <div class="row half">
        <div>
          <label for="city">City</label>
          <input type="text" id="city" placeholder="City" />
        </div>
        <div>
          <label for="country">Country</label>
          <input type="text" id="country" placeholder="Country" />
        </div>
      </div>
      <div class="row half">
        <div>
          <label for="phone">Phone</label>
          <input type="text" id="phone" placeholder="Phone number" />
        </div>
        <div>
          <label for="email">Email</label>
          <input type="email" id="email" placeholder="Contact email" />
        </div>
      </div>
      <div class="row single">
        <div>
          <label for="website">Website (Optional)</label>
          <input type="text" id="website" placeholder="Website URL" />
        </div>
      </div>
      <div class="row single">
        <div>
          <label for="description">Description</label>
          <textarea id="description" placeholder="Brief description of the location"></textarea>
        </div>
      </div>
      <div class="actions">
        <button type="button" class="cancel">Cancel</button>
        <button type="submit" class="submit">Add Location</button>
      </div>
    </form>
  </div>
</div>


