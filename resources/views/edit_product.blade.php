<x-header/>

<div class="row">
    <div class="col-lg-12 py-3 ">
        <form action="{{route('update',$product->id)}}" method="POST">
            @csrf
  <div class="form-row col-lg-8 mx-auto py-3 bg-info rounded">
    <div class="col">
      <input type="text" class="form-control" placeholder="Product name" name="product_name" value="{{old('product_name',$product->product_name)}}" >


    </div>
    <div class="col">
      <input type="number" class="form-control" placeholder="Product price" name="product_price" value="{{old('product_price',$product->product_price)}}" >


    </div>
  </div>
  <div class="form-row col-lg-8 mx-auto py-3 bg-info rounded">
    <div class="col">
      <input type="number"  class="form-control" placeholder="Product quantity" name="product_quantity" value="{{old('product_quantity',$product->product_quantity)}}" >


    </div>
    <div class="col">
      <input type="number" class="form-control" placeholder="Product gst" name="product_gst" value="{{old('product_gst',$product->product_quantity)}}" >


    </div>

  </div>
  <div class="form-row col-lg-8 mx-auto py-3 bg-info rounded">
    <div class="col">
      <input type="number" class="form-control" placeholder="Product discount" name="product_discount" value="{{old('product_discount',$product->product_discount)}}" >


    </div>


    <div class="col">

<div class="col">
    <select name="grahak_id" class="form-control" required>
        <option value="">Select Customer</option>

        @foreach($grahaks as $grahak)
            <option value="{{ $grahak->id }}"
                {{ old('grahak_id', $product->grahak_id) == $grahak->id ? 'selected' : '' }}>
                {{ $grahak->name }}
            </option>
        @endforeach
    </select>

    @error('grahak_id')
        <p class="alert alert-danger">{{ $message }}</p>
    @enderror
</div>
    </div>



  </div>
  <div class="d-flex justify-content-center py-2">  <button type="submit" class="btn btn-success text-center"> update</button></div>

</form>
    </div>
</div>






<x-footer/>
