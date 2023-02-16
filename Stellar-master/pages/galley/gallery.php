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


            <div class="row quick-action-toolbar row2 justify-content-xxl-center">
                <div class="col-md-9 grid-margin shadow">
                    <div class="card">
                        <div class="card-header3 d-block d-md-flex">
                            <h5 class="mb-0">Gallary Card</h5>
                        </div>
                        <br>
                        <p class="fw-bold style29">SERIAL NUMBER<input id="text1" name="text1" type="text" class="form-control" dmx-bind:value="query.serial_num" disabled="true"></p>
                        <div class="d-md-flex row m-0 quick-action-btns justify-content-between border-0" role="group" aria-label="Quick action buttons">
                            <div class="col-sm-6 col-md-2 p-3 text-center btn-wrapper border-0" dmx-on:click="browser1.goto('../galley/guitarInfo/guitarInfo.php?serial_num='+query.serial_num)">
                                <button type="button" class="btn px-0">
                                    <i class="fas fa-info fa-fw"></i> <i class="icon-user mr-2"></i>Guitar Info</button>
                            </div>
                            <div class="col-sm-6 col-md-2 p-3 text-center btn-wrapper border-0" dmx-on:click="browser1.goto('../galley/image/image.php?serial_num='+query.serial_num)">
                                <button type="button" class="btn px-0">
                                    <i class="far fa-file-image fa-fw"></i>
                                    <i class="icon-docs mr-2"></i>Image</button>
                            </div>
                            <div class="col-sm-6 col-md-2 p-3 text-center btn-wrapper border-0" dmx-on:click="browser1.goto('../galley/video/video.php?serial_num='+query.serial_num)">
                                <button type="button" class="btn px-0"><i class="fas fa-play fa-sharp fa-regular"></i>

                                    <i class="icon-folder mr-2"></i>Video</button>
                            </div>
                            <div class="col-sm-6 col-md-2 p-3 text-center btn-wrapper border-0" dmx-on:click="browser1.goto('../galley/audio/audio.php?serial_num='+query.serial_num)">
                                <button type="button" class="btn px-0">
                                    <i class="fas fa-headphones-alt"></i>
                                    <i class="icon-book-open mr-2"></i>Audio</button>
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