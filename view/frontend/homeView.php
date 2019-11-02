<?php ob_start(); ?>

<div class="container-fluid">
  <div class="row">  
      <div id="map" class="map-home">
          <form  method="post"  action="index.php?action=simulateDelivery">
            <div class="form-group map-form form-row">
              <div class="col-sm-4">  
              <div class="input-group">
                <input readonly type="text" class="form-control" name="from_point" placeholder="Departure">
                <span class="input-group-addon" onclick="addMarkerDeparture()">
                  <a class="glyphicon glyphicon-pushpin" style="color:green"></a>
                </span>  
              </div></div>
              <div class="col-sm-4">  
              <div class="input-group">
                <input readonly type="text" class="form-control" name="to_point" placeholder="Arrival">
                <span class="input-group-addon" onclick="addMarkerArrival()">
                  <a class="glyphicon glyphicon-pushpin" style="color:red"></a>  
              </div></div>
              <div class="col-sm-4">
                <input type="submit" class="btn btn-primary pull-right" value="Submit a delivery">
              </div>
            </div>
          </form>   
      </div>     
  </div>
  <div class="container-fluid">
    <div class="row"> 
    <legend></legend>
      <h3>Why choose JCskipper to deliver your yacht?</h3>
      <br/>
      <div class="col-sm-4 text-center">
          <img src="public/img/pricinglogo.png" height=40px alt="pricing">
          <h4>Get an immediate pricing</h4>
      </div>
      <div class="col-sm-4 text-center">
          <img src="public/img/skipperslogo.png" height=40px alt="skippers">
          <h4>Select among professionnal skippers</h4>
      </div>
      <div class="col-sm-4 text-center">
          <img src="public/img/passageplanlogo.png" height=40px alt="followup">
          <h4>A platform to follow your delivery</h4>
      </div>
    </div> 
    <div class="row">
      <h3>Become a JCskipper's delivery captain</h3>
      <h4>Many delivery opportunities around the world, you just have to choose</h4>
      <dt>Prerequisites:</dt>
      <dd>Yacht captain certification (Yachtmaster or equivalent) <br> Be approved by one of our skippers <br> Skipper's liability insurance </dd>
    </div>
    </div>
  </div>
<?php $content = ob_get_clean(); ?>


<?php ob_start(); ?>
<script  src="public/js/homeMap.js"></script>
<?php $scripts = ob_get_clean(); ?>

