<!DOCTYPE html>
<html>
<head>
    <title>Seach Product</title>
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
    <!-- Flash Message (gk usah diubah) -->
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
    <!-- Main body -->
    <div id="mainContainer" class="container">
    <div class="card" style="width:100%;">
        <div class="card-header">
            Filter & Sort
        </div>
        <ul class="list-group list-group-flush">
            <!-- Search, Filter< Sort -->
            <form class="list-group-item form-inline my-2 my-lg-0" action="FilterAndSort" method="get">
            
                <!-- search -->
                <input class="form-control mr-sm-2" type="search" placeholder="Search Products" name="search" style="width: 100%;">
                <br>
                <br>
                <!-- search end -->
                <!-- filter -->
                <div class="col-lg-8 col-md-8">
                <label for="filter" style="float: left;">Filter</label><br/><br/>
                    <div>
                        <input class="form-control mr-sm-2" type="number" id="minPrice" name="minPrice" placeholder="Minimum Price">
                        &nbsp;-&nbsp;
                        <input class="form-control mr-sm-2" type="number" id="maxPrice" name="maxPrice" placeholder="Maximum Price">
                    </div>
                    <br/>
                    <div class="radio">
                      <div class="row">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="makanan" name="kategori[]" value="1">
                        &nbsp;&nbsp;&nbsp;<label for="makanan">Makanan</label>
                      </div>
                      <div class="row">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="minuman" name="kategori[]" value="2">
                        &nbsp;&nbsp;&nbsp;<label for="minuman">Minuman</label>
                      </div>
                      <div class="row">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="snack" name="kategori[]" value="3">
                        &nbsp;&nbsp;&nbsp;<label for="snack">Snack</label>
                      </div>
                      <div class="row">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="dessert" name="kategori[]" value="4">
                        &nbsp;&nbsp;&nbsp;<label for="dessert">Dessert</label>
                      </div>
                    </div>
                </div>

                <!-- filter end -->
                <!-- sort -->
                <div class="col-lg-4 col-md-4">
                <label for="sort" style="float: left;">Sort</label><br/><br/>
                    <div class="radio">
                      <div class="row">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sort" id="hargaTinggi" value="1">
                        &nbsp;&nbsp;&nbsp;<label for="hargaTinggi">Harga tertinggi</label><br>
                      </div>
                      <div class="row">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sort" id="hargaRendah" value="2">
                        &nbsp;&nbsp;&nbsp;<label for="hargaRendah">Harga terendah</label><br>
                      </div>
                      <div class="row">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="sort" id="abjad" value="3">
                        &nbsp;&nbsp;&nbsp;<label for="abjad">Abjad</label><br>
                      </div>
                      <br>&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-info my-2 my-sm-0" type="submit">Go</button>
                <!-- sort end -->
            </ul>
        </form>
        <!-- search, sort, filter end -->
        <div class="row">
        <?php
        if($products != null){
            foreach($products as $row){?>
            <!-- container produk -->
            <div class="col-lg-3 col-md-4 col-6">
              <div class="d-block mb-4 h-100">
                <div class="card">
                  <div class="hovereffect">
                    <img class="img-fluid img-responsive text-center" src="<?= base_url($row['image']); ?>" alt="image" style="width: 250px; height: 250px;">
                    <div class="overlay">
                        <h2 class="col-sm-10"><?= $row['name']; ?></h2>
                    </div>
                  </div>
                  <div class="card-body">
                      <p><h5>Rp. <?= $row['price'];?></h5></p>
                      <?php $rating = $this->model_products->getRatingDataForProduct($row['id']);
                        if($rating!=null){
                          $i = 0;
                          $count  = 0;
                          foreach($rating as $ratingRow){
                            $i++;
                            $count = $count + $ratingRow['score'];
                          }
                          $count = floatval($count/$i); ?>
                          <p><span class="stars"><?= $count; ?></p>
                        <?php
                        }
                        else{?>
                          <p>No Rating Yet</p>
                          <!-- rating end -->
                        <?php
                        } ?>
                        <?php if($row['stock'] != 0){?>
                          <a href="<?= base_url("Restaurant/Order?id=".$row['id'].""); ?>" class="btn btn-warning">Order</a>
                          <?php
                        }
                        else{?>
                          <button style="border: 1px solid;" class="btn btn-disabled" disabled>Out Of Stock</button>
                        <?php
                        } ?>
                  </div>
              </div>
            </div>
          </div>
            <?php
            }
        }else{
            echo "<h2 style='margin-left: 20px;'>No Result Found!</h2>";
        }
        ?>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <!-- main end -->
    <?php echo $footer; ?>
    <?php echo $script; ?>
    <?php echo $vendor; ?>
    <?php echo $mainJS; ?>
    <script>
        $.fn.stars = function() {
            return this.each(function(i,e){$(e).html($('<span/>').width($(e).text()*16));});
        };
        $('.stars').stars();

        $(function(){
            var test = localStorage.input === 'true'? true: false;
            
        });

        $('input').on('change', function() {
            localStorage.input = $(this).is(':checked');
            console.log($(this).is(':checked'));
        });
  
    </script>
</body>
</html>