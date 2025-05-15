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
  
  <style>
    .no-news-container {
      padding: 100px 0;
      text-align: center;
    }
    
    .no-news-icon {
      font-size: 5rem;
      color: #6c757d;
      margin-bottom: 20px;
    }
    
    .no-news-title {
      font-family: 'Orbitron', sans-serif;
      font-weight: 700;
      margin-bottom: 20px;
    }
    
    .no-news-message {
      font-size: 1.2rem;
      color: #6c757d;
      max-width: 600px;
      margin: 0 auto 30px;
    }
    
    .return-button {
      padding: 10px 30px;
      text-transform: uppercase;
      font-weight: 600;
    }
  </style>
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
          <input type="text" class="form-control" placeholder="Search news...">
          <button class="btn btn-dark" type="button"><i class="bi bi-search"></i></button>
        </div>
      </div>
    </div>
  </div>

  <!-- No More News Container -->
  <div class="container">
    <div class="no-news-container">
      <i class="bi bi-clock-history no-news-icon"></i>
      <h2 class="no-news-title">NO MORE NEWS AVAILABLE</h2>
      <p class="no-news-message">You've reached the end of our news archive. Subscribe to our newsletter to be the first to know when we post new articles about product launches, store openings, and upcoming events!</p>
      <a href="News.php" class="btn btn-primary return-button">Return to News</a>
    </div>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center my-5">
    <nav aria-label="News pagination">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="News-page2.php">Previous</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="News.php">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="News-page2.php">2</a>
        </li>
        <li class="page-item active" aria-current="page">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
        </li>
      </ul>
    </nav>
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
  </script>
</body>
</html>