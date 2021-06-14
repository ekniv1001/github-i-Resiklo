<?php include "session.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">


    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection" />
    <!-- Import fontawesome -->
    <script src="https://kit.fontawesome.com/621283ac00.js" crossorigin="anonymous"></script>

    <title>User Page</title>

</head>


<body>
    <?php include "sessionbody.php";?>
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="user_home_view.php" class="brand-logo" style="font-weight: 600;">i-Resiklo</a>
                        <a href="#" data-target="mobile-ver" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li style="font-weight: 600;"><a href="user_home_view.php">Home</a></li>
                            <li style="font-weight: 600;"><a href="user_profile.php">Profile</a></li>
                            <li style="font-weight: 600;"><a href="user_rewards.php">Rewards</a></li>
                            <li style="font-weight: 600;"><a href="user_points.php">My Points</a></li>
                            <li style="font-weight: 600;"><a href="user_voucher.php">Voucher</a></li>
                            <li style="font-weight: 600;"><a href="user_logs.php">History</a></li>
                            <li style="font-weight: 600;"><a href="../services/logout.php">Logout</a></li>
                            <!-- <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
                            <!-- <li style="font-weight: 600;"><a href="sign_up.php">Signup</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <ul class="sidenav" id="mobile-ver">
            <li style="font-weight: 600;"><a href="user_home_view.php">Home</a></li>
            <li style="font-weight: 600;"><a href="user_profile.php">Profile</a></li>
            <li style="font-weight: 600;"><a href="user_rewards.php">Rewards</a></li>
            <li style="font-weight: 600;"><a href="user_points.php">My Points</a></li>
            <li style="font-weight: 600;"><a href="user_voucher.php">Voucher</a></li>
            <li style="font-weight: 600;"><a href="user_logs.php">History</a></li>
            <li style="font-weight: 600;"><a href="../services/logout.php">Logout</a></li>
            <!-- <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
        </ul>
    </header>

    <main>
        <section class="slider">
            <ul class="slides">
                <li>
                    <img class="responsive-img" src="../images/env2.jpg">
                    <div class="caption left-align">
                        <h1 class="bold">CENRO Malolos</h1>
                        <h5 class="bold">City Environment and Natural Resources Office.</h5>
                    </div>
                </li>
            </ul>
        </section>

        <main>
            <div class="container center">
                <h2 class="bold green-text text-lighten-1 hr-line">What's New               
                </h2>
            </div>
            <!-- <div class="container"> -->
            <div class="row">
                <!-- card section 1-->
                <div class="col s12 m4 l4 center align">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="../images/env1.jpg">
                            <span class="card-title green-text text-darken-1"> <strong>Achievements</strong></span>
                        </div>
                        <div class="card-content">
                            <h5 class="light grey-text text-darken-1">View our Achievements and Milestone.</h5>
                        </div>
                        <div class="card-action">
                            <a href="user_achievement.php">VIEW ACHIEVEMENTS</a>
                        </div>
                    </div>
                </div>

                <!-- card section 2-->
                <div class="col s12 m4 l4 center align">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="../images/env2.jpg">
                            <span class="card-title green-text text-darken-1"> <strong>IEC Campaign</strong></span>
                        </div>
                        <div class="card-content">
                            <h5 class="light grey-text text-darken-1">Read and Learn more about on how to care our Environment.</h5>
                        </div>
                        <div class="card-action">
                            <a href="user_view_campaign.php">INFORMATION, EDUCATION AND COMMUNICATION CAMPAIGN</a>
                        </div>
                    </div>
                </div>

                <!-- card section 3-->
                <div class="col s12 m4 l4 center align">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="../images/3r.jpg">
                            <span class="card-title green-text text-darken-1"> <strong>Events</strong></span>
                        </div>
                        <div class="card-content">
                            <h5 class="light grey-text text-darken-1">Joint and be more active in our upcoming events</h5>
                        </div>
                        <div class="card-action">
                            <a href="#">UPCOMING EVENTS</a>
                            <!-- <a class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>button</a> -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </main>
        <br>

        <div class="container grey-text text-darken-1">
            <div class="divider"></div><br>
            <div class="section">
                <div class="row" id="about">
                    <div class="col s12 m6 about-text">
                        <div class="icon-block">
                            <h3 class="center green-text text-lighten-2">Waste Segregation</h3>
                            <p class="about light flow-text">Waste segregation is included in law because it is much easier to recycle. Effective segregation of wastes means that less waste goes to landfill which makes it cheaper and better for people and the environment</p>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="icon-block">
                            <img class="responsive-img" src="../images/3r.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container grey-text text-darken-1">
            <div class="divider"></div><br><br>
            <div class="section">
                <div class="row" id="about">
                    <div class="col s12 m6">
                        <div class="icon-block">
                            <img class="responsive-img" src="../images/planting.jpg" alt="">
                        </div>
                    </div>
                    <div class="col s12 m6 about-text">
                        <div class="icon-block">
                            <h3 class="center green-text text-lighten-2">Tree Planting</h3>
                            <p class="about light flow-text">Trees contribute to their environment over long periods of time by providing oxygen, improving air quality, climate amelioration, conserving water, preserving soil, and supporting wildlife.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container grey-text text-darken-1">
            <div class="divider"></div>
            <div class="section">
                <div class="row" id="about">
                    <div class="col s12 m6 about-text">
                        <div class="icon-block">
                            <h3 class="center green-text text-lighten-2">Reduce Reuse Recycle</h3>
                            <p class="about light flow-text">We cannot stop waste production entirely, but everyone can make a significant contribution. Think before you bin! It saves energy and natural resources, helps to reduce pollution and reduces the need for landfill.</p>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="icon-block">
                            <img class="responsive-img" src="../images/recycle.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="divider"></div>
            <div class="section"></div>
        </div>

        <div class="row">
            <div class="container grey-text text-darken-1">
                <div class="header">
                    <h3 class="green-text text-lighten-2">Mission</h3>
                </div>
                <p style="text-indent: 50px;" class="light flow-text">Promote Environmental protection and a balanced ecology by restoring, nurturing the environment, in order to ensure public health and awareness to preserve our mother nature in the coming future.</p>
            </div>
        </div>

        <div class="parallax-container">
            <div class="parallax">
                <img src="../images/env1.jpg" alt="" class="responsive-img">
            </div>
        </div>

        <div class="row">
            <div class="container grey-text text-darken-1">
                <div class="header">
                    <h3 class="green-text text-lighten-2">Vision</h3>
                </div>
                <p style="text-indent: 50px;" class="light flow-text">Malolos is a progressive highly urbanized city rich in natural resources, nurtured and supported by a citizenry with awareness of their right to a balanced Ecology, committed to nurture the environment which is our commitment to proper waste management protection. </p>
            </div>
        </div>

        <div class="parallax-container">
            <div class="parallax">
                <img src="../images/env2.jpg" alt="" class="responsive-img">
            </div>
        </div>
        <div id="about" class="section-scrollspy"></div>
        <div class="row">
            <div class="container grey-text text-darken-1">
                <div class="header">
                    <h3 class="green-text text-lighten-2">About</h3>
                </div>
                <p style="text-indent: 50px;" class="light flow-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Unde error aliquid reprehenderit quasi quibusdam
                    nulla natus dignssimus cum, dicta quos excepturi voluptatem tenetur ex expedita illum beatae
                    esse ipsum ipsa tempore ullam libero fuga. Tempora, repudiandae, deserunt commodi quae, inventore error
                    similique dicta nisi saepe quibusdam beatae doloremque odit animi eum necessitatibus eligendi?</p>
            </div>
        </div>

        <div class="parallax-container">
            <div class="parallax">
                <img src="../images/env3.jpg" alt="" class="responsive-img">
            </div>
        </div>

        <br><br>
    </main>

    <footer>
        <?php include('../components/footer.php'); ?>
    </footer>
</body>

</html>