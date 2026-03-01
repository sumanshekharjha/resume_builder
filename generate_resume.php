<?php
include 'connect.php';
$resumeId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$templateId = isset($_GET['template_id']) ? (int)$_GET['template_id'] : 0;
if ($resumeId <= 0 || $templateId <= 0) {
    die("❌ Invalid request.");
}
$stmt_resume = mysqli_prepare($conn, "SELECT * FROM resumes WHERE id=?");
if (!$stmt_resume) die("❌ Database error: " . mysqli_error($conn));
mysqli_stmt_bind_param($stmt_resume, "i", $resumeId);
mysqli_stmt_execute($stmt_resume);
$result_resume = mysqli_stmt_get_result($stmt_resume);
$resumeData = mysqli_fetch_assoc($result_resume);
mysqli_stmt_close($stmt_resume);
if (!$resumeData) die("❌ Resume not found.");
$educationData = [];
$stmt_edu = mysqli_prepare($conn, "SELECT * FROM education WHERE resume_id=?");
if ($stmt_edu) {
    mysqli_stmt_bind_param($stmt_edu, "i", $resumeId);
    mysqli_stmt_execute($stmt_edu);
    $educationData = mysqli_fetch_all(mysqli_stmt_get_result($stmt_edu), MYSQLI_ASSOC);
    mysqli_stmt_close($stmt_edu);
}
$experienceData = [];
$stmt_exp = mysqli_prepare($conn, "SELECT * FROM experience WHERE resume_id=?");
if ($stmt_exp) {
    mysqli_stmt_bind_param($stmt_exp, "i", $resumeId);
    mysqli_stmt_execute($stmt_exp);
    $experienceData = mysqli_fetch_all(mysqli_stmt_get_result($stmt_exp), MYSQLI_ASSOC);
    mysqli_stmt_close($stmt_exp);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php echo htmlspecialchars($resumeData['full_name']); ?>'s Resume</title>
<style>
.download-button-container {
    text-align: center;
    margin: 30px auto;
    padding: 10px;
}
.print-btn {
    background-color: #007bff;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
}
</style>
</head>
<body>
<div class="resume-preview">
    <?php
    if ($templateId == 1) {
        include 'template1.php';
    } elseif ($templateId == 2) {
        include 'template2.php';
    } else {
        die("❌ Invalid template selected.");
    }
    ?>
</div>

<div class="download-button-container no-print">
    <button class="print-btn" onclick="window.print()">Print / Save as PDF</button>
</div>
</body>
</html>