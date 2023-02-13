<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/galley/">
    <script src="../../../dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Untitled Document</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../css/style.css" />
    <script src="../../../dmxAppConnect/dmxBrowser/dmxBrowser.js" defer></script>
    <script src="../../../dmxAppConnect/dmxBootstrap5Popovers/dmxBootstrap5Popovers.js" defer></script>
</head>

<body is="dmx-app" id="gallery" class="style16">

    <div is="dmx-browser" id="browser1"></div>






    <?php include '../../partials/_navbar.html'; ?>
    <div class="row row1">


        <?php require '../../partials/_sidebar.html'; ?>
        <div class="col">


            <h1>Guitar Model</h1>
            <p><b><i>SERIAL NUMBER</i></b></p><input id="text1" name="text1" type="text" class="form-control style15" dmx-bind:value="query.serial_num" disabled="true">
            <div class="row quick-action-toolbar row2">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-header d-block d-md-flex">
                            <h5 class="mb-0">Details</h5>
                        </div>
                        <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                            <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                <button type="button" class="btn btn-outline-primary" dmx-on:click="browser1.goto('http://localhost:8100/Stellar-master/pages/galley/guitarInfo/guitarInfo.php?serial_num='+query.serial_num)">Guitar Information</button>
                            </div>
                            <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                <button type="button" class="btn btn-outline-primary" dmx-on:click="browser1.goto('http://localhost:8100/Stellar-master/pages/galley/image/image.php?serial_num'+query.serial_num)">Images</button>
                            </div>
                            <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                <button type="button" class="btn btn-outline-primary" dmx-on:click="browser1.goto('http://localhost:8100/Stellar-master/pages/galley/video/video.php?serial_num='+query.serial_num)">Videos</button>
                            </div>
                            <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                <button type="button" class="btn btn-outline-primary" dmx-on:click="browser1.goto('http://localhost:8100/Stellar-master/pages/galley/audio/audio.php?serial_num='+query.serial_num)">Audios</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../../../bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>