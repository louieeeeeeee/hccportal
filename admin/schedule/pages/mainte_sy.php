
<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style>
        body {
            background: url(../dist/img/temp.jpg) center/cover no-repeat;
            margin: 0;
            justify-content: center;
            font-family: Verdana, sans-serif;
            overflow-x: hidden;
            overflow-y: hidden;
            animation: fadeInAnimation ease 1s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }
	</style>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-yellow layout-top-nav" onload="myFunction()">
    <div class="wrapper">
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
        

          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-md-9">
                <div class="box box-warning">
                  <form method="post" id="reg-form">
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="result" id="form"></div>
                        </div><!--col end -->
                        <div class="col-md-6">		
                        </div><!--col end-->           
                      </div><!--row end-->        
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col (right) -->
            
              <div class="col-md-3">
                <div class="box box-warning">
                  <div class="box-body">
                  <!-- Date range -->
                    <div id="form">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="date">Add School Year</label><br>
                            <input type="text" class="form-control" name="sy" placeholder="School Year" required> 
                          </div><!-- /.form group -->
                        </div>
                      </div>	
                  
                      
                      <div class="form-group">
                        <button class="btn btn-lg btn-block btn-primary" id="daterange-btn" name="save" type="submit">
                          Save
                        </button>
                        <button class="btn btn-lg btn-block" id="daterange-btn" type="reset">
                          Cancel
                        </button>
                      </div>
                    </div><!-- /.form group -->
                  </form>	
        <div class="box-body" style="" id="displayform">
                  <!-- Date range -->
                  <div id="form">
					
				  <div class="row">
					 <div class="col-md-12">
						  <form method="post" action="sy_update.php">
						  <div class="form-group">
							<label for="date">Update School Year</label><br>
								<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_REQUEST['id'];?>" placeholder="SY ID" readonly>
								<input type="text" class="form-control" id="sy" name="sy" value="<?php echo $_REQUEST['sy'];?>" placeholder="School Year" required>
						  </div><!-- /.form group -->
					</div>
				  </div>	
               
                  
                  <div class="form-group">
                    
                      <button class="btn btn-lg btn-block btn-primary" id="daterange-btn" name="save" type="submit">
                        Update
                      </button>
					  
					  </form>
					  
                   </div>
                  </div><!-- /.form group --><hr>
				
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->		
          </div><!-- /.row -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->
	<script>
		$(document).ready(function(){
		$(".result").load("sy_list.php");
	});
	</script>
	
	<script type="text/javascript">
		$("#reg-form").on('submit', function()
		 {  
		  $.post('sy_save.php', $(this).serialize(), function(data)
		  {
		   //$(".result").html(data);  
			$(".result").load("sy_list.php");
		  });
		  
		  return false;
		  
		
		})
		
		//-------------------------------------------------------------
		
</script>

	<script type="text/javascript" src="autosum.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
   
  </body>
</html>
