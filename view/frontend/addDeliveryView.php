<?php ob_start(); ?>
<div class="container-fluid">
  <div class="row">
    <div id="map" class="map-result col-sm-7"></div>
    
    <?php
        // initialisation with your API KEY
        $MY_API_KEY_HERE = 'w680ik3xFQ6G6TCVsFHPq1xx7k10WhND6VKNhR8P';
        // base url for the subsequent requests
        $base_url = "https://api.searoutes.com/gr/route";
        // route that is avoid inland usage [we are explicitly passing a specific parameter]
        $requestParameters = array ('avoidInland' => "true");
        // send the API key in the request
        $curl_headers = array(
            'accept: application/json ',
            'x-api-key: '.$MY_API_KEY_HERE,
        );
        // initialize curl and pass the api key in the header
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, $curl_headers);
        // curl has been initialised and ready to be used
        // simple route from point A to point B that is using the default options
        $from_point = htmlentities($_POST['from_point']);
        $to_point = htmlentities($_POST['to_point']);
        // create the new url with the specific parameter
        $url = $base_url."/".$from_point."/".$to_point . "?" . http_build_query($requestParameters, '', "&");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        $route = curl_exec($curl);
        curl_close($curl);
    ?>

    <script>
        var route = <?php echo $route; ?>;
        console.log(route);
    </script>

    <form method="post"  action="index.php?action=addDelivery">
    <div class="form-group col-sm-5">
      <label for="inputDistance">Distance</label>
      <input readonly type="text" class="form-control" id="inputDistance" name="Distance" placeholder="Distance">
    </div>
    <div class="form-group col-sm-5">
      <label for="inputJourneyTime">Approximated journey time</label>
      <input readonly type="text" class="form-control" id="inputJourneyTime" name="Journeytime" placeholder="JourneyTime">
    </div>
    <div class="form-group col-sm-5">
      <label for="inputCost">Cost</label>
      <input type="text" class="form-control" id="inputCost" name="Cost" placeholder="Cost">
      <small id="costInfo" class="form-text text-muted"> All included except fuel and extra port expenses due to bad weather</small>
    </div>
  </div>
  
  <?php 
    if (isset($_SESSION['ID']) AND isset($_SESSION['pseudo']))
    {
        include 'addDeliveryForm.php'; 
    }       
    else 
    {
    ?>
        You need to be registered and logged to submit a delivery <br>
        Please signup to create an account or login if you already have one
    <?php
    } 
  ?>

  </form>
</div>
<?php $content = ob_get_clean(); ?>


<?php ob_start(); ?>
<script  src="public/js/addDeliveryRoute.js"></script>
<?php $scripts = ob_get_clean(); ?>