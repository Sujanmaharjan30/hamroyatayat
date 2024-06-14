<?php
require_once './pageComponents/header.php';

?>
<div class="container">
	<div class="header">
		<h2>Contact</h2>
		<h4>Contact us, and get reply with in an hours!</h4>
	</div>
	<form id="form" class="form">
		<div class="form-control">
			<input type="text" placeholder="Your name" id="username" />
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<input type="email" placeholder="Your mail" id="email" />
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<input type="Number" placeholder="Your phone number" id="number"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
		<input type="text" placeholder="Type your Message Here...." id="msg"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<!-- <div class="form-control">
			<label for="username">Password check</label>
			<input type="password" placeholder="Password two" id="password2"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div> -->
		<button>Submit</button>
	</form>
</div>
<?php
require_once './pageComponents/footer.php';
?>