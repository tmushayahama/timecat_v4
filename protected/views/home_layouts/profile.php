<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<!--[if !IE 7]> <style type="text/css">#wrap {display:table;height:100%}</style> <![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="initial-scale=1.0">
	<title>TimeCaT 4</title>
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet" href="css/general_foundicons.css">
	<script src="js/vendor/custom.modernizr.js"></script>
	<link rel="stylesheet" href="css/chelop.css" />
</head>
<body>
<div id="wrap" class="blangradient">
	<nav class="top-bar bluerer">
		<ul class="title-area">
			<li id="gato" class="name"><h1><a href="load.php">TimeCaT <small><em>4.0</em></small></a></h1></li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
		<section class="top-bar-section">
			<ul class="right">
				<li class="divider"></li>
				<li><a class="bluerer" href="load.php">Studies</a></li>
				<li class="divider"></li>
				<li><a class="bluerer" href="#">TCNet</a></li>
				<li class="divider"></li>
				<li><a class="bluerer" href="profile.php">Profile</a></li>
				<li class="divider"></li>
				<li class="has-form bluerer"><a href="index.php" class="button alert">Logout</a></li>
			</ul>
		</section>
	</nav>
	<div id="main">
		<div class="row">
			<h3>Profile<small> TimeCaT member</small></h3>
		</div>	
		<div class="row panel">
			<div class="large-3 columns text-center">
				<img src="img/defaultuser.gif" alt="profile avatar" /><br/><br/>
				<a href="#" class="small button secondary radius"><i class="foundicon-photo sear" ></i> Change avatar</a>
			</div>
			<div class="large-4 columns">
			<div class="row">
				<h3><small>Account Information</small></h3>
			</div>	
				<div class="row">
					<div class="large-12 columns">
						<p><strong>User:</strong> chelop.duh@gmail.com</p>
						<p><strong>Password:</strong> **************</p>
						<P><a href="#" data-reveal-id="myModal" class="small button secondary radius"><i class="foundicon-lock sear" ></i> Change Password</a></p>
					</div>
				</div>
				
			</div>
			<div class="large-5 columns">
			<div class="row">
				<h3><small>User Details</small></h3>
			</div>
				<div class="row">
					<div class="large-12 columns">
						<p><strong>First name:</strong> Marcelo</p>
						<p><strong>Last name:</strong> Lopetegui</p>
						<p><strong>Institution:</strong> The Ohio State University</p>
						<P><a href="#" data-reveal-id="myModal2" class="small button secondary radius"><i class="foundicon-edit sear" ></i> Edit Details</a></p>
					</div>
				</div>			
			</div>
			
		</div> 
	</div>
</div>

<!-- Footer -->
<div id="footer" >
	<div class="row">
		<div class="large-12 columns">
			<div class="row">
				<div class="large-6 columns wexner hide-for-small"></div>
				<div class="large-6 columns elfoot">
					<p class="footwhite"><strong>TimeCaT &copy; 2011-<?php echo date("Y"); ?></strong><br/><em>Department of Biomedical Informatics</em><br/>The Ohio State University</p>
				</div>
			</div>
        </div>
	</div>
</div>
<!-- End Footer -->

<script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
</script>
  
<script src="js/foundation.min.js"></script>
  
  
<script>
	$(document).foundation();
</script>
<div id="myModal" class="reveal-modal medium">
  <h2>Change Password.</h2>
			<div class="row">
				<div class="large-9 large-centered columns celeste inputers">
				  <div class="row">
					<div class="large-3 columns">
					  <label for="oldpass" >Old</label>
					</div>
					<div class="large-9 columns">
					  <input type="password" id="oldpass" placeholder="Old Password">
					</div>
				  </div>
				</div>
			  </div>
			<div class="row">
				<div class="large-9 large-centered columns celeste inputers">
				  <div class="row">
					<div class="large-3 columns">
					  <label for="password" >New</label>
					</div>
					<div class="large-9 columns">
					  <input type="password" id="password" placeholder="New Password">
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="large-9 large-centered columns celeste inputers">
				  <div class="row">
					<div class="large-3 columns">
					  <label for="password2" >Confirm</label>
					</div>
					<div class="large-9 columns">
					  <input type="password" id="password2" placeholder="Repeat New Password">
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
			  <div class="small-12 columns text-right">
								<a href="#" class="button ">Change Password</a>
							</div>
			  </div>
  <a class="close-reveal-modal">&#215;</a>
</div>
<div id="myModal2" class="reveal-modal medium">
  <h2>Edit details.</h2>
			<div class="row">
				<div class="large-9 large-centered columns celeste inputers">
				  <div class="row">
					<div class="large-3 columns">
					  <label for="firstname" >First Name</label>
					</div>
					<div class="large-9 columns">
					  <input type="text" id="firstname" value="Josie">
					</div>
				  </div>
				</div>
			  </div>
				 <div class="row">
				<div class="large-9 large-centered columns celeste inputers">
				  <div class="row">
					<div class="large-3 columns">
					  <label for="lastname" >Last Name</label>
					</div>
					<div class="large-9 columns">
					  <input type="text" id="lastname" value="Fine">
					</div>
				  </div>
				</div>
			  </div>
				<div class="row">
				<div class="large-9 large-centered columns celeste inputers">
				  <div class="row">
					<div class="large-3 columns">
					  <label for="institution" >Institution</label>
					</div>
					<div class="large-9 columns">
					  <input type="text" id="institution" value="The Ohio State University">
					</div>
				  </div>
				</div>
			  </div>
			
			  <div class="row">
			  <div class="small-12 columns text-right">
								<a href="#" class="button ">Save changes</a>
							</div>
			  </div>
  <a class="close-reveal-modal">&#215;</a>
</div>
</body>
</html>
