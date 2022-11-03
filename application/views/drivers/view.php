<style>
    .table-responsive {
        overflow: auto !important;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cab Drivers</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th >
                                    Gender
                                </th>
                                <th>
                                    Mobile No
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Ratings
                                </th>
                                <th class="text-center">
                                    Car
                                </th>
                                <th class="text-center">
                                    Edit
                                </th>
                                <th class="text-center">
                                    Delete
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                        
                            <?php 
                            //print_r($driver_data);
                            foreach ($driver_data as $value) { ?>
                                <tr>
                                    <td >
                                        <?php echo anchor("Drivers/details/{$value['driver_id']}", $value['name'], 'class="nav-link" title="View Driver Details" '); ?>
                                    </td>
                                    <td>
                                        <?php echo $value['gender'] == "M" ? "Male":"Female"; ?>
                                    </td>
                                    <td>
                                        +91-<?php echo $value['mob_no']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['email']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $value['rating']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo anchor("Car/details/{$value['car_reg_id']}", $value['car_reg_id'], 'class="nav-link" title="View Car Details" '); ?>
                                    </td> 
                                    <td class="text-center">   
                                    <?php echo anchor("Drivers/edit/{$value['driver_id']}", '<i class="nc-icon nc-ruler-pencil"></i>', 'class="nav-link" title="Edit" '); ?>
                                    </td>
                                    <td class="text-center">
                                    <?php echo anchor("Drivers/delete/{$value['driver_id']}", '<i class="nc-icon nc-simple-remove"></i>', 'class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" title="Delete" '); ?>
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