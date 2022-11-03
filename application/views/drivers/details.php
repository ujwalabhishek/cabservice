<style>
    .card-user .image {
        height: auto;
    }
</style>
<div class="row">
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img src="<?php print base_url(); ?>assets/img/faces/<?php echo $driver_data['image_url']; ?>" alt="...">
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Driver Details</h5>
                <p><?php echo validation_errors(); ?>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo site_url('Drivers/update'); ?>" class="form">
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" value="<?php echo $driver_data['driver_id']; ?>" name="driver_id">
                                <input type="text" class="form-control" disabled="" placeholder="Name" value="<?php echo $driver_data['name']; ?>" name="name">
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" disabled="" placeholder="Email" value="<?php echo $driver_data['email']; ?>" name="email">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile No</label>
                                <input type="text" class="form-control" disabled="" placeholder="Mobile No" value="<?php echo $driver_data['mob_no']; ?>" name="mob_no">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" disabled="" class="form-control" placeholder="Gender">
                                    <option value="M" <?php if ($driver_data['gender'] == "M") {
                                                            echo "selected";
                                                        }; ?>>Male</option>
                                    <option value="F" <?php if ($driver_data['gender'] == "F") {
                                                            echo "selected";
                                                        }; ?>>Female</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Car</label>
                                <!-- Display only unassigned cars in the update form dropdown for car -->
                                <select name="car_reg_id" class="form-control" placeholder="Registration No" disabled="">
                                    <option value="<?php echo $driver_data['car_reg_id']; ?>" selected><?php echo $driver_data['car_reg_id']; ?></option>
                                    <?php foreach ($car_reg_id_unassigned as $value) { ?>
                                        <option value="<?php echo $value['car_reg_id']; ?>" <?php echo $driver_data['car_reg_id'] == $value['car_reg_id'] ? "selected" : ""; ?>><?php echo $value['car_reg_id'] . " - " . $value['model']; ?></option>
                                    <?php    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Ratings</label>
                                <select name="rating" class="form-control" placeholder="Rating" disabled="">
                                    <option value="1" <?php echo $driver_data['rating'] == "1" ? "selected" : ""; ?>>Poor</option>
                                    <option value="2" <?php echo $driver_data['rating'] == "2" ? "selected" : ""; ?>>Average</option>
                                    <option value="3" <?php echo $driver_data['rating'] == "3" ? "selected" : ""; ?>>Good</option>
                                    <option value="4" <?php echo $driver_data['rating'] == "4" ? "selected" : ""; ?>>Very Good</option>
                                    <option value="5" <?php echo $driver_data['rating'] == "5" ? "selected" : ""; ?>>Excellent</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <?php echo anchor('Drivers/edit/' . $driver_data['driver_id'], '<i class="nc-icon nc-ruler-pencil"></i> Edit', 'class="btn btn-primary"'); ?>
                            <?php echo anchor('Drivers/delete/' . $driver_data['driver_id'], '<i class="nc-icon nc-simple-remove"></i> Delete', 'class="btn btn-danger"'); ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>