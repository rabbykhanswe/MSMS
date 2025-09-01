
  function showNotification() {
    const notification = document.getElementById('notification');
    notification.classList.remove('hidden');

    setTimeout(() => {
      notification.classList.add('hidden');
    }, 3000); // Hide after 3 seconds
  }
