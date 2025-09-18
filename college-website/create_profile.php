<?php
session_start();
include("config.php");

// Check if user is logged in
if (!isset($_SESSION['roll_no'])) {
    header("Location: login.php");
    exit();
}

$roll_no = $_SESSION['roll_no'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $course = $_POST['course'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $admission_year = $_POST['admission_year'];
    $address = $_POST['address'];

    // Handle photo upload
    $photo = "";
    if (!empty($_FILES["photo"]["name"])) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $photo = $target_dir . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $photo);
    }

    // Insert into student_profiles
    $stmt = $conn->prepare("INSERT INTO student_profiles 
        (roll_no, name, email, mobile, gender, dob, course, branch, semester, admission_year, address, photo) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $roll_no, $name, $email, $mobile, $gender, $dob, $course, $branch, $semester, $admission_year, $address, $photo);

    if ($stmt->execute()) {
        echo "<script>alert('Profile created successfully!'); window.location='profile.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f9;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      width: 100%;
      max-width: 650px;
      background: #fff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #2c3e50;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: 600;
      margin-bottom: 8px;
      display: block;
      color: #34495e;
    }

    .form-group input, 
    .form-group select {
      width: 100%;
      padding: 12px;
      border: 1px solid #dcdcdc;
      border-radius: 6px;
      font-size: 14px;
      transition: 0.2s;
    }

    .form-group input:focus, 
    .form-group select:focus {
      border-color: #3498db;
      outline: none;
      box-shadow: 0 0 5px rgba(52,152,219,0.5);
    }

    .form-group i {
      margin-right: 8px;
      color: #3498db;
    }

    .btn {
      width: 100%;
      padding: 14px;
      border: none;
      background: #3498db;
      color: #fff;
      font-size: 16px;
      font-weight: 600;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn:hover {
      background: #2980b9;
    }

    .note {
      text-align: center;
      font-size: 13px;
      margin-top: 10px;
      color: #888;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2><i class="fas fa-user-graduate"></i> Create Student Profile</h2>
    <form action="save_profile.php" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label><i class="fas fa-user"></i> Full Name</label>
        <input type="text" name="name" placeholder="Enter Full Name" required>
      </div>

      <div class="form-group">
        <label><i class="fas fa-envelope"></i> Email</label>
        <input type="email" name="email" placeholder="Enter Email" required>
      </div>

      <div class="form-group">
        <label><i class="fas fa-phone"></i> Mobile</label>
        <input type="text" name="mobile" placeholder="Enter Mobile Number" required>
      </div>

      <div class="form-group">
        <label><i class="fas fa-venus-mars"></i> Gender</label>
        <select name="gender" required>
          <option value="">-- Select Gender --</option>
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>

      <div class="form-group">
      <label>DOB</label>
      <input type="date" name="dob" required>
      </div>

       <div class="form-group">
       <label> Course </label>
        <select name="course" required>
            <option value="">-- Select Course --</option>
            <option>Diploma</option>
        </select>
        </div>

        <div class="form-group">
        <label> Branch </label>
        <select name="branch" required>
            <option value="">-- Select Branch --</option>
            <option>Computer Science Engineering</option>
            <option>Information Technology Engineering</option>
            <option>Civil Engineering</option>
            <option>Electrical Engineering</option>
            <option>Mechanical Engineering</option>
            <option>Electronics and Telecommunication Engineering</option>
            <option>Mining Engineering</option>
        </select>
        </div>

        <div class="form-group">
            <label>Year</label>
        <select name="year" required>
            <option value="">-- Select Year --</option>
            <option>1st Year</option>
            <option>2nd Year</option>
            <option>3rd Year</option>
        </select>
        </div>

        <div class="form-group">
            <label>Semester</label>
        <select name="semester" required>
            <option value="">-- Select Semester --</option>
            <option>1st Semester</option>
            <option>2nd Semester</option>
            <option>3rd Semester</option>
            <option>4th Semester</option>
            <option>5th Semester</option>
            <option>6th Semester</option>
        </select>
        </div>

        <div class="form-group">
             <label>Admission Year:</label>
             <input type="number" name="admission_year" placeholder="Enter Admission Year" required>
        </div>
        
        <div class="form-group">
            <label>Address:</label>
            <input type="textarea" name="address" placeholder="Enter Address" required>
        </div>
        
      <div class="form-group">
        <label><i class="fas fa-image"></i> Profile Photo</label>
        <input type="file" name="photo" required>
      </div>

      <button type="submit" class="btn"><i class="fas fa-save"></i> Save Profile</button>
    </form>
    <p class="note">Your details will be stored securely in our database.</p>
  </div>
</body>
</html>
