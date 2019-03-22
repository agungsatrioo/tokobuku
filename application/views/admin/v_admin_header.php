<div class="wrapper">
	<div class="head-menu row">
		<div class="col-xs-9">
			<b class="title">MyBookStore</b>
		</div>
		<div class="col-xs-3">
			<li class="dropdown notifications-menu pull-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            	<b><?php echo $this->session->userdata('username') ?></b>
            </a>
            <ul class="dropdown-menu">
            	<li><a href="#">Pengaturan</a></li>
              <li><a href="<?php echo base_url("login/logout") ?>">Logout</a></li>
            </ul>
          </li>
		</div>
	</div>