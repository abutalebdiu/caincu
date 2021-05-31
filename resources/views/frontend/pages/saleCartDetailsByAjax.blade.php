
    @php
    $cartName = session()->has('saleCart') ? session()->get('saleCart')  : [];
    @endphp
    
    @foreach ($cartName as $item)
        
        <div class="cart-items">
            <div class="cart-items-box d-flex bd-highlight align-items-center">
                <span class="flex-shrink-1 bd-highlight">
                    {{-- <img src="{{ asset('public/frontend') }}/images/medisin/1.jpg" alt="card product"> --}}
                     @if(Storage::disk('public')->exists('images/products/',$item['default_image']))
                        <img src="{{ asset('storage/images/products/'.$item['default_image']) }}" alt="card product" >
                    @endif
                </span>
                <span class="w-100 bd-highlight">
                    <p class="card-head-over">
                        {{ app()->getLocale() == 'en' ? $item['product_title'] : $item['product_title_ar'] }}
                    </p>
                    <p class="d-block card-head-price">{{$item['price']}}</p>
                    <input type="hidden" class="item_price" id="item_price_id_{{$item['product_id']}}" data-id="{{$item['product_id']}}" value="{{$item['price']}}" />
                </span>
                <span class="flex-shrink-1 bd-highlight">
                    <input type="number" class="keyup_change_quantity"  id="quantity_id_{{$item['product_id']}}" value="{{$item['quantity']}}" step="any"  data-id="{{$item['product_id']}}" style="width:80%;"/> 
                </span>
                <span class="cart-final flex-shrink-1 bd-highlight" >
                    <p class="" id="sub_total_amount_id_{{$item['product_id']}}" style="width: 100%"> {{ $item['quantity'] * $item['price'] }} </p>
                    <input class="subTotalAmount" type="hidden" value="{{$item['quantity'] * $item['price']}}" id="sub_total_amount_hidden_id_{{$item['product_id']}}" />
                </span>
                <span data-id="{{$item['product_id']}}" class="removeSingleItemFromCart cart-cross-item flex-shrink-1 bd-highlight">
                    <i class="fa fa-times"></i>
                </span>
            </div>
        </div>
        @endforeach

       
    <form action="{{route('customerOrderProcess')}}" method="POST">
        @csrf

        @foreach ($cartName as $item)
            <input type="hidden" name="product_id[]" value="{{$item['product_id']}}" />
            <input type="hidden" name="unit_id[]" value="{{$item['unit_id']}}" />
            <input type="hidden" name="price[]" value="{{$item['price']}}" />
            <input type="hidden" name="quantity[]" value="{{$item['quantity']}}" />
            <input type="hidden" name="sub_total[]" value="{{$item['quantity'] * $item['price']}}" />
        @endforeach
        <div class="cart-over-footer">
            <span class="card-footer-content">
                <div class="btn-group btn-group-md">

                     @if (Auth::check() && Auth::user()->type == 2)
                        <button type="submit" class="btn btn-primary">@lang('salecart.orderprocess')</button>
                        <input type="hidden" name="customer_id" value="{{Auth::user()->id}}" />
                    @else
                    <a  href="{{ route('customer.login') }}" class="btn btn-primary" >@lang('salecart.logintoorderprocess')</a>
                    @endif

                   
                    {{-- <button type="button" class="btn btn-info"> ৳ </button> --}}
                </div>
                {{-- <span>Save ৳ 44</span> --}}
               {{--  <span class="cart-icon-cart">
                    <i class="fa fa-cart-arrow-down"></i>
                </span> --}}
                
                <span class="btn btn-danger cart-icon-cart pull-right removeEmptyAllItemFromSaleCart" style="cursor:pointer; ">
                    <i class="fa fa-times" style="color:white;font-size: 25px;margin-right: 0px;"></i>
                </span>
                <span class="btn btn-info pull-right" style="margin-right:20px;color:#652991;font-weight:600">
                   @lang('salecart.total') :  <span class="total_amount"></span>
                </span> 

            </span>
        </div>
        <input type="hidden" name="total_amount" value="" class="total_amount_value"/>
    </form>

