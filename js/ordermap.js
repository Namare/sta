OM = {
    init:function(){

        var mapblock = document.getElementById("map_order");
        var myCenter=new google.maps.LatLng(50.508742,-130.120850);
        var mapOptions = {
            center: myCenter,
            zoom: 6
        };
        map = new google.maps.Map(mapblock, mapOptions);
        var jmap = $('#map_order');
        directionsService = new google.maps.DirectionsService();
        directionsDisplay = new google.maps.DirectionsRenderer();

        var request = {
            origin: new google.maps.LatLng(jmap.data('pickuplat'),jmap.data('pickuplng')),
            destination: new google.maps.LatLng(jmap.data('deliverylat'),jmap.data('deliverylng')),
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };

        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setMap(map);

            }
        });


    }
}
$(function(){
    OM.init();
});

