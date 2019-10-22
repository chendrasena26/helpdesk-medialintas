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
    <title>Helpesk Media</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/libs/flot/css/float-chart.css')?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('dist/css/style.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
   <link href="<?php echo base_url('assets/css/maps.css')?>" rel="stylesheet">
<!--    <style>
     #mapid { height: 700px; }
   </style> -->
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
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        <div class="bg-dark p-10 text-white text-center">
                           <i class="fas fa-copy m-b-5 font-16"></i>
                           <h5 class="m-b-0 m-t-5"><?php echo $status[0]?></h5>
                           <small class="font-light">Total Order</small>
                        </div>
                    </div>
                     <div class="col-3">
                        <div class="bg-dark p-10 text-white text-center">
                           <i class="fa fa-plus m-b-5 font-16"></i>
                           <h5 class="m-b-0 m-t-5"><?php echo $status[1]?></h5>
                           <small class="font-light">Order Open</small>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="bg-dark p-10 text-white text-center">
                           <i class="far fa-arrow-alt-circle-right m-b-5 font-16"></i>
                           <h5 class="m-b-0 m-t-5"><?php echo $status[2]?></h5>
                           <small class="font-light">Order On Progress</small>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="bg-dark p-10 text-white text-center">
                           <i class="far fa-check-square m-b-5 font-16"></i>
                           <h5 class="m-b-0 m-t-5"><?php echo $status[3]?></h5>
                           <small class="font-light">Order Closed</small>
                        </div>
                    </div>
                </div><br>
                <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Order Terkini</h5>
                      <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th scope="col">No Order</th>
                                  <th scope="col">Waktu</th>
                                  <?php if($this->session->userdata("auth") != 4) { ?>
                                    <th scope="col">Dari</th>
                                  <?php } ?>
                                  <th scope="col">Kategori</th>
                                  <th scope="col">Subkategori</th>
                                  <?php if($this->session->userdata("auth") < 3) { ?>
                                    <th scope="col">Teknisi</th>
                                  <?php } ?>
                                  <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($order as $key) { ?>
                                    <tr>
                                      <th scope="row"><?php echo $key['id_req'];?></th>
                                      <td><?php $newDate = date("d-m-Y H:i", strtotime($key['tanggal_open']));
                                      echo $newDate;?></td>
                                      <?php if($this->session->userdata("auth") != 4) { ?>
                                        <td><?php echo $key['pengirim'];?> - <?php echo $key['nama_company'];?></td>
                                      <?php } ?>
                                      <td><?php echo $key['nama_kategori'];?></td>
                                      <td><?php echo $key['isi_subkategori'];?></td>
                                      <?php if($this->session->userdata("auth") < 3) { ?>
                                        <td><?php echo $key['teknisi'];?></td>
                                      <?php } ?>
                                      <?php if($key['status'] == 1) { ?>
                                        <td class="text-danger">Open</td>
                                      <?php } else if($key['status'] == 2) { ?>
                                        <td class="text-primary">On Progress</td>
                                      <?php } else { ?>
                                        <td class="text-success">Closed</td>
                                      <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
                <?php if($this->session->userdata("auth") == 4) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title m-b-0">Buat Order</h4>
                                </div>
                                <div class="comment-widgets">
                                    <?php include_once('order/create.php') ?>
                                </div>
                        </div>
                    </div>
                </div>
                <?php  } ?>

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

</body>

</html>

<?php if($this->session->userdata("auth") == 4) { ?>
    <?php include_once 'order/create/create-js.php';?>
    <script>
        var mymap;
        var latlng;
        var lat;
        var lng;
        var popup = L.popup();
        var marker;
            // var lat;
            // var lng;

        navigator.geolocation.getCurrentPosition(function(location) {
          latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
          lat = location.coords.latitude;
          lng = location.coords.longitude;
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
     });



    </script>
<?php } ?>