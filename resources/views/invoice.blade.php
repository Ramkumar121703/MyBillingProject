
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Tax Invoice</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
* { box-sizing: border-box; }

body {
    background: #edf1f7;
    font-family: Arial, sans-serif;
    color: #263449;
    font-size: 10px;
    margin: 0;
    padding: 15px;
}

.invoice {
    width: 100%;
    max-width: 800px;
    margin: auto;
    padding: 20px;
    background: white;
    border: 1px solid #ddd;
}

.shop-name {
    font-size: 21px;
    font-weight: 800;
    color: #173b70;
}

.tagline {
    color: #64748b;
    font-size: 9px;
}

.invoice-title {
    font-size: 23px;
    font-weight: 800;
    color: #173b70;
}

.invoice p { margin-bottom: 3px; }

.section-title {
    background: #173b70;
    color: white;
    padding: 5px 8px;
    font-weight: bold;
    font-size: 10px;
    margin-top: 8px;
}

.info-box {
    border: 1px solid #ddd;
    padding: 7px 9px;
}

.info-box p { margin-bottom: 3px; }

.invoice-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 7px;
}

.invoice-table th {
    background: #173b70;
    color: white;
    padding: 7px 4px;
    font-size: 9px;
    white-space: nowrap;
    text-align: center;
}

.invoice-table td {
    padding: 6px 4px;
    border: 1px solid #ddd;
    font-size: 9px;
    text-align: center;
    line-height: 1.2;
}

.invoice-table td:nth-child(2) { text-align: left; }

.invoice-table tbody tr:nth-child(even) {
    background: #f7f9fc;
}

.summary {
    width: 100%;
    margin-top: 5px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    padding: 5px 0;
    border-bottom: 1px solid #ddd;
    font-size: 10px;
}

.grand-total {
    background: #173b70;
    color: white;
    padding: 9px;
    font-size: 14px;
    font-weight: bold;
    margin-top: 6px;
}

.signature-area {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.signature {
    width: 170px;
    text-align: center;
    border-top: 1px solid #333;
    padding-top: 5px;
    margin-top: 25px;
}

.footer {
    text-align: center;
    border-top: 1px dashed #aaa;
    margin-top: 12px;
    padding-top: 8px;
}

.footer h5 {
    font-size: 12px;
    margin-bottom: 3px;
}

.actions {
    max-width: 800px;
    margin: 0 auto 12px;
    display: flex;
    justify-content: flex-end;
    gap: 8px;
}

@media(max-width: 600px) {
    .invoice { padding: 10px; }
    .table-wrapper { overflow-x: auto; }
    .invoice-table { min-width: 650px; }
    .shop-name { font-size: 16px; }
    .invoice-title { font-size: 19px; }
}

@media print {
    @page {
        size: A4 portrait;
        margin: 6mm;
    }

    html, body {
        width: 100%;
        margin: 0 !important;
        padding: 0 !important;
        background: white !important;
    }

    .actions, .no-print {
        display: none !important;
    }

    .invoice {
        width: 100%;
        max-width: none;
        margin: 0;
        padding: 0;
        border: none;
    }

    .section-title,
    .invoice-table th,
    .grand-total {
        background: #173b70 !important;
        color: white !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    .invoice-table tr,
    .info-box,
    .signature-area {
        break-inside: avoid;
        page-break-inside: avoid;
    }
}
</style>
</head>

<body>

@php
    $total = 0;
    $Totaldiscount = 0;
    $totalgst = 0;
@endphp

@foreach($grahak->products as $product)

    @php
        $subtotal = $product->product_price * $product->product_quantity;
        $discount = $product->product_discount ?? 0;
        $gst = $product->product_gst ?? 0;

        $taxableAmount = $subtotal - $discount;
        $gstAmount = ($taxableAmount * $gst) / 100;

        $total += $subtotal;
        $Totaldiscount += $discount;
        $totalgst += $gstAmount;
    @endphp

@endforeach

@php
    $grandTotal = $total - $Totaldiscount + $totalgst;
@endphp

<div class="actions no-print">


       <a href="{{route('all_customers')}} " class="btn btn-dark btn-sm ">Back</a>

    <button onclick="window.print()" class="btn btn-primary btn-sm">
        Print Invoice
    </button>

    <button onclick="downloadPDF()" class="btn btn-danger btn-sm">
        Download PDF
    </button>

</div>

<div class="invoice" id="invoice">

    <!-- SHOP DETAILS -->

    <div class="row align-items-center">

        <div class="col-7">

            <div class="shop-name">
                SMART MOBILE & ACCESSORIES
            </div>

            <div class="tagline">
                MOBILE PHONES | ACCESSORIES | ELECTRONICS
            </div>

            <p class="mt-2">
                Address: Sarswati Road Goverdhan,Mathura, Uttar Pradesh, India
            </p>

            <p>Phone: +91 7500021564</p>
            <p>Email: rahuljain98@gmail.com</p>
            <p>GSTIN: 09ABCDE1234F1Z5</p>

        </div>

        <div class="col-5 text-end">

            <div class="invoice-title">TAX INVOICE</div>

            <p>Invoice No: SME-{{ date('Y') }}-{{ $grahak->id }}</p>
            <p>Date: {{ date('d-m-Y') }}</p>
            <p>Time: {{ date('h:i A') }}</p>
            <p>Place of Supply: Uttar Pradesh</p>

        </div>

    </div>

    <hr class="my-2">

    <!-- CUSTOMER DETAILS -->

    <div class="section-title">CUSTOMER DETAILS</div>

    <div class="info-box">

        <div class="row">

            <div class="col-6">

                <p>
                    <strong>Name:</strong>
                    {{ $grahak->name }}
                </p>

                <p>
                    <strong>Customer ID:</strong>
                    CUST-{{ str_pad($grahak->id, 3, '0', STR_PAD_LEFT) }}
                </p>

            </div>

            <div class="col-6">

                <p>
                    <strong>Address:</strong>
                    {{ $grahak->address ?? 'N/A' }}
                </p>

                <p>
                    <strong>Mobile:</strong>
                    {{ $grahak->phone ?? 'N/A' }}
                </p>

            </div>

        </div>

    </div>

    <!-- PRODUCT DETAILS -->

    <div class="section-title">PRODUCT DETAILS</div>

    <div class="table-wrapper">

        <table class="invoice-table">

            <thead>

                <tr>
                    <th>Sr.</th>
                    <th>Product Name</th>
                    <th>Brand/Model</th>
                    <th>IMEI/Serial No.</th>
                    <th>HSN</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>GST</th>
                    <th>Amount</th>
                </tr>

            </thead>

            <tbody id="productRows">

                @forelse($grahak->products as $key => $product)

                    @php
                        $subtotal = $product->product_price * $product->product_quantity;
                        $discount = $product->product_discount ?? 0;
                        $gst = $product->product_gst ?? 0;

                        $taxableAmount = $subtotal - $discount;
                        $gstAmount = ($taxableAmount * $gst) / 100;
                        $amount = $taxableAmount + $gstAmount;
                    @endphp

                    <tr>

                        <td>{{ $key + 1 }}</td>

                        <td>
                            {{ $product->product_name }}
                        </td>

                        <td>
                            {{ $product->product_brand ?? '-' }}
                        </td>

                        <td>
                            {{ $product->product_imei ?? '-' }}
                        </td>

                        <td>
                            {{ $product->product_hsn ?? '-' }}
                        </td>

                        <td>
                            {{ $product->product_quantity }}
                        </td>

                        <td>
                            {{ number_format($product->product_price, 2) }}
                        </td>

                        <td>
                            {{ $gst }}%
                        </td>

                        <td>
                            {{ number_format($amount, 2) }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="9">No Products Found</td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- GST DETAILS AND SUMMARY -->

    <div class="row mt-2">

        <div class="col-6">

            <div class="section-title">GST DETAILS</div>

            <div class="info-box">

                <p>
                    <strong>Taxable Amount:</strong>
                    ₹{{ number_format($total - $Totaldiscount, 2) }}
                </p>

                <p>
                    <strong>CGST (50% of GST):</strong>
                    ₹{{ number_format($totalgst / 2, 2) }}
                </p>

                <p>
                    <strong>SGST (50% of GST):</strong>
                    ₹{{ number_format($totalgst / 2, 2) }}
                </p>

                <p class="mb-0">
                    <strong>Total GST:</strong>
                    ₹{{ number_format($totalgst, 2) }}
                </p>

            </div>

        </div>

        <div class="col-6">

            <div class="summary">

                <div class="summary-row">
                    <span>Subtotal</span>
                    <strong>
                        ₹{{ number_format($total, 2) }}
                    </strong>
                </div>

                <div class="summary-row">
                    <span>Discount</span>
                    <strong>
                        ₹{{ number_format($Totaldiscount, 2) }}
                    </strong>
                </div>

                <div class="summary-row">
                    <span>GST</span>
                    <strong>
                        ₹{{ number_format($totalgst, 2) }}
                    </strong>
                </div>

                <div class="grand-total">

                    <div class="d-flex justify-content-between">

                        <span>Grand Total</span>

                        <span>
                            ₹{{ number_format($grandTotal, 2) }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- PAYMENT DETAILS -->

    <div class="section-title">PAYMENT DETAILS</div>

    <div class="info-box">

        <div class="row">

            <div class="col-6">
                <p><strong>Payment Mode:</strong> N/A</p>
                <p class="mb-0"><strong>Transaction ID:</strong> N/A</p>
            </div>

            <div class="col-6">
                <p>
                    <strong>Paid Amount:</strong>
                    ₹0.00
                </p>

                <p class="mb-0">
                    <strong>Balance Due:</strong>
                    ₹{{ number_format($grandTotal, 2) }}
                </p>
            </div>

        </div>

    </div>

    <!-- TERMS -->

    <div class="section-title">TERMS & CONDITIONS</div>

    <div class="info-box">

        <p>1. Warranty as per manufacturer's policy.</p>
        <p>2. Original invoice required for warranty claims.</p>
        <p>3. Physical and water damage are not covered unless applicable warranty permits.</p>
        <p class="mb-0">4. Replacement subject to shop policy.</p>

    </div>

    <!-- SIGNATURE -->

    <div class="signature-area">

        <div>
            <div class="signature">
                Customer Signature
            </div>
        </div>

        <div>
            <div class="signature">
                Authorized Signature
            </div>

            <p class="text-center mt-1">
                Shop Stamp
            </p>
        </div>

    </div>

    <!-- FOOTER -->

    <div class="footer">

        <h5 class="fw-bold">
            THANK YOU FOR SHOPPING WITH US!
        </h5>

        <p>We appreciate your trust and support.</p>

        <small>Computer Generated Invoice</small>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
function downloadPDF() {

    const element = document.getElementById('invoice');

    const options = {
        margin: 6,
        filename: 'Invoice-{{ $grahak->id }}.pdf',

        image: {
            type: 'jpeg',
            quality: 0.98
        },

        html2canvas: {
            scale: 2,
            useCORS: true,
            scrollY: 0
        },

        jsPDF: {
            unit: 'mm',
            format: 'a4',
            orientation: 'portrait'
        },

        pagebreak: {
            mode: ['css', 'legacy']
        }
    };

    html2pdf()
        .set(options)
        .from(element)
        .save();
}
</script>

</body>
</html>
