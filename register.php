    <?php
require_once './pageComponents/header.php';
?>
<div class="container">
	<div class="header">
		<h2>Create Account</h2>
	</div>
<style>
    .form-control.success input{
    border: 2px solid #2ecc71;
}
.form-control.fail input{
    border: 2px solid #e74c3c;
    
}
.form-control.fail small {
            color: red;
            visibility: visible;
        }
</style>
	<?php
   
    if (isset($_GET['message'])) {
        $errorMessage = $_GET['message'];
        echo "<center><p style='color:red'> $errorMessage</p></center>";
    }
    ?>
	<form id="form" class="form" action="./actions/register_action.php" method="post">
		<div class="form-control">
			<label for="username">Username</label>
			<input type="text" placeholder="florinpop17" id="username"name="username" />
			
			<small></small>
		</div>
		<div class="form-control">
			<label for="username">Email</label>
			<input type="email" placeholder="a@florin-pop.com" id="email"name="email" />

			<small></small>
		</div>
		<div class="form-control">
    <label for="username">Phone</label>
    <input type="text" max="9999999999" min="1000000000" 
    placeholder="Phone" id="phone" name="phone"/>
   
    <small></small>
</div>

		<div class="form-control">
			<label for="username">Password</label>
			<input type="password" placeholder="Password" id="password" name="password"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small></small>
		</div>
		<div class="form-control">
			<label for="username">Password check</label>
			<input type="password" placeholder="Password two" id="password2"name="password2"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small></small>
		</div>
		<button>Submit</button>
		<p class="message">Already registered? <a href="./login.php">Log in</a></p>
	</form>
</div>
<script>
    const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById("email");
const phone = document.getElementById("phone");
const password = document.getElementById("password");
const cpassword = document.getElementById("password2");





form.addEventListener('submit',(e)=>{
  e.preventDefault();
  if (checkInputs()) { // Only submit the form if validation passes
    form.submit();
  }
});


function checkInputs(){
  
  const usernameValue = username.value.trim();
  const emailValue = email.value.trim();
  
  const phoneValue = phone.value.trim();
  const passwordValue = password.value.trim();
  const cpasswordValue = password2.value.trim();

  let isValid = true;
  

 

  if(usernameValue.length < 5 || usernameValue.length > 20 || !/\d$/.test(usernameValue)){
    setError(username, "Username must be 5-20 characters and end with a number");
    isValid = false;
  }
  
  if(!isEmail(emailValue)){
    setError(email, "Email is not valid");
    isValid = false;
  }
  
 
  if(!/^$|^\d{10}$/.test(phoneValue)){
    setError(phone, "Invalid phone number format (10 digits)");
    isValid = false;
  }
  if(passwordValue.length<8 || passwordValue.length>16){
    setError(password, "Password must be 8-16 characters");
    isValid = false;
  }
  if(cpasswordValue !== passwordValue){
    setError(cpassword, "Password does not match");
    isValid = false;
  }

  return isValid;
}

function setError(input, message){
  const formControl = input.parentElement;
  const small = formControl.querySelector('small');
  small.innerText =  message;
  formControl.classList.add("fail");
}

function isEmail(email){
  let pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
return pattern.test(email);
}
</script>




<?php
require_once './pageComponents/footer.php';
?>