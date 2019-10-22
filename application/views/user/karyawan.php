<?php if($this->session->flashdata('berhasil')) { ?>
  <div class="alert alert-success" role="alert">Perintah berhasil dijalankan</div>
<?php } else if($this->session->flashdata('gagal')) { ?>
  <div class="alert alert-danger" role="alert">Perintah gagal dijalankan</div>
<?php } ?>

<div class="card">
  <div class="card-body">
      <div class="row">
        <div class="col-md-4"><h5>List Karyawan</h5></div>
        <div class="col-md-4 ml-auto text-right"><a class="btn btn-info col-md-3 btn-sm" href="<?php echo base_url('user/create/karyawan')?>" role="button">Tambah</a></div>
      </div>&nbsp;
      <div class="table-responsive">
          <table id="zero_config" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Bagian</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($karyawan as $key) { ?>
            <tr>
              <th scope="row"><?php echo $no; $no = $no+1;?></th>
              <td><?php echo $key['nama_user'];?></td>
              <td><?php echo $key['email_user'];?></td>
              <td>
                <?php
                  if($key['kategori_user'] == 1) {
                    echo "Admin";
                  } else if($key['kategori_user'] == 2) {
                    echo "Operator";
                  } else if($key['kategori_user'] == 3){
                    echo "Teknisi";
                  }
                ?>
              </td>
              <td>
                <a class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo base_url('user/utedit/'.$key['id_user']); ?>" role="button"><i class="fas fa-pencil-alt"></i></a>
                <a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?php echo base_url('user/utdelete/'.$key['id_user']); ?>" role="button"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
        <?php } ?>
          </tbody>
  </table>
</div>

<div class="card"></div>