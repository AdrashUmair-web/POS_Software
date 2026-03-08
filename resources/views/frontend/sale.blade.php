<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f6f7fb;
        }

        .product-card {
            cursor: pointer;
            transition: 0.2s;
        }

        .product-card:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        /* Hide number field arrows but allow keyboard arrows */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        /* Invoice scroll */
        .table-responsive {
            max-height: 420px;
            overflow-y: auto;
        }

        /* Highlight selected product */
        .product-card.selected {
            border: 2px solid #198754;
            box-shadow: 0 0 10px rgba(25, 135, 84, 0.35);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row vh-100">

            <!-- PRODUCTS -->
            <div class="col-lg-8 col-md-7 p-4 overflow-auto">
                <h4 class="mb-4 fw-bold">Products</h4>
                <div class="input-group mb-4 w-75 mx-auto">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" id="searchProduct" class="form-control form-control-lg"
                        placeholder="Search product...">
                </div>

                <div class="row g-3" id="productList">
                    <!-- 15 sample products -->
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="iphone">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="1"
                            data-name="Iphone 14" data-price="3000">
                            <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Iphone 14</h6>
                            <span class="badge bg-success mb-2">Stock: 20</span>
                            <h5 class="text-success">$3000</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="nike">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="2"
                            data-name="Nike Shoes" data-price="2000">
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Nike Shoes</h6>
                            <span class="badge bg-success mb-2">Stock: 40</span>
                            <h5 class="text-success">$2000</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="headphone">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="3"
                            data-name="Headphones" data-price="800">
                            <img src="https://images.unsplash.com/photo-1580894894513-541e068a3e2b?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Headphones</h6>
                            <span class="badge bg-success mb-2">Stock: 35</span>
                            <h5 class="text-success">$800</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="laptop">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="4"
                            data-name="Laptop" data-price="5000">
                            <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Laptop</h6>
                            <span class="badge bg-success mb-2">Stock: 10</span>
                            <h5 class="text-success">$5000</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="watch">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="5"
                            data-name="Smart Watch" data-price="450">
                            <img src="https://images.unsplash.com/photo-1603791440384-56cd371ee9a7?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Smart Watch</h6>
                            <span class="badge bg-success mb-2">Stock: 25</span>
                            <h5 class="text-success">$450</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="tablet">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="6"
                            data-name="Tablet" data-price="1200">
                            <img src="https://images.unsplash.com/photo-1580894908361-6c4b5bb81a77?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Tablet</h6>
                            <span class="badge bg-success mb-2">Stock: 18</span>
                            <h5 class="text-success">$1200</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="camera">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="7"
                            data-name="Camera" data-price="1500">
                            <img src="https://images.unsplash.com/photo-1519183071298-a2962ae0b2c7?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Camera</h6>
                            <span class="badge bg-success mb-2">Stock: 12</span>
                            <h5 class="text-success">$1500</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="speaker">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="8"
                            data-name="Bluetooth Speaker" data-price="350">
                            <img src="https://images.unsplash.com/photo-1591389722519-8e4a9e58f9fa?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Bluetooth Speaker</h6>
                            <span class="badge bg-success mb-2">Stock: 40</span>
                            <h5 class="text-success">$350</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="printer">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="9"
                            data-name="Printer" data-price="700">
                            <img src="https://images.unsplash.com/photo-1580894884513-541e068a3e2b?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Printer</h6>
                            <span class="badge bg-success mb-2">Stock: 15</span>
                            <h5 class="text-success">$700</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="keyboard">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="10"
                            data-name="Keyboard" data-price="100">
                            <img src="https://images.unsplash.com/photo-1610930835220-0806b0f332e4?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Keyboard</h6>
                            <span class="badge bg-success mb-2">Stock: 50</span>
                            <h5 class="text-success">$100</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="mouse">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="11"
                            data-name="Mouse" data-price="50">
                            <img src="https://images.unsplash.com/photo-1580894894513-541e068a3e2b?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Mouse</h6>
                            <span class="badge bg-success mb-2">Stock: 60</span>
                            <h5 class="text-success">$50</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="monitor">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="12"
                            data-name="Monitor" data-price="800">
                            <img src="https://images.unsplash.com/photo-1610930828912-3c45b0f1d5f2?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Monitor</h6>
                            <span class="badge bg-success mb-2">Stock: 20</span>
                            <h5 class="text-success">$800</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="router">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="13"
                            data-name="Router" data-price="120">
                            <img src="https://images.unsplash.com/photo-1610930825912-3c45b0f1d5f2?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Router</h6>
                            <span class="badge bg-success mb-2">Stock: 30</span>
                            <h5 class="text-success">$120</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="fan">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="14"
                            data-name="Ceiling Fan" data-price="180">
                            <img src="https://images.unsplash.com/photo-1610930824912-3c45b0f1d5f2?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Ceiling Fan</h6>
                            <span class="badge bg-success mb-2">Stock: 25</span>
                            <h5 class="text-success">$180</h5>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 product-item" data-name="lamp">
                        <div class="card text-center p-3 shadow-sm rounded-4 h-100 product-card" data-id="15"
                            data-name="Desk Lamp" data-price="70">
                            <img src="https://images.unsplash.com/photo-1610930823912-3c45b0f1d5f2?w=200"
                                class="card-img-top mb-2" style="height:120px;object-fit:contain;">
                            <h6 class="fw-semibold">Desk Lamp</h6>
                            <span class="badge bg-success mb-2">Stock: 40</span>
                            <h5 class="text-success">$70</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ORDER PANEL -->
            <div class="col-lg-4 col-md-5 p-3 bg-white border-start">

                <h4 class="mb-3 fw-bold sticky-top bg-white py-2">Invoice</h4>

                <div class="card shadow-sm mb-3">
                    <div class="card-body p-3">
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="small text-muted">Invoice #</label>
                                <input type="text" id="invoiceNo" class="form-control form-control-sm" readonly>
                            </div>
                            <div class="col-6">
                                <label class="small text-muted">Date & Time</label>
                                <input type="text" id="invoiceDateTime" class="form-control form-control-sm"
                                    readonly>
                            </div>
                            <div class="col-12">
                                <label class="small text-muted">Customer Name</label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Customer Name">
                            </div>
                            <div class="col-12">
                                <label class="small text-muted">Phone Number</label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Phone Number">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-sm table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th width="40">#</th>
                                <th class="text-start">Product</th>
                                <th width="60">Qty</th>
                                <th width="80">Price</th>
                                <th width="80">Disc%</th>
                                <th width="90">Total</th>
                                <th width="40"></th>
                            </tr>
                        </thead>
                        <tbody id="orderItems"></tbody>
                    </table>
                </div>

                <div class="border-top pt-2">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Total</span>
                        <span id="totalPrice">$0</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>Total Discount</span>
                        <span id="totalDisc">$0</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3 fw-bold fs-5">
                        <span>Final Total</span>
                        <span id="finalTotal">$0</span>
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-danger w-50 rounded-pill" id="clearCart"><i
                                class="bi bi-trash"></i> Clear</button>
                        <button class="btn btn-success w-50 rounded-pill fw-bold"><i class="bi bi-check-circle"></i>
                            Complete</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        let cart = {};

        function updateTotals() {
            let total = 0,
                totalDisc = 0;
            $.each(cart, (id, item) => {
                let qty = item.qty || 0;
                let price = item.price || 0;
                let discount = item.discount || 0;
                let subTotal = qty * price;
                let discAmount = subTotal * discount / 100;
                total += subTotal;
                totalDisc += discAmount;
            });
            let finalTotal = total - totalDisc;
            $("#totalPrice").text("$" + total);
            $("#totalDisc").text("$" + totalDisc.toFixed(0));
            $("#finalTotal").text("$" + finalTotal.toFixed(0));
        }

        function renderTable() {
            let $tbody = $("#orderItems");
            let sr = 1;
            $tbody.empty();

            if (Object.keys(cart).length === 0) {
                $tbody.html(`<tr><td colspan="7" class="text-muted text-center py-3">Cart is empty</td></tr>`);
                return;
            }

            $.each(cart, (id, item) => {
                let subTotal = item.qty * item.price;
                let discAmount = subTotal * item.discount / 100;
                let totalAmount = subTotal - discAmount;
                $tbody.append(`
<tr>
<td>${sr++}</td>
<td class="text-start">${item.name}</td>
<td><input type="number" min="0" class="form-control form-control-sm qty-input text-center" data-id="${id}" value="${item.qty}"></td>
<td>$${item.price}</td>
<td><input type="number" min="0" class="form-control form-control-sm disc-input text-center" data-id="${id}" value="${item.discount}"></td>
<td>$${totalAmount.toFixed(0)}</td>
<td><button class="btn btn-danger btn-sm remove-item" data-id="${id}"><i class="bi bi-x"></i></button></td>
</tr>
    `);
            });
        }

        // Highlight selected product and add to cart
        $(".product-card").click(function() {
            $(".product-card").removeClass("selected");
            $(this).addClass("selected");

            let id = $(this).data("id"),
                name = $(this).data("name"),
                price = $(this).data("price");
            cart[id] ? cart[id].qty++ : cart[id] = {
                name,
                price,
                qty: 1,
                discount: 0
            };
            renderTable();
            updateTotals();
        });

        // Qty input
        $(document).on("input", ".qty-input", function() {
            let id = $(this).data("id");
            let val = parseInt($(this).val());
            cart[id].qty = isNaN(val) ? 0 : val;
            $(this).val(cart[id].qty);
            updateTotals();
        });

        // Disc input
        $(document).on("input", ".disc-input", function() {
            let id = $(this).data("id");
            let val = parseFloat($(this).val());
            cart[id].discount = isNaN(val) ? 0 : val;
            $(this).val(cart[id].discount);
            updateTotals();
        });

        // Remove item
        $(document).on("click", ".remove-item", function() {
            delete cart[$(this).data("id")];
            renderTable();
            updateTotals();
        });

        // Clear cart
        $("#clearCart").click(function() {
            cart = {};
            renderTable();
            updateTotals();
        });

        // Search
        $("#searchProduct").on("keyup", function() {
            let value = $(this).val().toLowerCase();
            $(".product-item").each(function() {
                if ($(this).data("name").includes(value)) $(this).prependTo("#productList");
            });
        });

        // Invoice number & date
        function generateInvoice() {
            $("#invoiceNo").val(Math.floor(100000 + Math.random() * 900000));
        }

        function updateDateTime() {
            $("#invoiceDateTime").val(new Date().toLocaleString());
        }
        generateInvoice();
        updateDateTime();
        setInterval(updateDateTime, 1000);

        renderTable();
        updateTotals();
    </script>

</body>

</html>
