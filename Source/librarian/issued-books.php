<?php 
     session_start();
    if (!isset($_SESSION["id"])) {
        ?>
            <script type="text/javascript">
                window.location="index.php";
            </script>
        <?php
    }
    $page = 'ibook';
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
							<span class="disabled">Sách đã mượn</span>
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
                                                <th>Tên sách</th>
                                                <th>Ngày mượn</th>
                                                <th>Ngày trả</th>
                                                <th>Người dùng</th>
                                                <th>Tên</th>
                                                <th>Tài khoản</th>
                                                <th>Email</th>
                                                <th>Ngày hết hạn</th>
                                            </tr>
                                       </thead>
                                        <tbody>
                                            <?php 
                                                $res= mysqli_query($link, "SELECT  name, username, email,utype, issue_book.booksissuedate, return_book.returndate, return_book.expirationdate, book.books_name FROM issue_book, return_book, book, users WHERE issue_book.user_id = return_book.user_id AND issue_book.book_id = return_book.book_id AND issue_book.book_id = book.id AND issue_book.user_id = users.id ");
                                                 while ($row=mysqli_fetch_array($res)) {
                                                    if($row["returndate"] == ""){
                                                        $returndate = "chưa trả";
                                                    }
                                                    else{
                                                        $returndate = $row["returndate"];
                                                    }
                                                    echo "<tr>";
                                                    echo "<td>"; echo $row["books_name"]; echo "</td>";
                                                    echo "<td>"; echo $row["booksissuedate"]; echo "</td>";
                                                    echo "<td>"; echo $returndate; echo "</td>";
                                                    echo "<td>"; echo $row["utype"]; echo "</td>";
                                                    echo "<td>"; echo $row["name"]; echo "</td>";
                                                    echo "<td>"; echo $row["username"]; echo "</td>";
                                                    echo "<td>"; echo $row["email"]; echo "</td>";
                                                    echo "<td>"; echo $row["expirationdate"]; echo "</td>";
                                                    echo "<td>";
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
     <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>