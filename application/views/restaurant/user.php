<!DOCTYPE html>
<html>
<head>
    <title>Restaurant</title>
    <?php echo $style; ?>
    <?php echo $favicon; ?>
    <?php echo $vendorCSS; ?>
</head>
<body>
    <?php echo $navbar; ?>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <!-- ======= My Profile Section ======= -->
    <!-- flash message (g usah di ubah)-->
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php elseif($this->session->flashdata('errors')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('errors'); ?>
        </div>
    <?php endif; ?>
    <!-- flash message end -->
    <section id="chefs" class="chefs">
        <div class="container">
            <div class="section-title">
                <h2>My <span>Profile</span></h2>
            </div>

            <div class="row">

                <div class="col-lg-12 col-md-12">

                    <div class="member">
                        <div class="pic"><img src="<?php echo base_url().$user['profile_picture']; ?>" width="70%;" height="80%;"></div>
                        <div class="member-info">
                            <h4><b><?php echo $user['firstname']." ".$user['lastname']; ?></b></h4>
                            <span><?php $date = date_create($user['birthday']); echo date_format($date, "d F Y"); ?></span>
                            
                        <!-- ======= More info ======= -->
                        <section id="contact" class="contact">
                            <div class="col-lg-3 col-md-6">
                                <h4><b>Gender</b></h4>
                                <p><?php echo ($user['gender'] == 1) ? 'Male' : 'Gender'; ?></p>
                            </div>

                            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                                <h4><b>Username</b></h4>
                                <p><?php echo $user['username']; ?></p>
                            </div>

                            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                                <h4><b>Email</b></h4>
                                <p><?php echo $user['email']; ?></p>
                            </div>

                            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                                <h4><b>Phone</b></h4>
                                <p><?php echo $user['phone']; ?></p>
                            </div>
                        </section>
                        <!-- End More info Section -->

                        <div class="social">
                            <button class="btn btn-warning" onclick="modalEdit()">Edit Profile</button>
                            <a href="<?php echo base_url('Restaurant/OrderList'); ?>"><button class="btn btn-warning"> View Order History</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End My Profile Section -->
    
        <!-- modal edit profile, rapihin aja -->
        <div id="myModalEdit" class="modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Profile</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('Users/editForUser'); ?>
                        <?php echo validation_errors(); ?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $user['username'] ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user['email'] ?>" autocomplete="off">
                        </div>                
                        <div class="form-group">
                            <label for="fname">First name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" value="<?php echo $user['firstname'] ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" value="<?php echo $user['lastname'] ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday" value="<?php echo $user['birthday'] ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $user['phone'] ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="gender" id="male" value="1" <?php if($user['gender'] == 1) {
                                        echo "checked";
                                    } ?>>
                                    Male
                                </label>
                                <label>
                                    <input type="radio" name="gender" id="female" value="2" <?php if($user['gender'] == 2) {
                                        echo "checked";
                                    } ?>>
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Leave these field empty if you don't want to change it.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="profile_picture">Profile Picture</label>
                            <div class="kv-avatar">
                                <div>
                                    <input id="profile_picture" name="profile_picture" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="float: left;" name="editUpload">Edit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <?php echo $footer; ?>
    <?php echo $script; ?>
    <?php echo $vendor; ?>
    <?php echo $mainJS; ?>
    <script>
        $(document).ready(function(){    
            $('#myModalEdit').modal({ 
                keyboard: false, 
                show: false, 
                backdrop: 'static' 
            });
        });
        function modalEdit(){
            $('#myModalEdit').modal({
                show: true
            });
        };
    </script>
</body>
</html>