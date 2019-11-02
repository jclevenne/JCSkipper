<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><img src="public/img/jcskipper-logo.png" alt="JCskipper"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?action=findDelivery">Find a Delivery</a></li>
        <li><a href="index.php?action=findSkipper">Find a Skipper</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['pseudo'] ?></a></li>
        <li><a href="index.php?action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>