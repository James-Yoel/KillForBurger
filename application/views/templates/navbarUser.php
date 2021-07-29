<?php defined('BASEPATH') OR exit('No direct script access allowed !'); ?>
<div style="background-color: b">
<section id="topbar" class="d-none d-lg-flex align-items-center fixed-top" style="background-color: black;">
    <div class="container text-right">
      <i class="icofont-phone"></i> +62-21 5422 0808
      <i class="icofont-clock-time icofont-rotate-180"></i> Mon-Sat: 08:00 AM - 21:00 PM
    </div>
  </section>
<header id="header" class="fixed-top d-flex align-items-center" style="background-color: black;">
    <div class="container d-flex align-items-center">

    	<div class="mr-auto" style="width: 200px; height: 100px;">
        	<a href="<?php echo base_url('Restaurant/Main'); ?>"><img src="<?php echo base_url('assets/images/LogoKFB.png'); ?>" style="width: 100px; height: 100px;" alt="Logo" class="img-fluid"></a>
      	</div>

      	<nav class="nav-menu d-none d-lg-block">
        	<ul>
          		<li class="active"><a href="<?php echo base_url('Restaurant/Main'); ?>">Home</a></li>
          		<li><a href="<?php echo base_url('Restaurant/Rate'); ?>">Rate
				  	<?php if($rating_row != 0){?>
					<span class="dot"><p style="color: white; text-align: center;"><?= $rating_row; ?></p></span>
					<?php
					} ?>
				</a></li>
          		<li><a href="<?php echo base_url('Restaurant/Cart'); ?>">Cart
					<?php if($cart_row != 0){?>
					<span class="dot"><p style="color: white; text-align: center;"><?= $cart_row; ?></p></span>
					<?php
					} ?>
				</a></li>
				<li><a href="<?php echo base_url('Auth/logout'); ?>" onclick="javascript:return confirm('Do you want to log out ?');"> Logout</a></li>
          		<li class="book-a-table text-center">
					<a href="<?php echo base_url('Restaurant/User'); ?>"> 
            			<img src ='<?php echo base_url().$this->session->userdata('picture'); ?>' style="width: 30px; height: 30px; margin-right: 5px; border-radius: 100%;">
                		<?php echo $this->session->userdata('username'); ?>
					</a>
				</li>
        	</ul>
      	</nav><!-- .nav-menu -->
	</div>
</header>