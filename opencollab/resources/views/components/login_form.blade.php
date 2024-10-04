

  <div class='logo-container'>
      <img src='path/to/logo.png' alt='Logo' class='logo' />
  </div>
  <div class='box'  id="login_box">
      <div class='box-form'>
          <div class='box-login-tab'></div>
          <div class='box-login-title'>
              <div class='i i-login'></div><h2>LOGIN</h2>
          </div>
          <div class='box-login'>
              <div class='fieldset-body' id='login_form'>
                  <button onclick="toggleLoginInfo();" class='b b-form i i-more' title='more info'></button>
                  <p class='field'>
                      <label for='user'>E-MAIL</label>
                      <input type='text' id='user' name='user' title='Username' />
                      <span id='valida' class='i i-warning'></span>
                  </p>
                  <p class='field'>
                      <label for='pass'>PASSWORD</label>
                      <input type='password' id='pass' name='pass' title='Password' />
                      <span id='valida' class='i i-close'></span>
                  </p>
                  <input type='submit' id='do_login' value='GET STARTED' title='Get Started' />
              </div>
          </div>
      </div>
      <div class='box-info'>
          <p><button onclick="toggleLoginInfo();" class='b b-info i i-left' title='Back to Sign In'></button><h3>Need Help?</h3></p>
          <div class='line-wh'></div>
          <button onclick="" class='b-support' title='Forgot Password?'> Forgot Password?</button>
          <div class='line-wh'></div>
          <button onclick="showSignupForm();" class='b-cta' title='Sign up now!'> CREATE ACCOUNT</button>
      </div>

  </div>

  <div class='box' style="display: none;" id="signup_box">
    <div class='box-form'>
        <div class='box-login-tab'></div>
        <div class='box-login-title' style="display: flex; align-items: center;"> <!-- Add flexbox for alignment -->
            <!-- Add button to the left of SIGNUP -->
            <button onclick="showLoginForm();" class='b b-info i i-left' title='Back to Sign In' style="margin-right: 10px; margin-left:10px;"> <!-- Added margin for spacing -->

            </button>
            <h2>SIGNUP</h2>
        </div>
        <div class='box-login'>
            <div class='fieldset-body' id='signup_form'>
                <p class='field'>
                    <label for='user'>USERNAME</label>
                    <input type='text' id='user_signup' name='user' title='Username' />
                    <span id='valida' class='i i-warning'></span>
                </p>
                <p class='field'>
                    <label for='email'>E-MAIL</label>
                    <input type='text' id='email_signup' name='email' title='Email' />
                    <span id='valida_signup_email' class='i i-warning'></span>
                </p>
                <p class='field'>
                    <label for='pass'>PASSWORD</label>
                    <input type='password' id='pass_signup' name='pass' title='Password' />
                    <span id='valida_signup_pass' class='i i-close'></span>
                </p>
                <input type='submit' id='do_signup' value='GET STARTED' title='Get Started' />
            </div>
        </div>
    </div>
</div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Ensure jQuery is included -->
  <script>
  $(document).ready(function() {
      $("#do_login").click(function() {
          closeLoginInfo();
          $(this).parent().find('span').css("display","none");
          $(this).parent().find('span').removeClass("i-save i-warning i-close");

          var proceed = true;
          $("#login_form input").each(function() {
              if (!$.trim($(this).val())) {
                  $(this).parent().find('span').addClass("i-warning").css("display", "block");
                  proceed = false;
              }
          });

          if (proceed) { // everything looks good! proceed...
              $(this).parent().find('span').addClass("i-save").css("display", "block");
          }
      });

      // Reset previously results and hide all messages on .keyup()
      $("#login_form input").keyup(function() {
          $(this).parent().find('span').css("display", "none");
      });

      openLoginInfo();
      setTimeout(closeLoginInfo, 1000);
  });

  let isLoginInfoVisible = true; // Track the visibility state

  function toggleLoginInfo() {
      if (isLoginInfoVisible) {
          closeLoginInfo();
      } else {
          openLoginInfo();
      }
      isLoginInfoVisible = !isLoginInfoVisible; // Toggle visibility state
  }

  function openLoginInfo() {
      $('.b-form').css("opacity", "0.01");
      $('.box-form').animate({ left: "-37%" }, 300); // Animate left position
      $('.box-info').animate({ right: "-37%" }, 300); // Animate right position
  }

  function closeLoginInfo() {
      $('.b-form').css("opacity", "1");
      $('.box-form').animate({ left: "0px" }, 300); // Animate back to original position
      $('.box-info').animate({ right: "-5px" }, 300); // Animate back to original position
  }

  $(window).on('resize', function() {
      closeLoginInfo();
  });

  function showSignupForm() {
  $('#login_box').hide(); // Hide login box
  $('#signup_box').show(); // Show signup box
}

function showLoginForm() {
  $('#signup_box').hide(); // Hide signup box
  $('#login_box').show(); // Show login box
}

  </script>
