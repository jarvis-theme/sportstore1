<!-- ======= -->
<!-- Service -->
<!-- ======= -->
<div class="grid-12 float-left">
	
	<!-- Box -->

	<div class="box-color-2 box-shadow">

		<!-- Title -->

		<h3 class="box-color-2-title"><span>Layanan Pelanggan</span></h3>

		<!-- Text -->

		<div class="box-color-2-text">
			
			<div id="tabs" class="htabs">
				<a href="#tab-tos">Kebijakan Layanan</a>
				<a href="#tab-refund">Kebijakan Pengembalian</a>
				<a href="#tab-privacy">Kebijakan Privasi</a>
			</div>

			<div id="tab-tos" class="tab-content">
				<h2>Kebijakan Layanan</h2>
				<div class="content">
					{{$service->tos}}
				</div>
			</div>
			<div id="tab-refund" class="tab-content">
				<h2>Kebijakan Pengembalian</h2>
				<div class="content">
					{{$service->refund}}
				</div>
			</div>
			<div id="tab-privacy" class="tab-content">
				<h2>Kebijakan Privasi</h2>
				<div class="content">
					{{$service->privacy}}
				</div>
			</div>

		</div>

	</div>	

</div>	