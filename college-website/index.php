<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Goverment Polytechnic College Khirsadoh(GPC)</title>
  <link rel="stylesheet" href="style.css">

  <!-- Font Awesome for Social Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

/* ---------- About + Departments + Admission: new design ---------- */
.home-features .container { max-width: 1100px; margin: 0 auto; padding: 24px; }

/* About Section */
.about {
  background: #ffffff; /* same light background */
  padding: 05px 0px;
  text-align: center;
}

.about-container {
  max-width: 900px;
  margin: auto;
}

.about h3 {
  font-size: 2.5rem;
  margin-bottom: 20px;
  color: #003366; /* same heading color */
  font-weight: bold;
  text-transform: uppercase;
  position: relative;
}

.about h3:after {
  content: "";
  display: block;
  width: 150px;
  height: 3px;
  background: #ff6600; /* orange underline */
  margin: 0px auto 0;
  border-radius: 5px;
}

.about p {
  font-size: 1.1rem;
  line-height: 1.8;
  color: #444;
  margin-bottom: 20px;
}

.section-title {
  font-family: serif;
  color: #5a1a7a;                /* purple heading */
  font-size: 26px;
  margin: 8px 0 18px;
  border-bottom: 3px solid rgba(90,26,122,0.08);
  display: inline-block;
  padding-bottom: 6px;
}

/* departments grid */
.departments-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 14px;
  margin-bottom: 28px;
}

.dept-card {
  display: flex;
  gap: 12px;
  align-items: center;
  background: #fff;
  border: 2px solid #dcdcdc;
  padding: 14px 18px;
  border-radius: 12px;
  text-decoration: none;
  color: #8b1f1f;               /* deep red text for labels */
  font-weight: 600;
  box-shadow: 0 6px 16px rgba(14,20,30,0.04);
  transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
}

.dept-card i {
  font-size: 20px;
  color: #c63a2a;               /* icon color */
  width: 30px;
  text-align: center;
}

/* hover */
.dept-card:hover {
  transform: translateY(-6px);
  border-color: rgba(198,58,42,0.18);
  box-shadow: 0 14px 30px rgba(14,20,30,0.09);
}

/* admission card */
.admission-card {
  display: grid;
  grid-template-columns: 1fr 240px;
  align-items: center;
  gap: 12px;
  background: linear-gradient(180deg, rgba(154,125,122,0.12), rgba(154,125,122,0.06));
  padding: 18px;
  border-radius: 10px;
  border-left: 6px solid rgba(154,125,122,0.35);
  margin-top: 12px;
}

.admission-left h3 {
  margin: 0 0 6px;
  color: #5a1a7a;
  font-size: 20px;
}

.admission-left p {
  margin: 0 0 12px;
  color: #222;
  opacity: .85;
}

/* CTA button */
.btn-cta {
  display: inline-block;
  padding: 10px 18px;
  background: #b23f2f;
  color: #fff;
  border-radius: 8px;
  font-weight: 700;
  text-decoration: none;
  box-shadow: 0 6px 14px rgba(178,63,47,0.18);
  transition: transform .14s, box-shadow .14s;
}
.btn-cta:hover { transform: translateY(-3px); box-shadow: 0 12px 24px rgba(178,63,47,0.22); }

/* decorative right side of admission (could show image) */
.admission-right {
  height: 88px;
  border-radius: 8px;
  background-image: url('about-img-small.jpg'); /* optional: add path to decorative image */
  background-size: cover;
  background-position: center;
  box-shadow: inset 0 -6px 18px rgba(0,0,0,0.04);
}

/* responsiveness: stack admission on narrow screens */
@media (max-width: 760px) {
  .admission-card { grid-template-columns: 1fr; text-align: left; }
  .admission-right { height: 140px; margin-top: 10px; }
  .departments-grid { gap: 12px; }
}

</style>
</head>

<body>
  <header>
    <h1>GOVERMENT POLYTECHNIC COLLEGE KHIRSADOH (GPC)</h1>
    <nav>
    <a href="index.html"><i class="fas fa-home"></i> Home</a>
    <br>
    <a href="about.html"><i class="fas fa-info-circle"></i> About</a>
    <br>
    <a href="departments.html"><i class="fas fa-building"></i> Departments</a>
    <br>
    <a href="admission.html"><i class="fas fa-user-graduate"></i> Admission</a>
    <br>
    <a href="https://www.rgpvdiploma.in/StudentLife/StudentLogin.aspx"><i class="fas fa-users"></i> Students</a>
    <br>
    <a href="facilities.html"><i class="fas fa-university"></i> Facilities</a>
    <br>
    <a href="contact.html"><i class="fas fa-envelope"></i> Contact</a>
    <br>
     <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
     <br>
    <a href="create_profile.php"><i class="fas fa-id-card"></i> Create Profile</a>
    </nav>
    </header>
<br>
<br>
<div class="main-section">
  <!-- Image slider with previous/next buttons -->
  <div class="slider-container">
    <button class="prev">&#10094;</button>
    <div class="slider">
      <div class="slide active"><img src="Images/about img5.jpg" alt="Image 1"></div>
      <div class="slide"><img src="Images/about img2.jpg" alt="Image 2"></div>
      <div class="slide"><img src="Images/building1.jpg" alt="Image 3"></div>
      <div class="slide"><img src="Images/lab4.jpg" alt="Image 4"></div>
    </div>
    <button class="next">&#10095;</button>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <h3><b>Important Links:</b></h3>
    <a href="register.php" class="sidebar-link register"><b><i class="fas fa-users"></i> Register</a></b>

    <a href="admission.html" class="sidebar-link admissionportal"><b><i class="fas fa-university"></i> Admission Portal</a></b>

    <a href="registration.html" class="sidebar-link registration"><b><i class="fas fa-file-signature"></i> Registration Form</a></b>

    <a href="syllabus.html" class="sidebar-link syllabus"><b><i class="fas fa-book"></i> AICTE OCBC 2023 curriculum</a></b>

    <a href="https://www.rgpvdiploma.in/Exam/DiplomaIIIYrResult.aspx" class="sidebar-link result"><b><i class="fas fa-chart-line"></i> Result</a></b>

    <a href="downloads.html" class="sidebar-link download"><b><i class="fas fa-download"></i> Download Center</a></b>

    <a href="https://wa.me/+917400821170" target="_blank" class="sidebar-link whatsapp-button"><b>💬 Chat with Us</a></b>
  </div>
</div>

  <script>
    const slides = document.querySelectorAll(".slide");
    const prevBtn = document.querySelector(".prev");
    const nextBtn = document.querySelector(".next");
    let currentSlide = 0;
  
    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.toggle("active", i === index);
      });
    }
  
    prevBtn.addEventListener("click", () => {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(currentSlide);
    });
  
    nextBtn.addEventListener("click", () => {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    });
  
    // initialize
    showSlide(currentSlide);
  </script>
  
  <main>

  <!-- START: about + new departments + admission block -->
<section class="home-features">

    <section class="about">
  <div class="about-container">
    <h3>About Us</h3>
    <p>
      Our college is dedicated to providing quality education, innovative learning, and 
      holistic development for students. We aim to nurture knowledge, skills, and values 
      that help students succeed in their careers and life.
    </p>
    <p>
      With experienced faculty, modern infrastructure, and a supportive environment, 
      we prepare our students for a brighter future. <a href="about.html">Learn more...</a>
    </p>
  </div>
</section>

  <div class="container">
    <h2 class="section-title">Departments</h2>

    <div class="departments-grid">
      <a href="Branches/CSE.html" class="dept-card">
        <i class="fas fa-laptop-code"></i>
        <span>Computer Science Engineering</span>
      </a>

      <a href="Branches/it.html" class="dept-card">
        <i class="fas fa-network-wired"></i>
        <span>Information Technology</span>
      </a>

      <a href="Branches/civil.html" class="dept-card">
        <i class="fas fa-hard-hat"></i>
        <span>Civil Engineering</span>
      </a>

      <a href="Branches/mech.html" class="dept-card">
        <i class="fas fa-cogs"></i>
        <span>Mechanical Engineering</span>
      </a>

      <a href="Branches/electrical.html" class="dept-card">
        <i class="fas fa-bolt"></i>
        <span>Electrical Engineering</span>
      </a>

      <a href="Branches/et.html" class="dept-card">
        <i class="fas fa-microchip"></i>
        <span>Electronics &amp; Telecommunication</span>
      </a>

      <a href="Branches/mining.html" class="dept-card">
        <i class="fas fa-tools"></i>
        <span>Mining Engineering</span>
      </a>
    </div> <!-- .departments-grid -->

    <div class="admission-card">
      <div class="admission-left">
        <h3>Admissions Open — Apply Now</h3>
        <p>Secure your seat for the upcoming academic year. Diploma programmes across all branches.</p>
        <a class="btn-cta" href="registration.html">Apply Now</a>
      </div>
      <div class="admission-right" aria-hidden="true">
        <!-- decorative image or graphic -->
      </div>
    </div>

  </div> <!-- .container -->
</section>
<!-- END: about + new departments + admission block -->

</main>

<script>
    const toggleBtn = document.getElementById("darkModeToggle");
    toggleBtn.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");

        // Save preference
        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("theme", "dark");
        } else {
            localStorage.setItem("theme", "light");
        }
    });

    // Apply saved theme on load
    window.addEventListener("load", () => {
        const theme = localStorage.getItem("theme");
        if (theme === "dark") {
            document.body.classList.add("dark-mode");
        }
    });
</script>

  <footer class="site-footer">
    <p>&copy; 2025 Government Polytechnic College Khirsadoh</p>
    <b><p>| Designed By Naman Jain |</p></b>

    <div class="social-icons">
        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
    </div>
</footer>

</body>
</html>
