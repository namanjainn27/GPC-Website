<?php
session_start();
include "config.php";

// ✅ Ensure user is logged in
if (!isset($_SESSION['roll_no'])) {
    die("You must login first.");
}

$roll_no = $_SESSION['roll_no'];

// ✅ Collect form data safely
$name   = isset($_POST['name']) ? trim($_POST['name']) : '';
$email  = isset($_POST['email']) ? trim($_POST['email']) : '';
$mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
$gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

// ✅ Handle profile photo upload
$profile_photo = null;
if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == 0) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // create folder if not exists
    }

    $fileName = uniqid() . "_" . basename($_FILES["profile_photo"]["name"]);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $targetFile)) {
        $profile_photo = $targetFile;
    }
}

// ✅ Update query (update photo only if uploaded)
if ($profile_photo) {
    $sql = "UPDATE students SET name=?, email=?, mobile=?, gender=?, profile_photo=? WHERE roll_no=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $email, $mobile, $gender, $profile_photo, $roll_no);
} else {
    $sql = "UPDATE students SET name=?, email=?, mobile=?, gender=? WHERE roll_no=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $mobile, $gender, $roll_no);
}

if ($stmt->execute()) {
    echo "<script>alert('✅ Profile updated successfully!'); window.location='profile.php';</script>";
} else {
    echo "❌ Error: " . $conn->error;
}
?>
