<div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">
           @if (app()->getLocale() == 'en')
                {{ $product->title }}
                @else
                {{ $product->ar_title }}
            @endif
        </h4>
        <button type="button" class="close hideModal" data-dismiss="modal">&times;</button>
      </div>

        <!-- Modal body -->
     



    <div class="container">
		<div class="card"    style="margin-top: 5px;margin-bottom:5px;">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						@if(Storage::disk('public')->exists('images/products/',$product->default_image))
                            <img src="{{ asset('storage/images/products/'.$product->default_image) }}" alt="Product-photo" >
                        @endif
                        <ul>
                            </li>
                                <span>
                                    @if (app()->getLocale() == 'en')
                                        {{ $product->unit ? $product->unit->name : '' }}
                                        @else
                                        {{ $product->unit ? $product->unit->ar_name : '' }}
                                    @endif
                                </span>
                            </li>
                        </ul>
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">
                        @if (app()->getLocale() == 'en')
                            {{ $product->title }}
                            @else
                            {{ $product->ar_title }}
                        @endif
                        </h3>
						<p class="product-description">
                             {{ $product->description }}
                        </p>
						<h4 class="price">price: <span>{{$product->price }}</span></h4>
						<div class="action">
                            <a data-id="{{$product->id}}" href="#" class="addToCart btn-grad small">@lang('page.addcard')</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




      <!-- Modal footer -->
      <div class="modal-footer">
            <button type="button" class="btn btn-danger hideModal" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>