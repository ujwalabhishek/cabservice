<style>
    .card-user .image {
        height: auto;
    }
</style>
<div class="row">
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img src="<?php print base_url(); ?>assets/img/carimages/<?php echo $car_data['car_image']; ?>" alt="...">
            </div>

            <div class="card-footer">
                <hr>
                <div class="button-container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-6 ml-auto">
                            <h5><?php echo $car_data['category']; ?><br><small>Type</small></h5>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                            <h5><?php echo $car_data['color']; ?><br><small>Color</small></h5>
                        </div>
                        <div class="col-lg-4 mr-auto">
                            <h5>$<?php echo $car_data['rate_per_km']; ?>/km<br><small>Rate</small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Driver Details</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled team-members">
                    <li>
                        <div class="row">
                            <div class="col-md-2 col-2">
                                <div class="avatar">
                                    <img src="<?php print base_url(); ?>assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                </div>
                            </div>
                            <div class="col-md-7 col-7">
                                DJ Khaled
                                <br />
                                <span class="text-muted"><small>Offline</small></span>
                            </div>
                            <div class="col-md-3 col-3 text-right">
                                <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                            </div>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Car Details</h5>
                <p><?php echo validation_errors(); ?>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo site_url('Car/update'); ?>" class="form">
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Registration Number (disabled)</label>
                                <input type="text" class="form-control" readonly placeholder="Registration" value="<?php echo $car_data['car_reg_id']; ?>" name="car_reg_id">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Make</label>
                                <input type="text" class="form-control" readonly placeholder="Make" value="<?php echo $car_data['model']; ?>" name="model">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Color</label>
                                <input type="text" class="form-control" readonly placeholder="Color" value="<?php echo $car_data['color']; ?>" name="color">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Category</label>
                                <select readonly name="category" class="form-control" placeholder="Category">
                                    <option value="SUV" <?php if ($car_data['category'] == "SUV") {
                                                            echo "selected";
                                                        }; ?>>SUV</option>
                                    <option value="SEDAN" <?php if ($car_data['category'] == "SEDAN") {
                                                                echo "selected";
                                                            }; ?>>Sedan</option>
                                    <option value="MINI" <?php if ($car_data['category'] == "MINI") {
                                                                echo "selected";
                                                            }; ?>>Compact Mini</option>
                                    <option value="MICRO" <?php if ($car_data['category'] == "MICRO") {
                                                                echo "selected";
                                                            }; ?>>Compact Micro</option>
                                    <option value="LUX" <?php if ($car_data['category'] == "LUX") {
                                                            echo "selected";
                                                        }; ?>>Luxury</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Rate/km</label>
                                <input type="text" class="form-control" readonly placeholder="Rate" value="<?php echo $car_data['rate_per_km']; ?>" name="rate_per_km">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <?php echo anchor('Car/edit/' . $car_data['car_reg_id'], '<i class="nc-icon nc-ruler-pencil"></i> Edit', 'class="btn btn-primary"'); ?>
                            <?php echo anchor('Car/delete/' . $car_data['car_reg_id'], '<i class="nc-icon nc-simple-remove"></i> Delete', 'class="btn btn-danger"'); ?>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>