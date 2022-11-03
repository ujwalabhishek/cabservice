<style>
  .card-user .image {
    height: 150px;
  }
</style>

<div class="row">

  <div class="col-md-12">
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">Add User</h5>
        <p><?php echo validation_errors(); ?>
      </div>
      <div class="card-body">
        <form method="post" action="<?php echo site_url('Users/save'); ?>" class="form">
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
                <input type="text" class="form-control" placeholder="Mobile No" value="<?php echo set_value('mobile_no'); ?>" name="mobile_no">
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
            <div class="col-md-3 pr-1">
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
        </form>
      </div>
    </div>
  </div>
</div>