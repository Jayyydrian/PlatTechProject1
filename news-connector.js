
document.addEventListener('DOMContentLoaded', function() {
  // Check if we're on the homepage
  if (document.querySelector('.news-section')) {
    // Find the "View all" link in the news section and update its href
    const viewAllLinks = document.querySelectorAll('.news-section .view-all-link');
    
    viewAllLinks.forEach(link => {
      link.href = 'News.php';
    });
  }
  
  // Check if we're on the News.php page
  if (document.querySelector('.news-categories')) {
    // Add click handlers for the category filter buttons
    const categoryButtons = document.querySelectorAll('.news-categories .btn');
    
    categoryButtons.forEach(button => {
      button.addEventListener('click', function() {
        // Remove active class from all buttons
        categoryButtons.forEach(btn => btn.classList.remove('active'));
        
        // Add active class to clicked button
        this.classList.add('active');
        
        // In a real application, this would filter the news items
        // For this demo, we'll just add a visual indicator
        console.log('Filtering by:', this.textContent.trim());
      });
    });
  }
  
  // Set up search functionality on the News page
  const searchInput = document.querySelector('.news-search input');
  const searchButton = document.querySelector('.news-search button');
  
  if (searchButton) {
    searchButton.addEventListener('click', function() {
      if (searchInput) {
        const searchTerm = searchInput.value.trim();
        if (searchTerm) {
          console.log('Searching for:', searchTerm);
          // In a real application, this would trigger a search
          alert('Searching for: ' + searchTerm);
        }
      }
    });
  }
  
  if (searchInput) {
    searchInput.addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        const searchTerm = this.value.trim();
        if (searchTerm) {
          console.log('Searching for:', searchTerm);
          // In a real application, this would trigger a search
          alert('Searching for: ' + searchTerm);
        }
      }
    });
  }
});