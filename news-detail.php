<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>News Detail - ST Moto & Gear</title>

  <!-- CSS -->
  <link rel="stylesheet" href="News.css" />
  <link rel="stylesheet" href="News-detail.css" />

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

  <div class="container my-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="News.php">News</a></li>
        <li class="breadcrumb-item active" aria-current="page" id="article-title-breadcrumb">News Article</li>
      </ol>
    </nav>
    
    <div class="news-detail-content">
      <div class="news-header mb-4">
        <span class="article-category mb-2" id="article-category">EVENT</span>
        <h1 class="article-title mb-3" id="article-title">RIDER SAFETY GEAR TECHNOLOGY SHOWCASE</h1>
        <div class="article-meta d-flex align-items-center mb-4">
          <div class="me-4">
            <i class="bi bi-calendar-event me-2"></i>
            <span id="article-date">April 4, 2024</span>
          </div>
          <div class="me-4">
            <i class="bi bi-person-circle me-2"></i>
            <span>ST Moto & Gear Team</span>
          </div>
          <div class="social-share ms-auto">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-circle me-1"><i class="bi bi-facebook"></i></a>
            <a href="#" class="btn btn-sm btn-outline-dark rounded-circle me-1"><i class="bi bi-twitter"></i></a>
            <a href="#" class="btn btn-sm btn-outline-dark rounded-circle me-1"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="btn btn-sm btn-outline-dark rounded-circle"><i class="bi bi-share"></i></a>
          </div>
        </div>
      </div>
      
      <div class="article-featured-image mb-4">
        <img src="Assets/News/future.jpg" id="article-image" alt="Featured Image" class="img-fluid rounded w-100">
      </div>
      
      <div class="article-content mb-5">
        <p id="article-content-1">Experience firsthand the latest rider safety gear technology with premium quality products and innovative features. Join us for our upcoming Rider Safety Gear Technology Showcase, where we'll be demonstrating the newest advancements in motorcycle safety equipment.</p>
        
        <p>The event will feature live demonstrations of impact-resistant materials, smart helmet technology with heads-up displays, airbag-equipped riding jackets, and advanced communication systems designed to enhance rider safety on the road.</p>
        
        <h2>Event Highlights</h2>
        
        <ul>
          <li><strong>Interactive Demonstrations:</strong> See the latest safety technology in action with crash simulations and impact tests</li>
          <li><strong>Expert Talks:</strong> Hear from industry professionals about the importance of quality safety gear</li>
          <li><strong>Exclusive Discounts:</strong> Special event-only pricing on selected premium safety equipment</li>
          <li><strong>Hands-On Experience:</strong> Try on and test the newest gear innovations</li>
        </ul>
        
        <p>Our team of experts will be available throughout the event to provide personalized advice on selecting the right safety gear for your specific riding needs. Whether you're a daily commuter or a weekend warrior, ensuring you have the proper protection is essential for every ride.</p>
        
        <blockquote class="blockquote">
          <p>"Safety doesn't happen by accident. The right gear can mean the difference between walking away from a crash or facing serious injury."</p>
          <footer class="blockquote-footer">ST Moto & Gear Safety Expert</footer>
        </blockquote>
        
        <h2>Event Details</h2>
        
        <div class="event-details mb-4">
          <div class="row">
            <div class="col-md-6">
              <div class="detail-item mb-3">
                <i class="bi bi-calendar-event me-2"></i>
                <strong>Date:</strong> April 4, 2024
              </div>
              <div class="detail-item mb-3">
                <i class="bi bi-clock me-2"></i>
                <strong>Time:</strong> 10:00 AM - 6:00 PM
              </div>
            </div>
            <div class="col-md-6">
              <div class="detail-item mb-3">
                <i class="bi bi-geo-alt me-2"></i>
                <strong>Location:</strong> ST Moto & Gear BGC Flagship Store
              </div>
              <div class="detail-item mb-3">
                <i class="bi bi-ticket-perforated me-2"></i>
                <strong>Entry:</strong> Free (Registration Required)
              </div>
            </div>
          </div>
        </div>
        
        <p>Don't miss this opportunity to upgrade your safety gear with the latest technology. Register now to reserve your spot!</p>
        
        <div class="text-center my-5">
          <a href="#" class="btn btn-primary btn-lg">Register for the Event</a>
        </div>
      </div>
      
      <div class="article-tags mb-5">
        <span class="me-2"><strong>Tags:</strong></span>
        <a href="#" class="badge bg-light text-dark me-1">Safety</a>
        <a href="#" class="badge bg-light text-dark me-1">Technology</a>
        <a href="#" class="badge bg-light text-dark me-1">Events</a>
        <a href="#" class="badge bg-light text-dark me-1">Gear</a>
      </div>
    </div>
    
    <!-- Related Articles -->
    <div class="related-articles">
      <h3 class="mb-4">Related Articles</h3>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="news-card h-100">
            <a href="news-detail.php?id=4" class="text-decoration-none text-dark">
              <div class="news-img-container mb-3">
                <img src="./Assets/News/safetyawareness.png" alt="Related News" class="img-fluid w-100 rounded">
                <span class="news-badge bg-primary">EVENT</span>
              </div>
              <h5 class="news-title">HELMET SAFETY AWARENESS CAMPAIGN</h5>
              <p class="news-excerpt">Join our community event focused on promoting proper helmet usage and safety practices for all riders.</p>
            </a>
          </div>
        </div>
        
        <div class="col-md-4 mb-4">
          <div class="news-card h-100">
            <a href="news-detail.php?id=2" class="text-decoration-none text-dark">
              <div class="news-img-container mb-3">
                <img src="Assets/News/ls2 news.jpg" alt="Related News" class="img-fluid w-100 rounded">
                <span class="news-badge bg-success">PRODUCT</span>
              </div>
              <h5 class="news-title">RIDE SMART, LEVEL UP WITH LS2</h5>
              <p class="news-excerpt">Built on a foundation of safety, innovation, and style - LS2's Brand Pillars define quality motorcycle helmets.</p>
            </a>
          </div>
        </div>
        
        <div class="col-md-4 mb-4">
          <div class="news-card h-100">
            <a href="news-detail.php?id=5" class="text-decoration-none text-dark">
              <div class="news-img-container mb-3">
                <img src="./Assets/News/summerriding.jpg" alt="Related News" class="img-fluid w-100 rounded">
                <span class="news-badge bg-success">PRODUCT</span>
              </div>
              <h5 class="news-title">SUMMER RIDING COLLECTION LAUNCH</h5>
              <p class="news-excerpt">Discover our new summer collection featuring breathable gear and UV protection designed for hot weather riding.</p>
            </a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Comments Section -->
    <div class="comments-section my-5">
      <h3 class="mb-4">Comments (3)</h3>
      
      <div class="comment mb-4">
        <div class="d-flex">
          <div class="flex-shrink-0">
            <img src="/api/placeholder/50/50" alt="User" class="rounded-circle" width="50" height="50">
          </div>
          <div class="flex-grow-1 ms-3">
            <div class="d-flex justify-content-between align-items-center">
              <h6 class="mb-0">Michael Rodriguez</h6>
              <small class="text-muted">2 days ago</small>
            </div>
            <p class="mt-2">Looking forward to this event! Will there be any special demonstrations of the new airbag jackets I've been hearing about?</p>
            <div class="comment-actions">
              <button class="btn btn-sm btn-link text-decoration-none p-0 me-3">Reply</button>
              <button class="btn btn-sm btn-link text-decoration-none p-0"><i class="bi bi-hand-thumbs-up me-1"></i> 5</button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="comment mb-4">
        <div class="d-flex">
          <div class="flex-shrink-0">
            <img src="/api/placeholder/50/50" alt="User" class="rounded-circle" width="50" height="50">
          </div>
          <div class="flex-grow-1 ms-3">
            <div class="d-flex justify-content-between align-items-center">
              <h6 class="mb-0">Sarah Thomson</h6>
              <small class="text-muted">3 days ago</small>
            </div>
            <p class="mt-2">This is exactly what I've been waiting for! I need to upgrade my helmet and would love to see what new technologies are available.</p>
            <div class="comment-actions">
              <button class="btn btn-sm btn-link text-decoration-none p-0 me-3">Reply</button>
              <button class="btn btn-sm btn-link text-decoration-none p-0"><i class="bi bi-hand-thumbs-up me-1"></i> 3</button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="comment mb-4">
        <div class="d-flex">
          <div class="flex-shrink-0">
            <img src="/api/placeholder/50/50" alt="User" class="rounded-circle" width="50" height="50">
          </div>
          <div class="flex-grow-1 ms-3">
            <div class="d-flex justify-content-between align-items-center">
              <h6 class="mb-0">James Lee</h6>
              <small class="text-muted">5 days ago</small>
            </div>
            <p class="mt-2">Do we need to bring anything specific to the event? Also, will there be any special pricing for previous customers?</p>
            <div class="comment-actions">
              <button class="btn btn-sm btn-link text-decoration-none p-0 me-3">Reply</button>
              <button class="btn btn-sm btn-link text-decoration-none p-0"><i class="bi bi-hand-thumbs-up me-1"></i> 1</button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Leave a Comment -->
      <div class="leave-comment mt-5">
        <h3 class="mb-4">Leave a Comment</h3>
        <form>
          <div class="mb-3">
            <label for="commentName" class="form-label">Name *</label>
            <input type="text" class="form-control" id="commentName" required>
          </div>
          <div class="mb-3">
            <label for="commentEmail" class="form-label">Email * (will not be published)</label>
            <input type="email" class="form-control" id="commentEmail" required>
          </div>
          <div class="mb-3">
            <label for="commentContent" class="form-label">Comment *</label>
            <textarea class="form-control" id="commentContent" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
      </div>
    </div>
  </div>

  <div class="back-to-top">
    <a href="#top">Back to top</a>
  </div>

  <div id="footer"></div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="news-detail.js"></script>
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