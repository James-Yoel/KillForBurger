<!DOCTYPE html>
<html>
<head>
    <title>KFB</title>
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
    <!-- Flash message end -->
    <!-- Main Body -->
    <div id="mainContainer" class="container">
        
        <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <!-- <ol class="carousel-indicators" id="hero-carousel-indicators"></ol> -->

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(<?php echo base_url('assets/img/slide/slide-1.jpg'); ?>);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animated fadeInDown"><span>Delicious</span> Restaurant</h2>
                <p class="animated fadeInUp">Our restaurant comes with lot's of variant burger. Every burger has their own uniqe taste, but for all the burgers it sure is delicious.
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url(<?php echo base_url('assets/img/slide/slide-2.jpg'); ?>);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animated fadeInDown">Instagramable</h2>
                <p class="animated fadeInUp">Do not worry, this place also has uniqe spot for you #awesome</p>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url(<?php echo base_url('assets/img/slide/slide-3.jpg'); ?>);">
            <div class="carousel-background"><img src="assets/img/slide/slide-3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animated fadeInDown"><span>Good price</span> equal <span>Good quality</span></h2>
                <p class="animated fadeInUp">We know, we know. How can a single burger worth 100K. But hear us out, Because it'll make you eat like it'll be your last meal!!!</p>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section>
  <!-- End Hero -->

  <!-- ======= Whu Us Section ======= -->
  <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Why choose <span>Our Restaurant</span></h2>
          <p>It is the best restaurant in Jl. Boulevard. Even you have to kill the line just for our burger!!</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box">
              <span>01</span>
              <h4>Nongkrong spot</h4>
              <p>You and your friends can sit as long as you want, we have wifi and chargers</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>02</span>
              <h4>Made from heart</h4>
              <p>Every burger has love in it. Every bite you take will make you happy :)</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>03</span>
              <h4>BIG</h4>
              <p>Our burger is not like any other burgers, we server only big size</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Whu Us Section -->

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
        <!-- search, filter, sort end -->
        
        <div class="row">
        <?php
        if(isset($products)){
            foreach($products as $row){?>
                <!-- container nampilin produk -->
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
        }
        ?>
        </div>
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <!-- Main end -->

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