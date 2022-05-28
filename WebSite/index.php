  <?php
  include "Model/connect.php";
  include "Model/items.php";
  include "Model/user.php";
  include "Model/giohang.php";
  include "Model/receipt.php";
  include "Model/class.phpmailer.php";
  session_start();
  ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
  <link rel="stylesheet" href="./Content/CSS/style.css">
  <script src="./Content/JS/js.js"></script>
  <link rel="stylesheet" href="./Content/CSS/body.css">
  <style>
   
  </style>
</head>
<body >
<script >
        var txt="Shop Drink | Thư Giản | Chất Lượng ";
        var expert=200;
        var refresh=null;
        function marquee_title(){
        document.title=txt;
        txt=txt.substring(1,txt.lenghth)+txt.charAt(0);
        refresh=setTimeout("marquee_title()",expert);
        }
        marquee_title();
        </script>
      <?php
        include "View/headder.php";
      ?>
         <article class="col-sm-9">
      <div class="container">
          <div class="row">
              <?php
              $ctrl="home";
              if(isset($_GET['action']))
              {
                $ctrl=$_GET['action'];
              }
              include 'Controller/'.$ctrl.'.php';
              ?>
          </div>
      </div>
      </article>
    <?php
        include "View/footer.php";
    ?>
</body>
</html>