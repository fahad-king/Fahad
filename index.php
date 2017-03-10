
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CSAS</title>
		<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

		<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
	</head>

	<body>

		<div id="templatemo_wrapper">
			
			<div id="templatemo_header">

			<div id="site_title">
				<h1><a href="#" target="_parent">
				<strong>CSAS - 2017</strong>
				<span>Cetral Seat Allotment System</span>
				</a></h1>
			</div>
			
			<div class="twitter">
					<a href="http://www.nitc.ac.in/">Organizing Institute <br/><span>NIT CALICUT</span></a>
			</div>
			
		</div> <!-- end of templatemo_header -->
		<div id="templatemo_menu">

			<ul>
				
				<li><a href="index.php" 
					class="current first" >Home</a></li>
				<li><a href="participating_nits.php" 
					 >Participating NITs</a></li>
				<li><a target="_blank" href="seat_matrix.pdf" 
					 >Seat Matrix</a></li>
				<li><a href="imp_dates.php" 
					 >Important Dates</a></li>
				
						<li><a href="contact.php"  >Contact</a></li>
					</ul> 
		</div> 
		<!-- end of templatemo_menu -->
			
			<div id="templatemo_content_wrapper">
				<div class="cleaner"></div>
				<div style="background:url(images/templatemo_slider.png); padding:5px;">
					<marquee style="color:#FF0000"><strong></strong></marquee>
				</div>
				<div id="templatemo_slider">
					<div id="one" class="contentslider">
						<div class="cs_wrapper">
							<div class="cs_slider">
								<div class="cs_article">
									<div class="article_content">
										
										<div>	
											<div >
												<font color = "green"><h2>Login</h2></font>
												<center>
													<?php
														error_reporting(E_ALL);
														include_once("config.php");
														include_once("includes/functions.php");

														if(isset($_REQUEST['code'])){
															$gClient->authenticate();
															$_SESSION['token'] = $gClient->getAccessToken();
															header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
														}

														if (isset($_SESSION['token'])) {
															$gClient->setAccessToken($_SESSION['token']);
														}

														if ($gClient->getAccessToken()) {
															echo "<script>alert('i got access token ');</script>";
															$userProfile = $google_oauthV2->userinfo->get();
														//DB Insert
															$gUser = new Users();
															$gUser->checkUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['family_name'],$userProfile['email'],$userProfile['gender'],$userProfile['locale'],$userProfile['link'],$userProfile['picture']);
															$_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
															header("location: account.php");
															$_SESSION['token'] = $gClient->getAccessToken();
														} 
														else {
															$authUrl = $gClient->createAuthUrl();
														}

														if(isset($authUrl)) {
															echo '<a href="dashboard.php"><img src="images/gog.jpg" alt="" height="150" width="150"/></a>';
														}
														else {
															echo '<a href="logout.php?logout">Logout</a>';
														}

													?>
												</center>
											</div>
										</div>
									</div>
							
								</div><!-- End cs_article -->	
						
							</div><!-- End cs_slider -->
						</div><!-- End cs_wrapper -->
					</div><!-- End contentslider -->
						
						<!-- Site JavaScript -->
				</div> <!-- end of slider -->
					   
				<div id="templatemo_content">
					<h2>About CSAS</h2>
					<p style="text-align:justify;width:135%;" >
						National Institutes of Technology (NITs) are Institutions of National Importance Under MHRD, Govt. of India. The CSAS is a Common Entrance National Level Test, conducted by any of the NITs ,for admission in to their MCA programme. The MCA prgoramme is offered by NITs at <strong>Agartala, Allahabad, Bhopal, Calicut, Durgapur, Jamshedpur, Kurukshetra, Raipur, Surathkal, Tiruchirappalli and Warangal</strong> .The admission into the MCA programme for the year 2017-18 is based on the Rank obtained in CSAS-2017 ONLY. 
					</p>
		  
				</div> <!-- end of templatemo_content -->
				<div id="templatemo_sidebar">
					<div class="cleaner"></div>
				</div> <!-- end of sidebar -->
					
				<div class="cleaner"></div>
				
			</div> <!-- end of templatemo_content_wrapper -->
				<div id="templatemo_footer" align="center">
					<img src="images/3.gif" style="width:80%;height:80%"/><br>
				</div> <!-- end of templatemo_footer -->
				<div align="center">Copyright by<strong> NIT CALICUT</strong>  @2017</div>

		</div> <!-- end of wrapper -->
	</body>
</html>
