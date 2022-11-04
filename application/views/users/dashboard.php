<style>
  .card-user .image {
    height: auto;
  }

  .staro {
    width: 25px;
    padding: 5px
  }
</style>
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header ">
        <h5 class="card-title">Search Cabs</h5>
      </div>
      <div class="card-body ">
        <form method="post" action="<?php echo site_url('Users/bookcabs'); ?>" class="form">
          <div class="row">
            <div class="col-md-3">
              <div class=" ">
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
              <div class=" ">
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
              <div class=" ">
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
              <div class=" ">
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
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-globe text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Capacity</p>
              <p class="card-title">150GB
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i>
          Update Now
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-money-coins text-success"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Revenue</p>
              <p class="card-title">$ 1,345
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-calendar-o"></i>
          Last day
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-vector text-danger"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Errors</p>
              <p class="card-title">23
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-clock-o"></i>
          In the last hour
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-favourite-28 text-primary"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Followers</p>
              <p class="card-title">+45K
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i>
          Update now
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header ">
        <h5 class="card-title">Users Behavior</h5>
        <p class="card-category">24 Hours performance</p>
      </div>
      <div class="card-body ">
        <canvas id=chartHours width="400" height="100"></canvas>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-history"></i> Updated 3 minutes ago
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="card ">
      <div class="card-header ">
        <h5 class="card-title">Email Statistics</h5>
        <p class="card-category">Last Campaign Performance</p>
      </div>
      <div class="card-body ">
        <canvas id="chartEmail"></canvas>
      </div>
      <div class="card-footer ">
        <div class="legend">
          <i class="fa fa-circle text-primary"></i> Opened
          <i class="fa fa-circle text-warning"></i> Read
          <i class="fa fa-circle text-danger"></i> Deleted
          <i class="fa fa-circle text-gray"></i> Unopened
        </div>
        <hr>
        <div class="stats">
          <i class="fa fa-calendar"></i> Number of emails sent
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-title">NASDAQ: AAPL</h5>
        <p class="card-category">Line Chart with Points</p>
      </div>
      <div class="card-body">
        <canvas id="speedChart" width="400" height="100"></canvas>
      </div>
      <div class="card-footer">
        <div class="chart-legend">
          <i class="fa fa-circle text-info"></i> Tesla Model S
          <i class="fa fa-circle text-warning"></i> BMW 5 Series
        </div>
        <hr />
        <div class="card-stats">
          <i class="fa fa-check"></i> Data information certified
        </div>
      </div>
    </div>
  </div>
</div>