<?php
$newDate = date("d-m-Y", strtotime($order[0]['tanggal_open'])); 
if($order[0]['status'] == 1) {
	$color="secondary";
  $status = "open";
} else if($order[0]['status'] == 2) {
	$color = "primary";
  $status = "on progress";
} else if($order[0]['status'] == 3) {
	$color = "success";
  $status = "closed";
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-body">
          <div class="row">
			     <div class="col-md-4"><h4>Nomor Transaksi: <?php echo $order[0]['id_req']?></h4></div>
			     <div class="col-md-4 ml-auto text-right"><h4>Tanggal Transaksi: <?php echo $newDate ?></h4></div>
			    </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <p>Dari: <?php echo $order[0]['pengirim']?> - <?php echo $order[0]['nama_company']?></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-left">
                        <p>Kategori: <?php echo $order[0]['nama_kategori']?></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-left">
                        <p>Subkategori: <?php echo $order[0]['isi_subkategori']?></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-left">
                        <p>Deskripsi: <?php echo $order[0]['deskripsi_req']?></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-left">
                        <p>Status: <span class="badge badge-<?php echo $color ?>"><?php echo $status?></span></p>
                    </div>
                </div>
                <?php if($status == "closed") { ?>
                <div class="col-md-12">
                  <div class="pull-left">
                      <p>Laporan Teknisi: <?php echo $order[0]['desc_teknisi']?></p>
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-left">
                        <p>Rating: ★<?php echo $order[0]['rating']?></p>
                        <p>Review: <?php echo $order[0]['review']?></p>
                    </div>
                </div>
                <?php } ?>
                <div class="col-md-12">
                    <div class="pull-left">
                        <?php include_once('create/maps-demo.php')?>
                    </div>
                </div>
            </div>
            <hr>
              <a class="btn btn-secondary col-md-12" href="<?php echo base_url('order')?>" role="button">Kembali</a>
        </div>
    </div>
</div>


