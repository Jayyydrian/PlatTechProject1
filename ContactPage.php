<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Bikers Hub</title>
    <link rel="stylesheet" href="ContactPage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./includes/footer.css">
    <link rel="stylesheet" href="./includes/navbar.css">
</head>
<body>

      <div id="navbar"></div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Contact Us</h2>
            <p>Have questions about our premium riding gear and accessories? Our team of riding enthusiasts is here to help you find the perfect equipment for your journey.</p>
        </div>
    </section>

    <!-- Contact Intro Section -->
    <section class="contact-intro-section">
        <div class="contact-intro-content">
            <h2>Get In Touch</h2>
            <p>From protective gear to performance accessories, we're dedicated to enhancing your riding experience. Our knowledgeable staff can help with sizing, product recommendations, and technical questions about any accessory in our collection.</p>
            <p>Choose any of the contact methods below or visit our showroom to experience our premium accessories firsthand.</p>
        </div>
    </section>

    <!-- Contact Methods Section -->
    <section class="contact-methods-section">
        <div class="contact-methods-content">
            <div class="contact-method-card">
                <div class="contact-icon">
                    <i class="fas fa-phone fa-2x" style="color: #d32f2f;"></i>
                </div>
                <h3>Call Us</h3>
                <p>Gear Specialists: <a href="tel:+11234567890">+1 (123) 456-7890</a></p>
                <p>Accessories Support: <a href="tel:+11234567891">+1 (123) 456-7891</a></p>
                <p>Mon-Fri: 9AM - 6PM</p>
            </div>
            
            <div class="contact-method-card">
                <div class="contact-icon">
                    <i class="fas fa-envelope fa-2x" style="color: #d32f2f;"></i>
                </div>
                <h3>Email Us</h3>
                <p>Gear Inquiries: <a href="mailto:gear@ridingaccessories.com">gear@ridingaccessories.com</a></p>
                <p>Warranty Claims: <a href="mailto:warranty@ridingaccessories.com">warranty@ridingaccessories.com</a></p>
                <p>Orders: <a href="mailto:orders@ridingaccessories.com">orders@ridingaccessories.com</a></p>
            </div>
            
            <div class="contact-method-card">
                <div class="contact-icon">
                    <i class="fas fa-comments fa-2x" style="color: #d32f2f;"></i>
                </div>
                <h3>Live Chat</h3>
                <p>Available on our website</p>
                <p>Mon-Fri: 24/7</p>
                <p>Weekend: 10AM - 4PM</p>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="contact-form-container">
            <h2>Send Us a Message</h2>
            <form id="contactForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Your Name *</label>
                        <input type="text" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email *</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <select id="subject" class="form-control" required>
                            <option value="" selected disabled>Select a subject</option>
                            <option value="order">Order Status</option>
                            <option value="gear">Gear Recommendations</option>
                            <option value="sizing">Sizing Questions</option>
                            <option value="return">Returns & Warranty</option>
                            <option value="availability">Product Availability</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="message">Your Message *</label>
                    <textarea id="message" class="form-control" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="accessoryType">Accessory Type (if applicable)</label>
                    <select id="accessoryType" class="form-control">
                        <option value="" selected disabled>Select accessory type</option>
                        <option value="helmet">Helmets</option>
                        <option value="jacket">Jackets & Vests</option>
                        <option value="gloves">Gloves</option>
                        <option value="boots">Boots & Footwear</option>
                        <option value="protection">Protective Gear</option>
                        <option value="luggage">Luggage & Storage</option>
                        <option value="electronics">Electronics & Gadgets</option>
                        <option value="other">Other Accessories</option>
                    </select>
                </div>
                
                <div class="form-group" style="margin-top: 20px; text-align: center;">
                    <button type="submit" class="submit-btn">Send Message</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Store Hours & Location Section -->
    <section class="store-hours-section">
        <div class="store-hours-container">
            <div class="store-hours-card">
                <h3>Store Hours</h3>
                <ul class="hours-list">
                    <li><span class="day">Monday</span> <span class="hours">9:00 AM - 7:00 PM</span></li>
                    <li><span class="day">Tuesday</span> <span class="hours">9:00 AM - 7:00 PM</span></li>
                    <li><span class="day">Wednesday</span> <span class="hours">9:00 AM - 7:00 PM</span></li>
                    <li><span class="day">Thursday</span> <span class="hours">9:00 AM - 7:00 PM</span></li>
                    <li><span class="day">Friday</span> <span class="hours">9:00 AM - 8:00 PM</span></li>
                    <li><span class="day">Saturday</span> <span class="hours">10:00 AM - 6:00 PM</span></li>
                    <li><span class="day">Sunday</span> <span class="hours">11:00 AM - 5:00 PM</span></li>
                </ul>
            </div>
            
            <div class="store-location-card">
                <h3>Our Headquarters</h3>
                <div class="store-location-info">
                    <p><strong>ST Moto Trading</strong></p>
                    <p>ST Moto & Gears Inc.,</p>
                    <p>32nd Street corner 4th Avenue,</p>
                    <p>RBonifacio Global City, Taguig, Philippines</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="faq-container">
            <h2>Frequently Asked Questions</h2>
            
            <div class="faq-item">
                <div class="faq-question">
                    How do I find the right size for riding gear?
                    <div class="faq-toggle"></div>
                </div>
                <div class="faq-answer">
                    <p>Each manufacturer uses slightly different sizing charts which we provide on our product pages. For the most accurate fit, we recommend using our detailed measurement guides or contacting our gear specialists for personalized assistance. We can help with specific brand fits and recommendations based on your measurements and riding style.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    What is your warranty policy for protective gear?
                    <div class="faq-toggle"></div>
                </div>
                <div class="faq-answer">
                    <p>Most of our protective gear comes with manufacturer warranties ranging from 1-5 years depending on the product and brand. We also offer our own 30-day satisfaction guarantee on unworn items. For safety equipment like helmets, warranties typically cover manufacturing defects but not damage from impacts or accidents. Please contact our warranty department for specific details about your purchase.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    Do you offer international shipping for accessories?
                    <div class="faq-toggle"></div>
                </div>
                <div class="faq-answer">
                    <p>Yes, we ship our riding gear and accessories worldwide. International shipping rates vary based on package weight, dimensions, and destination. Please note that certain protective gear may have import restrictions in some countries. Customers are responsible for any customs duties, taxes, or import fees imposed by their country.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    Do you have gear specialists available for consultation?
                    <div class="faq-toggle"></div>
                </div>
                <div class="faq-answer">
                    <p>Absolutely! Our gear specialists are available for personalized consultations by appointment. They can help you select the right gear for your riding style, climate conditions, and personal preferences. We also offer virtual consultations via video call if you can't visit our showroom in person. Contact us to schedule your free consultation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Bikers Community Section -->
    <section class="community-section">
        <div class="community-content">
            <h2>Join Our Rider Community</h2>
            <p>Connect with fellow riding enthusiasts, stay updated on the latest gear innovations, and get exclusive access to product demos and gear testing events.</p>
            <div class="social-links">
                <a href="#" class="social-link">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-link">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="social-link">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-link">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="#" class="social-link">
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>
        </div>
    </section>

        <div id="footer"></div>
  
    <!-- JAVASCRIPT -->
    <script src="Shop.js"></script>
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

    <script>
        // Simple JavaScript to toggle FAQ items
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentNode;
                item.classList.toggle('active');
            });
        });

        // Form submission handling (placeholder)
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            this.reset();
        });
    </script>
</body>
</html>