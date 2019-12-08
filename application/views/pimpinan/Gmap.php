<!DOCTYPE html>

    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <div id="map1" style='height: 200px;'></div>
<script>
    
  $(document).ready(function() {

      var map;
      initMap();
      function initMap() {
        map = new google.maps.Map(document.getElementById('map1'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
});
</script>
   