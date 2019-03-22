<!DOCTYPE html>
<html>
<head>
	<?php 
		echo link_tag(base_url("media").'/login.css'); 
		echo link_tag(base_url("media").'/bootstrap/css/bootstrap.min.css'); 
	?>
	<style type="text/css">
		body {
			background-image: url(<?php echo base_url("media/images/bg.png") ?>);
			background-size:cover;
		}
	</style>
</head>
<body> 

	<div id="container">
		<h2 class="text-center"><b>Login</b></h2>
						<div class="alert alert-danger">
					<?php echo @$error ?>
				</div>
		<?php
			$attr = array("class"=>"form-horizontal", "id"=>"loginForm");
			$form_class=array("class"=>"form-control",'required'=>'required');
			echo '<form  method="post" action="" id="loginForm">';
			echo "<div class='form-group'>";
			echo form_input('username','',$form_class+array('id'=>'username','placeholder'=>'Nama Pengguna'));
			echo "</div>";
			echo "<div class='form-group'>";
			echo form_password('password','',$form_class+array('id'=>'password','placeholder'=>'Kata Sandi'));
			echo "</div>";
			echo "<div class='form-group'>";
			echo form_button(array("class"=>element("class",$form_class)." btn btn-primary",
					"id"=>"login_button",
					"type"=>"submit",
					"content"=>"Login")
				);
			echo "</div>";
			echo form_close();
		?>
	</div>
	<script src="<?php echo base_url("media")?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo base_url("media")?>/bootstrap/js/bootstrap.min.js"></script>
		
		
		<script>
               $('.alert-danger').hide();
        
                 $('#loginForm').submit(function(e){
                    e.preventDefault();

					 $('#login_button').html('Please wait...');
                    var username = $("#username").val();
                    var password= $("#password").val();
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url("login/do_login") ?>",
                        data: {username:username,password:password},
                        dataType:"json",
                        success:function(data)
                        {
							console.log(data);
							
                            if(data=="true") {
								location.reload();
                            } else {
                                <?php $this->session->set_flashdata("error", "Wrong login credentials!"); ?>
                                $('.alert-danger').html('<?php echo $this->session->flashdata('error'); ?>').fadeIn();
								$('#login_button').html('Login');
                            }
                        }
                    });
                });
		</script>
</body>
</html>