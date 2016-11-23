<div class="col-lg-12">
  <ol class="breadcrumb">
  </ol>
  <h2>About Us</h2>
  <div class="row">
    <div class="col-md-12">
    <?php
    foreach ($pages as $page) {
        echo $page->about_us;
    }
    ?>
    </div>
  </div>
</div>