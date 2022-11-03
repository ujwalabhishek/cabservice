<style>
    .card-user .image {
        height: 150px;
    }
</style>
<div class="row">
<div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="<?php print base_url(); ?>assets/img/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="<?php print base_url(); ?>assets/img/mike.jpg" alt="...">
                    <h5 class="title">Chet Faker</h5>
                  </a>
                  <p class="description">
                    @chetfaker
                  </p>
                </div>
                <p class="description text-center">
                  "I like the way you work it <br>
                  No diggity <br>
                  I wanna bag it up"
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      <h5>12<br><small>Files</small></h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5>2GB<br><small>Used</small></h5>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      <h5>24,6$<br><small>Spent</small></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Team Members</h4>
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
                        <br>
                        <span class="text-muted"><small>Offline</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="<?php print base_url(); ?>assets/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        Creative Tim
                        <br>
                        <span class="text-success"><small>Available</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="<?php print base_url(); ?>assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-ms-7 col-7">
                        Flume
                        <br>
                        <span class="text-danger"><small>Busy</small></span>
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
                <h5 class="card-title">User Details</h5>
                <p><?php echo validation_errors(); ?>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo site_url('Users/update'); ?>" class="form">
                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" value="<?php echo $user_data['user_id']; ?>" name="user_id">
                                <input type="text" class="form-control" disabled="" placeholder="Name" value="<?php echo $user_data['name']; ?>" name="name">
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" disabled="" placeholder="Email" value="<?php echo $user_data['email']; ?>" name="email">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile No</label>
                                <input type="text" class="form-control" disabled="" placeholder="Mobile No" value="<?php echo $user_data['mobile_no']; ?>" name="mobile_no">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" disabled="" class="form-control" placeholder="Gender">
                                    <option value="M" <?php if ($user_data['gender'] == "M") {
                                                            echo "selected";
                                                        }; ?>>Male</option>
                                    <option value="F" <?php if ($user_data['gender'] == "F") {
                                                            echo "selected";
                                                        }; ?>>Female</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Ratings</label>
                                <select name="rating" class="form-control" placeholder="Rating" disabled="">
                                    <option value="1" <?php echo $user_data['rating'] == "1" ? "selected" : ""; ?>>Poor</option>
                                    <option value="2" <?php echo $user_data['rating'] == "2" ? "selected" : ""; ?>>Average</option>
                                    <option value="3" <?php echo $user_data['rating'] == "3" ? "selected" : ""; ?>>Good</option>
                                    <option value="4" <?php echo $user_data['rating'] == "4" ? "selected" : ""; ?>>Very Good</option>
                                    <option value="5" <?php echo $user_data['rating'] == "5" ? "selected" : ""; ?>>Excellent</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="update ml-auto mr-auto">
                        <?php echo anchor('Users/edit/'.$user_data['user_id'], '<i class="nc-icon nc-ruler-pencil"></i> Edit', 'class="btn btn-primary"'); ?>
                        <?php echo anchor('Users/delete/'.$user_data['user_id'], '<i class="nc-icon nc-simple-remove"></i> Delete', 'class="btn btn-danger"'); ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>