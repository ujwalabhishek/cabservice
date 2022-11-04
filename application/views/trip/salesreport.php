<?php //print_r($trip_data);exit; 
?>
<style>
    .table-responsive {
        overflow: auto !important;
    }

    .card-user .image {
        height: auto;
    }

    .staro {
        width: 25px;
        padding: 5px
    }
</style>
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-2">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-delivery-fast text-success"></i>
            </div>
          </div>
          <div class="col-7 col-md-10">
            <div class="numbers">
              <p class="card-category">Total Sales</p>
              <p class="card-title">Rs <?php echo $total_sales; ?>/-
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i>
          out of <?php //echo $total_cabs; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-2">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-delivery-fast text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-md-10">
            <div class="numbers">
              <p class="card-category">Total Revenue</p>
              <p class="card-title">Rs <?php echo $total_revenue; ?>/-
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-calendar-o"></i>
          out of <?php //echo $total_cabs; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-2">
            <div class="icon-big text-center icon-success">
              <i class="nc-icon nc-vector text-success"></i>
            </div>
          </div>
          <div class="col-7 col-md-10">
            <div class="numbers">
              <p class="card-category">Pending Payments</p>
              <p class="card-title">Rs <?php echo $pending_payments; ?>/-
              <p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-clock-o"></i>
          out of <?php //echo $total_trips; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="content">


    <?php
    $statusArray = array(
        '' => "Trip pending confirmation from driver",
        'Active' => "This trip is in progress.",
        'Accept' => "Trip confirmed by driver",
        'Reject' => "Trip declined by driver.",
        'Completed' => "Trip completed.",
        'Usercancelled' => "Cancelled by user.",
        'Drivercancelled' => "Cancelled by driver"
    );
    ?>
    <!-- Completed trips -->
    <?php if (!empty($trip_data)) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Completed Trips</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Trip ID
                                        </th>
                                        <th>
                                            Driver Name
                                        </th>
                                        <th>
                                            Car No
                                        </th>
                                        <th>
                                            Pickup
                                        </th>
                                        <th>
                                            Drop
                                        </th>
                                        <th class="text-center">
                                            Ride Kms
                                        </th>
                                        <th class="text-center">
                                           /km rate
                                        </th>
                                        <th class="text-center">
                                            Ride Kms
                                        </th>
                                

                                        <th class="text-center">
                                            Payment
                                        </th>
                                       
                                    </tr>
                                </thead>

                                <tbody>


                                    <?php
                                    //print_r($trip_data);
                                    foreach ($trip_data as $value) {
                                        if ($value['status'] == 'Completed') {
                                    ?>
                                            <tr>
                                                <td>
                                                    <?php echo anchor("Trip/details/{$value['trip_id']}", $value['trip_id'], 'class="nav-link" title="Click to view trip details" '); ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['car_reg_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['pickup_location']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $value['drop_location']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $kms = $value['end_km'] - $value['start_km']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $rate = $value['rate_per_km']; $tc = $kms*$rate;  ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo !empty($value['trip_cost']) ? 'Rs '. $value['trip_cost']."/-" : "NA"; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    if (empty($value['trip_cost'])) {
                                                        echo 'NA';
                                                    } else {
                                                        echo (!empty($value['customer_payment']) and ($value['trip_cost'] == $value['customer_payment'])) ? 'Paid' : 'Pending';
                                                    }
                                                    ?>
                                                </td>
                                                
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php } ?>
    <!-- End Completed Trips  -->
    