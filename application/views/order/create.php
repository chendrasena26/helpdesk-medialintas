<?php 
    $count_kategori = $this->db->get("kategori")->num_rows();
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <?php echo form_open(base_url('order/create'), 'class="form-horizontal"' ); ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="kategoriOrder" class="col-sm-2 text-right control-label col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="kategoriOrder" name="kategoriOrder">
                                <option value="0">--Silahkan pilih kategori--</option>
                                <?php foreach ($kategori as $val) { ?>
                                    <option value="<?php echo $val['id_kategori'] ?>"><?php echo $val['nama_kategori'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subkategoriOrder" class="col-sm-2 text-right control-label col-form-label">Subkategori</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="subkategoriOrder" name="subkategoriOrder">
                            <option value="0">--Silahkan pilih kategori terlebih dulu--</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsiOrder" class="col-sm-2 text-right control-label col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="deskripsiOrder" name="deskripsiOrder"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsiOrder" class="col-sm-2 text-right control-label col-form-label">Lokasi</label>
                        <div class="col-sm-9">
                            <?php include_once('create/maps-demo.php')?>
                            <input type="hidden" id="latitude" name="latitude">
                            <input type="hidden" id="longitude" name="longitude">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" value="masuk" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            <?php echo form_close(); ?> 
        </div>
    </div>
</div>

