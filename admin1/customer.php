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
                     Data Customer
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="customer.php">Penjualan</a> <span class="divider-last">&nbsp;</span>
                       </li>
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
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
									<th>No</th>
									<th>ID</th>
									<th>Username</th>
									<th>Password</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Kota</th>
									<th>Provinsi</th>
									<th>Email</th>
									<th>No. Handphone</th>
									<th>Tanggal</th>
									<th>History</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
                            </thead>
                            <tbody>
							<?php 
								$no=1;
								$q="select *,DATE_FORMAT(m.waktu_daftar,'%d-%m-%Y') AS waktu2 from member m,kota k,provinsi p  where m.id_kota=k.id_kota and m.id_provinsi=p.id_provinsi and status=2";

								$result=mysql_query("$q");
								if(!empty($result))
								{
									while($row2=mysql_fetch_array($result))
									{
										$result1=mysql_query("select * from penjualan where `id_member`=$row2[id_member]");
										$row=mysql_fetch_array($result1);
										
							?>
                                <tr class="odd gradeX">
								<?php
                                   echo "<td style='text-align:right'>".$no."</td>";
									echo "<td>".$row2['id_member']."</td>";
									echo "<td>".$row2['username']."</td>";
									echo "<td>".$row2['password']."</td>";
									echo "<td>".$row2['nama']."</td>";
									echo "<td>".$row2['alamat']."</td>";
									echo "<td>".$row2['kota']."</td>";
									echo "<td>".$row2['provinsi']."</td>";
									echo "<td>".$row2['email']."</td>";
									echo"<td>".$row2['nomor_handphone']."</td>";
									echo "<td>".$row2['waktu2']."</td>";
										//echo "<td>".$row['ada']."</td>";
									echo "<td><a href='customer_select_penjualan.php?id_member=".$row['id_member']."'><button type='button' class='btn-custom6 btn-small'><i class='icon-folder-open'></i></button></a>  "."</td>";
									echo "<td><a href='customer_edit.php?id=".$row2['id_member']."'><button type='button' class='btn-custom6 btn-small'><i class='icon-pencil'></i></button></a>  "."</td>";
									echo "<td><a href='customer_delete.php?id=".$row2['id_member']."'><button type='button' class='btn-custom5 btn-small'><i class='icon-trash icon-white'></i></button></a>  "."</td>";
								?>	
                                </tr>
							<?php
										$no++;
									}
								}
							?>
                            </tbody>
                        </table>
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
   </script>
</body>
<!-- END BODY -->
</html>
