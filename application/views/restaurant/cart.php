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
    <div class="container">
        <?php if($cart != null){
            $totalCart = 0.00;
            foreach($cart as $row){
                $product = $this->model_products->getProductsByIdForUser($row['item_id']);
                foreach($product as $productRow){ ?>
                    <div class="panel panel-default">
                        <a href="<?= base_url("Restaurant/deleteCart?id=".$row['id'].""); ?>" style="float: right; color: red;"><span class="glyphicon glyphicon-remove"></span></a>
                        <div class="panel-body">
                            <img src="<?= base_url().$productRow['image']; ?>" style="width: 100px; text-align: center;">
                            <h2 style="display: inline-block;"><a style="color: orange;" href="<?= base_url("Restaurant/Order?id=".$productRow['id']."") ?>"><?= $productRow['name']; ?></a></h2> &nbsp;&nbsp;
                            <p style="display: inline-block;">Price &nbsp; : Rp. <?= $row['price']; ?></p> &nbsp;&nbsp; | &nbsp;&nbsp;
                            <p style="display: inline-block;">Quantity &nbsp; : <?= $row['qty'];  ?></p> &nbsp;&nbsp; | &nbsp;&nbsp;
                            <p style="display: inline-block;">Total Amount &nbsp; : Rp. <?= $row['total_amount']; ?>
                        </div>
                    </div>
                <?php
                $totalCart = $totalCart + $row['total_amount'];
                } 
            }
            echo "<h2>Total Amount: Rp. ".$totalCart.".00<h2>";
            echo form_open('Restaurant/checkout');
            echo validation_errors();
            foreach($cart as $rowForm){
                foreach($product as $productForm){?>
                    <input type="hidden" name="cartId[]" value="<?= $rowForm['id']; ?>">
                    <input type="hidden" name="itemId[]" value="<?= $rowForm['item_id']; ?>">
                    <input type="hidden" name="itemPrice[]" value="<?= $rowForm['price']; ?>">
                    <input type="hidden" name="itemQty[]" value="<?= $rowForm['qty']; ?>">
                    <input type="hidden" name="grossAmount[]" value="<?= $rowForm['gross_amount']; ?>">
                    <input type="hidden" name="itemService[]" value="<?= $rowForm['service_charge']; ?>">
                    <input type="hidden" name="itemVat[]" value="<?= $rowForm['vat_charge']; ?>">
                    <input type="hidden" name="totalAmount[]" value="<?= $rowForm['total_amount']; ?>">
                    <input type="hidden" name="itemName[]" value="<?= $productForm['name']; ?>">
                <?php
                }
            }
            foreach($company as $companyForm){?>
                <input type="hidden" name="serviceCharge" value="<?= $companyForm['service_charge_value']; ?>">
                <input type="hidden" name="vatCharge" value="<?= $companyForm['vat_charge_value']; ?>">
            <?php
            }
            ?>
            <button type="submit" class="btn btn-warning" name="checkout">Checkout</button>
            <?php echo form_close(); ?>
            <?php
        }
        else{
            echo "<h1>Cart is Empty!<h1>";
        } ?>
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

    </script>
</body>
</html>