<!-- Shopping cart -->


	<div class="heading">
	
		<a id="shopping_cart_icon" href="#"></a>
		<h4 class="grey-30">Cart:</h4>
		<a  class="google-font">
			<span id="cart_total" class="white">
				<span class="orange">{{ jadiRupiah(Shpcart::cart()->total() )}}</span>
			</span>
		</a>
		
	</div>
	<div class="content box-shadow">
	
		<!-- cart lsit -->
		
		
		@if (Shpcart::cart()->contents())
		<div class="mini-cart-info">
			<table>
			@foreach (Shpcart::cart()->contents() as $key => $cart)
				<tr>
					<td class="image">
						<a href="#">{{HTML::image(getPrefixDomain().'/produk/thumb/'.$cart['image'], $cart['name'], array('width'=>'50px'));}}</a>
					</td>
					<td class="name"><a href="#">{{$cart['name']}}</a></td>
					<td class="quantity">x&nbsp;{{$cart['qty']}}</td>
					<td class="total">{{ jadiRupiah($cart['qty'] * $cart['price'])}}</td>
					<td class="remove">
						<!-- column untuk remove item-->
					</td>
				</tr>
			@endforeach
			</table>
		</div>
		<div class="mini-cart-total">
			<table>
				<tr>
					<td align="right"><b>Total:</b></td>
					<td align="right">{{ jadiRupiah(Shpcart::cart()->total() )}}</td>
				</tr>
			</table>
		</div>
		<div class="checkout">
			<a href="{{URL::to('checkout')}}" class="button">
				<span>Checkout</span>
			</a>
		</div>
		@else
		<div class="mini-cart-info">
			<p>Cart masih kosong</p>
		</div>
		@endif
			<!-- End cart list -->
	
	</div>


<!-- End shopping cart -->
				