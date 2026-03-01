<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo htmlspecialchars($resumeData['full_name']); ?>'s Resume</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet"
  />
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      background: #f9f9f9;
      margin: 0;
      padding: 0;
      color: #333;
      line-height: 1.6;
    }

    .resume-container {
      background: #fff;
      width: 21cm;
      min-height: 29.7cm;
      margin: 20px auto;
      padding: 0cm 0cm;
      display: flex;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
      border-radius: 6px;
      box-sizing: border-box;
    }

    .sidebar {
      width: 35%;
      background-color: #2c3e50;
      color: #fff;
       padding:1.2rem 0.7rem;
     
      display: flex;
      flex-direction: column;
      gap: 2rem;
      border-radius: 6px 0 0 6px;
      box-sizing: border-box;
    }

    .sidebar h2 {
      font-size: 2rem;
      margin: 0 5 5px;
      font-weight: 800;
      letter-spacing: 1.2px;
      margin-left:1rem;
    }

    
    

    .sidebar h3 {
      border-bottom: 2px solid #5d9cec;
      padding-bottom: 5px;
      margin-bottom: 12px;
      font-weight: 700;
      font-size: 1.2rem;
      letter-spacing: 0.02em;
    }

    .sidebar p,
    .sidebar a {
      font-size: 1rem;
      color: #d1d9e6;
      margin: 6px 0;
      word-break: break-word;
    }

    .sidebar a {
      color: #5d9cec;
      text-decoration: none;
    }


   .skills-list {
  list-style-type: disc !important;
  padding-left: 20px !important;
  margin: 0 !important;
}
.skills-list li {
  display: list-item !important;
  list-style-position: inside !important;
  margin: 4px 0;
}


    .main-content {
      width: 72%;
      padding-left: 1.8rem;
      box-sizing: border-box;
      display: flex;
      flex-direction: column;
     margin-top:15px;
    }

    .header {
      border-bottom: 2px solid #444;
      padding-bottom: 20px;
      margin-bottom: 30px;
      text-align: left;
    }

    .name {
      font-size: 3rem;
      font-weight: 800;
      margin: 0;
      color: #111;
      letter-spacing: 1.5px;
    }

    .post-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: #555;
      margin-top: 6px;
    }

    .summary {
      font-size: 1.1rem;
      color: #555;
      margin-top: 20px;
      max-width: 100%;
      line-height: 1.8;
      overflow-wrap: break-word;
    }

    .section {
      margin-left:0.02rem;
      margin-bottom: 35px;
      padding-bottom: 15px;
      border-bottom: 1.5px solid #ccc;
    }

    .section-title {
      font-size: 1.8rem;
      font-weight: 700;
      color: #222;
      margin-bottom: 20px;
      letter-spacing: 0.03em;
    }

    .experience-item {
      margin-bottom: 20px;
    }

    .experience-header {
      display: flex;
      justify-content: space-between;
      align-items: baseline;
      border-left: 4px solid #007bff;
      padding-left: 14px;
      margin-bottom: 10px;
    }

    .experience-title {
      font-size: 1.2rem;
      font-weight: 700;
      color: #222;
      letter-spacing: 0.02em;
    }

    .experience-years {
      font-size: 1rem;
      color: #666;
      font-style: italic;
      min-width: 110px;
      text-align: right;
      margin-right:1em;
    }

    .experience-description {
      font-size: 1rem;
      color: #444;
      margin-top: 6px;
      line-height: 1.5;
      padding-left: 16px;
    }

    .education-item {
      margin-bottom: 20px;
    }

    .education-course {
      font-size: 1.2rem;
      font-weight: 700;
      margin: 0;
      color: #222;
    }

    .education-college {
      font-size: 1.05rem;
      color: #555;
      margin: 6px 0 3px 0;
    }

    .education-year {
      font-size: 0.95rem;
      color: #777;
    }

    @media print {
      @page {
        size: A4 portrait;
        margin: 0;
      }
      body {
        background: none;
        padding: 0;
        margin: 0;
      }
      .resume-container {
        box-shadow: none;
        border-radius: 0;
        width: 21cm;
        min-height: 29.7cm;
        padding: 3cm 2.5cm;
        margin: 0;
        display: flex;
      }
      .sidebar {
        border-radius: 0;
        padding: 2rem 1.8rem;
      }
      .main-content {
        padding-left: 3rem;
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
    <aside class="sidebar">
      <h2><?php echo htmlspecialchars($resumeData['full_name']); ?></h2>
      
      <div>
        <h3>Contact</h3>
        <p>Email: <a href="mailto:<?php echo htmlspecialchars($resumeData['email_address']); ?>"><?php echo htmlspecialchars($resumeData['email_address']); ?></a></p>
        <p>Phone: <?php echo htmlspecialchars($resumeData['phone_number']); ?></p>
        <p>LinkedIn: <a href="<?php echo htmlspecialchars($resumeData['linkedin_profile']); ?>" target="_blank"><?php echo htmlspecialchars($resumeData['linkedin_profile']); ?></a></p>
      </div>

      <div>
        <h3> Skills</h3>
        <ul class="skills-list">
          <h3>Technical Skills</h3>
<ul>
<?php 
    $techSkills = preg_split('/[\r\n,]+/', $resumeData['technical_skills']);
    foreach ($techSkills as $skill) {
        $skill = trim($skill);
        if ($skill !== '') {
            echo '<li>' . htmlspecialchars($skill) . '</li>';
        }
    }
?>
</ul>

<h3>Soft Skills</h3>
<ul>
<?php
    $softSkills = preg_split('/[\r\n,]+/', $resumeData['soft_skills']);
    foreach ($softSkills as $skill) {
        $skill = trim($skill);
        if ($skill !== '') {
            echo '<li>' . htmlspecialchars($skill) . '</li>';
        }
    }
?>
</ul>

      </div>
    </aside>

    <main class="main-content">
      <header class="header">
        <h1 class="name"><?php echo htmlspecialchars($resumeData['full_name']); ?></h1>
        
        <p class="summary"><?php echo nl2br(htmlspecialchars($resumeData['professional_summary'])); ?></p>
      </header>

      <section class="section">
        <h4 class="section-title">Experience</h4>
        <?php if (!empty($experienceData)): ?>
          <?php foreach ($experienceData as $exp): ?>
            <div class="experience-item">
              <div class="experience-header">
                <span class="experience-title"><?php echo htmlspecialchars($exp['post']); ?> at <?php echo htmlspecialchars($exp['company_name']); ?></span>
                <span class="experience-years"><?php echo htmlspecialchars($exp['working_years']); ?></span>
              </div>
              <?php if (!empty($exp['description'])): ?> 
                <p class="experience-description"><?php echo nl2br(htmlspecialchars($exp['description'])); ?></p> 
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No work experience listed.</p>
        <?php endif; ?>
      </section>

      <section class="section">
        <h4 class="section-title">Education</h4>
        <?php if (!empty($educationData)): ?>
          <?php foreach ($educationData as $edu): ?>
            <div class="education-item">
              <h5 class="education-course"><?php echo htmlspecialchars($edu['course']); ?></h5>
              <p class="education-college"><?php echo htmlspecialchars($edu['college']); ?></p>
              <span class="education-year"><?php echo htmlspecialchars($edu['passing_year']); ?></span>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No education listed.</p>
        <?php endif; ?>
      </section>
    </main>
  </div>
</body>
</html>
