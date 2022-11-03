<style>
    .card-user .image {
        height: auto;
    }

    .staro {
        width: 25px;
        padding: 5px
    }
</style>
<form method="post" action="<?php echo site_url('Trip/save'); ?>">
<div class="row">
    <div class="col-md-6">
        <div class="card card-user">
            <div class="image">
                <img src="<?php print base_url(); ?>assets/img/carimages/<?php echo isset($car_data['car_image']) ? $car_data['car_image'] : "getImage.png"; ?>" alt="...">
            </div>
            <div class="card-body" style="padding: 0px 40px; min-height:auto">
                <div class="author">
                    <div class="row text-left">
                        <div class="col-6 text-center">
                            <a href="#">
                                <img class="avatar border-gray" src="<?php print base_url(); ?>assets/img/mike.jpg" alt="...">
                                <h5 class="title"><?php echo $car_data['name']; ?></h5>
                            </a>
                        </div>
                        <div class="col-6 text-left" style="padding-top:50px">
                            <p class="description email"><?php echo $car_data['email']; ?></p>
                            <p class="description phone"> <?php echo $car_data['mob_no']; ?></p>
                            <p class="description rating">
                                <?php
                                for ($i = 0; $i <= 5; $i++) {
                                    $starimg = ($i <= $car_data['rating']) ? 'star.png' : 'staro.png';
                                    echo "<img src='" . base_url() . "assets/img/bg/" . $starimg . "' class='staro'/>";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="row text-left">
                        <div class="col-6 text-left">
                            <small>Reg No</small><br><?php echo $car_data['car_reg_id']; ?><br>
                        </div>
                        <div class="col-6">
                            <small>Make</small><br><?php echo $car_data['model']; ?><br>
                        </div>
                    </div>
                    <div class="row text-left" style="margin-top:15px">
                        <div class="col-6 text-left">
                            <small>Car Type</small><br><?php echo $car_data['category']; ?><br>
                        </div>
                        <div class="col-6">
                            <h5>Rs <?php echo $car_data['rate_per_km']; ?>/km</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <hr>
                <div class="button-container">
                    <div class="row">
                        <div class="col-12 ml-auto">
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                                <input type="hidden" name="driver_id" value="<?php echo $car_data['driver_id']; ?>" />
                                <input type="submit" class="btn  " value="Confirm Booking" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-5">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Pickup Location</h5>
                    </div>
                    <div class="card-body">
                        <?php echo form_error('pickup_location', '<div class="error">', '</div>'); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Whitefeild" name="pickup_location" value="<?php echo $pickup_location; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Drop Location</h5>
                    </div>
                    <div class="card-body ">
                        <?php echo form_error('drop_location', '<div class="error">', '</div>'); ?>
                        <div class="form-group">
                            <input type="text" class="form-control " placeholder="Marathalli" name="drop_location" value="<?php echo $drop_location; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">DateTime</h5>
                    </div>
                    <div class="card-body ">
                    <?php echo form_error('trip_datetime', '<div class="error">', '</div>'); ?>
                        <div class="form-group">
                            <input type="text" class="form-control datetimepicker" value="<?php echo $trip_datetime; ?>" name="trip_datetime">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
