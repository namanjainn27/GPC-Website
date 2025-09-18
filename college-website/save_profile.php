<?php
session_start();
include("config.php"); // Database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data safely
    $roll_no = isset($_POST['roll_no']) ? trim($_POST['roll_no']) : '';
    $name   = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email  = isset($_POST['email']) ? trim($_POST['email']) : '';
    $mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Validate required fields
    if (empty($roll_no) || empty($name) || empty($email) || empty($mobile) || empty($gender)) {
        die("All fields are required!");
    }

    // Profile Photo Upload
    $photo = "";
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $targetDir = "Images/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $photoName = uniqid() . "_" . basename($_FILES["photo"]["name"]);
        $targetFilePath = $targetDir . $photoName;

        // Move uploaded file
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
            $photo = $targetFilePath;
        } else {
            die("Error uploading photo.");
        }
    }

    // Insert data into student_profiles table
    $sql = "INSERT INTO student_profiles (roll_no, name, email, mobile, gender, photo) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $roll_no, $name, $email, $mobile, $gender, $photo);

    if ($stmt->execute()) {
        $_SESSION['roll_no'] = $roll_no; // Save roll_no in session
        header("Location: profile.php"); // Redirect to profile page
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
