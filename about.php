<?php 
session_start();
include("header.php");  
?>
  <style>
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background: #fcfcfbff;
      color: #2F2519;
      line-height: 1.6;
    }
    main { max-width: 900px; margin: auto; padding: 2rem; }
    h1,h2,h3 { margin: 1rem 0; }
    h1 { font-size: 2rem; text-align: center; }
    h2 { font-size: 1.5rem; text-align: center; }
    p { color: #5C4033; }

    .callout {
      background: #F3EFE0;
      border: 1px solid #D2B48C;
      padding: 1rem;
      border-radius: 8px;
      text-align: center;
    }

    .tabs { background: #fff; padding: 1rem; border-radius: 8px; }
    .tab-buttons { display: flex; gap: .5rem; flex-wrap: wrap; justify-content: center; margin-bottom: 1rem; }
    .tab-buttons button {
      border: none; cursor: pointer; padding: .5rem 1rem;
      border-radius: 999px; background: #F3EFE0; color: #2F2519;
    }
    .tab-buttons button.active { background: #5C4033; color: #fff; }
    .tab-content { display: none; padding: 1rem; background: #F8F5E9; border: 1px solid #D2B48C; border-radius: 8px; }
    .tab-content.active { display: block; }

    /* Importance box */
    .importance {
      margin-top: 3rem; padding: 2rem; text-align: center;
      color: white; border-radius: 12px;
      background: linear-gradient(to right, #5C4033, #2F2519);
    }
    .importance p { color: #D2B48C; }
  </style>
</head>
<body>
  <main>
    
    <section>
      <h1>What is a Resume?</h1>
      <p>A resume is a formal document that provides a summary of your professional and academic history.</p>
      <div class="callout">Think of it as your personal marketing document to get an interview.</div>
    </section>

    <section>
      <h2>Key Sections of a Resume</h2>
      <div class="tabs">
        <div class="tab-buttons">
          <button data-tab="contact">📞 Contact</button>
          <button data-tab="summary">💬 Summary</button>
          <button data-tab="education">🎓 Education</button>
          <button data-tab="skills">🛠 Skills</button>
          <button data-tab="experience">💼 Experience</button>
        </div>
        <div id="contact" class="tab-content"><h3>Contact Info</h3><p>Name, phone, email, LinkedIn or portfolio link.</p></div>
        <div id="summary" class="tab-content"><h3>Summary / Objective</h3><p>Objective for freshers; Summary for experienced professionals.</p></div>
        <div id="education" class="tab-content"><h3>Education</h3><p>Degree, university, graduation date.</p></div>
        <div id="skills" class="tab-content"><h3>Skills</h3><p>Technical (e.g., Python, Photoshop) + Soft skills (communication, teamwork).</p></div>
        <div id="experience" class="tab-content"><h3>Experience</h3><p>Jobs, internships – include role, company, dates.</p></div>
      </div>
    </section>

    <section class="importance">
      <h2>Why is a Resume Important?</h2>
      <p>A resume is your first impression. Even without much experience, it shows your skills, dedication, and potential.</p>
    </section>
  </main>

  <script>
    const buttons = document.querySelectorAll(".tab-buttons button");
    const contents = document.querySelectorAll(".tab-content");
    function showTab(id) {
      contents.forEach(c => c.classList.remove("active"));
      buttons.forEach(b => b.classList.remove("active"));
      document.getElementById(id).classList.add("active");
      document.querySelector(`[data-tab="${id}"]`).classList.add("active");
    }
    buttons.forEach(btn => btn.onclick = () => showTab(btn.dataset.tab));
    showTab("contact");
  </script>
<?php include("footer.php"); ?>