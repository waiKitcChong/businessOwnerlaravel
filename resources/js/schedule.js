const addBtn = document.querySelector('.add-closure-btn'); // main page button
const overlay = document.getElementById('overlay');
const cancelBtn = document.querySelector('.btn-cancel'); // inside modal

addBtn.addEventListener('click', () => {
  overlay.classList.add('active');
});

cancelBtn.addEventListener('click', () => {
  overlay.classList.remove('active');
});

overlay.addEventListener('click', (e) => {
  if (e.target === overlay) {
    overlay.classList.remove('active');
  }
});

let currentDate = new Date();
let closedDates = [];

async function fetchClosures(roomNo = "") {
  try {
    let url = "/business_owner/closures";
    if (roomNo) url += `?room=${encodeURIComponent(roomNo)}`;

    const response = await fetch(url);
    closedDates = await response.json();
    renderCalendar(currentDate);
  } catch (error) {
    console.error("Error loading closures:", error);
  }
}
function renderCalendar(date) {
  const monthYear = document.getElementById("monthYear");
  const calendarBody = document.getElementById("calendarBody");
  const year = date.getFullYear();
  const month = date.getMonth();
  const today = new Date();

  const monthNames = [
    "January","February","March","April","May","June",
    "July","August","September","October","November","December"
  ];
  monthYear.textContent = `${monthNames[month]} ${year}`;

  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const prevMonthDays = new Date(year, month, 0).getDate();

  let days = [];
  for (let i = firstDay - 1; i >= 0; i--) {
    days.push(`<td class="prev-month">${prevMonthDays - i}</td>`);
  }

  for (let i = 1; i <= daysInMonth; i++) {
    const fullDate = `${year}-${String(month + 1).padStart(2, "0")}-${String(i).padStart(2, "0")}`;
    const isToday = i === today.getDate() && month === today.getMonth() && year === today.getFullYear();
    const isClosed = closedDates.includes(fullDate);

    let classes = "";
    if (isToday) classes += " selected";
    if (isClosed) classes += " closed-day";

    days.push(`<td class="${classes.trim()}">${i}</td>`);
  }

  while (days.length % 7 !== 0) {
    days.push(`<td class="prev-month"></td>`);
  }

  let rows = "";
  for (let i = 0; i < days.length; i += 7) {
    rows += `<tr>${days.slice(i, i + 7).join("")}</tr>`;
  }

  calendarBody.innerHTML = rows;
}

document.getElementById("prevMonth").addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  renderCalendar(currentDate);
});
document.getElementById("nextMonth").addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  renderCalendar(currentDate);
});

document.getElementById("roomSelect").addEventListener("change", (e) => {
  const selectedRoom = e.target.value;
  fetchClosures(selectedRoom);
});

fetchClosures();

async function loadRoomsToSelect(selectId) {
  try {
    const response = await fetch('/business_owner/rooms_id');
    const rooms = await response.json();
    const select = document.getElementById(selectId);

    select.innerHTML = '<option value="">Select Room</option>';

    rooms.forEach(r => {
      const opt = document.createElement('option');
      opt.value = r.RoomNo;
      opt.textContent = r.RoomNumber;
      select.appendChild(opt);
    });
  } catch (error) {
    console.error('Error loading rooms:', error);
  }
}

loadRoomsToSelect('roomSelect');
loadRoomsToSelect('roomSelect2');

 document.addEventListener("DOMContentLoaded", function() {
    const searchField = document.getElementById("roomSearchField");
    const closureItems = document.querySelectorAll(".closure-item");

    searchField.addEventListener("input", function() {
      const term = searchField.value.trim().toLowerCase();

      closureItems.forEach(item => {
        const roomText = item.querySelector(".closure-room")?.textContent.toLowerCase() || "";

        if (roomText.includes(term)) {
          item.style.display = "";
        } else {
          item.style.display = "none";
        }
      });
    });
  });


  document.addEventListener("DOMContentLoaded", function() {
  const buttons = document.querySelectorAll(".delete-btn");

  buttons.forEach(btn => {
    btn.addEventListener("click", function() {
      const scheduleId = this.dataset.id;
      const itemElement = this.closest(".closure-item");

      if (!confirm("Are you sure you want to delete this schedule?")) return;

      fetch(`/business_owner/schedule/delete/${scheduleId}`, {
        method: "DELETE",
        headers: {
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
          "Accept": "application/json"
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          itemElement.style.transition = "opacity 0.4s ease";
          itemElement.style.opacity = "0";
          setTimeout(() => itemElement.remove(), 400);
        } else {
          alert("Failed to delete schedule: " + data.message);
        }
      })
      .catch(err => {
        console.error("AJAX delete error:", err);
        alert("Something went wrong while deleting!");
      });
    });
  });
});