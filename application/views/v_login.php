<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>WITA FOTOCOPY</title>
		<meta name="description" content="Singin page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="<?php echo base_url('assets/template/css/pages/login/login-3.css?v=7.0.4')?>" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?php echo base_url('assets/template/plugins/global/plugins.bundle.css?v=7.0.4')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/template/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.4')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/template/css/style.bundle.css?v=7.0.4')?>" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="<?php echo base_url('assets/template/media/logos/favicon.ico')?>" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-static page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="login-aside d-flex flex-column flex-row-auto">
					<!--begin::Aside Top-->
					<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
						<!--begin::Aside header-->
						<a href="#" class="login-logo text-center pt-lg-25 pb-10">
							<h2>WITA FOTOCOPY</h2>
						</a>
						<!--end::Aside header-->
						<!--begin::Aside Title-->
						<h3 class="font-weight-bolder text-center font-size-h4 text-dark-50 line-height-xl">Inventory Management System <br> Application</h3>
						<!--end::Aside Title-->
					</div>
					<!--end::Aside Top-->
					<!--begin::Aside Bottom-->
					<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center" style="background-position-y: calc(100% + 5rem); background-image:<?php echo base_url('assets/template/media/svg/illustrations/login-visual-5.svg')?>"></div>
					<!--end::Aside Bottom-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="login-content flex-row-fluid d-flex flex-column p-10">
					
					<!--begin::Wrapper-->
					<div class="d-flex flex-row-fluid flex-center">
						<!--begin::Signin-->
						<div class="login-form" style="margin-top:-200px;">
							<!--begin::Form-->
							<form action="">
								<!--begin::Title-->
								<div class="pb-5 pb-lg-15">
									<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h3>
									<!-- <div class="text-muted font-weight-bold font-size-h4">New Here?
									<a href="custom/pages/login/login-5/signup.html" class="text-primary font-weight-bolder">Create Account</a></div> -->
								</div>
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Usename</label>
									<input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="text" name="username" id="username" autocomplete="off" />
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
									</div>
									<input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="password" name="password" id="password" autocomplete="off" />
								</div>
								<!--end::Form group-->
								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
									<button type="button" id="btn-login" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="<?php echo base_url('assets/template/plugins/global/plugins.bundle.js?v=7.0.4')?>"></script>
		<script src="<?php echo base_url('assets/template/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4')?>"></script>
		<script src="<?php echo base_url('assets/template/js/scripts.bundle.js?v=7.0.4')?>"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="<?php echo base_url('assets/template/js/pages/custom/login/login-3.js?v=7.0.4')?>"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script>
		    $("#btn-login").click(function() {
				var username = $('#username').val();
				var password = $('#password').val();
				// console.log(<?php api_url() ?>);
				if (username != "" && password != "") {
					$.ajax({
                    url: "<?php base_url() ?>" + "login/aksi_login?" + "username=" + username + "&password=" + password,
                    type: 'GET',
                    dataType: 'json',
                    success: function(result) {
						console.log(result);
							if(result.results == ""){
								Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Password anda salah!',
							})
						}else{
							window.location = "<?php api_url() ?>";
						}
                    },
                    error: function(xhr, status, errorThrown) {
						console.log(xhr, status, errorThrown);
                    }
            		});
				}else{
					console.log("data kosong");
				}
			});
		</script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>
