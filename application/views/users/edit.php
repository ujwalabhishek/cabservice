<style>
    .card-user .image {
        height: auto;
    }
</style>
<form method="post" action="<?php echo site_url('Users/update'); ?>" class="form" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new  image">
                        <img src="<?php print base_url(); ?>assets/img/faces/<?php echo empty($user_data['image_url']) ? 'default-avatar.png' : $user_data['image_url']; ?>">
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
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Edit User</h5>
                    <p><?php echo validation_errors(); ?>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" value="<?php echo $user_data['user_id']; ?>" name="user_id">
                                <input type="text" class="form-control" placeholder="Name" value="<?php echo $user_data['name']; ?>" name="name">
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" value="<?php echo $user_data['email']; ?>" name="email">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile No</label>
                                <input type="text" class="form-control" placeholder="Mobile No" value="<?php echo $user_data['mobile_no']; ?>" name="mobile_no">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control" placeholder="Gender">
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
                                <select name="rating" class="form-control" placeholder="Rating">
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
                        <div class="col-md-5 pr-1">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" value="passwd" name="password">
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