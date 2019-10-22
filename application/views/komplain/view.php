<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Order #<?php echo $komplain[0]['id_req']?></h4>
                <div class="chat-box scrollable" style="height:475px;">
                    <!--chat Row -->
                    <ul class="chat-list">
                        <!--chat Row -->
                        <?php foreach($komplain as $key) { ?>
                            <?php if($key['pengirim_komplain'] == $this->session->userdata("id")) { ?>
                                <li class="odd chat-item">
                                    <div class="chat-content">
                                        <div class="box bg-light-inverse"><?php echo $key['isi_komplain']?></div>
                                        <br>
                                    </div>
                                    <div class="chat-time"><?php $time = date("d-m-Y H:i", strtotime($key['waktu_komplain'])); echo $time;?>
                                    </div>
                                </li>
                            <?php } else { ?>
                                <li class="chat-item">
                                    <div class="chat-img"><img src="../../assets/images/users/1.jpg" alt="user"></div>
                                    <div class="chat-content">
                                        <h6 class="font-medium"><?php echo $key['nama_user']?></h6>
                                        <div class="box bg-light-info"><?php echo $key['isi_komplain']?></div>
                                    </div>
                                    <div class="chat-time"><?php $time = date("d-m-Y H:i", strtotime($key['waktu_komplain'])); echo $time;?>
                                    </div>
                                </li>
                            <?php } ?>
                        <!--chat Row -->
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php echo form_open(base_url('komplain/send'), 'class="form-horizontal"' ); ?>
            <div class="card-body border-top">
                <div class="row">
                    <input type="hidden" name="idRequest" id="idRequest" value="<?php echo $komplain[0]['id_req']?>">
                    <div class="col-9">
                        <div class="input-field m-t-0 m-b-0">
                            <textarea id="isiKomplain" name="isiKomplain" placeholder="Tulis di sini..." class="form-control border-0"></textarea>
                        </div>
                    </div>
                    <div class="col-3">
                        <button class=" btn btn-circle btn-lg btn-cyan float-right text-white" type="submit"><i class="fas fa-paper-plane"></i></button>
                    </div> 
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>