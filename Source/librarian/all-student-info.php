<?php 		 
    session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }

    $page = 'sinfo';
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
							<p><span>Bảng điều khiển</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Trang chủ</a>
							<span class="disabled">Tất cả sinh viên</span>
						</div>
					</div>
				</div>
			</div>					
		</div>
        <div class="student-wrapper">
           <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="std-info">
                            <table id="dtBasicExample" class="table table-dark table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Mã sinh viên</th>
                                        <th>Tên</th>
                                        <th>Tài khoản</th>
                                        <th>Học kì</th>
                                        <th>Khóa</th>
                                        <th>Phiên họp</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Dịa chỉ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                        $res= mysqli_query($link, "select * from std_registration");
                                        while ($row=mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            echo "<td>"; echo $row["regno"]; echo "</td>";
                                            echo "<td>"; echo $row["name"]; echo "</td>";
                                            echo "<td>"; echo $row["username"]; echo "</td>";
                                            echo "<td>"; echo $row["sem"]; echo "</td>";
                                            echo "<td>"; echo $row["dept"]; echo "</td>";
                                            echo "<td>"; echo $row["session"]; echo "</td>";
                                            echo "<td>"; echo $row["email"]; echo "</td>";
                                            echo "<td>"; echo $row["phone"]; echo "</td>";
                                            echo "<td>"; echo $row["address"]; echo "</td>";
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
	<?php 
		include 'inc/footer.php';
	 ?>
    <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>		