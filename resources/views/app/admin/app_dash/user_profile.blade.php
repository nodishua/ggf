@include('app.admin.app.header')
<div class="content-wrapper">
<section class="content-header">
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6></h6>
        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>

        </div><!--/col-3-->
    	<div class="col-sm-9">
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="name">Name</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" >
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="phone">Phone Number</label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Your Phone Number" title="enter your phone number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Address" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="address">Alamat</label>
                              <textarea class="form-control" id="address" rows="3" name="address"></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-3">
                            <label for="pos_code">Pos Code</label>
                            <input type="text" class="form-control" id="pos_code" required>
                        </div>
                      </div>
                      <button type="button" class="btn btn-secondary float-right">Save Profile</button>
              	</form>
    </section>

</div><!--/row-->

@include('app.admin.app.footer')
