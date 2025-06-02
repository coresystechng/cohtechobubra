<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include './connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mat_no'])) {
    $mat_no = mysqli_real_escape_string($connect, $_POST['mat_no']);

    // Optionally, delete the passport image file from the server
    $img_query = "SELECT passport_image FROM student_tb WHERE mat_no = '$mat_no' LIMIT 1";
    $img_result = mysqli_query($connect, $img_query);
    if ($img_result && mysqli_num_rows($img_result) > 0) {
        $img_row = mysqli_fetch_assoc($img_result);
        if (!empty($img_row['passport_image'])) {
            $img_path = __DIR__ . '/uploads/' . $img_row['passport_image'];
            if (file_exists($img_path)) {
                @unlink($img_path);
            }
        }
    }

    // Delete the student record
    $sql = "DELETE FROM student_tb WHERE mat_no = '$mat_no' LIMIT 1";
    if (mysqli_query($connect, $sql)) {
        header("Location: view_students.php?msg=deleted");
        exit();
    } else {
        echo "<script>alert('Error deleting student.');window.location='view_students.php';</script>";
        exit();
    }
} else {
    header("Location: view_students.php");
    exit();
}
?>