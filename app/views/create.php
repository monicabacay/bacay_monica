<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Form - Burgundy & Grey Theme</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #5a2a2a 0%, #3b1f1f 35%, #2c2c2c 70%, #1a1a1a 100%);
    /* Burgundy → dark burgundy → grey-black gradient */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden;
    position: relative;
  }

  /* Glowing accents */
  body::before, body::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    filter: blur(180px);
    opacity: 0.25;
    z-index: 0;
  }

  body::before {
    width: 500px;
    height: 500px;
    background: #800020; /* rich burgundy glow */
    top: -150px;
    left: -180px;
  }

  body::after {
    width: 450px;
    height: 450px;
    background: #4b4b4b; /* grey glow */
    bottom: -150px;
    right: -180px;
  }

  form {
    background-color: rgba(255,255,255,0.97);
    padding: 35px;
    border-radius: 16px;
    box-shadow: 0 6px 28px rgba(0,0,0,0.25);
    width: 360px;
    position: relative;
    z-index: 10;
    backdrop-filter: blur(10px);
  }

  h2 {
    text-align: center;
    color: #800020; /* burgundy */
    margin-bottom: 25px;
    font-size: 24px;
    font-weight: bold;
    letter-spacing: 1px;
  }

  label {
    display: block;
    margin-bottom: 6px;
    color: #374151;
    font-weight: bold;
    font-size: 14px;
  }

  input[type="text"],
  input[type="email"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 18px;
    border: 2px solid #d1d5db;
    border-radius: 8px;
    outline: none;
    background-color: #f9fafb;
    transition: 0.3s;
    font-size: 14px;
  }

  input[type="text"]:focus,
  input[type="email"]:focus {
    border-color: #800020;
    background-color: #ffffff;
    box-shadow: 0 0 6px rgba(128,0,32,0.4);
  }

  input[type="submit"] {
    width: 100%;
    padding: 12px;
    background: linear-gradient(90deg, #800020, #4b4b4b);
    border: none;
    border-radius: 8px;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
    font-size: 15px;
  }

  input[type="submit"]:hover {
    background: linear-gradient(90deg, #a83246, #2e2e2e);
    transform: scale(1.03);
    box-shadow: 0 4px 12px rgba(128,0,32,0.4);
  }

  .actions {
    display: flex;
    justify-content: center;
    margin: 20px 0 10px 0;
    position: relative;
    z-index: 10;
  }

  .back-link {
    text-decoration: none;
    background: linear-gradient(135deg, #e5e7eb, #d1d5db);
    color: #800020;
    font-family: Arial, sans-serif;
    font-size: 1rem;
    font-weight: bold;
    padding: 10px 20px;
    border: 2px solid #800020;
    border-radius: 25px;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  }

  .back-link:hover {
    background: linear-gradient(135deg, #800020, #6b7280);
    color: white;
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 6px 14px rgba(0,0,0,0.25);
  }

  .back-link:active {
    transform: scale(0.95);
  }
</style>
</head>
<body>

<form action="<?=site_url('/create');?>" method="POST" enctype="multipart/form-data">
  <h2>Student Information</h2>

  <?php if (!empty($errors)): ?>
    <div style="color:red;">
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

  <label for="first_name">First Name</label>
  <input type="text" id="first_name" name="first_name" placeholder="Your first name">

  <label for="last_name">Last Name</label>
  <input type="text" id="last_name" name="last_name" placeholder="Your last name">

  <label for="email">Email</label>
  <input type="email" id="email" name="email" placeholder="you@example.com">

   <label for="profile_pic">Upload File</label>
  <input type="file" id="profile_pic" name="profile_pic">

  <input type="submit" value="Submit">

  <div class="actions">
    <a class="back-link" href="<?=site_url('get_all')?>">
      ⬅ Back to Students
    </a>
  </div>
</form>
  
</body>
</html>
       

