<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS Company Management</title>
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
            <h2 class="fw-bold text-primary">Companies</h2>
            <button class="btn btn-success mt-2 mt-md-0" id="addBtn" data-bs-toggle="modal"
                data-bs-target="#companyModal">
                <i class="bi bi-plus-circle me-2"></i>Add Company
            </button>
        </div>

        <!-- Search Box -->
        <div class="mb-4 d-flex justify-content-center">
            <div class="input-group shadow rounded-pill border border-primary" style="max-width: 450px; width:100%;">
                <span class="input-group-text bg-primary text-white border-0"><i class="bi bi-search"></i></span>
                <input type="text" id="searchInput" class="form-control border-0 rounded-pill"
                    placeholder="Search companies...">
            </div>
        </div>

        <!-- Company Table -->
        <div class="table-container table-responsive">
            <table class="table table-striped table-hover align-middle text-center mb-0">
                <thead class="table-light text-dark">
                    <tr>
                        <th>#</th>
                        <th class="text-start">Name</th>
                        <th class="text-start">Address</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="companyTableBody">
                    <tr data-id="1">
                        <td>1</td>
                        <td class="text-start">ABC Pharma</td>
                        <td class="text-start">123 Main St, City</td>
                        <td>+92 300 1234567</td>
                        <td><span class="badge rounded-pill bg-success badge-status"><i
                                    class="bi bi-check-circle me-1"></i>Active</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="2">
                        <td>2</td>
                        <td class="text-start">XYZ Labs</td>
                        <td class="text-start">45 Elm St, City</td>
                        <td>+92 301 7654321</td>
                        <td><span class="badge rounded-pill bg-danger badge-status"><i
                                    class="bi bi-x-circle me-1"></i>Inactive</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="3">
                        <td>3</td>
                        <td class="text-start">MediCare</td>
                        <td class="text-start">89 Oak Rd, City</td>
                        <td>+92 302 9876543</td>
                        <td><span class="badge rounded-pill bg-success badge-status"><i
                                    class="bi bi-check-circle me-1"></i>Active</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="4">
                        <td>4</td>
                        <td class="text-start">HealthPlus</td>
                        <td class="text-start">22 Maple St, City</td>
                        <td>+92 303 1239876</td>
                        <td><span class="badge rounded-pill bg-success badge-status"><i
                                    class="bi bi-check-circle me-1"></i>Active</span></td>
                        <td class="actions-cell">
                            <button class="btn btn-sm btn-primary editBtn" title="Edit"><i
                                    class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-danger deleteBtn" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr data-id="5">
                        <td>5</td>
                        <td class="text-start">GoodHealth</td>
                        <td class="text-start">11 Pine St, City</td>
                        <td>+92 304 7654321</td>
                        <td><span class="badge rounded-pill bg-success badge-status"><i
                                    class="bi bi-check-circle me-1"></i>Active</span></td>
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
    <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="companyModalLabel">Add Company</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="companyForm">
                        <input type="hidden" id="companyId">
                        <div class="mb-3">
                            <label>Company Name</label>
                            <input type="text" class="form-control" id="companyName"
                                placeholder="Enter company name">
                        </div>
                        <div class="mb-3">
                            <label>Address</label>
                            <input type="text" class="form-control" id="companyAddress"
                                placeholder="Enter company address">
                        </div>
                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" id="companyPhone"
                                placeholder="Enter phone number">
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select class="form-select" id="companyStatus">
                                <option>Active</option>
                                <option>Inactive</option>
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
                $('#companyModalLabel').text('Add Company');
                $('#companyForm')[0].reset();
                $('#companyId').val('');
            });

            // Open Edit Modal
            $(document).on('click', '.editBtn', function () {
                var row = $(this).closest('tr');
                $('#companyModalLabel').text('Edit Company');
                $('#companyId').val(row.data('id'));
                $('#companyName').val(row.find('td:eq(1)').text());
                $('#companyAddress').val(row.find('td:eq(2)').text());
                $('#companyPhone').val(row.find('td:eq(3)').text());
                $('#companyStatus').val(row.find('td:eq(4)').text());
                new bootstrap.Modal($('#companyModal')[0]).show();
            });

            // Search Filter
            $('#searchInput').on('input', function () {
                var val = $(this).val().toLowerCase();
                $('#companyTableBody tr').each(function () {
                    var name = $(this).find('td:eq(1)').text().toLowerCase();
                    var address = $(this).find('td:eq(2)').text().toLowerCase();
                    var phone = $(this).find('td:eq(3)').text().toLowerCase();
                    $(this).toggle(name.includes(val) || address.includes(val) || phone.includes(val));
                });
            });
        });
    </script>
</body>

</html>