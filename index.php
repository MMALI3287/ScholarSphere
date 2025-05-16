<?php require 'pages/partials/_header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="pages/css/bootstrap.css" />
    <link rel="stylesheet" href="pages/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Landing Page</title>
</head>

<body>

    <?php include 'pages/partials/_header.php'; ?>
    <div class="header" style=" background-image: url(pages/assets/images/landing.png);
    @media (max-width: 1550px) { 
    background-image: none !important;
    background-color: #03045e !important;}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="headerh">Revolutionize</h1>
                    <p class="headerp">ScholarSphere: Reinventing the Higher Education Experience</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text" style=" background-image: url(pages/assets/images/landing2.png);
    @media (max-width: 1550px) { 
    background-image: none !important;
    display: block !important;
    background-color: #fba22f !important;
    padding: 20px !important;}">
        <div class="container">
            <div class="row">
                <h1 class="headerh2">Unlock Your Academic Universe</h1>
                <div class="col-md-7">
                    <p class="headerp2"> Say goodbye to endless browsing! ScholarSphere
                        streamlines university exploration and delivers reliable,
                        up-to-date information to boost your decision-making. Peer into comprehensive
                        institution profiles spotlighting history, departments, alumni reviews, and more.</p><br>
                    <p class="headerp2"> Introducing ScholarSphere's search engine with advanced filtering options
                        to aid in efficient university exploration. Access tailored collections to manage your
                        favorite universities and join our enlightened academic community for knowledge-sharing
                        and lively discussions.</p><br>
                    <p class="headerp2"> Onboard seamlessly with various registration and membership options
                        for admission candidates, alumni, current students, and administrators. Be a part of
                        our trusted profile validation system and experience exceptional authenticity in the
                        world of higher education.</p><br>
                </div>
            </div>
        </div>
    </div>

    <div class="text" style="background-image: url(pages/assets/images/landing3.png);
    @media (max-width: 1550px) { 
    background-image: none !important;
    display: block !important;
    background-color: #fba22f !important;
    padding: 20px !important;}">
        <div class="container">
            <div class="row">
                <h1 class="headerh3">Key Features</h1>
                <div class="col-md-6">
                    <p class="headerp3"> Embark on your educational journey with ScholarSphere
                        and explore the limitless possibilities with our powerful features.</p><br>
                </div>
                <div class="col-md-6">
                    <p class="headerp33 pt-5">Live Admission Tracker</p>
                    <hr>
                    <p class="headerp33">Academic Discussion Community</p>
                    <hr>
                    <p class="headerp33">Trusted Profile Validation</p>
                    <hr>
                    <p class="headerp33">Weekly ScholarSphere Bulletin</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="text" style="background-image: url(pages/assets/images/landing4.png);
    @media (max-width: 1550px) { 
    background-image: none !important;
    display: block !important;
    background-color: #fba22f !important;
    padding: 20px !important;}">
        <div class="container">
            <div class="row">
                <h1 class="headerh4">Ready To Dive In?</h1>
                <div class="col-md-12">
                    <p class="headerp4"> Join ScholarSphere today and be a part of </p>
                    <p class="headerp4">the future of higher education. Embrace knowledge,</p>
                    <p class="headerp4 pb-5"> collaboration, and innovation right here, right now!</p><br>
                    <a href="pages/signup.php"><button type="button" class="explorebtn">Explore ScholarSphere</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="yellow"></div>
    <?php    include 'pages/partials/_footer.php';
    include 'pages/partials/_bootstrapjs.php';
    ?>
    <script src="pages/js/index.js"></script>
</body>

</html>