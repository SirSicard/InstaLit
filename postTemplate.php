<?php include("libraries/includes/header.php"); ?>

<div class="row">
  <div class="col-12">
    <div class="post-container">
      <div class="card">
        <div class="card-header">
          <div class="content-container">
            <div class="post-left">Avatar Image | username</div>
            <div class="spacer"></div>
            <div class="post-right">timestamp</div>
          </div>
          
        </div>
        <div class="card-body text-center">
          <div class="post-img">
            <a href="https://placeholder.com"><img src="https://via.placeholder.com/500" alt=""></a>
          </div>
          
          <div class="post-caption">
            this will be the caption that users need to set when they create a post.
          </div>

          <div class="post-reactions">
            Here be Reactions - (reactions table in database)
          </div>
          
          <div class="post-comments">
            this will be where the comments are displayed (comments table)
          </div>
        </div>
        
        <div class="card-footer text-muted">
          this will be where users can input a comment
        </div>
      </div>
    </div>
  </div>

  <?php include("libraries/includes/footer.php"); ?>