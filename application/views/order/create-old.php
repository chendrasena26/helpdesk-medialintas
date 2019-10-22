<div class="container">
	<?php echo form_open(base_url('order/create'), 'class="form-horizontal"' ); ?>
        <div class="row">
            <div class="form-group col-lg-11">
                <label for="kategoriOrder">Kategori Order</label>
				<select class="form-control" id="kategoriOrder" name="kategoriOrder">
					<?php foreach ($kategori as $val) { ?>
						<option value="<?php echo $val['id_kategori'] ?>"><?php echo $val['nama_kategori'] ?></option>
					<?php } ?>
				</select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-11">
                <label for="kategoriOrder">Subkategori Order</label>
                <select class="form-control" id="subkategoriOrder" name="subkategoriOrder">
                    <?php foreach ($subkategori as $val) { ?>
                        <option value="<?php echo $val['id_subkategori'] ?>"><?php echo $val['isi_subkategori'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-11">
                <label for="deskripsiOrder">Deskripsi Order</label>
				<textarea class="form-control" id="deskripsiOrder" name="deskripsiOrder" rows="3" placeholder="Deskripsi Order"></textarea>
            </div>
        </div>
        <button type="submit" value="masuk" name="submit"class="btn btn-primary">Submit</button>
    <?php echo form_close(); ?> 
</div>