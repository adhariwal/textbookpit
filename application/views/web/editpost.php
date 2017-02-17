

<div class="col-lg-12">
  <ol class="breadcrumb">
  </ol>
 
  <div class="row">
    <?php if(isset($email)){ ?>
    <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">Check your Email You get one time password</h3>
              </div>
              <div class="panel-body">
        <form method="post" action="../../index.php/editpost/form" >
                  <div class="form-group">
                  <label for="userName">One Time Password</label>
                  <input type="text" class="form-control" name="one_pass" id="title" value="" required>
                                  </div>
               
           
               <button type="submit" class="btn btn-danger" id="save">Verify</button>
               </form>
              </div>
            </div>
   
    <?php }else{ 
	echo "Email Id not found !!!!";
	 }?>
  </div>
</div>


