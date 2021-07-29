<!DOCTYPE html>
<html>
<head>
    <title>Order Product</title>
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
    <!-- flash message (gk usah diubah)-->
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

    <?php 
        if(isset($products)){
            foreach($products as $row){?>
            <!-- main body (tolong tampilannya diubah karena ini mash sama kyk lab biasa) -->
            <!-- ======= Specials Section ======= -->
            <section id="specials">
                <div class="container">
                    <div class="section-title">
                        <h2>Check our <span><?php echo $row['name']; ?></span></h2>
                        <p>There is plenty menus out there!! <a href="<?php echo base_url('Restaurant/Main'); ?>">klik here to go back</a></p>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav nav-tabs flex-column">
                                <li class="nav-item"><a class="nav-link show" data-toggle="tab" href="#">Stock &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $row['stock']; ?></a></li>
                                <li class="nav-item"><a class="nav-link show" data-toggle="tab" href="#">Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?= $row['price']; ?></a></li>
                                <li class="nav-item"><a class="nav-link show" data-toggle="tab" href="#">Category &nbsp; : 
                                    <?php $category = json_decode($row['category_id']); 
                                        foreach($category as $rowCategory){
                                            if($rowCategory == 1){
                                                echo "Makanan ";
                                            }
                                            else if($rowCategory == 2){
                                                echo "Minuman ";
                                            }
                                            else if($rowCategory == 3){
                                                echo "Snack ";
                                            }
                                            else if($rowCategory == 4){
                                                echo "Dessert ";
                                            }
                                        }
                                    ?>
                                </a></li>
                            </ul>
                            <br>
                            <button class="btn btn-warning" onclick="modalOrder()">Add to Cart</button>
                        </div>
                        <div class="col-lg-9 mt-4 mt-lg-0">
                            <div class="tab-content">
                                <div class="tab-pane show" id="tab-1">
                                    <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3>Description</h3>
                                            <p><?= $row['description']; ?></p>
                                        </div>
                                        <div class="col-lg-4 text-center order-1 order-lg-2">
                                            <img src="<?php echo base_url($row['image']); ?>" alt="<?php echo $row['name']; ?>" class="img-fluid" width="100%;" height="100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Specials Section -->
            <!-- modal memesan (gk usah diubah, rapihin aja posisinya) -->
            <div id="myModalOrder" class="modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Order Product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php foreach($company as $bill){?>
                                <?php echo form_open('Restaurant/addcart'); ?>
                                    <?php echo validation_errors(); ?>
                                        <input type="hidden" name="productId" value="<?= $row['id']; ?>">
                                        <input type="hidden" name="productStock" value="<?= $row['stock']; ?>">
                                        <div class="form-group">
                                            <label for="productName">Product Name</label>
                                            <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name" value="<?= $row['name']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="productPrice">Product Price</label>
                                            <input type="text" class="form-control" id="productPrice" name="productPrice" placeholder="Product Price" value="<?= $row['price']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="qty">Quantity</label>
                                            <div class="row">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="qty" type="button" data-func="minus" data-field="qty">-</button>
                                            &nbsp;&nbsp;&nbsp;<input type="number" class="form-control qty" id="qty" name="qty" placeholder="Quantity" value="1" style="width: 50px;" readonly>
                                            &nbsp;&nbsp;&nbsp;<button class="qty" type="button" data-func="plus" data-field="qty">+</button>
                                            
                                            </div>
                                        </div>                
                                        <div class="form-group">
                                            <label for="grossAmount">Gross Amount</label>
                                            <input type="text" class="form-control" id="grossAmount" name="grossAmount" placeholder="Gross Amount" readonly value="<?= $row['price']; ?>.00">
                                        </div>
                                        <div class="form-group">
                                            <label for="ServiceCharge">Service Charge <?= $bill['service_charge_value']; ?>%</label>
                                            <input type="text" class="form-control" id="serviceCharge" name="serviceCharge" placeholder="Service Charge" readonly value="<?php $sCharge = $row['price']*$bill['service_charge_value']/100; echo $sCharge; ?>.00">
                                        </div>
                                        <div class="form-group">
                                            <label for="vatCharge">Vat Charge <?= $bill['vat_charge_value']; ?>%</label>
                                            <input type="text" class="form-control" id="vatCharge" name="vatCharge" placeholder="Vat Charge" readonly value="<?php $vCharge = $row['price']*$bill['vat_charge_value']/100; echo $vCharge; ?>.00">
                                        </div>
                                        <div class="form-group">
                                            <label for="totalAmount">Total Amount</label>
                                            <input type="text" class="form-control" id="totalAmount" name="totalAmount" placeholder="totalAmount" readonly value="<?php $tAmount = $row['price'] + ($row['price']*$bill['service_charge_value']/100) + ($row['price']*$bill['vat_charge_value']/100); echo $tAmount; ?>.00">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning" style="float: left;" name="addToCart">Add To Cart</button>
                                    </div>
                                <?php echo form_close(); ?>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                <!-- modal end -->
            </div>
            <!-- main end -->

            <?php
            }
        }
    ?>
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
            $('#myModalOrder').modal({ 
                keyboard: false, 
                show: false, 
                backdrop: 'static' 
            });
        });
        function modalOrder(){
            $('#myModalOrder').modal({
                show: true
            });
        };
        $('.qty').click(function() {
            var $t = $(this),
                $in = $('input[name="'+$t.data('field')+'"]'),
                val = parseInt($in.val()),
                valMax = <?php echo $row['stock'] ?>,
                valMin = 1;
            if(isNaN(val) || val < valMin) {
                $in.val(valMin);
                return false;
            } else if (val > valMax) {
                $in.val(valMax);
                return false;
            }
            if($t.data('func') == 'plus') {
                if(val < valMax) $in.val(val + 1);
            } else {
                if(val > valMin) $in.val(val - 1);
            }
        });

        $(".qty").click(function(){
            update();
        });

        function update() {
            var gross = Number($('#productPrice').val()*$('#qty').val());
            gross = gross.toFixed(2);
            $("#grossAmount").val(gross);
            var service = Number($('#grossAmount').val()*<?= $bill['service_charge_value']; ?>/100);
            service = service.toFixed(2);
            $("#serviceCharge").val(service);
            var vat = Number($('#grossAmount').val()*<?= $bill['vat_charge_value']; ?>/100);
            vat = vat.toFixed(2);
            $("#vatCharge").val(vat);
            var total = Number(Number($('#grossAmount').val()) + Number($('#serviceCharge').val()) + Number($('#vatCharge').val()));
            total = total.toFixed(2);
            $("#totalAmount").val(total);
        }
    </script>
</body>
</html>