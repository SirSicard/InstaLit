<?php include("libraries/includes/header.php"); ?>

<div class="edit-container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://scontent.fmmx3-1.fna.fbcdn.net/v/t1.0-9/118516678_10157156522332471_3673352244740208855_o.jpg?_nc_cat=103&ccb=2&_nc_sid=84a396&_nc_ohc=ZWx0eczviwIAX_Pd0Tj&_nc_ht=scontent.fmmx3-1.fna&oh=5dc1134ff6e622e511d8c82b4f95094b&oe=604A0696"><span class="font-weight-bold">Mattias Herzig</span><span class="text-black-50">mattias.herzig@medieinstitutet.se</span><span> </span>
            </div>
            <div class="d-flex flex-column align-items-center text-center" id="img-section"> <b>Profile Photo</b>
            <p>Accepted file type .png. Less than 1MB</p> <button class="btn btn-primary profile-button"><b>Upload</b></button>
        </div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value=""></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="Last Name"></div>
                </div>
                <div class="row mt12">
                    <div class="col-md-12"><label class="labels">Phone number</label><input type="text" class="form-control" placeholder="enter your phone number" value=""></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="Address" value=""></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Enter your email" value=""></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
            <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <h4 class="text-right">Change Password</h4>
                </div>
                <div class="row mt12">
                    <div class="col-md-12"><label class="labels">Enter your new password here</label><input type="text" class="form-control" placeholder="Password" value=""></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save your new password</button></div>
            </div>
        </div>
        </div>
        
    
    </div>
</div>

<?php include("libraries/includes/footer.php"); ?>