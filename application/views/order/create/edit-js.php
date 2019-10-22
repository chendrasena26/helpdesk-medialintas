<script>
    $(document).ready(function() {
        $("#kategoriOrder").change(function() {
            var val = $(this).val();
            if(val == 0) {}

            <?php for($i=1;$i<=$count_kategori;$i++) { ?>
            <?php $where = array(
                    'id_kategori' => $i
                );
                $count = $this->db->get_where("subkategori",$where)->num_rows();
                $query = $this->db->get_where("subkategori",$where);
                $data = $query->result_array();
                if($count>0) { ?>
                
            else if(val == <?php echo $i ?>) {
                    $("#subkategoriOrder").html(
                        "<?php foreach ($data as $key) { ?>
                        <option value='<?php echo $key['id_subkategori']?>' <?php if($key['id_subkategori'] == $request[0]['id_kategori']) {echo "selected";}?>><?php echo $key['isi_subkategori']?></option> <?php } ?>"
                        );
            }
                <?php } ?>
            <?php } ?>
        
        });
    });
</script>