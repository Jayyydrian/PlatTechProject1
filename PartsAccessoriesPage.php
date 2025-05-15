<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ST Moto & Gear - Parts & Accessories</title>
    <link rel="stylesheet" href="PartsAccessoriesPage.css">
    <link rel="stylesheet" href="../includes/footer.css">
    <link rel="stylesheet" href="../includes/navbar.css">
</head>
<body>
    <div id="navbar"></div>
    
    <section class="hero">
        <div class="hero-content">
            <h2>Premium Motorcycle Parts & Accessories</h2>
            <p>Enhance your ride with high-performance parts and essential accessories for maintenance, customization, and optimal performance.</p>
        </div>
    </section>
    
    <section class="parts-intro-section">
        <div class="parts-intro-content">
            <h2>Quality Components for Every Motorcycle</h2>
            <p>At ST Moto & Gear, we offer a comprehensive selection of premium motorcycle parts and accessories that enhance performance, functionality, and style. Our collection features components from industry-leading manufacturers that meet or exceed OEM specifications for reliable, long-lasting performance.</p>
            <p>We understand that choosing the right parts is crucial for maintaining your motorcycle's performance and reliability. That's why we provide a diverse range of top-quality components across various categories, each designed for specific models and riding applications.</p>
            <p>Whether you're looking for performance upgrades, maintenance essentials, or practical accessories to enhance your riding experience, our premium selection delivers the quality and reliability you need for your motorcycle's optimal performance and your peace of mind.</p>
        </div>
    </section>
    
    <section class="parts-categories-section">
        <h2>Featured Parts & Accessories Categories</h2>
        <div class="parts-grid">
            <div class="parts-card">
                <img src="/api/placeholder/300/200" alt="Performance Parts">
                <div class="parts-info">
                    <h3>Performance Parts</h3>
                    <p>High-performance components engineered to enhance your motorcycle's power, handling, and responsiveness. From exhaust systems and fuel controllers to suspension upgrades and brake components designed for improved speed and control.</p>
                    <div class="parts-features">Features: Dyno-Tested, Precision Engineering, Weight Reduction</div>
                </div>
            </div>
            
            <div class="parts-card">
                <img src="/api/placeholder/300/200" alt="Maintenance Parts">
                <div class="parts-info">
                    <h3>Maintenance Parts</h3>
                    <p>Essential replacement components for routine maintenance and repairs. Our selection includes filters, fluids, batteries, spark plugs, and drive components manufactured to meet or exceed OEM specifications for reliable performance.</p>
                    <div class="parts-features">Features: OEM-Quality, Long Service Life, Enhanced Durability</div>
                </div>
            </div>
            
            <div class="parts-card">
                <img src="/api/placeholder/300/200" alt="Luggage & Storage">
                <div class="parts-info">
                    <h3>Luggage & Storage</h3>
                    <p>Versatile storage solutions for commuting and touring needs. From tank bags and tail packs to panniers and top cases, our luggage options offer weatherproof construction, secure mounting systems, and practical organization features.</p>
                    <div class="parts-features">Features: Waterproofing, Quick-Release Systems, Expandable Capacity</div>
                </div>
            </div>
            
            <div class="parts-card">
                <img src="/api/placeholder/300/200" alt="Protection Accessories">
                <div class="parts-info">
                    <h3>Protection Accessories</h3>
                    <p>Robust protection components designed to safeguard your motorcycle from damage. Including crash bars, frame sliders, skid plates, and radiator guards engineered for specific models to provide targeted protection for vital components.</p>
                    <div class="parts-features">Features: Impact Absorption, Corrosion Resistance, Model-Specific Design</div>
                </div>
            </div>
            
            <div class="parts-card">
                <img src="/api/placeholder/300/200" alt="Electronics & Navigation">
                <div class="parts-info">
                    <h3>Electronics & Navigation</h3>
                    <p>Advanced electronic systems to enhance your riding experience. From GPS units and communication systems to smartphone mounts and USB chargers, providing connectivity, navigation, and convenience features for modern riders.</p>
                    <div class="parts-features">Features: Weather-Resistant, Voice Command, Multi-Device Compatibility</div>
                </div>
            </div>
            
            <div class="parts-card">
                <img src="/api/placeholder/300/200" alt="Comfort Enhancements">
                <div class="parts-info">
                    <h3>Comfort Enhancements</h3>
                    <p>Ergonomic upgrades designed to improve rider comfort on long journeys. Including aftermarket seats, windscreens, handlebar modifications, and footpeg relocators that reduce fatigue and enhance the riding experience.</p>
                    <div class="parts-features">Features: Ergonomic Design, Vibration Dampening, Adjustable Positioning</div>
                </div>
            </div>
        </div>
        
        <div class="shop-btn-container">
            <a href="Shop.php" class="shop-btn">SHOP ALL PARTS & ACCESSORIES</a>
        </div>
    </section>

    <section class="parts-benefits">
        <h2>Why Quality Parts & Accessories Matter</h2>
        <div class="benefits-grid">
            <div class="benefit-item">
                <div class="benefit-icon">
                    <img src="/api/placeholder/80/80" alt="Performance Icon">
                </div>
                <h3>Enhanced Performance</h3>
                <p>Our premium parts and accessories are engineered to optimize your motorcycle's performance, delivering improved power, handling, braking, and overall responsiveness for a more dynamic riding experience.</p>
            </div>
            
            <div class="benefit-item">
                <div class="benefit-icon">
                    <img src="/api/placeholder/80/80" alt="Reliability Icon">
                </div>
                <h3>Trusted Reliability</h3>
                <p>We carry components from industry-leading manufacturers known for precision engineering and stringent quality control, ensuring reliable performance and longevity for your peace of mind.</p>
            </div>
            
            <div class="benefit-item">
                <div class="benefit-icon">
                    <img src="/api/placeholder/80/80" alt="Customization Icon">
                </div>
                <h3>Personal Customization</h3>
                <p>Express your unique style and riding preferences with our range of customization options that allow you to personalize your motorcycle's appearance and functionality to suit your individual needs.</p>
            </div>
            
            <div class="benefit-item">
                <div class="benefit-icon">
                    <img src="/api/placeholder/80/80" alt="Value Icon">
                </div>
                <h3>Long-Term Value</h3>
                <p>Quality motorcycle components not only enhance your riding experience but also help maintain your motorcycle's value through proper maintenance, protection, and thoughtful upgrades.</p>
            </div>
        </div>
    </section>

    <div id="footer"></div>
  
    <!-- JAVASCRIPT -->
    <script src="Shop.js"></script>
    <script>
        // Load the navbar
        fetch('../includes/navbar.html')
            .then(res => res.text())
            .then(data => document.getElementById('navbar').innerHTML = data);
        
        // Load the footer
        fetch('../includes/footer.html')
            .then(res => res.text())
            .then(data => document.getElementById('footer').innerHTML = data);
    </script>

</body>
</html>