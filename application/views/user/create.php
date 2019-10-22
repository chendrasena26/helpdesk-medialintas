<?php if($this->session->flashdata('berhasil')) { ?>
  <div class="alert alert-success" role="alert">Perintah berhasil dijalankan</div>
<?php } else if($this->session->flashdata('gagal')) { ?>
  <div class="alert alert-danger" role="alert">Perintah gagal dijalankan</div>
<?php } else if($this->session->flashdata('gagalemail')) { ?>
  <div class="alert alert-danger" role="alert">Email sudah terdaftar</div>
<?php } ?>

<?php if($judul == "Tambah Karyawan") { ?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <?php echo form_open(base_url('user/create/karyawan'), 'class="form-horizontal"' ); ?>
	                <div class="card-body">
	                    <div class="form-group row">
	                        <label for="namaut" class="col-sm-2 text-right control-label col-form-label">Nama</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control" id="namaut" name="namaut">
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label for="emailut" class="col-sm-2 text-right control-label col-form-label">Email</label>
	                        <div class="col-sm-9">
	                            <input type="email" class="form-control" id="emailut" name="emailut">
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label for="passwordut" class="col-sm-2 text-right control-label col-form-label">Kata Sandi</label>
	                        <div class="col-sm-9">
	                            <input type="password" class="form-control" id="passwordut" name="passwordut">
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label for="kategoriut" class="col-sm-2 text-right control-label col-form-label">Bagian</label>
	                        <div class="col-sm-9">
	                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="kategoriut" name="kategoriut">
	                            <option value="1">Admin</option>
	                            <option value="2" selected>Operator</option>
	                            <option value="3">Teknisi</option>
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="border-top">
	                    <div class="card-body">
	                        <button type="submit" value="masuk" name="submit" class="btn btn-primary">Submit</button>
	                        <a class="btn btn-secondary" href="<?php echo base_url('user/karyawan')?>" role="button">Batal</a>
	                    </div>
	                </div>
	            <?php echo form_close(); ?> 
	        </div>
	    </div>
	</div>

<?php } else if($judul == "Tambah Client") { ?>
	<div class="row">
    <div class="col-md-12">
        <div class="card">
            <?php echo form_open(base_url('user/create/client'), 'class="form-horizontal"' ); ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="namauc" class="col-sm-2 text-right control-label col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namauc" name="namauc">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="emailuc" class="col-sm-2 text-right control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="emailuc" name="emailuc">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="passworduc" class="col-sm-2 text-right control-label col-form-label">Kata Sandi</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="passworduc" name="passworduc">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="companyuc" class="col-sm-2 text-right control-label col-form-label">Perusahaan</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="companyuc" name="companyuc">
                            <?php foreach ($company as $key) { ?>
                            <option value="<?php echo $key['id_company']?>"><?php echo $key['nama_company'] ?></option>
                        	<?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" value="masuk" name="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="<?php echo base_url('user/client')?>" role="button">Batal</a>
                    </div>
                </div>
            <?php echo form_close(); ?> 
        </div>
    </div>
</div>
<?php } else if($judul == "Tambah Perusahaan") { ?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <?php echo form_open(base_url('user/create/company'), 'class="form-horizontal"' ); ?>
	                <div class="card-body">
	                    <div class="form-group row">
	                        <label for="namacomp" class="col-sm-2 text-right control-label col-form-label">Nama</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control" id="namacomp" name="namacomp">
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label for="alamatcomp" class="col-sm-2 text-right control-label col-form-label">Alamat</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control" id="alamatcomp" name="alamatcomp">
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label for="telpcomp" class="col-sm-2 text-right control-label col-form-label">Telepon</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control" id="telpcomp" name="telpcomp">
	                        </div>
	                    </div>
	                    
	                </div>
	                <div class="border-top">
	                    <div class="card-body">
	                        <button type="submit" value="masuk" name="submit" class="btn btn-primary">Submit</button>
	                        <a class="btn btn-secondary" href="<?php echo base_url('user/company')?>" role="button">Batal</a>
	                    </div>
	                </div>
	            <?php echo form_close(); ?> 
	        </div>
	    </div>
	</div>
<?php } ?>