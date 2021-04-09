<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Details-->
			<div class="d-flex align-items-center flex-wrap mr-2">
				<!--begin::Title-->
				<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Invoice Detail</h5>
				<!--end::Title-->
				<!--begin::Separator-->
				<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
				<!--end::Separator-->
				<!--begin::Search Form-->
				<div class="d-flex align-items-center" id="kt_subheader_search">
					<span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Purchases Order ID : <?php echo $purchase['id_vendor']; ?></span>
				</div>
				<!--end::Search Form-->
			</div>
            <!--end::Details-->
            <!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Button-->
				<a href="<?php echo base_url(); ?>invoice" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">Back</a>
				<!--end::Button-->
			</div>
			<!--end::Toolbar-->
		</div>
	</div>
	<!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!-- begin::Card-->
								<div class="card card-custom overflow-hidden">
									<div class="card-body p-0">
										<!-- begin: Invoice-->
										<!-- begin: Invoice header-->
										<div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
											<div class="col-md-9">
												<div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
													<h1 class="display-4 font-weight-boldest mb-10">INVOICE</h1>
													<div class="d-flex flex-column align-items-md-end px-0">
														<!--begin::Logo-->
														<a href="#" class="mb-5">
															<img src="assets/media/logos/logo-dark.png" alt="" />
														</a>
														<!--end::Logo-->
														<span class="d-flex flex-column align-items-md-end opacity-70">
															<h3 class="font-weight-boldest">Wita Fotocopy</h3>
															<span>Jl. Merdeka Raya A-13-NO.18, Sarua Permai</span>
                                                            <span>Ciputat, Tangsel</span>
														</span>
													</div>
												</div>
												<div class="border-bottom w-100"></div>
												<div class="d-flex justify-content-between pt-6">
													<div class="d-flex flex-column flex-root">
														<span class="font-weight-bolder mb-2">Nama Vendor</span>
														<span class="opacity-70"><?php echo $purchase['nama_vendor']; ?></span>
													</div>
													<div class="d-flex flex-column flex-root">
														<span class="font-weight-bolder mb-2">Tanggal Pengiriman</span>
														<span class="opacity-70"><?php echo $purchase['tanggal_pengiriman']; ?></span>
													</div>
													<div class="d-flex flex-column flex-root">
														<span class="font-weight-bolder mb-2">Tanggal Pembuatan</span>
														<span class="opacity-70"><?php echo $purchase['createDate']; ?>
														<br /><?php echo $purchase['harga']; ?></span>
													</div>
												</div>
											</div>
										</div>
										<!-- end: Invoice header-->
										<!-- begin: Invoice body-->
										<div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
											<div class="col-md-9">
												<div class="table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th class="pl-0 font-weight-bold text-muted text-uppercase">Description</th>
																<th class="text-right font-weight-bold text-muted text-uppercase">Hours</th>
																<th class="text-right font-weight-bold text-muted text-uppercase">Rate</th>
																<th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
															</tr>
														</thead>
														<tbody>
															<tr class="font-weight-boldest">
																<td class="pl-0 pt-7">Creative Design</td>
																<td class="text-right pt-7">80</td>
																<td class="text-right pt-7">$40.00</td>
																<td class="text-danger pr-0 pt-7 text-right">$3200.00</td>
															</tr>
															<tr class="font-weight-boldest border-bottom-0">
																<td class="border-top-0 pl-0 py-4">Front-End Development</td>
																<td class="border-top-0 text-right py-4">120</td>
																<td class="border-top-0 text-right py-4">$40.00</td>
																<td class="text-danger border-top-0 pr-0 py-4 text-right">$4800.00</td>
															</tr>
															<tr class="font-weight-boldest border-bottom-0">
																<td class="border-top-0 pl-0 py-4">Back-End Development</td>
																<td class="border-top-0 text-right py-4">210</td>
																<td class="border-top-0 text-right py-4">$60.00</td>
																<td class="text-danger border-top-0 pr-0 py-4 text-right">$12600.00</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<!-- end: Invoice body-->
										<!-- begin: Invoice footer-->
										<div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
											<div class="col-md-9">
												<div class="table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th class="font-weight-bold text-muted text-uppercase">BANK</th>
																<th class="font-weight-bold text-muted text-uppercase">ACC.NO.</th>
																<th class="font-weight-bold text-muted text-uppercase">DUE DATE</th>
																<th class="font-weight-bold text-muted text-uppercase">TOTAL AMOUNT</th>
															</tr>
														</thead>
														<tbody>
															<tr class="font-weight-bolder">
																<td>BARCLAYS UK</td>
																<td>12345678909</td>
																<td>Jan 07, 2018</td>
																<td class="text-danger font-size-h3 font-weight-boldest">20,600.00</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<!-- end: Invoice footer-->
										<!-- begin: Invoice action-->
										<div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
											<div class="col-md-9">
												<div class="d-flex justify-content-between">
													<button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
													<button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button>
												</div>
											</div>
										</div>
										<!-- end: Invoice action-->
										<!-- end: Invoice-->
									</div>
								</div>
								<!-- end::Card-->
							</div>
							<!--end::Container-->
						</div>
                        <!--end::Entry-->
</div>