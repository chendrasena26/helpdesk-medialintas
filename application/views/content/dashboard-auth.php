<?php 
	if($this->session->userdata("auth") == 1) {
		$content = "<div class=\"card text-white bg-primary mb-3\" style=\"max-width: 18rem; height:100px;\">
				  <div class=\"card-body\">
				    <h5 class=\"card-title\">Hai admin</h5>
				  </div>
				</div>";
	}else if($this->session->userdata("auth") == 2) {
		$content = "<div class=\"card text-white bg-primary mb-3\" style=\"max-width: 18rem; height:100px;\">
				  <div class=\"card-body\">
				    <h5 class=\"card-title\">Hai operator</h5>
				  </div>
				</div>";
	}else if($this->session->userdata("auth") == 3) {
		$content = "<div class=\"card text-white bg-primary mb-3\" style=\"max-width: 18rem; height:100px;\">
				  <div class=\"card-body\">
				    <h5 class=\"card-title\">Hai teknisi</h5>
				  </div>
				</div>";
	}else if($this->session->userdata("auth") == 4) {
		$content = "
				<div class=\"col-md-3\">
				<a href=\"./order/create\" style=\"text-decoration:none;\">
	          <div class=\"card text-white bg-primary mb-3\" style=\"width: 15rem; height: 120%;\">
				  <div class=\"card-body\">
				    <h5 class=\"card-title\">Buat order</h5>
				  </div>
				</div>
	        </a>
	        </div>
	        <div class=\"col-md-3\">
				<a href=\"./order/list\" style=\"text-decoration:none;\">
	          <div class=\"card text-white bg-primary mb-3\" style=\"width: 15rem; height: 120%;\">
				  <div class=\"card-body\">
				    <h5 class=\"card-title\">Lihat order</h5>
				  </div>
				</div>
	        </a>
	        </div>

				";
	}
?>