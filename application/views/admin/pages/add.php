<!-- start: Content -->
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url();?>index.php/admin/home">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-tasks"></i>
            <a href="<?php echo base_url();?>index.php/pages">Web Pages</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Web Pages</h2>
            </div>
            <div class="box-content">
                    <div><h2>
                    <?php
                        if(isset ($massage))echo $massage;
                        echo validation_errors('<div class="alert alert-error">', '</div>');
                     ?>
                    </h2></div>
                    <?php echo form_open('pages/addPages/1', array('class'=>'form-horizontal'))?>
                    <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">About Us </label>
                        <div class="controls">
                            <textarea class="cleditor" name="about_us" id="about_us" ><?php echo $about_us; ?></textarea>
                        
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Services </label>
                        <div class="controls">
                            <textarea class="cleditor" name="services" id="services" ><?php echo $services; ?></textarea>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Terms & Conditions </label>
                        <div class="controls">
                            <textarea class="cleditor" name="terms" id="terms" ><?php echo $terms; ?></textarea>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Privacy Policy </label>
                        <div class="controls">
                            <textarea class="cleditor" name="privacy" id="privacy" ><?php echo $privacy; ?></textarea>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">FAQ </label>
                        <div class="controls">
                            <textarea class="cleditor" name="faq" id="faq" ><?php echo $faq; ?></textarea>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Contact Us </label>
                        <div class="controls">
                            <textarea class="cleditor" name="contact_us" id="contact_us" ><?php echo $contact_us; ?></textarea>
                        </div>
                      </div>
                      <!--<div class="control-group">
                        <label class="control-label" for="focusedInput">Google Map </label>
                        <div class="controls">
                            <textarea class="cleditor" name="gmap" id="gmap" ><?php //echo $gmap; ?></textarea>
                        </div>
                      </div>-->
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">E-Mail </label>
                        <div class="controls">
                            <input type="text" name="email" id="email" class="input-xlarge focused" value="<?php echo $email; ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Phone </label>
                        <div class="controls">
                            <input type="text" name="phone" id="phone" class="input-xlarge focused" value="<?php echo $phone; ?>">
                        </div>
                      </div>
                      <div class="form-actions">
                        <button type="submit" class="btn btn-primary" id="save">Save changes</button>
                        <button type="reset" class="btn">Reset</button>
                        <button type="button" class="btn btn-warning" onclick="window.location.href='<?php echo $btn_back;?>'">Back</button>
                      </div>
                    </fieldset>
                  </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
</div><!--/.fluid-container-->

