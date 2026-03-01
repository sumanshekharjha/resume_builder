<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php echo htmlspecialchars($resumeData['full_name']); ?> - Resume</title>
<style>
   @page {
  size: A4 portrait;
  margin: 1.5cm; 
}

body, html {
  margin: 0;
  padding: 0;
  height: 29.7cm;
  width: 21cm;
  box-sizing: border-box;
}

.resume-container {
  box-sizing: border-box;
  width: 100%;
  height: 100%;
  padding: 1cm;
  overflow: hidden;
}

header {
    text-align: center;
    margin-bottom: 1.5rem;
    border-bottom: 3px solid #333;
    padding-bottom: 0.75rem;
}
    header h1 {
        font-size: 2.8rem;
        margin: 0;
        font-weight: 800;
        letter-spacing: 0.05em;
    }
    header p {
        margin-top: 0.8rem;
        font-size: 1.1rem;
        color: #444;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        white-space: pre-wrap;
    }
    section {
        margin-bottom: 1.8rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #ddd;
    }
    section:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    section h2 {
        font-size: 1.7rem;
        font-weight: 700;
        border-left: 5px solid #007bff;
        padding-left: 0.5rem;
        margin-bottom: 1rem;
        color: #0056b3;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .skills-list {
        list-style: disc inside;
        margin: 0;
        padding-left: 1rem;
    }
    .skills-list li {
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }
    .education-item, .experience-item {
        margin-bottom: 1rem;
    }
    .education-course {
        font-weight: 600;
        font-size: 1.1rem;
        margin: 0 0 0.3rem 0;
        color: #222;
    }
    .education-details {
        font-size: 1rem;
        color: #555;
    }
    .experience-header {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        font-weight: 600;
        font-size: 1.1rem;
        color: #222;
    }
    .experience-header span {
        color: #666;
        font-weight: 400;
        font-size: 1rem;
    }
    .experience-company {
        margin-top: 0.3rem;
        font-style: italic;
        color: #555;
    }
    .contact-info p {
        margin: 0.3rem 0;
        font-size: 1rem;
        color: #333;
        word-break: break-word;
    }
    .contact-info a {
        color: #007bff;
        text-decoration: none;
        word-break: break-word;
    }
    @media print {
        body, .resume-container {
            width: 21cm;
            height: 29.7cm;
            padding: 2cm;
            margin: 0;
            box-shadow: none;
            background: #fff;
            color: #222;
        }
        a {
            color: #000 !important;
            text-decoration: underline !important;
        }
    }
    @media print {
  
  button, .btn, .no-print, .header-bar, .nav-bar, footer {
    display: none !important;
  }
}

</style>
</head>
<body>
<div class="resume-container">
    <header>
        <h1><?php echo htmlspecialchars($resumeData['full_name']); ?></h1>
        <p><?php echo nl2br(htmlspecialchars($resumeData['professional_summary'])); ?></p>
    </header>

    <section>
        <h2>Contact</h2>
        <div class="contact-info">
            <p>Phone: <?php echo htmlspecialchars($resumeData['phone_number']); ?></p>
            <p>Email: <a href="mailto:<?php echo htmlspecialchars($resumeData['email_address']); ?>"><?php echo htmlspecialchars($resumeData['email_address']); ?></a></p>
            <p>LinkedIn: <a href="<?php echo htmlspecialchars($resumeData['linkedin_profile']); ?>" target="_blank" rel="noopener noreferrer"><?php echo htmlspecialchars($resumeData['linkedin_profile']); ?></a></p>
        </div>
    </section>

    <section>
        <h2>Skills</h2>
        <ul class="skills-list">
            <?php 
            // Technical skills might be comma separated or space separated, split by comma or newline
            $techSkills = preg_split('/[\r\n,]+/', $resumeData['technical_skills']);
            foreach ($techSkills as $skill) {
                $skill = trim($skill);
                if ($skill !== '') {
                    echo '<li>' . htmlspecialchars($skill) . '</li>';
                }
            }
            // Soft skills split by comma or newline too
            $softSkills = preg_split('/[\r\n,]+/', $resumeData['soft_skills']);
            foreach ($softSkills as $skill) {
                $skill = trim($skill);
                if ($skill !== '') {
                    echo '<li>' . htmlspecialchars($skill) . '</li>';
                }
            }
            ?>
        </ul>
    </section>

    <section>
        <h2>Education</h2>
        <?php if (!empty($educationData)): ?>
            <?php foreach ($educationData as $edu): ?>
                <div class="education-item">
                    <div class="education-course"><?php echo htmlspecialchars($edu['course']); ?></div>
                    <div class="education-details"><?php echo htmlspecialchars($edu['college']); ?> — <?php echo htmlspecialchars($edu['passing_year']); ?></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No education listed.</p>
        <?php endif; ?>
    </section>

    <?php if (!empty($experienceData)): ?>
    <section>
        <h2>Work Experience</h2>
        <?php foreach ($experienceData as $exp): ?>
            <div class="experience-item">
                <div class="experience-header">
                    <span><?php echo htmlspecialchars($exp['post']); ?></span>
                    <span><?php echo htmlspecialchars($exp['working_years']); ?></span>
                </div>
                <div class="experience-company"><?php echo htmlspecialchars($exp['company_name']); ?></div>
            </div>
        <?php endforeach; ?>
    </section>
    <?php endif; ?>
</div>
</body>
</html>
