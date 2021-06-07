<?php include __DIR__. '/parts/config.php'; ?>
<?php
$pNum = isset( $_GET["productNumber"])? $_GET["productNumber"] : "001";
$sqlr= "SELECT * FROM `product_detail` LEFT JOIN `category_product_list1` ON `product_detail`.`productNumber` = `category_product_list1`.`productNumber` WHERE `product_detail`.`productNumber` =".$pNum;
$rowsr = $pdo->query($sqlr)->fetch();
// isset 三項演算子， 取得網址中的productNumber，若有此值時，則等於ProductNumber，若沒有時則給他值為001；
// 關聯式資料表:在product_detail資料表中用productNumber欄位match category_product_list的productNumber，以取得整張category_product_list所有欄位;然後Where指定product_detail中的productNumber為變數$pNum;
// 所以$rowsr此時只會抓到$pNum此列資料
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
<div class="test">
    


        <div class="productName">
        
        <?php
        echo "<h1>". $rowsr["productName"] ."</h1>";
        echo "<h1>". $rowsr["brandName"] ."</h1>";


        $index = 1;
        foreach(explode(",",$rowsr["introRule"]) as $rule){
            // 將introRule跑迴圈抓出各個字母，並轉成陣列結構
    ?>
         
            <?php 
            
            if($rule === 't'){
                echo "<p>" . $rowsr["productDetail" . $index]  ."</p>";
            }
            else{
                echo $rule; 
            }

            if($rule ==='i'){
                // <img src="/img/.   var    ." alt="">
                echo '<img src="./img/'. $rowsr["productDetail" . $index].'.jpg" >';
            }
            else{
                echo $rule;
            }

            if($rule === 'v'){
                echo '<div class="video">'. $rowsr["productDetail" . $index] . '</div>';
            }
            else {
                echo $rule;
            }
            
            

            $index += 1;
            ?>
            
           

            <?php
        } ?>

        </div>

</div>

        </div>
    </div>


</body>

</html>