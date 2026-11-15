
<x-header/>

<style>
    body {
        background: #f4f6fa;
        font-family: 'Segoe UI', sans-serif;
        font-size: 13px;
    }

    .product-form-wrapper {
        max-width: 700px;
        margin: 35px auto;
        padding: 0 15px;
    }

    .form-card {
        background: #fff;
        border: 1px solid #edf0f5;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,.045);
    }

    .form-header {
        background: #f8faff;
        padding: 22px 25px;
        border-bottom: 1px solid #edf0f5;
    }

    .form-header h4 {
        font-size: 19px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 5px;
    }

    .form-header p {
        color: #94a3b8;
        font-size: 12px;
        margin: 0;
    }

    .form-body {
        padding: 25px;
    }

    .form-label {
        font-size: 12px;
        font-weight: 650;
        color: #475569;
        margin-bottom: 7px;
    }

    .form-control {
        height: 43px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 13px;
        padding: 10px 13px;
        box-shadow: none;
    }

    .form-control:focus {
        border-color: #315bd6;
        box-shadow: 0 0 0 3px rgba(49,91,214,.08);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .save-btn {
        background: #315bd6;
        border: none;
        color: #fff;
        padding: 11px 25px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
    }

    .save-btn:hover {
        background: #2449b9;
        color: #fff;
    }

    .cancel-btn {
        background: #f1f5f9;
        color: #475569;
        padding: 11px 22px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
    }

    .cancel-btn:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .field-error {
        font-size: 11px;
        margin-top: 5px;
        color: #dc3545;
    }

    @media(max-width: 576px) {
        .form-body {
            padding: 18px;
        }

        .form-header {
            padding: 18px;
        }
    }
</style>


<div class="product-form-wrapper">

    <div class="form-card">

        <!-- Header -->

        <div class="form-header">
            <h4>Add New Product</h4>
            <p>Enter product details and select a customer.</p>
        </div>


        <!-- Form Body -->

        <div class="form-body">

            <form action="{{ route('saveproduct') }}" method="POST">

                @csrf

                <div class="row g-3">

                    <!-- Product Name -->

                    <div class="col-md-6">

                        <label class="form-label">
                            Product Name
                        </label>

                        <input type="text"
                               class="form-control @error('product_name') is-invalid @enderror"
                               name="product_name"
                               placeholder="Enter product name"
                               value="{{ old('product_name') }}">

                        @error('product_name')
                            <div class="field-error">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="col-md-6">

                        <label class="form-label">
                            Product Brand
                        </label>

                        <input type="text"
                               class="form-control @error('product_brand') is-invalid @enderror"
                               name="product_brand"
                               placeholder="Enter product brand"
                               value="{{ old('product_brand') }}">

                        @error('product_brand')
                            <div class="field-error">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="col-md-6">

                        <label class="form-label">
                            Product IMEI
                        </label>

                        <input type="text"
                               class="form-control @error('product_imei') is-invalid @enderror"
                               name="product_imei"
                               placeholder="Enter product Imei"
                               value="{{ old('product_imei') }}">

                        @error('product_imei')
                            <div class="field-error">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="col-md-6">

                        <label class="form-label">
                            Product Hsn
                        </label>

                        <input type="text"
                               class="form-control @error('product_hsn') is-invalid @enderror"
                               name="product_hsn"
                               placeholder="Enter product Hsn"
                               value="{{ old('product_hsn') }}">

                        @error('product_hsn')
                            <div class="field-error">{{ $message }}</div>
                        @enderror

                    </div>







                    <!-- Product Price -->

                    <div class="col-md-6">

                        <label class="form-label">
                            Product Price (₹)
                        </label>

                        <input type="number"
                               min="0"
                               step="0.01"
                               class="form-control @error('product_price') is-invalid @enderror"
                               name="product_price"
                               placeholder="Enter product price"
                               value="{{ old('product_price') }}">

                        @error('product_price')
                            <div class="field-error">{{ $message }}</div>
                        @enderror

                    </div>


                    <!-- Product Quantity -->

                    <div class="col-md-6">

                        <label class="form-label">
                            Product Quantity
                        </label>

                        <input type="number"
                               min="0"
                               class="form-control @error('product_quantity') is-invalid @enderror"
                               name="product_quantity"
                               placeholder="Enter quantity"
                               value="{{ old('product_quantity') }}">

                        @error('product_quantity')
                            <div class="field-error">{{ $message }}</div>
                        @enderror

                    </div>


                    <!-- Product GST -->

                    <div class="col-md-6">

                        <label class="form-label">
                            GST (%)
                        </label>

                        <input type="number"
                               min="0"
                               max="100"
                               step="0.01"
                               class="form-control @error('product_gst') is-invalid @enderror"
                               name="product_gst"
                               placeholder="Enter GST percentage"
                               value="{{ old('product_gst') }}">

                        @error('product_gst')
                            <div class="field-error">{{ $message }}</div>
                        @enderror

                    </div>


                    <!-- Product Discount -->

                    <div class="col-md-6">

                        <label class="form-label">
                            Product Discount (₹)
                        </label>

                        <input type="number"
                               min="0"
                               step="0.01"
                               class="form-control @error('product_discount') is-invalid @enderror"
                               name="product_discount"
                               placeholder="Enter discount amount"
                               value="{{ old('product_discount') }}">

                        @error('product_discount')
                            <div class="field-error">{{ $message }}</div>
                        @enderror

                    </div>


                    <!-- Select Customer -->

                    <div class="col-md-6">

                        <label class="form-label">
                            Select Customer
                        </label>

                        <select name="grahak_id"
                                class="form-control @error('grahak_id') is-invalid @enderror">

                            <option value="">Choose Customer</option>

                            @foreach($grahaks as $grahak)

                                <option value="{{ $grahak->id }}"
                                    {{ old('grahak_id') == $grahak->id ? 'selected' : '' }}>

                                    {{ $grahak->name }}

                                </option>

                            @endforeach

                        </select>

                        @error('grahak_id')
                            <div class="field-error">{{ $message }}</div>
                        @enderror

                    </div>

                </div>


                <!-- Buttons -->

                <div class="d-flex justify-content-end gap-2 mt-4">

                    <a href="{{ route('products') }}"
                       class="cancel-btn">
                        Cancel
                    </a>

                    <button type="submit" class="save-btn">
                        Save Product
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<x-footer/>
