<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Edit Room - TripMate Hotel Manager</title>
<style>
  body {
    font-family: 'Inter', sans-serif;
    background-color: #f8fafc;
    margin: 0;
    padding: 0;
  }

  main {
    margin: 27px auto;
    max-width: 900px;
    padding: 0 20px;
  }

  h2 {
    text-align: center;
    color: #1e293b;
    margin-bottom: 30px;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 18px;
  }

  .form-group {
    display: flex;
    flex-direction: column;
  }

  label {
    font-weight: 600;
    color: #334155;
    margin-bottom: 6px;
  }

  input, select, textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    font-size: 14px;
    background-color: #fff;
  }

  textarea {
    height: 100px;
  }

  .amenities {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 12px 24px;
}

.amenities label {
  display: inline-flex;
  align-items: center;
  line-height: 1.4;
  font-size: 14px;
  color: #475569;
  white-space: nowrap;
}

.amenities input[type="checkbox"] {
  margin-right: 8px;
  width: 16px;
  height: 16px;
  accent-color: #2563eb;
  flex-shrink: 0;
}

  .btns {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
  }

  .btns button {
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    font-size: 15px;
  }

  .btn-cancel {
    background-color: #e2e8f0;
    color: #334155;
  }

  .btn-save {
    background-color: #2563eb;
    color: white;
  }
</style>

</head>
<body>
<main>
  <h2>Edit Room #{{ $room['RoomNumber'] }}</h2>
  <form action="{{ route('owner.room.update', ['roomNo' => $room['RoomNo']]) }}" method="POST">
    @csrf

    <div class="form-group">
      <label>Room Number</label>
      <input type="text" name="room-number" value="{{ $room['RoomNumber'] }}" />
    </div>

    <div class="form-group">
      <label>Room Type</label>
      <select name="room-type">
        @php
          $roomTypes = ['Standard', 'Deluxe', 'Suite', 'Family', 'Executive'];
        @endphp
        @foreach($roomTypes as $type)
          <option value="{{ $type }}" {{ $room['RoomType']['type_name'] == $type ? 'selected' : '' }}>
            {{ $type }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label>Bed Type</label>
      <select name="bed-type">
        @php
          $bedTypes = ['Single', 'Double', 'Queen', 'King', 'Twin'];
        @endphp
        @foreach($bedTypes as $bed)
          <option value="{{ $bed }}" {{ $room['RoomType']['bedType'] == $bed ? 'selected' : '' }}>
            {{ $bed }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label>Floor</label>
      <input type="number" name="floor" value="{{ $room['floor'] }}" />
    </div>

    <div class="form-group">
      <label>Capacity</label>
      <input type="number" name="capacity" value="{{ $room['capacity'] }}" />
    </div>

    <div class="form-group">
      <label>Size (m²)</label>
      <input type="number" name="size" value="{{ $room['size'] }}" />
    </div>

    <div class="form-group">
      <label>Price per Night</label>
      <input type="number" name="price" value="{{ $room['RoomType']['RoomPrice'] }}" />
    </div>

    <div class="form-group">
      <label>Amenities</label>
      <div class="amenities">
        @php
          $allAmenities = ['wifi','tv','air-conditioning','mini-bar','ocean-view','balcony','kitchenette','living-area','work-desk','safe','room-service','jacuzzi'];
        @endphp
        @foreach($allAmenities as $a)
          <label><input type="checkbox" name="amenities[]" value="{{ $a }}" {{ in_array($a, $room['amenities']) ? 'checked' : '' }}> {{ ucfirst(str_replace('-', ' ', $a)) }}</label>
        @endforeach
      </div>
    </div>

    <div class="form-group">
      <label>Description</label>
      <textarea name="description">{{ $room['RoomType']['RoomDesc'] }}</textarea>
    </div>

    <div class="btns">
      <button type="button" class="btn-cancel" onclick="window.history.back()">Cancel</button>
      <button type="submit" class="btn-save">Save Changes</button>
    </div>
  </form>
</main>

</body>
</html>
