<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include("connect.php");
?>
<?php include("header.php"); ?>
<div class="bg-imgs">
<div class="container">
  <div class="card shadow-lg p-4">
    <h2 class="text-center  mb-4 ">Create Your Resume</h2>
    <form action="process_form.php" method="POST">
    <input type="hidden" name="template_id" value="2">
      <div class="form-section ">
        <h5 class="mb-3 fw-bold mt-4 fs-4">Personal Details</h5>
        <div class="row g-3">
          <div class="col-md-6">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" id="name" name="full_name" class="form-control" placeholder="Your Name">
          </div>
          <div class="col-md-6">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" id="phone" name="phone_number" class="form-control" placeholder="+(000) 00000 00000">
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" name="email_address" class="form-control" placeholder="youremail@example.com">
          </div>
          <div class="col-md-6">
            <label for="linkedin" class="form-label">LinkedIn Profile</label>
            <input type="url" id="linkedin" name="linkedin_profile" class="form-control" placeholder="https://linkedin.com/in/yourname">
          </div>
        </div>
      </div>
      <div class="form-section">
        <h5 class="mb-3 mt-3 fw-bold fs-4">Professional Summary</h5>
        <textarea id="summary" rows="4" name="professional_summary" class="form-control" placeholder="Brief summary about your professional background...😊"></textarea>
      </div>
      <div class="form-section">
        <h5 class="mb-3 mt-4 fw-bold">Skills</h5>
        <div class="row g-3">
          <div class="col-md-6">
            <label for="skills" class="form-label">Technical Skills</label>
            <input type="text" id="skills" name="technical_skills" class="form-control" placeholder=" Frontend, Backend, Python, C++, etc.">
          </div>
          <div class="col-md-6">
            <label for="soft-skills" class="form-label">Soft Skills</label>
            <input type="text" id="soft-skills" name="soft_skills" class="form-control" placeholder=" Teamwork, Problem-Solving">
          </div>
        </div>
      </div>
      <div class="form-section">
        <h5 class="mb-3 mt-4 fw-bold fs-4">Education</h5>
        <div class="row g-3">
          <div class="col-md-4">
            <label for="course" class="form-label">Course</label>
            <input type="text" id="course" name="course" class="form-control" placeholder="B.Tech/B.Sc/Bca in _____">
          </div>
          <div class="col-md-4">
            <label for="college" class="form-label">College</label>
            <input type="text" id="college" name="college" class="form-control" placeholder="College / University">
          </div>
          <div class="col-md-4">
            <label for="passing-year" class="form-label">Passing Year</label>
            <input type="number" id="passing-year" name="passing_year" class="form-control" placeholder="0000">
          </div>
        </div>
      </div>

      <div class="form-section">
        <h5 class="mb-3 mt-4 fw-bold fs-4">Work Experience</h5>
        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" id="Toggles" name="has_experience">
          <label class="form-check-label" for="Toggles">I have experience</label>
        </div>

        <div id="experienceFields" class="row g-3 d-none">
          <div class="col-md-4">
            <label for="company-name" class="form-label">Company Name</label>
            <input type="text" id="company-name" name="company_name" class="form-control" placeholder="Name of the company">
          </div>
          <div class="col-md-4">
            <label for="post" class="form-label">Post</label>
            <input type="text" id="post" name="post" class="form-control" placeholder="e.g., Software Engineer">
          </div>
          <div class="col-md-4">
            <label for="working-year" class="form-label">Working Years</label>
            <input type="text" id="working-year" name="working_years" class="form-control" placeholder="20** to 20**">
          </div>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-danger col-md-4 px-5 py-2 mt-5 fs-5">Generate Resume</button>
      </div>
    </form>
  </div>
            
</div>

<script>
  const toggle = document.getElementById('Toggles');
  const fields = document.getElementById('experienceFields');

  toggle.addEventListener('change', () => {
    fields.classList.toggle('d-none', !toggle.checked);
  });
</script>

<?php include("footer.php"); ?>