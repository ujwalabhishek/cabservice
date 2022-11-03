<style>
    .card-user .image {
        height: auto;
    }
</style>
<form method="post" action="<?php echo site_url('Car/save'); ?>" class="form" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">

                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new  image">
                        <img src="<?php print base_url(); ?>assets/img/bg/getImage.png" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists"></div>
                    <div>
                        <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="car_image" value="">
                        </span>
                        <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                </div>


                <div class="card-footer">
                    <hr>
                    <div class="button-container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                <h5>SUV<br><small>Type</small></h5>
                            </div>
                            <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                <h5>Grey<br><small>Color</small></h5>
                            </div>
                            <div class="col-lg-4 mr-auto">
                                <h5>$11/km<br><small>Rate</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   
        </div>
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Add Inventory</h5>
                    <p><?php echo validation_errors(); ?>
                        <?php echo $this->session->flashdata('item'); ?></p>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Registration Number *</label>
                                <input type="text" class="form-control" placeholder="Registration" value="" name="car_reg_id">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Make *</label>
                                <select name="model" class="form-control" placeholder="Car Make / Model">
                                    <option value="">Select</option>
                                    <option value="Hyundai Verna">Hyundai Verna</option>
                                    <option value="Maruti Alto">Maruti Alto</option>
                                    <option value="Hyundai Venu">Hyundai Venu</option>
                                    <option value="Tata Tiago">Tata Tiago</option>
                                    <option value="Tata Safari">Tata Safari</option>
                                    <option value="BMW X70">BMW X70</option>
                                    <option value="BMW X69">BMW X69</option>
                                    <option value="Mahindra Thar">Mahindra Thar</option>
                                    <option value="Maruti Brezza">Maruti Brezza</option>
                                    <option value="Tata Nexon">Tata Nexon</option>
                                    <option value="Mahindra XUV700">Mahindra XUV700</option>
                                    <option value="Toyota Fortuner">Toyota Fortuner</option>
                                    <option value="Toyota Innova">Toyota Innova</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Color *</label>
                                <select name="color" class="form-control" placeholder="Body Color">
                                    <option value="">Select</option>
                                    <option value="White">White</option>
                                    <option value="Black">Black</option>
                                    <option value="Gray">Gray</option>
                                    <option value="Silver">Silver</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Red">Red</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Green">Green</option>
                                    <option value="Orange">Orange</option>
                                    <option value="Beige">Beige</option>
                                    <option value="Purple">Purple</option>
                                    <option value="Gold">Gold</option>
                                    <option value="Yellow">Yellow</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Category *</label>
                                <select name="category" class="form-control" placeholder="Category">
                                    <option value="">Select</option>
                                    <option value="SUV">SUV</option>
                                    <option value="SEDAN">Sedan</option>
                                    <option value="MINI">Compact Mini</option>
                                    <option value="MICRO">Compact Micro</option>
                                    <option value="LUX">Luxury</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Rate/km *</label>
                                <input type="text" class="form-control" placeholder="Rate" value="" name="rate_per_km">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <input type="submit" class="btn btn-primary btn-round" value="Save Details">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>