<?php if($judul == "Edit Karyawan") { ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <?php echo form_open(base_url('user/utedit/'.$karyawan[0]['id_user']), 'class="form-horizontal"' ); ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="namaut" class="col-sm-2 text-right control-label col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namaut" name="namaut" placeholder="Nama" value="<?php echo $karyawan[0]['nama_user'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="emailut" class="col-sm-2 text-right control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="emailut" name="emailut" placeholder="Email" value="<?php echo $karyawan[0]['email_user'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kategoriut" class="col-sm-2 text-right control-label col-form-label">Bagian</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="kategoriut" name="kategoriut">
                            <option value="1"<?php if($karyawan[0]['kategori_user'] == 1) echo "selected"; ?>>Admin</option>
                            <option value="2"<?php if($karyawan[0]['kategori_user'] == 2) echo "selected"; ?>>Operator</option>
                            <option value="3"<?php if($karyawan[0]['kategori_user'] == 3) echo "selected"; ?>>Teknisi</option>
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


<?php } else if($judul == "Edit Client") { ?>
	<div class="row">
    <div class="col-md-12">
        <div class="card">
            <?php echo form_open(base_url('user/ucedit/'.$client[0]['id_user']), 'class="form-horizontal"' ); ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="namauc" class="col-sm-2 text-right control-label col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namauc" name="namauc" placeholder="Nama" value="<?php echo $client[0]['nama_user'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="emailuc" class="col-sm-2 text-right control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="emailuc" name="emailuc" placeholder="Email" value="<?php echo $client[0]['email_user'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="companyuc" class="col-sm-2 text-right control-label col-form-label">Perusahaan</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="companyuc" name="companyuc">
                            <?php foreach ($company as $key) { ?>
                            <option value="<?php echo $key['id_company']?>"<?php if($clientcompany[0]['id_company'] == $key['id_company']) echo "selected"; ?>><?php echo $key['nama_company'] ?></option>
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

<?php } else if($judul == "Edit Perusahaan") { ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <?php echo form_open(base_url('user/compedit/'.$company[0]['id_company']), 'class="form-horizontal"' ); ?>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="namacomp" class="col-sm-2 text-right control-label col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namacomp" name="namacomp" placeholder="Nama" value="<?php echo $company[0]['nama_company'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamatcomp" class="col-sm-2 text-right control-label col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamatcomp" name="alamatcomp" placeholder="Email" value="<?php echo $company[0]['alamat_company'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telpcomp" class="col-sm-2 text-right control-label col-form-label">Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telpcomp" name="telpcomp" placeholder="Email" value="<?php echo $company[0]['telp_company'] ?>">
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