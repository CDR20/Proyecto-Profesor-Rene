$(document).ready(() => {
    window.scrollTo(0, 0);

    const cart = $('#cart');
    const cartContent = $('#cart-list tbody');
    const productsList = $('#products-list');
    const emptyCartButton = $('#empty-cart');
    const totalCartItems = document.querySelector('#badge-cart-desktop');
    const cartTotal = document.querySelector('#cart-total');
    const goToPaymentButton = document.querySelector('#go-to-payment');
    let productsInCart = [];

    refreshCart();
    events();
    Alerts();

    function events() {
        productsList.click(addToCart);
        cartContent.click(deleteFromCart);
        emptyCartButton.click(emptyCart);
        goToPaymentButton.addEventListener('click', goToPayment);
    }

    function Alerts() {
        const alertError = $(".alert-error");
        const alertMessage = $(".alert-message");

        setTimeout(() => {
            alertError.hide("slide", { direction: "left" }, 400);
        }, 3500);
        setTimeout(() => {
            alertMessage.hide("slide", { direction: "left" }, 400);
        }, 3500);
    }

    function goToPayment(e){

        e.preventDefault();

        const form = document.querySelector('#payment-form');

        productsInCart.map( product => {
            const input = document.createElement('input');
            input.setAttribute('value', product.id);
            input.setAttribute('name', 'products[]');
            form.appendChild(input);

            return product;
        });

        form.submit();
    }

    function refreshCart() {
        checkLocalStorage();

        cartContent.empty();

        totalCartItems.innerHTML = productsInCart.length;

        let totalcost = 0;
        productsInCart.forEach( product => {
            totalcost += (product.price * product.quantity);
        });

        cartTotal.innerHTML = `Total: $${totalcost.toFixed(2) }`;

        productsInCart.forEach(product => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td class="text-start p-2">
                    <img src="${product.img}" width="35px" height="35px">
                    <p class="p-1 d-inline-block mb-0">
                        ${(product.name.length >= 15) ? (product.name).slice(0, 15) + '...' : product.name}
                    </p>
                    <p class="d-none text-secondary fs-6 code">${product.code}</p>
                </td>
                <td>
                    ${product.quantity}
                </td>
                <td>
                    $${product.quantity * parseInt(product.price)}
                </td>
                <td>
                    <button class="btn btn-danger delete-item-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-x-octagon-fill disabled" viewBox="0 0 16 16">
                            <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                        </svg>
                    </button>
                </td>
            `;
            cartContent.append(row);
        });
    }

    function emptyCart(e){
        e.preventDefault();

        productsInCart = [];
        localStorage.setItem('products', JSON.stringify(productsInCart));
        refreshCart();
    }


    function checkLocalStorage() {
        if (localStorage.getItem('products')) {
            productsInCart = JSON.parse(localStorage.getItem('products'));
        } else {
            localStorage.setItem('products', JSON.stringify(productsInCart));
        }
    }

    function addToCart(e) {
        e.preventDefault();

        if (e.target.classList.contains('agregar-carrito')) {
            const selectedProduct = e.target.parentElement.parentElement;
            saveProductData(selectedProduct);
        }

    }

    function saveProductData(selectedProduct) {

        const product = {
            'id': selectedProduct.querySelector('.id').textContent,
            'img': selectedProduct.querySelector('img').src,
            'name': selectedProduct.querySelector('.name').textContent,
            'code': selectedProduct.querySelector('.code').textContent,
            'price': selectedProduct.querySelector('.price').textContent.replace('$', '').trim(),
            'stock': selectedProduct.querySelector('.stock').textContent.replace('existente(s)', '').trimEnd(),
            'quantity': 1,
        }

        const exist = productsInCart.some( p => p.id === product.id );

        if(exist){
            const products = productsInCart.map( p => {
                if(p.id === product.id){
                    p.quantity++;
                    return p;
                }else{
                    return p;
                }

            })

            productsInCart = [...products]
        }else{
            productsInCart.push(product);
        }

        localStorage.setItem('products', JSON.stringify(productsInCart));
        refreshCart();
    }

    function deleteFromCart(e) {
        e.preventDefault();

        if (e.target.classList.contains('delete-item-button')) {
            const selectedProduct = e.target.parentElement.parentElement;
            deleteProductData(selectedProduct);
        }
    }

    function deleteProductData(selectedProduct) {

        productCode = selectedProduct.querySelector('td .code').textContent;

        productsInCart = productsInCart.filter(product => product.code !== productCode);

        localStorage.setItem('products', JSON.stringify(productsInCart));
        refreshCart();
    }
});

