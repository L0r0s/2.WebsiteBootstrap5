<?php
// Start the session: must be the first command
session_start();
// Umleitung zum Login-Formular, wenn der User nicht angemeldet ist
if (!isset($_SESSION['username'])) {
    $_SESSION['err']="Login required";
    header("Location: LoginSeitehtml.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fußballspieler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #6e6e6e, #cacaca);
            color: white;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .section {
            padding: 60px 0;
        }
        .row {
            padding-left: 0px;
            padding-right: 0px;
            display: flex;
            flex-wrap: wrap;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .card-img-fixed {
            width: 100%;
            height: 300px; /* Adjust the height as needed */
            object-fit: cover;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
        }
        .card-img-top-top {
            object-position: top;
        }
        .map-container {
            position: relative;
        }
        .map-button {
            position: absolute;
            width: 50px;
            height: 50px;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }
        .button1 { top: 190px; left: 420px; }
        .button2 { top: 480px; left: 430px; }
        .button3 { top: 493px; left: 683px; }
        .button4 { top: 170px; left: 375px; }
        .button5 { top: 315px; left: 475px; }
        .button6 { top: 273px; left: 605px; }
        .button7 { top: 310px; left: 695px; }
        .button8 { top: 385px; left: 595px; }
        .card {
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #FFFFFF;
            margin-bottom: 20px;
        }

        .cardnew {
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #FFFFFF;
            margin-bottom: 20px;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            background-color: #FFFFFF;
            color: black;
        }


        .cardnew:hover {
            transform: scale(1.05);
            box-shadow: 5px 10px 10px rgba(0, 0, 0, 0.2);
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 5px 10px 10px rgba(0, 0, 0, 0.2);
        }
        @media (max-width: 768px) {
            .map-button {
                width: 30px;
                height: 30px;
            }
            .button1 { top: 50px; left: 50px; }
            .button2 { top: 75px; left: 75px; }
            .button3 { top: 100px; left: 100px; }
            .button4 { top: 125px; left: 125px; }
            .button5 { top: 150px; left: 150px; }
            .button6 { top: 175px; left: 175px; }
            .button7 { top: 200px; left: 200px; }
            .button8 { top: 225px; left: 225px; }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; z-index: 1000; width: 100%;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fußballspieler</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#players">Players</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#clubs">Clubs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#retired-players">Retired Players</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Map">Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Newsletter">Newsletter</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="players" class="section">
        <div class="container">
            <h2 style="padding-top: 50px">Players</h2>
            <p>Overview of current best players.</p>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">   
            <div class="col-md-3 mb-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top card-img-fixed" src="https://c.tenor.com/kOmiEBwO3GsAAAAd/tenor.gif" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top card-img-fixed" src="img/Messii.png" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top card-img-fixed card-img-top-top" src="img/yamal.jpg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top card-img-fixed" src="img/ronaldo.jpg" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="clubs" class="section">
        <div class="container">
            <h2>Clubs</h2>
            <p>Overview of football clubs.</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">   
            <div class="col-md-3 mb-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top card-img-fixed" src="img/FC_Barcelona.png" alt="Card image" style="background: linear-gradient(to right, red, blue);">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="Clubs/FC_Barcelona.html" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top card-img-fixed" src="img/FC_Bayern.png" alt="Card image" style="background: linear-gradient(to right, #0066b2, rgb(255, 255, 255));">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top card-img-fixed card-img-top-top" src="img/FC_Liverpooll.png" alt="Card image" style="background: linear-gradient(to right, #00a398, #d00027);">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top card-img-fixed" src="img/SSC_Neapel.svg.png" alt="Card image" style="background: linear-gradient(to right, #00d0ff, #108bbb);">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="Clubs/Napoli.html" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="retired-players" class="section">
        <div class="container">
            <h2>Retired Players</h2>
            <p>Overview of retired players.</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">   
            <div class="col-md-3 mb-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top card-img-fixed" src="img/SK_Rapid_Wien_Logo.png" alt="Card image" style="background: linear-gradient(to right, #007147,#ffffff );">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top card-img-fixed" src="img/ManchesterUnited.png" alt="Card image" style="background: linear-gradient(to right, red, rgb(255, 225, 0));">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top card-img-fixed card-img-top-top" src="img/Juventus_FC_-_pictogram_black_(Italy,_2017).svg.png" alt="Card image" width="auto" height="300" style="background: linear-gradient(to right, #323232, #ffffff);">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a> 
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top card-img-fixed" src="img/Paris_Saint-Germain_F.C..svg.png" alt="Card image" style="background: linear-gradient(to right, #005da9, #aadcffa0);">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Map" class="section">
        <div class="container map-container">
            <h2>Map of Europe</h2>
            <p>Click the Logos to see the detailed view of the Club</p>
            <img src="img/Europakarte3.png" alt="Card image" style="opacity: 1; display: block; margin: 0 auto;" height="576">
            <a href="Clubs.html" class="map-button button1"></a>
            <a href="Clubs/FC_Barcelona.html" class="map-button button2"></a>
            <a href="Clubs/Napoli.html" class="map-button button3"></a>
            <a href="Clubs.html" class="map-button button4"></a>
            <a href="Clubs.html" class="map-button button5"></a>
            <a href="Clubs.html" class="map-button button6"></a>
            <a href="Clubs.html" class="map-button button7"></a>
            <a href="Clubs.html" class="map-button button8"></a>
        </div>
    </div>

    <div id="Newsletter" class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="cardnew" style="padding: 20px; margin-top: 20px;">
                    <h4 class="card-title">Sign Up for Our Newsletter</h4>
                    <form action="FußballspielerNewsletterInsert.php" method="post">
                        <div class="mb-3">
                            <label for="emailID" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="emailID" name="email" required>
                            <div id="statusMessage" style="margin-top: 10px;"></div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');
            const statusMessage = document.getElementById('statusMessage');
    
            if (status === 'success') {
                statusMessage.innerHTML = '<p style="color: green;">Subscription successful!</p>';
                
            } else if (status === 'failure') {
                statusMessage.innerHTML = '<p style="color: red;">Subscription failed. Please try again.</p>';
            }
        });
    </script>


</body>
</html>