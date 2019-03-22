	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<script src="<?php echo base_url("media")?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
</script>
<script>
	$('#tables>tbody').on('click', 'tr>td>a#delete', function (e){
        e.preventDefault();
        
        var hrefs = $('tr>td>a#delete').attr('href') +  $(this).parents('tr:first').find('td:first').text();

         if(confirm('Are you sure to delete data?')==true) {
         	window.location = hrefs;
         }

      });

</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url("media")?>/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>