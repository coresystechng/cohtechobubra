<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard - Student Portal - COHTECH Obubra</title>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
		/>

        <!-- link for font awesome icons -->
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
		/>	
		<!-- link for material icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />
		<style>
			.page-header {
				background-color: #f0f0f0;
				height: 10vh;
				display: flex;
				align-items: center;
			}

			.sidebar {
				width: 18vw !important;
				height: 80vh;
				background-color: #e0e0e0;
				padding: 20px;
                margin-bottom: -20px;
			}

			.content {
				padding: 20px;
			}

			.sidebar-nav {
				list-style: none;
				padding: 0;
			}

			.sidebar-nav li {
				margin-bottom: 10px;
			}

			.header-content {
				display: flex;
				align-items: center;
				/* justify-content: space-between; */
				column-gap: 100vh;
			}

			.underline {
				text-decoration: underline;
			}

			.theme-color-text {
				color: #702963 !important;
			}

			.theme-color-bg {
				background-color: #702963 !important;
			}

			footer {
				height: 10vh !important;
				display: flex;
				justify-content: center;
				align-items: center;
			}

			.dropdown-trigger{
				position: relative;
			}
			
			.dropdown-content{
				position: absolute;
				top: -3vw;
			}
		</style>
	</head>
	<body>
		<header class="page-header">
			<div class="container">
				<div class="header-content">
					<img
						src="./img/cohtech-logo-full.png"
						alt=""
						width="120px"
						class="responsive-img"
					/>
					<a href="./profile.php " class="dropdown-trigger" data-target="dropdown1">
						<i class="fa-solid fa-user fa-xl theme-color-text"></i>
						<i class="material-icons theme-color-text">arrow_drop_down</i>
					</a>


					<ul id="dropdown1" class="dropdown-content">
  						<li><a href="./profile.php" class="theme-color-text">profile</a></li>
  						<li><a href="./logout.php" class="red-text">logout</a></li>
					</ul>
				</div>
			</div>
		</header>

		<div class="row">
			<aside class="col s12 m4 l3 sidebar">
				<ul class="sidebar-nav">
					<div class="container">
						<li>
							<a href="#" class="black-text">
							<i class="fa-solid fa-chart-column"></i>			
							Dashboard			
							</a>
						</li>
						<li>
							<a href="#" class="black-text">
							<i class="fa-solid fa-book"></i>	
							Courses
							</a>
						</li>
						<li>
							<a href="#" class="black-text">
							<i class="fa-solid fa-money-bill"></i>	
							Payment
							</a>
						</li>
						<li>
							<a href="#" class="black-text">
							<i class="fa-solid fa-circle-check lg"></i>	
							Result
							</a>
						</li>
						<li>
							<a href="#" class="black-text">
							<i class="fa-solid fa-user"></i>
							profile
							</a>
						</li>
					</div>
					<br />
					<div class="container">
						<a href="./logout.php" class="theme-color-bg btn">logout</a>
					</div>
				</ul>
			</aside>

			<main class="col s12 m8 l9 content">
				<div class="container"></div>
			</main>
		</div>
		<footer class="center-align black">
			<span class="white-text">
				© 2025 COHTECH Obubra. All Rights Reserved.
				<a href="./index.html" target="_blank" class="white-text underline"
					>Back To Home</a
				>
			</span>
		</footer>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script>
			$(document).ready(function() {
  		      $('.dropdown-trigger').dropdown();
			});
		</script>
	</body>
</html>
