<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Form</title>
<style>
  body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #2c2c2c, #4b4b4b, #800020); /* Grey + Burgundy gradient */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden;
    position: relative;
  }

  /* Background abstract accents */
  body::before, body::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    filter: blur(140px);
    opacity: 0.4;
    z-index: 0;
  }

  body::before {
    width: 420px;
    height: 420px;
    background: #800020; /* Burgundy glow */
    top: -120px;
    left: -100px;
  }

  body::after {
    width: 380px;
    height: 380px;
    background: #4b4b4b; /* Grey glow */
    bottom: -120px;
    right: -80px;
  }

  /* Form styling */
  form {
    background: #fff;
    padding: 35px;
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    width: 360px;
    position: relative;
    z-index: 10;
    text-align: center;
    border-top: 6px solid #800020; /* Burgundy accent */
  }

  h2 {
    color: #800020; /* Burgundy */
    margin-bottom: 25px;
    font-size: 1.8rem;
    font-weight: 700;
  }

  label {
    display: block;
    margin-bottom: 6px;
    color: #444;
    font-weight: 600;
    text-align: left;
  }

  input[type="text"],
  input[type="email"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 18px;
    border: 2px solid #ccc;
    border-radius: 10px;
    outline: none;
    font-size: 0.95rem;
    transition: 0.3s;
    background: #f9f9f9;
  }

  input[type="text"]:focus,
  input[type="email"]:focus {
    border-color: #800020;
    background-color: #fdf2f6; /* subtle burgundy tint */
    box-shadow: 0 0 6px rgba(128,0,32,0.4);
  }

  input[type="submit"] {
    width: 100%;
    padding: 12px;
    background: linear-gradient(to right, #800020, #4b4b4b);
    border: none;
    border-radius: 10px;
    color: white;
    font-weight: bold;
    font-size: 1rem;
    cursor: pointer;
    transition: transform 0.2s ease, background 0.3s;
  }

  input[type="submit"]:hover {
    background: linear-gradient(to right, #a83246, #2e2e2e);
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(128,0,32,0.4);
  }

  .actions {
    display: flex;
    justify-content: center;
    margin: 20px 0 40px 0;
    position: relative;
    z-index: 10;
  }

  .back-link {
    text-decoration: none;
    background: #f4f4f4;
    color: #800020;
    font-size: 1rem;
    font-weight: 600;
    padding: 10px 20px;
    border: 2px solid #800020;
    border-radius: 25px;
    transition: all 0.3s ease-in-out;
  }

  .back-link:hover {
    background: #800020;
    color: white;
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 4px 10px rgba(128,0,32,0.3);
  }

  .back-link:active {
    transform: scale(0.95);
  }
</style>
</head>
<body>

<form action="<?=site_url('/update/'.segment(3));?>" method="POST" enctype="multipart/form-data">
  <h2>Update Student</h2>

  <?php if (!empty($errors)): ?>
    <div style="color:red;">
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

  <label for="id">ID</label>
  <input type="text" id="id" value="<?=$student['id'];?>" name="id" placeholder="Your ID">

  <label for="first_name">First Name</label>
  <input type="text" id="first_name" name="first_name" value="<?=$student['first_name'];?>" placeholder="Your first name">

  <label for="last_name">Last Name</label>
  <input type="text" id="last_name" name="last_name" value="<?=$student['last_name'];?>" placeholder="Your last name">

  <label for="email">Email</label>
  <input type="email" id="email" name="email" value="<?=$student['email'];?>" placeholder="you@example.com">

  <!-- Show current profile picture -->
  <?php if (!empty($student['profile_pic'])): ?>
    <div style="text-align:center; margin-bottom:15px;">
      <img src="/upload/students/<?=$student['profile_pic'];?>" 
           alt="Current Profile" width="80" height="80" style="border-radius:50%; border:2px solid #ffb6c1;">
      <p style="color:#ff69b4; font-size:14px; margin-top:5px;">Current Profile Picture</p>
    </div>
  <?php endif; ?>

  <!-- File input for new profile pic -->
  <label for="profile_pic">Change Profile Picture</label>
  <input type="file" id="profile_pic" name="profile_pic" accept="image/*">

  <input type="submit" value="Submit">

  <div class="actions">
    <a class="back-link" href="<?=site_url('get_all')?>">⬅ Back to Students</a>
  </div>
</form>

</body>
</html>
