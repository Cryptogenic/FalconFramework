<!-- Summary Section -->
<section id="login" class="login-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>Login or Register</h1>
        <div class="light-seperator"></div>

        <?php if($data['page']->alertSuccess != NULL): ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $data['page']->alertSuccess; ?>

                <script>
                  setTimeout(function() {
                    document.location.replace("<?php echo ASSET_ROOT; ?>/home/index");
                  }, 2000);
                </script>
              </div>
            </div>
          </div>

        <?php elseif($data['page']->alertError != NULL): ?>

          <div class="row">
            <div class="col-lg-12">
              <div class="alert alert-danger">
                <strong>Error!</strong> <?php echo $data['page']->alertError; ?>
              </div>
            </div>
          </div>

        <?php endif; ?>

        <div class="row">
          <div class="col-md-6">
            <p>
              Please enter your login details below, or register an account with us!
            </p>
            <br />
            <form method="POST" class="form" action="<?php echo ASSET_ROOT; ?>/home/login/dologin">
              <div class="form-group">
                <label class="sr-only" for="formEmail">Email</label>
                <input type="text" id="formEmail" name="email" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Email" />
              </div>

              <div class="form-group">
                <label class="sr-only" for="formPassword">Password</label>
                <input type="password" id="formPassword" name="password" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Password" />
              </div>

              <div class="form-group">
                <input type="submit" name="loginBtn" class="btn btn-success" value="Login" />
              </div>
            </form>
            <div style="margin-top: 20%"></div>
          </div>

          <div class="col-md-6">
            <p>
              Registration is free! Signup below... to test our login system!
            </p>
            <br />
            <form method="POST" class="form" action="<?php echo ASSET_ROOT; ?>/home/login/doregister">
              <div class="form-group">
                <label class="sr-only" for="formUsername">Username</label>
                <input type="text" id="formUsername" name="username" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Username" />
              </div>

              <div class="form-group">
                <label class="sr-only" for="formEmail">Email</label>
                <input type="text" id="formEmail" name="email" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Email" />
              </div>

              <div class="form-group">
                <label class="sr-only" for="formPassword">Password</label>
                <input type="password" id="formPassword" name="password" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Password" />
              </div>

              <div class="form-group">
                <label class="sr-only" for="formPasswordConf">Password</label>
                <input type="password" id="formPasswordConf" name="passwordConf" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Password Confirmation" />
              </div>

              <div class="form-group">
                <label class="sr-only" for="formReferrer">Referrer</label>
                <input type="text" id="formReferrer" name="referrer" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Referrer" />
              </div>

              <div class="form-group">
                <input type="submit" name="registerBtn" class="btn btn-info" value="Register" />
              </div>
            </form>
            <div style="margin-top: 20%"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
