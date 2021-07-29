<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
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
    <!-- Flash message end -->
    <div id="mainContainer" class="container">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                <h2><span>Contact</span> Us</h2>
                <p>Keep in touch with us</p>
                </div>
            </div>

            <div class="map">
                <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?q=universitas%20Multimedia%20Nusantara&t=&z=13&ie=UTF8&iwloc=&output=embed"" frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="container mt-5">

                <div class="info-wrap">
                <div class="row">
                    <div class="col-lg-3 col-md-6 info">
                    <i class="icofont-google-map"></i>
                    <h4>Location</h4>
                    <p> Jl. Scientia Boulevard, Gading, <br>Kec. Serpong, Tangerang, Banten 15227</p>
                    </div>

                    <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                    <i class="icofont-clock-time icofont-rotate-90"></i>
                    <h4>Open Hours</h4>
                    <p>Monday-Saturday<br>08:00 AM - 21:00 PM</p>
                    </div>

                    <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                    <i class="icofont-envelope"></i>
                    <h4>Email:</h4>
                    <p>admisi@umn.ac.id<br>marketing@umn.ac.id</p>
                    </div>

                    <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                    <i class="icofont-phone"></i>
                    <h4>Call:</h4>
                    <p>+62-21.5422.0808<br>+62-21.5422.0800</p>
                    </div>
                </div>
                </div>
            </div>
            </section>
            <!-- End Contact Section -->

        <!-- ======= Chefs Section ======= -->
        <section id="chefs" class="chefs">
        <div class="container">

            <div class="section-title">
            <h2>Our <span>Team</span></h2>
            <p style="color:white;">Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="<?php echo base_url('assets/img/chefs/andrewH.jpg'); ?>" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Andrew Hadi</h4>
                            <span>00000027628</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="<?php echo base_url('assets/img/chefs/elissaG.jpg'); ?>" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Elissa Gunawan</h4>
                            <span>00000027328</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <br>
            <br>

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="<?php echo base_url('assets/img/chefs/faatihahRS.jpg'); ?>" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>Faatihah Rahmah Suwandi</h4>
                            <span>00000028318</span>
                        </div>
                    </div>
                </div>
                        
                <div class="col-lg-6 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="<?php echo base_url('assets/img/chefs/jamesY.jpg'); ?>" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>James Yoel</h4>
                            <span>00000028895</span>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>

        </div>
        </section>
        <!-- End Chefs Section -->
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

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
</body>
</html>