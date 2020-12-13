<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>장바구니</title>
<link rel="stylesheet"  href="/css/cart.css" />
</head>
<body>
	<?php
		$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
		$sql = mq("select * from slist where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$shopinfo = $sql->fetch_array();

		$ba_pic = $shopinfo['pro_pic'];
		$ba_name = $shopinfo['pro_name'];
		$ba_price = $shopinfo['price'];

		$sql2 = mq("insert into basket(pro_pic,pro_name,price,date) values('".$ba_pic."','".$ba_name."','".$ba_price."',now())");
		echo "<script>alert('장바구니 등록되어습니다.');</script>";

	?>
	<div id="bg1"></div>
		<div id="main_in">	
				<div id="content">
					<h2>장바구니</h2>
					 <table class="cart">
				      <thead>
				          <tr>
				              <th width="350">상품정보</th>
							  <th width="120">상품금액</th>
							  <th width="120">상품금액</th>
							  <th width="120">삭제</th>
				           </tr>
				        </thead>
				        <?php 
				        	$sql3 = mq("select * from basket order by idx desc");
							while($bask = $sql3->fetch_array()){
						?>
				        <tbody>
				        <tr>
				          <td width="300">
				          	<div class="bak_item">
							<div class="pro_img"><img src="/shop/<?php echo $bask['pro_pic'];?>.jpg" alt="propic" title="propic" /></div>
							<div class="pro_nt"><?php echo $bask['pro_name'];?></div>
						</div>
				          </td>
				          <td width="150"><?php echo $bask['price'];?></td>
				        </tr>
				      </tbody>
				  <?php } ?>
				    </table>
				</div>
			</div>
		<footer></footer>
</body>
</html>