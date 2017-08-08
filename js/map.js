MAP = {
    addCCount: 0,
    addSL:{
        lat:0,
        lng:0
    },
    addEL:{
        lat:0,
        lng:0
    },
    addPoints:'',
    initMap: function(){


        var mapCanvas = document.getElementById("map_add_order");


        var myCenter=new google.maps.LatLng(50.508742,-130.120850);
        var mapOptions = {
            center: myCenter,
            zoom: 4
        };
         addMAP = new google.maps.Map(mapCanvas, mapOptions);
        directionsService = new google.maps.DirectionsService();
        directionsDisplay = new google.maps.DirectionsRenderer({    draggable: true});
        var markers = [];
        var markStart = null;
        var markEnd = null;


        var pickuploc =document.getElementById('pickuploc');
        var deliveryloc =document.getElementById('deliveryloc');

        var pickuploc2 =document.getElementById('filter_from');
        var deliveryloc2 =document.getElementById('filter_to');


        var autocomplete = new google.maps.places.Autocomplete(pickuploc);
        var autocomplete2 = new google.maps.places.Autocomplete(deliveryloc);

//        autocomplete.bindTo('bounds', addMAP);
//        autocomplete2.bindTo('bounds', addMAP);
        start_marker = null;
        end_marker = null;
        autocomplete.addListener('place_changed', function() {
           if(start_marker != null)start_marker.setMap(null);
             start_marker = new google.maps.Marker({
                position: autocomplete.getPlace().geometry.location,
                map: addMAP
            });
        });

        autocomplete2.addListener('place_changed', function() {
           if(end_marker != null)end_marker.setMap(null);
            end_marker = new google.maps.Marker({
                position: autocomplete2.getPlace().geometry.location,
                map: addMAP
            });
            MAP.setPoints(start_marker.position, end_marker.position);
            start_marker.setMap(null);
            end_marker.setMap(null);
        });

        var autocompletef = new google.maps.places.Autocomplete(pickuploc2);
        var autocomplete2f = new google.maps.places.Autocomplete(deliveryloc2);








        google.maps.event.addListener(addMAP, 'click', function(event) {

            var marker = new google.maps.Marker({
                position: event.latLng,
                map: addMAP,
                title: ''
            });

            markers.push(marker);

            if(markers.length == 1){
                markStart =event.latLng;
            }
            if(markers.length == 2){
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(null);
                }
                markers = [];
                markEnd = event.latLng;
                MAP.addCCount = 2;
            }
            if(MAP.addCCount == 2)
            MAP.setPoints(markStart, markEnd);
        });
        directionsDisplay.addListener('directions_changed', function() {
            MAP.upmap();
        });
    },
    setPoints:function(start,end){
        addCCount = 0;
        var request = {
            origin: new google.maps.LatLng(start.lat(),start.lng()),
            destination: new google.maps.LatLng(end.lat(), end.lng()),
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };

        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                $('.MAPdata').slideDown();

            }
        });




    },
    upmap:function(){
        var routs = directionsDisplay.getDirections();
        directionsDisplay.setMap(addMAP);

        $('.MAPstart').text(routs.routes[0].legs[0].start_address);
        $('.MAPend').text(routs.routes[0].legs[0].end_address);
        $('.MAPtext').text(routs.routes[0].legs[0].distance.text);
        $('.MAPvalue').text(routs.routes[0].legs[0].distance.value);
        $('.MAPduration').text(routs.routes[0].legs[0].duration.text);

        MAP.addSL.lat = routs.routes[0].legs[0].start_location.lat;
        MAP.addSL.lng = routs.routes[0].legs[0].start_location.lng;

        MAP.addEL.lat = routs.routes[0].legs[0].end_location.lat;
        MAP.addEL.lng = routs.routes[0].legs[0].end_location.lng;

        MAP.addPoints = routs.routes[0].overview_polyline;




    }
}