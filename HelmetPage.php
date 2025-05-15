<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ST Moto & Gear - Helmets</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="HelmetPage.css">

    <link rel="stylesheet" href="./includes/footer.css">
    <link rel="stylesheet" href="./includes/navbar.css">
  
</head>
<body>
    <div id="navbar"></div>
    
    <section class="hero">
        <div class="hero-content">
            <h2>Premium Motorcycle Helmets</h2>
            <p>Protect your ride with our extensive collection of high-quality helmets designed for safety, comfort, and style.</p>
        </div>
    </section>
    
    <section class="safety-section">
        <div class="safety-content">
            <h2>Safety Starts With Your Helmet</h2>
            <p>Your helmet is the most important piece of safety equipment you'll ever own as a rider. At ST Moto & Gear, we understand that the right helmet can be the difference between life-changing injury and walking away from an accident.</p>
            <p>Our premium selection of motorcycle helmets combines cutting-edge safety technology with comfort and style. Each helmet in our collection meets or exceeds DOT, ECE, and SNELL safety standards, providing the highest level of protection for your rides.</p>
            <p>From full-face options offering complete protection to modular helmets providing versatility for everyday riders, to lightweight options for sport enthusiasts – we have helmets designed for every riding style and preference. Our helmets feature advanced ventilation systems, noise reduction technology, anti-fog visors, and comfortable padding to enhance your riding experience.</p>
            <p>Remember, a quality helmet isn't just an accessory – it's essential life-saving equipment that protects your most valuable asset: you.</p>
        </div>
    </section>
    
    <section class="products">
        <h2>Featured Helmets</h2>
        <div class="product-grid">
            <div class="product-card">
                <img src="./Assets//Product/Shoei_GT-AIR_II_Helmet.png" alt="Full Face Helmet">
            </div>
            
            <div class="product-card">
                <img src="./Assets/Product/O_neal_Sierra_II_Adventure_Helmet.png" alt="Modular Helmet">
            </div>
            
            <div class="product-card">
                <img src="./Assets/Product/HJC_RPHA_11_Pro_Helmet.png" alt="Off-Road Helmet">
            </div>
            
            <div class="product-card">
                <img src="./Assets/Product/Arai_RX-V_Race_Helmet.png" alt="Street Helmet">
            </div>
            
            <div class="product-card">
                <img src="./Assets/Product/Bell_Qualifier_DLX_Mips_Helmet.png" alt="Sport Helmet">
            </div>
            
            <div class="product-card">
                <img src="./Assets/Product/AGV_K6_Full_Face_Helmet.webp" alt="Half Helmet">
            </div>
        </div>
        
        <div class="shop-btn-container">
            <a href="Shop.php" class="shop-btn">SHOP NOW</a>
        </div>
    </section>

    <div id="footer"></div>
  
    <!-- JAVASCRIPT -->
    <script src="Shop.js"></script>
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