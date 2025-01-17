<?php include __DIR__. '/parts/config.php'; ?>
<?php
$pNum = isset( $_GET["productNumber"])? $_GET["productNumber"] : "001";
$sqlr= "SELECT * FROM `product_detail` LEFT JOIN `category_product_list2` ON `product_detail`.`productNumber` = `category_product_list2`.`productNumber` WHERE `product_detail`.`productNumber` =".$pNum;
$rowsr = $pdo->query($sqlr)->fetch();
// isset 三項演算子， 取得網址中的productNumber，若有此值時，則等於ProductNumber，若沒有時則給他值為001；
// 關聯式資料表:在product_detail資料表中用productNumber欄位match category_product_list的productNumber，以取得整張category_product_list所有欄位;然後Where指定product_detail中的productNumber為變數$pNum;
// 所以$rowsr此時只會抓到$pNum此列資料

$sqlother="SELECT * FROM `category_product_list2`";
$rowsother =$pdo->query($sqlother)->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PINKOI Product Details</title>

    <link rel="stylesheet" href="./bootstrap-4.6.0-dist/css/bootstrap.css">

    <style>
        body {
            margin: 0px auto;
            padding: 0px auto;
            color: #66666a;
            font-family:
                Helvetica Neue, Helvetica, Arial, PingFang TC, Heiti TC, Microsoft JhengHei, sans-serif;
        }

        img {
            width: 100%;
            height: auto;
        }

        .content {
            width: 1200px;
            margin: 0px auto;
        }


        .navbar {
            padding: 0.5rem 0px;
        }

        .searchWrap {
            width: fit-content;
            margin-left: 20px;
        }

        .searchBar {
            display: flex;
            justify-content: space-between;
        }

        .searchBarInput {
            width: 100%;
        }

        .searchUp button {
            width: 70px;
            background-color: #10567b;
            border-radius: 0 2px 2px 0;
            padding: 6px 6px;
            color: #FFF;
        }

        .searchDown ul li {
            margin: 0px 5px;
        }

        .navbarRight {
            display: flex;
            margin-left: auto;
            justify-content: end;
            align-items: center;
        }

        .sell {
            height: fit-content;
        }

        .login {
            margin: 0px 20px;
            border: 1px solid gray;
            height: fit-content;
            border-radius: 3px;
        }

        .cart {
            height: fit-content;
        }

        .navbarMain ul {
            justify-content: space-between;
        }

        .mainContent {
            font-size: 14px;
        }

        .index {
            font-size: 14px;
            font-weight: 400;
        }

        .bigWrap {
            width: 650px;
            height: 650px;
        }

        img {
            width: 100%;
        }

        .smallpic {
            width: 50px;
            height: 50px;
        }

        .smallpicWrap {
            margin: 30px auto;
        }

        .section h5 {
            border-bottom: 1px solid rgb(179, 179, 179);
            margin-top: 50px;
        }


        h5 {
            font-weight: 700;
        }

        .productintro p {
            font-size: 14px;
        }

        .shippingTableWrap {
            font-size: 14px;
        }

        .shippingTableWrap .smalltitle {
            font-weight: bold;
        }

        .noWrap {
            white-space: nowrap;
        }

        .shippingTableWrap span {
            color: #F16C5D;
        }


        .row {
            border-top: 1px solid #929295;
        }



        .eachSection {
            border-bottom: 1px solid #929295;
            display: flex;
        }

        .lastRow {
            padding-left: 15px;
        }

        .eachRow {
            border-top: 1px solid #929295;
        }

        .faketable,
        .reviewWrap {
            font-size: 14px;
            line-height: 1.4rem;
        }

        .faketable .col-2 {
            color: #929295;
        }

        .tag {
            border: 1px solid #d3d3d5;
            background-color: #f7f7f8;
            border-radius: 20%/50%;
            display: inline-block;
            color: #39393e;
            padding: 4px 10px;
            margin: 5px;
            font-size: 14px;
        }

        .favorite {
            fill: indianred;
        }

        .pic5050 {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .reviewContent {
            width: 492px;
        }

        .heart {
            width: 100px;
        }

        .pic8080 {
            width: 80px;
            height: 80px;
            margin-left: 10px;
        }

        .eachReview {
            border-bottom: 1px solid #929295;
            margin-top: 8px;
        }

        .favoriteReview svg {
            fill: #ee847d;
        }

        .viewMoreText {
            color: #2e90b7;
            padding: 24px 0px;
        }

        .mainRightSection {
            padding: 20px 0px;
            border-bottom: 1px solid #929295;
        }

        .mainRight>:nth-child(1) {
            padding-top: 0px;
        }

        .productPrice {
            display: flex;
            align-items: baseline;
        }

        .PDPproductName {
            word-spacing: .025em;
            letter-spacing: .025em;
            font-weight: 900;
            color: #39393e;
            margin-bottom: 36px;
        }

        .salePrice {
            color: #10567b;
            font-size: 30px;
        }

        .originalPrice {
            text-decoration: line-through;
            margin-left: 10px;
            color: #929295;
            font-size: 20px;
        }

        .discountBar {
            margin-bottom: 36px;
        }

        .percent {
            padding: 4px 8px;
            background-color: #ee847d;
            color: #fff;
            float: left;
        }

        .save {
            padding: 4px 8px;
            color: #ee847d;
            border: 1px solid #ee847d;
            font-size: 14px;
            float: left;
        }

        .clear-fix::after {
            content: "";
            display: block;
            clear: both;
        }

        /* 通用寫法法要float的人都包起來，在父層下clear-fix的class name,然後在clear-fix的這個父層的::after下clear:both */
        /* 偽類是小孩 */

        /* 另一種float寫法
        父層不下clear-fix，子層percent和save下float:left，然後在要開始不float的人身上下clear:both(both的意思是float:left和float:right兩個方向
         */

        .selectWrap select {
            width: 100%;
            padding: 5px 10px;
        }

        .firstSelect {
            padding-left: 0px;
        }

        .amout select {
            width: 50px;
            padding: 5px 10px;
        }

        .order button {
            background-color: #f16c5d;
            color: #fff;
            width: 100%;
            border-radius: 5px;
            padding: 5px 10px;
            border: 1px solid #f16c5d;
            fill: #f16c5d;
            margin: 10px auto;
        }

        .order button svg {
            fill: #fff;
        }

        .collect button {
            width: 100%;
            border-radius: 5px;
            padding: 5px 10px;
            border: 1px solid #929295;
            margin: 10px auto;
            background-color: #fff;
        }

        .PDPdiscount li {
            color: #f16c5d;
        }

        .MCRtablerow {
            display: flex;
        }

        .MCRtablerow .leftcolumn {
            padding-left: 0px;
        }

        .store .imgwrap {
            width: 75px;
            float: left;
        }

        .storeRight {
            float: left;
            margin-left: 10px;
        }

        .storetitle {
            font-weight: 700;
        }

        .storeRight span {
            fill: indianred;
        }


        .buttonwrap {
            margin: 10px 0px 10px 0px;
        }

        .buttonwrap .left {
            background-color: #10567b;
            color: #fff;
            border: 1px solid #10567b;
            border-radius: 5px;
            margin-right: 10px;
        }

        .buttonwrap .left svg .color {
            fill: #fff;
        }

        .buttonwrap .right {
            border: 1px solid #000;
            border-radius: 5px;
            background-color: #fff;
        }

        /* 以下為設計館其他商品區塊 div class="mainRightSection otherProductInStore"*/
        .PDPproductListWrap {
            position: relative;
        }

        .arrowLeft {
            position: absolute;
            top: 25%;
            left: 0;
            transform: translateY(-50%);
            /* background-color: khaki; */
            border-radius: 50%;
            height: fit-content;
        }

        .arrowRight {
            position: absolute;
            top: 25%;
            right: 0%;
            transform: translateY(-50%);
            /* background-color: indianred; */
            border-radius: 50%;
            height: fit-content;
        }



        .titleWrap span:nth-child(2) {
            margin-left: 10px;
            color: #10567b;
        }

        .titleWrap span:nth-child(3) {
            margin-left: auto;
        }

        .pictureWrap {
            position: relative;
        }

        .discountAndFreeShippingWrap {
            position: absolute;
            top: 2px;
            left: 2px;
            display: flex;
        }

        .discount {
            width: fit-content;
            background-color: indianred;
            border-radius: 2px;
            /* position: absolute; */
            color: #fff;
            padding: 0px 2px;
            /* top: 2px;
            left: 2px; */
        }

        .freeShipping {
            width: fit-content;
            background-color: #2e90b7;
            border-radius: 2px;
            /* position: absolute; */
            color: #fff;
            padding: 0px 2px;
            /* top: 2px;
            left: 2px; */
        }

        .favorite {
            position: absolute;
            bottom: 0px;
            right: 0px;
            fill: indianred;
        }

        .productName p {
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 0px;
        }

        .productDetail {
            margin-top: auto;
        }

        .priceProduct {
            display: flex;
        }

        .priceProduct::before {
            content: "NT$";
            display: inline;
        }

        .originalPrice {
            margin-left: 10px;
            font-size: inherit;
        }

        .PDPsocialMedia ul>:nth-child(1) {
            background-image: url(./imgs/icon_sprite_170726.png);
            background-size: auto 26px;
            background-position: -29px 0;
            background-color: #627aad;
            border-radius: 50%;
            width: 26px;
            height: 26px;
            margin: 10px 10px 0 0;
        }

        .PDPsocialMedia ul>:nth-child(2) {
            background-image: url(./imgs/icon_sprite_170726.png);
            background-size: auto 26px;
            background-position: -351px 0;
            background-color: #43a4ff;
            border-radius: 50%;
            width: 26px;
            height: 26px;
            margin: 10px 10px 0 0;
        }

        .PDPsocialMedia ul>:nth-child(3) {
            background-image: url(./imgs/icon_sprite_170726.png);
            background-size: auto 26px;
            background-position: -59px 0;
            background-color: #77bdf1;
            border-radius: 50%;
            width: 26px;
            height: 26px;
            margin: 10px 10px 0 0;
        }

        .PDPsocialMedia ul>:nth-child(4) {
            background-image: url(./imgs/icon_sprite_170726.png);
            background-size: auto 26px;
            background-position: -88px 0;
            background-color: #d54d53;
            border-radius: 50%;
            width: 26px;
            height: 26px;
            margin: 10px 10px 0 0;
        }

        .PDPsocialMedia ul>:nth-child(5) {
            background-image: url(./imgs/icon_sprite_170726.png);
            background-size: auto 26px;
            background-position: -146px 0;
            background-color: #eb4557;
            border-radius: 50%;
            width: 26px;
            height: 26px;
            margin: 10px 10px 0 0;
        }

        /* 以下為為你推薦好設計區塊 */

        .bottomSection {
            padding: 20px 15px;
        }

        .DesignStoreCard {
            background-color: #5ddbf1;
        }

        .DesignStoreCard .heart .svg {
            fill: #f16c5d;
        }

        .otherPicWrap{
            height: 126.66px;
        }

        .otherPicWrap img{
            width: 100%;
            height: 100%;
            object-fit:cover;
        }
        .bottomPicWrap {
            height: 165px;
        }

        .bottomPicWrap img{
            width: 100%;
            height: 100%;
            object-fit:cover;
        }
    </style>
</head>

<body>
    <div class="headerpage"></div>
    <div class="content">
        <div class="navbar">
            <div class="logo">
                <svg height="24" viewBox="0 0 82 24" width="82" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M36.019 5.4a5.95 5.95 0 0 1 5.95 5.95v6.639c0 .258-.21.468-.469.468h-2.038a.469.469 0 0 1-.468-.468V11.35a2.975 2.975 0 0 0-5.95 0v6.639c0 .258-.21.468-.47.468h-2.037a.469.469 0 0 1-.468-.468V5.36c0-.309.292-.533.59-.453l2.037.546c.205.055.347.24.347.452v.297A5.917 5.917 0 0 1 36.02 5.4zm15.872 5.21l7.048 7.048c.295.295.086.8-.331.8h-2.689a.937.937 0 0 1-.662-.275l-5.355-5.355v5.16c0 .26-.21.47-.469.47h-2.038a.469.469 0 0 1-.468-.47V.469c0-.307.292-.532.59-.452l2.038.546c.205.055.347.24.347.453v7.377l3.213-3.213a.937.937 0 0 1 .662-.274h2.915c.334 0 .501.403.265.64zm15.814 5.258a4.104 4.104 0 1 0 0-8.209 4.104 4.104 0 0 0 0 8.21zm0-11.137a7.033 7.033 0 1 1 0 14.065 7.033 7.033 0 0 1 0-14.065zm-57.972.071a6.827 6.827 0 0 1 6.778 6.778c.027 3.783-3.165 6.877-6.948 6.877H7.92a.469.469 0 0 1-.469-.468V15.89c0-.259.21-.468.469-.468h1.68c2.086 0 3.846-1.649 3.878-3.735a3.793 3.793 0 0 0-3.852-3.851c-2.085.031-3.734 1.792-3.734 3.878v6.574a6.817 6.817 0 0 1-2.744 5.471.944.944 0 0 1-1.038.067L.176 22.71c-.26-.15-.226-.538.058-.634 1.522-.518 2.623-2.018 2.623-3.788V11.75c0-3.782 3.094-6.975 6.876-6.948zm14.534.652c.205.055.347.24.347.453v12.082c0 .258-.21.468-.468.468h-2.038a.469.469 0 0 1-.469-.468V5.36c0-.309.292-.533.59-.453zm57.351 0c.205.055.348.24.348.453v12.082c0 .258-.21.468-.469.468H79.46a.469.469 0 0 1-.468-.468V5.36c0-.309.292-.533.59-.453z"
                        fill="#003354" class="color"></path>
                </svg>
            </div>
            <div class="searchWrap">
                <div class="searchUp">
                    <div class="searchBar">
                        <input class="searchBarInput" type="text" placeholder="搜尋好設計、體驗活動">
                        <button>搜尋</button>
                    </div>
                </div>
                <div class="searchDown">
                    <ul class="d-flex list-unstyled">
                        <li>抹茶季</li>
                        <li>爆漿芋頭</li>
                        <li>文具新品</li>
                        <li>泳衣 7 折</li>
                        <li>新開館優惠</li>
                        <li>熱銷手機殼</li>
                    </ul>
                </div>
            </div>
            <div class="navbarRight">
                <div class="sell"><span>我想在PINKOI販售</span></div>
                <div class="login"><span>登入/註冊</span></div>
                <div class="cart"><svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.494 4.552a.625.625 0 0 1 .105.546l-1.484 5.364a.625.625 0 0 1-.603.458H7.817l.03.088c.041.119.047.245.015.365l-.385 1.474h8.53v1.25h-9.34a.627.627 0 0 1-.605-.783l.543-2.072-2.603-7.405H2.153v-1.25h2.292c.265 0 .502.167.59.417l.457 1.302h11.505c.195 0 .38.09.497.246zM15.037 9.67l1.139-4.114H5.93L7.377 9.67zm-6.391 6.718a1.25 1.25 0 1 1-2.501 0 1.25 1.25 0 0 1 2.5 0zm7.361 0a1.25 1.25 0 1 1-2.5 0 1.25 1.25 0 0 1 2.5 0z"
                            fill="#39393e" class="color"></path>
                    </svg></div>
            </div>
        </div>

        <div class="navbarMain">
            <ul class="d-flex list-unstyled">
                <li>主題企劃</li>
                <li>配件飾品</li>
                <li>居家生活</li>
                <li>包包提袋</li>
                <li>衣著良品</li>
                <li>文具卡片</li>
                <li>品味美食</li>
                <li>所有分類</li>
                <li>探索更多</li>
            </ul>
        </div>

        <div class="mainContent">
            <div class="index d-flex">
                <p>買設計</p>
                <span><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" fill-rule="evenodd">
                            <path fill="none" d="M0 0h20v20H0z"></path>
                            <path class="color"
                                d="M6.33 5.471l5.455 4.532-5.45 4.529a.812.812 0 0 0-.325.536.828.828 0 0 0 .823.932.852.852 0 0 0 .504-.165l.006-.004 6.323-5.172a.812.812 0 0 0 .002-1.31L7.343 4.167l-.008-.006A.843.843 0 0 0 6.837 4c-.266 0-.51.12-.67.33A.807.807 0 0 0 6.33 5.47"
                                fill="#4287D7"></path>
                        </g>
                    </svg></span>
                <p>居家生活</p>
                <span><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" fill-rule="evenodd">
                            <path fill="none" d="M0 0h20v20H0z"></path>
                            <path class="color"
                                d="M6.33 5.471l5.455 4.532-5.45 4.529a.812.812 0 0 0-.325.536.828.828 0 0 0 .823.932.852.852 0 0 0 .504-.165l.006-.004 6.323-5.172a.812.812 0 0 0 .002-1.31L7.343 4.167l-.008-.006A.843.843 0 0 0 6.837 4c-.266 0-.51.12-.67.33A.807.807 0 0 0 6.33 5.47"
                                fill="#4287D7"></path>
                        </g>
                    </svg></span>
                <p>香氛/精油/線香 植物．花</p>

            </div>

            <div class="mainContentWrap d-flex">
                <div class="mainLeft col-7">
                    <div class="picWrap">
                        <div class="bigpic">
                            <img id="main-item-photo" class="js-main-item-photo main-photo"
                                alt=""
                                src="./img/<?= $rowsr["productPic1"]?>.jpg">
                        </div>
                        <div class="smallpicWrap d-flex justify-content-lg-around">
<?php
$indexPic=1;
for ($pp=0; $pp<6; $pp++){
    ?>
    <!-- for迴圈跑6次 -->
    
    <?php
    if ($rowsr["productPic" . $indexPic] != ""){
        ?>
        <!-- 如果productPic1~6的欄位中不等於空字串時echo欄位中的值 -->
        <div class="smallpic">
            <?php
        echo '<img src="./img/'. $rowsr["productPic" . $indexPic].'.jpg" >';
        ?>
        </div>
        <?php
    }
    
    
    $indexPic+=1;
    ?>
        <!-- <img src="//cdn02.pinkoi.com/product/DEx2XyYQ/0/2/80x80.jpg"> -->




<!-- <div class="smallpic"><img src="//cdn02.pinkoi.com/product/DEx2XyYQ/4/80x80.jpg"></div> -->
    <?php
}
?>

                            
                            
                        </div>
                        <div class="productDetail">
                        
                            
                        
                        <div class="productintro section">
                            <h5>商品介紹</h5> 
                            <?php
                             $index = 1;   
                             foreach (explode(",",$rowsr["introRule"])as $rule){
                               
                            ?>
                                <?php
                                
                                if($rule === 't'){
                                    echo "<p>" . $rowsr["productDetail". $index] ."</p>";
                                }
                                else{
                                    // echo $rule;
                                }

                                if($rule ==='i'){
                                    // <img src="/img/.   var    ." alt="">
                                    echo '<img src="./img/'. $rowsr["productDetail" . $index].'.jpg" >';
                                }
                                else{
                                    // echo $rule;
                                }
                    
                                if($rule === 'v'){
                                    echo '<div class="video">'. $rowsr["productDetail" . $index] . '</div>';
                                }
                                else {
                                    // echo $rule;
                                }                        
                    
                                $index += 1;

                                ?>
                                <?php    
                           }
                           ?> 
                                <!-- <p>🌸無刻字款均為現貨！！下單1-3天出貨
                                    我們都會快速出貨～～<br>
                                    棄單買家一律黑單！！！再幫我們注意唷♥️
                                    -<br>
                                    賣場有兩種商品 下單時要注意！！<br>
                                    「浮游花瓶」為居家裝飾的舒壓小物 可將花的觀賞期延長至1~2年<br>
                                    「擴香花瓶」是可以在室內自主擴香的花瓶喔 觀賞期約1~3個月<br>
                                    只要插上我們附贈的擴香竹即可<br>
                                    ❗️❗️擴香花有金箔的款式一律以金粉替代❗️❗️<br>
                                    -<br>
                                    2020情人節新品上市❣️<br>
                                    Yuan's Flower 設計款浮游花瓶/擴香花瓶小物<br>
                                    --擴香瓶--<br>
                                    #天然精油擴香瓶<br>
                                    擴香瓶終於上架啦❣️<br>
                                    但請幫我們注意以下幾點重點！！（請閱讀後再下單☺️以免有爭議 謝謝您）<br>
                                    ❗️它是擴香瓶不是浮游花，內容裝載的液體完全不一樣喔，擴香瓶的主要功能為擴香，花材不僅有限制，也比較容易褪色喔！香味可持續1~2個月<br>
                                    - 我們選用法國原裝進口精油，精油是純天然的，擴香液本身也不含酒精！！（低刺激性）
                                    （小知識˙˙無酒精成分的精油滴入水中會以油狀顆粒懸浮在水上；含酒精成分的精油滴入水中，水則會呈現乳白色）<br>
                                    市面上許多擴香瓶都是含有酒精成分的～～這其實對花朵與人體都是有不小的負擔喔！<br>
                                    我們嚴選的擴香液是不含有這些有害成分的🌹
                                    經過我們測試許久，還是成本高昂的純天然精油才能夠帶給大家安全又舒適的體驗☺️<br>
                                    - 擴香瓶中的精油有我文字敘述的香氛選擇，下單時記得幫我們備註一下唷～<br>
                                    香氛都是我們測試許久的！希望大家會喜歡😉<br>
                                    - 擴香竹都是以三根出貨，如想要更多的擴香竹 可以至「資材加購區」加購☺️<br>
                                    - 我們製作的花藝師與出貨人員都會很仔細檢查並測試商品是否完好無損才會寄出，如果收到有任何問題都可以跟我們反應喔～謝謝您。<br>
                                    ｜精油選擇｜<br>
                                    法國進口精油與JoMalone大牌同款香氛🧡<br>
                                    春日橙花（很淡的鵝黃色精油）闆娘最愛！<br>
                                    - 「橙」柑橘、柑橘葉為基底，聞起來清香不刺鼻，可以舒緩一整天疲憊的情緒<br>
                                    「花」香最明顯的就是茉莉香氛，清爽的橙加上甜甜的花香非常搭配！（女生推薦款！）<br>
                                    鼠尾草與海鹽（透明淡香氛）<br>
                                    - 屬於非常清新的木質調香氛，海鹽這種淡淡的香氛讓人感覺隨時都是剛剛從海岸漫步回來後的舒適感。<br>
                                    （男女推薦款！）</p> -->
                               
                               
                                </div>
                           
                        </div>
                        
                        
                        <div class="deliveryWrap">
                            <div class="delivery section">
                                <h5>運費與其他資訊</h5>
                                <div class="faketable">
                                    <div class="eachSection row1 shipping ">
                                        <div class="col-2">商品運費</div>
                                        <div class="col-10">
                                            <p>從台灣寄出，寄往</p>
                                            <select name="" id="">
                                                <option value="">台灣</option>
                                            </select>
                                            <div class="shippingTableWrap">
                                                <div class="eachRow firstRow d-flex">
                                                    <div class="col-6 noWrap">
                                                        <div class="smalltitle">運送方式</div>
                                                        <p>7-11取貨<br>
                                                            滿 NT$ 3,000 後，運費統一 NT$ 0<br>
                                                            滿 NT$ 3,000 <span>免運費</span></p>
                                                    </div>
                                                    <div class="col">
                                                        <div class="smalltitle">首件運費</div>
                                                        <p>NT$75</p>
                                                    </div>
                                                    <div class="col">
                                                        <div class="smalltitle">續件加收</div>
                                                        <p>NT$0</p>
                                                    </div>
                                                </div>
                                                <div class="eachRow firstRow d-flex">
                                                    <div class="col-6 noWrap">
                                                        <div class="smalltitle">運送方式</div>
                                                        <p>7-11取貨付款<br>
                                                            滿 NT$ 3,000 後，運費統一 NT$ 0<br>
                                                            滿 NT$ 3,000 <span>免運費</span></p>
                                                    </div>
                                                    <div class="col">
                                                        <div class="smalltitle">首件運費</div>
                                                        <p>NT$75</p>
                                                    </div>
                                                    <div class="col">
                                                        <div class="smalltitle">續件加收</div>
                                                        <p>NT$0</p>
                                                    </div>
                                                </div>
                                                <div class="eachRow firstRow d-flex">
                                                    <div class="col-6 noWrap">
                                                        <div class="smalltitle">運送方式</div>
                                                        <p>順豐速運<br>
                                                            通知出貨後約 2 - 3 天寄達 | 提供追蹤</p>
                                                    </div>
                                                    <div class="col">
                                                        <div class="smalltitle">首件運費</div>
                                                        <p>NT$100</p>
                                                    </div>
                                                    <div class="col">
                                                        <div class="smalltitle">續件加收</div>
                                                        <p>NT$80</p>
                                                    </div>
                                                </div>
                                                <div class="eachRow lastRow">
                                                    <p>實際運費金額以購物車結算或是到貨時收取的金額為準。</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="eachSection row2 payment">
                                        <div class="col-2">付款方式</div>
                                        <div class="col-10">
                                            <p>新增信用卡快速付款, 信用卡安全加密付款, 7-11 ibon 代碼繳費, ATM 轉帳繳費, 全家 FamiPort 代碼繳費, 信用卡分期
                                                (3
                                                期零利率), 信用卡分期 (6 期零利率), LINE Pay, Alipay 支付寶</p>
                                        </div>
                                    </div>
                                    <div class="eachSection row3 return">
                                        <div class="col-2">退款換貨須知</div>
                                        <div class="col-10">
                                            <p class="blue">點我了解設計館的退款換貨須知</p>
                                        </div>
                                    </div>
                                    <div class="eachSection row4 productTag">
                                        <div class="col-2">商品標籤</div>
                                        <div class="col-10">
                                            <div class="tag">乾燥花</div>
                                            <div class="tag">婚禮小物</div>
                                            <div class="tag">情人節</div>
                                            <div class="tag">母親節</div>
                                            <div class="tag">永生花</div>
                                            <div class="tag">永生花夜燈</div>
                                            <div class="tag">玻璃罩</div>
                                            <div class="tag">生日禮物</div>
                                            <div class="tag">畢業季</div>
                                            <div class="tag">聖誕禮物</div>
                                        </div>
                                    </div>
                                    <div class="eachSection row5 report">
                                        <div class="col-2">問題回報</div>
                                        <div class="col-10">
                                            <p class="blue">我要檢舉此商品</p>
                                        </div>
                                    </div>
                                    <div class="eachSection row6 articles">
                                        <div class="col-2">相關文件</div>
                                        <div class="col-10">
                                            <p class="blue">
                                                2020 送女生必看！12 星座女生聖誕禮物推薦，這樣送給她就對了！</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reviewWrap">
                            <div class="review section">
                                <h5>購買評價</h5>
                                <div class="eachReview d-flex">
                                    <div class="pic5050">
                                        <img loading="lazy" data-type="avatar" data-id="gg_100227442979378805968"
                                            src="//cdn01.pinkoi.com/user/gg_100227442979378805968/avatar/1/50x50.jpg">
                                    </div>
                                    <div class="reviewContent ">
                                        <p>joanne lam 1 周前為 本商品 所留下的購物評價</p>
                                        <p>The products are stunning. My friend really likes it. Thanks a lot!</p>
                                    </div>
                                    <div class=" heart">
                                        <div class="favoriteReview d-flex">
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="pic8080">
                                        <img loading="lazy" src="./img/<?= $rowsr["productPic1"]?>.jpg">
                                    </div>
                                </div>
                                <div class="eachReview d-flex">
                                    <div class="pic5050">
                                        <img loading="lazy" data-type="avatar" data-id="fb_1041350685883011"
                                            src="//cdn02.pinkoi.com/user/fb_1041350685883011/avatar/1/50x50.jpg">
                                    </div>
                                    <div class="reviewContent ">
                                        <p>blanky 1 個月前為 本商品 所留下的購物評價</p>
                                        <p>雖然時間上晚了些，但是朋友收到後非常高興，是很美很美的作品！</p>
                                    </div>
                                    <div class=" heart ">
                                        <div class="favoriteReview d-flex">
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="pic8080">
                                    <img loading="lazy" src="./img/<?= $rowsr["productPic1"]?>.jpg">
                                    </div>
                                </div>
                                <div class="eachReview d-flex">
                                    <div class="pic5050">
                                        <img loading="lazy" data-type="avatar" data-id="fb_100001336912976"
                                            src="//cdn01.pinkoi.com/user/fb_100001336912976/avatar/1/50x50.jpg">
                                    </div>
                                    <div class="reviewContent ">
                                        <p>Eugenie Cheng 4 個月前為 本商品 所留下的購物評價</p>
                                        <p>朋友很喜歡💕</p>
                                    </div>
                                    <div class=" heart ">
                                        <div class="favoriteReview d-flex">
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="pic8080">
                                    <img loading="lazy" src="./img/<?= $rowsr["productPic1"]?>.jpg">
                                    </div>
                                </div>
                                <div class="eachReview d-flex">
                                    <div class="pic5050">
                                        <img loading="lazy" data-type="avatar" data-id="fb_1816631188"
                                            src="//cdn01.pinkoi.com/user/fb_1816631188/avatar/1/50x50.jpg">
                                    </div>
                                    <div class="reviewContent ">
                                        <p>Chieh Yang 5 個月前為 本商品 所留下的購物評價</p>
                                        <p>收到了喔～謝謝您！美美的，希望收禮的人會喜歡！</p>
                                    </div>
                                    <div class=" heart ">
                                        <div class="favoriteReview d-flex">
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="pic8080">
                                    <img loading="lazy" src="./img/<?= $rowsr["productPic1"]?>.jpg">    
                                    </div>
                                </div>
                                <div class="eachReview d-flex">
                                    <div class="pic5050">
                                        <img loading="lazy" data-type="avatar" data-id="fb_1890729050941690"
                                            src="//graph.facebook.com/1890729050941690/picture?width=50&amp;height=50">
                                    </div>
                                    <div class="reviewContent ">
                                        <p>yue 5 個月前為 本商品 所留下的購物評價</p>
                                        <p>實品沒有誤差<br>
                                            刻字的樣式很喜歡！</p>
                                    </div>
                                    <div class=" heart ">
                                        <div class="favoriteReview d-flex">
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="pic8080">
                                    <img loading="lazy" src="./img/<?= $rowsr["productPic1"]?>.jpg">
                                    </div>
                                </div>
                                <div class="eachReview  viewMoreText d-flex justify-content-center align-items-center">
                                    閱讀更多<span><svg width="20" height="20" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd">
                                                <path fill="none" d="M0 0h20v20H0z"></path>
                                                <path class="color"
                                                    d="M14.529 6.33l-4.532 5.455-4.529-5.45a.812.812 0 00-.536-.325.828.828 0 00-.932.823.85.85 0 00.165.504l.004.006 5.172 6.323a.812.812 0 001.31.002l5.182-6.325.006-.008A.843.843 0 0016 6.837c0-.266-.12-.51-.33-.67a.807.807 0 00-1.141.163"
                                                    fill="#2e90b7"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mainRight col-5">
                    <div class="mainRightSection PDPproductDetailCard">
                        <div class="PDPproductName">
                            <h3>
                                <?php
                                echo $rowsr["productName"]
                                ?>
                                <!-- 藍黃 永生花夜燈擴香瓶 情人節 乾燥花 浮游花 聖誕節禮物 生日禮 -->
                            </h3>
                        </div>
                        <div class="productPrice d-flex">
                            <div class="salePrice">
                                <?php
                                // echo $rowsr["discountPrice"]
                                ?>
                                NT$ <span>
                                <?php
                                if ($rowsr["discount"] != ""){
                                    echo $rowsr["discountPrice"];
                                }
                                else {
                                    echo $rowsr["originalPrice"] ;
                                }
                               
                                ?>
                                    <!-- 530 -->
                                </span><span>起</span>
                            </div>
                            
                            
                            <div class="originalPrice">
                            
                                <?php

                                if ($rowsr["discount"]!=""){
                                    echo '<div class="originalPrice">NT$' .  $rowsr["originalPrice"].'</div>' ;
                                }
                                                                
                                ?>  
                                
                            
                            </div>
                            
                        </div>
                        <div class="discountBar clear-fix">
                            <?php
                            
                            if($rowsr["discount"] != ""){
                                echo '<div class="percent">' .$rowsr["discount"] . '折</div>';
                            }

                            ?>
                            <?php
                            $rowsrDisNum=intval($rowsr["discountPrice"]);
                            $rowsrOriNum=intval($rowsr["originalPrice"]);

                            if($rowsr["discount"]!=""){
                                echo '<div class="save">最多省下NT' . $rowsrOriNum - $rowsrDisNum . '</div>';
                            }
                            
                            ?>
                            
                        </div>
                        <!-- <div class="selectWrap d-flex">
                            <div class="col firstSelect "><select name="" id="">
                                    <option value="">圖一馬爾地夫海島 擴香瓶</option>
                                </select></div>
                            <div class="col secondSelect">
                                <select name="" id="">
                                    <option value="">不需加購</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="amout">
                            <p>數量</p>
                            <select name="" id="">
                                <option value="">1</option>
                            </select>
                        </div>
                        <div class="order">
                            <button><span><svg height="20" viewBox="0 0 20 20" width="20">
                                        <path
                                            d="M17.494 4.552a.625.625 0 0 1 .105.546l-1.484 5.364a.625.625 0 0 1-.603.458H7.817l.03.088c.041.119.047.245.015.365l-.385 1.474h8.53v1.25h-9.34a.627.627 0 0 1-.605-.783l.543-2.072-2.603-7.405H2.153v-1.25h2.292c.265 0 .502.167.59.417l.457 1.302h11.505c.195 0 .38.09.497.246zM15.037 9.67l1.139-4.114H5.93L7.377 9.67zm-6.391 6.718a1.25 1.25 0 1 1-2.501 0 1.25 1.25 0 0 1 2.5 0zm7.361 0a1.25 1.25 0 1 1-2.5 0 1.25 1.25 0 0 1 2.5 0z"
                                            fill="" class="color"></path>
                                    </svg>
                                </span>
                                加入購物車</button>
                        </div>

                        <div class="collect">
                            <button><span><svg width="24" height="24" viewBox="0 0 24 24">
                                        <path class="color" fill="#29242D"
                                            d="M12 20.75c-.17 0-.339-.058-.478-.172-.247-.204-6.068-5.031-8.377-8.144-1.748-2.693-1.549-5.853.456-7.722C4.612 3.77 5.952 3.25 7.374 3.25c1.153 0 2.293.347 3.208.978.651.448 1.103.952 1.417 1.432.315-.48.767-.984 1.418-1.432.915-.631 2.055-.978 3.209-.978 1.421 0 2.761.52 3.772 1.462 2.005 1.868 2.204 5.027.482 7.683-2.334 3.152-8.155 7.979-8.402 8.183-.139.114-.308.172-.478.172zm-4.626-16c-1.041 0-2.018.376-2.75 1.059-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731-.733-.684-1.71-1.06-2.75-1.06-.854 0-1.69.253-2.357.713-1.23.846-1.451 1.933-1.534 2.343-.071.349-.378.6-.734.6H12c-.356 0-.663-.25-.734-.599-.084-.41-.308-1.499-1.535-2.344-.667-.46-1.504-.713-2.357-.713z">
                                        </path>
                                    </svg>
                                </span>
                                收藏商品</button>
                        </div>
                        <div class="ps">
                            <p>本商品為「接單訂製」。付款後，從開始製作到寄出商品為 3 個工作天。（不包含假日）<br>
                                設計館提供統一發票或免用統一發票收據</p>
                        </div>

                    </div>
                    <div class="mainRightSection PDPdiscount">
                        <h5>優惠活動</h5>
                        <ul>
                            <li>【Pinkoi 十週年驚喜禮包】加入會員即贈 NT$100 免運券＋首購兩倍 P Coins 回饋等優惠！</li>
                        </ul>
                    </div>
                    <div class="mainRightSection PDPproductDetail">
                        <h5>商品資訊</h5>

                        <div class="MCRfakeTable">
                            <div class="MCRtablerow">
                                <div class="col-4 leftcolumn">
                                    商品材質
                                </div>
                                <div class="col-8 rightcolumn">
                                <?php
                                echo $rowsr["material"]
                                ?>
                                
                                <!-- 植物、花 -->
                                </div>
                            </div>
                            <div class="MCRtablerow">
                                <div class="col-4 leftcolumn">
                                    製造方式
                                </div>
                                <div class="col-8 rightcolumn">
                                <?php
                                echo $rowsr["madeBy"]
                                ?>
                                
                                <!-- 手工製作 -->
                                </div>
                            </div>
                            <div class="MCRtablerow">
                                <div class="col-4 leftcolumn">
                                    商品產地
                                </div>
                                <div class="col-8 rightcolumn">
                                <?php
                                echo $rowsr["madeIn"]
                                ?>
                                
                                <!-- 台灣 -->
                                </div>
                            </div>

<?php
if($rowsr["specialty"]!=""){
    echo '<div class="MCRtablerow">
    <div class="col-4 leftcolumn">
        商品特點
    </div>
    <div class="col-8 rightcolumn">' . $rowsr["specialty"]. ' </div>
    </div>';
}
?>
                              
                            <div class="MCRtablerow">
                                <div class="col-4 leftcolumn">
                                    庫存
                                </div>
                                <div class="col-8 rightcolumn">
                                    10件以上
                                </div>
                            </div>
                            <div class="MCRtablerow">
                                <div class="col-4 leftcolumn">
                                    商品熱門程度
                                </div>
                                <div class="col-8 rightcolumn">
                                    被欣賞 32,395 次<br>
                                    已賣出 321 件商品<br>
                                    共 2241 人收藏<br>
                                </div>
                            </div>
                            <div class="MCRtablerow">
                                <div class="col-4 leftcolumn">
                                    商品摘要
                                </div>
                                <div class="col-8 rightcolumn">
                                <?php
                                echo $rowsr["productSummery"]
                                ?>
                                <!-- /花材/ 永生花材 不凋花花材 -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mainRightSection PDPabout">
                        <h5>關於設計館</h5>
                        <div class="store clear-fix">
                            <div class="imgwrap">
                                <img src="./img/<?php
                                echo $rowsr["brandPic"]
                                ?>.jpg" alt="">
                            </div>
                            <div class="storeRight">
                                <div class="storetitle">
                                <?php
                                echo $rowsr["brandName"]
                                ?>
                                <!-- Yuans Flower -->
                                </div>
                                <div class="storetitledown">
                                    <span><svg width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="#29242D"
                                                d="M12 2c3.87 0 7 3.13 7 7 0 5.25-7 13-7 13S5 14.25 5 9c0-3.87 3.13-7 7-7zM7 9c0 2.85 2.92 7.21 5 9.88 2.12-2.69 5-7 5-9.88 0-2.76-2.24-5-5-5S7 6.24 7 9zm5 2.5c-1.380712 0-2.5-1.119288-2.5-2.5s1.119288-2.5 2.5-2.5 2.5 1.119288 2.5 2.5-1.119288 2.5-2.5 2.5z">
                                            </path>
                                        </svg></span>
                                    <span>
                                    <?php
                                echo $rowsr["madeIn"]
                                ?>
                                    <!-- 台灣 -->
                                </span>
                                    <span><svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg><svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg><svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg><svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg><svg width="30" height="30" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg></span>
                                    <span>823</span>

                                </div>
                            </div>

                        </div>
                        <div class="buttonwrap d-flex">
                            <button class="left">
                                <span><svg width="20" height="20" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd">
                                            <path fill="none" d="M0 0h20v20H0z"></path>
                                            <path class="color" fill-rule="nonzero" d="M3 8.6h14v2.8H3z">
                                            </path>
                                            <path class="color" fill-rule="nonzero" d="M11.4 3v14H8.6V3z"></path>
                                        </g>
                                    </svg></span>加入關注
                            </button>
                            <button class="right">
                                <svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.803 15.867H3.566A2.565 2.565 0 0 1 1 13.304V4.286a2.566 2.566 0 0 1 2.566-2.564h12.867A2.566 2.566 0 0 1 19 4.286v9.018a2.566 2.566 0 0 1-2.567 2.563h-5.978l-3.86 2.761a.5.5 0 0 1-.792-.406zM8.56 8.962a2.678 2.678 0 0 0-2.178 2.632c0 .341.276.618.618.618h6a.619.619 0 0 0 .619-.619 2.678 2.678 0 0 0-2.179-2.63 2.143 2.143 0 1 0-2.88 0z"
                                        fill="#39393e" class="color"></path>
                                </svg>聯絡設計師
                            </button>
                        </div>
                        <div class="MCRtablerow">
                            <div class="col-4 leftcolumn">
                                回應率
                            </div>
                            <div class="col-8 rightcolumn">
                                94%
                            </div>
                        </div>
                        <div class="MCRtablerow">
                            <div class="col-4 leftcolumn">
                                回應速度
                            </div>
                            <div class="col-8 rightcolumn">
                                一日內
                            </div>
                        </div>
                        <div class="MCRtablerow">
                            <div class="col-4 leftcolumn">
                                平均出貨速度
                            </div>
                            <div class="col-8 rightcolumn">
                                一周內
                            </div>
                        </div>
                    </div>

                    <div class="mainRightSection otherProductInStore">
                        <div class="titleWrap d-flex align-items-baseline">
                            <h5>設計館其他商品</h5>
                            <span>看更多</span>
                            <span>1/4</span>
                        </div>
                        <div class="PDPproductListWrap d-flex">
                            <div class="arrowLeft"><svg width="14" height="14" viewBox="0 0 14 14"
                                    class="icon--arrow-left" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 10.825L6.291 7 10 3.175 8.858 2 4 7l4.858 5L10 10.825z"></path>
                                </svg></div>
                            <div class="arrowRight"><svg width="14" height="14" viewBox="0 0 14 14"
                                    class="icon--arrow-right" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 10.825L7.709 7 4 3.175 5.142 2 10 7l-4.858 5L4 10.825z"></path>
                                </svg></div>

<?php
$indexother=0;
// 設定變數從第0筆開始
shuffle($rowsother);
// shuffle洗牌打亂資料表內所有資料順序
for($i = 0; $i<3; $i++){
   ?>
<!-- 整個要重複的div productCard跑迴圈，，我只要3筆，所以設定i<3，代表第0筆、第1筆、第2筆 -->
                            <div class="col-4 productCard">
                                <div class="pictureWrap">
                                    <div class="discountAndFreeShippingWrap">
                                                                                                                    <?php
                                             if($rowsother[$i]["freeShipping"]!=""){
                                                echo '<div class="freeShipping">' .$rowsother[$i]["freeShipping"]. '</div>';
                                        } 
                                        ?>
                                        <!-- 如果$rowsother資料表中的第i筆變數中的freeShipping欄位不等於空字串時，則印出整個freeShipping div，且div中塞$rowsother第i筆資料的freeshipping欄位；若欄位為空字串則不做事，通常不做事則省略寫else -->
                                        <?php
                                        if($rowsother[$i]["discount"]!=""){
                                            echo '<div class="discount">' .$rowsother[$i]["discount"]. '折</div>';
                                        }
                                        ?>  
                                        
                                    </div>
                                    <div class="otherPicWrap">
                                        <img class="img g-lazy-fadein"
                                            src="img/<?= $rowsother[$i]['productPic1']?>.jpg"
                                            alt="" loading="lazy" style="">
                                    </div>
                                    <div class="favorite">
                                        <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="productName">
                                    <p>
                                    <?php
                                    echo $rowsother[$i]["productName"];
                                    ?>
                                    <!-- 熱賣Morandi莫蘭迪配色大花束 永生花大花束 乾燥花大花束 -->
                                    </p>
                                </div>
                                <div class="productDetail">
                                    <div class="store">
                                        <div class="storeWrap d-flex">
                                            
                                            <div class="storeLink">
                                            <?php
                                            echo $rowsother[$i]["brandName"];
                                            ?>
                                            <!-- Yuans Flower -->
                                            </div>
                                        </div>
                                        
                                        <div class="priceProduct">
                                        <?php
                                        if($rowsother[$i]["discountPrice"]!=""){
                                            echo '<div class="onsale">'.$rowsother[$i]["discountPrice"].'</div>';

                                        }
                                        else{
                                            echo '<div class="onsale">'.$rowsother[$i]["originalPrice"].'</div>';   
                                        }
                                        ?>
                                           <?php
                                           if($rowsother[$i]["discountPrice"]!=""){
                                               echo '<div class="originalPrice">NT$' .$rowsother[$i]["originalPrice"]. '</div>';
                                           }
                                           ?> 
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
<?php

$indexother+=1;
}

?>
                            <!-- <div class="col-4 productCard">
                                <div class="pictureWrap">
                                    <div class="discountAndFreeShippingWrap">
                                        <div class="freeShipping">
                                            免運
                                        </div>
                                        <div class="discount">
                                            7折
                                        </div>
                                    </div>
                                    <img class="img g-lazy-fadein"
                                        src="imgs/yuans flower220220/灰藍黑色系大花束 男士專屬配色 冷色系 質感韓式網紗花束 乾燥花.jpg"
                                        alt="灰藍黑色系大花束 男士專屬配色 冷色系 質感韓式網紗花束 乾燥花" loading="lazy" style="">
                                    <div class="favorite">
                                        <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="productName">
                                    <p>灰藍黑色系大花束 男士專屬配色 冷色系 質感韓式網紗花束 乾燥花</p>
                                </div>
                                <div class="productDetail">
                                    <div class="store">
                                        <div class="storeWrap d-flex">
                                           
                                            <div class="storeLink">Yuans Flower</div>
                                        </div>
                                        <div class="priceProduct">
                                            <div class="onsale">3080</div>
                                            <div class="originalPrice">NT$4400</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> -->
                            
                        </div>
                    </div>



                    <div class="mainRightSection recommend">
                        <div class="titleWrap d-flex align-items-baseline">
                            <h5>為你推薦的好設計</h5>
                            <span>廣告</span>
                            <span>1/4</span>
                        </div>
                        <div class="PDPproductListWrap d-flex">
                            <div class="arrowLeft"><svg width="14" height="14" viewBox="0 0 14 14"
                                    class="icon--arrow-left" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 10.825L6.291 7 10 3.175 8.858 2 4 7l4.858 5L10 10.825z"></path>
                                </svg></div>
                            <div class="arrowRight"><svg width="14" height="14" viewBox="0 0 14 14"
                                    class="icon--arrow-right" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 10.825L7.709 7 4 3.175 5.142 2 10 7l-4.858 5L4 10.825z"></path>
                                </svg></div>
                            <?php
                            $indexGoodDesign=0;
                            shuffle($rowsother);
                            for($d=0; $d<3; $d++){
                            ?>
                            
                            <div class="col-4 productCard">
                                <div class="pictureWrap">
                                    <div class="discountAndFreeShippingWrap">
                                        <?php
                                        if($rowsother[$d]["freeShipping"]!=""){
                                        echo '<div class="freeShipping">' .$rowsother[$d]["freeShipping"]. '</div>';
                                        }
                                        ?>

                                        <?php
                                        if($rowsother[$d]["discount"]!=""){
                                            echo '<div class="discount">' .$rowsother[$d]["discount"]. '折</div>';
                                        }
                                        ?>
                                        
                                    </div>
                                    <div class="otherPicWrap">
                                        <img class="img g-lazy-fadein"
                                            src="img/<?= $rowsother[$d]["productPic1"]?>.jpg" loading="lazy"
                                            style="">
                                    </div>
                                    <div class="favorite">
                                        <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="productName">
                                    <p><?= $rowsother[$d]["productName"] ?></p>
                                </div>
                                <div class="productDetail">
                                    <div class="store">
                                        <div class="storeWrap d-flex">
                                            
                                            <div class="storeLink">
                                            <?=$rowsother[$d]["brandName"]?>
                                            </div>
                                        </div>
                                        <div class="priceProduct">
                                            <?php
                                            if($rowsother[$d]["discountPrice"]!=""){
                                                 echo '<div class="onsale">' .$rowsother[$d]["discountPrice"]. '</div>';
                                                 
                                            }
                                            else{
                                                echo '<div class="onsale">' .$rowsother[$d]["originalPrice"]. '</div>';   
                                            }
                                            ?>
                                            <?php
                                            if($rowsother[$d]["discountPrice"]!=""){
                                                echo '<div class="originalPrice">NT$' .$rowsother[$d]["originalPrice"].'</div>';
                                            }
                                            ?>
                                           
                                        </div>
                                        <!-- <div class="addition">
                                            <p>可客製</p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <?php

                            $indexGoodDesign+=1;
                            }
                            ?>
                            <!-- <div class="col-4 productCard ">
                                <div class="pictureWrap">
                                    <div class="discountAndFreeShippingWrap">
                                        <div class="freeShipping">
                                            免運
                                        </div>
                                        <div class="discount">
                                            7折
                                        </div>
                                    </div>
                                    <img class="img g-lazy-fadein" src="imgs/yuans flower220220/永德堂 - 越南芽莊沉香環香 東方香氛.jpg"
                                        alt="永德堂 - 越南芽莊沉香環香 東方香氛" loading="lazy" style="">
                                    <div class="favorite">
                                        <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="productName">
                                    <p>永德堂 - 越南芽莊沉香環香 東方香氛</p>
                                </div>
                                <div class="productDetail">
                                    <div class="store">
                                        <div class="storeWrap d-flex">
                                           
                                            <div class="storeLink">永德堂</div>
                                        </div>
                                        <div class="priceProduct">
                                            <div class="onsale">450</div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="mainRightSection popular">
                        <div class="titleWrap d-flex align-items-baseline">
                            <h5>熱門商品推薦</h5>
                            <!-- <span>廣告</span> -->
                            <span>1/2</span>
                        </div>
                        <div class="PDPproductListWrap d-flex">
                            <div class="arrowLeft"><svg width="14" height="14" viewBox="0 0 14 14"
                                    class="icon--arrow-left" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 10.825L6.291 7 10 3.175 8.858 2 4 7l4.858 5L10 10.825z"></path>
                                </svg></div>
                            <div class="arrowRight"><svg width="14" height="14" viewBox="0 0 14 14"
                                    class="icon--arrow-right" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 10.825L7.709 7 4 3.175 5.142 2 10 7l-4.858 5L4 10.825z"></path>
                                </svg></div>

<?php
$indexPop=0;
shuffle($rowsother);
for($p=0; $p<3; $p++){
?>

                            <div class="col-4 productCard">
                                <div class="pictureWrap">
                                    <div class="discountAndFreeShippingWrap">
                                        
                                        <?php
                                        if($rowsother[$p]["freeShipping"]!=""){
                                        echo '<div class="freeShipping">' .$rowsother[$p]["freeShipping"]. '</div>';
                                        }
                                        ?>

                                        <?php
                                        if($rowsother[$p]["discount"]!=""){
                                            echo  '<div class="discount">' .$rowsother[$p]["discount"]. '折</div>';
                                        }
                                        ?>
                                       
                                    </div>
                                    <div class="otherPicWrap">
                                        <img class="img g-lazy-fadein" src="img/<?= $rowsother[$p]["productPic1"]?>.jpg"
                                            alt="" loading="lazy" style="">
                                    </div>
                                    <div class="favorite">
                                        <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="productName">
                                    <p>
                                    <?= $rowsother[$p]["productName"]?>
                                    </p>
                                </div>
                                <div class="productDetail">
                                    <div class="store">
                                        <div class="storeWrap d-flex">
                                            
                                            <div class="storeLink">
                                            <?= $rowsother[$p]["brandName"]?>
                                            </div>
                                        </div>
                                        <div class="priceProduct">
                                            <?php
                                            if($rowsother[$p]["discountPrice"]!=""){
                                                echo '<div class="onsale">' .$rowsother[$p]["discountPrice"]. '</div>';
                                            }
                                            else{
                                                echo '<div class="onsale">' .$rowsother[$p]["originalPrice"]. '</div>';
                                            }
                                            ?>
                                            <?php
                                            if($rowsother[$p]["discountPrice"]!=""){
                                                echo '<div class="originalPrice">NT$' .$rowsother[$p]["originalPrice"]. '</div>';
                                            }
                                            ?>
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>

<?php
}
?>
                            <!-- <div class="col-4 productCard">
                                <div class="pictureWrap">
                                    <div class="discountAndFreeShippingWrap">
                                        <div class="freeShipping">
                                            免運
                                        </div>
                                        <div class="discount">
                                            95折
                                        </div>
                                    </div>
                                    <img class="img g-lazy-fadein" src="imgs/yuans flower220220/【Goody Bag】生活好香福袋.jpg"
                                        loading="lazy" style="">
                                    <div class="favorite">
                                        <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="productName">
                                    <p>【Goody Bag】生活好香福袋</p>
                                </div>
                                <div class="productDetail">
                                    <div class="store">
                                        <div class="storeWrap d-flex">
                                            
                                            <div class="storeLink">水先</div>
                                        </div>
                                        <div class="priceProduct">
                                            <div class="onsale">3705</div>
                                            <div class="originalPrice">NT$3900</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> -->
                           
                        </div>
                    </div>

                    <div class="mainRightSection similar">
                        <div class="titleWrap d-flex align-items-baseline">
                            <h5>為你推薦的相似商品</h5>
                            <!-- <span>廣告</span> -->
                            <span>1/2</span>
                        </div>
                        <div class="PDPproductListWrap d-flex">
                            <div class="arrowLeft"><svg width="14" height="14" viewBox="0 0 14 14"
                                    class="icon--arrow-left" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 10.825L6.291 7 10 3.175 8.858 2 4 7l4.858 5L10 10.825z"></path>
                                </svg></div>
                            <div class="arrowRight"><svg width="14" height="14" viewBox="0 0 14 14"
                                    class="icon--arrow-right" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 10.825L7.709 7 4 3.175 5.142 2 10 7l-4.858 5L4 10.825z"></path>
                                </svg></div>
                            <?php
                            $indexSimilar=0;
                            shuffle($rowsother);
                            for($ss=0; $ss<3; $ss++){
                            ?>

                            <div class="col-4 productCard">
                                <div class="pictureWrap">
                                    <div class="discountAndFreeShippingWrap">
                                        <?php
                                        if($rowsother[$ss]["freeShipping"]!=""){
                                        echo '<div class="freeShipping">' .$rowsother[$ss]["freeShipping"]. '</div>';
                                        }
                                        ?>
                                        <?php
                                        if($rowsother[$ss]["discount"]!=""){
                                        echo '<div class="discount">' .$rowsother[$ss]["discount"]. '折</div>';
                                        }
                                        ?>                                        
                                        
                                    </div>
                                    <div class="otherPicWrap">
                                        <img class="img g-lazy-fadein" src="img/<?= $rowsother[$ss]["productPic1"]?>.jpg"
                                            alt="" loading="lazy" style="">
                                    </div>
                                    <div class="favorite">
                                        <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="productName">
                                    <p>
                                    <?= $rowsother[$ss]["productName"]?>
                                    </p>
                                </div>
                                <div class="productDetail">
                                    <div class="store">
                                        <div class="storeWrap d-flex">
                                            <div class="storeLink">
                                            <?= $rowsother[$ss]["brandName"]?>
                                            </div>
                                        </div>
                                        <div class="priceProduct">
                                            <?php
                                            if($rowsother[$ss]["discountPrice"]!=""){
                                                echo '<div class="onsale">' .$rowsother[$ss]["discountPrice"]. '</div>';
                                            }
                                            else{
                                                echo '<div class="onsale">' .$rowsother[$ss]["originalPrice"]. '</div>';
                                            }
                                            ?>
                                            <?php
                                            if($rowsother[$ss]["discountPrice"]!=""){
                                                echo '<div class="originalPrice">NT$' .$rowsother[$ss]["originalPrice"]. '</div>';
                                            }
                                            ?>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <?php
                            $indexSimilar+=1;
                            }
                            ?>
                            <!-- <div class="col-4 productCard">
                                <div class="pictureWrap">
                                    <div class="discountAndFreeShippingWrap">
                                        <div class="freeShipping">
                                            免運
                                        </div>
                                        <div class="discount">
                                            95折
                                        </div>
                                    </div>
                                    <img class="img g-lazy-fadein"
                                        src="imgs/yuans flower220220/journee溫暖冬日乾燥花束聖誕禮物 聖誕花束 交換禮物 情人節.jpg"
                                        loading="lazy" style="">
                                    <div class="favorite">
                                        <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="productName">
                                    <p>journee溫暖冬日乾燥花束聖誕禮物 聖誕花束 交換禮物 情人節</p>
                                </div>
                                <div class="productDetail">
                                    <div class="store">
                                        <div class="storeWrap d-flex">
                                            <span class="ad">廣告．</span>
                                            <div class="storeLink">journee</div>
                                        </div>
                                        <div class="priceProduct">
                                            <div class="onsale">499</div>
                                            <div class="originalPrice">NT$3900</div>
                                        </div>
                                        <div class="addition">
                                            <p>可客製</p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            
                        </div>
                    </div>

                    <div class="PDPsocialMedia">
                        <ul class="d-flex list-unstyled">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>



                </div>

            </div>
            <div class="bottomSection goodDesign">
                <div class="titleWrap d-flex align-items-baseline">
                    <h5>為你推薦的好設計</h5>
                    <span>廣告</span>
                    
                </div>
                <div class="PDPproductListWrap d-flex flex-wrap">
                    <?php
                    $indexother=0;
                    shuffle($rowsother);
                    for($i=0; $i<6; $i++){
                    ?>

                    <div class="col-2 productCard ">
                        <div class="pictureWrap">
                            <div class="discountAndFreeShippingWrap">
                                <?php
                                if($rowsother[$i]["freeShipping"]!=""){
                                    echo '<div class="freeShipping">' .$rowsother[$i]["freeShipping"]. '</div>';
                                }
                                ?>
                                <?php
                                if($rowsother[$i]["discount"]!=""){
                                    echo '<div class="discount">' .$rowsother[$i]["discount"]. '折</div>';
                                }
                                ?>
                                
                            </div>
                            <div class="bottomPicWrap">
                                <img class="img g-lazy-fadein" src="img/<?= $rowsother[$i]["productPic1"]?>.jpg"
                                    alt="" loading="lazy" style="">
                            </div>
                            <div class="favorite">
                                <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="productName">
                            <p>
                            <?= $rowsother[$i]["productName"]?>
                            </p>
                        </div>
                        <div class="productDetail">
                            <div class="store">
                                <div class="storeWrap d-flex">
                                    <div class="storeLink">
                                    <?= $rowsother[$i]["brandName"]?>
                                    </div>
                                </div>
                                <div class="priceProduct">
                                    <?php
                                    if($rowsother[$i]["discountPrice"]!=""){
                                        echo '<div class="onsale">' .$rowsother[$i]["discountPrice"]. '</div>';
                                    }
                                    else{
                                        echo '<div class="onsale">' .$rowsother[$i]["originalPrice"]. '</div>';
                                    }
                                    ?>
                                    <?php
                                    if($rowsother[$i]["discountPrice"]!=""){
                                        echo '<div class="originalPrice">NT$' .$rowsother[$i]["originalPrice"]. '</div>';
                                    }
                                    ?>
                                    
                                </div>
                                <!-- <div class="addition">
                                <p>可客製</p>
                            </div> -->
                            </div>
                        </div>
                    </div>

                    <?php
                    $indexother+=1;
                    }
                    ?>
                    <!-- <div class="col-2 productCard ">
                        <div class="pictureWrap">
                            <div class="discountAndFreeShippingWrap">
                                <div class="freeShipping">
                                免運
                            </div>
                            <div class="discount">
                                7折
                            </div>
                            </div>
                            <img class="img g-lazy-fadein" src="imgs/yuans flower220220/永生桌花 蜜桃慕斯_韓式永生桌花 開幕升遷桌花.jpg"
                                alt="永生桌花 蜜桃慕斯_韓式永生桌花 開幕升遷桌花" loading="lazy" style="">
                            <div class="favorite">
                                <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="productName">
                            <p>永生桌花 蜜桃慕斯_韓式永生桌花 開幕升遷桌花</p>
                        </div>
                        <div class="productDetail">
                            <div class="store">
                                <div class="storeWrap d-flex">
                                    <span class="ad">廣告．</span>
                                    <div class="storeLink">LA FLOR引花入世</div>
                                </div>
                                <div class="priceProduct">
                                    <div class="onsale">2300</div>
                                    <div class="originalPrice">NT$6114</div>
                                </div>
                                <div class="addition">
                                <p>可客製</p>
                            </div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
            <div class="bottomSection mayLike">
                <div class="titleWrap d-flex align-items-baseline">
                    <h5>你可能也會喜歡</h5>
                    <!-- <span>廣告</span> -->
                    <!-- <span>1/2</span> -->
                </div>
                <div class="PDPproductListWrap d-flex flex-wrap">
                    <?php
                    $indexother=0;
                    shuffle($rowsother);
                    for($m=0; $m<6; $m++){
                    ?>
                    
                    <div class="col-2 productCard ">
                        <div class="pictureWrap">
                            <div class="discountAndFreeShippingWrap">
                                <?php
                                if($rowsother[$m]["freeShipping"]!=""){
                                    echo '<div class="freeShipping">' .$rowsother[$m]["freeShipping"]. '</div>';
                                }
                                ?>
                                <?php
                                if($rowsother[$m]["discount"]!=""){
                                    echo '<div class="discount">' .$rowsother[$m]["discount"]. '折</div>';
                                }
                                ?>                              
                                
                                
                            </div>
                            <div class="bottomPicWrap">
                                <img class="img g-lazy-fadein"
                                    src="img/<?= $rowsother[$m]["productPic1"]?>.jpg"
                                    alt="" loading="lazy" style="">
                            </div>
                            <div class="favorite">
                                <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="productName">
                            <p>
                            <?= $rowsother[$m]["productName"]?>
                            </p>
                        </div>
                        <div class="productDetail">
                            <div class="store">
                                <div class="storeWrap d-flex">
                                    <!-- <span class="ad">廣告．</span> -->
                                    <div class="storeLink">
                                    <?= $rowsother[$m]["brandName"]?>
                                    </div>
                                </div>
                                <div class="priceProduct">
                                    <?php
                                    if($rowsother[$m]["discountPrice"]!=""){
                                        echo '<div class="onsale">' .$rowsother[$m]["discountPrice"].'</div>';
                                    }
                                    else{
                                        echo '<div class="onsale">' .$rowsother[$m]["originalPrice"].'</div>';
                                    }
                                    ?>
                                    <?php
                                    if($rowsother[$m]["discountPrice"]!=""){
                                        echo '<div class="originalPrice">NT$' .$rowsother[$m]["originalPrice"]. '</div>';
                                    }
                                    ?>
                                    
                                </div>
                                <!-- <div class="addition">
                                <p>可客製</p>
                            </div> -->
                            </div>
                        </div>
                    </div>
                    <?php  
                    $indexother+=1;  
                    }
                    ?>
                    <!-- <div class="col-2 productCard ">
                        <div class="pictureWrap">
                            <div class="discountAndFreeShippingWrap">
                                <div class="freeShipping">
                                免運
                            </div>
                            <div class="discount">
                                7折
                            </div>
                            </div>
                            <img class="img g-lazy-fadein"
                                src="imgs/yuans flower220220/永生花薰香器(櫻花粉) 香氛 精油 夜燈 永生花 乾燥花 聖誕禮物.jpg"
                                alt="永生花薰香器(櫻花粉) 香氛 精油 夜燈 永生花 乾燥花 聖誕禮物" loading="lazy" style="">
                            <div class="favorite">
                                <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="productName">
                            <p>永生花薰香器(櫻花粉) 香氛 精油 夜燈 永生花 乾燥花 聖誕禮物</p>
                        </div>
                        <div class="productDetail">
                            <div class="store">
                                <div class="storeWrap d-flex">
                                    <span class="ad">廣告．</span>
                                    <div class="storeLink">Flora Flower</div>
                                </div>
                                <div class="priceProduct">
                                    <div class="onsale">2480</div>
                                    <div class="originalPrice">NT$6114</div>
                                </div>
                                <div class="addition">
                                <p>可客製</p>
                            </div>
                            </div>
                        </div>
                    </div> -->

                </div>

            </div>
            <div class="bottomSection otherDesignStore">
                <div class="titleWrap d-flex align-items-baseline">
                    <h5>推薦給你的設計館</h5>
                    <!-- <span>廣告</span> -->
                    <!-- <span>1/2</span> -->
                </div>
                <div class="PDPproductListWrap d-flex flex-wrap">
                    <div class="col-4 DesignStoreCard px-0">
                        <div class="col-12">
                            <div class="picWrap d-flex flex-wrap">
                                <div class="col-9 picWrapBig picWrap px-0 flex-fill flex-shrink-1">
                                    <img src="./imgs/yuans flower220220/Flora Flower big.jpg" alt="">
                                </div>
                                <div class="col-3 d-flex flex-wrap px-0 flex-fill flex-shrink-1">
                                    <div class="picWrap px-0 ">
                                        <img src="./imgs/yuans flower220220/Flora Flower side1.jpg" alt="">
                                    </div>
                                    <div class="picWrap px-0 flex-fill flex-shrink-1">
                                        <img src="./imgs/yuans flower220220/Flora Flower side2.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="infoWrap d-flex">
                                <div class="leftWrap">
                                    <div class="store">
                                        <p>Flora Flower</p>
                                    </div>
                                    <div class="favoriteWrap d-flex justify-content-start">
                                        <div class="heart2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="heart2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="heart2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="heart2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" class="icon--heart-solid"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.374 4.75a4.008 4.008 0 0 0-2.75 1.059c-1.464 1.364-1.565 3.737-.247 5.77 1.808 2.436 6.172 6.211 7.623 7.442 1.451-1.231 5.819-5.013 7.648-7.48 1.292-1.996 1.191-4.369-.272-5.731a4.007 4.007 0 0 0-2.75-1.06 4.18 4.18 0 0 0-2.357.713c-1.23.846-1.451 1.933-1.534 2.343a.75.75 0 0 1-.734.6H12a.748.748 0 0 1-.734-.599 3.543 3.543 0 0 0-1.535-2.344 4.182 4.182 0 0 0-2.357-.713">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="number">
                                            959
                                        </div>
                                    </div>
                                </div>
                                <div class="buttonwrap d-flex">
                                    <button class="left">
                                        <span><svg width="20" height="20" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g fill="none" fill-rule="evenodd">
                                                    <path fill="none" d="M0 0h20v20H0z"></path>
                                                    <path class="color" fill-rule="nonzero" d="M3 8.6h14v2.8H3z">
                                                    </path>
                                                    <path class="color" fill-rule="nonzero" d="M11.4 3v14H8.6V3z">
                                                    </path>
                                                </g>
                                            </svg></span>加入關注
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <script src="./jquery-3.6.0.js"></script>

</body>

</html>