<!-- ================== BEGIN BASE JS ================== -->
<script src="../../../resources/admin/assets/plugins/jquery/jquery-3.2.1.min.js"></script>
<script src="../../../resources/admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../../../resources/admin/assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<!--[if lt IE 9]>
	<script src="../assets/crossbrowserjs/html5shiv.js"></script>
	<script src="../assets/crossbrowserjs/respond.min.js"></script>
	<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="../../../resources/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../../resources/admin/assets/plugins/js-cookie/js.cookie.js"></script>
<script src="../../../resources/admin/assets/js/theme/default.min.js"></script>
<script src="../../../resources/admin/assets/js/apps.min.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- mapping -->


<script src="../../../resources/leaflet/leaflet-src.js"></script>
<script src="../../../resources/leaflet/esri-leaflet.js"></script>
<script src="../../../resources/leaflet/esri-leaflet-geocoder.js"></script>
<script src="https://maps.googleapis.com/maps/api/js" async defer></script>
<script type="text/javascript" src="../../../resources/leaflet/googlemapMutant.js"></script>
<script src="../../../resources/leaflet/turf.min.js"></script>


<link rel="stylesheet" href="../../../resources/leaflet/leaflet.css" />
<link rel="stylesheet" href="../../../resources/leaflet/leaflet-draw/leaflet.draw.css">
<link rel="stylesheet" type="text/css" href="../../../resources/leaflet/esri-leaflet-geocoder.css">

<script src="../../../resources/leaflet/leaflet-draw/Leaflet.draw.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/Leaflet.Draw.Event.js"></script>

<script src="../../../resources/leaflet/leaflet-draw/Toolbar.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/Tooltip.js"></script>

<script src="../../../resources/leaflet/leaflet-draw/ext/GeometryUtil.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/ext/LatLngUtil.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/ext/LineUtil.Intersect.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/ext/Polygon.Intersect.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/ext/Polyline.Intersect.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/ext/TouchEvents.js"></script>

<script src="../../../resources/leaflet/leaflet-draw/draw/DrawToolbar.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/draw/handler/Draw.Feature.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/draw/handler/Draw.SimpleShape.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/draw/handler/Draw.Polyline.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/draw/handler/Draw.Marker.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/draw/handler/Draw.Circle.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/draw/handler/Draw.CircleMarker.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/draw/handler/Draw.Polygon.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/draw/handler/Draw.Rectangle.js"></script>


<script src="../../../resources/leaflet/leaflet-draw/edit/EditToolbar.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/edit/handler/EditToolbar.Edit.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/edit/handler/EditToolbar.Delete.js"></script>

<script src="../../../resources/leaflet/leaflet-draw/Control.Draw.js"></script>

<script src="../../../resources/leaflet/leaflet-draw/edit/handler/Edit.Poly.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/edit/handler/Edit.SimpleShape.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/edit/handler/Edit.Rectangle.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/edit/handler/Edit.Marker.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/edit/handler/Edit.CircleMarker.js"></script>
<script src="../../../resources/leaflet/leaflet-draw/edit/handler/Edit.Circle.js"></script>


<link rel="stylesheet" type="text/css" href="../../../resources/leaflet/L.Control.Shapefile.css">
<script src="../../../resources/leaflet/L.Control.Shapefile.js"></script>
<script src="../../../resources/leaflet/esri-leaflet-debug.js"></script>
<script src="../../../resources/leaflet/deps/shapefile-js-gh-pages/dist/shp.min.js"> </script>
<script src="../../../resources/leaflet/leaflet.spin.min.js"> </script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/FileSaver.js" type="text/javascript"></script>


<div class="modal fade" id="loadingFile">
    <div class="modal-dialog" style="width:100%;">
        <img src="../../../resources/leaflet/loading.gif" style="
        width: 100%;
        border-radius: 50px;
    ">
        <center style="
        padding: 10px;
        background: white;
        border-radius: 50px;
        margin: 20px;
    "><label>Uploading Shapefile. It will take a while...<br>Please wait</label></center>

    </div>
</div>

<div class="modal fade" id="map-upload-confirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <center>
                <div class="modal-header" style="background-color: teal;">
                    <h4 class="modal-title" style="color: white">Confirmation...</h4>

                </div>
                <div class="modal-body" style="text-align: justify;">
                    <p>
                        &nbsp;&nbsp;&nbsp;Are you sure? you want to upload this shapefile?

                    </p>
                </div>
                <div class="modal-footer" style="text-align: center">
                    <button type="submit" class="btn btn-success" name="upload-shapefile"> Yes, Proceed.</button>
                    <button type="submit" class="btn btn-danger" name="dismiss-upload-shapefile">No, let me upload the other shapefile</button>
                </div>
            </center>
        </div>
    </div>
</div>
