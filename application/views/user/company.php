<?php if($this->session->flashdata('berhasil')) { ?>
  <div class="alert alert-success" role="alert">Perintah berhasil dijalankan</div>
<?php } else if($this->session->flashdata('gagal')) { ?>
  <div class="alert alert-danger" role="alert">Perintah gagal dijalankan</div>
<?php } ?>

<div class="card">
  <div class="card-body">
      <div class="row">
        <div class="col-md-4"><h5>List Perusahaan</h5></div>
        <div class="col-md-4 ml-auto text-right"><a class="btn btn-info col-md-3 btn-sm" href="<?php echo base_url('user/create/company')?>" role="button">Tambah</a></div>
      </div>&nbsp;
      <div class="table-responsive">
          <table id="zero_config" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Telepon</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($company as $key) { ?>
            <tr>
              <th scope="row"><?php echo $no; $no = $no+1;?></th>
              <td><?php echo $key['nama_company'];?></td>
              <td><?php echo $key['alamat_company'];?></td>
              <td><?php echo $key['telp_company'];?></td>
              <td>
                <a class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo base_url('user/compedit/'.$key['id_company']); ?>" role="button"><i class="fas fa-pencil-alt"></i></a>
                <a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" href="<?php echo base_url('user/compdelete/'.$key['id_company']); ?>" role="button"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
        <?php } ?>
          </tbody>
  </table>
</div>