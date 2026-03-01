<?php 
session_start();
include("header.php");  
?>

<style>
.temp-container {
  display: flex;
  flex-direction: column;
  gap: 30px;
  align-items: center;
  width: 100%;
  max-width: 500px;
  padding: 20px;
  margin: auto;
}

.temp-card {
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(0,0,0,0.15);
  width: 100%;
  text-align: center;
}

.temp-card img {
  width: 100%;
  height: 400px;
  object-fit: cover;
  display: block;
}

.temp-card h2 {
  margin: 15px 0;
  font-size: 20px;
  color: #222;
}

.generate-btn {
  display: inline-block;
  margin-bottom: 20px;
  padding: 12px 18px;
  border: 2px solid #111;
  border-radius: 8px;
  background: transparent;
  color: #111;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.2s ease;
}

.generate-btn:hover {
  background: #111;
  color: #fff;
  transform: scale(1.05);
}
</style>


<div class="temp-container">
  <div class="temp-card">
    <img src="images/template1.png" alt="Template 1">
    <h2>Template 1</h2>
    <a href="form1.php" class="generate-btn">Click Here To Generate</a>
  </div>

  <div class="temp-card">
    <img src="images/template2.png" alt="Template 2">
    <h2>Template 2</h2>
    <a href="form2.php" class="generate-btn">Click Here To Generate</a>
  </div>
</div>

<?php include("footer.php"); ?>
