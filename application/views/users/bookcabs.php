<style>
    .card-user .image {
        height: auto;
    }

    .staro {
        width: 25px;
        padding: 5px
    }
</style>
<form method="post" action="<?php echo site_url('Users/bookcabs'); ?>" class="form">
    <div class="row">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Cab Type</h5>
                </div>
                <div class="card-body ">
                    <?php echo form_error('category', '<div class="error">', '</div>'); ?>
                    <div class="form-group">
                        <select name="category" class="form-control" placeholder="Category">
                            <option value="" <?php if (set_value('category') == "") {
                                                    echo "selected";
                                                }; ?>>Select</option>
                            <option value="SUV" <?php if (set_value('category') == "SUV") {
                                                    echo "selected";
                                                }; ?>>SUV</option>
                            <option value="SEDAN" <?php if (set_value('category') == "SEDAN") {
                                                        echo "selected";
                                                    }; ?>>Sedan</option>
                            <option value="MINI" <?php if (set_value('category') == "MINI") {
                                                        echo "selected";
                                                    }; ?>>Compact Mini</option>
                            <option value="MICRO" <?php if (set_value('category') == "MICRO") {
                                                        echo "selected";
                                                    }; ?>>Compact Micro</option>
                            <option value="LUX" <?php if (set_value('category') == "LUX") {
                                                    echo "selected";
                                                }; ?>>Luxury</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Pickup Location</h5>
                </div>
                <div class="card-body">
                    <?php echo form_error('pickup_location', '<div class="error">', '</div>'); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Whitefeild" name="pickup_location" value="<?php echo set_value('pickup_location'); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Drop Location</h5>
                </div>
                <div class="card-body ">
                    <?php echo form_error('drop_location', '<div class="error">', '</div>'); ?>
                    <div class="form-group">
                        <input type="text" class="form-control " placeholder="Marathalli" name="drop_location" value="<?php echo set_value('drop_location'); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">DateTime</h5>
                </div>
                <div class="card-body ">
                <?php echo form_error('trip_datetime', '<div class="error">', '</div>'); ?>
                    <div class="form-group">
                        <input type="text" class="form-control datetimepicker" placeholder="10/05/2018" name="trip_datetime" value="<?php echo set_value('trip_datetime'); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="update ml-auto mr-auto ">
            <input type="submit" class="btn btn-primary " value="Search Cabs" name="search">
        </div>
    </div>
</form>





<div class="content">
    <div class="row">
        <?php if (!empty($cab_data)) {
            foreach ($cab_data as $value) {
                //print_r($value);
        ?>
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image">
                            <img src="<?php print base_url(); ?>assets/img/carimages/<?php echo isset($value['car_image']) ? $value['car_image'] : "getImage.png"; ?>" alt="...">
                        </div>
                        <div class="card-body" style="padding: 0px 40px; min-height:auto">
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
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr>
                            <div class="button-container">
                                <div class="row">
                                    <div class="col-12 ml-auto">
                                        <form method="post" action="<?php echo site_url('Trip/create'); ?>">
                                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
                                            <input type="hidden" name="driver_id" value="<?php echo $value['driver_id']; ?>" />
                                            <input type="hidden" name="pickup_location" value="<?php echo $pickup_location; ?>" />
                                            <input type="hidden" name="drop_location" value="<?php echo $drop_location; ?>" />
                                            <input type="hidden" name="trip_datetime" value="<?php echo $trip_datetime; ?>" />
                                            <input type="submit" class="btn btn-warning " value="Book Now" name="book">
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>