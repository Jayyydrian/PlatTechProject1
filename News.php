
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>News - ST Moto & Gear</title>

  <!-- CSS -->
  <link rel="stylesheet" href="News.css" />

  <!-- Include your existing CSS files here -->
  <link rel="stylesheet" href="./includes/footer.css">
  <link rel="stylesheet" href="./includes/navbar.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
</head>
<body>

  <div id="navbar"></div>

  <!-- News Header Banner -->
  <div class="news-banner">
    <div class="container">
      <h1 class="news-banner-title">Latest News & Events</h1>
      <p class="news-banner-subtitle">Stay updated with ST Moto & Gear</p>
    </div>
  </div>

  <!-- News Filter Section -->
  <div class="container my-4">
    <div class="filter-section d-flex justify-content-between align-items-center flex-wrap mb-4">
      <div class="news-categories">
        <button class="btn btn-outline-dark active me-2 mb-2" data-category="all">All</button>
        <button class="btn btn-outline-dark me-2 mb-2" data-category="event">Events</button>
        <button class="btn btn-outline-dark me-2 mb-2" data-category="product">Product Updates</button>
        <button class="btn btn-outline-dark me-2 mb-2" data-category="store">Store News</button>
      </div>
      <div class="news-search mb-2">
        <div class="input-group">
          <input type="text" id="news-search-input" class="form-control" placeholder="Search news...">
          <button class="btn btn-dark" id="news-search-btn" type="button"><i class="bi bi-search"></i></button>
        </div>
      </div>
    </div>
  </div>

  <!-- Featured News Article -->
  <div class="container mb-5">
    <div class="featured-news news-item" data-category="event">
      <div class="row">
        <div class="col-lg-8">
          <img src="Assets/News/future.jpg" alt="Featured News" class="img-fluid rounded featured-image">
        </div>
        <div class="col-lg-4 d-flex flex-column justify-content-center">
          <span class="news-category text-primary mb-2">EVENT</span>
          <h2 class="featured-title">RIDER SAFETY GEAR TECHNOLOGY SHOWCASE</h2>
          <p class="news-date mb-2"><i class="bi bi-calendar-event me-2"></i>April 4, 2024</p>
          <p class="featured-excerpt">Experience firsthand the latest rider safety gear technology with premium quality products and innovative features. Join us for live demonstrations, expert talks, and exclusive discounts on cutting-edge safety equipment.</p>
          <a href="news-detail.php?id=1" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
  </div>

  <!-- News Grid -->
  <div class="container">
    <div class="row" id="news-grid">
      <!-- News Item 1 (Already featured above, including here for completeness) -->
      <div class="col-md-4 mb-4 news-item" data-category="event">
        <div class="news-card h-100">
          <a href="news-detail.php?id=1" class="text-decoration-none text-dark">
            <div class="news-img-container mb-3">
              <img src="Assets/News/future.jpg" alt="News 1" class="img-fluid w-100 rounded">
              <span class="news-badge bg-primary">EVENT</span>
            </div>
            <h5 class="news-title text-uppercase fw-bold">RIDER SAFETY GEAR TECHNOLOGY SHOWCASE</h5>
            <p class="news-excerpt">Experience firsthand the latest rider safety gear technology with premium quality products and innovative features.</p>
            <div class="news-meta d-flex justify-content-between align-items-center">
              <p class="news-date small text-muted mb-0"><i class="bi bi-calendar-event me-1"></i>April 4, 2024</p>
              <span class="read-more">Read More <i class="bi bi-arrow-right"></i></span>
            </div>
          </a>
        </div>
      </div>
      
      <!-- News Item 2 -->
      <div class="col-md-4 mb-4 news-item" data-category="product">
        <div class="news-card h-100">
          <a href="news-detail.php?id=2" class="text-decoration-none text-dark">
            <div class="news-img-container mb-3">
              <img src="Assets/News/ls2 news.jpg" alt="News 2" class="img-fluid w-100 rounded">
              <span class="news-badge bg-success">PRODUCT</span>
            </div>
            <h5 class="news-title text-uppercase fw-bold">RIDE SMART, LEVEL UP WITH LS2</h5>
            <p class="news-excerpt">Built on a foundation of safety, innovation, and style - LS2's Brand Pillars define quality motorcycle helmets and accessories.</p>
            <div class="news-meta d-flex justify-content-between align-items-center">
              <p class="news-date small text-muted mb-0"><i class="bi bi-calendar-event me-1"></i>November 14, 2023</p>
              <span class="read-more">Read More <i class="bi bi-arrow-right"></i></span>
            </div>
          </a>
        </div>
      </div>
      
      <!-- News Item 3 -->
      <div class="col-md-4 mb-4 news-item" data-category="store">
        <div class="news-card h-100">
          <a href="news-detail.php?id=3" class="text-decoration-none text-dark">
            <div class="news-img-container mb-3">
              <img src="Assets/News/shop.jpg" alt="News 3" class="img-fluid w-100 rounded">
              <span class="news-badge bg-warning text-dark">STORE</span>
            </div>
            <h5 class="news-title text-uppercase fw-bold">ST MOTO CEBU GRAND UPGRADE</h5>
            <p class="news-excerpt">Rev up your riding experience. We've moved to a bigger and better store location, a leading concept store for all your motorcycle needs.</p>
            <div class="news-meta d-flex justify-content-between align-items-center">
              <p class="news-date small text-muted mb-0"><i class="bi bi-calendar-event me-1"></i>October 27, 2023</p>
              <span class="read-more">Read More <i class="bi bi-arrow-right"></i></span>
            </div>
          </a>
        </div>
      </div>
      
      <!-- Additional News Items -->
      <div class="col-md-4 mb-4 news-item" data-category="event">
        <div class="news-card h-100">
          <a href="news-detail.php?id=4" class="text-decoration-none text-dark">
            <div class="news-img-container mb-3">
              <img src="./Assets/News/safetyawareness.png" alt="News 4" class="img-fluid w-100 rounded">
              <span class="news-badge bg-primary">EVENT</span>
            </div>
            <h5 class="news-title text-uppercase fw-bold">HELMET SAFETY AWARENESS CAMPAIGN</h5>
            <p class="news-excerpt">Join our community event focused on promoting proper helmet usage and safety practices for all riders.</p>
            <div class="news-meta d-flex justify-content-between align-items-center">
              <p class="news-date small text-muted mb-0"><i class="bi bi-calendar-event me-1"></i>March 15, 2024</p>
              <span class="read-more">Read More <i class="bi bi-arrow-right"></i></span>
            </div>
          </a>
        </div>
      </div>
      
      <div class="col-md-4 mb-4 news-item" data-category="product">
        <div class="news-card h-100">
          <a href="news-detail.php?id=5" class="text-decoration-none text-dark">
            <div class="news-img-container mb-3">
              <img src="./Assets/News/summerriding.jpg" alt="News 5" class="img-fluid w-100 rounded">
              <span class="news-badge bg-success">PRODUCT</span>
            </div>
            <h5 class="news-title text-uppercase fw-bold">SUMMER RIDING COLLECTION LAUNCH</h5>
            <p class="news-excerpt">Discover our new summer collection featuring breathable gear and UV protection designed for hot weather riding.</p>
            <div class="news-meta d-flex justify-content-between align-items-center">
              <p class="news-date small text-muted mb-0"><i class="bi bi-calendar-event me-1"></i>February 28, 2024</p>
              <span class="read-more">Read More <i class="bi bi-arrow-right"></i></span>
            </div>
          </a>
        </div>
      </div>
      
      <div class="col-md-4 mb-4 news-item" data-category="store">
        <div class="news-card h-100">
          <a href="news-detail.php?id=6" class="text-decoration-none text-dark">
            <div class="news-img-container mb-3">
              <img src="./Assets/News/newbranch.jpg" alt="News 6" class="img-fluid w-100 rounded">
              <span class="news-badge bg-warning text-dark">STORE</span>
            </div>
            <h5 class="news-title text-uppercase fw-bold">NEW MANILA BRANCH OPENING SOON</h5>
            <p class="news-excerpt">We're expanding! ST Moto & Gear announces new flagship store opening in Manila next month with special launch offers.</p>
            <div class="news-meta d-flex justify-content-between align-items-center">
              <p class="news-date small text-muted mb-0"><i class="bi bi-calendar-event me-1"></i>January 10, 2024</p>
              <span class="read-more">Read More <i class="bi bi-arrow-right"></i></span>
            </div>
          </a>
        </div>
      </div>
    </div>
    
    <!-- No Results Message -->
    <div id="no-results" class="text-center py-5 d-none">
      <i class="bi bi-search fs-1 text-muted"></i>
      <h3 class="mt-3">No Results Found</h3>
      <p class="text-muted">We couldn't find any news matching your search criteria.</p>
      <button class="btn btn-outline-dark mt-2" id="reset-filters">Reset Filters</button>
    </div>
    
    <!-- Pagination -->
    <div class="d-flex justify-content-center my-5">
      <nav aria-label="News pagination">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="News-page2.php">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="News-page3.php">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="News-page2.php">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <!-- Newsletter Subscription -->
  <div class="container-fluid bg-light py-5 my-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          <h3>Subscribe to Our Newsletter</h3>
          <p class="mb-4">Stay updated with the latest news, events, and exclusive offers from ST Moto & Gear.</p>
          <div class="input-group mb-3 w-75 mx-auto">
            <input type="email" class="form-control" placeholder="Your email address">
            <button class="btn btn-dark" type="button">Subscribe</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="back-to-top">
    <a href="#top">Back to top</a>
  </div>

  <div id="footer"></div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Load the navbar
    fetch('./includes/navbar.php')
      .then(res => res.text())
      .then(data => document.getElementById('navbar').innerHTML = data);

    // Load the footer
    fetch('./includes/footer.php')
      .then(res => res.text())
      .then(data => document.getElementById('footer').innerHTML = data);
      
    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
      // Get all category buttons
      const categoryButtons = document.querySelectorAll('.news-categories button');
      const newsItems = document.querySelectorAll('.news-item');
      const noResultsElement = document.getElementById('no-results');
      const searchInput = document.getElementById('news-search-input');
      const searchButton = document.getElementById('news-search-btn');
      const resetButton = document.getElementById('reset-filters');
      
      // Set active category and store in session
      function setActiveCategory(category) {
        // Remove active class from all buttons
        categoryButtons.forEach(button => {
          button.classList.remove('active');
        });
        
        // Add active class to clicked button
        document.querySelector(`[data-category="${category}"]`).classList.add('active');
        
        // Store category in session storage
        sessionStorage.setItem('newsCategory', category);
        
        // Apply filter
        filterNews();
      }
      
      // Filter news items
      function filterNews() {
        const activeCategory = sessionStorage.getItem('newsCategory') || 'all';
        const searchQuery = searchInput.value.toLowerCase().trim();
        
        let visibleCount = 0;
        
        newsItems.forEach(item => {
          const itemCategory = item.getAttribute('data-category');
          const itemTitle = item.querySelector('.news-title').textContent.toLowerCase();
          const itemExcerpt = item.querySelector('.news-excerpt').textContent.toLowerCase();
          
          const matchesCategory = activeCategory === 'all' || itemCategory === activeCategory;
          const matchesSearch = searchQuery === '' || 
                               itemTitle.includes(searchQuery) || 
                               itemExcerpt.includes(searchQuery);
          
          if (matchesCategory && matchesSearch) {
            item.style.display = '';
            visibleCount++;
          } else {
            item.style.display = 'none';
          }
        });
        
        // Show/hide no results message
        if (visibleCount === 0) {
          noResultsElement.classList.remove('d-none');
        } else {
          noResultsElement.classList.add('d-none');
        }
      }
      
      // Event listeners for category buttons
      categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
          const category = this.getAttribute('data-category');
          setActiveCategory(category);
        });
      });
      
      // Event listener for search
      searchButton.addEventListener('click', filterNews);
      searchInput.addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
          filterNews();
        }
      });
      
      // Reset filters
      resetButton.addEventListener('click', function() {
        searchInput.value = '';
        setActiveCategory('all');
      });
      
      // Check for stored category on page load
      const storedCategory = sessionStorage.getItem('newsCategory');
      if (storedCategory) {
        setActiveCategory(storedCategory);
      }
    });
  </script>
</body>
</html>