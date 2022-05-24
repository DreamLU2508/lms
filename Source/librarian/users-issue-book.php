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
    $rdate = date("d/m/Y", strtotime("+30 days"));
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
							<span class="disabled">Sách phát hành sinh viên</span>
						</div>
					</div>
				</div>
				<div class="issueBook">
					<div class="row">
						<div class="col-md-6">
							<div class="issue-wrapper">
								<form action="" class="form-control" method="post" name="reg">
									<table class="table">
										<tr>
											<td class="">
												<select name="reg" id="" class="form-control">
													 <?php 
                                                        $res= mysqli_query($link, "SELECT users.id, name, username, password, email, phone, address, utype, photo, status, issue_book.book_id, issue_book.booksissuedate, return_book.returndate, return_book.expirationdate, return_book.cost, book.books_name, book.books_image, book.books_author_name, book.books_publication_name, book.books_purchase_date, book.books_price, book.books_quantity, book.books_availability, book.librarian_id, book.books_file FROM issue_book, return_book, book, users WHERE issue_book.user_id = return_book.user_id AND issue_book.book_id = return_book.book_id AND issue_book.book_id = book.id AND issue_book.user_id = users.id ");
                                                        while($row=mysqli_fetch_array($res)){
                                                            echo "<option>";
                                                            echo $row["id"].' - '.$row['name'];
                                                            echo "</option>";
                                                        }
                                                    ?>
												</select>
											</td>
											<td>
												<input type="submit" class="btn btn-info" value="select" name="submit1">
											</td>
										</tr>
									</table>
                                    <?php 
                                    if (isset($_POST["submit1"])) {
                                        $sql = "SELECT users.id, name, username, password, email, phone, address, utype, photo, status, issue_book.book_id, issue_book.booksissuedate, return_book.returndate, return_book.expirationdate, return_book.cost, book.books_name, book.books_image, book.books_author_name, book.books_publication_name, book.books_purchase_date, book.books_price, book.books_quantity, book.books_availability, book.librarian_id, book.books_file FROM issue_book, return_book, book, users WHERE issue_book.user_id = return_book.user_id AND issue_book.book_id = return_book.book_id AND issue_book.book_id = book.id AND issue_book.user_id = users.id and users.id = ".explode(' ', $_POST['reg'])[0];
                                       $res5 = mysqli_query($link, $sql);
                                    //    var_dump($row5 = mysqli_fetch_assoc($res5));
                                       while($row5 = mysqli_fetch_assoc($res5)){
                                           $id = $row5["id"];                    
										   $name = $row5["name"];
                                           $username = $row5["username"];
                                           $email = $row5["email"];
                                           $phone = $row5["phone"];
                                           $address = $row5["address"];
                                           $utype = $row5["utype"];
                                           $status = $row5["status"];
                                           $namebook = $row5['books_name'];
                                           $booksissuedate = $row5['booksissuedate'];
                                           $returndate = $row5['returndate'];
                                           $expirationdate = $row5['expirationdate'];
                                           $bookid = $row5['book_id'];
                                           $_SESSION["utype"]     = $utype;
                                           $_SESSION["susername"] = $username;
                                       }
                                    ?>
									<table class="table table-bordered">
                                         <tr>
                                            <td>
                                                <label for="name" class="text-right">Loại:</label>
                                               <input type="text" class="form-control" name="utype" value="<?php echo $utype; ?>" readonly> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="name" class="text-right">ID:</label>
                                               <input readonly = "readonly" type="text" class="form-control" name="id" value="<?php echo $id; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="name" class="text-right">Tên:</label>
                                               <input type="text" class="form-control" name="name" value="<?php echo $name; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="name" class="text-right">Số điện thoại:</label>
                                               <input type="text" class="form-control" name="phone"  value="<?php echo $phone; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="name" class="text-right">Email:</label>
                                               <input type="text" class="form-control" name="mail"  value="<?php echo $email; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="name" class="text-right">Tên sách:</label>
                                                <input type="text" class="form-control" name="namebook"  value="<?php echo $namebook; ?>" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="name" class="text-right">ID sách:</label>
                                               <input type="text" class="form-control" name="bookid"  value="<?php echo $bookid; ?>" readonly> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="name" class="text-right">Ngày mượn:</label>
                                               <input type="text" class="form-control" name="booksissuedate"  value="<?php echo $booksissuedate; ?>" disabled> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="name" class="text-right">Ngày trả:</label>
                                               <input type="text" class="form-control" name="returndate"  value="<?php echo $returndate; ?>" disabled> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="name" class="text-right">Ngày hết hạn:</label>
                                               <input type="text" class="form-control" name="expirationdate"  value="<?php echo $expirationdate; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="name" class="text-right">Tài khoản:</label>
                                               <input type="text" class="form-control" name="username"  value="<?php echo $username; ?>" disabled> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <input type="submit" name="submit2" class="btn btn-info" value="edit"> 
                                            </td>
                                        </tr>
                                    </table>
                                  <?php
                                }

                            ?>
                                </form>
                                <?php
                                    if (isset($_POST["submit2"])) {
                                        $sql1 = "update return_book set expirationdate = '".$_POST['expirationdate']."' where book_id = ".$_POST['bookid']." and user_id = ".$_POST['id'];
                                        $sql2 = "UPDATE users SET name='".$_POST['name']."',email='".$_POST['mail']."',phone='".$_POST['phone']."' WHERE id =".$_POST['id'];
                                        mysqli_query($link, $sql1);
                                        mysqli_query($link, $sql2);
                                          ?>
                                              <script type="text/javascript">
                                                  alert("edit successfully");
                                                  window.location.href=window.location.href;
                                              </script>
                                        <?php
                                        }
                                 ?>
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