<?php include __DIR__. '/parts/config.php'; ?>
<?php
$sql= "SELECT * FROM `category_product_list2`";
$rows = $pdo->query($sql)->fetchAll();

echo json_encode($rows, JSON_UNESCAPED_UNICODE);
// 轉換成Json格式javascript才看得懂

?>