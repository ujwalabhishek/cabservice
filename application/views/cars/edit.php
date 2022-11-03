<style>
    .card-user .image {
        height: auto;
    }
</style>
<form method="post" action="<?php echo site_url('Car/update'); ?>" class="form" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-4">
        <div class="card card-user">
        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
            <div class="fileinput-new image">
            <img src="<?php print base_url(); ?>assets/img/carimages/<?php echo isset($car_data['car_image']) ? $car_data['car_image'] : "getImage.png"; ?>" alt="...">
            </div>
                <div class="fileinput-preview fileinput-exists"></div>
                <div>
                    <span class="btn btn-rose btn-round btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="car_image" />
                        <input type="hidden" name="car_image_old" value="<?php echo $car_data['car_image']; ?>">
                    </span>
                    <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                </div>
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
                <h5 class="card-title">Edit Car Details</h5>
                <p><?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('item'); ?></p>
            </div>
            <div class="card-body">
                
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
                                <select name="model" class="form-control" placeholder="Car Make / Model">
                                    <option value="">Select</option>
                                    <option value="Hyundai Verna" <?php echo $car_data['model'] == "Hyundai Verna" ? "selected" : ""; ?>>Hyundai Verna</option>
                                    <option value="Maruti Alto" <?php echo $car_data['model'] == "Maruti Alto" ? "selected" : ""; ?>>Maruti Alto</option>
                                    <option value="Hyundai Venu" <?php echo $car_data['model'] == "Hyundai Venu" ? "selected" : ""; ?>>Hyundai Venu</option>
                                    <option value="Tata Tiago" <?php echo $car_data['model'] == "Tata Tiago" ? "selected" : ""; ?>>Tata Tiago</option>
                                    <option value="Tata Safari" <?php echo $car_data['model'] == "Tata Safari" ? "selected" : ""; ?>>Tata Safari</option>
                                    <option value="BMW X70" <?php echo $car_data['model'] == "BMW X70" ? "selected" : ""; ?>>BMW X70</option>
                                    <option value="BMW X69" <?php echo $car_data['model'] == "BMW X69" ? "selected" : ""; ?>>BMW X69</option>
                                    <option value="Mahindra Thar" <?php echo $car_data['model'] == "Mahindra Thar" ? "selected" : ""; ?>>Mahindra Thar</option>
                                    <option value="Maruti Brezza" <?php echo $car_data['model'] == "Maruti Brezza" ? "selected" : ""; ?>>Maruti Brezza</option>
                                    <option value="Tata Nexon" <?php echo $car_data['model'] == "Tata Nexon" ? "selected" : ""; ?>>Tata Nexon</option>
                                    <option value="Mahindra XUV700" <?php echo $car_data['model'] == "Mahindra XUV700" ? "selected" : ""; ?>>Mahindra XUV700</option>
                                    <option value="Toyota Fortuner" <?php echo $car_data['model'] == "Toyota Fortuner" ? "selected" : ""; ?>>Toyota Fortuner</option>
                                    <option value="Toyota Innova" <?php echo $car_data['model'] == "Toyota Innova" ? "selected" : ""; ?>>Toyota Innova</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Color</label>
                                <select name="color" class="form-control" placeholder="Body Color">
                                    <option value="">Select</option>
                                    <option value="White" <?php echo $car_data['color'] == "White" ? "selected" : ""; ?>>White</option>
                                    <option value="Black" <?php echo $car_data['color'] == "Black" ? "selected" : ""; ?>>Black</option>
                                    <option value="Gray" <?php echo $car_data['color'] == "Grey" ? "selected" : ""; ?>>Gray</option>
                                    <option value="Silver" <?php echo $car_data['color'] == "Silver" ? "selected" : ""; ?>>Silver</option>
                                    <option value="Blue" <?php echo $car_data['color'] == "Blue" ? "selected" : ""; ?>>Blue</option>
                                    <option value="Red" <?php echo $car_data['color'] == "Red" ? "selected" : ""; ?>>Red</option>
                                    <option value="Brown" <?php echo $car_data['color'] == "Brown" ? "selected" : ""; ?>>Brown</option>
                                    <option value="Green" <?php echo $car_data['color'] == "Green" ? "selected" : ""; ?>>Green</option>
                                    <option value="Orange" <?php echo $car_data['color'] == "Orange" ? "selected" : ""; ?>>Orange</option>
                                    <option value="Beige" <?php echo $car_data['color'] == "Beige" ? "selected" : ""; ?>>Beige</option>
                                    <option value="Purple" <?php echo $car_data['color'] == "Purple" ? "selected" : ""; ?>>Purple</option>
                                    <option value="Gold" <?php echo $car_data['color'] == "Gold" ? "selected" : ""; ?>>Gold</option>
                                    <option value="Yellow" <?php echo $car_data['color'] == "Yellow" ? "selected" : ""; ?>>Yellow</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control" placeholder="Category">
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
                                <input type="text" class="form-control" placeholder="Rate" value="<?php echo $car_data['rate_per_km']; ?>" name="rate_per_km">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <input type="submit" class="btn btn-primary btn-round" value="Update Details">
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
</form>