document.addEventListener('DOMContentLoaded', function() {
  // Elements
  const gridView = document.getElementById('grid-view');
  const listView = document.getElementById('list-view');
  const productGrid = document.getElementById('product-grid');
  const sortSelect = document.querySelector('.sort-by select');
  const categoryFilters = document.querySelectorAll('input[name="category"]');
  
  // Get proper references to the filter checkboxes
  const brandFilters = document.querySelectorAll('.filter-group:nth-of-type(2) input[type="checkbox"]');
  const priceFilters = document.querySelectorAll('.filter-group:nth-of-type(3) input[type="checkbox"]');
  
  // Product data (in a real application, this might come from an API)
  const products = Array.from(document.querySelectorAll('.product-card')).map(card => {
    const name = card.querySelector('.product-name').textContent;
    const currentPrice = parseFloat(card.querySelector('.current-price').textContent.replace('₱', '').replace(',', ''));
    const originalPriceElement = card.querySelector('.original-price');
    const originalPrice = originalPriceElement ? parseFloat(originalPriceElement.textContent.replace('₱', '').replace(',', '')) : currentPrice;
    const discount = originalPriceElement ? Math.round((originalPrice - currentPrice) / originalPrice * 100) : 0;
    const rating = card.querySelectorAll('.stars .fas.fa-star').length;
    const reviewCount = parseInt(card.querySelector('.review-count').textContent.match(/\d+/)[0]);
    
    // Determine category based on product name (in a real app, you'd have this data properly structured)
    let category = '';
    if (name.includes('HELMET')) {
      category = 'helmets';
    } else if (name.includes('GLOVES')) {
      category = 'apparel';
    } else if (name.includes('JACKET')) {
      category = 'apparel';
    } else if (name.includes('CLEANER')) {
      category = 'accessories';
    } else {
      category = 'parts';
    }
    
    // Determine brand based on product name
    let brand = '';
    if (name.includes('O\'NEAL')) {
      brand = 'brand1';
    } else if (name.includes('MUC-OFF')) {
      brand = 'brand2';
    } else if (name.includes('ALPINESTARS')) {
      brand = 'brand3';
    } else if (name.includes('FOX')) {
      brand = 'brand4';
    } else if (name.includes('BELL')) {
      brand = 'brand5';
    }
    
    // Get price range
    let priceRange = '';
    if (currentPrice < 500) {
      priceRange = 'price1'; // Under ₱500
    } else if (currentPrice >= 500 && currentPrice < 1000) {
      priceRange = 'price2'; // ₱500 - ₱1,000
    } else if (currentPrice >= 1000 && currentPrice < 2000) {
      priceRange = 'price3'; // ₱1,000 - ₱2,000
    } else if (currentPrice >= 2000 && currentPrice < 5000) {
      priceRange = 'price4'; // ₱2,000 - ₱5,000
    } else {
      priceRange = 'price5'; // Over ₱5,000
    }
    
    return {
      element: card,
      name,
      currentPrice,
      originalPrice,
      discount,
      rating,
      reviewCount,
      category,
      brand,
      priceRange,
      visible: true
    };
  });
  
  // View toggle functionality
  gridView.addEventListener('click', function() {
    productGrid.classList.remove('list-view');
    productGrid.classList.add('grid-view');
    gridView.classList.add('active');
    listView.classList.remove('active');
  });
  
  listView.addEventListener('click', function() {
    productGrid.classList.remove('grid-view');
    productGrid.classList.add('list-view');
    listView.classList.add('active');
    gridView.classList.remove('active');
  });
  
  // Default to grid view
  gridView.click();
  
  // Apply filters and sort
  function applyFiltersAndSort() {
    // Get selected filters
    const selectedCategory = document.querySelector('input[name="category"]:checked')?.id || null;
    
    // Get selected brands
    const selectedBrands = Array.from(brandFilters)
      .filter(input => input.checked)
      .map(input => input.id);
    
    // Get selected price ranges
    const selectedPriceRanges = Array.from(priceFilters)
      .filter(input => input.checked)
      .map(input => input.id);
    
    // Get sort option
    const sortOption = sortSelect.value;
    
    // Apply filters
    products.forEach(product => {
      let visible = true;
      
      // Category filter
      if (selectedCategory && product.category !== selectedCategory) {
        visible = false;
      }
      
      // Brand filter
      if (selectedBrands.length > 0 && !selectedBrands.includes(product.brand)) {
        visible = false;
      }
      
      // Price range filter
      if (selectedPriceRanges.length > 0 && !selectedPriceRanges.includes(product.priceRange)) {
        visible = false;
      }
      
      product.visible = visible;
    });
    
    // Sort products
    products.sort((a, b) => {
      switch(sortOption) {
        case 'Price: Low to High':
          return a.currentPrice - b.currentPrice;
        case 'Price: High to Low':
          return b.currentPrice - a.currentPrice;
        case 'Newest':
          // Since we don't have date info, this is a placeholder
          return 0;
        case 'Best Selling':
          return b.reviewCount - a.reviewCount;
        case 'Featured':
        default:
          // For featured, prioritize higher ratings and discounts
          const aScore = (a.rating * 10) + a.discount;
          const bScore = (b.rating * 10) + b.discount;
          return bScore - aScore;
      }
    });
    
    // Update DOM
    updateProductDisplay();
  }
  
  function updateProductDisplay() {
    // Clear product grid
    productGrid.innerHTML = '';
    
    // Add visible products in sorted order
    products.filter(product => product.visible).forEach(product => {
      productGrid.appendChild(product.element);
    });
    
    // Handle empty results
    if (!products.some(product => product.visible)) {
      const noResults = document.createElement('div');
      noResults.className = 'no-results';
      noResults.textContent = 'No products match your filters. Please try different filter options.';
      productGrid.appendChild(noResults);
    }
  }
  
  // Add event listeners for filters - each filter automatically applies when changed
  categoryFilters.forEach(filter => {
    filter.addEventListener('change', applyFiltersAndSort);
  });
  
  brandFilters.forEach(filter => {
    filter.addEventListener('change', applyFiltersAndSort);
  });
  
  priceFilters.forEach(filter => {
    filter.addEventListener('change', applyFiltersAndSort);
  });
  
  // Add event listener for sort
  sortSelect.addEventListener('change', applyFiltersAndSort);
  
  // Initial application of filters and sort
  applyFiltersAndSort();
});