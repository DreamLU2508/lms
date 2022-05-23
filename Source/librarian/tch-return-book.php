<?php 
    session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
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
							<span class="disabled">Trả Sách</span>
						</div>
					</div>
				</div>
				<div class="rBook">
					<form action="" method="post" name="form1">
                       <table class="table table-bordered">
                           <tr>
                               <td>
                                   <select name="enr" class="form-control">
                                        <option value="">1001</option>
                                        <option value="">1002</option>
                                        <option value="">1003</option>
                                   </select>
                               </td>
                               <td>
                                   <input type="submit" name="submit1" class="btn btn-info" value="Search">
                               </td>
                           </tr>
                       </table>
                   </form>
                   <div class="row">
						<div class="col-md-12">
							<div class="rbook-info">
								<table class="table  table-striped table-dark text-center">
									<thead>
										<tr>
											<th>Id </th>
											<th>Họ Tên</th>
											<th>Tên người dùng</th>
											<th>Nợ</th>
											<th>Tên Sách</th>
											<th>Ngày phát hành</th>
											<th>Email</th>
											<th>SDT</th>
											<th>Trả sách</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1001</td>
											<td>Mostafizur Rahman</td>
											<td>utter333</td>
											<td>CSE</td>
											<td>Computer Network & Secutity</td>
											<td>22/03/19</td>
											<td>mamun@gmail.com</td>
											<td>01721585268</td>
											<td ><a href="return.php">Trả sách</a></td>
										</tr>
										<tr>
											<td>1001</td>
											<td>
												
											</td>
											<td>utter333</td>
											<td>CSE</td>
											<td>Computer Network & Secutity</td>
											<td>22/03/19</td>
											<td>mamun@gmail.com</td>
											<td>01721585268</td>
											<td><a href="return.php">Trả sách</a></td>
										</tr>
										<tr>
											<td>1001</td>
											<td>Nguyễn Linh</td>
											<td>utter333</td>
											<td>CSE</td>
											<td>Designing for Safe Use</td>
											<td>22/03/19</td>
											<td>mamun@gmail.com</td>
											<td>01721585268</td>
											<td><a href="return.php">Trả Sách</a></td>
										</tr>
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