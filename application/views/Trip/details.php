<style>
    .card-user .image {
        height: auto;
    }

    .staro {
        width: 25px;
        padding: 5px
    }
</style>
<?php
//print_r($trip_data);
?>
<?php if (empty($trip_data)) { ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-user">
                <div class="image">
                    <img src="<?php print base_url(); ?>assets/img/carimages/getImage.png" />
                </div>
                <div class="card-body" style="padding: 0px 40px; min-height:auto">
                    <div class="author">
                        <div class="row text-left">
                            <div class="col-6 text-center">
                                <a href="#">
                                    <img class="avatar border-gray" src="<?php print base_url(); ?>assets/img/mike.jpg" />
                                    <h5 class="title">NA</h5>
                                </a>
                            </div>
                            <div class="col-6 text-left" style="padding-top:50px">
                                <p class="description email">NA</p>
                                <p class="description phone"> NA</p>
                                <p class="description rating">
                                    <?php
                                    for ($i = 0; $i <= 5; $i++) {
                                        $starimg =  'staro.png';
                                        echo "<img src='" . base_url() . "assets/img/bg/" . $starimg . "' class='staro'/>";
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="row text-left">
                            <div class="col-6 text-left">
                                <small>Reg No</small><br>NA<br>
                            </div>
                            <div class="col-6">
                                <small>Make</small><br>NA<br>
                            </div>
                        </div>
                        <div class="row text-left" style="margin-top:15px">
                            <div class="col-6 text-left">
                                <small>Car Type</small><br>NA<br>
                            </div>
                            <div class="col-6">
                                <h5>NA</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="button-container">
                        <div class="row">
                            <div class="col-12 ml-auto">
                                <a href="<?php print site_url('Trip/'); ?>" class="btn btn-primary ">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <form method="post" action="<?php echo site_url('Trip/save'); ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-user">
                    <div class="image">
                        <img src="<?php print base_url(); ?>assets/img/carimages/<?php echo isset($trip_data['car_image']) ? $trip_data['car_image'] : "getImage.png"; ?>" alt="...">
                    </div>
                    <div class="card-body" style="padding: 0px 40px; min-height:auto">
                        <div class="author">
                            <div class="row text-left">
                                <div class="col-6 text-center">
                                    <a href="#">
                                        <img class="avatar border-gray" src="<?php print base_url(); ?>assets/img/mike.jpg" alt="...">
                                        <h5 class="title"><?php echo $trip_data['name']; ?></h5>
                                    </a>
                                </div>
                                <div class="col-6 text-left" style="padding-top:50px">
                                    <p class="description email"><?php echo $trip_data['email']; ?></p>
                                    <p class="description phone"> <?php echo $trip_data['mob_no']; ?></p>
                                    <p class="description rating">
                                        <?php
                                        for ($i = 0; $i <= 5; $i++) {
                                            $starimg = ($i <= $trip_data['rating']) ? 'star.png' : 'staro.png';
                                            echo "<img src='" . base_url() . "assets/img/bg/" . $starimg . "' class='staro'/>";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row text-left">
                                <div class="col-6 text-left">
                                    <small>Reg No</small><br><?php echo $trip_data['car_reg_id']; ?><br>
                                </div>
                                <div class="col-6">
                                    <small>Make</small><br><?php echo $trip_data['model']; ?><br>
                                </div>
                            </div>
                            <div class="row text-left" style="margin-top:15px">
                                <div class="col-6 text-left">
                                    <small>Car Type</small><br><?php echo $trip_data['category']; ?><br>
                                </div>
                                <div class="col-6">
                                    <h5>Rs <?php echo $trip_data['rate_per_km']; ?>/km</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <?php if ((( $trip_data['status'] == '' || $trip_data['status'] == 'Accept') and $this->session->userdata('role')=='user') || ($this->session->userdata('role')=='driver' and $trip_data['status'] == 'Accept')) { ?>
                            
                            <hr>
                            <div class="button-container">
                                <div class="row">
                                    <div class="col-12 ml-auto">
                                        <input type="hidden" name="user_id" value="<?php echo $trip_data['user_id']; ?>" />
                                        <input type="hidden" name="driver_id" value="<?php echo $trip_data['driver_id']; ?>" />
                                       
                                        <a href="<?php echo site_url('Trip/cancel/' . $trip_data['trip_id']); ?>" class="btn btn-danger">Cancel Booking</a>
                                   
                                    </div>
                                </div>
                            </div>
                            
                        <?php } ?>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card ">
                            <div class="card-header ">
                                <h5 class="card-title">Pickup Location</h5>
                            </div>
                            <div class="card-body">
                                <?php echo form_error('pickup_location', '<div class="error">', '</div>'); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly placeholder="Whitefeild" name="pickup_location" value="<?php echo $trip_data['pickup_location']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card ">
                            <div class="card-header ">
                                <h5 class="card-title">Drop Location</h5>
                            </div>
                            <div class="card-body ">
                                <?php echo form_error('drop_location', '<div class="error">', '</div>'); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control " readonly placeholder="Marathalli" name="drop_location" value="<?php echo $trip_data['drop_location']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card ">
                            <div class="card-header ">
                                <h5 class="card-title">DateTime</h5>
                            </div>
                            <div class="card-body ">
                                <?php echo form_error('trip_datetime', '<div class="error">', '</div>'); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control datetimepicker" readonly value="<?php echo date_format(date_create($trip_data['trip_datetime']), "d/m/Y h:i A"); ?>" name="trip_datetime">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card ">
                            <div class="card-header ">
                                <h5 class="card-title">Trip Status</h5>
                            </div>
                            <div class="card-body ">
                                <?php echo form_error('trip_datetime', '<div class="error">', '</div>'); ?>
                                <div class="form-group">
                                    <?php $statusArray = array(
                                        '' => "Trip pending confirmation from driver",
                                        'Active' => "This trip is in progress.",
                                        'Accept' => "Trip confirmed by driver",
                                        'Reject' => "Trip declined by driver.",
                                        'Completed' => "Trip completed.",
                                        'Usercancelled' => "Cancelled by user.",
                                        'Drivercancelled' => "Cancelled by driver"
                                    ); ?>
                                    <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
                                        <span data-notify="icon" class="nc-icon nc-chart-pie-36"></span>
                                        <span data-notify="message"><?php echo $statusArray[$trip_data['status']]; ?></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php }  ?>