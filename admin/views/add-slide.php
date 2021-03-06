
<!--
  This page allows users to add new slide
  to the slides database.
-->

<?php require_once("../controllers/site-contents.php") ?>
<?php session_start(); ?>

<?php
  if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("Location:index.php");
    exit;
  }

  logoFooterSiteUrl();

  $logo = $_SESSION['logo'];
  $footer = $_SESSION['footer'];
  $site_url = $_SESSION['site-url'];

  unset($_SESSION['logo']);
  unset($_SESSION['footer']);
  unset($_SESSION['site-url']);

?>

<html lang="en">
  <!--head starts-->
  <?php require_once("head-components.php") ?>
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
    <script src="../resources/ckeditor/ckeditor.js"></script>
  </head>
  <!--head ends-->

  <!--body starts-->
  <body>
    <!--container begins-->
    <div class="container-fluid">

      <nav class="navbar navbar-toggleable-md navbar-light" style="background-color: #222; height: 50px;">
        <a class="navbar-brand" href="index.php">
          <img src="../resources/static/images/uploads/<?php echo $logo; ?>" width="30" height="30" alt="cms-logo">
        </a>

        <a href="logged-out.php" class="logout">
          <i class="fa fa-sign-out" aria-hidden="true"><span class="logout-text"> Log Out</span></i>
        </a>
        
        <a href="settings.php" class="settings">
          <i class="fa fa-cog" aria-hidden="true"><span class="settings-text"> Settings</span></i>
        </a>
      </nav>

      <nav class="navbar navbar-toggleable-md">
        <button class="navbar-toggler navbar-top-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </button>

        <div class="collapse navbar-collapse flex-column side-nav" id="navbarSupportedContent">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="page-manager.php"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Page Manager</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="image-manager.php"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Image Manager</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post-manager.php"><i class="fa fa-comment-o" aria-hidden="true"></i>&nbsp;Post Manager</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="slider-manager.php"><i class="fa fa-sliders" aria-hidden="true"></i>&nbsp;Slider Manager</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="newsletter-subscribers.php"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Newsletter Subscribers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-manager.php"><i class="fa fa-male" aria-hidden="true"></i>&nbsp;&nbsp;Admin Manager</a>
          </li>
        </div>
      </nav>

      <div class="right-container" style="padding: 2%">

        <div class="row">
          <div class="col-sm-10">
              <h2 class="page-header">
                  Add Slide
              </h2>
          </div>
        </div>

        <hr>
        <br>

        <form class="form-horizontal" onsubmit="return validate();" novalidate="novalidate" role="form" method="post" action="../controllers/manager.php?request=addslide" enctype="multipart/form-data">
          <div class="form-group">
            <label class="control-label col-sm-2" for="email"><strong>Title:</strong></label>
            <div class="col-sm-12">
              <input class="form-control" id="title" name="title" placeholder="Enter title">
              <p id="title-error" style="color: green"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="comment"><strong>Description:</strong></label>
            <div class="col-sm-12">
              <input class="form-control" id="text" name="description" placeholder="Enter description">
              <p id="text-error" style="color: green"></p>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
            <label class="btn btn-primary" style="width: 100%">
                <span id="add-image">Add Image</span><input id="file" name="fileToUpload" type="file" style="display: none;">
            </label>
            </div>
          </div>
          <div class="form-group"> 
            <div class="row" style="padding: 1%">
              <div class="col-sm-6">
                <button id="add-button" class="btn btn-primary" style="width: 100%" type="submit">Add</button>
              </div>
              <div class="col-sm-6">
                <a id="cancel-button" class="btn btn-warning" style="width: 100%" role="button" href="slider-manager.php">Cancel</a>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!--right-container ends-->
    </div>
    <!--container-fluid ends-->

    <!--footer begins-->
    <div id="footer">
        <p class="footer-block"><?php echo $footer ?></p>
    </div>
    <!--footer ends-->
    <!--validation script-->
    <script>
      function validate() {
        document.getElementById("title-error").innerHTML = "";
        document.getElementById("text-error").innerHTML = "";

        var flag = true;

        if(document.getElementById("title").value == "") {
          document.getElementById("title-error").innerHTML = "Title field empty!";
          flag = false;
        }

        if(document.getElementById("text").value == "") {
          document.getElementById("text-error").innerHTML = "Text field empty!";
          flag = false;
        }

        return flag;
      }
    </script>

    <script>
      document.getElementById("file").onchange = function () {
        document.getElementById("add-image").innerHTML = "Image Loaded."
      }
    </script>
  </body>
  <!--body ends-->
</html>
