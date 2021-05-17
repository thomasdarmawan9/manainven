<div class="container">
	<!--begin::Row-->
	<div class="row pt-4">
		<div class="col-xl-12">
			<!--begin::Charts Widget 2-->
			<div class="card card-custom bg-gray-100 gutter-b card-stretch card-shadowless">
				<!--begin::Header-->
				<div class="card-header h-auto border-0">
					<!--begin::Title-->
					<div class="card-title py-5">
						<h3 class="card-label">
							<span class="d-block text-dark font-weight-bolder">Perbandingan Product Terjual dan Tersedia</span>
							<span class="d-block text-dark-50 mt-2 font-size-sm">Berdasarkan Cabang</span>
						</h3>
					</div>
					<!--end::Title-->
					<div class="card-toolbar">
						<ul class="nav nav-pills nav-pills-sm nav-dark-75" role="tablist">
							<li class="nav-item">
								<a class="nav-link py-2 px-4 a-modif" href="#">
									<span>Indicator : </span>
								</a>
							</li>
							<li class="nav-item" style="background:#F44336">
								<a class="nav-link py-2 px-4" href="#">
									<span class="nav-text font-size-sm" style="color:white;">Cabang Jakarta Timur</span>
								</a>
							</li>
							<li class="nav-item" style="background:#E91E63">
								<a class="nav-link py-2 px-4" href="#">
									<span class="nav-text font-size-sm" style="color:white;">Cabang Jakarta Selatan</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body">
					<!--begin::Chart-->
					<div id="kt_charts_widget_2_chart"></div>
					<!--end::Chart-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Charts Widget 2-->
		</div>
	</div>
	<!--end::Row-->

	<!--begin::Row-->
	<div class="row pt-4">
		<div class="col-xl-12">
			<!--begin::Charts Widget 2-->
			<div class="card card-custom bg-gray-100 gutter-b card-stretch card-shadowless">
				<!--begin::Header-->
				<div class="card-header h-auto border-0">
					<!--begin::Title-->
					<div class="card-title py-5">
						<h3 class="card-label">
							<span class="d-block text-dark font-weight-bolder">Perbandingan Total Product Di Warehouse dan DI Cabang</span>
							<span class="d-block text-dark-50 mt-2 font-size-sm">Berdasarkan Region Toko</span>
						</h3>
					</div>
					<!--end::Title-->
					<div class="card-toolbar">
						<ul class="nav nav-pills nav-pills-sm nav-dark-75" role="tablist">
							<li class="nav-item">
								<a class="nav-link py-2 px-4 a-modif" href="#">
									<span>Indicator : </span>
								</a>
							</li>
							<li class="nav-item" style="background:#1BC5BD">
								<a class="nav-link py-2 px-4" href="#">
									<span class="nav-text font-size-sm" style="color:white;">Total Product Warehouse</span>
								</a>
							</li>
							<li class="nav-item" style="background:#81d4fa">
								<a class="nav-link py-2 px-4" href="#">
									<span class="nav-text font-size-sm" style="color:white;">Cabang Product Cabang</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body">
					<!--begin::Chart-->
					<div id="kt_charts_widget_1_chart"></div>
					<!--end::Chart-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Charts Widget 2-->
		</div>
	</div>
	<!--end::Row-->


</div>

<script>
	"use strict";

var _initChartsWidget2 = function() {
   var element = document.getElementById("kt_charts_widget_2_chart");

   if (!element) {
	   return;
   }
   
   // AJAX start Call

   $.ajax({
	   url : "<?php echo base_url() ?>dashboard/index_get",
	   method : "GET",
	   dataType : 'json',
	   success: function(data){
		   // Chart JS Start
		   // console.log(data.data.stock_product.datasets[0].data);
		   // console.log(data.data.stock_product.datasets[1].data);
		   // var i;
		   // for(i=0; i<data.data.stock_product.datasets.length; i++){
		   // 	console.log(data.data.stock_product.datasets[i].data);
		   // }
		   
		   var options = {
			   series: [{
				   name: 'Cabang Jakarta Timur',
				   data: data.data.stock_product.datasets[0].data
			   }, {
				   name: 'Cabang Jakarta Selatan',
				   data: data.data.stock_product.datasets[1].data
			   }],
			   chart: {
				   type: 'bar',
				   height: 350,
				   toolbar: {
					   show: false
				   }
			   },
			   plotOptions: {
				   bar: {
					   horizontal: false,
					   columnWidth: ['30%'],
					   endingShape: 'rounded'
				   },
			   },
			   legend: {
				   show: false
			   },
			   dataLabels: {
				   enabled: false
			   },
			   stroke: {
				   show: true,
				   width: 2,
				   colors: ['transparent']
			   },
			   xaxis: {
				   categories: ['Total Barang Yang Sudah Terjual / Cabang', 'Total Barang Yang Masih Tersedia / Cabang'],
				   axisBorder: {
					   show: false,
				   },
				   axisTicks: {
					   show: false
				   },
				   labels: {
					   style: {
						   colors: KTApp.getSettings()['colors']['black'],
						   fontSize: '14px',
						   fontFamily: KTApp.getSettings()['font-family']
					   }
				   }
			   },
			   yaxis: {
				   labels: {
					   style: {
						   colors: KTApp.getSettings()['colors']['black'],
						   fontSize: '12px',
						   fontFamily: KTApp.getSettings()['font-family']
					   }
				   }
			   },
			   fill: {
				   opacity: 1
			   },
			   states: {
				   normal: {
					   filter: {
						   type: 'none',
						   value: 0
					   }
				   },
				   hover: {
					   filter: {
						   type: 'none',
						   value: 0
					   }
				   },
				   active: {
					   allowMultipleDataPointsSelection: false,
					   filter: {
						   type: 'none',
						   value: 0
					   }
				   }
			   },
			   tooltip: {
				   style: {
					   fontSize: '12px',
					   fontFamily: KTApp.getSettings()['font-family']
				   },
				   y: {
					   formatter: function(val) {
						   return  val + " Barang"
					   }
				   }
			   },
			   colors: ['#F44336', '#E91E63'],
			   grid: {
				   borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
				   strokeDashArray: 4,
				   yaxis: {
					   lines: {
						   show: true
					   }
				   }
			   }
		   };

		   var chart = new ApexCharts(element, options);
		   chart.render();

		   // Chart JS Close
	   },
	   error: function(xhr, status, errorThrown) {
		   console.log(xhr, status, errorThrown);
	   }
   });

   // AJAX Close 
  
}

// Chart 2

 // Charts widgets
 var _initChartsWidget1 = function() {
   var element = document.getElementById("kt_charts_widget_1_chart");

   if (!element) {
	   return;
   }

   $.ajax({
	   url : "<?php echo base_url() ?>dashboard/index_get",
	   method : "GET",
	   dataType : 'json',
	   success: function(data){
		   // console.log(data.data.stock_branch_warehouse_cb_jt.labels[0]);
		   var options = {
			   series: [{
				   name: data.data.stock_branch_warehouse_cb_jt.labels[0],
				   data: data.data.stock_branch_warehouse_cb_jt.datasets[0].data
			   }, {
				   name: data.data.stock_branch_warehouse_cb_js.labels[0],
				   data: data.data.stock_branch_warehouse_cb_js.datasets[0].data
			   }],
			   chart: {
				   type: 'bar',
				   height: 350,
				   toolbar: {
					   show: false
				   }
			   },
			   plotOptions: {
				   bar: {
					   horizontal: false,
					   columnWidth: ['30%'],
					   endingShape: 'rounded'
				   },
			   },
			   legend: {
				   show: false
			   },
			   dataLabels: {
				   enabled: false
			   },
			   stroke: {
				   show: true,
				   width: 2,
				   colors: ['transparent']
			   },
			   xaxis: {
				   categories: ['Jakarta Timur', 'Jakarta Selatan'],
				   axisBorder: {
					   show: false,
				   },
				   axisTicks: {
					   show: false
				   },
				   labels: {
					   style: {
						   colors: KTApp.getSettings()['colors']['black'],
						   fontSize: '12px',
						   fontFamily: KTApp.getSettings()['font-family']
					   }
				   }
			   },
			   yaxis: {
				   labels: {
					   style: {
						   colors: KTApp.getSettings()['colors']['gray']['gray-500'],
						   fontSize: '12px',
						   fontFamily: KTApp.getSettings()['font-family']
					   }
				   }
			   },
			   fill: {
				   opacity: 1
			   },
			   states: {
				   normal: {
					   filter: {
						   type: 'none',
						   value: 0
					   }
				   },
				   hover: {
					   filter: {
						   type: 'none',
						   value: 0
					   }
				   },
				   active: {
					   allowMultipleDataPointsSelection: false,
					   filter: {
						   type: 'none',
						   value: 0
					   }
				   }
			   },
			   tooltip: {
				   style: {
					   fontSize: '12px',
					   fontFamily: KTApp.getSettings()['font-family']
				   },
				   y: {
					   formatter: function(val) {
						   return val + " barang"
					   }
				   }
			   },
			   colors: ['#1BC5BD','#81d4fa'],
			   grid: {
				   borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
				   strokeDashArray: 4,
				   yaxis: {
					   lines: {
						   show: true
					   }
				   }
			   }
		   };

		   var chart = new ApexCharts(element, options);
		   chart.render();
	   },
	   error: function(xhr, status, errorThrown) {
		   console.log(xhr, status, errorThrown);
	   }
   });

}

</script>