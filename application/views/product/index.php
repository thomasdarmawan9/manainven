<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h2 mt-4>Product</h2>
            <?php if($this->session->flashdata('flash')): ?>
            <div class="row mt-3">
                <div class="col-md-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Product<strong>Was Succesfully</strong> <?php echo $this->session->flashdata('flash'); ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <div class="row">
                <div class="col-xl">
                    <!--begin::Advance Table Widget 2-->
                    <div class="card card-custom gutter-b card-stretch card-shadowless bg-light">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <div class="">
                                <a type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#addproduct">Tambah Produk</a>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-3 pb-0">

                            <div class="table-responsive">
                                <table class="table table-border table-vertical-center" id="table_product">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th scope="col">Product Code</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>


                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 2-->
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    productData();
    function productData(){
                    
        var t = $('#table_product').DataTable({
                    
                        
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],

            "order": [[ 1, 'asc' ]]

            });

            t.on( 'draw.dt', function () {
                var PageInfo = $('#table_product').DataTable().page.info();
                t.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
                } );
                } );
            }
});

</script>