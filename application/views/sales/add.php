<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Details-->
				<div class="d-flex align-items-center flex-wrap mr-2">
					<!--begin::Title-->
					<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Add Sales Order</h5>
					<!--end::Title-->
					<!--begin::Separator-->
					<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
					<!--end::Separator-->
					<!--begin::Search Form-->
					<div class="d-flex align-items-center" id="kt_subheader_search">
						<span class="text-dark-50 font-weight-bold" id="kt_subheader_total"></span>
					</div>
					<!--end::Search Form-->
				</div>
				<!--end::Details-->
                <form class="" id="kt_form" method="post">
                <!--begin::Toolbar-->
			<div class="d-flex align-items-center">
            
				<!--begin::Button-->
				<a href="<?php echo base_url(); ?>sales" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">Back</a>
				<!--end::Button-->
				<!--begin::Dropdown-->
				<div class="btn-group ml-2">
					<button type="submit" name="add" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base">Save Changes</button>
				</div>
				<!--end::Dropdown-->
			</div>
			<!--end::Toolbar-->
		</div>
	</div>
	<!--end::Subheader-->
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Card-->
			<div class="card card-custom">
				<!--begin::Card header-->
				<div class="card-header card-header-tabs-line nav-tabs-line-3x">
					<!--begin::Toolbar-->
					<div class="card-toolbar">
						<ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
							<!--begin::Item-->
							<li class="nav-item mr-3">
								<a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
									<span class="nav-icon">
										<span class="svg-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
									<span class="nav-text font-size-lg">Sales Order</span>
								</a>
							</li>
							<!--end::Item-->
                        </ul>
                    </div>
					<!--end::Toolbar-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body px-0">
						<div class="tab-content">
							<!--begin::Tab-->
							<div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
							    <!--begin::Row-->
							    <div class="row">
									<div class="col-xl-2"></div>
									<div class="col-xl-7 my-2">
										<!--begin::Row-->
										<div class="row">
											<label class="col-3"></label>
											<div class="col-9">
												<h6 class="text-dark font-weight-bold mb-10">Sales Order Info:</h6>
											</div>
										</div>
                                        <!--end::Row-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
											<label class="col-form-label col-3 text-lg-right text-left">Customer Name</label>
											<div class="col-9">
												<select class="form-control form-control-lg form-control-solid" name="customerID" id="customerID">
                                                    <option selected value="" disabled="">Choose Customer</option>
                                                    <?php foreach ($customer as $key): ?>
                                                    <option value="<?php echo $key['customerID']; ?>"><?php echo $key['customerName']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
										</div>
                                        <!--end::Group-->
                                        <!--begin::Group-->
                                        <div class="form-group row">
											<label class="col-form-label col-3 text-lg-right text-left">Order Date</label>
												<div class="col-9">
													<input class="form-control form-control-lg form-control-solid" type="date" name="orderDate" id="orderDate" />
                                                    <small class="form-text text-danger"><?php echo form_error('orderDate');?></small>
                                                </div>
										</div>
										<!--end::Group-->											
                                        <!--begin::Group-->
                                        <div class="form-group row">
											<label class="col-form-label col-3 text-lg-right text-left">Amount</label>
											<div class="col-9">
												<input class="form-control form-control-lg form-control-solid" type="number" name="amount" id="amount" placeholder="Amount"/>
                                                <small class="form-text text-danger"><?php echo form_error('amount');?></small>
                                            </div>
										</div>
										<!--end::Group-->											
                                        <!--begin::Group-->
										<input type="hidden" name="statusOrder" id="statusOrder" value="Created">
										<!--end::Group-->											
                                    </div>
                                </div>
								<!--end::Row-->
                                <!--begin::Row-->
							    <!-- <div class="row">
									<div class="col-xl-2"></div>
									<div class="col-xl-7 my-2">
										
										<div class="row">
											<label class="col-3"></label>
											<div class="col-9">
												<h6 class="text-dark font-weight-bold mb-10">Product:</h6>
											</div>
										</div>
                                        
                                        <div class="form-group row">
											<label class="col-form-label col-3 text-lg-right text-left">Product</label>
											<div class="col-7">
												<select class="form-control form-control-lg form-control-solid" name="productID" id="productID">
                                                    <option selected value="" disabled="">Choose Product</option>
                                                    <?php foreach ($data as $key): ?>
                                                    <option value="<?php echo $key['productID']; ?>"><?php echo $key['productName']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <input class="form-control form-control-lg form-control-solid" type="number" name="qty" id="qty" placeholder="Qty"/>
                                            </div>
										</div>
                                        											
                                    </div>
                                </div> -->
								<!--end::Row-->
								</div>
								<!--end::Tab-->
                            </div>
                        </form>
                    </div>
					<!--begin::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>

	<!--end::Demo Panel-->
	<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/template/plugins/global/plugins.bundle.js?v=7.0.4"></script>
		<script src="assets/template/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4"></script>
		<script src="assets/template/js/scripts.bundle.js?v=7.0.4"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/template/js/pages/custom/user/edit-user.js?v=7.0.4"></script>
		<!--end::Page Scripts-->

<!-- <div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Add Sales Order
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <select class="form-control" name="customerID" id="customerID">
                                <?php foreach ($customer as $cust) :?>
                                    <?php if($cust == $sales['customer']) : ?>
                                        <option value="<?php echo $cust; ?>"><?php echo $cust; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                           
                            <small class="form-text text-danger"><?php echo form_error('customerID');?></small>
                        </div>
                        <div class="form-group">
                            <label for="address">Order Date</label>
                            <input type="date" class="form-control datepicker" name="orderDate" id="orderDate">
                            <small class="form-text text-danger"><?php echo form_error('orderDate');?></small>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Create By</label>
                            <input type="text" class="form-control" name="createBy" id="createBy">
                            <small class="form-text text-danger"><?php echo form_error('createBy');?></small>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="<?php echo base_url(); ?>sales" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script> -->