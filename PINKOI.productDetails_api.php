<?php include __DIR__. '/parts/config.php'; ?>
<?php
$pNum = isset( $_GET["productNumber"])? $_GET["productNumber"] : "001";
$sqlr= "SELECT * FROM `product_detail` LEFT JOIN `category_product_list2` ON `product_detail`.`productNumber` = `category_product_list2`.`productNumber` WHERE `product_detail`.`productNumber` =".$pNum;
$rowsr = $pdo->query($sqlr)->fetch();
// isset 三項演算子， 取得網址中的productNumber，若有此值時，則等於ProductNumber，若沒有時則給他值為001；
// 關聯式資料表:在product_detail資料表中用productNumber欄位match category_product_list的productNumber，以取得整張category_product_list所有欄位;然後Where指定product_detail中的productNumber為變數$pNum;
// 所以$rowsr此時只會抓到$pNum此列資料

echo json_encode($rowsr,JSON_UNESCAPED_UNICODE);


?>