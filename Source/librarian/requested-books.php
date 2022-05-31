<?php 
     session_start();
    if (!isset($_SESSION["id"])) {
        ?>
            <script type="text/javascript">
                window.location="index.php";
            </script>
        <?php
    }
    $page = 'rbook';
    include 'inc/header.php';
    include 'inc/connection.php';
    mysqli_query($link,"update request_books set read1='yes'");
 ?>
	<!--dashboard area-->
	<div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>Bảng điều khiển</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Trang chủ</a>
							<span class="disabled">Sách yêu cầu</span>
						</div>
					</div>
				</div>
				<div class="issued-content">
					<div class="row">
						<div class="col-md-12">
							<div class="rbook-info status">
								<table id="dtBasicExample" class="table  table-striped table-dark text-center">
									<thead>
										<tr>
											<th>Tên</th>
											<th>Tài khoản</th>
											<th>Loại tài khoản</th>								
											<th>Email</th>
											<th>Tên sách</th>
											<th>Liên kết</th>										
										</tr>
									</thead>
									<tbody>
                                    <?php
                                        $res= mysqli_query($link, "select * from request_books ORDER BY id DESC");
                                        while ($row=mysqli_fetch_array($res)) {
                                            $burl = $row['burl'];
                                            echo "<tr>";
                                            echo "<td>"; echo $row["name"]; echo "</td>";
                                            echo "<td>"; echo $row["username"]; echo "</td>";
                                            echo "<td>"; echo $row["utype"]; echo "</td>";
                                            echo "<td>"; echo $row["email"]; echo "</td>";
                                            echo "<td>"; echo $row["bname"]; echo "</td>";
                                            echo "<td>";
                                            ?><a href="<?php echo $burl; ?>" target="_blank">View</a><?php
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                    </tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>
	</div>
 <?php 
	include 'inc/footer.php';
 ?>
