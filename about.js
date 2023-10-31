document.addEventListener('DOMContentLoaded', function(){
// Function to toggle display between full view and normal view
function toggleProfileView(container) {
  if (container.classList.contains('fullProfileView')) {
    // If it's in full view, go back to normal view
    container.classList.remove('fullProfileView');
    container.style.height = '400px'; // Reset the height to auto
  } else {
    // If it's in normal view or was clicked again in full view, display in full view
    container.classList.add('fullProfileView');
    container.style.height = '100%'; // Set the height to 100%
  }

  // Disable hover effect for all profile containers in full view
  const isFullView = container.classList.contains('fullProfileView');
  const profileContainers = document.querySelectorAll('.profileContainer');
  profileContainers.forEach((profile) => {
    if (profile !== container) {
      profile.style.pointerEvents = isFullView ? 'none' : 'auto';
    }
  });
}

// Add click event listeners to profile containers
const profileContainers = document.querySelectorAll('.profileContainer');
profileContainers.forEach((container) => {
  container.addEventListener('click', () => {
    toggleProfileView(container);
  });
});




});  