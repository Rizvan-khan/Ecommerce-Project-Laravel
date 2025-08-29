@extends('themelayout.app')

@section('content')
<div class="container py-5">
    <h2>Checkout</h2>
    <div class="row">
        <!-- Product Summary -->
        <div class="col-md-6">
            <h4>Product Summary</h4>
            @foreach ($cartItems as $cartItem)
            <div>
                <img src="{{ asset('uploads/singleProduct/' . $cartItem->product->image) }}" width="150">
                <p>Name: {{ $cartItem->product->name }}</p>
                <p>Price: ₹{{ $cartItem->product->dp_price ?? $cartItem->product->price }}</p>
                <p>Color: {{ $cartItem->product->color }}</p>
                <p>Size: {{ $cartItem->product->size }}</p>
            </div>
            @endforeach
        </div>

        <!-- Shipping Form -->
        <div class="col-md-6">
            <h4>Shipping Details</h4>
            <form method="POST" action="{{ route('place-order') }}">

                @csrf
      @foreach ($cartItems as $item)
        <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $item->product->id }}">
        <input type="hidden" name="items[{{ $loop->index }}][quantity]" value="{{ $item->quantity }}">
        <input type="hidden" name="items[{{ $loop->index }}][price]" value="{{ $item->product->dp_price ?? $item->product->price }}">
    @endforeach

                <input type="hidden" name="cart_id" value="{{ $cartItem->id }}">
                <input type="text" name="name" class="form-control my-2" placeholder="Your Name" required>
                <input type="text" name="phone" class="form-control my-2" placeholder="Phone" required>
                <input type="email" name="email" class="form-control my-2" placeholder="Email" required>
                <textarea name="address" class="form-control my-2" placeholder="Address" required></textarea>
                <button type="submit" class="btn btn-primary">Place Order (COD)</button>
            </form>
        </div>
    </div>
</div>
@endsection
