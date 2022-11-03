<style>
  .card-user .image {
    height: 150px;
  }
</style>
<form method="post" action="<?php echo site_url('Drivers/save'); ?>" class="form" enctype="multipart/form-data">
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
              <input type="file" name="image_url" value="">
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
          <h5 class="card-title">Add Driver</h5>
          <p><?php echo validation_errors(); ?>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-md-5 pr-1">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" value="<?php echo set_value('name'); ?>" name="name">
              </div>
            </div>
            <div class="col-md-5 px-1">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>" name="email">
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-5 pr-1">
              <div class="form-group">
                <label for="exampleInputEmail1">Mobile No</label>
                <input type="text" class="form-control" placeholder="Mobile No" value="<?php echo set_value('mob_no'); ?>" name="mob_no">
              </div>
            </div>
            <div class="col-md-3 px-1">
              <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control" placeholder="Gender">
                  <option value="M" <?php if (set_value('gender') == "M") {
                                      echo "selected";
                                    }; ?>>Male</option>
                  <option value="F" <?php if (set_value('gender') == "F") {
                                      echo "selected";
                                    }; ?>>Female</option>

                </select>
              </div>
            </div>

            <?php //print_r($car_reg_id_unassigned);
            ?>
          </div>
          <div class="row">
            <div class="col-md-5 pr-1">
              <div class="form-group">
                <label>Car</label>
                <select name="car_reg_id" class="form-control" placeholder="Registration No">
                  <?php foreach ($car_reg_id_unassigned as $value) { ?>
                    <option value="<?php echo $value['car_reg_id']; ?>"><?php echo $value['car_reg_id'] . " - " . $value['model']; ?></option>
                  <?php    } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3 px-1">
              <div class="form-group">
                <label>Ratings</label>
                <select name="rating" class="form-control" placeholder="Rating">
                  <option value="1" <?php echo set_value('rating') == "1" ? "selected" : ""; ?>>Poor</option>
                  <option value="2" <?php echo set_value('rating') == "2" ? "selected" : ""; ?>>Average</option>
                  <option value="3" <?php echo set_value('rating') == "3" ? "selected" : ""; ?>>Good</option>
                  <option value="4" <?php echo set_value('rating') == "4" ? "selected" : ""; ?>>Very Good</option>
                  <option value="5" <?php echo set_value('rating') == "5" ? "selected" : ""; ?>>Excellent</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" value="" name="password">
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