
<x-header/>

<style>
    body {
        background: #f5f7fb;
        font-family: 'Segoe UI', sans-serif;
        font-size: 13px;
    }

    .product-wrapper {
        background: #fff;
        border-radius: 12px;
        padding: 22px;
        box-shadow: 0 3px 15px rgba(0,0,0,.04);
        border: 1px solid #edf0f5;
    }

    .page-title {
        font-size: 21px;
        font-weight: 700;
        color: #1e293b;
    }

    .table thead th {
        background: #f8fafc;
        color: #64748b;
        font-size: 11px;
        font-weight: 650;
        text-transform: uppercase;
        padding: 14px;
        white-space: nowrap;
    }

    .table tbody td,
    .table tbody th {
        padding: 13px;
        font-size: 12px;
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background: #f8faff;
    }

    .customer-id {
        background: #edf2ff;
        color: #315bd6;
        padding: 5px 9px;
        border-radius: 6px;
        font-weight: 600;
    }

    .product-name {
        font-weight: 600;
        color: #263449;
    }

    .btn {
        font-size: 11px;
        font-weight: 600;
        border-radius: 6px;
    }

    .empty-message {
        padding: 30px;
        color: #94a3b8;
    }
</style>

<div class="container-fluid px-4 py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="page-title mb-1">Product Management</h2>
            <p class="text-muted mb-0">
                View and manage all customer products
            </p>
        </div>

        <a href="{{ route('add_product') }}"
           class="btn btn-primary px-3 py-2">
            + Add Product
        </a>

    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session()->get('success') }}

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="product-wrapper">

        <div class="d-flex justify-content-between mb-3">
            <h5 class="fw-bold mb-0">All Products</h5>

            <span class="text-muted">
                Customers: {{ $grahaks->count() }}
            </span>
        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Product Name</th>
                        <th>Product Brand</th>
                        <th>Product Imei</th>
                        <th>Product Hsn</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th>GST</th>
                        <th>Discount</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @php
                        $hasProducts = false;
                    @endphp

                    @foreach ($grahaks as $grahak)

                        @foreach ($grahak->products as $product)

                            @php
                                $hasProducts = true;
                            @endphp

                            <tr>

                                <td>
                                    <span class="customer-id">
                                        #{{ $grahak->id }}
                                    </span>
                                </td>

                                <td class="product-name">
                                    {{ $product->product_name }}
                                </td>
                                <td>{{$product->product_brand}}</td>
                                <td>{{$product->product_imei}}</td>
                                <td>{{$product->product_hsn}}</td>

                                <td>
                                    ₹{{ number_format($product->product_price, 2) }}
                                </td>

                                <td>
                                    {{ $product->product_quantity }}
                                </td>

                                <td>
                                    <span class="badge bg-info-subtle text-info">
                                        {{ $product->product_gst ?? 0 }}%
                                    </span>
                                </td>

                                <td class="text-danger">
                                    ₹{{ number_format($product->product_discount ?? 0, 2) }}
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        <a href="{{ route('edit', $product->id) }}"
                                           class="btn btn-outline-primary btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('delete', $product->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this product?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-outline-danger btn-sm">
                                                Delete
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @endforeach

                    @endforeach

                    @if (!$hasProducts)
                        <tr>
                            <td colspan="7" class="text-center empty-message">
                                No products available.
                            </td>
                        </tr>
                    @endif

                </tbody>

            </table>

        </div>

    </div>

</div>

<x-footer/>
