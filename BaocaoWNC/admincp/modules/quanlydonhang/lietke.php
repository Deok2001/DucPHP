<?php
  require('../carbon/autoload.php');
  use Carbon\Carbon;
  $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky ORDER BY tbl_cart.id_khachhang DESC";
  $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);

?>
<table class="table table-hover" style="margin-top: 45px;">
  <tr class="thead-dark">
    <th scope="col">Id</th>
    <th scope="col">Mã đơn hàng</th>
    <th scope="col">Tên khách hàng</th>
    <th scope="col">Địa chỉ</th>
    <th scope="col">Email</th>
    <th scope="col">Số điện thoại</th>
    <th scope="col">Tình trạng</th>
    <th scope="col">Quản lý</th>
    <th scope="col">Hóa đơn</th>
    <th scope="col">Ngày đặt</th>
    <th scope="col">Hình thức thanh toán</th>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
      $i++;
   ?> 
    <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $row['code_cart'] ?></td>
       <td><?php echo $row['tenkhachhang'] ?></td>
       <td><?php echo $row['diachi'] ?></td>
       <td><?php echo $row['email'] ?></td>
       <td><?php echo $row['dienthoai'] ?></td>
       <td>
           <?php
               if($row['cart_status']==1){
                   echo '<li style="list-style: none;">
                          <a class="btn btn-outline-danger" href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'" role="button">Đơn hàng mới</a>
                         </li>';
               }else{
                   echo '<li style="list-style: none;>
                            <a class="btn btn-outline-warning" href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'" role="button">Đã xem</a>
                        </li>';
               }
           ?>
       </td>
       <td>
           <li style="list-style: none;">
              <a class="btn btn-outline-secondary" href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart']?>" role="button">Xem đơn hàng</a> 
           </li>
       </td>
       <td>
           <li style="list-style: none;">
              <a class="btn btn-outline-secondary" href="modules/quanlydonhang/indonhang.php?code=<?php echo $row['code_cart']?>" role="button">In đơn hàng</a> 
           </li>
       </td>
       <td><?php echo $row['cart_date']?></td>
       <td><?php echo $row['cart_payment'] ?></td>
    </tr>
  <?php
  }
  ?>
  
</table>
