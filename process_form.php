<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $template_id = intval($_POST['template_id']);
    $full_name = trim($_POST['full_name']);
    $phone_number = trim($_POST['phone_number']);
    $email_address = trim($_POST['email_address']);
    $linkedin_profile = trim($_POST['linkedin_profile']);
    $professional_summary = trim($_POST['professional_summary']);
    $technical_skills = trim($_POST['technical_skills']);
    $soft_skills = trim($_POST['soft_skills']);
    $course = trim($_POST['course']);
    $college = trim($_POST['college']);
    $passing_year = trim($_POST['passing_year']);
    $has_experience = isset($_POST['has_experience']);
    $company_name = $post = $working_years = '';
    if ($has_experience) {
        $company_name = trim($_POST['company_name']);
        $post = trim($_POST['post']);
        $working_years = trim($_POST['working_years']);
    }
    $sql_resume = "INSERT INTO resumes (user_id, template_id, full_name, phone_number, email_address, linkedin_profile, professional_summary, technical_skills, soft_skills) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_resume);
    mysqli_stmt_bind_param($stmt, "iisssssss", $user_id, $template_id, $full_name, $phone_number, $email_address, $linkedin_profile, $professional_summary, $technical_skills, $soft_skills);
    if (!mysqli_stmt_execute($stmt)) {
        die("Error inserting resume: " . mysqli_error($conn));
    }
    mysqli_stmt_close($stmt);
    $resume_id = mysqli_insert_id($conn);
    $sql_edu = "INSERT INTO education (resume_id, course, college, passing_year) VALUES (?, ?, ?, ?)";
    $stmt_edu = mysqli_prepare($conn, $sql_edu);
    mysqli_stmt_bind_param($stmt_edu, "isss", $resume_id, $course, $college, $passing_year);
    mysqli_stmt_execute($stmt_edu);
    mysqli_stmt_close($stmt_edu);

    if ($has_experience) {
        $sql_exp = "INSERT INTO experience (resume_id, company_name, post, working_years) VALUES (?, ?, ?, ?)";
        $stmt_exp = mysqli_prepare($conn, $sql_exp);
        mysqli_stmt_bind_param($stmt_exp, "isss", $resume_id, $company_name, $post, $working_years);
        mysqli_stmt_execute($stmt_exp);
        mysqli_stmt_close($stmt_exp);
    }
    header("Location: generate_resume.php?id=" . $resume_id . "&template_id=" . $template_id);
    exit();
}
else {
    echo "Invalid request.";
}
?>
