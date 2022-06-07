<?php 
     session_start();
    if (!isset($_SESSION["id"])) {
        ?>
            <script type="text/javascript">
                window.location="index.php";
            </script>
        <?php
    }
    $page = 'home';
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
							<span class="disabled">Bảng điều khiển</span>
						</div>
					</div>
				</div>
				<div class="row counterup">
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box">
							<div class="icon">
								<i class="fa fa-users"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from users");
                                         $count = mysqli_num_rows($res);
                                         echo $count;
                                    ?>
                                    </span></h3>
								<h4><a href="all-users-info.php">Thành viên</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box2">
							<div class="icon">
								<i class="fa fa-rocket"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from issue_book");
                                         $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>
                                    </span></h3>
								<h4><a href="issued-books.php">Sách đã mượn</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box3">
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from book");
                                         $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>
                                    </span></h3>
								<h4><a href="display-books.php">Sách</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box4">
							<div class="icon">
								<i class="fas fa-dollar-sign"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                     <?php
                                         $res = mysqli_query($link, "select cost from return_book");
                                         $sum = 0;
										 while($row = mysqli_fetch_assoc($res)){
											 $sum = $sum + $row['cost'];
										 }
                                        echo $sum;
                                    ?>
                                    </span></h3>
								<h4><a href="fine.php">Doanh thu</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box3">
							<div class="icon">
								<i class="fas fa-book"></i>
							</div>
							<div class="text">
								<h4 class="mt-20"><a href="display-books.php">Quản lý sách</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box4">
							<div class="icon">
								<i class="fas fa-user"></i>
							</div>
							<div class="text">
								<h4 class="mt-20"><a href="add-user.php">Quản lý người dùng</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box">
							<div class="icon">
								<i class="fab fa-staylinked"></i>
							</div>
							<div class="text">
								<h4 class="mt-20"><a href="status.php">Trạng thái người dùng</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box2">
							<div class="icon">
								<i class="fas fa-book"></i>
							</div>
							<div class="text">
								<h4 class="mt-10"><a href="requested-books.php">Sách được Yêu cầu</a></h4>
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

	 