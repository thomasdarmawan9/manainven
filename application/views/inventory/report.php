<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container pt-5 mt-4">
			<!--begin::Dashboard-->
			<!--begin::Row-->
			<div class="row pt-5">
				<div class="col-xl pt-5">
					<!--begin::Engage Widget 8-->
					<div class="card card-custom gutter-b card-stretch card-shadowless">
						<div class="card-body p-0 d-flex">
							<div class="d-flex align-items-start justify-content-start flex-grow-1 bg-light-warning p-8 card-rounded flex-grow-1 position-relative" style="background-color: #bbdefb  !important">
								<div class="d-flex flex-column align-items-start flex-grow-1 h-100">
									<div class="p-1 flex-grow-1">
										<h1 class="text-warning font-weight-bolder">Data Report</h1>
										<!-- <p class="text-dark-50 font-weight-bold mt-3">Cabang</p> -->
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

			<div class="row">
				<div class="col-xl">
					<!--begin::Advance Table Widget 2-->
					<div class="card card-custom gutter-b card-stretch card-shadowless bg-light">
					    <!--begin::Header-->
					    <div class="card-header border-0 pt-5">
							<div class="">
								<!-- <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpc">Tambah Produk Cabang</a> -->
                                <select class="form-control" name="filter" id="filter">
                                    <option value="harian">Semua</option>
                                    <option value="mingguan">Minggu ini</option>
                                    <option value="bulanan">bulan ini</option>
                                </select>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-3 pb-0">
							<!--begin::Table-->
							<div class="table-responsive">
								<table class="table table-border table-vertical-center" id="table_report">
									<thead>
										<tr>
                                            <th scope="col">No</th>
                                            <th scope="col">PCODE</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Produck Name</th>
                                            <th scope="col">Unit Sold</th>
                                            <th scope="col">Unit Cost</th>
                                            <th scope="col">Total</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
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


<script>
    $(document).ready(function() {
        cabangData();
        
        $('#filter').change(function(){ 
                    
                    var filter = $('select[name=filter] option').filter(':selected').val();
                    // console.log(filter);
                    // console.log(productCode);
                    if("<?php echo $this->session->userdata('roles') != "owner" ?>"){
                        $.ajax({
                            url : "<?php echo base_url() ?>/inventory/getBranchData?branch=<?php echo $this->session->userdata('branchID') ?>&filter="+filter,
                            method : "GET",
                            dataType : 'json',
                            success: function(data){
                                $('#table_report').DataTable().destroy();
                                var t = $('#table_report').DataTable({

                                "ajax": {
                                    url : "<?php echo base_url() ?>/inventory/getBranchData?branch=<?php echo $this->session->userdata('branchID') ?>&filter="+filter,
                                    type : 'GET'
                                },
                                //Set column definition initialisation properties.
                                "columns": [
                                    {"data": "product_code"},
                                    {"data": "product_code"},
                                    {"data": "date"},
                                    {"data": "product_name"},
                                    {"data": "unit_sold"},
                                    {"data": "unit_cost"},
                                    {"data": "total"}
                                ],
                                "columnDefs": [ {
                                    "searchable": false,
                                    "orderable": false,
                                    "targets": 0
                                } ],
                                "order": [[ 1, 'asc' ]]
                                });

                                t.on( 'draw.dt', function () {
                                var PageInfo = $('#table_report').DataTable().page.info();
                                t.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                                    cell.innerHTML = i + 1 + PageInfo.start;
                                } );
                                } );
                            },
                            error: function(xhr, status, errorThrown) {
                                console.log(xhr, status, errorThrown);
                            }
                        });
                    }else{
                        $.ajax({
                            url : "<?php echo base_url() ?>/inventory/getBranchDataOwner?filter="+filter,
                            method : "GET",
                            dataType : 'json',
                            success: function(data){
                                $('#table_report').DataTable().destroy();
                                var t = $('#table_report').DataTable({

                                "ajax": {
                                    url : "<?php echo base_url() ?>/inventory/getBranchDataOwner?filter="+filter,
                                    type : 'GET'
                                },
                                //Set column definition initialisation properties.
                                "columns": [
                                    {"data": "product_code"},
                                    {"data": "product_code"},
                                    {"data": "date"},
                                    {"data": "product_name"},
                                    {"data": "unit_sold"},
                                    {"data": "unit_cost"},
                                    {"data": "total"}
                                ],
                                "columnDefs": [ {
                                    "searchable": false,
                                    "orderable": false,
                                    "targets": 0
                                } ],
                                "order": [[ 1, 'asc' ]]
                                });

                                t.on( 'draw.dt', function () {
                                var PageInfo = $('#table_report').DataTable().page.info();
                                t.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                                    cell.innerHTML = i + 1 + PageInfo.start;
                                } );
                                } );
                            },
                            error: function(xhr, status, errorThrown) {
                                console.log(xhr, status, errorThrown);
                            }
                        });
                    }
                    
        });

        // table awal data
        function cabangData(){
            if("<?php echo $this->session->userdata('roles') != "owner" ?>"){
                var t = $('#table_report').DataTable({
                    
                    "ajax": {
                        url : "<?php echo base_url() ?>/inventory/getBranchData?branch=<?php echo $this->session->userdata('branchID') ?>&filter=harian",
                        type : 'GET'
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": "product_code"},
                        {"data": "product_code"},
                        {"data": "date"},
                        {"data": "product_name"},
                        {"data": "unit_sold"},
                        {"data": "unit_cost"},
                        {"data": "total"}
                    ],
                    "columnDefs": [ {
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    } ],
                    "order": [[ 1, 'asc' ]]
                    });
            }else{
                var t = $('#table_report').DataTable({
                    
                    "ajax": {
                        url : "<?php echo base_url() ?>/inventory/getBranchDataOwner?filter=harian",
                        type : 'GET'
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": "product_code"},
                        {"data": "product_code"},
                        {"data": "date"},
                        {"data": "product_name"},
                        {"data": "unit_sold"},
                        {"data": "unit_cost"},
                        {"data": "total"}
                    ],
                    "columnDefs": [ {
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    } ],
                    "order": [[ 1, 'asc' ]]
                });
            }
                    

                    t.on( 'draw.dt', function () {
                    var PageInfo = $('#table_report').DataTable().page.info();
                    t.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                        cell.innerHTML = i + 1 + PageInfo.start;
                    } );
                    } );
                    
                    }

    });
                 
</script>
                    
