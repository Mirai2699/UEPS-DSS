<script>
    var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        osmAttrib = '',

        osm = L.tileLayer(osmUrl, {
            maxZoom: 18,
            attribution: osmAttrib
        });

    var map = L.map('map').setView([14.0280, 120.74225], 13);


    var drawnItems = L.geoJson().addTo(map);

    var hybridMutant = L.gridLayer.googleMutant({
        maxZoom: 24,
        type: 'hybrid'
    }).addTo(map);

    var roadMutant = L.gridLayer.googleMutant({
        maxZoom: 24,
        type: 'roadmap'
    });

    var satMutant = L.gridLayer.googleMutant({
        maxZoom: 24,
        type: 'satellite'
    });

    var terrainMutant = L.gridLayer.googleMutant({
        maxZoom: 24,
        type: 'terrain'
    });

    var styleMutant = L.gridLayer.googleMutant({
        styles: [{
                elementType: 'labels',
                stylers: [{
                    visibility: 'on'
                }]
            },
            {
                featureType: 'water',
                stylers: [{
                    color: '#444444'
                }]
            },
            {
                featureType: 'landscape',
                stylers: [{
                    color: '#eeeeee'
                }]
            },
            {
                featureType: 'road',
                stylers: [{
                    visibility: 'on'
                }]
            },
            {
                featureType: 'poi',
                stylers: [{
                    visibility: 'on'
                }]
            },
            {
                featureType: 'transit',
                stylers: [{
                    visibility: 'on'
                }]
            },
            {
                featureType: 'administrative',
                stylers: [{
                    visibility: 'on'
                }]
            },
            {
                featureType: 'administrative.locality',
                stylers: [{
                    visibility: 'on'
                }]
            }
        ],
        maxZoom: 24,
        type: 'roadmap'
    });

    var trafficMutant = L.gridLayer.googleMutant({
        maxZoom: 24,
        type: 'roadmap'
    });

    trafficMutant.addGoogleLayer('TrafficLayer');

    var transitMutant = L.gridLayer.googleMutant({
        maxZoom: 24,
        type: 'roadmap'
    });


    var point = turf.point([120.73185, 14.01744]);

    transitMutant.addGoogleLayer('TransitLayer');

    L.control.shapefile({
        position: 'topleft'
    }).addTo(map);

    L.control.layers({
        OSM: osm,
        Hybrid: hybridMutant,
        // Aerial: satMutant,
        // Terrain: terrainMutant,
        // Styles: styleMutant,
        // Traffic: trafficMutant,
        // Transit: transitMutant
    }, {}, {
        collapsed: 1
    }).addTo(map);


    $layerJSON = "";
    $layer = "";
    $event = "";
    $props = "";

    map.on('draw:created', function(event) {

        var layer = event.layer,
            feature = layer.feature = layer.feature || {};
        feature.type = feature.type || "Feature";
        var props = feature.properties = feature.properties || {};
        //layer.feature = {properties: {}}; // No need to convert to GeoJSON.
        //var props = layer.feature.properties; 
        console.log(event.layerType)
        if (event.layerType == 'polygon' || event.layerType == 'rectangle')
            $('div[id=div_area]').show()
        else
            $('div[id=div_area]').hide()

        $('input[id=type]').val(event.layerType).trigger('keyup');
        $('input[id=area]').val(turf.area(layer.toGeoJSON())).trigger('keyup');
        $("#add").modal({
            backdrop: 'static',
            keyboard: false
        });

        $layerJSON = layer.toGeoJSON();
        $layer = layer;
        $event = event;
        $props = props;

    });

    map.on('draw:deleted', function(layer) {
        console.log(layer);
    });
    map.on('draw:edited', function(e) {
        console.log(e);
        e.layers.eachLayer(function(layer) {

            $.ajax({
                url: '../functionalities/edit_zapplication.php',
                type: 'post',
                data: {
                    layer: JSON.stringify(layer.toGeoJSON(), null, 2)
                },
                success: function(data) {
                    if (!data)
                        alert('Map Updated');
                    else
                        alert('Map Error');

                },
                error: function(data) {
                    console.log(data);
                }
            });
        })
    });

    function setValues(props, layer) {

        props.name = $("input[id=name]").val();
        props.zcoor = $("input[id=zcoor_id]").val();
        props.buffer = $("input[id=buffer]").val();
        props.area = $("input[id=area]").val();
        props.type = $("input[id=type]").val();
        props.buffer_unit = $("select[id=buffer_unit]").val();
        props.infra = $("select[id=infra]").val();
        props.infratext = $("select[id=infra] option:selected").text();
        props.address = $("textarea[id=address]").val();
        props.desc = $("textarea[id=desc]").val();
        props.remarks = $("textarea[id=remarks]").val();
        props.terrainYear = $("input[id=terrainYear]").val();
        props.terrainHazard = $("select[id=terrainHazard]").val();
        props.terrainHazardText = $("select[id=terrainHazard] option:selected").text();

        $('input[id=name]').on('keyup', function() {
            props.name = props.name || $(this).val();
        });
        $('input[id=buffer]').on('keyup', function() {
            props.buffer = props.buffer || $(this).val();
        });
        $('input[id=area]').on('keyup', function() {
            props.area = props.area || $(this).val();
        });
        $('input[id=type]').on('keyup', function() {
            props.type = props.type || $(this).val();
        });
        $('select[id=buffer_unit]').on('change', function() {
            props.buffer_unit = props.buffer_unit || $(this).val();
        });
        $('select[id=infra]').on('change', function() {
            props.infra = props.infra || $(this).val();
            props.infratext = props.infratext || $(this).text();
        });
        $('textarea[id=address]').on('keyup', function() {
            props.address = props.address || $(this).val();
        });
        $('textarea[id=desc]').on('keyup', function() {
            props.desc = props.desc || $(this).val();
        });
        $('textarea[id=remarks]').on('keyup', function() {
            props.remarks = props.remarks || $(this).val();
        });
        $('input[id=terrainYear]').on('keyup', function() {
            props.terrainYear = props.terrainYear || $(this).val();
        });
        $('select[id=terrainHazard]').on('change', function() {
            props.terrainHazard = props.terrainHazard || $(this).val();
            props.terrainHazardText = props.terrainHazardText || $(this).text();
        });

    }

    $("button[id=save]").on('click', function() {

        $level = $('input[id=buffer]').val();
        $unit = $('select[id=buffer_unit] option:selected').val();

        drawnItems.addLayer($layer);

        setValues($props, $layer);
        bidnPopup($layer);
    });

    $("button[id=cancel]").on('click', function() {
        drawnItems.removeLayer($layer);
    });

    function bidnPopup(layer) {

        var area = layer.feature.properties.area,
            type = layer.feature.properties.type,
            name = layer.feature.properties.name,
            buffer = layer.feature.properties.buffer,
            buffer_unit = layer.feature.properties.buffer_unit,
            infra = layer.feature.properties.infra,
            infratext = layer.feature.properties.infratext,
            address = layer.feature.properties.address,
            desc = layer.feature.properties.desc,
            remarks = layer.feature.properties.remarks,
            terrainYear = layer.feature.properties.terrainYear,
            terrainHazard = layer.feature.properties.terrainHazardText,
            terrainHazardText = layer.feature.properties.terrainHazard,
            areatext = (areatext) ? " (" + area.toFixed(4) + " sq.meters)" : " ";

        layer.bindPopup("<center><strong>" + name + areatext + "</center></strong><br>" +
            "Infrastructure: " + infratext + "<br>" +
            "Address: " + address + "<br>" +
            "Address: " + address + "<br>" +
            "Terrain Hazard: " + terrainHazardText + "<br>" +
            "Terrain Tenure Year: " + terrainYear + "<br>" +
            "Description: " + desc + "<br>" +
            "Remarks: " + remarks).openPopup();

        console.log(layer);
        $.ajax({
            url: '../functionalities/insert_zapplication.php',
            type: 'post',
            data: {
                layer: JSON.stringify(layer.toGeoJSON(), null, 2)
            },
            success: function(data) {
                $('div[id=container_layers]').append("<a href='javascript:;' id='layers' value=" + data + " style='color:black;font-size:10px'><div style='background:white;width:100%;min-height:60px;margin-top:10px'><strong style='text-transform: uppercase; padding-left :10px'>" + name + "</strong><p style='padding-left:10px'>" + address + "</p></div> </span>");

            },
            error: function(data) {
                console.log(data);
            }
        });


        $('input[id=area]').val('0');
        $('input[id=type]').val('');
        $('input[id=name]').val('');
        $('input[id=buffer]').val('');
        $('textarea[id=address]').val(null);
        $('textarea[id=desc]').val(null);
        $('textarea[id=remarks]').val(null);
        $('select[id=terrainHazard]').val(null);
        $('input[id=terrainYear]').val(null);
        $('#add').modal('toggle');


    }


    var searchControl;
    var searchResults = L.layerGroup({
        position: 'topright'
    }).addTo(map);

    var agolProvider = L.esri.Geocoding.arcgisOnlineProvider({
        label: "Online World Geocoding Service",
    });

    var ccpaProvider = L.esri.Geocoding.geocodeServiceProvider({
        label: "World Street Map",
        url: "//sampleserver6.arcgisonline.com/arcgis/rest/services/World_Street_Map/MapServer"
    });

    searchControl = L.esri.Geocoding
        .geosearch({
            useMapBounds: false, // do not use extent of map to limit search results
            providers: [agolProvider, ccpaProvider], // providers are geocoding services or map/feature services that we can search against
            placeholder: "Search for an address",
            title: "Address Search",
            // searchBounds: searchBounds, // limit search results within these coordinates
            zoomToResult: true,
            expanded: false,
            collapseAfterResult: true
        })
        .addTo(map);

    searchControl.on("results", function(data) {
        searchResults.clearLayers();

        if (data.results.length > 0) {
            map.setView(data.results[0].latlng, 18);
            var popup = L.popup({
                    closeOnClick: true
                })
                .setLatLng(data.results[0].latlng)
                .setContent(data.results[0].text)
                .openOn(map);
        }
    });
    $.ajax({
        url: "../functionalities/fetch_zoning_geoJSON.php",
        type: "get",
        data: {
            id: <?php echo $zapplication_ID; ?>
        },
        dataType: 'JSON',
        success: function(data) {
            console.log(data);
            L.geoJson(data).eachLayer(function(layer) {
                
                drawnItems.addLayer(layer.setStyle({fillColor :layer.feature.properties.color, color:layer.feature.properties.color}) ).addTo(map);

                //                switch (layer.feature.properties.type) {
                //                    case 'LineString':
                //                        layer.setStyle({
                //                            fillColor: 'orange',
                //                            color: 'orange'
                //                        });
                //                    case 'Polygon':
                //                        return {
                //                            color: "blue"
                //                            fillColor: "blue"
                //                        };
                //                }
                var area = layer.feature.properties.area,
                    type = layer.feature.properties.type,
                    zcoor = layer.feature.properties.zcoor,
                    name = layer.feature.properties.name,
                    buffer = layer.feature.properties.buffer,
                    buffer_unit = layer.feature.properties.buffer_unit,
                    infra = layer.feature.properties.infra,
                    infratext = layer.feature.properties.infratext,
                    address = layer.feature.properties.address,
                    desc = layer.feature.properties.desc,
                    remarks = layer.feature.properties.remarks,
                    terrainYear = layer.feature.properties.terrainYear,
                    terrainHazard = layer.feature.properties.terrainHazard,
                    terrainHazardText = layer.feature.properties.terrainHazardText,
                    areatext = (areatext) ? " (" + area.toFixed(4) + " sq.meters)" : " ";
                layer.bindPopup("<center><strong>" + name + areatext + "</center></strong><br>" +
                    "Infrastructure: " + infratext + "<br>" +
                    "Address: " + address + "<br>" +
                    "Terrain Hazard: " + terrainHazardText + "<br>" +
                    "Terrain Tenure Year: " + terrainYear + "<br>" +
                    "Description: " + desc + "<br>" +
                    "Remarks: " + remarks);
                if (layer.feature.properties.type == 'Rectangle' || layer.feature.properties.type == 'Polygon' || layer.feature.properties.type == 'LineString') {
                    map.fitBounds(layer.getBounds());
                } else {
                    map.panTo(layer.getLatLng());
                }
                $('div[id=container_layers]').append("<a href='javascript:;' id='layers' value=" + zcoor + " style='color:black;font-size:10px'><div style='background:white;width:100%;min-height:60px;margin-top:10px'><strong style='text-transform: uppercase; padding-left :10px'>" + name + "</strong><p style='padding-left:10px'>" + address + "</p></div> </span>");


            });
        }
    });
    $("#saveall").on("click", function() {
        console.log(JSON.stringify(drawnItems.toGeoJSON(), null, 2));
    });

</script>
