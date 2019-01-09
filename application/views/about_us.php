<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet"> 
    <link rel="icon" type="image/ico" href="http://i63.tinypic.com/21lo7qe.png"/>
    
	<link rel="stylesheet" href="<?php echo base_url('front/custom.css') ?>">	
	<script src="<?php echo base_url('front/js/all.js') ?>"></script>
	<script src="<?php echo base_url('front/js/profile.js') ?>"></script>
	<script type='text/javascript'>
		var baseURL = '<?php echo base_url(); ?>';
 	</script>

    <!-- Navbar -->	
	<nav id="nav" class="navbar navbar-dark navbar-expand-md fixed-top student">
	<div class="container">
		<a class="navbar-brand gilroy-bold" href="<?php echo (base_url('index.php/home/')) ?>">Schoolmaya</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo (base_url()) ?>">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo (base_url('index.php/about_us/')) ?>">About Us</a>
				</li>
			</ul>
		</div>
	</div>
	</nav>

    <style>
    /* Parallax base styles
    --------------------------------------------- */

    .parallax {
        height: 500px; /* fallback for older browsers */
        height: 100vh;
        overflow-x: hidden;
        overflow-y: auto;
        -webkit-perspective: 300px;
        perspective: 300px;
    }

    .parallax__group {
        position: relative;
        height: 500px; /* fallback for older browsers */
        height: 100vh;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }

    .parallax__layer {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .parallax__layer--fore {
        -webkit-transform: translateZ(90px) scale(.7);
        transform: translateZ(90px) scale(.7);
        z-index: 1;
    }

    .parallax__layer--base {
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        z-index: 4;
    }

    .parallax__layer--back {
        -webkit-transform: translateZ(-300px) scale(2);
        transform: translateZ(-300px) scale(2);
        z-index: 3;
    }

    .parallax__layer--deep {
        -webkit-transform: translateZ(-600px) scale(3);
        transform: translateZ(-600px) scale(3);
        z-index: 2;
    }

    /* demo styles
    --------------------------------------------- */

    body, html {
        overflow: hidden;
    }

    body {
        font: 100% / 1.5 Arial;
    }

    * {
        margin:0;
        padding:0;
    }

    .parallax {
        font-size: 200%;
    }

    /* style the groups
    --------------------------------------------- */

    #groups1 {
        z-index: 0; /* slide under group 2 */
    }

    #groups1.parallax__group{
        height:30vh;
    }

    #groups2 {
        z-index: 5; /* slide over groups 1 and 3 */
    }

    #groups2.parallax__group{
        height: 40vh;
    }

    #groups2 .parallax__layer--back {
        background-image: url('http://localhost/schoolmaya/asset/img/about-us.jpeg');
        background-repeat: no-repeat;
        background-size: cover;
        height:110vh;
        margin-left:-10px;
        opacit
    }

    #groups3 {
        z-index: 10; /* slide under group 2 and 4 */
    }

    #groups3.parallax__group{
        height: 60vh;
    }

    #groups4 {
        z-index: 6; /* slide over group 3 and 5 */
    }

    #groups4.parallax__group{
        height: 80vh;
    }

    #groups4 .parallax__layer--base {
        background: #dddddd;
    }
    </style>

</head>
<body>
    <div class="parallax">
        <div id="groups2" class="parallax__group">
            <div class="parallax__layer parallax__layer--base d-flex justify-content-start align-items-center align-self-center header student">
                <div class="container">
                    <h1 class="display-3 gilroy-light">About Us</h1>
                    <div class="gilroy-light d-inline" size=>We make student life easier</div>
                </div>                
            </div>
            <div class="parallax__layer parallax__layer--back"></div>
        </div>
        <div id="groups3" class="parallax__group">
            <div class="parallax__layer parallax__layer--base d-flex justify-content-start align-items-center align-self-center">
                <div class="container text-light">
                    <h1 class="display-3 gilroy-bold">Education is the most powerful weapon which you can use to change the world</h1>
                    <div class="gilroy-light blockquote-footer text-light text-bold" size=>Nelson Mandela</div>
                </div>
            </div>
            <div class="parallax__layer parallax__layer--back"></div>
        </div>
        <div id="groups4" class="parallax__group p-5">
            <div class="parallax__layer parallax__layer--base d-flex justify-content-start align-items-center align-self-center">
                <div class="container" style="margin-top:60px">
                    <div class="gilroy-light display-3 mb-5" size=>Contact Us</div>
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1 gilroy-light">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1 gilroy-light">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="button" class="btn btn-outline-secondary gilroy-light">Submit</button>
                    </form>
                </div>
            </div>
            <div class="parallax__layer parallax__layer--back"></div>
        </div>
    </div>
</body>
</html>