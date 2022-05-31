<?php 
     session_start();
    if (!isset($_SESSION["id"])) {
        ?>
            <script type="text/javascript">
                window.location="index.php";
            </script>
        <?php
    }
    include 'inc/header.php';
    include 'inc/connection.php';
 ?>
	<!--dashboard area-->
	<div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>Bảng Điều Khiển</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Trang Chủ</a>
							<span class="disabled">Trạng thái người dùng</span>
						</div>
					</div>
				</div>
				<div class="issued-content">
					<div class="row">
						<div class="col-md-12">
							<div class="rbook-info status">
                                 <table id="dtBasicExample" class="table table-striped table-dark text-center">
                                       <thead>
                                            <tr>
                                                <th>Họ Tên</th>
                                                <th>Tên người dùng</th>
                                                <th>Loại</th>
                                                <th>Email</th>
                                                <th>Trạng thái</th>
                                                <th>Hoạt động</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                           <?php
                                                $res= mysqli_query($link, "select * from users ORDER BY id DESC");
                                                while ($row=mysqli_fetch_array($res)) {
                                                    echo "<tr>";
                                                    echo "<td>"; echo $row["name"]; echo "</td>";
                                                    echo "<td>"; echo $row["username"]; echo "</td>";
                                                    echo "<td>"; echo $row["utype"]; echo "</td>";
                                                    echo "<td>"; echo $row["email"]; echo "</td>";
                                                    echo "<td>"; echo $row["status"]; echo "</td>";
                                                    echo "<td>";
                                                    ?>
                                                        <ul>
                                                            <li><a href="approve.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-location-arrow"></i></a></li>
                                                            <li><a href="notapprove.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-allergies"></i></a></li>
                                                        </ul>
                                                    <?php
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
