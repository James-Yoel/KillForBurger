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
        <?php if($rating != null){
            foreach($rating as $row){
                $product = $this->model_products->getProductsByIdForUser($row['product_id']);
                foreach($product as $productRow){ ?>
                <!-- container nampilin yang harus di rating -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="<?= base_url().$productRow['image']; ?>" style="width: 100px; text-align: center;">
                            <h2 style="display: inline-block;"><a style=" color: orange;" href="<?= base_url("Restaurant/Order?id=".$productRow['id']."") ?>"><?= $productRow['name']; ?></a></h2>
                            <p style="display: inline-block;">Price: Rp. <?= $productRow['price']; ?></p>
                            <?php echo form_open('Restaurant/submitRate'); ?>
                            <input type="hidden" name="ratingId" value="<?= $row['id']; ?>">
                            <!-- rating -->
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="5 Stars">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="4 Stars">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="3 Stars">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="2 Stars">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="1 Star">1 star</label>
                            </div>
                            <!-- rating end -->
                            <br/>
                            <button type="submit" name="rateSubmit" class="btn btn-warning" style="float: right; margin-right: 15px;">Submit</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                <?php
                }
            }
        }
        else{
            echo "<h2>No Product Found to be rated</h2>";
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