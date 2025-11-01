
<style>
  * { box-sizing: border-box; }

  /* Overlay background */
  .modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.5);
    display: none;
    align-items: center;
    justify-content: center;
    animation: fadeIn 0.3s ease forwards;
    z-index: 1000;
  }

  /* Show overlay when active */
  .modal-overlay.active {
    display: flex;
  }

  /* Animation keyframes */
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  @keyframes slideUp {
    from { opacity: 0; transform: translateY(30px) scale(0.95); }
    to { opacity: 1; transform: translateY(0) scale(1); }
  }

  .modal {
    background: #f8fafc;
    width: 600px;
    max-width: 95vw;
    max-height: 90vh;
    border-radius: 8px;
    padding: 24px 24px 32px 24px;
    overflow-y: auto;
    color: #1f2937;
    position: relative;
    box-shadow: 0 0 12px rgb(0 0 0 / 0.5);
    animation: slideUp 0.35s ease forwards;
  }

  /* Scrollbar styling */
  .modal::-webkit-scrollbar { width: 8px; }
  .modal::-webkit-scrollbar-thumb {
    background-color: #cbd5e1;
    border-radius: 4px;
  }

  /* Header */
  .modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 4px;
  }
  .modal-header h2 {
    font-weight: 600;
    font-size: 16px;
    margin: 0;
    color: #111827;
  }
  .modal-header button.close-btn {
    background: transparent;
    border: none;
    font-size: 16px;
    color: #6b7280;
    cursor: pointer;
  }
  .modal-header button.close-btn:hover { color: #111827; }

  .modal-subtitle {
    font-size: 14px;
    color: #475569;
    margin-bottom: 20px;
  }

  /* Inputs */
  label {
    font-weight: 500;
    font-size: 13px;
    color: #475569;
    display: block;
    margin-bottom: 6px;
  }
  input, select, textarea {
    width: 100%;
    font-family: inherit;
    font-size: 14px;
    color: #475569;
    background: #f1f5f9;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    padding: 10px 12px;
    transition: background 0.2s ease, outline-color 0.2s ease;
  }
  input:focus, select:focus, textarea:focus {
    outline: 2px solid #3b82f6;
    background: #fff;
  }
  textarea { resize: vertical; min-height: 72px; }

  /* Layout rows */
  .row { display: flex; gap: 16px; margin-bottom: 16px; }
  .row.half > div:first-child { max-width: 60%; }
  .row.half > div:last-child { max-width: 40%; }

  /* Buttons */
  .btn-generate {
    background: #f1f5f9;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    padding: 10px 16px;
    cursor: pointer;
  }
  .btn-generate:hover { background: #e2e8f0; }

  /* Toggle switches */
  .toggles-container {
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    padding: 12px 16px;
    display: flex;
    flex-wrap: wrap;
    gap: 12px 24px;
  }
  .toggle-item { display: flex; align-items: center; gap: 8px; flex: 1 1 45%; }
  .switch { position: relative; display: inline-block; width: 36px; height: 20px; }
  .switch input { opacity: 0; width: 0; height: 0; }
  .slider {
    position: absolute; top: 0; left: 0; right: 0; bottom: 0;
    background-color: #e2e8f0; border-radius: 9999px;
    transition: 0.2s;
  }
  .slider:before {
    content: "";
    position: absolute;
    height: 16px; width: 16px;
    left: 2px; bottom: 2px;
    background-color: white;
    border-radius: 50%;
    transition: 0.2s;
  }
  input:checked + .slider { background-color: #3b82f6; }
  input:checked + .slider:before { transform: translateX(16px); }

  /* Footer */
  .modal-footer {
    margin-top: 24px;
    display: flex;
    justify-content: flex-end;
    gap: 12px;
  }
  .btn-cancel {
    background: transparent;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    padding: 8px 16px;
    cursor: pointer;
  }
  .btn-cancel:hover { background: #e2e8f0; }
  .btn-submit {
    background-color: #3b82f6;
    border: none;
    border-radius: 8px;
    padding: 8px 16px;
    color: white;
    cursor: pointer;
  }
  .btn-submit:hover { background-color: #2563eb; }

  /* Responsive */
  @media (max-width: 480px) {
    .row { flex-direction: column; }
    .row.half > div { max-width: 100% !important; }
  }
</style>
</head>
<body>


<!-- Modal Overlay -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <div class="modal-header">
      <h2 id="modalTitle">Create New Promotion</h2>
      <button class="close-btn" aria-label="Close modal"><i class="fas fa-times"></i></button>
    </div>
    <p class="modal-subtitle">Create an attractive promotional offer for your guests.</p>

    <form>
      <label for="promotionTitle">Promotion Title</label>
      <input type="text" id="promotionTitle" name="promotionTitle" placeholder="e.g., Early Bird Special" />

      <label for="description" style="margin-top:16px;">Description</label>
      <textarea id="description" name="description" placeholder="Describe the promotion details"></textarea>

      <div class="row half" style="margin-top:16px;">
        <div>
          <label for="promotionType">Promotion Type</label>
          <select id="promotionType" name="promotionType">
            <option>Percentage Discount</option>
            <option>Fixed Amount Discount</option>
            <option>Buy One Get One</option>
          </select>
        </div>
        <div>
          <label for="discountPercent">Discount %</label>
          <input type="number" id="discountPercent" name="discountPercent" min="0" value="0" />
        </div>
      </div>

      <div class="row half" style="margin-top:16px;">
        <div>
          <label for="startDate">Start Date</label>
          <input type="date" id="startDate" name="startDate" />
        </div>
        <div>
          <label for="endDate">End Date</label>
          <input type="date" id="endDate" name="endDate" />
        </div>
      </div>

      <div class="row half" style="margin-top:16px; align-items:center;">
        <div style="flex: 1 1 auto; max-width: 60%;">
          <label for="promotionCode">Promotion Code</label>
          <input type="text" id="promotionCode" name="promotionCode" value="PROMO20" />
        </div>
        <div style="flex: none; margin-left: 12px; margin-top: 24px;">
          <button type="button" class="btn-generate">Generate</button>
        </div>
      </div>

      <div class="row half" style="margin-top:16px;">
        <div>
          <label for="priority">Priority</label>
          <input type="number" id="priority" name="priority" value="1" min="1" />
        </div>
      </div>

      <div class="row half" style="margin-top:16px;">
        <div>
          <label for="minimumStay">Minimum Stay (nights)</label>
          <input type="number" id="minimumStay" name="minimumStay" value="1" min="1" />
        </div>
        <div>
          <label for="maximumUses">Maximum Uses</label>
          <input type="number" id="maximumUses" name="maximumUses" value="100" min="1" />
        </div>
      </div>

      <label style="margin-top:16px;">Applicable Room Types</label>
      <div class="toggles-container">
        <div class="toggle-item">
          <label class="switch">
            <input type="checkbox" />
            <span class="slider"></span>
          </label>
          <span>Standard</span>
        </div>
        <div class="toggle-item">
          <label class="switch">
            <input type="checkbox" />
            <span class="slider"></span>
          </label>
          <span>Deluxe</span>
        </div>
        <div class="toggle-item">
          <label class="switch">
            <input type="checkbox" />
            <span class="slider"></span>
          </label>
          <span>Suite</span>
        </div>
        <div class="toggle-item">
          <label class="switch">
            <input type="checkbox" />
            <span class="slider"></span>
          </label>
          <span>Presidential</span>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn-cancel" id="cancelBtn">Cancel</button>
        <button type="submit" class="btn-submit">Create Promotion</button>
      </div>
    </form>
  </div>
</div>
