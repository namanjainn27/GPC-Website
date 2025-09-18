<?php
session_start();
include("config.php");

// Check if user is logged in
if (!isset($_SESSION['roll_no'])) {
    header("Location: login.php");
    exit();
}

$roll_no = $_SESSION['roll_no'];

// Fetch student profile
$stmt = $conn->prepare("SELECT * FROM student_profiles WHERE roll_no = ?");
$stmt->bind_param("s", $roll_no);
$stmt->execute();
$result = $stmt->get_result();
$profile = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .profile-container {
            width: 70%;
            margin: 30px auto;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 10px;
            background: #f9f9f9;
        }
        .profile-header {
            text-align: center;
        }
        .profile-photo {
            display: block;
            margin: 15px auto;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #444;
        }
        .profile-details {
            margin-top: 20px;
            font-size: 16px;
            line-height: 1.8;
        }
        .profile-details strong {
            display: inline-block;
            width: 180px;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .btn-container a {
            display: inline-block;
            padding: 10px 15px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
        }
        .btn-container a:hover {
            background: #45a049;
        }

        .footer {
  background-color: #003366;
  color: #faf8f8;
  text-align: center;
  padding: 10px;
}

header {
  background-color: #003366;
  color:aliceblue;
  padding: 15px;
  text-align: center;
}

.welcome-heading {
  color:aqua;
}

nav {
  display: flex;
  gap: 20px; /* space between links */
  justify-content: center; /* center the links */
  background-color:firebrick; /* optional background */
  padding: 10px 0;
}

nav a {
  text-decoration: none;
  color:aqua;
  font-weight: bold;
}

nav a:hover {
  color: hwb(56 0% 0%); /* change color on hover */
}
    </style>
</head>

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
    </nav>
    </header>

<body>
    <div class="profile-container">
        <div class="profile-header">
            <h2>My Profile</h2>
            <?php if (!empty($profile['photo'])): ?>
                <img src="<?php echo $profile['photo']; ?>" alt="Profile Photo" class="profile-photo">
            <?php else: ?>
                <img src="default.png" alt="Default Photo" class="profile-photo">
            <?php endif; ?>
        </div>

        <div class="profile-details">
            <p><strong>Roll Number:</strong> <?php echo htmlspecialchars($profile['roll_no']); ?></p>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($profile['name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($profile['email']); ?></p>
            <p><strong>Mobile:</strong> <?php echo htmlspecialchars($profile['mobile']); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($profile['gender']); ?></p>
            <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($profile['dob']); ?></p>
            <p><strong>Course:</strong> <?php echo htmlspecialchars($profile['course']); ?></p>
            <p><strong>Branch:</strong> <?php echo htmlspecialchars($profile['branch']); ?></p>
            <p><strong>Semester:</strong> <?php echo htmlspecialchars($profile['semester']); ?></p>
            <p><strong>Admission Year:</strong> <?php echo htmlspecialchars($profile['admission_year']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($profile['address']); ?></p>
        </div>

        <div class="btn-container">
            <a href="edit_profile.php"><i class="fas fa-edit"></i> Edit Profile</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

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
