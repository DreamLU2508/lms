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
							<span class="disabled">Quản lý sách</span>
						</div>
					</div>
				</div>				
			</div>	
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dbooks">
                            <table id="dtBasicExample" class="table table-striped table-dark text-center">
                           <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Tác giả</th>
                                    <th>Nhà xuất bản</th>
                                    <th>Ngày mua</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Sách có sẵn</th>
                                    <th>Xóa sách</th>
                                </tr>
                           </thead>
                            
                            <tbody>
                             <?php
                                $res = mysqli_query($link, "select * from add_book");
                                while ($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>"; ?><img src="<?php echo $row["books_image"]; ?> " height="100" width="100" alt=""> <?php echo "</td>";
                                    echo "<td>";
                                    echo $row["books_name"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_author_name"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_publication_name"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_purchase_date"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_price"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_quantity"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_availability"];
                                    echo "</td>";
                                     echo "<td>";
                                    ?><a href="delete-book.php?id=<?php echo $row["id"]; ?> "><i class="fas fa-trash"></i></a><?php
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
	<?php 
		include 'inc/footer.php';
	 ?>
      <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
  </script>