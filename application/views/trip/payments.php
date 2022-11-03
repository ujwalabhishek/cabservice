<style>
    .table-responsive {
        overflow: auto !important;
    }

    .card-user .image {
        height: auto;
    }

    .staro {
        width: 25px;
        padding: 5px
    }
</style>
<!-- Completed trips -->
<?php if (!empty($trip_data)) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Completed Trips</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Trip ID
                                    </th>
                                    <th>
                                        Driver Name
                                    </th>
                                    <th>
                                        Car No
                                    </th>
                                    <th>
                                        Pickup
                                    </th>
                                    <th>
                                        Drop
                                    </th>
                                    <th class="text-center">
                                        Trip Time
                                    </th>
                                    <th class="text-center">
                                        Trip Cost
                                    </th>

                                    <th class="text-center">
                                        Payment
                                    </th>
                                    <th class="text-center">
                                        Ratings
                                    </th>
                                </tr>
                            </thead>

                            <tbody>


                                <?php
                                foreach ($trip_data as $value) {
                                    if ($value['status'] == 'Completed') {
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo anchor("Trip/details/{$value['trip_id']}", $value['trip_id'], 'class="nav-link" title="Click to view trip details" '); ?>
                                            </td>
                                            <td>
                                                <?php echo $value['name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['car_reg_id']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['pickup_location']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $value['drop_location']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo date_format(date_create($value['trip_datetime']), "d/m/Y h:i A"); ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo !empty($value['trip_cost']) ? $value['trip_cost'] : "NA"; ?>
                                            </td>
                                            <td class="text-center">
                                            <?php 
                                                if(empty($value['trip_cost'])){
                                                    echo 'NA';
                                                } else{
                                                echo (!empty($value['customer_payment']) and ($value['trip_cost'] == $value['customer_payment'])) ? 'Paid' : anchor("Trip/pay/{$value['trip_id']}", 'Pay', 'class="btn btn-sm" title="Make Payment" '); 
                                                }  
                                                ?>  
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if (!empty($value['trip_rating'])) {
                                                    for ($i = 0; $i <= 5; $i++) {
                                                        $starimg = ($i <= $value['trip_rating']) ? 'star.png' : 'staro.png';
                                                        echo "<img src='" . base_url() . "assets/img/bg/" . $starimg . "' class='staro'/>";
                                                    }
                                                } else {
                                                        echo anchor("Trip/feedback/{$value['trip_id']}", 'Rate Now', 'class="btn btn-sm" title="Please provide ratings" ');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php }else{

} ?>
<!-- End Completed Trips  -->