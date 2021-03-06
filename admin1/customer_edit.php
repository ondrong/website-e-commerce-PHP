<?php
	session_start();
	require 'connect.php';

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <?php
	include_once("head.php");
   ?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<script type="text/javascript">
   
</script>
   <?php
	include_once("atas1.php");
   ?>
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <?php
		include_once("slidebar/slidebar_customer.php");
	  ?>
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-navy-blue" data-style="navy-blue"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Data Tables
                     <small>Full DataTables Integration</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="customer.php">Customer</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="customer_edit.php">Edit Data Customer</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            
            
           
            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Managed Table</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                        <section id="atas" class="hero-unit span10">
						<section class="span8">
							<form action="customer_data_edit.php" method="post"">
							<?php
								$result=mysql_query("select * from member m, kota k,provinsi p where id_member=$_GET[id] and m.id_kota=k.id_kota and m.id_provinsi=p.id_provinsi");
								if (!empty($result)){
								while($row=mysql_fetch_array($result))
								{
							?>	
							
								<section class="span3">Id Member</section>
								<section>
								<input type="text" id="id" name="id" value="<?php echo $row['id_member']; ?>" readonly /><br />
								</section>
								<section class="span3">Status</section>
								<section>
									<input type="text" id="status" name="status" value="<?php echo $row['status'];?>" readonly /><br />
								</section>
								<section class="span3 kanan">Username</section>
								<section>
									<input type="username" id="inputusername" name="username" value="<?php echo $row['username'];?>" /><br />
									<span id="user-result"></span>
								</section>
								<section class="span3 kanan">Password: </section>
								<section>
									<input id="Password" type="text" name="password" required="required" value="<?php echo $row['password'];?>" /><br/>
								</section>
								<section class="span3 kanan">Nama: </section>
								<section>
									<input id="nama" type="text" name="nama" required="required" value="<?php echo $row['nama'];?>" /><br/>
								</section>
								<section class="span3 kanan">Tanggal Lahir: </section>
								<section>
									<input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $row['tanggal_lahir'];?>"/>
								</section>
								<section class="span3">handphone: </section>
								<section>
									<input id="no_telp" type="text" name="nomor_handphone" required="required" value="<?php echo $row['nomor_handphone']; ?> "/> <br/></input>
								</section>
								<section class="span3">Alamat: </section>
								<section>
									<input id="alamat" type="text" name="alamat" required="required" value="<?php echo $row['alamat'];?>" /><br/></input>
								</section>
								<section class="span3">Email: </section>
								<section>
									<input id="email" type="text" name="email" required="required" value="<?php echo $row['email'];?>" /><br/>
								</section>
								<section class="span3 kanan">Provinsi: </section>
								<section>
									<select id="provinsi" name="provinsi" class="naik" value="<?php echo $row['provinsi'];?>" >
												<?php
												echo "
												<option value=''>Select One</option>";
												$provinsi="select * from provinsi"; // Query to collect data from table 
												$resultprov=mysql_query($provinsi);
												while($rowprovinsi=mysql_fetch_array($resultprov))
												{
													echo "<option value=$rowprovinsi[id_provinsi]>$rowprovinsi[provinsi]</option>";
												}
												?>
									</select>
								</section>
								<section class="span3 kanan">Kota: </section>
								<section>
									<select name="kota" id="kota" value="<?php echo $row['kota'];?>" >
												<option>-select your city-</option>
										</select>
								</section>
								
								<section class="span3 kanan"></section>
								<section>
									<input id="submit" class="btn btn-mini" type="submit" value="Submit"/>
								</section>
							<?php
								}
							}
							mysql_close($con);
							?>	
							
							</form>
						</section>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->

            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 &copy; Admin Lab Dashboard.
      <div class="span pull-right">
         <span class="go-top"><i class="icon-arrow-up"></i></span>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>   
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->   
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script src="js/scripts.js"></script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
	  $(document).ready(function(){


	   $("#provinsi").change(function(){
			 var provinsi=$("#provinsi").val();
			 $.ajax({
				type:"post",
				url:"ajaxcity.php",
				data:"provinsi="+provinsi,
				success:function(data){
					  $("#kota").html(data);
				}
			 });
	   });
	   
	   $("#inputusername").keyup(function () { //user types username on inputfiled
		   var username = $("#inputusername").val(); //get the string typed by user
		  // window.alert (username);
		  
			$.ajax({
				type:"post",
				url:"check_username.php",
				data:"username="+username,
				success:function(data){
					  $("#user-result").html(data);
				}
			 });
		   
		});
   });
   </script>
</body>
<!-- END BODY -->
</html>
