<style>
    .table-responsive {
        overflow: auto !important;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cab Inventory</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Registration Number
                                </th>
                                <th >
                                    Make
                                </th>
                                <th>
                                    Color
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Rate
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($car_data as $value) { ?>
                                <tr>
                                    <td>
                                    <?php echo anchor("Car/details/{$value['car_reg_id']}", $value['car_reg_id'], 'class="nav-link" title="View" '); ?>
                                    </td>
                                    <td>
                                        <?php echo $value['model']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['color']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['category']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['rate_per_km']; ?>
                                    </td>
                                    <td>
                                    <?php echo anchor("Car/edit/{$value['car_reg_id']}", '<i class="nc-icon nc-ruler-pencil"></i>', 'class="nav-link" title="Edit" '); ?>
                                    </td>
                                    <td>
                                    <?php echo anchor("Car/delete/{$value['car_reg_id']}", '<i class="nc-icon nc-simple-remove"></i>', 'class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" title="Delete" '); ?>


                                    
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>