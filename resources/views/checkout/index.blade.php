@extends('layout')
@section('content')
    <!-- Checkout Section Begin -->

    {{-- <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="checkout__input">
                                <p>Name<span>*</span></p>
                                <input type="text" name="customer_name" value="{{ old('customer_name') }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="email" name="customer_email" value="{{ old('customer_email') }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Phone<span>*</span></p>
                                <input type="text" name="customer_phone" value="{{ old('customer_phone') }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="customer_address" value="{{ old('customer_address') }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes</p>
                                <input type="text" name="note" value="{{ old('note') }}" placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @if ($cart && $cart->cartProducts->isNotEmpty())
                                        @foreach ($cart->cartProducts as $cartProduct)
                                            <li>{{ $cartProduct->product->name }} <span>${{ $cartProduct->product_quantity * $cartProduct->product_price }}</span></li>
                                        @endforeach
                                    @else
                                        <li>No items in cart.</li>
                                    @endif
                                </ul>
                                @if ($cart && $cart->cartProducts->isNotEmpty())
                                    <ul class="checkout__total__all">
                                        <li>Subtotal <span>${{ $cart->cartProducts->sum(function ($cartProduct) { 
                                            return $cartProduct->product_quantity * $cartProduct->product_price; 
                                        }) }}</span></li>
                                        <li>Total <span>${{ $cart->cartProducts->sum(function ($cartProduct) { 
                                            return $cartProduct->product_quantity * $cartProduct->product_price; 
                                        }) }}</span></li>
                                    </ul>
                                @endif
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section> --}}
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="checkout__input">
                                <p>Name<span>*</span></p>
                                <input type="text" name="customer_name" value="{{ old('customer_name') }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="email" name="customer_email" value="{{ old('customer_email') }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Phone<span>*</span></p>
                                <input type="text" name="customer_phone" value="{{ old('customer_phone') }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="customer_address" value="{{ old('customer_address') }}"
                                    required>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes</p>
                                <input type="text" name="note" value="{{ old('note') }}"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach ($cart->products as $item)
                                        <li>{{ $item->product->name }} <span>{{ $item->product_quantity }} x
                                                {{ $item->product->price }} vnđ</span></li>
                                        <li>Total<span>{{ $item->product_quantity * $item->product->price }} vnđ</span></li>
                                    @endforeach
                                    <li>Sub Total<span class="total-price" data-price="{{ $cart->total_price }}">
                                            {{ $cart->total_price }} vnđ</span></li>
                                    <li>Shipping<span class="shipping" data-price="10">10 vnđ</span>
                                        <input type="hidden" value="10" name="ship">
                                    </li>
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Total<span class="total-price-all"></span>
                                        <input type="hidden" id="total" value="" name="total">
                                    </li>
                                </ul>
                                <ul>
                                    <div class="checkout__payment-methods">
                                        <div class="form-check">
                                            <input class="form-check-input form-check-input_fill" type="radio" name="payment"
                                                id="checkout_payment_method_1" value="Pay on delivery" checked>
                                            <label class="form-check-label" for="checkout_payment_method_1">
                                                Thanh toán khi giao hàng
                                            </label>
                                        </div>
                                    </div>
                                </ul>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {


            getTotalValue()

            function getTotalValue() {
                let total = $('.total-price').data('price')
                let shiping = $('.shipping').data('price')
                $('.total-price-all').text(`${total + shiping} vnđ`)
                $('#total').val(total + shiping)
            }

        });
    </script>
    <!-- Checkout Section End -->
@endsection
