<?php
require_once("../header.php") ;
?>
<style type="text/css">
.back {
  background-image: url("../img/1.jpg");
  background-size: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  bottom: 0;
  
}

.div-center {
  width: 400px;
  height: 400px; 
  opacity: 0.7;
  background-color: #FFF;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  max-width: 100%;
  max-height: 100%;
  overflow: auto;
  padding: 1em 2em;
  border-bottom: 2px solid #ccc;
  display: table;
  border-radius: 10px;
}

div.content {
  display: table-cell;
  vertical-align: middle;
}	


</style>
<div class="back">
	<div class="div-center">
		<div class="content">
			<h3>Login</h3>
			<hr />
			<form>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
				<hr />
				<button type="button" class="btn btn-link">Signup</button>
				<button type="button" class="btn btn-link">Reset Password</button>
			</form>
		</div>
	</span>
</div>
		
	

<?php  require_once("../footer.php")  ?>