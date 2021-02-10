<?php include("libraries/includes/header.php"); ?>

<div class="row">
  <div class="col-12">
    <div class="post-container">
      <div class="card">
        <div class="card-header">
          <div class="content-container">
            <div>
              <h4>Compose Your Post</h4>
            </div>
          </div>
          
        </div>
        <div class="card-body">

          <form method="post" action="libraries/engine/userActions.php" enctype="multipart/form-data">

            <h6>Upload an Image</h6>
              <input name="post" type="file">

              <h6>Select Filter</h6>
              <select  name="filter">
                  <option value="grayscale">grayscale</option>
                  <option value="sepia">sepia</option>
                  <option value="saturate">saturate</option>
                  <option value="hue">hue</option>
                  <option value="invert">invert</option>
              </select>
            <h6>Type a Caption</h6>
              <textarea  name="caption" rows="4" cols="50"></textarea>

          
        
        <div class="card-footer text-muted text-center">
            <input type="submit" name ="action" value="Post new picture" >
        </div>


          </form>
      </div>
    </div>
  </div>

  <?php include("libraries/includes/footer.php"); ?>