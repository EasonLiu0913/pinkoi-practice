<?php include __DIR__. '/parts/config.php'; ?>
<?php
$sql= "SELECT * FROM `category_product_list2`";
$rows = $pdo->query($sql)->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PINKOI productList</title>
    <link rel="stylesheet" href="./bootstrap-4.6.0-dist/css/bootstrap.css">

    <style>


        body {
            margin: 0px auto;
            padding: 0px auto;
            color: #66666a;
        }

        a:hover, a:visited, a:link, a:active{
            text-decoration: none;
            color:#66666a;
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

        .filterCategory {
            border-bottom: 1px solid grey;
            margin: 10px 0px;
            padding-bottom: 10px;
        }

        .filterWrap li {
            font-size: 15px;
            font-weight: 400;
            margin-bottom: 6px;
        }

        .pink {
            color: #f16c5d;
            fill: #f16c5d;
        }

        .inputWrap input {
            margin-right: 3px;
        }

        .viewMoreWrap {
            margin-top: 10px;
        }

        .priceCustom {
            width: 100%;
        }

        .priceCustom button {
            background-color: #10567b;
            border-radius: 0 2px 2px 0;
            border: #10567b;
            padding: 3px 6px;
            fill: #FFF;
            margin-left: 1px;

        }

        .from,
        .end {
            width: 100%;
            /* flex: 0 1 auto; */
            /* flex:grow shrink basic*/
        }

        .inputWrapColor input {
            width: 22px;
            height: 22px;
        }


        input.red:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #f16c5d;
        }

        input.red:checked:before {
            border: 2px solid #000;
        }

        input.orange:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #fc9f36;
        }

        input.orange:checked:before {
            border: 2px solid #000;
        }

        input.yellow:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #f9fc36;
        }

        input.yellow:checked:before {
            border: 2px solid #000;
        }

        input.green:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #03ca03;
        }

        input.green:checked:before {
            border: 2px solid #000;
        }

        input.blue:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #36a3fc;
        }

        input.blue:checked:before {
            border: 2px solid #000;
        }

        input.purple:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #a336fc;
        }

        input.purple:checked:before {
            border: 2px solid #000;
        }

        input.pink:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #e981ad;
        }

        input.pink:checked:before {
            border: 2px solid #000;
        }

        input.lightbrown:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #ddac7f;
        }

        input.lightbrown:checked:before {
            border: 2px solid #000;
        }

        input.brown:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #553503;
        }

        input.brown:checked:before {
            border: 2px solid #000;
        }

        input.gold:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #f9fc36;
        }

        input.gold:checked:before {
            border: 2px solid #000;
        }

        input.silver:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #f9fc36;
        }

        input.silver:checked:before {
            border: 2px solid #000;
        }

        input.black:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #f9fc36;
        }

        input.black:checked:before {
            border: 2px solid #000;
        }

        input.grey:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #f9fc36;
        }

        input.grey:checked:before {
            border: 2px solid #000;
        }

        input.white:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #f9fc36;
        }

        input.white:checked:before {
            border: 2px solid #000;
        }

        input.transparent:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #f9fc36;
        }

        input.transparent:checked:before {
            border: 2px solid #000;
        }

        input.rianbow:before {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            /* border: 1px solid #808080; */
            content: "";
            background: #f9fc36;
        }

        input.rianbow:checked:before {
            border: 2px solid #000;
        }

        .colorBoxWrap {
            width: 100%;
            flex-wrap: wrap;
        }

        .inputWrapColor {
            width: 25%;
            flex: 0 1 auto;
        }

        .titleBar {
            width: 100%;
        }

        .productsList {
            flex-wrap: wrap;
        }

        .productCard {
            height: 100%;
        }

        .productsList .pictureWrap img {
            width: 100%;
            height: 100%;  
            object-fit:cover;          
                    }

        .pictureWrap {
            position: relative;
            
        }

        .productimg{
            /* width: 212.5px; */
            height: 212.5px;
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
            font-size: 16px;
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
            text-decoration: line-through;
        }

        /* .onsale::after {
            content: "NT$1319";
            text-decoration: line-through;
            display: inline;
            margin-left: 10px;
            float: right;
        } */

        .addition p {
            font-size: small;
            border: 1px solid gray;
            width: fit-content;
        }

        .readyToBuy{
            color:red;
        }
        

        .pagebar ul li {
            border: 1px solid gray;
            padding: 0px 5px;
            margin: 0px 10px;
            border-radius: 3px;
        }

        .pagebar ul :nth-child(4) {
            border: none;
            margin: 0px 10px;
        }

        /* .pagebar ul :nth-child(1) {
            border: none;
            margin: 0px 10px;
        } 
        空格表示ul的子層孫層全部都抓，子層li裡的最後一個小孩也符合此條件，等於孫層也抓到*/

        .pagebar ul>:nth-last-child(1) {
            border: none;
            margin: 0px 10px;
        }

        /* >只抓子層中的最後一個 */

        /* .pagebar ul li:nth-last-child(1) {
            border: none;
            margin: 0px 10px;
        }
        ul裡的li且只能是ul的最後一個小孩 */

        .noticeBar {
            background-color: #f7f7f8;
            padding: 14px 24px;
            font-weight: 500;
            font-size: 14px;
            margin: 20px auto;
        }

        .noticeBar>p {
            margin-bottom: 0px;
        }

        .noticeBar>button {
            background-color: #10567b;
            color: #fff;
            border-radius: 2px;
            border: 1px solid #10567b;
        }

        .footer {
            display: flex;
            background-color: #f7f7f8;
        }

        .footerbox {
            width: 1200px;
            margin: 0px auto;
        }

        .footerContentWrap {
            width: 1200px;
            margin: 0px auto;
            padding-top: 50px;
            border-bottom: 1px solid grey;
        }

        .footerContentWrap ul {
            list-style-type: none;
        }

        .footerContentWrap p {
            font-weight: 700;
        }

        .footerContentWrap ul li {
            font-weight: 400px;
            font-size: 13px;
        }

        .ending {
            font-size: 13px;
            font-weight: 400;
        }

        .endingLeft>:nth-child(1),
        .endingRight>:nth-child(1) {
            margin-right: 10px;
        }
    </style>
</head>

<body>
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
        <div class="mainContent d-flex">
            <div class="filterWrap col-2">

                <div class="filterCategory filterCategory">
                    <h6>商品分類</h6>
                    <ul class="list list-unstyled">
                        <div class="productSort d-flex">
                            <span><svg width="14" height="14" viewBox="0 0 14 14" class="icon--arrow-left"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 10.825L6.291 7 10 3.175 8.858 2 4 7l4.858 5L10 10.825z"></path>
                                </svg></span>
                            <p>所有分類</p>
                        </div>
                        <li class="d-flex pink"><span><svg width="24" height="24" viewBox="0 0 24 24"
                                    class="icon--category_5" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.166 13.862L7.324 3h9.356l3.154 10.862zM16.5 21.029V22H7.517v-.971c0-.406.33-.736.736-.736h7.514c.404 0 .733.33.733.736zm4.443-6.933L17.535 2.36a.5.5 0 0 0-.48-.36H6.949a.5.5 0 0 0-.48.36l-3.45 11.862a.499.499 0 0 0 .48.64h2.287v2.12a.5.5 0 0 0 1 0v-2.12h4.716v4.431h-3.25c-.956 0-1.735.779-1.735 1.736V22.5a.5.5 0 0 0 .5.5H17a.5.5 0 0 0 .5-.5v-1.471c0-.957-.777-1.736-1.733-1.736h-3.265v-4.431h8.018a.5.5 0 0 0 .423-.766z">
                                    </path>
                                </svg></span>
                            <p>居家生活</p>
                        </li>
                        <li>燈具/燈飾</li>
                        <li>香氛/精油/線香</li>
                        <li>擺飾</li>
                        <li>牆貼/壁貼</li>
                        <li>植栽/盆栽</li>
                        <li>花瓶/陶器</li>
                        <li>玩偶/公仔</li>
                        <li>時鐘/鬧鐘</li>
                        <li>隨行杯提袋/水壺袋</li>
                        <li>蠟燭/燭台</li>
                        <li>海報/畫作/版畫</li>
                        <li>其他家具</li>
                        <li>畫框/相框</li>
                        <li>枕頭/抱枕</li>
                        <li>被子/毛毯</li>
                        <li>寢具</li>
                        <li>收納用品</li>
                        <li>存錢筒</li>
                        <li>客製畫像</li>
                        <li>門簾/門牌</li>
                        <li>地墊/地毯</li>
                        <li>餐桌/書桌</li>
                        <li>椅子/沙發</li>
                        <li>書架/書擋</li>
                        <li>電視櫃</li>
                        <li>衣櫃/鞋櫃</li>
                        <li>保溫瓶/保溫杯</li>
                        <li>電風扇</li>
                        <li>乾燥花/捧花</li>
                        <li>置物架/籃子</li>
                        <li>衣架/掛勾</li>
                        <li>垃圾桶</li>
                        <li>眼鏡盒/拭布</li>
                        <li>面紙盒</li>
                        <li>水壺/水瓶</li>
                        <li>衛浴用品</li>
                        <li>吸塵器</li>
                        <li>扇子</li>
                        <li>防蚊用品</li>
                        <li>其他小家電</li>
                        <li>衣物清潔</li>
                        <li>毛巾浴巾</li>
                        <li>情趣用品</li>
                        <li>其他</li>
                    </ul>
                </div>

                <div class="filterCategory filterOptional">
                    <h6>縮小商品顯示範圍</h6>
                    <h6>免運</h6>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">只顯示免運商品</div>
                    </div>
                    <select name="" id="">
                        <option value="TW">寄往台灣 (18382)</option>
                    </select>
                </div>
                <div class="filterCategory filterLocation">
                    <h6>設計館所在地</h6>
                    <select name="" id="">
                        <option value="all">所有地區</option>
                    </select>
                </div>
                <div class="filterCategory filterMaterial">
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">棉/麻</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">木頭</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">木頭</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">植物．花</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">紙</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">其他金屬</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">陶</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">塑膠</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">聚酯纖維</div>
                    </div>
                    <div class="viewMoreWrap d-flex">
                        <p>顯示更多</p>
                        <span><svg width="20" height="20" viewBox="0 0 20 20" class="icon--sleek-arrow-down"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.99673381,11.7849353 L14.5285082,6.32990576 C14.8047147,5.96389069 15.3065726,5.89190434 15.6706824,6.16695881 C15.8801448,6.32715377 16,6.57135694 16,6.83699669 C16,7.01732465 15.9457528,7.1847617 15.8388204,7.33481774 C15.8366903,7.33800426 15.8345601,7.34075625 15.832572,7.3433634 L10.6505408,13.6680227 C10.5000118,13.8751464 10.2550472,14 9.99673381,14 C9.73827838,14 9.49317176,13.8751464 9.3413647,13.6661398 L4.16941611,7.3433634 L4.16487184,7.33713521 C4.05708741,7.18896211 4,7.0147175 4,6.83352048 C4,6.56961884 4.12013917,6.32715377 4.32945966,6.16826238 C4.50043786,6.03500798 4.71472865,5.97837486 4.93157558,6.0100952 C5.14572436,6.04152586 5.34141204,6.15971672 5.4682256,6.3345407 L9.99673381,11.7849353 Z">
                                </path>
                            </svg></span>
                    </div>
                </div>

                <div class="filterCategory filterPrice">
                    <h6>金額</h6>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="radio" value>
                        <div class="inputLabel">NT$300 以下</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="radio" value>
                        <div class="inputLabel">NT$300 - 500</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="radio" value>
                        <div class="inputLabel">NT$500 - 1,000</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="radio" value>
                        <div class="inputLabel">NT$1,000 - 2,000</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="radio" value>
                        <div class="inputLabel">NT$2,000 - 2,500</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="radio" value>
                        <div class="inputLabel">NT$2,500 - 5,000</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="radio" value>
                        <div class="inputLabel">NT$5,000 以上</div>
                    </div>

                    <div class="priceCustomWrap">
                        <div class="priceCustom d-flex align-items-center">
                            <div class="priceSymbol">NT$</div>
                            <!-- <div> -->
                            <input type="tel" class="from">
                            <!-- </div> -->

                            <span>-</span>
                            <!-- <div> -->
                            <input type="tel" class="end">
                            <!-- </div> -->

                            <button><svg width="14" height="14" viewBox="0 0 14 14" class="icon--arrow-right"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 10.825L7.709 7 4 3.175 5.142 2 10 7l-4.858 5L4 10.825z"></path>
                                </svg></button>
                        </div>
                    </div>
                </div>
                <div class="filterCategory filterColor">
                    <h6>顏色</h6>
                    <div class="clearSelect d-flex">
                        <p>清除選取</p>
                        <span><svg width="14" height="14" viewBox="0 0 14 14" class="icon--cross"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 5.574L2.723 1.297A1.007 1.007 0 0 0 1 2.01c0 .267.106.524.296.713L5.575 7l-4.277 4.277a1.004 1.004 0 0 0 0 1.426 1 1 0 0 0 1.419.007L7 8.426l4.277 4.277a1.006 1.006 0 0 0 1.426 0 1.006 1.006 0 0 0 0-1.426L8.426 7l4.278-4.279a1.004 1.004 0 0 0 0-1.425 1.007 1.007 0 0 0-1.427 0L7 5.575v-.001z">
                                </path>
                            </svg></span>
                    </div>

                    <div class="colorboxs d-flex colorBoxWrap">
                        <div class="inputWrap inputWrapColor "><input type="checkbox" class="red" checked>
                        </div>
                        <div class="inputWrap inputWrapColor "><input type="checkbox" class="orange" checked>
                        </div>
                        <div class="inputWrap inputWrapColor "><input type="checkbox" class="yellow" checked>
                        </div>
                        <div class="inputWrap inputWrapColor "><input type="checkbox" class="green" checked>
                        </div>
                        <div class="inputWrap inputWrapColor "><input type="checkbox" class="blue" checked>
                        </div>
                        <div class="inputWrap inputWrapColor"><input type="checkbox" class="purple" checked>
                        </div>
                        <div class="inputWrap inputWrapColor"><input type="checkbox" class="pink" checked>
                        </div>
                        <div class="inputWrap inputWrapColor"><input type="checkbox" class="lightbrown" checked>
                        </div>
                        <div class="inputWrap inputWrapColor"><input type="checkbox" class="brown" checked>
                        </div>
                        <div class="inputWrap inputWrapColor"><input type="checkbox" class="gold" checked>
                        </div>
                        <div class="inputWrap inputWrapColor"><input type="checkbox" class="silver" checked>
                        </div>
                        <div class="inputWrap inputWrapColor"><input type="checkbox" class="black" checked>
                        </div>
                        <div class="inputWrap inputWrapColor"><input type="checkbox" class="grey" checked>
                        </div>
                        <div class="inputWrap inputWrapColor"><input type="checkbox" class="white" checked>
                        </div>
                        <div class="inputWrap inputWrapColor"><input type="checkbox" class="transparent" checked>
                        </div>
                        <div class="inputWrap inputWrapColor"><input type="checkbox" class="rianbow" checked>
                        </div>
                    </div>
                </div>

                <div class="filterCategory filterStyle">
                    <h6>風格</h6>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">中性</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">可愛</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">都會</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">簡約</div>
                    </div>
                    <div class="inputWrap d-flex align-items-center">
                        <input type="checkbox" value>
                        <div class="inputLabel">禪風</div>
                    </div>
                </div>
            </div>
            <div class="mainContentRight col-10">
                <div class="titleBar d-flex justify-content-between align-items-center">
                    <div class="title">
                        <h4>居家生活</h4>
                    </div>
                    <div class="sortWrap">
                        <span>排序</span>
                        <select name="" id="">
                            <option value="">熱門程度優先</option>
                        </select>
                    </div>
                </div>
                <div class="productsList d-flex">
                    <?php  
                    foreach($rows as $s){
                        ?>
 <div  class="col-3 productCard" >
 <a href="PINKOI.productDetails.php?productNumber=<?php echo $s["productNumber"]?>">

<div class="pictureWrap">

    <div class="discountAndFreeShippingWrap">
        <?php
        if($s["discount"]!=""){
            echo '<div class="discount">' .$s["discount"] . '折</div>';
        }
        ?>
        
        <?php
        if($s["freeShipping"]!=""){
            echo '<div class="freeShipping">' .$s["freeShipping"] .'
            </div>';
        }
        ?>
        
    </div>
    <div class="productimg">
    <img src="./img/<?php echo $s["productPic1"]?>.jpg"  
     alt="">
     </div>
    <!-- <img class="img g-lazy-fadein" src="//cdn01.pinkoi.com/product/CYzApVvQ/0/4/220x220.jpg"
        srcset="//cdn01.pinkoi.com/product/CYzApVvQ/0/4/220x220.jpg 1x,//cdn01.pinkoi.com/product/CYzApVvQ/0/4/320x320.jpg 2x"
        alt="【日本櫻花】200ml日本櫻花味藤枝香薰" loading="lazy" style=""> -->
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
    echo $s["productName"]
    ?>    
    <!-- 【日本櫻花】200ml日本櫻花味藤枝香薰</p> -->
</div>

<div class="productDetail">
    <div class="store">
        <div class="storeWrap d-flex">
            <!-- <span class="ad">廣告．</span> -->
            <div class="storeLink">
            <?php
            echo $s["brandName"]
            ?>
            <!-- The Candle Company -->
            </div>
        </div>
        <div class="priceProduct">

        <?php
          if($s["discountPrice"]!=""){
              echo '<div class="onsale">' .$s["discountPrice"] . '</div>';
        }
          else{
              echo '<div class="onsale">' .$s["originalPrice"] . '</div>';
        }
        ?>

        <?php
        if($s["discountPrice"]!=""){
            echo '<div class="originalPrice">NT$'.$s["originalPrice"]. '</div>';
        }
        ?>
                    
        </div>
        <?php 

        if($s["mark"]!=""){
            echo '<div class="addition">
            <p>' .$s["mark"]. '</p>
            </div>';
        }
        
        ?>

        <?php

        if($s["readyToBuy"]!=""){
            echo '<div class="readyToBuy">
            <p>' .$s["readyToBuy"]. '人正準備購買</p>
            </div>';
        }
               
        ?>
    </div>
</div>


</div>


<?php
}
?>
</a>
                   
                    <!-- <div class="col-3 productCard">
                        <div class="pictureWrap">
                            <div class="discountAndFreeShippingWrap">
                                <div class="discount">
                                    7折
                                </div>
                            </div>
                            <img class="img g-lazy-fadein" src="//cdn01.pinkoi.com/product/Bys752Sz/0/1/220x220.jpg"
                                srcset="//cdn01.pinkoi.com/product/Bys752Sz/0/1/220x220.jpg 1x,//cdn01.pinkoi.com/product/Bys752Sz/0/1/320x320.jpg 2x"
                                alt="小資款花束 畢業花束 情人節新款 韓風花束 乾燥花束 永生花 禮物" loading="lazy" style="">
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
                            <p>小資款花束 畢業花束 情人節新款 韓風花束 乾燥花束 永生花 禮物</p>
                        </div>
                        <div class="store">
                            <div class="storeWrap d-flex">
                                <span class="ad">廣告．</span>
                                <div class="storeLink">Yuans Flower</div>
                            </div>
                            <div class="priceProduct">
                                <div class="onsale">799</div>
                                <div class="originalPrice">NT$1141</div>
                            </div>

                            <div class="addition">
                                <p>可客製</p>
                            </div>
                        </div>


                    </div> -->
                    
                </div>

                <div class="pagebar">
                    <ul class="d-flex list-unstyled  justify-content-end">
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>...</li>
                        <li><svg width="14" height="14" viewBox="0 0 14 14"
                                class="m-react-pagination-icon-next icon--arrow-right"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 10.825L7.709 7 4 3.175 5.142 2 10 7l-4.858 5L4 10.825z"></path>
                            </svg></li>
                        <li>
                            前往頁面
                        </li>
                        <li><select name="" id="">
                                <option value="">1</option>
                            </select></li>
                    </ul>
                </div>
                <div class="noticeBar d-flex align-items-center justify-content-between">
                    <p>別錯過任何最新消息！開啟通知就可以獲得 Pinkoi 最新活動、設計館優惠相關專屬資訊</p>
                    <button>開啟通知</button>
                </div>
            </div>




        </div>





    </div>
    <div class="footer">
        <div class="footerbox ">
            <div class="footerContentWrap d-flex ">
                <div class="col">
                    <ul>
                        <p>購買</p>
                        <li>所有商品分類</li>
                        <li>品品學堂</li>
                        <li>找靈感</li>
                        <li>逛櫥窗</li>
                        <li>設計誌</li>
                        <li>Pinkoi 禮物卡</li>
                        <li>下載 APP</li>
                        <li>客人問與答</li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <p>販售</p>
                        <li>我想在 Pinkoi 上販售</li>
                        <li>設計館問與答</li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <p>幫助 / 政策</p>
                        <li>大宗採購</li>
                        <li>訊息公告</li>
                        <li>服務條款</li>
                        <li>退貨政策</li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <p>關於 Pinkoi</p>
                        <li>關於我們</li>
                        <li>媒體報導</li>
                        <li>工作機會</li>
                        <li>全新 Pinkoi</li>
                        <li>Pinkoi for BusinessNew</li>
                        <li>iichi.com</li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <p>追蹤 Pinkoi</p>
                        <li><span>
                                <svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.938 1.5c-2.292 0-2.58.01-3.48.05-.897.042-1.51.184-2.047.393a4.136 4.136 0 0 0-1.495.973c-.469.47-.757.94-.973 1.495-.209.536-.351 1.15-.392 2.048-.041.9-.051 1.187-.051 3.479 0 2.291.01 2.578.05 3.478.042.898.184 1.512.393 2.048.216.555.504 1.026.973 1.495.47.469.94.757 1.495.973.536.209 1.15.351 2.048.392.9.041 1.187.051 3.479.051 2.291 0 2.578-.01 3.478-.05.898-.042 1.512-.184 2.048-.393a4.136 4.136 0 0 0 1.495-.973c.469-.47.757-.94.973-1.495.209-.536.351-1.15.392-2.048.041-.9.051-1.187.051-3.478 0-2.292-.01-2.58-.05-3.48-.042-.897-.184-1.51-.393-2.047a4.136 4.136 0 0 0-.973-1.495c-.47-.469-.94-.757-1.495-.973-.536-.209-1.15-.351-2.048-.392-.9-.041-1.187-.051-3.478-.051zm0 1.52c2.252 0 2.52.009 3.409.05.823.037 1.27.174 1.567.29.394.153.675.336.97.631.295.295.478.576.631.97.116.298.253.744.29 1.567.041.89.05 1.157.05 3.41 0 2.252-.009 2.52-.05 3.409-.037.823-.174 1.27-.29 1.567a2.614 2.614 0 0 1-.631.97 2.614 2.614 0 0 1-.97.631c-.298.116-.744.253-1.567.29-.89.041-1.156.05-3.41.05-2.253 0-2.52-.009-3.409-.05-.823-.037-1.27-.174-1.567-.29a2.614 2.614 0 0 1-.97-.631 2.614 2.614 0 0 1-.631-.97c-.116-.298-.253-.744-.29-1.567-.041-.89-.05-1.157-.05-3.41 0-2.252.009-2.52.05-3.409.037-.823.174-1.27.29-1.567.153-.394.336-.675.631-.97.295-.295.576-.478.97-.631.298-.116.744-.253 1.567-.29.89-.041 1.157-.05 3.41-.05zm0 2.585a4.333 4.333 0 1 0 0 8.665 4.333 4.333 0 0 0 0-8.665zm0 7.145a2.812 2.812 0 1 1 0-5.625 2.812 2.812 0 0 1 0 5.625zm5.516-7.316a1.013 1.013 0 1 0-2.025 0 1.013 1.013 0 0 0 2.025 0z"
                                        fill="#39393e" class="color"></path>
                                </svg>
                            </span>Instagram</li>
                        <li><span><svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 8.776c0-3.874-4.038-7.026-9-7.026S1 4.902 1 8.776c0 3.473 3.202 6.383 7.527 6.933.293.06.692.186.793.427.09.219.06.561.029.782 0 0-.105.612-.129.742-.039.219-.18.856.78.467.96-.39 5.183-2.937 7.071-5.028C18.375 11.724 19 10.327 19 8.776zM4.415 10.884A.423.423 0 0 1 4 10.453V7.19c0-.238.212-.431.48-.431s.42.192.42.43v2.833h1.085c.23 0 .415.194.415.431 0 .238-.186.43-.415.43zm3.785-.431c0 .238-.202.43-.45.43a.441.441 0 0 1-.45-.43V7.19c0-.238.202-.431.45-.431s.45.193.45.43zm4.5 0c0 .186-.128.35-.32.409a.501.501 0 0 1-.523-.15l-1.82-2.278v2.019c0 .238-.21.43-.468.43-.259 0-.469-.192-.469-.43V7.19c0-.186.129-.35.32-.409a.484.484 0 0 1 .523.15l1.82 2.278v-2.02c0-.237.21-.43.469-.43.258 0 .468.193.468.43zm2.885-2.062c.23 0 .415.193.415.43 0 .238-.186.431-.415.431H14.43v.77h1.156c.229 0 .415.194.415.431 0 .238-.186.43-.415.43h-1.57a.424.424 0 0 1-.415-.43V7.19c0-.238.186-.431.415-.431h1.57c.23 0 .415.193.415.43 0 .238-.186.431-.415.431H14.43v.77z"
                                        fill="#39393e" class="color"></path>
                                </svg></span>LINE</li>
                        <li><span><svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.598 10.724h2.543l.38-2.934h-2.923V5.918c0-.85.238-1.428 1.464-1.428l1.563-.001V1.866a21.062 21.062 0 0 0-2.278-.116c-2.254 0-3.798 1.367-3.798 3.877V7.79H6v2.934h2.55v7.526h3.048z"
                                        fill="#39393e" class="color"></path>
                                </svg></span>
                            Facebook</li>
                        <li><span><svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.998 12.76V7.152l5.16 2.744zm11.558-6.74s-.19-1.371-.773-1.976c-.74-.792-1.568-.796-1.948-.843C14.114 3 10.032 3 10.032 3h-.008s-4.082 0-6.803.201c-.38.047-1.209.05-1.948.843C.69 4.65.5 6.02.5 6.02S.306 7.631.306 9.242v1.51c0 1.61.194 3.222.194 3.222s.19 1.371.773 1.975c.74.793 1.711.768 2.144.851 1.555.153 6.61.2 6.61.2s4.087-.006 6.808-.208c.38-.046 1.208-.05 1.948-.843.583-.604.773-1.975.773-1.975s.194-1.611.194-3.222v-1.51c0-1.611-.194-3.222-.194-3.222z"
                                        fill="#39393e" class="color"></path>
                                </svg></span>
                            Youtube</li>
                    </ul>
                </div>
            </div>
            <div class="ending d-flex align-items-center justify-content-between">
                <div class="endingLeft d-flex align-items-center">
                    <div class="logo"><img width="82px" height="24px" alt="Pinkoi Logo"
                            src="//cdn04.pinkoi.com/pinkoi.site/general/logo/pinkoi_logo_2019.svg"></div>
                    <div class="slogan">Design the way you are.</div>
                </div>
                <div class="endingRight d-flex align-items-center">
                    <div class="caution">食品業者登錄字號：A-153674659-00000-3<br>
                        © 2021 Pinkoi. All Rights Reserved.</div>
                    <div class="language"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path class="color" fill="#29242D"
                                    d="M14.6885 17.9102c.394-.716.715-1.583.94-2.561h1.931c-.676 1.118-1.675 2.015-2.871 2.561zm-8.248-2.561h1.931c.225.978.546 1.845.94 2.561-1.196-.546-2.195-1.443-2.871-2.561zm2.871-9.26c-.394.717-.715 1.584-.94 2.561h-1.931c.676-1.117 1.675-2.014 2.871-2.561zm2.689-.589c.67 0 1.573 1.182 2.089 3.15h-4.179c.516-1.968 1.419-3.15 2.09-3.15zm-6.5 6.5c0-.571.081-1.122.22-1.651h2.365c-.055.534-.085 1.084-.085 1.651 0 .566.03 1.117.085 1.65h-2.365c-.139-.528-.22-1.079-.22-1.65zm4.096 1.65c-.059-.519-.096-1.068-.096-1.65 0-.582.037-1.131.096-1.651h4.807c.059.52.097 1.069.097 1.651 0 .582-.038 1.131-.097 1.65h-4.807zm2.404 4.85c-.671 0-1.574-1.184-2.09-3.151h4.179c-.516 1.967-1.419 3.151-2.089 3.151zm6.5-6.5c0 .571-.082 1.122-.221 1.65h-2.365c.055-.533.086-1.084.086-1.65 0-.567-.031-1.117-.086-1.651h2.365c.139.529.221 1.08.221 1.651zm-.941-3.35h-1.931c-.225-.977-.546-1.844-.94-2.561 1.196.547 2.195 1.444 2.871 2.561zm-5.559-4.65c-4.418 0-8 3.582-8 8s3.582 8 8 8c4.417 0 8-3.582 8-8s-3.583-8-8-8z">
                                </path>
                            </svg></span>繁體中文</div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>