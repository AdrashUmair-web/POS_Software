<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>POS Reports Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
body {
    background: #f4f6fb;
    font-family: "Segoe UI", sans-serif;
}

/* HEADER */
.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}
.dashboard-title {
    font-weight: 700;
    color: #2c3e50;
}

/* FILTER BOX */
.filter-box {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.06);
    margin-bottom: 35px;
}

/* SECTION */
.section-box {
    background: white;
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 40px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
}
.section-title {
    font-weight: 600;
    margin-bottom: 25px;
    font-size: 18px;
}

/* REPORT CARD */
.report-card {
    background: linear-gradient(145deg, #ffffff, #f8f9fc);
    border-radius: 12px;
    padding: 22px;
    text-align: center;
    border: none;
    transition: all 0.3s ease;
    box-shadow: 0 6px 16px rgba(0,0,0,0.06);
}
.report-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.12);
}
.report-icon {
    font-size: 28px;
    margin-bottom: 8px;
}
.report-card small {
    color: #6c757d;
    font-size: 14px;
}
.report-card h4 {
    font-weight: 700;
    margin-top: 6px;
    font-size: 22px;
}

/* COLORS */
.text-sale {color:#28a745;}
.text-warning {color:#f0ad4e;}
.text-info {color:#17a2b8;}
.text-primary {color:#0d6efd;}
.text-danger {color:#dc3545;}

/* TABLES */
.table-hover tbody tr:hover {
    background-color: #f1f3f6;
}
.table th {
    background-color: #f8f9fa;
    font-weight: 600;
}
.table td, .table th {
    vertical-align: middle;
    padding: 12px 15px;
}
.table {
    border-radius: 8px;
    overflow: hidden;
}
.badge-low {
    background: #dc3545;
    color: #fff;
}
.badge-ok {
    background: #28a745;
    color: #fff;
}

/* Responsive KPI cards */
@media (max-width: 767px) {
    .report-card h4 {font-size: 20px;}
    .report-icon {font-size: 24px;}
}
</style>
</head>

<body>
<div class="container my-5">

    <!-- HEADER -->
    <div class="dashboard-header">
        <h2 class="dashboard-title"><i class="bi bi-bar-chart-line"></i> POS Reports Dashboard</h2>
        <button class="btn btn-success"><i class="bi bi-download"></i> Export Report</button>
    </div>

    <!-- FILTER -->
    <div class="filter-box">
        <div class="row g-2 align-items-center">
            <div class="col-md-3">
                <label class="form-label small">Start Date</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label small">End Date</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-2 d-grid">
                <label class="form-label small invisible">btn</label>
                <button class="btn btn-primary"><i class="bi bi-funnel"></i> Filter</button>
            </div>
            <div class="col-md-2 d-grid">
                <label class="form-label small invisible">btn</label>
                <button class="btn btn-outline-secondary"><i class="bi bi-arrow-repeat"></i> Reset</button>
            </div>
        </div>
    </div>

    <!-- KPI SUMMARY ROW -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="report-card">
                <div class="report-icon text-sale"><i class="bi bi-currency-dollar"></i></div>
                <small>Total Sales</small>
                <h4 class="text-sale">$120,000</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="report-card">
                <div class="report-icon text-primary"><i class="bi bi-cart-check"></i></div>
                <small>Total Purchases</small>
                <h4>$75,000</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="report-card">
                <div class="report-icon text-warning"><i class="bi bi-graph-up"></i></div>
                <small>Gross Profit</small>
                <h4 class="text-warning">$45,000</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="report-card">
                <div class="report-icon text-danger"><i class="bi bi-box-seam"></i></div>
                <small>Stock Value</small>
                <h4>$210,000</h4>
            </div>
        </div>
    </div>

    <!-- SALES SECTION -->
    <div class="section-box">
        <h5 class="section-title text-success"><i class="bi bi-graph-up-arrow"></i> Sales Report</h5>
        <div class="row g-3">
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-sale"><i class="bi bi-currency-dollar"></i></div>
                    <small>Total Sales</small>
                    <h4 class="text-sale">$120,000</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-primary"><i class="bi bi-box-seam"></i></div>
                    <small>Items Sold</small>
                    <h4>4,250</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-warning"><i class="bi bi-percent"></i></div>
                    <small>Discount Given</small>
                    <h4 class="text-warning">$2,800</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-info"><i class="bi bi-receipt"></i></div>
                    <small>Tax Collected</small>
                    <h4 class="text-info">$6,300</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-primary"><i class="bi bi-wallet2"></i></div>
                    <small>Received Amount</small>
                    <h4 class="text-primary">$108,000</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-danger"><i class="bi bi-exclamation-circle"></i></div>
                    <small>Pending Payments</small>
                    <h4 class="text-danger">$12,000</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- PURCHASE SECTION -->
    <div class="section-box">
        <h5 class="section-title text-primary"><i class="bi bi-cart-check"></i> Purchase Report</h5>
        <div class="row g-3">
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-primary"><i class="bi bi-cash-stack"></i></div>
                    <small>Total Purchases</small>
                    <h4>$75,000</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-info"><i class="bi bi-box"></i></div>
                    <small>Items Purchased</small>
                    <h4>3,900</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-sale"><i class="bi bi-check-circle"></i></div>
                    <small>Paid to Suppliers</small>
                    <h4 class="text-sale">$60,000</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-danger"><i class="bi bi-clock-history"></i></div>
                    <small>Payable Amount</small>
                    <h4 class="text-danger">$15,000</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- PROFIT SECTION -->
    <div class="section-box">
        <h5 class="section-title"><i class="bi bi-cash-coin"></i> Profit & Loss Summary</h5>
        <div class="row g-3">
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-primary"><i class="bi bi-graph-up"></i></div>
                    <small>Total Revenue</small>
                    <h4>$120,000</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-warning"><i class="bi bi-bag"></i></div>
                    <small>Total Cost</small>
                    <h4>$75,000</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-sale"><i class="bi bi-trophy"></i></div>
                    <small>Gross Profit</small>
                    <h4 class="text-sale">$45,000</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="report-card">
                    <div class="report-icon text-primary"><i class="bi bi-graph-up-arrow"></i></div>
                    <small>Net Profit</small>
                    <h4 class="text-primary">$42,000</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- PAYMENT METHODS -->
    <div class="section-box">
        <h5 class="section-title"><i class="bi bi-credit-card"></i> Payment Methods</h5>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Method</th>
                    <th>Transactions</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Cash</td><td>320</td><td>$60,000</td></tr>
                <tr><td>Card</td><td>150</td><td>$45,000</td></tr>
                <tr><td>Bank Transfer</td><td>50</td><td>$15,000</td></tr>
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>