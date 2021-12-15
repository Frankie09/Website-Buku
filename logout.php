<?php


echo '

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
 .navbar {
 
  background-color: #DFF1F3;

 
}


.box {
    position: relative;
    width: 200px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: space-evently
}

.box span {
    display: block;
    height: 20px;
    width: 20px;
    background: #000;
    border-radius: 50%;
    animation: all-effect 0.6s linear infinite alternate;
    transform: scale(0)
}

.box span:nth-child(1) {
    animation-delay: 0.1s
}

.box span:nth-child(2) {
    animation-delay: 0.2s
}

.box span:nth-child(3) {
    animation-delay: 0.3s
}

.box span:nth-child(4) {
    animation-delay: 0.4s;
    background: #00b9f5
}

.box span:nth-child(5) {
    animation-delay: 0.5s;
    background: #00b9f5
}

@keyframes all-effect {
    100% {
        transform: scale(1)
    }
}
</style>

<body>
<nav class="navbar navbar-expand-sm  navbar-light"> 
		<a class="navbar-brand" href="index.php">RedifraMedia</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"> 
					<a class="nav-link active" href="logout.php">Keluar</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container" style="margin-top:50px">

</body>
</form>

';


session_start();
session_destroy();
echo ' <div class="container "><div class="row justify-content-center"> 

    <div class="box"> <span></span> <span></span> <span></span> <span></span> <span></span> </div>
	</div>
	
</div>';
header("Refresh:2; url=login.php");

?>