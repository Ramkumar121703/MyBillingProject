
<x-header/>

<style>
    body {
        background: #f4f6fa;
        font-family: 'Segoe UI', sans-serif;
        font-size: 13px;
        color: #334155;
    }

    .billing-container {
        padding: 25px;
    }

    .page-heading {
        font-size: 21px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 4px;
    }

    .page-subtitle {
        color: #94a3b8;
        font-size: 12px;
    }

    .customer-card {
        background: #fff;
        border: 1px solid #e9edf3;
        border-radius: 13px;
        margin-bottom: 25px;
        overflow: hidden;
        box-shadow: 0 3px 15px rgba(0,0,0,.035);
    }

    .customer-header {
        padding: 17px 20px;
        background: linear-gradient(110deg, #f8faff, #fff);
        border-bottom: 1px solid #edf0f5;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .customer-avatar {
        height: 42px;
        width: 42px;
        border-radius: 11px;
        background: #eaf0ff;
        color: #315bd6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        font-weight: 700;
    }

    .customer-name {
        font-size: 15px;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }

    .customer-id {
        color: #94a3b8;
        font-size: 11px;
    }

    .product-count {
        margin-left: auto;
        background: #edf3ff;
        color: #315bd6;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .table-wrapper {
        padding: 0 18px;
        overflow-x: auto;
    }

    .billing-table {
        width: 100%;
        min-width: 650px;
        border-collapse: collapse;
    }

    .billing-table thead th {
        background: #f8fafc;
        color: #64748b;
        font-size: 11px;
        font-weight: 650;
        text-transform: uppercase;
        padding: 14px 12px;
        white-space: nowrap;
        border-bottom: 1px solid #edf0f5;
    }

    .billing-table tbody td {
        padding: 13px 12px;
        font-size: 12px;
        border-bottom: 1px solid #f0f2f6;
        vertical-align: middle;
    }

    .billing-table tbody tr:hover {
        background: #fafbff;
    }

    .product-name {
        font-weight: 600;
        color: #263449;
    }

    .gst-badge {
        background: #eaf5ff;
        color: #1680c5;
        padding: 5px 9px;
        border-radius: 5px;
        font-size: 11px;
        font-weight: 600;
    }

    .edit-btn {
        background: #edf3ff;
        color: #315bd6;
        border: 0;
        padding: 6px 11px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 600;
        text-decoration: none;
    }

    .edit-btn:hover {
        background: #315bd6;
        color: #fff;
    }

    .delete-btn {
        background: #fff0f0;
        color: #dc4545;
        border: 0;
        padding: 6px 11px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 600;
    }

    .delete-btn:hover {
        background: #dc4545;
        color: #fff;
    }

    .summary-area {
        padding: 18px;
        background: #fcfdff;
    }

    .summary-box {
        background: #fff;
        border: 1px solid #edf0f5;
        border-radius: 10px;
        padding: 15px;
        height: 100%;
    }

    .summary-label {
        font-size: 11px;
        color: #8491a5;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .3px;
    }

    .summary-value {
        font-size: 18px;
        font-weight: 700;
        color: #263449;
        margin-top: 7px;
        margin-bottom: 0;
    }

    .discount-value {
        color: #e05252;
    }




    .grand-total-box {
        background: #edf3ff;
        border: 1px solid #dce7ff;
    }

    .grand-total-box .summary-label,
    .grand-total-box .summary-value {
        color: #2856bd;
    }




    .add-customer-btn {
        background: #315bd6;
        color: white;
        padding: 9px 17px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
    }

    .add-customer-btn:hover {
        background: #2348b4;
        color: white;
    }

    @media(max-width: 576px) {
        .billing-container {
            padding: 13px;
        }

        .page-heading {
            font-size: 18px;
        }

        .customer-header {
            padding: 13px;
        }

        .summary-area {
            padding: 12px;
        }

        .summary-box {
            padding: 11px;
        }

        .summary-value {
            font-size: 15px;
        }
    }
</style>


<div class="billing-container">

    <!-- Page Header -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="page-heading">Customer Billing</h2>
            <p class="page-subtitle mb-0">
                Manage customer products and billing details
            </p>
        </div>

        <a href="{{ route('add_customer') }}"
           class="add-customer-btn">
            + Add Customer
        </a>


    </div>



    <!-- Success Message -->

    @if (session()->has('success'))

        <div class="alert alert-success alert-dismissible fade show">
            {{ session()->get('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>

    @endif


    <!-- Customer Loop -->

    @foreach ($grahaks as $grahak)
    <div class="d-flex ">
      <a href="{{ route('invoice', $grahak->id) }}"
   class="btn btn-primary btn-sm">
    View Invoice
</a>
  <form action="{{route('deletecustomer',$grahak->id)}}" method="POST" class="d" >
                @csrf
                    <button type="submit" class="btn btn-danger btn-sm ">
                    Delete Customer
                    </button>
            </form>
</div>
        @php
            $total = 0;
            $Totaldiscount = 0;
            $totalgst = 0;
        @endphp


        <div class="customer-card" id="customer-{{ $grahak->id }}">


            <!-- Customer Header -->

            <div class="customer-header">

                <div class="customer-avatar">
                    {{ strtoupper(substr($grahak->name, 0, 1)) }}
                </div>

                <div>
                    <h5 class="customer-name">
                        {{ $grahak->name }}
                    </h5>

                    <span class="customer-id">
                        Customer ID: #{{ $grahak->id }}
                    </span>
                </div>

                <span class="product-count">
                    {{ $grahak->products->count() }} Products

                </span>

            </div>


            <!-- Product Table -->

            <div class="table-wrapper">

                <table class="billing-table">

                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>GST</th>
                            <th>Discount</th>
                            <th>Subtotal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($grahak->products as $product)

                            @php
                                $subtotal = $product->product_price *
                                            $product->product_quantity;

                                $discount = $product->product_discount ?? 0;
                                $gst = $product->product_gst ?? 0;

                                $total += $subtotal;
                                $Totaldiscount += $discount;

                                $taxableAmount = $subtotal - $discount;

                                $totalgst += ($taxableAmount * $gst) / 100;
                            @endphp


                            <tr>

                                <td class="product-name">
                                    {{ $product->product_name }}
                                </td>

                                <td>
                                    ₹{{ number_format($product->product_price, 2) }}
                                </td>

                                <td>
                                    {{ $product->product_quantity }}
                                </td>

                                <td>
                                    <span class="gst-badge">
                                        {{ $gst }}%
                                    </span>
                                </td>

                                <td class="text-danger">
                                    ₹{{ number_format($discount, 2) }}
                                </td>

                                <td class="fw-semibold">
                                    ₹{{ number_format($subtotal, 2) }}
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        <a href="{{ route('edit', $product->id) }}"
                                           class="edit-btn">
                                            Edit
                                        </a>

                                        <form action="{{ route('delete', $product->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this product?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="delete-btn">
                                                Delete
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>


                            <tr>


                            </tr>


                        @endforeach

                    </tbody>

                </table>

            </div>


            <!-- Customer Calculation -->

            @php
                $grandTotal = $total - $Totaldiscount + $totalgst;
            @endphp


            <!-- Summary Cards -->

            <div class="summary-area">

                <div class="row g-3">

                    <div class="col-md-3 col-6">
                        <div class="summary-box">

                            <div class="summary-label">
                                Total Amount
                            </div>

                            <h4 class="summary-value">
                                ₹{{ number_format($total, 2) }}
                            </h4>

                        </div>
                    </div>


                    <div class="col-md-3 col-6">
                        <div class="summary-box">

                            <div class="summary-label">
                                Total Discount
                            </div>

                            <h4 class="summary-value discount-value">
                                ₹{{ number_format($Totaldiscount, 2) }}
                            </h4>

                        </div>
                    </div>


                    <div class="col-md-3 col-6">
                        <div class="summary-box">

                            <div class="summary-label">
                                GST Amount
                            </div>

                            <h4 class="summary-value gst-value">
                                ₹{{ number_format($totalgst, 2) }}
                            </h4>

                        </div>
                    </div>


                    <div class="col-md-3 col-6">
                        <div class="summary-box grand-total-box">

                            <div class="summary-label">
                                Grand Total
                            </div>

                            <h4 class="summary-value">
                                ₹{{ number_format($grandTotal, 2) }}
                            </h4>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    @endforeach

</div>


<x-footer/>
