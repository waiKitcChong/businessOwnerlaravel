const modalOverlay = document.querySelector('.modal-overlay');
  const openBtn = document.querySelector('.btn-add-room');
  const closeBtn = document.querySelector('.modal-close');
  const cancelBtn = document.querySelector('.cancel');

  openBtn.addEventListener('click', () => {
    modalOverlay.classList.add('show');
  });

  closeBtn.addEventListener('click', () => {
    modalOverlay.classList.remove('show');
  });

  cancelBtn.addEventListener('click', () => {
    modalOverlay.classList.remove('show');
  });

  // Close modal when clicking outside of it
  modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) {
      modalOverlay.classList.remove('show');
    }
  });