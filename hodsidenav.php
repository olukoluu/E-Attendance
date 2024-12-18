<aside class="side_nav position-sticky top-0 py-2 pt-4 text-center d-md-flex flex-column align-items-center border" style="height: 100vh; width: fit-content">
  <a href="hoddashboard.php" class="logo">
    <img src="template/images/logo.png" class="icon" alt="" style="width: 40px" />
  </a>
  <ul class="nav flex-column mt-4 h-100">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="hoddashboard.php">
        <img src="template/images/dashboard.png" alt="dashboard" style="width: 25px; padding-top: 20px;" />
        <p>Dashboard</p>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="courses.php">
        <img src="template/images/courses.png" alt="courses" style="width: 25px; padding-top: 20px;" />
        <p>Courses</p>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="lecturer.php">
        <img src="template/images/classes.png" alt="lecturers" style="width: 25px; padding-top: 20px;" />
        <p>Lecturers</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <img src="template/images/signout.png" alt="signout" style="width: 25px; padding-top: 20px;" />
        <p>Sign out</p>
      </a>
    </li>

  </ul>
</aside>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-triangle-exclamation"></i>Sign Out </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>Are you sure you want to sign out of your account?</h4>
      </div>
      <div class="modal-footer">
        <a href="logout.php" class="btn btn-secondary">Sign Out</a>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel!</button>
      </div>
    </div>
  </div>
</div>