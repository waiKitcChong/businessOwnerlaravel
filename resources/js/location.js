const openBtn = document.querySelector('.btn-add-location');
  const overlay = document.getElementById('modalOverlay');
  const closeBtn = document.querySelector('.close-button');
  const cancelBtn = document.querySelector('.cancel');

  openBtn.addEventListener('click', () => {
    overlay.classList.add('active');
  });

  closeBtn.addEventListener('click', () => {
    overlay.classList.remove('active');
  });

  cancelBtn.addEventListener('click', () => {
    overlay.classList.remove('active');
  });

  // Close when clicking outside modal
  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) {
      overlay.classList.remove('active');
    }
  });