<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<!--begin::Row-->
			<div class="row">
				<div class="col-xl">
					<!--begin::Engage Widget 8-->
					<div class="card card-custom gutter-b card-stretch card-shadowless">
						<div class="card-body p-0 d-flex">
							<div class="d-flex align-items-start justify-content-start flex-grow-1 bg-light-warning p-8 card-rounded flex-grow-1 position-relative">
								<div class="d-flex flex-column align-items-start flex-grow-1 h-100">
									<div class="p-1 flex-grow-1">
										<h1 class="text-warning font-weight-bolder">Purchase Order</h1>
										<p class="text-dark-50 font-weight-bold mt-3">Purchase Order</p>
									</div>
								</div>
								<div class="position-absolute right-0 bottom-0 mr-5 overflow-hidden">
									<img src="assets/template/media/svg/humans/custom-13.svg" class="max-h-200px max-h-xl-275px mb-n20" alt="" />
								</div>
							</div>
						</div>
					</div>
					<!--end::Engage Widget 8-->
				</div>
			</div>
			<!--end::Row-->
			<?php if($this->session->flashdata('flash')): ?>
			<div class="row">
                <div class="col-xl">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Purchase <strong>Was Succesfully</strong> <?php echo $this->session->flashdata('flash'); ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
			<?php endif ?>
			<!--begin::Row-->
			<div class="row">
				<div class="col-xl">
					<!--begin::Advance Table Widget 2-->
					<div class="card card-custom gutter-b card-stretch card-shadowless bg-light">
					    <!--begin::Header-->
					    <div class="card-header border-0 pt-5">
							<div class="">
								<a href="purchase/add" class="btn btn-primary">Add Purchase Order</a>
							</div>
							<div class="col-md-5">
								<form action="" method="post">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search Data" name="keyword">
										<div class="input-group-append">
											<button class="btn btn-primary" type="submit">Search</button>
										</div>
									</div>
								</form>
							</div>
                            <div class="card-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_1_1">Month</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_1_2">Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_tab_pane_1_3">Day</a>
                                    </li>
                                </ul>
                            </div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<?php if(empty($purchase)): ?>
                			<div class="alert alert-danger" role="alert">Data Not Found</div>
            			<?php endif ?>
						<div class="card-body pt-3 pb-0">
							<!--begin::Table-->
							<div class="table-responsive">
								<table class="table table-border table-vertical-center">
									<thead>
										<tr>
											<th scope="col">Vendor Name</th>
											<th scope="col">Produk</th>
											<th scope="col">Jumlah</th>
											<th scope="col">Harga</th>
											<th scope="col">Tanggal Pengiriman</th>
											<th scope="col">Alamat</th>
											<th scope="col">Pembayaran</th>
											<th scope="col">Create Date</th>
											<th scope="col">Create By</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; 
                            			foreach($purchase as $purchase) : ?>
										<tr>
											<td class=""><?php echo $purchase['nama_vendor']; ?></td>
											<td class="">
												<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $purchase['produk']; ?></span>
											</td>
											<td class="">
												<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $purchase['jumlah']; ?></span>
											</td>
											<td class="">
												<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $purchase['harga']; ?></span>
											</td>
												<td class="">
												<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $purchase['tanggal_pengiriman']; ?></span>
											</td>	
												<td class="">
												<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $purchase['alamat']; ?></span>
											</td>
											<td class="">
												<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $purchase['pembayaran']; ?></span>
											</td>
											<td class="">
												<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $purchase['create_date']; ?></span>
											</td>
											<td class="">
												<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $purchase['create_by']; ?></span>
											</td>
											<td class="">
												<a href="<?php echo base_url(); ?>purchase/detail/<?php echo $purchase['purchase_id']; ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
													<span class="svg-icon svg-icon-md svg-icon-primary">
														<!--begin::Svg Icon | path:assets/template/media/svg/icons/Communication/Write.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
												</a>
												
											</td>
										</tr>
									</tbody>
									<?php endforeach; ?>
								</table>
							</div>
							<!--end::Table-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Advance Table Widget 2-->
				</div>
			</div>
			<!--end::Row-->
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->
                    
                    

