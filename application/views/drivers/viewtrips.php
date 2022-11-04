<?php //print_r($trip_data);exit; 
?>
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



<!-- Start of Active Trip Requests -->
<?php if (!empty($trip_data)) { ?>
    <div class="row" id="activetrips">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ongoing Trip</h4>
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
                                        Name
                                    </th>
                                    <th>
                                        Mobile
                                    </th>
                                    <th>
                                        Gender
                                    </th>
                                    <th>
                                        Pickup
                                    </th>
                                    <th>
                                        Drop
                                    </th>
                                    <th class="text-center">
                                        Start Time
                                    </th>
                                    <th class="text-center">
                                        Start Kms
                                    </th>
                                    <th class="text-center">
                                        End Trip
                                    </th>
                                </tr>
                            </thead>

                            <tbody>


                                <?php
                                //print_r($trip_data);
                                foreach ($trip_data as $value) {
                                    if ($value['status'] == 'Active') {
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo anchor("Trip/details/{$value['trip_id']}", $value['trip_id'], 'class="nav-link" title="Click to view trip details" '); ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_mobile']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_gender'] == 'M' ? 'Male' : 'Female'; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['pickup_location']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $value['drop_location']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo date_format(date_create($value['trip_start_datetime']), "d/m/Y h:i A"); ?>
                                            </td>
                                            <td class="text-center">
                                            <?php echo $value['start_km']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                echo anchor("Trip/commence_trip_by_driver/{$value['trip_id']}/End", 'End Trip', 'class="btn btn-sm btn-primary" title="End Ride" ');
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
<?php } ?>
<!-- End of Active Trip Requests  -->

<!-- Start of Pending Trip Requests -->
<?php if (!empty($trip_data)) { ?>
    <div class="row" id="pendingtrips">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pending Trip Requests</h4>
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
                                        Name
                                    </th>
                                    <th>
                                        Mobile
                                    </th>
                                    <th>
                                        Gender
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
                                        Accept Trip
                                    </th>
                                    <th class="text-center">
                                        Reject Trip
                                    </th>
                                </tr>
                            </thead>

                            <tbody>


                                <?php
                                //print_r($trip_data);
                                foreach ($trip_data as $value) {
                                    if (empty($value['status'])) {
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo anchor("Trip/details/{$value['trip_id']}", $value['trip_id'], 'class="nav-link" title="Click to view trip details" '); ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_mobile']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_gender'] == 'M' ? 'Male' : 'Female'; ?>
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
                                                <?php
                                                echo anchor("Trip/updatetrip_by_driver/{$value['trip_id']}/Accept", 'Accept', 'class="btn btn-sm btn-success" title="Accept Ride" ');
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                echo anchor("Trip/updatetrip_by_driver/{$value['trip_id']}/Reject", 'Reject', 'class="btn btn-sm btn-danger" title="Accept Ride" ');
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
<?php } ?>
<!-- End of Pending Trip Requests  -->
<!-- Start of Upcoming trips  -->
<?php if (!empty($trip_data)) { ?>
    <div class="row" id="upcomingtrips">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Upcoming Trips</h4>
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
                                        Name
                                    </th>
                                    <th>
                                        Mobile
                                    </th>
                                    <th>
                                        Gender
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
                                        Start Trip
                                    </th>
                                    <!-- <th class="text-center">
                                        End Trip
                                    </th> -->

                                </tr>
                            </thead>

                            <tbody>


                                <?php
                                //print_r($trip_data);
                                foreach ($trip_data as $value) {
                                    if ($value['status'] == 'Accept') {
                                ?>
                                        <tr>
                                        <td>
                                                <?php echo anchor("Trip/details/{$value['trip_id']}", $value['trip_id'], 'class="nav-link" title="Click to view trip details" '); ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_mobile']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_gender'] == 'M' ? 'Male' : 'Female'; ?>
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
                                                <?php
                                                echo anchor("Trip/commence_trip_by_driver/{$value['trip_id']}/Start", 'Start', 'class="btn btn-sm btn-success" title="Start Ride" ');
                                                ?>
                                            </td>
                                            <!-- <td class="text-center">
                                                <?php
                                                echo anchor("Trip/commence_trip_by_driver/{$value['trip_id']}/End", 'End', 'class="btn btn-sm btn-danger" title="End Ride" ');
                                                ?>
                                            </td> -->
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
<?php } ?>
<!-- End of Upcoming trips  -->


<!-- Start of Completed trips  -->
<?php if (!empty($trip_data)) { ?>
    <div class="row" id="completedtrips">
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
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Mobile
                                    </th>
                                    <th>
                                        Gender
                                    </th>
                                    <th>
                                        Pickup
                                    </th>
                                    <th>
                                        Drop
                                    </th>
                                    <th class="text-center">
                                        Start Time
                                    </th>
                                    <th class="text-center">
                                        End Time
                                    </th>
                                    <th class="text-center">
                                        Start Km
                                    </th>
                                    <th class="text-center">
                                        End Km
                                    </th>
                                    <th class="text-center">
                                        Bill
                                    </th>
                                    <th class="text-center">
                                        Payment
                                    </th>
                                </tr>
                            </thead>

                            <tbody>


                                <?php
                                //print_r($trip_data);
                                foreach ($trip_data as $value) {
                                    if ($value['status'] == 'Completed') {
                                ?>
                                        <tr>
                                        <td>
                                                <?php echo anchor("Trip/details/{$value['trip_id']}", $value['trip_id'], 'class="nav-link" title="Click to view trip details" '); ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_mobile']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_gender'] == 'M' ? 'Male' : 'Female'; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['pickup_location']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $value['drop_location']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $value['trip_start_datetime']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $value['trip_end_datetime']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $value['start_km']; ?>
                                            </td>
                                           
                                            <td class="text-center">
                                                <?php echo $value['end_km']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $value['trip_cost']; ?>
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
<?php } ?>
<!-- End of Completed trips  -->


<!-- Cancelled trips  -->
<?php if (!empty($trip_data)) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cancelled Trips</h4>
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
                                        Passenger Name
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

                                </tr>
                            </thead>

                            <tbody>


                                <?php
                                //print_r($trip_data);
                                foreach ($trip_data as $value) {
                                    if ($value['status'] == 'Reject' || $value['status'] == 'Usercancelled' || $value['status'] == 'Drivercancelled') {

                                ?>
                                        <tr>
                                            <td>
                                                <?php echo anchor("Trip/details/{$value['trip_id']}", $value['trip_id'], 'class="nav-link" title="Click to view trip details" '); ?>
                                            </td>
                                            <td>
                                                <?php echo $value['passenger_name']; ?>
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
<?php } ?>
<!-- End of Cancelled trips  -->