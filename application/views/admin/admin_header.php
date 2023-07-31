<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<?= link_tag('assests/css/bootstrap.min.css');  ?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?= base_url('index.php/admin/dashboard') ?>">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('index.php/admin/dashboard') ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#">Signup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <div class="col-sm-2"></div>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  <div class="col-sm-1 pull-right">
    <a class="btn btn-danger" href="<?= base_url('index.php/login/logout') ?>">Logout</a> 
<!-- 
    <?= anchor('index.php/login/logout','logout');
    // helper function 3 parameters first url , second display name third array  ?> -->
  </div>
</nav>
