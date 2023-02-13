<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/galley/video/">
    <script src="../../../../dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Untitled Document</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../../bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../../css/style.css" />
    <script src="../../../../dmxAppConnect/dmxBrowser/dmxBrowser.js" defer></script>
    <script src="../../../../dmxAppConnect/dmxVideo/dmxVideo.js" defer></script>
</head>

<body is="dmx-app" id="video" class="style16">
    <dmx-serverconnect id="serverconnect1" url="../../../../dmxConnect/api/filterDB.php" dmx-param:filter="query.serial_num"></dmx-serverconnect>
    <div is="dmx-browser" id="browser1"></div>

    <?php include '../../../partials/_navbar.html'; ?><div class="row row1">


        <?php require '../../../partials/_sidebar.html'; ?>
        <div class="col">


            <h1>Guitar Model</h1>
            <p><b><i>SERIAL NUMBER</i></b></p><input id="text1" name="text1" type="text" class="form-control style15" dmx-bind:value="query.serial_num" disabled="true">
            <div class="row quick-action-toolbar row2">
                <div class="col">

                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">



                            <div class="card social-card card-colored twitter-card">
                                <div class="card-body d-flex flex-wrap align-items-center justify-content-center">
                                    <!-- 'https://devocean.skalateknoloji.net/media/'+query.serial_num+'/video/'+serverconnect1.data.query[0].video -->

                                    <video is="dmx-video" id="video1" dmx-bind:src="'https://devocean.skalateknoloji.net/'+serverconnect1.data.query[0].video" controls="true" class="style21"></video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../bootstrap/5/js/bootstrap.bundle.min.js"></script>

    <script src="../../../../bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>