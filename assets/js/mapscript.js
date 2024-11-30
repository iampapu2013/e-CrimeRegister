$(document).ready(function () {
  const $modal = $('#myModal');
  const $openModal = $('#openModal');
  const $closeModal = $('.close');
  const $searchInput = $('#searchInput');
  const $latInput = $('#latInput');
  const $lngInput = $('#lngInput');
  const $placeNameInput = $('#placeNameInput');
  const $coordinatesDisplay = $('<p></p>').css({
    position: 'absolute',
    bottom: '10px',
    left: '10px',
    backgroundColor: 'white',
    padding: '5px',
    borderRadius: '5px',
    fontWeight: 'bold',
    zIndex: 1000,
    color: 'red'
  });
  
  let map, marker;
  let placeName = ''; // Variable to store the place name
  const defaultLocation = [22.82065, 88.21052]; // Default coordinates for Kamarkundu SP Office

  // Function to initialize the map
  function initMap() {
    map = L.map('map').setView(defaultLocation, 13);

    // Use OpenStreetMap tiles (can be replaced with offline tiles if required)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors',
      maxZoom: 19,
    }).addTo(map);

    // Add a draggable marker
    marker = L.marker(defaultLocation, { draggable: true }).addTo(map);

    // Display coordinates of marker
    updateCoordinates(defaultLocation[0], defaultLocation[1]);

    // Update coordinates and fetch place name when the marker is dragged
    marker.on('dragend', function () {
      const { lat, lng } = marker.getLatLng();
      updateCoordinates(lat, lng);
      reverseGeocode(lat.toFixed(5), lng.toFixed(5)); // Get place name for the new marker position
    });
  }

  // Update the coordinates displayed on the map
  function updateCoordinates(lat, lng) {
    $coordinatesDisplay.text(`Lat: ${lat.toFixed(5)}, Lng: ${lng.toFixed(5)}`);
    $(map.getContainer()).append($coordinatesDisplay);
  }

  // Function to reverse geocode and get the place name based on lat, lng
  function reverseGeocode(lat, lng) {
    // Check if lat and lng are valid numbers before making the request
    if (isNaN(lat) || isNaN(lng)) {
        console.error('Invalid latitude or longitude');
        return; // Exit if invalid coordinates
    }

    const geocoder = L.Control.Geocoder.nominatim();
    
    // Use L.latLng to pass coordinates properly
    const latLng = L.latLng(lat, lng);

    geocoder.reverse(latLng, map.options.crs.scale(map.getZoom()), function (results) {
        if (results && results.length > 0) {
            placeName = results[0].name || 'Unknown Location'; // Update place name
            $placeNameInput.val(placeName); // Update place name input field
        } else {
            console.log('Place name not found for these coordinates');
        }
    });
}

  // Open the modal when the button is clicked
  $openModal.on('click', function () {
    $modal.show();
    if (!map) initMap(); // Initialize the map only once
  });

  // Close the modal
  $closeModal.on('click', function () {
    $modal.hide();
    // Get the current marker coordinates when closing the modal
    const { lat, lng } = marker.getLatLng();
    $latInput.val(lat.toFixed(5));
    $lngInput.val(lng.toFixed(5));
    $placeNameInput.val(placeName || 'Not specified');
    // Show the final coordinates and place name in console
    console.log(`Final coordinates: Lat: ${lat.toFixed(5)}, Lng: ${lng.toFixed(5)}, Place Name: ${placeName || 'Not specified'}`);
    // Reset search input and marker position
    $searchInput.val('');
    if (marker) {
      marker.setLatLng(defaultLocation);
      map.setView(defaultLocation, 13);
      updateCoordinates(defaultLocation[0], defaultLocation[1]);
    }
  });

  // Close the modal when clicked outside
  $(window).on('click', function (event) {
    if ($(event.target).is($modal)) {
      $modal.hide();
      const { lat, lng } = marker.getLatLng();
      // console.log(`Final coordinates: Lat: ${lat.toFixed(5)}, Lng: ${lng.toFixed(5)}, Place Name: ${placeName || 'Not specified'}`);
    }
  });

  // Search for a place and update the marker position
  $searchInput.on('input', function () {
    const geocoder = L.Control.Geocoder.nominatim();
    geocoder.geocode($searchInput.val(), function (results) {
      if (results && results.length > 0) {
        const latLng = results[0].center;
        placeName = results[0].name || $searchInput.val(); // Store the place name
        map.setView(latLng, 13);
        marker.setLatLng(latLng);
        updateCoordinates(latLng.lat, latLng.lng);
        reverseGeocode(latLng.lat, latLng.lng); // Fetch place name for new location
      }
    });
  });
});
