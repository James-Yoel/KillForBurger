<!DOCTYPE html>
<html>
<head>
    <title>Order Detail</title>
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
    <!-- flash message (gk usah diubah) -->
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
    <div class="container">
        <a href="<?php echo base_url('Restaurant/Main'); ?>">
            <button class="btn btn-warning"> 
                <span class="glyphicon glyphicon-menu-left"></span>
                Back to Main
            </button>
        </a>
        <a href="<?php echo base_url('Restaurant/User'); ?>">
            <button class="btn btn-warning"> 
                <span class="glyphicon glyphicon-menu-left"></span>
                Back to Profile
            </button>
        </a>
        <br/>
        <?php if($order != null){
            foreach($order as $row){?>
                <!-- container nampilin ordeer -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2 style="display: inline-block; font-family:georgia,garamond,serif;font-size:25px;font-style:italic;"><a style=" color: orange;" href="<?= base_url("Restaurant/OrderDetail?id=".$row['id']."") ?>"><?= $row['bill_no']; ?></a></h2>
                        <br>
                        <p style="display: inline-block;">Date & Time &nbsp; : <?= date("d F Y h:i A", $row['date_time']); ?></p> &nbsp;&nbsp; | &nbsp;&nbsp;
                        <p style="display: inline-block;">Total Amount &nbsp; : Rp. <?= $row['net_amount']; ?>
                    </div>
                </div>
                <!-- container end -->
            <?php
            } 
        }
        else{
            echo "<h2>Order List is Empty. Let's start ordering!</h2>";
        }
        ?>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <?= $footer; ?>
    <?= $script; ?>
    <?php echo $vendor; ?>
    <?php echo $mainJS; ?>
</body>
</html>