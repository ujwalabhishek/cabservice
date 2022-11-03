<style>
    .table-responsive {
        overflow: auto !important;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cab Users</h4>
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
                            foreach ($user_data as $value) { ?>
                                <tr>
                                    <td >
                                        <?php echo anchor("Users/details/{$value['user_id']}", $value['name'], 'class="nav-link" title="View User Details" '); ?>
                                    </td>
                                    <td>
                                        <?php echo $value['gender'] == "M" ? "Male":"Female"; ?>
                                    </td>
                                    <td>
                                        +91-<?php echo $value['mobile_no']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['email']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $value['rating']; ?>
                                    </td> 
                                    <td class="text-center">   
                                    <?php echo anchor("Users/edit/{$value['user_id']}", '<i class="nc-icon nc-ruler-pencil"></i>', 'class="nav-link" title="Edit" '); ?>
                                    </td>
                                    <td class="text-center">
                                    <?php echo anchor("Users/delete/{$value['user_id']}", '<i class="nc-icon nc-simple-remove"></i>', 'class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" title="Delete" '); ?>
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