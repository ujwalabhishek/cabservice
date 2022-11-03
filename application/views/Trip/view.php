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
<div class="content">

    <div class="row">
        <?php if (!empty($trip_data)) { ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Upcoming Trips</h4>
                    </div>
                </div>
            </div>
            <?php
            $statusArray = array(
                '' => "Trip pending confirmation from driver",
                'Active' => "This trip is in progress.",
                'Accept' => "Trip confirmed by driver",
                'Reject' => "Trip declined by driver.",
                'Completed' => "Trip completed.",
                'Usercancelled' => "Cancelled by user.",
                'Drivercancelled' => "Cancelled by driver"
            );
            foreach ($trip_data as $value) {
                if ($value['status'] == 'Accept' || $value['status'] == 'Active' || empty($value['status'])) {
            ?>
                    <div class="col-md-6">
                        <div class="card card-user">
                            <div class="image">
                                <img src="<?php print base_url(); ?>assets/img/carimages/<?php echo isset($value['car_image']) ? $value['car_image'] : "getImage.png"; ?>" alt="...">
                            </div>
                            <div class="card-body" style="padding: 0px 40px;">
                                <div class="author">
                                    <div class="row text-left">
                                        <div class="col-6 text-center">
                                            <a href="#">
                                                <img class="avatar border-gray" src="<?php print base_url(); ?>assets/img/mike.jpg" alt="...">
                                                <h5 class="title"><?php echo $value['name']; ?></h5>
                                            </a>
                                        </div>
                                        <div class="col-6 text-left" style="padding-top:50px">
                                            <p class="description email"><?php echo $value['email']; ?></p>
                                            <p class="description phone"> <?php echo $value['mob_no']; ?></p>
                                            <p class="description rating">
                                                <?php
                                                for ($i = 0; $i <= 5; $i++) {
                                                    $starimg = ($i <= $value['rating']) ? 'star.png' : 'staro.png';
                                                    echo "<img src='" . base_url() . "assets/img/bg/" . $starimg . "' class='staro'/>";
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row text-left">
                                        <div class="col-6 text-left">
                                            <small>Reg No</small><br><?php echo $value['car_reg_id']; ?><br>
                                        </div>
                                        <div class="col-6">
                                            <small>Make</small><br><?php echo $value['model']; ?><br>
                                        </div>
                                    </div>
                                    <div class="row text-left" style="margin-top:15px">
                                        <div class="col-6 text-left">
                                            <small>Car Type</small><br><?php echo $value['category']; ?><br>
                                        </div>
                                        <div class="col-6">
                                            <h5>Rs <?php echo $value['rate_per_km']; ?>/km</h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row text-left " style="margin-bottom:10px">
                                        <div class="col-6">
                                            <b>Pickup: </b><?php echo $value['pickup_location']; ?>
                                        </div>
                                        <div class="col-6 ">
                                            <b>Drop: </b><?php echo $value['drop_location']; ?>
                                        </div>
                                    </div>
                                    <div class="row text-left" style="margin-bottom:10px">
                                        <div class="col-12 ml-auto">
                                            <b>Trip Time: </b><?php echo date_format(date_create($value['trip_datetime']), "d/m/Y h:i A"); ?>
                                        </div>

                                        <div class="col-12 ml-auto" style="margin-bottom:10px">
                                            <b>Status: </b><?php echo $statusArray[$value['status']]; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="padding: 0px 40px; min-height:auto">

                                <?php if ($value['status'] == 'Accept' || $value['status'] == '') { ?>
                                    <hr>
                                    <div class="button-container">
                                        <div class="row">
                                            <div class="col-12 ml-auto" style='margin-bottom:10px'>
                                                <a href="<?php echo site_url('Trip/cancel/' . $value['trip_id']); ?>" class="btn btn-warning">Cancel Booking</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

        <?php }
            }
        } ?>
    </div>
</div>

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
                                //print_r($trip_data);
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
                                                if (empty($value['trip_cost'])) {
                                                    echo 'NA';
                                                } else {
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
<?php } ?>
<!-- End Completed Trips  -->
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