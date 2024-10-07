<?php 
session_start();
include "db_conn.php";

if (isset($_POST['id'])) {
    
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_POST['id']);
    $username = validate($_POST['username']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $address = validate($_POST['address']);

    // Check for empty fields
    if (empty($username) || empty($email) || empty($phone) || empty($address)) {
        header("Location: ProfilePage.php?error=All fields are required");
        exit();
    } else {
        // Update user data in the database
        $sql = "UPDATE users SET username='$username', email='$email', phone='$phone', address='$address' WHERE id='$id'";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: ProfilePage.php?success=Profile updated successfully");
            exit();
        } else {
            header("Location: ProfilePage.php?error=Error updating profile");
            exit();
        }
    }
} else {
    header("Location: login.php");
    exit();
}
