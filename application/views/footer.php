<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



<script>

    function geo_error(err) {

    }


$(function(){

    navigator.geolocation.getAccurateCurrentPosition = function (geolocationSuccess, geolocationError, geoprogress, options) {
        var lastCheckedPosition,
            locationEventCount = 0,
            watchID,
            timerID;

        options = options || {};

        var checkLocation = function (position) {
            lastCheckedPosition = position;
            locationEventCount = locationEventCount + 1;
            // We ignore the first event unless it's the only one received because some devices seem to send a cached
            // location even when maxaimumAge is set to zero
            if ((position.coords.accuracy <= options.desiredAccuracy) && (locationEventCount > 1)) {
                clearTimeout(timerID);
                navigator.geolocation.clearWatch(watchID);
                foundPosition(position);
            } else {
                geoprogress(position);
            }
        };

        var stopTrying = function () {
            navigator.geolocation.clearWatch(watchID);
            foundPosition(lastCheckedPosition);
        };

        var onError = function (error) {
            clearTimeout(timerID);
            navigator.geolocation.clearWatch(watchID);
            geolocationError(error);
        };

        var foundPosition = function (position) {
            geolocationSuccess(position);
        };

        if (!options.maxWait)            options.maxWait = 10000; // Default 10 seconds
        if (!options.desiredAccuracy)    options.desiredAccuracy = 20; // Default 20 meters
        if (!options.timeout)            options.timeout = options.maxWait; // Default to maxWait

        options.maximumAge = 0; // Force current locations only
        options.enableHighAccuracy = true; // Force high accuracy (otherwise, why are you using this function?)

        watchID = navigator.geolocation.watchPosition(checkLocation, onError, options);
        timerID = setTimeout(stopTrying, options.maxWait); // Set a timeout that will abandon the location loop
    };


    navigator.geolocation.getAccurateCurrentPosition(
        function(p){
            console.log('Your current position is:');
            console.log(`Latitude : ${p.coords.latitude}`);
            console.log(`Longitude: ${p.coords.longitude}`);
            console.log(`More or less ${p.coords.accuracy} meters.`);
            $.ajax({
                url:BASE_URL+'logistic/get_location',
                method:"POST",
                data:'lat='+p.coords.latitude+'&lng='+p.coords.longitude
            })
        },geo_error,geo_error,{desiredAccuracy:20, maxWait:15000});
});
</script>
</body>
</html>