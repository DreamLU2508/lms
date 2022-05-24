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
							<p><span>Bảng điều khiển</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>Trang chủ</a>
							<span class="disabled">Doanh thu</span>
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
                                                <th>Tài khoản</th>
                                                <th>Loại</th>
                                                <th>Email</th>
                                                <th>Tên sách</th>
                                                <th>Giá</th>
                                                <th>Hành động</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                           <?php
                                                $res= mysqli_query($link, "SELECT users.id, name, username, password, email, phone, address, utype, photo, status, issue_book.book_id, issue_book.booksissuedate, return_book.returndate, return_book.expirationdate, return_book.cost, book.books_name, book.books_image, book.books_author_name, book.books_publication_name, book.books_purchase_date, book.books_price, book.books_quantity, book.books_availability, book.librarian_id, book.books_file FROM issue_book, return_book, book, users WHERE issue_book.user_id = return_book.user_id AND issue_book.book_id = return_book.book_id AND issue_book.book_id = book.id AND issue_book.user_id = users.id ");
                                                while ($row=mysqli_fetch_array($res)) {
                                                    if($row['cost'] != 0){
                                                        echo "<tr>";
                                                        echo "<td>"; echo $row["username"]; echo "</td>";
                                                        echo "<td>"; echo $row["utype"]; echo "</td>";
                                                        echo "<td>"; echo $row["email"]; echo "</td>";
                                                        echo "<td>"; echo $row["books_name"]; echo "</td>";
                                                        echo "<td>"; echo $row["cost"]; echo "</td>";
													    echo "<td>";
													    ?><a href="#" style="color: red"><i class="fas fa-trash"></i></a><?php
													    echo "</td>";
                                                        echo "</tr>";
                                                    }
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