$(document).ready(function() {
    $("#kategoriOrder").change(function() {
        var val = $(this).val();
        if(val == 1) {
            $("#subkategoriOrder").html("<option value='1'><?php echo $instruksi ?></option>");
        }
        else if(val == 2) {
            $("#subkategoriOrder").html("<option value='2'>TV mantap</option>");
        }
        // <?php 
        //     for($i=1;$i<=$count_kategori;$i++) {
        //         $where = array(
        //             'id_kategori' => $i
        //         );
        //         $raw = $this->db->get_where("subkategori",$where);
        //         $count = $raw->num_rows();
        //         if($count>0) {
        //             $data=$raw->row();
        //         }
        //     }
        // ?>
    
    });
});