<?php
	session_start();
	include('../admincp/config/config.php');
	require('../carbon/autoload.php');
    use Carbon\Carbon;
    $now = Carbon::now('Asia/Ho_Chi_Minh');
	$mysqli = new mysqli("localhost","root","","web_mysqli_1");
	mysqli_set_charset($mysqli,"utf8");
	$sql_danhmuc="select * from tbl_danhmuc";
    $query_danhmuc=mysqli_query($mysqli,$sql_danhmuc); 
	
	if(isset($_GET['option'])){
		switch($_GET['option']){
			case 'dangxuat':
				unset($_SESSION['tk']);
				unset($_SESSION['dangky']);
				header("Location:index.php");
				break;
		}
	} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TDT mobile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  </head>
<body>
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href=""><span class="icon-twitter"></span></a>
					<a href=""><span class="icon-facebook"></span></a>
					<a href=""><span class="icon-youtube"></span></a>
					<a href=""><span class="icon-tumblr"></span></a>
				</div>
				<a class="" href="index.php"> <span class="icon-home"></span> Trang chủ</a> 
				 
			<!-- 	<a href="register.php"><span class="icon-edit"></span> Đăng ký </a> 
				<a href="login.php"><span class="icon-lock"></span> Đăng nhập </a>  -->
				<?php
                    if(empty($_SESSION['tk'])){
                ?>
					<a href="login.php"><span class="icon-lock"></span> Đăng nhập </a>
                    <a href="register.php"><span class="icon-edit"></span>Đăng ký</a>  
                <?php
                }else{
                ?>
				<a href="taikhoan.php"><span class="icon-user"></span> Tài khoản</a>
					<span style="color:red"><?php echo $_SESSION['dangky']?></span>
					<a href="?option=dangxuat"><span class="icon-edit"></span>Đăng xuất</a>
                    <a href="thaydoimatkhau.php"><span class="icon-lock"></span>Thay đổi mật khẩu</a>
					<a href="cart.php"><span class="icon-shopping-cart"></span> Giỏ hàng <span class="badge badge-warning"> $</span></a>
                <?php
                    }
                ?>
				<a href="contact.php"><span class="icon-envelope"></span> Liên hệ</a>
				
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="index.php">
		<img src="assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
	<div class="span4">
	
	</div>
	<div class="span4 alignR">
	<p><br> <strong> Hỗ trợ (24/7) :  0384662267 </strong><br><br></p>
	</div>
</div>
</header>

<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class=""><a href="index.php">Trang chủ	</a></li>
			  <li class=""><a href="danhsachsp.php">Danh sách sản phẩm</a></li>
			  <li class=""><a href="baiviet.php">Bài viết</a></li>
			</ul>
			<form action="" class="navbar-search pull-left">
			  <input type="text" placeholder="Search" class="search-query span2">
			</form>
			<ul class="nav pull-right">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Đăng nhập <b class="caret"></b></a>
				<div class="dropdown-menu">
				<form class="form-horizontal loginFrm">
				  <div class="control-group">
					<input type="text" class="span2" id="inputEmail" placeholder="Email">
				  </div>
				  <div class="control-group">
					<input type="password" class="span2" id="inputPassword" placeholder="Password">
				  </div>
				  <div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Ghi nhớ mật khẩu
					</label>
					<button type="submit" class="shopBtn btn-block">Đăng nhập</button>
				  </div>
				</form>
				</div>
			</li>
			</ul>
		  </div>
		</div>
	  </div>
	</div>
<!-- 
Body Section 
-->

<div class="row">
<div id="sidebar" class="span3">
<div class="well well-small">
	<ul class="nav nav-list">
		<?php
            while($sql_danhmuc=mysqli_fetch_array($query_danhmuc)){
        ?>
		<li><a href="index.php"><span class="icon-chevron-right"></span><?php echo $sql_danhmuc['tendanhmuc'];?></a></li>
		<?php
		}	
		?>		
	</ul>
</div>

	<div class="well well-small alert alert-warning cntr">
		<h2>Giảm giá 50%</h2>
			<p> 
				chỉ áp dụng đặt hàng online. <br><br><a class="defaultBtn" href="">Click here </a>
			</p>
	</div>
	<div class="well well-small" ><a href="#"><img src="assets/img/paypal.jpg" alt="payment method paypal"></a></div>
			<br>
			<br>
			<ul class="nav nav-list promowrapper">
				<li>
					<div class="thumbnail">
						<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span>Xem</a>
						<img src="../images/anhnen/slider-1.jpg" alt="bootstrap ecommerce templates">
						<div class="caption">
						<h4><a class="defaultBtn" href="product_details.php">Xem</a> <span class="pull-right"></span></h4>
						</div>
					</div>
				</li>
				<li style="border:0"> &nbsp;</li>
				<li>
					<div class="thumbnail">
						<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span>Xem</a>
						<img src="../images/anhnen/slider-2.jpg" alt="shopping cart template">
						<div class="caption">
						<h4><a class="defaultBtn" href="product_details.php">VIEW</a> <span class="pull-right"></span></h4>
						</div>
					</div>
				</li>
				<li style="border:0"> &nbsp;</li>
				<li>
					<div class="thumbnail">
						<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span>Xem</a>
						<img src="../images/anhnen/slider-3.jpg" alt="bootstrap template">
						<div class="caption">
						<h4><a class="defaultBtn" href="product_details.php">VIEW</a> <span class="pull-right"></span></h4>
						</div>
					</div>
				</li>
		  </ul>
</div>

<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">Thanh toán</li>
    </ul>
	<h3> Thanh toán</h3>	
	<hr class="soft"/>
	<div class="well">
	<?php
			if(isset($_GET['vnp_Amount'])){
				$vnp_Amount=$_GET['vnp_Amount'];
				$vnp_BankCode=$_GET['vnp_BankCode'];
				$vnp_BankTranNo=$_GET['vnp_BankTranNo'];
				$vnp_CardType=$_GET['vnp_CardType'];
				$vnp_OrderInfo=$_GET['vnp_OrderInfo'];
				$vnp_PayDate=$_GET['vnp_PayDate'];
				$vnp_TmnCode=$_GET['vnp_TmnCode'];
				$vnp_TransactionNo=$_GET['vnp_TransactionNo'];

				$code_cart=$_SESSION['code_cart'];

				//insert database VNPAY
				$insert_vnpay = "INSERT INTO tbl_vnpay(vnp_amount,vnp_bankcode,vnp_banktranno,vnp_cardtype,vnp_orderinfo,vnp_paydate,vnp_tmncode,vnp_transactionno,code_cart) 
                    VALUE('".$vnp_Amount."', '".$vnp_BankCode."','".$vnp_BankTranNo."','".$vnp_CardType."','".$vnp_OrderInfo."','".$vnp_PayDate."','".$vnp_TmnCode."','".$vnp_TransactionNo."','".$code_cart."')";
				$cart_query = mysqli_query($mysqli,$insert_vnpay);
				if($cart_query){
					echo '<h2 style="font-size: 29px">Giao dịch thanh toán bằng VNPAY thành công</h2>';
					echo '<h3>Vui lòng vào trang <a href="donhangdadat.php">Lịch sử đơn hàng</a> để xem chi tiết đơn hàng của bạn </h3>';
				}else{
					echo 'Giao dịch VNPAY thất bại';
				}
			}elseif(isset($_GET['partnerCode'])){
				$id_khachhang = $_SESSION['id_khachhang'];
				$code_order = rand(0,9999);
				$partnerCode=$_GET['partnerCode'];
				$orderId=$_GET['orderId'];
				$amount=$_GET['amount'];
				$orderInfo=$_GET['orderInfo'];
				$orderType=$_GET['orderType'];
				$transId=$_GET['transId'];
				$payType=$_GET['payType'];
				$cart_payment='Momo';
				//lay thong tin van chuyen
				$sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky='$id_khachhang' LIMIT 1");
				$row_get_vanchuyen=mysqli_fetch_array($sql_get_vanchuyen);
				$id_shipping= $row_get_vanchuyen['id_shipping'];
				//insert database momo
				$insert_momo = "INSERT INTO tbl_momo(partner_code,order_id,amount,order_info,order_type,trans_id,pay_type,code_cart) 
                    VALUE('".$partnerCode."', '".$orderId."','".$amount."','".$orderInfo."','".$orderType."','".$transId."','".$payType."','".$code_order."')";
				$cart_query = mysqli_query($mysqli,$insert_momo);
				if($cart_query){
					//insert giỏ hàng
					$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) 
					VALUE('".$id_khachhang."', '".$code_order."', 1,'".$now."','".$cart_payment."','".$id_shipping."')";
					$cart_query = mysqli_query($mysqli,$insert_cart);
					//them gio hang chi tiet
					foreach($_SESSION['cart'] as $key => $value){
						$id_sanpham = $value['id'];
						$soluong = $value['soluong'];
						$insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) 
						VALUE('".$id_sanpham."', '".$code_order."', '".$soluong."')";
						mysqli_query($mysqli,$insert_order_details);
				}
					echo '<h2 style="font-size: 29px">Giao dịch thanh toán bằng MOMO thành công</h2>';
					echo '<h3>Vui lòng vào trang <a href="donhangdadat.php">Lịch sử đơn hàng</a> để xem chi tiết đơn hàng của bạn </h3>';
				}else{
					echo 'Giao dịch MOMO thất bại';
				}
			}else{
				if(isset($_GET['thanhtoan'])=='paypal'){
					$code_order = rand(0,9999);
					$cart_payment='paypal';
					$id_khachhang = $_SESSION['id_khachhang'];
					//lay thong tin van chuyen
					$sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky='$id_khachhang' LIMIT 1");
					$row_get_vanchuyen=mysqli_fetch_array($sql_get_vanchuyen);
					$id_shipping= $row_get_vanchuyen['id_shipping'];
					//
					$insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) 
					VALUE('".$id_khachhang."', '".$code_order."', 1,'".$now."','".$cart_payment."','".$id_shipping."')";
					$cart_query = mysqli_query($mysqli,$insert_cart);
					if($cart_query){
						//them gio hang chi tiet
						foreach($_SESSION['cart'] as $key => $value){
							$id_sanpham = $value['id'];
							$soluong = $value['soluong'];
							$insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) 
							VALUE('".$id_sanpham."', '".$code_order."', '".$soluong."')";
							mysqli_query($mysqli,$insert_order_details);
						}
					} 
					if($cart_query){
						echo '<h2 style="font-size: 29px">Giao dịch thanh toán bằng PAYPAL thành công</h2>';
						echo '<h3>Vui lòng vào trang <a href="donhangdadat.php">Lịch sử đơn hàng</a> để xem chi tiết đơn hàng của bạn </h3>';
					}else{
						echo 'Giao dịch PAYPAL thất bại';
					}
				}
			}
		?>
        <h3 style="color: gray;margin-left: 41px;margin-top: 36px;margin-bottom: 250px;">
            Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất ! <br>
            <a href='index.php'>Tiếp tục mua hàng</a>
        </h3>
	</div>
</div>
<!-- 
Clients 
-->
<section class="our_client">
	<!-- <hr class="soften"/>
	<h4 class="title cntr"><span class="text">EPU</span></h4>
	<hr class="soften"/> -->
	<div class="row">
		<div class="span2">
			<p></p>
		</div>
		<div class="span2">
			
		</div>
		<div class="span2">
			
		</div>
		<div class="span2">
			
		</div>
		<div class="span2">
			
		</div>
		<div class="span2">
			
		</div>
	</div>
</section>

<!--
Footer
-->
<footer class="footer" style="width: 100%">
<div class="row-fluid">

 <div class="span6" style="text-align: center;width: 100%;">
<h5>Trường Đại học Điện Lực- Khoa CNTT- D14CNPM2</h5>
<h5>HOÀNG ANH ĐỨC- 19810310068	</h5>
 </div>
 </div>
</footer>
</div><!-- /container -->

<div class="copyright">
<div class="container">
	<p class="pull-right">
		<a href="#"><img src="assets/img/maestro.png" alt="payment"></a>
		<a href="#"><img src="assets/img/mc.png" alt="payment"></a>
		<a href="#"><img src="assets/img/pp.png" alt="payment"></a>
		<a href="#"><img src="assets/img/visa.png" alt="payment"></a>
		<a href="#"><img src="assets/img/disc.png" alt="payment"></a>
	</p>
	<span>Copyright &copy; 2021</span>
</div>
</div>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/js/shop.js"></script>
  </body>
</html>
