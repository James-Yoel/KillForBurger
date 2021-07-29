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
    <!-- main body (masih standar sekali, di bagusin ya) -->
    <div class="container">
        <?php foreach($order as $row){?>
            <h2 style="font-family:georgia,garamond,serif;font-size:30px;">Bill No. <?= $row['bill_no']; ?></h2>
            <h2 style="font-family:georgia,garamond,serif;font-size:20px;">Date & Time: <?= date("d F Y h:i A", $row['date_time']); ?></h2>
            <h2 style="font-family:georgia,garamond,serif;font-size:20px;">Total Amount: Rp. <?= $row['net_amount']; ?> </h2>
        <?php
        }
        ?>
        <a href="<?php echo base_url('Restaurant/Main'); ?>">
            <button class="btn btn-warning"> 
                <span class="glyphicon glyphicon-menu-left"></span>
                Back to Main
            </button>
        </a>
        <a href="<?php echo base_url('Restaurant/OrderList'); ?>">
            <button class="btn btn-warning"> 
                <span class="glyphicon glyphicon-menu-left"></span>
                Back to Order History
            </button>
        </a>
        <?php
        $productOrder = $this->model_orders->getOrdersItemData($row['id']);
        foreach($productOrder as $rowOrder){
            $product = $this->model_products->getProductsByIdForUser($rowOrder['product_id']);
            foreach($product as $rowProduct){?>
                <!-- container nampilin isi order -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="<?= base_url().$rowProduct['image']; ?>" style="width: 100px; text-align: center;">
                        <h2 style="display: inline-block;"><a style="color: orange;" href="<?= base_url("Restaurant/Order?id=".$rowProduct['id']."") ?>"><?= $rowProduct['name']; ?></a></h2> &nbsp;&nbsp;
                        <p style="display: inline-block;">Price : Rp. <?= $rowOrder['rate']; ?></p> &nbsp;&nbsp; | &nbsp;&nbsp;
                        <p style="display: inline-block;">Quantity : <?= $rowOrder['qty'];  ?></p> &nbsp;&nbsp; | &nbsp;&nbsp;
                        <p style="display: inline-block;">Total Amount : Rp. <?= $rowOrder['amount']; ?>
                    </div>
                </div>
                <!-- container end -->
            <?php
            }
        } ?>
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