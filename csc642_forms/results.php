<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Results Verification Page</title>
<style>
  #map{
    height: 50%;
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    }
  h1{
    text-align: center;
  }
  h2{
    text-align: center;
  }
  p{
    text-align: center;
  }
</style>
</head>
<body>
<h1>Results Verification Page
  <
<?php
    echo $_POST ["firstName"];
    echo "&nbsp";
    echo $_POST ["lastName"];
?>
>
</h1>

<h2>Thank you for submitting this form!</h2>
<p>Here is the information you have provided:<br>

  <?php
  $first = $_POST ["firstName"];
  $last = $_POST ["lastName"];
  $street = $_POST["street"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $zip = $_POST["zip"];
  $education = $_POST ["education"];
  $income = $_POST ["income"];
  $phone = $_POST ["phone"];
  $email =  $_POST ["email"];
  ?>

<div style="width:400px; margin:auto;">
<div><strong>Full name: </strong><?php echo $first ?> <?php echo $last ?></div>
<div><strong>Address: </strong><?php echo $street ?>, <?php echo $city ?>, <?php echo $state ?>, <?php echo $zip ?></div>
<div><strong>Education Level: </strong><?php echo $education ?> </div>
<div><strong>Income (yearly): </strong><?php echo $income ?> </div>
<div><strong>Phone Number: </strong><?php echo $phone ?> </div>
<div><strong>Email: </strong><?php echo $email ?> </div>
</div>
<br><br>

<div id="map"></div>

<script>
//source: https://developers.google.com/maps/documentation/javascript/examples/geocoding-simple
//function to generate and display google map
function initMap() {
  var myLatLng = {lat: 37.77493, lng: -122.41942};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: myLatLng
  });
  var geocoder = new google.maps.Geocoder();

  geocodeAddress(geocoder, map);


  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });
}

//get the geocode of the address
function geocodeAddress(geocoder, resultsMap) {
        var address = "<?php echo $street?>" + ", " + "<?php echo $city ?>" + ", " + "<?php echo $state ?>" + ", " + "<?php echo $zip ?>";
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
</script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFHfVzV14bjkLSTPfEgffDiTQAJo-yrtU&callback=initMap">
    </script>
</body>
</html>
