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
                                <a href="<?php print site_url('Trip/mytrips'); ?>" class="btn btn-primary ">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>

    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
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
                                        for ($i = 1; $i <= 5; $i++) {
                                            $starimg = ($i <= $trip_data['trip_rating']) ? 'star.png' : 'staro.png';
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

                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">

                        <h5 class="card-title">Enter your trip feedback</h5>
                    </div>
                    <form method="post" action="<?php echo site_url('Trip/update'); ?>">
                        <div class="card-body ">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Enter Trip Ratings</label>
                                        <select name="trip_rating" class="form-control" placeholder="Rating" focus="1">
                                            <option value="" <?php echo $trip_data['trip_rating'] == "" ? "selected" : ""; ?>>Enter Ratings</option>
                                            <option value="1" <?php echo $trip_data['trip_rating'] == "1" ? "selected" : ""; ?>>Poor</option>
                                            <option value="2" <?php echo $trip_data['trip_rating'] == "2" ? "selected" : ""; ?>>Average</option>
                                            <option value="3" <?php echo $trip_data['trip_rating'] == "3" ? "selected" : ""; ?>>Good</option>
                                            <option value="4" <?php echo $trip_data['trip_rating'] == "4" ? "selected" : ""; ?>>Very Good</option>
                                            <option value="5" <?php echo $trip_data['trip_rating'] == "5" ? "selected" : ""; ?>>Excellent</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Lave your valuable comments</label>
                                        <textarea class="form-control textarea" name="trip_feedback"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" name="trip_id" value="<?php echo $trip_data['trip_id']; ?>" />
                                        <input type="submit" value="Submit Feedback" class="btn"/>
                                    </div>
                                </div>
                            </div>                
                        </div>
                        
               
                           
                    </form>
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

<?php }  ?>