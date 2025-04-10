<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard - Student Portal - COHTECHOBUBRA</title>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
		/>

        
		<link rel="icon" href="./img/cohtech-logo.png" type="image/x-icon" />
		<style>
			.page-header {
				background-color: #f0f0f0;
				height: 10vh;
				display: flex;
				align-items: center;
			}

			.sidebar {
				width: 250px;
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

			.btn {
				border-radius: 20px;
			}

			.header-content {
				display: flex;
				align-items: center;
				justify-content: space-between; /* Space between logo and profile */
			}

			footer {
				height: 10vh !important;
				display: flex;
				justify-content: center;
				align-items: center;
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
						width="100px"
						class="responsive-img"
					/>
					<a href="./profile.php" class="btn purple">Profile</a>
				</div>
			</div>
		</header>

		<div class="row">
			<aside class="col s12 m4 l3 sidebar">
				<ul class="sidebar-nav">
					<div class="container">
						<li><a href="#" class="black-text">Dashboard</a></li>
						<li><a href="#" class="black-text">Courses</a></li>
						<li><a href="#" class="black-text">Payment</a></li>
						<li><a href="#" class="black-text">Result</a></li>
					</div>
					<br />
					<div class="container">
						<a href="./logout.php" class="purple btn">logout</a>
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

		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	</body>
</html>
