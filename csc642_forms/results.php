<html>
<head>
<title>Results Verification Page</title>
<style>
  #map{
    height: 50%; 
    width :50%;
    margin-left:auto;
    margin-right:auto;
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
<h1><center>Results Verification Page <
<?php
    echo $_POST ["firstName"]; 
    echo "&nbsp";
    echo $_POST ["lastName"];
?>
 ></center></h1>
<h2>Thank you for submitting this form!</h2> 

<p>Below is a summary of the information you provided:<br>

<div style="width:400px; margin:auto;">
<?php
echo 'Full name: ' . $_POST ["firstName"] . '&nbsp';
echo  $_POST ["lastName"] . '<br>';
echo 'Address: ' . $_POST ["street"];
echo ", ";
echo $_POST["city"];
echo ", ";
echo $_POST["state"];
echo ", ";
echo $_POST["zip"];
echo '<br>';
echo 'Education Level: ' . $_POST ["education"] . '<br>';
echo 'Income (yearly): ' . $_POST ["income"] . '<br>';
echo 'Phone Number: ' . $_POST ["phone"] . '<br>';
echo 'Email: ' . $_POST ["email"];
$street = $_POST["street"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
?>
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
