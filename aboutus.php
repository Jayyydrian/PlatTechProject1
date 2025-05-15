<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | ST Moto & Gears</title>
    <!-- Include your existing CSS files here -->
    <link rel="stylesheet" href="./includes/footer.css">
    <link rel="stylesheet" href="./includes/navbar.css">
    
    <!-- Include the separate legal styles CSS file -->
    <link rel="stylesheet" href="legal-styles.css">
</head>
<body>
    <!-- Your existing navigation bar would go here -->
    <div id="navbar"></div>
    
    <!-- Main About Us Content -->
    <div class="legal-container">
        <h1 class="legal-page-title">ABOUT US</h1>
        
        <h2 class="legal-section-title">OUR STORY</h2>
        
        <p class="legal-content-paragraph">
            ST Moto & Gears was established in 2018 with a simple mission: to provide motorcycle enthusiasts with high-quality gear 
            and accessories that combine style, safety, and affordability. What began as a small passion project by two riding 
            buddies has now grown into one of the Philippines' most trusted motorcycle gear retailers.
        </p>
        
        <p class="legal-content-paragraph">
            Our founders are experienced riders themselves, noticed a gap in the market for premium 
            motorcycle gear that didn't break the bank. After years of riding together across the beautiful landscapes of the Philippines, 
            they decided to turn their passion into a business that would serve the growing community of riders in the country.
        </p>
        
        <h2 class="legal-section-title">OUR MISSION</h2>
        
        <p class="legal-content-paragraph">
            At ST Moto & Gears, our mission is to enhance the riding experience of every motorcyclist in the Philippines by providing 
            access to high-quality gear, parts, and accessories. We believe that safety shouldn't be a luxury, which is why we strive 
            to offer products that meet international safety standards at prices that are accessible to the everyday rider.
        </p>
        
        <p class="legal-content-paragraph">
            We are committed to promoting responsible riding and helping build a community of informed, safety-conscious motorcyclists 
            across the country. Through our products, services, and knowledge-sharing initiatives, we aim to contribute to the growth 
            of a safer riding culture in the Philippines.
        </p>
        
        <h2 class="legal-section-title">WHAT WE OFFER</h2>
        
        <p class="legal-content-paragraph">
            Our comprehensive range of products includes helmets, riding jackets, gloves, boots, protective gear, motorcycle parts, 
            and accessories. We carefully select each item in our inventory, ensuring that it meets our strict standards for quality, 
            safety, and value.
        </p>
        
        <p class="legal-content-paragraph">
            We partner with both internationally renowned brands and promising local manufacturers to bring you a diverse selection 
            of products that cater to different riding styles, preferences, and budgets. Whether you're a daily commuter, a weekend 
            warrior, or a professional racer, ST Moto & Gears has something for you.
        </p>
        
        <h2 class="legal-section-title">OUR COMMITMENT TO QUALITY</h2>
        
        <p class="legal-content-paragraph">
            Quality is at the heart of everything we do at ST Moto & Gears. Before any product makes it to our shelves or online 
            store, it undergoes a thorough evaluation process to ensure it meets our standards. We prioritize products that have 
            relevant safety certifications and are made from durable materials that can withstand the demands of Philippine roads 
            and weather conditions.
        </p>
        
        <p class="legal-content-paragraph">
            We understand that motorcycle gear is not just about style—it's about protection. That's why we never compromise on the 
            quality and safety features of the products we offer. We regularly review our inventory and stay updated on the latest 
            innovations in motorcycle safety to ensure we're always offering the best to our customers.
        </p>
        
        <h2 class="legal-section-title">OUR TEAM</h2>
        
        <p class="legal-content-paragraph">
            Behind ST Moto & Gears is a team of passionate motorcyclists who share a common love for riding and a commitment to 
            customer satisfaction. Our staff members are not just employees—they're riders themselves who understand the needs and 
            concerns of our customers.
        </p>
        
        <p class="legal-content-paragraph">
            From our sales representatives to our mechanics and customer service team, everyone at ST Moto & Gears is knowledgeable 
            about our products and eager to assist fellow riders. We pride ourselves on providing personalized service and expert 
            advice to help you make informed decisions about your gear and accessories.
        </p>
        
        <h2 class="legal-section-title">COMMUNITY INVOLVEMENT</h2>
        
        <p class="legal-content-paragraph">
            At ST Moto & Gears, we believe in giving back to the riding community that has supported us from the beginning. We regularly 
            organize and participate in charity rides, safety workshops, and community events that promote responsible riding and road safety.
        </p>
        
        <p class="legal-content-paragraph">
            We also collaborate with riding clubs and organizations across the Philippines to support initiatives that benefit motorcyclists 
            and the broader community. Through these partnerships, we aim to contribute to the development of a vibrant, responsible, and 
            supportive motorcycle culture in the country.
        </p>
        
        <h2 class="legal-section-title">OUR LOCATIONS</h2>
        
        <p class="legal-content-paragraph">
            Our flagship store is located in Metro Manila, with additional branches in Cebu and Davao. Each location offers a 
            comprehensive range of products and services, including gear fitting, basic motorcycle maintenance, and free safety 
            consultations.
        </p>
        
        <p class="legal-content-paragraph">
            In addition to our physical stores, our online shop serves customers nationwide, with reliable shipping options to ensure 
            that riders across the Philippines have access to quality gear regardless of their location.
        </p>
        
        <h2 class="legal-section-title">CONTACT US</h2>
        
        <p class="legal-content-paragraph">
            We value your feedback and are always here to address your questions and concerns. You can reach our customer service team 
            through the following channels:
        </p>
        
        <p class="legal-content-paragraph">
            <strong>Email:</strong> customer.service@stmoto.ph<br>
            <strong>Phone:</strong> (02) 8123-4567<br>
            <strong>Main Store Address:</strong> RBonifacio Global City, Taguig, Philippines
        </p>
        
        <p class="legal-content-paragraph">
            Our customer service hours are Monday to Saturday, 9:00 AM to 6:00 PM. For urgent inquiries, you can also reach us through 
            our social media channels, which are monitored regularly.
        </p>
        
        <h2 class="legal-section-title">JOIN OUR JOURNEY</h2>
        
        <p class="legal-content-paragraph">
            As we continue to grow and evolve, we invite you to be part of our journey. Whether you're a seasoned rider or just starting 
            out, ST Moto & Gears is here to support your motorcycling adventure with quality products, expert advice, and exceptional service.
        </p>
        
        <p class="legal-content-paragraph">
            Thank you for choosing ST Moto & Gears as your riding partner. We look forward to serving you and contributing to your 
            safe and enjoyable riding experiences.
        </p>
    </div>
    
    <!-- Your existing footer would go here -->
    <div id="footer"></div>
    
    <!-- Include any JavaScript files if needed -->
    <script>
        // Load the navbar
        fetch('includes/navbar.php')
          .then(res => res.text())
          .then(data => document.getElementById('navbar').innerHTML = data);
      
        // Load the footer
        fetch('includes/footer.php')
          .then(res => res.text())
          .then(data => document.getElementById('footer').innerHTML = data);
    </script>
</body>
</html>