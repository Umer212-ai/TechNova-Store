<?php
// contact.php - TechNova Store Contact Page
include 'includes/db.php';

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = 'Please fill all required fields.';
    } else {
        $sql = "INSERT INTO contact_messages (name, email, subject, message) 
                VALUES ('$name', '$email', '$subject', '$message')";
        
        if (mysqli_query($conn, $sql)) {
            $success = true;
        } else {
            $error = 'Failed to send message. Please try again.';
        }
    }
}
?>
<?php include 'includes/header.php'; ?>
<body>

  <!-- ========== TOP ANNOUNCEMENT BAR ========== -->
  <div class="tn-topbar">
    <div class="container d-flex justify-content-between align-items-center">
      <span><i class="bi bi-truck me-2"></i>Free shipping on orders over $99</span>
      <span class="d-none d-md-inline">
        <i class="bi bi-headset me-2"></i>24/7 Support: +1 (800) 123-4567
      </span>
    </div>
  </div>

  <!-- ========== NAVBAR ========== -->
  <?php include 'includes/navbar.php'; ?>

  <!-- ========== PAGE HEADER ========== -->
  <section class="tn-page-header">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="tn-breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">Contact Us</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- ========== CONTACT HERO ========== -->
  <section class="tn-section tn-contact-hero">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6" data-tn-animate="fade-up">
          <span class="tn-eyebrow"><span class="tn-dot"></span> Get In Touch</span>
          <h1 class="tn-section-title tn-contact-hero-title">
            We'd Love to <span class="tn-gradient-text">Hear From You</span>
          </h1>
          <p class="tn-contact-hero-sub">
            Have a question, feedback, or need assistance? Our team is here to help. Reach out to us through any of the channels below or fill out the form — we'll get back to you within 24 hours.
          </p>
          <div class="tn-contact-hero-actions">
            <a href="#contact-form" class="btn tn-btn-primary">
              Send a Message <i class="bi bi-arrow-right ms-2"></i>
            </a>
            <a href="#faq" class="btn tn-btn-ghost">
              View FAQs <i class="bi bi-arrow-down ms-2"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-6" data-tn-animate="fade-up">
          <div class="tn-contact-hero-visual">
            <img
              src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?auto=format&fit=crop&w=800&q=80"
              alt="TechNova customer support team ready to help"
              class="tn-contact-hero-img"
            />
            <div class="tn-contact-hero-badge">
              <span class="tn-contact-hero-badge-icon"><i class="bi bi-headset"></i></span>
              <span class="tn-contact-hero-badge-text">24/7<br>Support</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== CONTACT INFO CARDS ========== -->
  <section class="tn-section tn-contact-info">
    <div class="container">
      <div class="row g-4">
        <!-- Dynamic Company Information -->
        <div class="col-md-6 col-lg-3" data-tn-animate="fade-up">
          <div class="tn-contact-info-card">
            <div class="tn-contact-info-icon">
              <i class="bi bi-geo-alt"></i>
            </div>
            <h5>Our Address</h5>
            <p>221B Innovation Avenue<br>Tech City, TC 10001<br>United States</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-tn-animate="fade-up">
          <div class="tn-contact-info-card">
            <div class="tn-contact-info-icon tn-contact-info-icon-accent">
              <i class="bi bi-telephone"></i>
            </div>
            <h5>Phone Number</h5>
            <p>+1 (800) 123-4567<br>+1 (800) 987-6543</p>
            <a href="tel:+18001234567" class="tn-contact-info-link">Call Us Now <i class="bi bi-arrow-right ms-1"></i></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-tn-animate="fade-up">
          <div class="tn-contact-info-card">
            <div class="tn-contact-info-icon tn-contact-info-icon-purple">
              <i class="bi bi-envelope"></i>
            </div>
            <h5>Email Address</h5>
            <p>support@technova.com<br>sales@technova.com</p>
            <a href="mailto:support@technova.com" class="tn-contact-info-link">Send Email <i class="bi bi-arrow-right ms-1"></i></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-tn-animate="fade-up">
          <div class="tn-contact-info-card">
            <div class="tn-contact-info-icon tn-contact-info-icon-rose">
              <i class="bi bi-clock"></i>
            </div>
            <h5>Working Hours</h5>
            <p>Mon – Fri: 9:00 AM – 8:00 PM<br>Sat – Sun: 10:00 AM – 6:00 PM</p>
            <span class="tn-contact-info-status"><span class="tn-contact-info-dot"></span> We're currently open</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== CONTACT FORM + MAP ========== -->
  <section class="tn-section tn-contact-form-section" id="contact-form">
    <div class="container">
      <div class="row g-5">
        <!-- Contact Form -->
        <div class="col-lg-7" data-tn-animate="fade-up">
          <div class="tn-contact-form-card">
            <div class="tn-contact-form-header">
              <span class="tn-eyebrow"><span class="tn-dot"></span> Send a Message</span>
              <h2 class="tn-section-title">Let's Start a Conversation</h2>
              <p class="tn-section-sub" style="margin:0;">Fill out the form below and our team will get back to you within 24 hours.</p>
            </div>

            <!-- Dynamic Contact Form -->
            <form class="tn-contact-form" id="tnContactForm" method="POST" action = "">
              <?php if ($success): ?>
             <div class="tn-contact-alert" style="display:block; background:#d1fae5; color:#065f46; padding:15px; border-radius:10px; margin-bottom:20px;">
                <i class="bi bi-check-circle-fill me-2"></i>
                 <span>Thank you! Your message has been sent successfully. We'll get back to you soon.</span>
               </div>
              <?php elseif ($error): ?>
             <div class="tn-contact-alert" style="display:block; background:#fee2e2; color:#dc2626; padding:15px; border-radius:10px; margin-bottom:20px;">
                 <i class="bi bi-exclamation-circle-fill me-2"></i>
                  <span><?php echo $error; ?></span>
               </div>
              <?php endif; ?>

              <div class="row g-4">
                <div class="col-md-6">
                  <div class="tn-form-group">
                    <label class="tn-form-label" for="tnContactName">Full Name <span class="tn-required">*</span></label>
                    <div class="tn-contact-input-wrap">
                      <i class="bi bi-person"></i>
                      <input type="text" class="form-control tn-form-input tn-contact-input" name = "name" id="tnContactName" placeholder="John Doe" required />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="tn-form-group">
                    <label class="tn-form-label" for="tnContactEmail">Email Address <span class="tn-required">*</span></label>
                    <div class="tn-contact-input-wrap">
                      <i class="bi bi-envelope"></i>
                      <input type="email" class="form-control tn-form-input tn-contact-input" name = "email" id="tnContactEmail" placeholder="john@example.com" required />
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="tn-form-group">
                    <label class="tn-form-label" for="tnContactSubject">Subject <span class="tn-required">*</span></label>
                    <div class="tn-contact-input-wrap">
                      <i class="bi bi-chat-left-text"></i>
                      <input type="text" class="form-control tn-form-input tn-contact-input" name = "subject" id="tnContactSubject" placeholder="How can we help you?" required />
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="tn-form-group">
                    <label class="tn-form-label" for="tnContactMessage">Message <span class="tn-required">*</span></label>
                    <div class="tn-contact-textarea-wrap">
                      <i class="bi bi-pencil"></i>
                      <textarea class="form-control tn-form-input tn-contact-textarea" name="message" id="tnContactMessage" rows="6" placeholder="Write your message here..." required></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn tn-btn-primary tn-contact-submit" id="tnContactSubmit">
                    <span class="tn-contact-submit-text">Send Message <i class="bi bi-send ms-2"></i></span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Google Map Placeholder + Quick Contact -->
        <div class="col-lg-5" data-tn-animate="fade-up">
          <!-- Dynamic Google Map -->
          <div class="tn-contact-map-card">
            <div class="tn-contact-map">
              <div class="tn-contact-map-placeholder">
                <i class="bi bi-map"></i>
                <p>Interactive Google Map</p>
                <span>221B Innovation Avenue, Tech City</span>
              </div>
            </div>
          </div>

          <div class="tn-contact-quick-card">
            <div class="tn-contact-quick-icon">
              <i class="bi bi-lightning-charge-fill"></i>
            </div>
            <h5>Quick Response Guarantee</h5>
            <p>We value your time. Every inquiry is assigned a dedicated support representative who will respond within 24 hours. For urgent matters, call us directly.</p>
            <div class="tn-contact-quick-features">
              <div class="tn-contact-quick-feat">
                <i class="bi bi-check-circle-fill"></i>
                <span>Average response time: 4 hours</span>
              </div>
              <div class="tn-contact-quick-feat">
                <i class="bi bi-check-circle-fill"></i>
                <span>98% customer satisfaction rate</span>
              </div>
              <div class="tn-contact-quick-feat">
                <i class="bi bi-check-circle-fill"></i>
                <span>Dedicated account managers</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== FAQ ========== -->
  <section class="tn-section tn-contact-faq" id="faq">
    <div class="container">
      <div class="tn-section-head text-center" data-tn-animate="fade-up">
        <span class="tn-eyebrow"><span class="tn-dot"></span> FAQ</span>
        <h2 class="tn-section-title">Frequently Asked Questions</h2>
        <p class="tn-section-sub">
          Find quick answers to the most common questions about our products, orders, and services.
        </p>
      </div>

      <div class="row justify-content-center mt-4">
        <div class="col-lg-8" data-tn-animate="fade-up">
          <div class="tn-contact-faq-list">
            <!-- Dynamic FAQ Items -->
            <div class="tn-contact-faq-item active">
              <button class="tn-contact-faq-btn" type="button">
                <span>How long does shipping take?</span>
                <i class="bi bi-chevron-down"></i>
              </button>
              <div class="tn-contact-faq-answer">
                <p>Standard shipping takes 3-5 business days within the US. Express shipping delivers within 1-2 business days. International orders typically arrive within 7-14 business days depending on the destination. All orders include real-time tracking.</p>
              </div>
            </div>
            <div class="tn-contact-faq-item">
              <button class="tn-contact-faq-btn" type="button">
                <span>What is your return policy?</span>
                <i class="bi bi-chevron-down"></i>
              </button>
              <div class="tn-contact-faq-answer">
                <p>We offer a 30-day hassle-free return policy. If you're not completely satisfied with your purchase, you can return it within 30 days for a full refund. Items must be in their original packaging and condition. We provide free return shipping labels for all domestic orders.</p>
              </div>
            </div>
            <div class="tn-contact-faq-item">
              <button class="tn-contact-faq-btn" type="button">
                <span>Do you offer warranty on products?</span>
                <i class="bi bi-chevron-down"></i>
              </button>
              <div class="tn-contact-faq-answer">
                <p>Yes, all products come with a minimum 1-year manufacturer warranty. We also offer extended warranty plans up to 3 years for additional protection. Our warranty covers defects in materials and workmanship, and our support team can help with any warranty claims.</p>
              </div>
            </div>
            <div class="tn-contact-faq-item">
              <button class="tn-contact-faq-btn" type="button">
                <span>How can I track my order?</span>
                <i class="bi bi-chevron-down"></i>
              </button>
              <div class="tn-contact-faq-answer">
                <p>Once your order is shipped, you'll receive a confirmation email with a tracking number. You can also track your order by logging into your account and visiting the "My Orders" page. We provide real-time updates on your shipment status.</p>
              </div>
            </div>
            <div class="tn-contact-faq-item">
              <button class="tn-contact-faq-btn" type="button">
                <span>What payment methods do you accept?</span>
                <i class="bi bi-chevron-down"></i>
              </button>
              <div class="tn-contact-faq-answer">
                <p>We accept all major credit cards (Visa, Mastercard, American Express, Discover), PayPal, Apple Pay, Google Pay, and Shop Pay. All transactions are secured with 256-bit SSL encryption for your safety and peace of mind.</p>
              </div>
            </div>
            <div class="tn-contact-faq-item">
              <button class="tn-contact-faq-btn" type="button">
                <span>Can I modify or cancel my order?</span>
                <i class="bi bi-chevron-down"></i>
              </button>
              <div class="tn-contact-faq-answer">
                <p>You can modify or cancel your order within 2 hours of placing it. After that, the order may have already entered processing. Please contact our support team immediately if you need to make changes, and we'll do our best to accommodate your request.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== SOCIAL MEDIA ========== -->
  <section class="tn-section tn-contact-social">
    <div class="container">
      <div class="tn-section-head text-center" data-tn-animate="fade-up">
        <span class="tn-eyebrow"><span class="tn-dot"></span> Connect With Us</span>
        <h2 class="tn-section-title">Follow TechNova</h2>
        <p class="tn-section-sub">
          Stay updated with the latest products, deals, and tech insights across our social channels.
        </p>
      </div>

      <div class="row g-4 mt-4 justify-content-center">
        <!-- Dynamic Social Links -->
        <div class="col-6 col-md-4 col-lg-2" data-tn-animate="fade-up">
          <a href="#" class="tn-contact-social-card" aria-label="Facebook">
            <div class="tn-contact-social-icon tn-contact-social-facebook">
              <i class="bi bi-facebook"></i>
            </div>
            <span class="tn-contact-social-name">Facebook</span>
            <span class="tn-contact-social-followers">12.5K Followers</span>
          </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2" data-tn-animate="fade-up">
          <a href="#" class="tn-contact-social-card" aria-label="Instagram">
            <div class="tn-contact-social-icon tn-contact-social-instagram">
              <i class="bi bi-instagram"></i>
            </div>
            <span class="tn-contact-social-name">Instagram</span>
            <span class="tn-contact-social-followers">24.8K Followers</span>
          </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2" data-tn-animate="fade-up">
          <a href="#" class="tn-contact-social-card" aria-label="Twitter / X">
            <div class="tn-contact-social-icon tn-contact-social-twitter">
              <i class="bi bi-twitter-x"></i>
            </div>
            <span class="tn-contact-social-name">Twitter / X</span>
            <span class="tn-contact-social-followers">8.3K Followers</span>
          </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2" data-tn-animate="fade-up">
          <a href="#" class="tn-contact-social-card" aria-label="YouTube">
            <div class="tn-contact-social-icon tn-contact-social-youtube">
              <i class="bi bi-youtube"></i>
            </div>
            <span class="tn-contact-social-name">YouTube</span>
            <span class="tn-contact-social-followers">31.2K Subs</span>
          </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2" data-tn-animate="fade-up">
          <a href="#" class="tn-contact-social-card" aria-label="LinkedIn">
            <div class="tn-contact-social-icon tn-contact-social-linkedin">
              <i class="bi bi-linkedin"></i>
            </div>
            <span class="tn-contact-social-name">LinkedIn</span>
            <span class="tn-contact-social-followers">5.1K Followers</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== NEWSLETTER ========== -->
  <section class="tn-section tn-newsletter">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-7">
          <span class="tn-eyebrow"><span class="tn-dot"></span> Stay Connected</span>
          <h2 class="tn-section-title">Get Exclusive Tech Deals</h2>
          <p class="tn-section-sub">
            Subscribe to our newsletter and be the first to know about new
            arrivals, exclusive offers, and tech insights.
          </p>
          <form class="tn-newsletter-form" id="tnNewsletterForm">
            <input type="email" class="form-control" placeholder="Enter your email address" required />
            <button class="btn tn-btn-primary" type="submit">
              Subscribe <i class="bi bi-arrow-right ms-2"></i>
            </button>
          </form>
          <small class="tn-newsletter-note">
            We respect your privacy. Unsubscribe anytime.
          </small>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== FOOTER ========== -->
  <?php include "includes/footer.php"; ?>

  <!-- Back to top -->
  <button class="tn-back-top" id="tnBackTop" aria-label="Back to top">
    <i class="bi bi-arrow-up"></i>
  </button>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Project Script -->
  <script src="js/script.js"></script>
</body>
</html>
