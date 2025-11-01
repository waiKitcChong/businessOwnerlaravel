
  const openBtn = document.querySelector('.btn-add');
  const overlay = document.getElementById('overlay');
  const closeBtn = document.getElementById('closeBtn');
  const cancelBtn = document.getElementById('cancelBtn');

  openBtn.addEventListener('click', () => {
    overlay.classList.add('active');
  });

  closeBtn.addEventListener('click', () => {
    overlay.classList.remove('active');
  });

  cancelBtn.addEventListener('click', () => {
    overlay.classList.remove('active');
  });

  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) {
      overlay.classList.remove('active');
    }
  });


document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".btn-action");

  buttons.forEach((btn) => {
    btn.addEventListener("click", async () => {
      const userId = btn.dataset.userId;
      const currentStatus = btn.dataset.status;
      const newStatus = currentStatus === "active" ? "inactive" : "active";

      // Change UI immediately for responsiveness
      btn.textContent = newStatus === "active" ? "Deactivate" : "Activate";
      btn.dataset.status = newStatus;

      const statusBadge = btn.closest("tr").querySelector(".status-badge");
      statusBadge.textContent = newStatus;
      statusBadge.className = `status-badge ${newStatus}`;

      const payload = { status: newStatus };

      try {
        const response = await fetch(`https://tripmate-service-3.onrender.com/update/User/${userId}`, {
          method: "PUT",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(payload),
        });

        const result = await response.json();

        if (response.ok && result.status === "success") {
          console.log("Status updated successfully:", result.data);
        } else {
          console.error("Failed to update:", result.message);
          alert("Failed to update staff status.");
        }
      } catch (error) {
        console.error("⚠️ Error updating staff:", error);
        alert("Network error while updating staff status.");
      }
    });
  });
});
