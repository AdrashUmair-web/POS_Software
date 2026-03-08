<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body {
            background: #f8f9fa;
            font-family: "Segoe UI", sans-serif;
        }

        .table-container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .table-hover tbody tr:hover {
            background: linear-gradient(90deg, #e0f7fa, #f1faff);
        }

        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #f9fafd;
        }

        .badge-status {
            font-size: 0.85em;
            padding: 0.45em 0.75em;
            border-radius: 50px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
        }

        .actions-cell .btn {
            margin: 0 2px;
            transition: all 0.2s;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .actions-cell .btn:hover {
            transform: scale(1.1);
        }

        .input-group .form-control:focus {
            box-shadow: 0 0 6px rgba(13, 110, 253, 0.3);
        }

        .modal-header {
            background: linear-gradient(90deg, #0d6efd, #0b5ed7);
            color: #fff;
            border-bottom: none;
        }

        .modal-content {
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body>
    <div class="container my-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
            <h2 class="fw-bold text-primary">Products</h2>
            <button class="btn btn-success mt-2 mt-md-0" id="addBtn" data-bs-toggle="modal"
                data-bs-target="#productModal">
                <i class="bi bi-plus-circle me-2"></i>Add Product
            </button>
        </div>

        <!-- Search Box -->
        <div class="mb-4 d-flex justify-content-center">
            <div class="input-group shadow rounded-pill border border-primary" style="max-width: 450px; width:100%;">
                <span class="input-group-text bg-primary text-white border-0"><i class="bi bi-search"></i></span>
                <input type="text" id="searchInput" class="form-control border-0 rounded-pill"
                    placeholder="Search products...">
            </div>
        </div>

        <!-- Product Table -->
        <div class="table-container table-responsive">
            <table class="table table-striped table-hover align-middle text-center mb-0">
                <thead class="table-light text-dark">
                    <tr>
                        <th>#</th>
                        <th class="text-start">Name</th>
                        <th class="text-start">Company</th>
                        <th>Qty</th>
                        <th>Purchase $</th>
                        <th>Sale $</th>
                        <th>Status</th>
                        <th>Allow Disc</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="productTableBody">
                    <tr data-id="1">
                        <td>1</td>
                        <td class="text-start">Paracetamol</td>
                        <td class="text-start">ABC Pharma</td>
                        <td>50</td>
                        <td>$50</td>
                        <td>$60</td>
                        <td><span class="badge rounded-pill bg-success badge-status"><i
                                    class="bi bi-check-circle me-1"></i>Active</span></td>
                        <td><span class="badge rounded-pill bg-info text-dark badge-status">Yes</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="2">
                        <td>2</td>
                        <td class="text-start">Aspirin</td>
                        <td class="text-start">XYZ Labs</td>
                        <td>30</td>
                        <td>$30</td>
                        <td>$40</td>
                        <td><span class="badge rounded-pill bg-danger badge-status"><i
                                    class="bi bi-x-circle me-1"></i>Inactive</span></td>
                        <td><span class="badge rounded-pill bg-secondary badge-status">No</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="3">
                        <td>3</td>
                        <td class="text-start">Ibuprofen</td>
                        <td class="text-start">MediCare</td>
                        <td>25</td>
                        <td>$20</td>
                        <td>$28</td>
                        <td><span class="badge rounded-pill bg-success badge-status"><i
                                    class="bi bi-check-circle me-1"></i>Active</span></td>
                        <td><span class="badge rounded-pill bg-info text-dark badge-status">Yes</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="4">
                        <td>4</td>
                        <td class="text-start">Vitamin C</td>
                        <td class="text-start">HealthPlus</td>
                        <td>100</td>
                        <td>$15</td>
                        <td>$25</td>
                        <td><span class="badge rounded-pill bg-success badge-status"><i
                                    class="bi bi-check-circle me-1"></i>Active</span></td>
                        <td><span class="badge rounded-pill bg-info text-dark badge-status">Yes</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="5">
                        <td>5</td>
                        <td class="text-start">Cough Syrup</td>
                        <td class="text-start">GoodHealth</td>
                        <td>40</td>
                        <td>$12</td>
                        <td>$18</td>
                        <td><span class="badge rounded-pill bg-success badge-status"><i
                                    class="bi bi-check-circle me-1"></i>Active</span></td>
                        <td><span class="badge rounded-pill bg-info text-dark badge-status">Yes</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="6">
                        <td>6</td>
                        <td class="text-start">Amoxicillin</td>
                        <td class="text-start">PharmaCare</td>
                        <td>60</td>
                        <td>$35</td>
                        <td>$45</td>
                        <td><span class="badge rounded-pill bg-success badge-status"><i
                                    class="bi bi-check-circle me-1"></i>Active</span></td>
                        <td><span class="badge rounded-pill bg-info text-dark badge-status">Yes</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="7">
                        <td>7</td>
                        <td class="text-start">Antacid</td>
                        <td class="text-start">DigestWell</td>
                        <td>80</td>
                        <td>$10</td>
                        <td>$15</td>
                        <td><span class="badge rounded-pill bg-danger badge-status"><i
                                    class="bi bi-x-circle me-1"></i>Inactive</span></td>
                        <td><span class="badge rounded-pill bg-secondary badge-status">No</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="8">
                        <td>8</td>
                        <td class="text-start">Paracetamol Extra</td>
                        <td class="text-start">ABC Pharma</td>
                        <td>70</td>
                        <td>$55</td>
                        <td>$65</td>
                        <td><span class="badge rounded-pill bg-success badge-status"><i
                                    class="bi bi-check-circle me-1"></i>Active</span></td>
                        <td><span class="badge rounded-pill bg-info text-dark badge-status">Yes</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="9">
                        <td>9</td>
                        <td class="text-start">Pain Relief Gel</td>
                        <td class="text-start">MediCare</td>
                        <td>35</td>
                        <td>$22</td>
                        <td>$30</td>
                        <td><span class="badge rounded-pill bg-success badge-status"><i
                                    class="bi bi-check-circle me-1"></i>Active</span></td>
                        <td><span class="badge rounded-pill bg-info text-dark badge-status">Yes</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="10">
                        <td>10</td>
                        <td class="text-start">Cold Relief</td>
                        <td class="text-start">GoodHealth</td>
                        <td>45</td>
                        <td>$18</td>
                        <td>$25</td>
                        <td><span class="badge rounded-pill bg-danger badge-status"><i
                                    class="bi bi-x-circle me-1"></i>Inactive</span></td>
                        <td><span class="badge rounded-pill bg-secondary badge-status">No</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Add Product</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm">
                        <input type="hidden" id="productId">
                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" class="form-control" id="productName"
                                placeholder="Enter product name">
                        </div>
                        <div class="mb-3">
                            <label>Company</label>
                            <input type="text" class="form-control" id="productCompany"
                                placeholder="Enter company name">
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <label>Qty</label>
                                <input type="number" class="form-control" id="productStock" placeholder="0">
                            </div>
                            <div class="col-6">
                                <label>Purchase $</label>
                                <input type="number" class="form-control" id="productPurchase" placeholder="0.00">
                            </div>
                        </div>
                        <div class="row g-3 mt-2">
                            <div class="col-6">
                                <label>Sale $</label>
                                <input type="number" class="form-control" id="productSale" placeholder="0.00">
                            </div>
                            <div class="col-6">
                                <label>Status</label>
                                <select class="form-select" id="productStatus">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label>Allow Disc</label>
                            <select class="form-select" id="productDiscount">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="saveBtn">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Open Add Modal
            $('#addBtn').click(function () {
                $('#productModalLabel').text('Add Product');
                $('#productForm')[0].reset();
                $('#productId').val('');
            });

            // Open Edit Modal
            $(document).on('click', '.editBtn', function () {
                var row = $(this).closest('tr');
                $('#productModalLabel').text('Edit Product');
                $('#productId').val(row.data('id'));
                $('#productName').val(row.find('td:eq(1)').text());
                $('#productCompany').val(row.find('td:eq(2)').text());
                $('#productStock').val(row.find('td:eq(3)').text());
                $('#productPurchase').val(row.find('td:eq(4)').text().replace('$', ''));
                $('#productSale').val(row.find('td:eq(5)').text().replace('$', ''));
                $('#productStatus').val(row.find('td:eq(6)').text());
                $('#productDiscount').val(row.find('td:eq(7)').text());
                new bootstrap.Modal($('#productModal')[0]).show();
            });

            // Search Filter
            $('#searchInput').on('input', function () {
                var val = $(this).val().toLowerCase();
                $('#productTableBody tr').each(function () {
                    var name = $(this).find('td:eq(1)').text().toLowerCase();
                    var company = $(this).find('td:eq(2)').text().toLowerCase();
                    $(this).toggle(name.includes(val) || company.includes(val));
                });
            });
        });
    </script>
</body>

</html>