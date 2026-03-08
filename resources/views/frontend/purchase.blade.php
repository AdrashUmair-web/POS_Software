<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS Purchase Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background: #f8f9fa;
        }

        .product-dropdown {
            position: absolute;
            z-index: 1050;
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            width: 250px;
        }

        .product-dropdown li {
            padding: 6px 10px;
            cursor: pointer;
        }

        .product-dropdown li.active,
        .product-dropdown li:hover {
            background-color: #0d6efd;
            color: #fff;
        }

        #purchase_table tbody tr {
            background-color: #ffffff !important;
        }

        #purchase_table input {
            height: 38px;
            font-size: 0.875rem;
            padding: 0.375rem 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
            text-align: right;
        }

        #purchase_table .product_name {
            text-align: left;
        }

        #purchase_table td,
        #purchase_table th {
            vertical-align: middle !important;
            text-align: center;
        }

        .card .form-control {
            border-radius: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <h2 class="mb-4 text-primary fw-bold">Purchase Entry</h2>

        <!-- Invoice Info -->
        <div class="row g-3 mb-4 align-items-stretch">
            <div class="col-md-3">
                <div class="card shadow-sm rounded-3 p-3 h-100 border-primary">
                    <label class="form-label fw-bold text-primary mb-2"><i class="bi bi-receipt me-2"></i>Invoice
                        No</label>
                    <input type="text" class="form-control form-control-sm border-primary shadow-sm" value="INV001">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm rounded-3 p-3 h-100 border-success">
                    <label class="form-label fw-bold text-success mb-2"><i
                            class="bi bi-building me-2"></i>Company</label>
                    <input type="text" class="form-control form-control-sm border-success shadow-sm"
                        placeholder="Company Name">
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm rounded-3 p-3 h-100 border-warning">
                    <label class="form-label fw-bold text-warning mb-2"><i class="bi bi-calendar-event me-2"></i>Date &
                        Time</label>
                    <input type="text" id="current_datetime"
                        class="form-control form-control-sm border-warning shadow-sm" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm rounded-3 p-3 h-100 border-info">
                    <label class="form-label fw-bold text-info mb-2"><i class="bi bi-person me-2"></i>Purchaser
                        Name</label>
                    <input type="text" class="form-control form-control-sm border-info shadow-sm"
                        placeholder="Purchaser Name">
                </div>
            </div>
        </div>
        <div class="mb-3 text-end">
            <button class="btn btn-primary fw-bold" id="add_row"><i class="bi bi-plus-circle me-2"></i>Add
                Product</button>
        </div>
        <!-- Products Table -->
        <div class="table-responsive shadow-sm rounded bg-white mb-4">
            <table class="table table-bordered table-hover align-middle mb-0" id="purchase_table">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Sr No</th>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Purchase Price</th>
                        <th>Discount</th>
                        <th>Net Amount</th>
                        <th>Sale Price</th>
                        <th>Margin %</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <!-- Totals & Clear Button -->
        <div class="row justify-content-end">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-lg rounded-3 p-4" style="background: linear-gradient(135deg,#e0f7fa,#ffffff);">
                    <h5 class="text-primary fw-bold mb-4 text-center"><i class="bi bi-receipt me-2"></i>Invoice Summary
                    </h5>
                    <div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded bg-white shadow-sm">
                        <div class="d-flex align-items-center"><i class="bi bi-bag-check me-2 text-info fs-5"></i><span
                                class="fw-semibold text-secondary">Total Purchase</span></div>
                        <span id="total_purchase" class="fw-bold text-dark fs-6">0.00</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded bg-white shadow-sm">
                        <div class="d-flex align-items-center"><i class="bi bi-percent me-2 text-warning fs-5"></i><span
                                class="fw-semibold text-secondary">Total Discount</span></div>
                        <span id="total_discount" class="fw-bold text-dark fs-6">0.00</span>
                    </div>
                    <div
                        class="d-flex justify-content-between align-items-center mb-4 p-3 rounded bg-success text-white shadow">
                        <div class="d-flex align-items-center"><i class="bi bi-cash-stack me-2 fs-5"></i><span
                                class="fw-semibold">Net Total</span></div>
                        <span id="net_total" class="fw-bold fs-5">0.00</span>
                    </div>
                    <button class="btn btn-danger w-100 fw-bold" id="clear_all"><i class="bi bi-trash me-2"></i>Clear
                        All</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            // Current DateTime
            const updateDateTime = () => {
                const now = new Date();
                let hours = now.getHours(),
                    minutes = now.getMinutes().toString().padStart(2, '0');
                const ampm = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12 || 12;
                $('#current_datetime').val(
                    `${now.getFullYear()}-${(now.getMonth()+1).toString().padStart(2,'0')}-${now.getDate().toString().padStart(2,'0')} ${hours}:${minutes} ${ampm}`
                    );
            };
            updateDateTime();
            setInterval(updateDateTime, 60000);

            // Products Data
            const products = [{
                    id: 1,
                    name: 'Paracetamol',
                    purchase: 50,
                    sale: 60
                },
                {
                    id: 2,
                    name: 'Aspirin',
                    purchase: 30,
                    sale: 40
                },
                {
                    id: 3,
                    name: 'Cough Syrup',
                    purchase: 120,
                    sale: 150
                },
                {
                    id: 4,
                    name: 'Vitamin C',
                    purchase: 80,
                    sale: 100
                },
                {
                    id: 5,
                    name: 'Amoxicillin',
                    purchase: 150,
                    sale: 180
                }
            ];

            let srNo = 1,
                $currentInput = null,
                activeIndex = -1;
            const $dropdown = $('<ul class="list-unstyled product-dropdown"></ul>').appendTo('body');

            function addRow() {
                $('#purchase_table tbody').append(`<tr data-sr="${srNo}">
            <td class="text-center">${srNo}</td>
            <td><input type="text" class="form-control form-control-sm product_name" placeholder="Type to search" autocomplete="off"></td>
            <td><input type="number" class="form-control form-control-sm qty text-end" value="1" min="1"></td>
            <td><input type="number" class="form-control form-control-sm purchase_price text-end"></td>
            <td><input type="number" class="form-control form-control-sm discount text-end" value="0"></td>
            <td><input type="number" class="form-control form-control-sm net_amount text-end" readonly></td>
            <td><input type="number" class="form-control form-control-sm sale_price text-end"></td>
            <td><input type="number" class="form-control form-control-sm margin text-end" readonly></td>
            <td class="text-center"><button class="btn btn-sm btn-outline-danger btn-clear"><i class="bi bi-trash"></i></button></td>
        </tr>`);
                srNo++;
            }

            $('#add_row').click(function() {
                addRow();
            });

            function calculateRow(row) {
                const qty = +row.find('.qty').val() || 0,
                    purchase = +row.find('.purchase_price').val() || 0,
                    discount = +row.find('.discount').val() || 0,
                    sale = +row.find('.sale_price').val() || 0;
                row.find('.net_amount').val(((purchase * qty) - discount).toFixed(2));
                row.find('.margin').val(purchase ? (((sale - purchase) / purchase) * 100).toFixed(2) : 0);
                calculateTotals();
            }

            function calculateTotals() {
                let totalPurchase = 0,
                    totalDiscount = 0,
                    netTotal = 0;
                $('#purchase_table tbody tr').each(function() {
                    const qty = +$(this).find('.qty').val() || 0,
                        purchase = +$(this).find('.purchase_price').val() || 0,
                        discount = +$(this).find('.discount').val() || 0,
                        net = (purchase * qty) - discount;
                    totalPurchase += purchase * qty;
                    totalDiscount += discount;
                    netTotal += net;
                });
                $('#total_purchase').text(totalPurchase.toFixed(2));
                $('#total_discount').text(totalDiscount.toFixed(2));
                $('#net_total').text(netTotal.toFixed(2));
            }

            addRow();

            // Product Search
            $(document).on('input', '.product_name', function() {
                const val = $(this).val().toLowerCase();
                $currentInput = $(this);
                $dropdown.empty().hide();
                activeIndex = -1;
                if (!val) return;
                products.filter(p => p.name.toLowerCase().includes(val)).forEach(p => {
                    $dropdown.append(
                        `<li data-id="${p.id}" data-purchase="${p.purchase}" data-sale="${p.sale}">${p.name}</li>`
                        );
                });
                if ($dropdown.children().length) {
                    const offset = $(this).offset();
                    $dropdown.css({
                        top: offset.top + $(this).outerHeight(),
                        left: offset.left,
                        width: $(this).outerWidth()
                    }).show();
                }
            });

            $(document).on('keydown', '.product_name', function(e) {
                const items = $dropdown.find('li');
                if (!items.length) return;
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    activeIndex = (activeIndex + 1) % items.length;
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    activeIndex = (activeIndex - 1 + items.length) % items.length;
                } else if (e.key === 'Enter') {
                    e.preventDefault();
                    if (activeIndex >= 0) items.eq(activeIndex).click();
                }
                items.removeClass('active').eq(activeIndex).addClass('active');
            });

            $dropdown.on('click', 'li', function() {
                const row = $currentInput.closest('tr');
                const selectedName = $(this).text().trim();
                let exists = false;
                $('#purchase_table tbody tr').each(function() {
                    const name = $(this).find('.product_name').val().trim();
                    if (name && name.toLowerCase() === selectedName.toLowerCase()) {
                        exists = true;
                        return false;
                    }
                });
                if (exists) {
                    alert('This product is already added!');
                    $currentInput.val('');
                    $dropdown.empty().hide();
                    return;
                }
                $currentInput.val(selectedName);
                row.find('.purchase_price').val($(this).data('purchase'));
                row.find('.sale_price').val($(this).data('sale'));
                calculateRow(row);
                $dropdown.empty().hide();
                addRow();
            });

            $(document).on('input', '.qty, .discount, .purchase_price, .sale_price', function() {
                calculateRow($(this).closest('tr'));
            });
            $(document).on('click', '.btn-clear', function() {
                $(this).closest('tr').remove();
                calculateTotals();
            });
            $('#clear_all').click(function() {
                $('#purchase_table tbody').empty();
                srNo = 1;
                addRow();
                calculateTotals();
            });
            $(document).click(e => {
                if (!$(e.target).hasClass('product_name')) $dropdown.hide();
            });

        });
    </script>
</body>

</html>
