<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon.png')?>">
    <title><?php echo $judul; ?> | Helpesk Media</title>
    <link href="<?php echo base_url('assets/css/home-custom.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/libs/flot/css/float-chart.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('dist/css/style.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/home-custom.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/maps.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <?php include_once 'content/nav.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><?php echo $judul; ?></h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <?php include_once $instruksi; ?>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <br><br><br><br><br><br><br><br><br>
            <footer class="footer text-center">
                All Rights Reserved by Helpdesk Media 2019.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/libs/jquery/dist/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-rating-input.min.js')?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('assets/libs/popper.js/dist/umd/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/extra-libs/sparkline/sparkline.js')?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('dist/js/waves.js')?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('dist/js/sidebarmenu.js')?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('dist/js/custom.min.js')?>"></script>
    <!-- Charts js Files -->
    <script src="<?php echo base_url('assets/libs/flot/excanvas.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/flot/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/flot/jquery.flot.pie.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/flot/jquery.flot.time.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/flot/jquery.flot.stack.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/flot/jquery.flot.crosshair.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')?>"></script>
    <script src="<?php echo base_url('dist/js/pages/chart/chart-page-init.js')?>"></script>
    <script src="<?php echo base_url('assets/extra-libs/multicheck/datatable-checkbox-init.js')?>"></script>
    <script src="<?php echo base_url('assets/extra-libs/multicheck/jquery.multicheck.js')?>"></script>
    <script src="<?php echo base_url('assets/extra-libs/DataTables/datatables.min.js')?>"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>


</body>

</html>

<?php if($judul == "Buat Order") { include_once 'order/create/create-js.php'; } ?>
<?php if($judul == "Edit Order") { ?>
<?php include_once 'order/create/edit-js.php'; ?>
<script>
    var lat = "<?php echo $request[0]['latitude']?>";
    var lng = "<?php echo $request[0]['longitude']?>";
    var latlng = [lat,lng];
    var popup = L.popup();
    var mymap;
    mymap = L.map('mapid').setView(latlng, 13)
         // mymap = L.map('mapid').setView([-7.275973, 112.808304], 13);
         L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFyaW9ubzI2IiwiYSI6ImNqejJsczcwajAyYzgzY281OGRmYXNrdWsifQ.X5NiEYX1VENWvo_bcKJYwQ', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoibWFyaW9ubzI2IiwiYSI6ImNqejJsczcwajAyYzgzY281OGRmYXNrdWsifQ.X5NiEYX1VENWvo_bcKJYwQ'
        }).addTo(mymap);

         marker = new L.marker(latlng).addTo(mymap);
         document.getElementById("latitude").value = lat;
         document.getElementById("longitude").value = lng;
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                // .setContent("You clicked the map at " + e.latlng.toString())
                // .openOn(mymap);
            latlng = e.latlng;
            lat = e.latlng.lat;
            lng = e.latlng.lng;
            if(marker) {
                mymap.removeLayer(marker);
            }
            document.getElementById("latitude").value = lat;
            document.getElementById("longitude").value = lng;
            marker = new L.marker(latlng).addTo(mymap);
        }

        mymap.on('click', onMapClick);
</script> 
<?php } ?>

<?php if($judul == "Detail") { ?>
<script>
    var lat = "<?php echo $order[0]['latitude']?>";
    var lng = "<?php echo $order[0]['longitude']?>";
    var latlng = [lat,lng];
    var popup = L.popup();
    var mymap = L.map('mapid').setView(latlng, 13);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFyaW9ubzI2IiwiYSI6ImNqejJsczcwajAyYzgzY281OGRmYXNrdWsifQ.X5NiEYX1VENWvo_bcKJYwQ', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoibWFyaW9ubzI2IiwiYSI6ImNqejJsczcwajAyYzgzY281OGRmYXNrdWsifQ.X5NiEYX1VENWvo_bcKJYwQ'
        }).addTo(mymap);
    var marker = L.marker(latlng).addTo(mymap);
</script>
<?php } ?>