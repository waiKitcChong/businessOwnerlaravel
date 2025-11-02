
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



 const stfModal = document.getElementById('stfModal_overlay');
    const stfModalOpen = document.getElementById('stfModal_openBtn');
    const stfModalEdit = stfModal.querySelector('.stfModal_edit');
    const stfModalSave = stfModal.querySelector('.stfModal_save');
    const stfModalClose = stfModal.querySelector('.stfModal_close');
    const stfModalInputs = stfModal.querySelectorAll('.stfModal_editable');
    const stfModalForm = document.getElementById('stfModal_form');

    stfModalOpen.addEventListener('click', () => {
        stfModal.classList.add('stfModal_active');
    });

    stfModalClose.addEventListener('click', () => {
        stfModal.classList.remove('stfModal_active');
        stfModalInputs.forEach(input => input.setAttribute('readonly', true));
        stfModalSave.style.display = 'none';
        stfModalEdit.style.display = 'inline-block';
    });

    stfModalEdit.addEventListener('click', () => {
        stfModalInputs.forEach(input => input.removeAttribute('readonly'));
        stfModalEdit.style.display = 'none';
        stfModalSave.style.display = 'inline-block';
    });

    stfModalForm.addEventListener('submit', e => {
        e.preventDefault();
        stfModalInputs.forEach(input => input.setAttribute('readonly', true));
        stfModalSave.style.display = 'none';
        stfModalEdit.style.display = 'inline-block';
        alert('Staff details updated!');
    });
