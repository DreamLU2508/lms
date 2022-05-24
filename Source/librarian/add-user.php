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
include 'inc/function.php';
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
							<span class="disabled">Thêm người dùng</span>
						</div>
					</div>
				</div>
				<div class="addUser">
					<div class="gap-40"></div>
					<div class="reg-body user-content">
                        <?php if(isset($s_msg)):?>
                            <span class="success"> <?php echo $s_msg; ?></span>
                        <?php endif ?>
                        <?php if(isset($error_m)):?>
                            <span class="error"> <?php echo $error_m; ?></span>
                        <?php endif ?>
                        <h4 style="text-align: center; margin-bottom: 25px;">Mẫu đăng ký</h4>
                        <form action="" class="form-inline" method="post">
                            <div class="form-group">
                                <label for="name" class="text-right">Tên <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Tên của bạn" name="name"/>
                            </div>
                            <div class="form-group">
                                <label for="username">Tài khoản <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Tài khoản của bạn" name="username" />
                            </div>
                            <?php if(isset($error_ua)):?>
                                <span class="error"> <?php echo $error_ua; ?></span>
                            <?php endif ?>
                            <?php if(isset($error_uname)):?>
                                <span class="error"> <?php echo $error_uname; ?></span>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="password">Mật khẩu <span>*</span></label>
                                <input type="password" class="form-control custom" placeholder="Mật khẩu của bạn" name="password"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Email" name="email"/>
                            </div>
                            <?php if(isset($e_msg)):?>
                                <span class="error"><?php echo $e_msg; ?> </span>
                            <?php endif ?>
                            <?php if(isset($error_email)):?>
                                <span class="error"><?php echo $error_email; ?> </span>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="phone">Số điện thoại <span>*</span></label>
                                <input type="text" class="form-control custom" placeholder="Số điện thoại của bạn" name="phone"/>
                            </div>
                            <?php if(isset($error_phone)):?>
                                <span class="error"><?php echo $error_phone; ?></span>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="address">Địa chỉ <span>*</span></label>
                                <textarea name="address" id="address"  class="form-control custom" placeholder="Địa chỉ của bạn"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="utype">Loại <span>*</span></label>
                                <select name="utype" id="utype"  class="form-control custom">
                                    <option>student</option>
                                    <option>teacher</option>
                                </select>
                            </div>
                            <div class="submit">
                                <input type="submit" value="Thêm sinh viên" name="submit" class="btn change text-center">
                            </div>
                        </form>

					</div>
				</div>
				
			</div>					
		</div>
	</div>

    <div class="gap-40"></div>
	<?php 
		include 'inc/footer.php';
	 ?>