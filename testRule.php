<?php include __DIR__. '/parts/config.php'; ?>
<?php
$sqlr= "SELECT * FROM `product_detail`";
$rowsr = $pdo->query($sqlr)->fetchAll();

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
    <?php
    foreach($rowsr as $sr){
        ?>
        <div class="productName">
        <?php
        $index = 1;
        foreach(explode(",",$sr["introRule"]) as $rule){
    ?>
         
            <?php 
            
            if($rule === 't'){
                echo "<p>" . $sr["productDetail" . $index]  ."</p>";
            }
            else{
                echo $rule; 
            }

            if($rule ==='i'){
                // <img src="/img/.   var    ." alt="">
                echo '<img src="./img/'. $sr["productDetail" . $index].'.jpg" >';
            }
            else{
                echo $rule;
            }
            
            

            $index += 1;
            ?>
            
           

            <?php
        } ?>

        </div>
        <?php   
    }
    ?>
</div>

        </div>
    </div>


</body>

</html>