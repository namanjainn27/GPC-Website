<?php
session_start();
include ("config.php");

// ✅ Check if user is logged in
if (!isset($_SESSION['roll_no'])) {
    die("You must login first.");
}

$roll_no = $_SESSION['roll_no'];

// ✅ Fetch profile data
$sql = "SELECT * FROM students WHERE roll_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $roll_no);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("⚠️ No profile found for Roll No: $roll_no");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f8f9fa;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 50%;
      margin: 50px auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
    h2 {
      text-align: center;
      color: #333;
    }
    label {
      font-weight: bold;
      display: block;
      margin-top: 10px;
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #42df12ff;
      border-radius: 5px;
    }
    button {
      margin-top: 15px;
      padding: 10px;
      width: 100%;
      border: none;
      background:darkgrey;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #0056b3;
    }
    .profile-photo {
      text-align: center;
      margin-bottom: 15px;
    }
    .profile-photo img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
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
  <div class="container">
    <h2>Edit Profile</h2>

    <div class="profile-photo">
      <img src="<?php echo !empty($row['profile_photo']) ? $row['profile_photo'] : 'default.png'; ?>" alt="Profile Photo">
    </div>

    <form action="update_profile.php" method="POST" enctype="multipart/form-data">
      
      <label>Name:</label>
      <input type="text" name="name" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" required>

      <label>Roll No:</label>
      <input type="text" name="roll_no" value="<?php echo isset($row['roll_no']) ? $row['roll_no'] : ''; ?>" readonly>

      <label>Email:</label>
      <input type="email" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" required>

      <label>Mobile:</label>
      <input type="text" name="mobile" value="<?php echo isset($row['mobile']) ? $row['mobile'] : ''; ?>" required>

      <label>Gender:</label>
      <select name="gender" required>
        <option value="Male" <?php echo (isset($row['gender']) && $row['gender']=="Male") ? "selected" : ""; ?>>Male</option>
        <option value="Female" <?php echo (isset($row['gender']) && $row['gender']=="Female") ? "selected" : ""; ?>>Female</option>
        <option value="Other" <?php echo (isset($row['gender']) && $row['gender']=="Other") ? "selected" : ""; ?>>Other</option>
      </select>

      <label>Profile Photo:</label>
      <input type="file" name="profile_photo">

      <div class="btn-container">
            <button type="submit"><a href="update_profile.php">Update Profile</a></button>
        </div>
    </form>
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
