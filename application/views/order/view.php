<?php if($this->session->flashdata('berhasil')) { ?>
  <div class="alert alert-success" role="alert">Perintah berhasil dijalankan</div>
<?php } else if($this->session->flashdata('gagal')) { ?>
  <div class="alert alert-danger" role="alert">Perintah gagal dijalankan</div>
<?php } ?>

<div class="card">
  <div class="card-body">
      <h5 class="card-title">Seluruh Order</h5>
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
              <th scope="col">Action</th>
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
              <td>
                <a href="<?php echo base_url('order/detail/'.$key['id_req']); ?>" data-toggle="tooltip" data-placement="top" title="Detail"><i class="mdi mdi-file-document-box font-18"></i></a>
                <?php if($this->session->userdata("auth") == 2 && $key['status'] == 1) { ?>
                <span data-toggle="modal" data-target="#Modal<?php echo $key['id_req']?>">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Terima Order"><i class="mdi mdi-check font-18"></i></a></span>
                <div class="modal fade" id="Modal<?php echo $key['id_req']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Terima Order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group row">
                                <label for="kategoriOrder" class="col-md-3 text-right control-label col-form-label">Pilih Teknisi</label>
                                <?php echo form_open(base_url('order/accept'), 'class="form-horizontal"' ); ?>
                                <div class="col-sm-15">
                                  <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="teknisiAcc" name="teknisiAcc">
                                      <?php foreach ($teknisi as $val) { ?>
                                      <option value="<?php echo $val['id_user'] ?>"><?php echo $val['nama_user'] ?></option>
                                      <?php } ?>
                                  </select>
                                  <input type="hidden" name="idRequest" id="idRequest" value="<?php echo $key['id_req']?>">
                                  <input type="hidden" name="tanggalOpen" id="tanggalOpen" value="<?php echo $key['tanggal_open']?>">
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" value="acc" name="submit" class="btn btn-success">Kirim</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <?php } else if($this->session->userdata("auth") == 3 && $key['status'] == 2) { ?>
                <span data-toggle="modal" data-target="#Modal<?php echo $key['id_req']?>" role="button">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Terima Order"><i class="mdi mdi-check font-18"></i></a></span>
                <div class="modal fade" id="Modal<?php echo $key['id_req']?>" tabindex="-1" role="dialog" aria-labelledby="TeknisiModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="TeknisiModal">Close Order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group row">
                                  <label for="deskripsiOrder" class="col-md-3 text-right control-label col-form-label">Deskripsi kerja</label>
                                  <?php echo form_open(base_url('order/closed'), 'class="form-horizontal"' ); ?>
                                  <div class="col-md-12">
                                    <textarea class="form-control" id="deskripsiTeknisi" name="deskripsiTeknisi" rows="3"></textarea>
                                  </div>
                                  <input type="hidden" name="idRequest" id="idRequest" value="<?php echo $key['id_req']?>">
                              </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" value="acc" name="submit" class="btn btn-success">Kirim</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if($this->session->userdata("auth") < 3 && $key['status'] == 3) { ?>
                  <a href="<?php echo base_url('order/reopen/'.$key['id_req'])?>" data-toggle="tooltip" data-placement="top" title="Re-open"><i class="mdi mdi-open-in-new font-18"></i></a>
                <?php } ?>
                <?php if($this->session->userdata("auth") < 4 && $key['is_komplain'] == 1 ) { ?>
                  <a href="<?php echo base_url('komplain/view/'.$key['id_req'])?>" data-toggle="tooltip" data-placement="top" title="Komplain"><i class="mdi mdi-alert-circle-outline font-18"></i></a>
                <?php } ?>
                <?php if($this->session->userdata("auth") < 3) { ?>
                <a href="<?php echo base_url('order/edit/'.$key['id_req']); ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-lead-pencil font-18"></i></a>
                <a href="<?php echo base_url('order/delete/'.$key['id_req']); ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="mdi mdi-delete font-18"></i></a>
                <?php } ?>
                <?php if($this->session->userdata("auth")==4 && $key['status'] == 3) { ?>
                  <a href="<?php echo base_url('komplain/view/'.$key['id_req'])?>" data-toggle="tooltip" data-placement="top" title="Komplain"><i class="mdi mdi-alert-circle-outline font-18"></i></a>

                  <span data-toggle="modal" data-target="#Review<?php echo $key['id_req']?>"><a href="#" data-toggle="tooltip" data-placement="top" title="Beri rating dan review"><i class="mdi mdi-star font-18"></i></a></span>
                  <div class="modal fade" id="Review<?php echo $key['id_req']?>" tabindex="-1" role="dialog" aria-labelledby="reviewLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="reviewLabel">Rating dan Review</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                <?php echo form_open(base_url('order/review'), 'class="form-horizontal"' ); ?>
                                <div class="container">
                                      <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                          <input type="radio" id="star5_<?php echo $key['id_req']?>" name="rating<?php echo $key['id_req']?>" value="5" /><label for="star5_<?php echo $key['id_req']?>" title="5 star"></label>
                                          <input type="radio" id="star4_<?php echo $key['id_req']?>" name="rating<?php echo $key['id_req']?>" value="4" /><label for="star4_<?php echo $key['id_req']?>" title="4 star"></label>
                                          <input type="radio" id="star3_<?php echo $key['id_req']?>" name="rating<?php echo $key['id_req']?>" value="3" /><label for="star3_<?php echo $key['id_req']?>" title="3 star"></label>
                                          <input type="radio" id="star2_<?php echo $key['id_req']?>" name="rating<?php echo $key['id_req']?>" value="2" /><label for="star2_<?php echo $key['id_req']?>" title="2 star"></label>
                                          <input type="radio" id="star1_<?php echo $key['id_req']?>" name="rating<?php echo $key['id_req']?>" value="1" /><label for="star1_<?php echo $key['id_req']?>" title="1 star"></label>
                                      </div>
                                      <div class="form-group row">
                                          <label for="reviewOrder" class="col-md-3 text-right control-label col-form-label">Review</label>
                                          <div class="col-md-7">
                                            <textarea class="form-control" id="reviewOrder" name="reviewOrder" rows="3"></textarea>
                                          </div>
                                          <input type="hidden" name="idRequest" id="idRequest" value="<?php echo $key['id_req']?>">
                                          <input type="hidden" name="rat" id="rat" value="rating<?php echo $key['id_req']?>">
                                      </div>
                                </div>  
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  <button type="submit" value="acc" name="submit" class="btn btn-success">Kirim</button>
                              </div>
                              <?php echo form_close(); ?>
                          </div>
                      </div>
                  </div>
                <?php } ?>
              </td>
            </tr>
        <?php } ?>
          </tbody>
  </table>
</div>
</div>
</div>