<div class="page-content">

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Editable Table</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="landing-page/dashboard.php">Simpleray-Exports</a></li>
                            <li class="breadcrumb-item"><a
                                    href="products/products-list/display-products.php">Products</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Select & Edit</h4>
                            <p class="card-title-desc">Search the required product and edit by clicking on &nbsp; <i class="btn btn-outline-secondary btn-sm edi fas fa-pencil-alt"></i> &nbsp;.</p>

                            <div id="datatable" class="table-responsive">
                                <table class="table table-editable table-nowrap align-middle table-edits">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-id="1">
                                            <td data-field="id" style="width: 80px">1</td>
                                            <td data-field="name">David McHenry</td>
                                            <td data-field="age">24</td>
                                            <td data-field="gender">Male</td>
                                            <td style="width: 100px">
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr data-id="2">
                                            <td data-field="id">2</td>
                                            <td data-field="name">Frank Kirk</td>
                                            <td data-field="age">22</td>
                                            <td data-field="gender">Male</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr data-id="3">
                                            <td data-field="id">3</td>
                                            <td data-field="name">Rafael Morales</td>
                                            <td data-field="age">26</td>
                                            <td data-field="gender">Male</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr data-id="4">
                                            <td data-field="id">4</td>
                                            <td data-field="name">Mark Ellison</td>
                                            <td data-field="age">32</td>
                                            <td data-field="gender">Male</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr data-id="5">
                                            <td data-field="id">5</td>
                                            <td data-field="name">Minnie Walter</td>
                                            <td data-field="age">27</td>
                                            <td data-field="gender">Female</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div>

    </div>

</div>