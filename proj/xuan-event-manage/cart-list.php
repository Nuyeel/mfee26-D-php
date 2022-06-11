<?php
// session_start();
$pageName = 'cart';
$title = '購物車列表';
// require '/../parts/connect_db.php';

require __DIR__ .  '/../parts/connect_db.php' ;

// $pageName = 'cart';
// $title = '購物車列表';


// 葉宥廷
// $_SESSION['member']['sid'] = 11;
// // $_SESSION['member']['deathdate'] = '2022-06-06';
// $_SESSION['member']['account'] = 'HappyCat03';


$rows = [];
$sids = [];
if (!empty($_SESSION['cart'])) {

    $sids = array_keys($_SESSION['cart']);

    $sql = sprintf("SELECT * FROM( (`npo_act` JOIN `npo_act_type` ON `npo_act`.`type_sid` = `npo_act_type`.`typesid`) INNER JOIN `npo_name` ON `npo_act`.`npo_name` = `npo_name`.`npo_name`) INNER JOIN `city_type` ON `npo_act`.`place_city`= `city_type`.`city_sid`  WHERE sid IN (%s)" , implode(',', $sids));


    $stmt = $pdo->query($sql);

    while ($r = $stmt->fetch()) {
        $r['quantity'] = $_SESSION['cart'][$r['sid']];
        $rows[$r['sid']] = $r;
    }
}


?>
<?php include __DIR__ . '/../parts/html-head.php' ?>
<?php include __DIR__ . '/../parts/navbar-xuan.php' ?>

<div class="container mt-5" style="text-align:center">
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">活動圖</th>
                        <th scope="col">活動名稱</th>
                        <th scope="col">活動時間</th>
                        <th scope="col">活動地點</th>
                        <th scope="col">陰德值回饋</th>
                        <th scope="col">報名費</th>
                        <!-- <th scope="col">數量</th> -->
                        <!-- <th scope="col">小計</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($sids as $sid) :
                        $item = $rows[$sid];
                        $total += $item['price'] * $item['quantity'];
                    ?>
                    <tr data-sid="<?= $sid ?>">
                        <td><a href="#" onclick="removeItem(event); event.preventDefault()">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                        
                        <!-- 活動圖 -->
                        <td>
                        <!-- /mfee26-D-php/proj/xuan-npo-manage/npo-manage.php -->
                            <img src="/mfee26-D-php/proj/xuan-event-manage/list-img/<?= $item['img'] ?>" alt="" style="width:80px">
                        </td>
                        
                        <!-- 活動名稱 -->
                        <td><?= $item['act_title'] ?></td>

                        <!-- 活動時間 -->
                        <td><?= $item['start'] ?></td>
                        
                        <!-- 活動地點 -->
                        <td><?= $item['city'] ?></td>

                        <!-- 陰德值 -->
                        <td class="price-2" data-price-2="<?= $item['value'] ?>"></td>
                        
                        <!-- 活動報名費 -->
                        <td class="price" data-price="<?= $item['price'] ?>"></td>
                        
                        <!-- 陰德值數量 -->
                        <td style="display:none">
                            <select class="form-select form-select-sm quantity"
                                style="display:inline-block; width:auto">
                                <?php for ($i = 1; $i <= 20; $i++) : ?>
                                <option value="<?= $i ?>" <?= $item['quantity'] == $i ? 'selected' : '' ?>><?= $i ?>
                                </option>
                                <?php endfor; ?>
                            </select>
                        </td>

                        <!-- 活動數量 -->
                        <td style="display:none">
                            <select class="form-select form-select-sm quantity"
                                style="display:inline-block; width:auto">
                                <?php for ($i = 1; $i <= 20; $i++) : ?>
                                <option value="<?= $i ?>" <?= $item['quantity'] == $i ? 'selected' : '' ?>><?= $i ?>
                                </option>
                                <?php endfor; ?>
                            </select>
                        </td>

                        <!-- 金額小計 -->
                        <td class="sub-total" style="display:none"></td>
            
                        <!-- 陰德值小計 -->
                        <td class="sub-total-2" style="display:none"></td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>


        </div>
    </div>

    <!-- 報名費總計 -->
    <div class="row mt-5 " style="width:15%; text-align:left; margin-left:auto; padding:5px " >
        <div class="col">
            <div class="alert " role="alert" style="border-bottom:2px solid black;border-radius: 0px; padding:5px">
                <h3>總計</h3>
            </div>
            <div class="alert " role="alert" style="text-align:right; font-size:16px; padding:0px">
                <span>報名費總金額</span> &nbsp  <span id="total-price"></span>
            </div>
            <div class="alert mt-1" role="alert" style="text-align:right; font-size:16px ;padding:0px">
                <span>陰德值總回饋</span> &nbsp  <span id="total-price-2"></span>
            </div>

            <a class="btn btn-warning text-white mt-2" href="npo-list.php" role="button" style="margin-left:10px; margin-bottom:10px">繼續選購</a>
            <a class="btn btn-primary" id="zxCartBtn" href="#" role="button" style="margin-left:10px">前往結帳</a>


        </div>
    </div>


    <!-- 這邊是登入會員判斷 -->
    <!-- 登入會員後結帳 -->

    <div class="row mt-2" style="width:21%; margin-left:auto">
        <div class="col">

            <?php if (isset($_SESSION['member']['account'])) : ?> 

            <!-- <a class="btn btn-danger" href="#">前往結帳</a>   -->
                                
                <div class="alert alert-warning thanks" role="alert" style="display:none">
                    感謝您的購買！
                </div>

            <?php else : ?>

            <div class="alert alert-danger notice" role="alert" style="display:none">
                請登入會員後再結帳 
            </div> 


            <!-- <a href=<?= (isset($_SESSION['member']['account'])) ? "ab-logout.php" : "ab-login.php"?> class=<?= (isset($_SESSION['member']['account'])) ? "logInOut" : "logInOut"?>>
                <?= (isset($_SESSION['member']['account'])) ? "登出" : "登入|註冊"?>
                </a> -->


            <?php endif; ?>
        </div>
    </div>
</div>


<?php include __DIR__ . '/../parts/scripts.php' ?>

<script>

// 希望有登入會員按了結帳之後可以跳交易成功，但no work 
// function buyit() {
//         if (alert(`交易成功`)) {
//             location.href = `event-manage.php`;
//         }
//     }

// function login(){
//     <?php if (isset($_SESSION['member']['account'])) : ?>{
        
//     }<?php else : ?> {

//     }

// }

<?php endif; ?>





// 購物車JS
const dallorCommas = function(n) {
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
};

const calcPrices = () => {
    const trs = $('tbody > tr');

    let totalPrice = 0;
    trs.each(function() {
        const tr = $(this);
        const price = +tr.find('.price').attr('data-price');
        tr.find('.price').text('$ ' + dallorCommas(price)); // 顯示單價
        const quantity = +tr.find('select').val();
        tr.find('.sub-total').text('$ ' + dallorCommas(price * quantity)); // 顯示小計
        totalPrice += price * quantity;
    });

    $('#total-price').text('$ ' + dallorCommas(totalPrice));

    let totalPrice2 = 0;
    trs.each(function() {
        const tr = $(this);
        const price2 = +tr.find('.price-2').attr('data-price-2');
        tr.find('.price-2').text('$ ' + dallorCommas(price2)); // 顯示單價
        const quantity = +tr.find('select').val();
        tr.find('.sub-total-2').text('$ ' + dallorCommas(price2 * quantity)); // 顯示小計
        totalPrice2 += (price2) * quantity;
    });

    $('#total-price-2').text('$ ' + dallorCommas(totalPrice2));

};
calcPrices();

$('.quantity').on('change', function() {
    const me = $(this);
    // console.log('me:', me);
    const quantity = me.val();
    const sid = me.closest('tr').attr('data-sid');

    // console.log('tr:', me.find('tr'));

    $.get('cart-api.php', {
        sid,
        quantity
    }, function(data) {
        console.log(data);
        showCount(data);
        calcPrices(); // 重算所有價格
    }, 'json');

});

const removeItem = event => {

    const me = $(event.currentTarget);
    const sid = me.closest('tr').attr('data-sid');
    $.get('cart-api.php', {
        sid
    }, function(data) {
        console.log(data);
        me.closest('tr').remove();
        showCount(data);
        calcPrices(); // 重算所有價格
    }, 'json');

}

// coolpillow's part starts here.

const zxCartBtn = document.querySelector('#zxCartBtn');

const zxActCart = async () => {
    const fetchUrl = 'cart-order.php';
    const r = await fetch(fetchUrl);
    
    const result = await r.json();
    console.log(result);
}

zxCartBtn.addEventListener('click', zxActCart, false);

// coolpillow's part ends.

</script>
<?php include __DIR__ . '/../parts/html-foot.php' ?>