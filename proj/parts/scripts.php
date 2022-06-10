<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script> -->

<style>
    .zx-cart-parent {
        position: relative;
    }

    .zx-cart-amount-area {
        width: 16px;
        height: 16px;
        background-color: #f00;
        color: #fff;
        line-height: 16px;
        text-align: center;
        position: absolute;
        top: -8px;
        right: -8px;
        font-size: 8px;
        border-radius: 50%;
    }

</style>

<script>

const zxCartParent = document.querySelector('.zx-cart-parent');
const zxCartAmount = document.createElement('div');
zxCartParent.appendChild(zxCartAmount);    

let zxCartActNum;

const countActCart = async () => {
    const r = await fetch('/mfee26-D-php/proj/count-cart.php');
    const result = await r.json(); 
    console.log(result);
    if (result == 0) {
        zxCartActNum = 0;    
    } else {
        zxCartActNum = result;
    }
    console.log(zxCartActNum);
    // console.log(typeof zxCartActNum);
}

const renderActCart = async() => {
    await countActCart();
    let amountActCart = zxCartActNum;
    console.log(amountActCart);

    if (amountActCart === 0) {
        if (zxCartAmount.classList.contains('zx-cart-amount-area')) {
            zxCartAmount.classList.remove('zx-cart-amount-area');
        }
        zxCartAmount.innerText = '';
        // Do nothing
    } else if (amountActCart < 10) {
        if (!zxCartAmount.classList.contains('zx-cart-amount-area')) {
            zxCartAmount.classList.add('zx-cart-amount-area');
        }
        zxCartAmount.innerText = amountActCart;
        
        // for text
        // zxCartAmount.innerText = '9+';
        
        zxCartParent.appendChild(zxCartAmount);    
    } else {
        if (!zxCartAmount.classList.contains('zx-cart-amount-area')) {
            zxCartAmount.classList.add('zx-cart-amount-area');
        }
        zxCartAmount.innerText = '9+';
    }
}

renderActCart();

</script>