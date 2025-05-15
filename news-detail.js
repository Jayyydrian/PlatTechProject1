
document.addEventListener('DOMContentLoaded', function() {
  // Get the news article ID from the URL
  const urlParams = new URLSearchParams(window.location.search);
  const articleId = urlParams.get('id');
  
  if (articleId) {
    loadArticleData(articleId);
  }
});

function loadArticleData(id) {
  // In a real-world scenario, you would fetch this data from a database
  // For now, we'll use a static object with our news articles
  const newsArticles = {
    "1": {
      title: "RIDER SAFETY GEAR TECHNOLOGY SHOWCASE",
      category: "EVENT",
      date: "April 4, 2024",
      image: "Assets/News/future.jpg",
      content: "Experience firsthand the latest rider safety gear technology with premium quality products and innovative features. Join us for our upcoming Rider Safety Gear Technology Showcase, where we'll be demonstrating the newest advancements in motorcycle safety equipment."
    },
    "2": {
      title: "RIDE SMART, LEVEL UP WITH LS2",
      category: "PRODUCT",
      date: "November 14, 2023",
      image: "Assets/News/ls2 news.jpg",
      content: "Built on a foundation of safety, innovation, and style - LS2's Brand Pillars define quality motorcycle helmets and accessories. Discover why LS2 has become a leading choice for riders who demand the best in protection without compromising on comfort or design."
    },
    "3": {
      title: "ST MOTO CEBU GRAND UPGRADE",
      category: "STORE",
      date: "October 27, 2023",
      image: "Assets/News/shop.jpg",
      content: "Rev up your riding experience. We've moved to a bigger and better store location, a leading concept store for all your motorcycle needs. Our newly upgraded Cebu branch offers a more spacious shopping environment with an expanded product range."
    },
    "4": {
      title: "HELMET SAFETY AWARENESS CAMPAIGN",
      category: "EVENT",
      date: "March 15, 2024",
      image: "Assets/News/safetyawareness.png",
      content: "Join our community event focused on promoting proper helmet usage and safety practices for all riders. Learn from experts about helmet fit, maintenance, and how to choose the right helmet for your riding style."
    },
    "5": {
      title: "SUMMER RIDING COLLECTION LAUNCH",
      category: "PRODUCT",
      date: "February 28, 2024",
      image: "Assets/News/summerriding.jpg",
      content: "Discover our new summer collection featuring breathable gear and UV protection designed for hot weather riding. Beat the heat without compromising on safety with our specially designed summer riding apparel."
    },
    "6": {
      title: "NEW MANILA BRANCH OPENING SOON",
      category: "STORE",
      date: "January 10, 2024",
      image: "Assets/News/newbranch.jpg",
      content: "We're expanding! ST Moto & Gear announces new flagship store opening in Manila next month with special launch offers. Be among the first to experience our most innovative store concept yet."
    }
  };
  
  // Get the article data
  const article = newsArticles[id];
  
  if (article) {
    // Update the page content with the article data
    document.getElementById('article-title').textContent = article.title;
    document.getElementById('article-title-breadcrumb').textContent = article.title;
    document.getElementById('article-category').textContent = article.category;
    document.getElementById('article-date').textContent = article.date;
    document.getElementById('article-image').src = article.image;
    document.getElementById('article-content-1').textContent = article.content;
    
    // Update category styling based on category type
    const categoryElement = document.getElementById('article-category');
    categoryElement.className = 'article-category mb-2';
    
    switch (article.category) {
      case 'EVENT':
        categoryElement.style.backgroundColor = '#0d6efd'; // Blue for events
        break;
      case 'PRODUCT':
        categoryElement.style.backgroundColor = '#198754'; // Green for products
        break;
      case 'STORE':
        categoryElement.style.backgroundColor = '#ffc107'; // Yellow for store news
        categoryElement.style.color = '#212529'; // Darker text for yellow background
        break;
      default:
        categoryElement.style.backgroundColor = '#0d6efd'; // Default blue
    }
    
    // Update page title
    document.title = `${article.title} - ST Moto & Gear`;
  }
}