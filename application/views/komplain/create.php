<div class="row">
    <div class="col-md-12">
        <div class="card">
            <?php echo form_open(base_url('komplain/send'), 'class="form-horizontal"' ); ?>
	            <div class="card-body">
	            	<div class="form-group row">
	                    <label for="isiKomplain" class="col-sm-2 text-right control-label col-form-label">Isi Komplain</label>
	                    <div class="col-sm-9">
	                        <textarea class="form-control" id="isiKomplain" name="isiKomplain"></textarea>
	                    </div>
	                </div>
	                <input type="hidden" name="idRequest" id="idRequest" value="<?php echo $idRequest?>">
	            </div>
		        <div class="border-top">
	                <div class="card-body">
	                    <button type="submit" value="first" name="submit" class="btn btn-primary">Kirim</button>
	                </div>
	            </div>
            <?php echo form_close(); ?> 
        </div>
    </div>
</div>