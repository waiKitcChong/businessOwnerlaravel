<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Schedule Room Closure</title>
<style>
  body {
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f3f4f6;
    margin: 0;
    padding: 20px;
  }

  .modal {
    background: white;
    width: 700px;
    max-width: 95%;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    padding: 24px 32px 32px;
    margin: 0 auto;
  }

  .modal-header {
    font-weight: 700;
    font-size: 1.25rem;
    margin-bottom: 6px;
    color: #1f2937;
  }

  .modal-subheader {
    color: #6b7280;
    font-size: 0.9rem;
    margin-bottom: 20px;
  }

  .form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
  }

  label {
    display: block;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
  }

  input[type="date"],
  select,
  textarea {
    width: 100%;
    padding: 10px 12px;
    font-size: 0.9rem;
    border: 1.5px solid #d1d5db;
    border-radius: 8px;
    color: #374151;
    outline-color: #22b8cf;
    box-sizing: border-box;
  }

  input[type="date"]:focus,
  select:focus,
  textarea:focus {
    border-color: #22b8cf;
  }

  textarea {
    height: 60px;
    resize: none;
  }

  .modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
  }

  .btn-cancel {
    background: transparent;
    border: none;
    color: #6b7280;
    font-size: 0.95rem;
    padding: 8px 16px;
    border-radius: 8px;
    cursor: pointer;
  }

  .btn-cancel:hover {
    background-color: #f3f4f6;
  }

  .btn-add {
    background-color: #22b8cf;
    color: white;
    font-weight: 600;
    padding: 8px 16px;
    font-size: 0.95rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
  }

  .btn-add:hover {
    background-color: #1aa7b9;
  }
</style>
</head>
<body>

<div class="modal" role="dialog" aria-modal="true" aria-labelledby="dialogTitle">
  <h2 id="dialogTitle" class="modal-header">Schedule Room Closure</h2>
  <p class="modal-subheader">Set dates when rooms will be unavailable for booking</p>

  <!-- Date Inputs -->
  <div class="form-row">
    <div class="input-group">
      <label for="start-date">Start Date <span style="color:#e02424">*</span></label>
      <input type="date" id="start-date" name="start-date" required />
    </div>
    <div class="input-group">
      <label for="end-date">End Date <span style="color:#e02424">*</span></label>
      <input type="date" id="end-date" name="end-date" required />
    </div>
  </div>

  <!-- Select Inputs -->
  <div class="form-row">
    <select aria-label="Select reason" required>
      <option value="" disabled selected>Reason *</option>
      <option value="maintenance">Maintenance</option>
      <option value="holiday">Holiday</option>
      <option value="private-event">Private Event</option>
      <option value="other">Other</option>
    </select>

    <select aria-label="Select rooms" required>
      <option value="" disabled selected>Affected Rooms *</option>
      <option value="all">All Rooms</option>
      <option value="room-101">Room 101</option>
      <option value="room-102">Room 102</option>
      <option value="conference">Conference Room</option>
      <option value="lobby">Lobby</option>
    </select>
  </div>

  <!-- Additional Notes -->
  <textarea aria-label="Additional Notes" placeholder="Add any additional information..."></textarea>

  <!-- Footer Buttons -->
  <div class="modal-footer">
    <button type="button" class="btn-cancel">Cancel</button>
    <button type="submit" class="btn-add">Add Closure</button>
  </div>
</div>

</body>
</html>
