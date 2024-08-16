<?php
include "../headers/header.php";
if ($_SESSION['role'] != 'Cashier') {
    header("location: ../");
}
?>
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-6 px-5">
            <h2 class="text-center">Products</h2>
            <div class="row mb-3 mt-3 ml-5 d-flex justify-content-center">
                <div class="col-1 p-0 d-inline align-self-center text-right">Qty :</div>
                <div class="col qty d-inline align-self-center">
                    <input type="number" id="quantity" class="form-control">
                </div>
                <div class="col-6 p-0 d-inline align-self-center">
                    <input type="number" id="barcode" class="form-control" placeholder="Enter Barcode here...">
                </div>
                <div class="col-autoalign-self-center">
                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            <div id="ShowProduct" class=" mt-5">
                <!-- <h5 class="text-center mt-5">Product Name</h5>
                <p class="text-center mt-3">Product Type</p>
                <p class="text-center mt-3">Product Price</p> -->
            </div>
        </div>

        <div class="col-6 pr-5">
            <h2 class="text-center">Cart</h2>
            <div class="border">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-10">Product</th>
                            <th class="col-2 text-center">Price</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items">
                        <!-- Cart items will be dynamically added here -->
                    </tbody>
                </table>
            </div>
            <div class="row-auto d-flex justify-content-center mt-2">
                <div class="col-auto ml-auto pr-0 d-inline align-self-center">
                    <h3>Total: </h3>
                </div>
                <div class="col-auto mr-auto qty d-inline align-self-center">
                    <h3 id="total_amount">0</h3>
                </div>
            </div>
            <div class="row-auto d-flex mt-2">
                <div class="col-auto p-0 d-inline align-self-center text-right">
                    <h4>Customer Name: </h4>
                </div>
                <div class="col cold-inline align-self-center">
                    <input type="text" id="customer_name" class="form-control">
                </div>
                <div class="col-auto p-0 d-inline align-self-center text-right">
                    <h4>Customer Cash: </h4>
                </div>
                <div class="col cold-inline align-self-center">
                    <input type="number" id="customer_cash" class="form-control">
                </div>
            </div>
            <div class="row-auto d-flex justify-content-center mt-5" id="checkout-btn">
                <button class="btn btn-primary checkout" onclick="checkout()">Checkout</button>
            </div>
        </div>


    </div>
</div>
<?php include "../footers/footer.php"; ?>

<style>
    .qty {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 12.5%;
        flex: 0 0 12.5%;
        max-width: 12.5%;
    }

    .border {
        height: 400px;
        overflow-y: scroll;
        border-top: 1px solid black;
    }

    .checkout {
        font-size: 1.5em;
        font-weight: bold;
    }

    #barcode {
        border-radius: 0.25rem 0 0 0.25rem;
    }

    #submit {
        border-radius: 0 0.25rem 0.25rem 0;
    }
</style>

<script>
    function addToCart(item_id, prod_name, selling_price, quantity) {
        var cartItems = document.getElementById('cart-items');
        var newRow = document.createElement('tr');
        var price = selling_price * quantity;
        newRow.setAttribute('data-product-id', item_id);
        newRow.innerHTML = `
                    <input class="item_id" type="hidden" value="${item_id}" />
                    <input class="quantity" type="hidden" value="${quantity}" />
                    <input class="amount" type="hidden" value="${price}" />
                    <td class="product-name col-10">${prod_name} x ${quantity}</td>
                    <td class="product-total ml-auto col-2 text-center">P${price}</td>
                `;
        cartItems.appendChild(newRow);
        var total_amount = document.getElementById('total_amount');
        total_amount.textContent = parseInt(total_amount.textContent) + price;
    }
    function checkout() {
        // Get all the product rows in the cart
        var productRows = document.querySelectorAll('#cart-items tr');

        if (productRows.length > 0) {
            var cartItems = [];

            // Loop through each product row and extract the necessary data
            productRows.forEach(function (row) {
                var item_id = parseInt(row.querySelector('.item_id').value);
                var quantity = parseInt(row.querySelector('.quantity').value);
                var amount = parseInt(row.querySelector('.amount').value);

                cartItems.push({
                    item_id: item_id,
                    quantity: quantity,
                    amount: amount,
                });
            });

            //Preparing to send data to server
            var customerName = document.getElementById('customer_name').value;
            var customerCash = document.getElementById('customer_cash').value;
            var cart = JSON.stringify(cartItems);
            $.ajax({
                url: '../pos/checkout.php',
                method: 'POST',
                data: { customer_name: customerName, products: cart },
                success: function (response) {
                    alert(response)
                },
                error: function () {
                    console.log('Error occurred while retrieving data.');
                }
            });

            // Perform the checkout process (you can customize this part based on your requirements)
            console.log(cartItems);
            alert('Checkout complete!');
            location.reload();
        } else {
            alert('Cart is empty!');
        }
    }
    $("#submit").on('click', function () {
        var barcode = $("#barcode").val();
        var quantity = $("#quantity").val();
        $.ajax({
            url: '../pos/product_show.php',
            method: 'POST',
            data: { search: barcode, qty: quantity },
            success: function (response) {
                $('#ShowProduct').html(response);
            },
            error: function () {
                console.log('Error occurred while retrieving data.');
            }
        });
        $.ajax({
            url: '../pos/get_product.php',
            method: 'POST',
            dataType: 'json',
            data: { search: barcode, qty: quantity },
            success: function (data) {
                if (data.error == "false") {
                    addToCart(data.item_id, data.prod_name, data.selling_price, quantity);
                }
            },
            error: function () {
                console.log('Error occurred while retrieving data.');
            }
        });
    });
</script>