<style>
  * {
    box-sizing: border-box;
  }


  .open-modal-btn {
    background-color: #3b82f6;
    border: none;
    border-radius: 8px;
    font-weight: 500;
    font-size: 14px;
    color: white;
    padding: 10px 18px;
    cursor: pointer;
    transition: background-color 0.2s ease;
    margin-bottom: 20px;
  }

  .open-modal-btn:hover {
    background-color: #2563eb;
  }


  .overlay {
    display: flex;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 99;
    justify-content: center;
    align-items: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
  }

  .overlay.active {
    opacity: 1;
    pointer-events: auto;
  }


  .modal {
    background-color: #f5f8fc;
    border-radius: 12px;
    width: 320px;
    padding: 24px 24px 32px 24px;
    box-shadow: 0 0 12px rgb(0 0 0 / 0.15);
    position: relative;
    transform: scale(0.8);
    opacity: 0;
    transition: all 0.3s ease;
  }

  .overlay.active .modal {
    transform: scale(1);
    opacity: 1;
  }

  .modal-header {
    margin-bottom: 8px;
  }

  .modal-header h2 {
    font-weight: 600;
    font-size: 15px;
    line-height: 20px;
    color: #0f172a;
    margin: 0;
  }

  .modal-header p {
    font-weight: 400;
    font-size: 12px;
    line-height: 16px;
    color: #94a3b8;
    margin: 4px 0 0 0;
  }

  .close-btn {
    position: absolute;
    top: 16px;
    right: 16px;
    font-size: 16px;
    color: #94a3b8;
    cursor: pointer;
    user-select: none;
    border: none;
    background: none;
    padding: 0;
    line-height: 1;
  }

  .form-group {
    margin-top: 16px;
  }

  label {
    display: block;
    font-weight: 600;
    font-size: 12px;
    line-height: 16px;
    color: #0f172a;
    margin-bottom: 6px;
  }

  input[type="text"],
  input[type="email"],
  select {
    width: 100%;
    height: 36px;
    padding: 8px 12px;
    font-size: 13px;
    line-height: 18px;
    color: #475569;
    background-color: #f5f8fc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    outline-offset: 2px;
    outline-color: transparent;
    transition: outline-color 0.2s ease;
  }

  input[type="text"]::placeholder,
  input[type="email"]::placeholder {
    color: #94a3b8;
  }

  input[type="text"]:focus,
  input[type="email"]:focus,
  select:focus {
    outline-color: #3b82f6;
  }

  select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg fill='none' stroke='%2394a3b8' stroke-width='2' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'%3e%3c/path%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 16px 16px;
    cursor: pointer;
  }

  .modal-footer {
    margin-top: 24px;
    display: flex;
    justify-content: flex-end;
    gap: 12px;
  }

  .btn-cancel {
    background-color: transparent;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-weight: 400;
    font-size: 13px;
    line-height: 18px;
    color: #475569;
    padding: 8px 16px;
    cursor: pointer;
    transition: background-color 0.2s ease;
  }

  .btn-cancel:hover {
    background-color: #e2e8f0;
  }

  .btn-submit {
    background-color: #3b82f6;
    border: none;
    border-radius: 8px;
    font-weight: 500;
    font-size: 13px;
    line-height: 18px;
    color: white;
    padding: 8px 16px;
    cursor: pointer;
    transition: background-color 0.2s ease;
  }

  .btn-submit:hover {
    background-color: #2563eb;
  }

  @media (max-width: 360px) {
    .modal {
      width: 90vw;
      padding: 20px 20px 28px 20px;
    }
  }
</style>

<div class="overlay" id="overlay">
  <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle" aria-describedby="modalDesc">
    <button class="close-btn" aria-label="Close modal" type="button" id="closeBtn">×</button>
    <div class="modal-header">
      <h2 id="modalTitle">Add New Staff Member</h2>
      <p id="modalDesc">Add a new team member to your hotel staff.</p>
    </div>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ url('business_owner/staff/store') }}" method="POST">
  @csrf
  <input type="hidden" name="owner_id" value="{{ $ownerId }}">

  <div class="form-group">
    <label for="fullName">Full Name</label>
    <input id="fullName" name="staff_name" type="text" value="{{ old('staff_name') }}" placeholder="Enter full name" required />
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Enter email" required />
  </div>

  <div class="form-group">
    <label for="contact_number">Contact Number</label>
    <input id="contact_number" name="contact_number" type="text" value="{{ old('contact_number') }}" placeholder="01x-xxxxxxx" required />
  </div>

  <div class="form-group">
    <label for="IC">IC Number</label>
    <input id="IC" name="IC" type="text" value="{{ old('IC') }}" placeholder="12-digit IC" required />
  </div>

  <div class="form-group">
    <label for="country">Country</label>
    <input id="country" name="country" type="text" value="{{ old('country') }}" placeholder="Enter country" required />
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <textarea id="address" name="address" placeholder="Enter address" required>{{ old('address') }}</textarea>
  </div>

  <div class="form-group">
    <label for="department">Department</label>
    <select id="department" name="department" required>
      <option value="" disabled {{ old('department') ? '' : 'selected' }}>Select department</option>
      <option value="frontdesk" {{ old('department') == 'frontdesk' ? 'selected' : '' }}>Front Desk</option>
      <option value="housekeeping" {{ old('department') == 'housekeeping' ? 'selected' : '' }}>Housekeeping</option>
      <option value="maintenance" {{ old('department') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
      <option value="management" {{ old('department') == 'management' ? 'selected' : '' }}>Management</option>
    </select>
  </div>

  <div class="modal-footer">
    <button type="button" id="cancelBtn">Cancel</button>
    <button type="submit" class="btn-submit">Add Staff Member</button>
  </div>
</form>


  </div>
</div>