<?php require __DIR__ . '/test-parts/connect_data.php';
$pageName = 'testpage';
$title = '陰德值測驗後台';

$perPage = 20; // 每一頁有幾筆

// 用戶要看第幾頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
  header('Location: ?page=1');
  exit;
}

$t_sql = "SELECT COUNT(1) FROM good_deed_test_record";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; // 總筆數

$totalPages = ceil($totalRows / $perPage); // 總共有幾頁

$rows = [];

if ($totalRows > 0) {
  // 頁碼若超過總頁數
  if ($page > $totalPages) {
    header("Location: ?page=$totalPages");
    exit;
  }

  $sql = sprintf("SELECT * FROM good_deed_test_record ORDER BY sid ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
  $rows = $pdo->query($sql)->fetchAll();
}

?>
<?php include __DIR__ . '/test-parts/test-head.php' ?>
<?php //include __DIR__ . '/parts/navbar.php' 
?>

<div class="container">
  <div class="row">
    <div class="col">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=1">
              <i class="fa-solid fa-angles-left"></i>
            </a>
          </li>
          <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $page - 1 ?>">
              <i class="fa-solid fa-angle-left"></i>
            </a>
          </li>
          <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
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
              <i class="fa-solid fa-angles-right"></i>
            </a>
          </li>
        </ul>
      </nav>

    </div>
  </div>


  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
        <th scope="col">會員編號</th>
        <th scope="col">會員帳號</th>

        <th scope="col">會員姓名</th>
        <th scope="col">出生日期</th>
        <th scope="col">死亡日期</th>
        <th scope="col">Q1</th>
        <th scope="col">Q2</th>
        <th scope="col">Q3</th>
        <th scope="col">Q4</th>
        <th scope="col">Q5</th>
        <th scope="col">總分</th>



        <th scope="col"><i class="fa-solid fa-pen-to-square"></i></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $r) : ?>
        <tr>
          <td>
            <a href="javascript: delete_it(<?= $r['sid'] ?>)">
              <i class="fa-solid fa-trash-can"></i>
            </a>
          </td>
          <td><?= $r['member_sid'] ?></td>
          <td><?= htmlentities($r['member_account']) ?></td>
          <td><?= htmlentities($r['member_name']) ?></td>
          <td><?= $r['member_birth'] ?></td>
          <td><?= $r['member_death'] ?></td>
          <td><?= $r['test_Q1'] ?></td>
          <td><?= $r['test_Q2'] ?></td>
          <td><?= $r['test_Q3'] ?></td>
          <td><?= $r['test_Q4'] ?></td>
          <td><?= $r['test_Q5'] ?></td>
          <td><?= $r['test_score'] ?></td>

          <td>
            <a href="test-edit.php?sid=<?= $r['sid'] ?>">
              <i class="fa-solid fa-pen-to-square"></i>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>


</div>



<?php include __DIR__ . '/test-parts/test-scripts.php' ?>
<script>
  function delete_it(member_sid) {
    if (confirm(`確定要刪除編號為 ${member_sid} 的資料嗎?`)) {
      location.href = `test-delete.php?sid=${member_sid}`;
    }
  }
</script>
<?php include __DIR__ . '/test-parts/test-foot.php' ?>