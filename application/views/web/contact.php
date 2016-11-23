
  <div class="row content">
        <div class="col-lg-12">
          <ol class="breadcrumb">
          </ol>
          <h2>Contact Us</h2>
        
              <?php
              foreach ($pages as $page) {

              }
              ?>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body">
                <div><h4>
                    <?php
                        if(isset ($massage))echo $massage;
                        echo validation_errors('<div class="alert alert-error">', '</div>');
                     ?>
                    </h4></div>
                  <?php echo form_open('webdetails/contactUs')?>
                  <input type="hidden" class="form-control" name="webemail" id="webemail" value="<?php echo $page->email;?>">
                    <div class="form-group">
                      <label for="InputEmail">Name *</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                      <label for="InputEmail">Email *</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                      <label for="InputEmail">Phone *</label>
                      <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter your phone no" required>
                    </div>
                    <div class="form-group">
                      <label for="InputSubject">Subject *</label>
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter your subject" required>
                    </div>
                    <div class="form-group">
                      <label for="InputText">Your Message *</label>
                      <textarea class="form-control" id="message" name="message" placeholder="Type in your message" rows="5" style="margin-bottom:10px;" required></textarea>
                    </div>
                    <button class="btn btn-danger" type="submit">Send</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>