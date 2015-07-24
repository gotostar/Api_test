<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Image Gallery :: Base Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <link href="./css/bootstrap-responsive.min.css" rel="stylesheet" />
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
    <link href="./css/font-awesome.min.css" rel="stylesheet" />
    
    <link href="./css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
	<link href="./js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
    
    <link href="./css/base-admin-2.css" rel="stylesheet" />
    <link href="./css/base-admin-2-responsive.css" rel="stylesheet" />

    <link href="./css/custom.css" rel="stylesheet" />
    
    <style>
    #eq span {
		height: 175px;
		float: left;
		margin: 15px;
	}
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>
			</a>
			
			<a class="brand" href="./index.html">
				Base Admin <sup>2.0</sup>				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Settings
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Account Settings</a></li>
							<li><a href="javascript:;">Privacy Settings</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>
						
					</li>
			
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							Rod Howard
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">My Profile</a></li>
							<li><a href="javascript:;">My Groups</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Logout</a></li>
						</ul>
						
					</li>
				</ul>
			
				<form class="navbar-search pull-right" />
					<input type="text" class="search-query" placeholder="Search" />
				</form>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">

			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
			</a>

			<div class="subnav-collapse collapse">
				<ul class="mainnav">
				
					<li class="">
						<a href="./index.html">
							<i class="icon-home"></i>
							<span>Home</span>
						</a>	    				
					</li>
					
					<li class="dropdown">					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-th"></i>
							<span>Components</span>
							<b class="caret"></b>
						</a>	    
					
						<ul class="dropdown-menu">
							<li><a href="./elements.html">Elements</a></li>
							<li><a href="./validation.html">Validation</a></li>
							<li><a href="./jqueryui.html">jQuery UI</a></li>
							<li><a href="./charts.html">Charts</a></li>
							<li><a href="./popups.html">Popups/Notifications</a></li>
						</ul> 				
					</li>
					
					<li class="dropdown active">					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-copy"></i>
							<span>Sample Pages</span>
							<b class="caret"></b>
						</a>	    
					
						<ul class="dropdown-menu">
							<li><a href="./pricing.html">Pricing Plans</a></li>
							<li><a href="./faq.html">FAQ's</a></li>
							<li><a href="./gallery.html">Gallery</a></li>
							<li><a href="./reports.html">Reports</a></li>
							<li><a href="./account.html">User Account</a></li>
						</ul> 				
					</li>
					
					<li class="dropdown">					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-external-link"></i>
							<span>Extra Pages</span>
							<b class="caret"></b>
						</a>	
					
						<ul class="dropdown-menu">
							<li><a href="./login.html">Login</a></li>
							<li><a href="./signup.html">Signup</a></li>
							<li><a href="./error.html">Error</a></li>
							<li class="dropdown-submenu">
			                  <a tabindex="-1" href="#">Dropdown menu</a>
			                  <ul class="dropdown-menu">
			                    <li><a tabindex="-1" href="#">Second level link</a></li>
			                    <li><a tabindex="-1" href="#">Second level link</a></li>
			                    <li><a tabindex="-1" href="#">Second level link</a></li>
			                  </ul>
			                </li>
						</ul>    				
					</li>
				
				</ul>
			</div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
<div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="span12">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-th-large"></i>
					<h3>Image Gallery</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<ul class="gallery-container">
							
							<li>
								<a href="./img/gallery/lr1_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr1.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr1_large.png" class="preview"></a>
							</li>
							
							<li>
								<a href="./img/gallery/lr2_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr2.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr2_large.png" class="preview"></a>
							</li>
							
							<li>
								
								<a href="./img/gallery/lr3_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr3.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr3_large.png" class="preview"></a>
							</li>
							
							<li>
								
								<a href="./img/gallery/lr4_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr4.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr4_large.png" class="preview"></a>
							</li>
							
							<li>
								
								<a href="./img/gallery/lr5_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr5.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr5_large.png" class="preview"></a>
								
							</li>
							
							<li>
								
								<a href="./img/gallery/lr2_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr2.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr2_large.png" class="preview"></a>
								
							</li>
							
							<li>
								
								<a href="./img/gallery/lr3_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr3.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr3_large.png" class="preview"></a>
							</li>
							
							<li>
								
								<a href="./img/gallery/lr1_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr1.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr1_large.png" class="preview"></a>
							</li>
							
							<li>
								
								<a href="./img/gallery/lr2_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr2.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr2_large.png" class="preview"></a>
								
							</li>
							
							<li>
								
								<a href="./img/gallery/lr3_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr3.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr3_large.png" class="preview"></a>
							</li>
							
							<li>
								
								<a href="./img/gallery/lr4_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr4.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr4_large.png" class="preview"></a>
							</li>
							
							<li>
								
								<a href="./img/gallery/lr5_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr5.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr5_large.png" class="preview"></a>
								
							</li>
							
							<li>
								
								<a href="./img/gallery/lr2_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr2.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr2_large.png" class="preview"></a>
								
							</li>
							
							<li>
								
								<a href="./img/gallery/lr3_large.png" class="ui-lightbox">								
									<img src="./img/gallery/lr3.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr3_large.png" class="preview"></a>
							</li>
							
							<li>
								
								<a href="./img/gallery/lr4_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr4.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr4_large.png" class="preview"></a>
							</li>
							
							<li>
								
								<a href="./img/gallery/lr3_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr3.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr3_large.png" class="preview"></a>
							</li>
							
							<li>
								
								<a href="./img/gallery/lr1_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr1.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr1_large.png" class="preview"></a>
							</li>
							
							<li>
								
								<a href="./img/gallery/lr2_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr2.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr2_large.png" class="preview"></a>
								
							</li>
							
							<li>
								
								<a href="./img/gallery/lr3_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr3.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr3_large.png" class="preview"></a>
							</li>
							
							<li>
								
								<a href="./img/gallery/lr4_large.png" class="ui-lightbox">
									<img src="./img/gallery/lr4.png" alt="" />
								</a>
								
								<a href="./img/gallery/lr4_large.png" class="preview"></a>
							</li>
							
						</ul>
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->					
			
	    </div> <!-- /span12 -->     	
      	
      	
      </div> <!-- /row -->
      
      
      
      

    </div> <!-- /container -->
    
</div> <!-- /main -->
    


<div class="extra">

	<div class="container">

		<div class="row">
			
			<div class="span3">
				
				<h4>About</h4>
				
				<ul>
					<li><a href="javascript:;">About Us</a></li>
					<li><a href="javascript:;">Twitter</a></li>
					<li><a href="javascript:;">Facebook</a></li>
					<li><a href="javascript:;">Google+</a></li>
				</ul>
				
			</div> <!-- /span3 -->
			
			<div class="span3">
				
				<h4>Support</h4>
				
				<ul>
					<li><a href="javascript:;">Frequently Asked Questions</a></li>
					<li><a href="javascript:;">Ask a Question</a></li>
					<li><a href="javascript:;">Video Tutorial</a></li>
					<li><a href="javascript:;">Feedback</a></li>
				</ul>
				
			</div> <!-- /span3 -->
			
			<div class="span3">
				
				<h4>Legal</h4>
				
				<ul>
					<li><a href="javascript:;">License</a></li>
					<li><a href="javascript:;">Terms of Use</a></li>
					<li><a href="javascript:;">Privacy Policy</a></li>
					<li><a href="javascript:;">Security</a></li>
				</ul>
				
			</div> <!-- /span3 -->
			
			<div class="span3">
				
				<h4>Settings</h4>
				
				<ul>
					<li><a href="javascript:;">Consectetur adipisicing</a></li>
					<li><a href="javascript:;">Eiusmod tempor </a></li>
					<li><a href="javascript:;">Fugiat nulla pariatur</a></li>
					<li><a href="javascript:;">Officia deserunt</a></li>
				</ul>
				
			</div> <!-- /span3 -->
			
		</div> <!-- /row -->

	</div> <!-- /container -->

</div> <!-- /extra -->


    
    
<div class="footer">
		
	<div class="container">
		
		<div class="row">
			
			<div id="footer-copyright" class="span6">
				&copy; 2012-13 Jumpstart UI.
			</div> <!-- /span6 -->
			
			<div id="footer-terms" class="span6">
				Theme by <a href="http://jumpstartui.com" target="_blank">Jumpstart UI</a>
			</div> <!-- /.span6 -->
			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /footer -->
    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./js/libs/jquery-1.8.3.min.js"></script>
<script src="./js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="./js/libs/bootstrap.min.js"></script>

<script src="./js/plugins/hoverIntent/jquery.hoverIntent.minified.js"></script>
<script src="./js/plugins/lightbox/jquery.lightbox.min.js"></script>

<script src="./js/Application.js"></script>

<script src="./js/demo/gallery.js"></script>

  </body>
</html>
