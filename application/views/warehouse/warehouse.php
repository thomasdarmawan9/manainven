<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<!--begin::Row-->
			<div class="row pt-5">
				<div class="col-xl pt-4">
					<!--begin::Engage Widget 8-->
					<div class="card card-custom gutter-b card-stretch card-shadowless">
						<div class="card-body p-0 d-flex">
							<div class="d-flex align-items-start justify-content-start flex-grow-1 bg-light-warning p-8 card-rounded flex-grow-1 position-relative" style="background-color: #b2dfdb !important">
								<div class="d-flex flex-column align-items-start flex-grow-1 h-100">
									<div class="p-1 flex-grow-1">
										<h1 class="text-warning font-weight-bolder">Data <?php echo $this->session->userdata("warehouse") ?></h1>
										<p class="text-dark-50 font-weight-bold mt-3">Warehouse</p>
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
                        Product Branch <strong>Was Succesfully Added</strong> <?php echo $this->session->flashdata('flash'); ?>.
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
								<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpc">Tambah Produk Warehouse</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-3 pb-0">
							<!--begin::Table-->
							<div class="table-responsive">
								<table class="table table-border table-vertical-center" id="table_warehouse">
									<thead>
										<tr>
                                            <th scope="col">No</th>
                                            <th scope="col">PCODE</th>
                                            <th scope="col">Nama Produk</th>
                                            <?php if( $this->session->userdata('roles') == "owner"){ ?>
                                                <th scope="col">Warehouse</th>
                                                <?php } ?>
                                            <th scope="col">Stock</th>
                                            <th scope="col">Price</th>
                                            <th scope="col"></th>
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

<!-- Modal add product cabang -->
<!-- Modal -->
<div class="modal fade" id="addpc" tabindex="-1" aria-labelledby="addpc" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah product di Warehouse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form>
            <?php if($this->session->userdata('roles') == "owner"){ ?>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Pilih Warehouse</label>
                <select class="form-control" id="wid">
                        <option value="">Pilih Warehouse</option>
                        <option value="1">Warehouse Jakarta Timur</option>
                        <option value="3">Warehouse Jakarta Selatan</option>
                </select>
            </div>
        <?php }else{ ?>
            <input type="text" class="form-control" id="wid" value="<?php echo $this->session->userdata('branchID') ?>" hidden>
        <?php } ?>
        <div class="form-group">
        <label for="exampleFormControlSelect1">Code Barang</label>
            <input type="text" class="form-control" id="codebarang">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Nama Barang</label>
            <input type="text" class="form-control" id="namabarang">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stockbarang">
        </div>
        <div class="form-group">
            <label for="pricecabang">Price</label>
            <input type="number" class="form-control" id="pricebarang">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-submit-pb">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit product cabang -->
<!-- Modal -->
<div class="modal fade" id="updatepc" tabindex="-1" aria-labelledby="updatepc" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Edit product di Warehouse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="">
            <input type="text" class="form-control" name="id_pc" id="id_pc" hidden>
            <input type="text" class="form-control" name="pid" id="pid" hidden>
        <div class="form-group">
            <label for="stock">Product Code</label>
            <input type="text" class="form-control" name="pc_code_edit" id="pc_code_edit" >
        </div>
        <div class="form-group">
            <label for="stock">Product Name</label>
            <input type="text" class="form-control" name="pc_name_edit" id="pc_name_edit" >
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" name="editstockcabang" id="editstockcabang">
        </div>
        <div class="form-group">
            <label for="pricecabang">Price</label>
            <input type="number" class="form-control" name="editpricecabang" id="editpricecabang">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-edit-pb">Submit</button>
      </div>
    </div>
  </div>
</div>


<script>

			$(document).ready(function() {
                cabangData();
                var productCode = $("#pbarang").val();
                

                //ajax for PCODE
                $('#pbarang').change(function(){ 
                    
                    var productCode = $("#pbarang").val();
                    // console.log(productCode);
                    $.ajax({
                        url : "<?php echo base_url() ?>product/getProductByPCode",
                        method : "POST",
                        dataType : 'json',
                        data: {
                                'PCODE': productCode,
                        },
                        success: function(data){
                            // console.log(data.data.productID);
                            var html = '';
                            html += data.data.productCode+'<input type="text" id="vallpbarang" value="'+data.data.productID+'" hidden />';
                            $('#lpbarang').html(html);
                        },
                        error: function(xhr, status, errorThrown) {
                            console.log(xhr, status, errorThrown);
                        }
                    });
                });
                
                //ajax add product branch
                $("#btn-submit-pb").click(function() {
                    var wid = $("#wid").val();
                    var codebarang = $("#codebarang").val();
                    var namabarang = $("#namabarang").val();
                    var stockbarang = $("#stockbarang").val();
                    var pricebarang = $("#pricebarang").val();
                    $.ajax({
                        url : "<?php echo base_url() ?>warehouse/addWarehouseStock",
                        method : "POST",
                        dataType : 'json',
                        data: {
                                'id' : wid,
                                'productCode' : codebarang,
                                'productName': namabarang,
                                'stock': stockbarang,
                                'price': pricebarang,
                        },
                        success: function(data){
                            // console.log("data berhasil dibuat");
                            console.log(data);
                            if(data != "Failed"){
                                Swal.fire(
                                    'Recorded!',
                                    'Data Succesfully Added.',
                                    'success'
                                    )
                                $('#addpc').modal('toggle');
                                $('#table_warehouse').DataTable().destroy();
                                cabangData();
                                $("#codebarang").val("");
                                $("#pwarehouse").val("");
                                $("#namabarang").val("");
                                $("#stockbarang").val("");
                                $("#pricebarang").val("");
                            }else{
                                Swal.fire(
                                    'error',
                                    'Oops...',
                                    'Password anda salah!',
                                )
                                $('#addpc').modal('toggle');
                                $('#table_warehouse').DataTable().destroy();
                                cabangData();
                            }
                            
                        },
                        error: function(xhr, status, errorThrown) {
                            console.log(xhr, status, errorThrown);
                        }
                    });
                })


                function cabangData(){
                    if("<?php echo $this->session->userdata('roles') != "owner" ?>"){
                    var w = $('#table_warehouse').DataTable({
                    
                        "ajax": {
                            url : "<?php echo base_url() ?>/warehouse/getWarehouseProductByID/<?php echo $this->session->userdata('warehouseID') ?>",
                            type : 'GET'
                        },
                        //Set column definition initialisation properties.
                        "columns": [
                            {"data": "warehouseID"},
                            {"data": "productCode"},
                            {"data": "productName"},
                            {"data": "stock"},
                            {"data": "price"},
                            {
                                mRender: function (data, type, row) {
                                    return '<a class="table-edit dt-center editor-edit" data-id="' + row.warehouseID + '" data-product-id="' + row.productID + '" data-product-code="' + row.productCode + '" data-product-name="' + row.productName + '" data-stock="' + row.stock + '" data-price="' + row.price + '"><i class="fa fa-pen"></i></a>\
                                    &nbsp;\<a class="table-delete dt-center editor-delete" data-id="' + row.id + '" data-product-id="' + row.productID + '"><i class="fa fa-trash"></i></a>'
                                }
                            }
                        ],
                        "columnDefs": [ {
                            "searchable": false,
                            "orderable": false,
                            "targets": 0
                        } ],
                        "order": [[ 1, 'asc' ]]
                    });
                }else{
                    var w = $('#table_warehouse').DataTable({
                    
                        "ajax": {
                            url : "<?php echo base_url() ?>/warehouse/getWarehouseProductByIDOwner",
                            type : 'GET'
                        },
                        //Set column definition initialisation properties.
                        "columns": [
                            {"data": "warehouseID"},
                            {"data": "productCode"},
                            {"data": "productName"},
                            {"data": "warehouse"},
                            {"data": "stock"},
                            {"data": "price"},
                            {
                                mRender: function (data, type, row) {
                                    return '<a class="table-edit dt-center editor-edit" data-id="' + row.warehouseID + '" data-product-id="' + row.productID + '" data-product-code="' + row.productCode + '" data-product-name="' + row.productName + '" data-stock="' + row.stock + '" data-price="' + row.price + '"><i class="fa fa-pen"></i></a>\
                                    &nbsp;\<a class="table-delete dt-center editor-delete" data-id="' + row.id + '" data-product-id="' + row.productID + '"><i class="fa fa-trash"></i></a>'
                                }
                            }
                        ],
                        "columnDefs": [ {
                            "searchable": false,
                            "orderable": false,
                            "targets": 0
                        } ],
                        "order": [[ 1, 'asc' ]]
                    });
                }

                    w.on( 'draw.dt', function () {
                        var PageInfo = $('#table_warehouse').DataTable().page.info();
                        w.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                            cell.innerHTML = i + 1 + PageInfo.start;
                        } );
                    } );
                }

                //Update a record
                $('#table_warehouse').on('click', '.editor-edit', function () {
                    var id = $(this).attr("data-id");
                    var pid = $(this).attr("data-product-id");
                    var product_code = $(this).attr("data-product-code");
                    var product_name = $(this).attr('data-product-name');
                    var stock        = $(this).attr('data-stock');
                    var price        = $(this).attr('data-price');
                    
                    $('#updatepc').modal('show');
                    $('[name="id_pc"]').val(id);
                    $('[name="pid"]').val(pid);
                    $('[name="pc_code_edit"]').val(product_code);
                    $('[name="pc_name_edit"]').val(product_name);
                    $('[name="editstockcabang"]').val(stock);
                    $('[name="editpricecabang"]').val(price);
                });

                $("#btn-edit-pb").click(function() { 
                    var pid             = $("#pid").val();
                    var product_name    = $("#pc_name_edit").val();
                    var product_code    = $("#pc_code_edit").val();
                    var stock           = $("#editstockcabang").val();
                    var price           = $("#editpricecabang").val();
                    // console.log(pid);
                    // console.log(product_name);
                    // console.log(product_code);
                    // console.log(stock);
                    // console.log(price);
                    $.ajax({
                        url : "<?php echo base_url() ?>product/updateProduct",
                        method : "POST",
                        dataType : 'json',
                        data: {
                                'id' : pid,
                                'productName' : product_name,
                                'productCode' : product_code,
                                'stock': stock,
                                'price': price,
                        },
                        success: function(data){
                            // console.log(data);
                            Swal.fire(
                                    'Updated!',
                                    'Data Succesfully Updated.',
                                    'success'
                                    )
                            $('#updatepc').modal('toggle');
                            $('#table_warehouse').DataTable().destroy();
                            cabangData();
                        },
                        error: function(xhr, status, errorThrown) {
                            console.log(xhr, status, errorThrown);
                        }
                    });                    
                });


                // Delete a record
                  $('#table_warehouse').on('click', '.editor-delete', function () {
                        var id = $(this).attr("data-id");
                        var pid = $(this).attr("data-product-id");
                        Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                            url: '<?php echo base_url() ?>warehouse/deleteWarehouseStock',
                            type: 'POST',
                            data: { 
                                    request: 2, 
                                    id: id,
                                    pid: pid
                                  },
                            success: function(response){
                                // console.log(response);
                                if(response){
                                    Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    )
                                    $('#table_warehouse').DataTable().destroy();
                                    cabangData();
                                }else{
                                    alert("Invalid ID.");
                                    console.log(id);
                                }
                            },
                            error: function(xhr, status, errorThrown) {
                                console.log(xhr, status, errorThrown);
                            }
                            });
                            
                        }
                        })
                    } );

			});
		</script>
                    
