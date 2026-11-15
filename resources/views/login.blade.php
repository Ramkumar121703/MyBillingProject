
<x-header/>

<style>
    body {
        background: #f4f6fa;
        font-family: 'Segoe UI', sans-serif;
        font-size: 13px;
    }

    .customer-form-wrapper {
        max-width: 650px;
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

    textarea.form-control {
        height: 95px;
        resize: vertical;
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


<div class="customer-form-wrapper">

    <div class="form-card">

        @if (session()->has('success'))
        <p class="alert alert-success">
      {{session()->get('success')}}
          </p>
        @endif
        <!-- Header -->

        <div class="form-header">
            <h4>Login</h4>

        </div>


        <!-- Form -->

        <div class="form-body">

            <form action="{{ route('loginmatch') }}" method="POST">

                @csrf

                <!-- Customer Name -->



                <!-- Customer Phone -->

                <div class="mb-3">

                    <label class="form-label">
                        Admin Email
                    </label>

                    <input type="email"
                           class="form-control @error('phone') is-invalid @enderror"
                           placeholder="Enter Email"
                           name="email"
                           value="{{ old('email') }}">

                    @error('email')
                        <div class="field-error">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">

                    <label class="form-label">
                        Admin Password
                    </label>

                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Enter  password"
                           name="password"
                           value="{{ old('password') }}">

                    @error('password')
                        <div class="field-error">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">

                    <label class="form-label">
                        Admin Password_confirmation
                    </label>

                    <input type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Enter  password_confirmation"
                           name="password_confirmation"
                           value="{{ old('password_confirmation') }}">

                    @error('password_confirmation')
                        <div class="field-error">{{ $message }}</div>
                    @enderror

                </div>


                <!-- Customer Address -->



                <!-- Buttons -->

                <div class="d-flex justify-content-end gap-2">



                    <button type="submit" class="save-btn">
                       Login
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<x-footer/>
