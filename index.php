<?php

$response = file_get_contents("https://nominatim.openstreetmap.org/search?format=json&q=Roermond");

$data = json_decode($response, true);


$latitude = $data[0]['lat'];
$longitude = $data[0]['lon'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Map</h1>
    <div id="map"></div>

    <script>

        function initMap() {
            var location = { lat: parseFloat("<?php echo $latitude; ?>"), lng: parseFloat("<?php echo $longitude; ?>") };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: location
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>
</body>
</html>
