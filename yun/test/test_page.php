<?php require __DIR__ . '/test-parts/connect_data.php';
$pageName = 'test_page';
$title = '陰德值測驗';



$perPage = 1; // 每一頁有幾筆

// 用戶要看第幾頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('Location: ?page=1');
    exit;
}

$t_sql = "SELECT COUNT(1) FROM good_deed_test";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage); // 總共有幾頁

$rows = [];

if ($totalRows > 0) {
    // 頁碼若超過總頁數
    if ($page > $totalPages) {
        header("Location: ?page=$totalPages");
        exit;
    }

    $sql = sprintf("SELECT * FROM good_deed_test ORDER BY sid ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}



?>
<?php include __DIR__ . '/test-parts/test-head.php' ?>
<?php include __DIR__ . '/test-parts/test-nav.php' ?>
<style>


</style>
<div class="container">


    <div class="row">
        <div class="col">
            <h4>陰德值小測驗</h4>
            <div class="card">
                <div class="card-body">
                    <?php foreach ($rows as $q) : ?>
                        <h5 class="card-title"> Q<?= $q['sid'] ?></h5>
                        <form name="form1" onsubmit="sendData();return false;" novalidate>
                            <label for="Q<?= $q['sid'] ?>" class="form-label">
                                <?= $q['test_content'] ?>
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q<?= $q['sid'] ?>" id="Q<?= $q['sid'] ?>-1" value="<?= $q['op1_score']  ?>">
                                <label class="form-check-label" for="Q<?= $q['sid'] ?>-1">
                                    <?= $q['op1_content'] ?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q<?= $q['sid'] ?>" id="Q<?= $q['sid'] ?>-2" value="<?= $q['op1_score']  ?>">
                                <label class="form-check-label" for="Q<?= $q['sid'] ?>-2">
                                    <?= $q['op2_content'] ?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Q<?= $q['sid'] ?>" id="Q<?= $q['sid'] ?>-3" value="<?= $q['op1_score']  ?>">
                                <label class="form-check-label" for="Q<?= $q['sid'] ?>-3">
                                    <?= $q['op3_content'] ?>
                                </label>
                            </div>

                            <p id="output"></p>

                        </form>

                    <?php endforeach; ?>
                </div>
            </div>
            <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">
                資料新增成功
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=1">
                            <!-- <i class="fa-solid fa-angles-left"></i> -->
                            Start
                        </a>
                    </li>
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                            <i class="fa-solid fa-angle-left"></i>
                        </a>
                    </li>
                    <?php for ($i = $page - 1; $i <= $page + 1; $i++) :
                        if ($i >= 1 and $i <= $totalPages) :
                    ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                    <?php endif;
                    endfor; ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $totalPages ?>">
                            <!-- <i class="fa-solid fa-angles-right"></i> -->
                            End
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</div>
<?php include __DIR__ . '/test-parts/test-scripts.php' ?>
<script>
    const q1_f = document.form1.Q1;
    const q1_btn = document.querySelectorAll('input[name="Q1"]');

    const q2_f = document.form1.Q2;
    const q2_btn = document.querySelectorAll('input[name="Q2"]');

    const q3_f = document.form1.Q3;
    const q3_btn = document.querySelectorAll('input[name="Q3"]');

    const q4_f = document.form1.Q4;
    const q4_btn = document.querySelectorAll('input[name="Q4"]');

    const q5_f = document.form1.Q5;
    const q5_btn = document.querySelectorAll('input[name="Q5"]');


    // const fields = [q1_f,q2_f,q3_f,q4_f,q5_f];



    async function sendData() {

        let isPass = false; // 預設是通過檢查的

        q1_f.addEventListener("click", () => {
            let selectValue;
            for (let answer of q1_btn) {
                if (answer.checked) {
                    selectValue = q1_btn.value;
                    isPass = true;
                    break;
                }
            }
        })
        q2_f.addEventListener("click", () => {
            let selectValue;
            for (let answer of q2_btn) {
                if (answer.checked) {
                    selectValue = q2_btn.value;
                    isPass = true;
                    break;
                }
            }
        })
        q3_f.addEventListener("click", () => {
            let selectValue;
            for (let answer of q3_btn) {
                if (answer.checked) {
                    selectValue = q3_btn.value;
                    isPass = true;
                    break;
                }
            }
        })
        q4_f.addEventListener("click", () => {
            let selectValue;
            for (let answer of q4_btn) {
                if (answer.checked) {
                    selectValue = q4_btn.value;
                    isPass = true;
                    break;
                }
            }
        })
        q5_f.addEventListener("click", () => {
            let selectValue;
            for (let answer of q5_btn) {
                if (answer.checked) {
                    selectValue = q5_btn.value;
                    isPass = true;
                    break;
                }
            }
        })

        if (!isPass) {
            return; // 結束函式
        }

        const fd = new FormData(document.form1);
        const r = await fetch('test-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);

    }
</script>
<?php include __DIR__ . '/test-parts/test-foot.php' ?>