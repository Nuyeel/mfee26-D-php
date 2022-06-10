<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script> -->
<script>
const tryCountJson = <?= json_encode($_SESSION['cart'], JSON_UNESCAPED_UNICODE); ?>;
const cartcountAmount = Object.keys(tryCountJson).length;
const cartAmount = document.querySelector('#cart_amount');
cartAmount.innerText=cartcountAmount;

// if (cartcountAmount > 0) {
//     const body = 
// }
</script>