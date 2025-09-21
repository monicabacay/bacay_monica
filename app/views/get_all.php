<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student's Information</title>
  <style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #2d2d2d, #4b4b4b); /* Dark grey gradient */
    display: flex;
    justify-content: center;
    padding: 50px;
    position: relative;
    overflow: hidden;
    min-height: 100vh;
  }

  body::before, body::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    filter: blur(120px);
    opacity: 0.55;
    z-index: 0;
  }

  body::before {
    width: 500px;
    height: 500px;
    background: #800020; /* Burgundy glow */
    top: -60px;
    left: -120px;
  }

  body::after {
    width: 450px;
    height: 450px;
    background: #4b1c2f; /* Dark burgundy */
    bottom: -80px;
    right: -100px;
  }

  .container {
    width: 90%;
    max-width: 1000px;
    position: relative;
    z-index: 1;
  }

  /* Header */
  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    flex-wrap: wrap;
    gap: 12px;
  }

  .header h2 {
    font-size: 26px;
    font-weight: 700;
    color: #f3f4f6; /* Light grey text */
    margin: 0;
  }

  .actions {
    display: flex;
    gap: 10px;
    align-items: center;
  }

  .btn-add {
    background: #800020;
    color: #ffffff;
    font-size: 1rem;
    font-weight: 600;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    box-shadow: 0 3px 8px rgba(0,0,0,0.3);
    transition: all 0.3s ease-in-out;
  }

  .btn-add:hover {
    background: #a83246;
    transform: translateY(-2px);
  }

  /* Search Box */
  .search-box input {
    padding: 10px 14px;
    font-size: 15px;
    border-radius: 6px;
    border: 1px solid #9ca3af;
    outline: none;
    width: 220px;
    transition: 0.3s;
    background: #ffffff;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
  }

  .search-box input:focus {
    border-color: #800020;
    box-shadow: 0 2px 8px rgba(128,0,32,0.3);
  }

  /* Table */
  table {
    border-collapse: collapse;
    width: 100%;
    background-color: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25);
  }

  th, td {
    padding-top: 14px;
    padding-bottom: 14px;
    padding-right: 50px;
    padding-left: 50px;
    text-align: center;
    font-size: 15px;
    border-bottom: 1px solid #e5e7eb;
  }

   .table-header {
      display: grid;
      grid-template-columns: 1fr 2fr 2fr 3fr 2fr;
       background: #800020;
      color: white;
      font-weight: bold;
      padding-top: 10px;
      padding-bottom: 10px;
      width: 80%;
      margin: 0 auto;
      border-radius: 15px 15px 0 0;
      animation: slideUp 0.8s ease forwards;
      opacity: 0;
    }

  tr:nth-child(even) {
    background-color: #f3f4f6; /* Light grey rows */
  }

  tr:hover {
    background-color: #f3e6ec; /* Subtle burgundy hover */
    transition: 0.2s;
  }

  /* Action Buttons */
  a {
    font-weight: 500;
    text-decoration: none;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 14px;
    transition: 0.3s;
  }

  a[href*="update"] {
    background-color: #6b7280; /* Grey */
    color: white;
  }

  a[href*="update"]:hover {
    background-color: #4b5563;
  }

  a[href*="delete"] {
    background-color: #ef4444;
    color: white;
  }

  a[href*="delete"]:hover {
    background-color: #dc2626;
  }

  /* Pagination */
  .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 25px;
    gap: 8px;
    list-style: none;
    padding: 0;
  }

  .pagination a, 
  .pagination strong, 
  .pagination span {
    padding: 8px 14px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    background-color: #800020;
    color: white;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    transition: 0.3s;
  }

  .pagination a:hover {
    background-color: #a83246;
  }

  .pagination strong {
    background-color: #4b1c2f;
    cursor: default;
  }

  .pagination span {
    background-color: #9ca3af;
    color: #f3f4f6;
    cursor: not-allowed;
  }

  /* Table Header Div */
.table-header {
  display: grid;
  grid-template-columns: 1fr 2fr 2fr 3fr 2fr;
  background: #800020; /* Burgundy */
  color: #ffffff;
  font-weight: bold;
  text-align: center;
  padding: 12px 0;
  width: 100%;
  max-width: 1000px;
  margin: 0 auto;
  border-radius: 12px 12px 0 0;
  box-shadow: 0 4px 10px rgba(0,0,0,0.25);
  animation: fadeIn 0.8s ease forwards;
  opacity: 0;
}

/* Fade-in animation */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}

  </style>
</head>
<body>
  <div class="container">
    <!-- Header with Title + Search + Add -->
    <div class="header">
      <h2>Student's Information</h2>
      <div class="actions">
        <div class="search-box">
          <form method="get" action="">
            <input type="text" id="searchInput" name="search" placeholder="Search student...">
          </form>
        </div>
        <a href="<?=site_url('create')?>"><button class="btn-add">+ Add Student</button></a>
      </div>
    </div>



  <!-- Student Table Header -->
<div class="table-header">
  <div >Profile Pic </div>
  <div>ID</div>
  <div>First Name</div>
  <div>Last Name</div>
  <div>Email</div>
  <div>Actions</div>
</div>

<!-- Student Table -->
<table id="studentTable">
  <tbody>
    <?php foreach($students as $students): ?>
      <tr>
          <td>
            <?php if (!empty($students['profile_pic'])): ?>
              <img src="/upload/students/<?= $students['profile_pic'] ?>" 
                  alt="Profile" width="60" height="60" style="border-radius:50%;">
            <?php else: ?>
              <img src="/upload/default.png" 
                  alt="No Profile" width="60" height="60" style="border-radius:50%;">
            <?php endif; ?>
          </td> 

        <td><?=$students['id']; ?></td>
        <td><?=$students['first_name']; ?></td>
        <td><?=$students['last_name']; ?></td>
        <td><?=$students['email']; ?></td>
        <td>
          <a href="<?=site_url('/update/'.$students['id']); ?>">Update</a> 
          <a href="<?=site_url('/delete/'.$students['id']); ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

    <!-- Pagination -->
    <div class="pagination">
      <?= isset($pagination_links) ? $pagination_links : '' ?>
    </div>
  </div>

  <script>
let typingTimer;
document.getElementById("searchInput").addEventListener("keyup", function() {
  clearTimeout(typingTimer);
  let keyword = this.value;

  typingTimer = setTimeout(() => {
    fetch("<?= site_url('students/search') ?>?keyword=" + keyword)
      .then(res => res.text())
      .then(data => {
        // Replace table body with DB results
        document.querySelector("#studentTable tbody").innerHTML = data;
      });
  }, 300); // debounce 300ms to avoid too many requests
});
</script>
</body>
</html>
