<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/create/">
    <script src="../../../dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Untitled Document</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../css/style.css" />
    <script src="../../../dmxAppConnect/dmxBrowser/dmxBrowser.js" defer></script>
    <script src="../../../dmxAppConnect/dmxBootstrap5Popovers/dmxBootstrap5Popovers.js" defer></script>
    <script src="../../../dmxAppConnect/dmxBootstrap5Modal/dmxBootstrap5Modal.js" defer></script>
</head>

<body is="dmx-app" id="create" class="style16">
    <dmx-serverconnect id="serverconnect1" url="../../../dmxConnect/api/serialnoDB.php" dmx-param:filter="query.serial_num" dmx-param:serialno="query.serial_num"></dmx-serverconnect>
    <dmx-api-action id="api1" method="post" url="http://devocean.skalateknoloji.net:3000/createNFT/" data-type="json" dmx-data:serialno="query.serial_num" dmx-data:ipns="serverconnect1.data.query[0].ipns" dmx-data:targetwallet="'0x7A038D80Bc5efB71E21dBE2EA229449Fc7E9A4CC'" dmx-data:network="serverconnect1.data.query[0]._network" dmx-header:authorization="'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InNrYWxhdGVrQGdtYWlsLmNvbSIsImRhdGUiOiIyMDIzLjAyLjA2IDE3OjEwOjMzIn0.519sIJFcTBzXCRxNwx85QIqNnUqe80I8vyBeK-p54Uw'" noload></dmx-api-action>


    <div is="dmx-browser" id="browser1"></div>






    <?php include '../../partials/_navbar.html'; ?>
    <div class="row row1">


        <?php require '../../partials/_sidebar.html'; ?>
        <div class="col">




            <div class="row quick-action-toolbar justify-content-xxl-center">
                <div class="col-md-9 grid-margin shadow">
                    <div class="card">
                        <div class="card-header d-block d-md-flex card-header2">
                            <h5 class="mb-0">Details</h5>
                        </div>
                        <div class="d-md-flex row m-0 quick-action-btns justify-content-xxl-around" role="group" aria-label="Quick action buttons">
                            <p class="fw-bold style29">SERIAL NUMBER<input id="text1" name="text1" type="text" class="form-control" dmx-bind:value="query.serial_num" disabled="true"></p>
                            <!-- <div class="col-md-12 grid-margin">
                                <div class="card">

                                    <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                                        <div class="col-sm-6 col-md-3 p-3 btn-wrapper text-center">
                                            <button type="button" class="btn btn-outline-primary" dmx-on:click="modal1.show()">Crate NFT</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-sm-6 col-md-1 p-3 text-center btn-wrapper border-0">
                                <button type="button" class="btn btn-outline-primary" dmx-on:click="browser1.goto('../galley/guitarInfo/guitarInfo.php?serial_num='+query.serial_num)">Guitar Info</button>
                            </div>
                            <div class="col-sm-6 col-md-1 p-3 text-center btn-wrapper border-0">
                                <button type="button" class="btn btn-outline-primary" dmx-on:click="browser1.goto('../galley/image/mage.php?serial_num='+query.serial_num)">Images</button>
                            </div>
                            <div class="col-sm-6 col-md-1 p-3 text-center btn-wrapper border-0">
                                <button type="button" class="btn btn-outline-primary" dmx-on:click="browser1.goto('../galley/video/video.php?serial_num='+query.serial_num)">Videos</button>
                            </div>
                            <div class="col-sm-6 col-md-1 p-3 text-center btn-wrapper border-0">
                                <button type="button" class="btn btn-outline-primary" dmx-on:click="browser1.goto('http://localhost:8100/Stellar-master/pages/audio/audio.php?serial_num='+query.serial_num)">Audios</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row quick-action-toolbar row2 justify-content-xxl-center">
                <div class="col-md-9 grid-margin shadow">
                    <div class="card">
                        <div class="card-header d-block d-md-flex card-header2">
                            <h5 class="mb-0">NFT</h5>
                        </div>
                        <div class="d-md-flex row m-0 quick-action-btns justify-content-xxl-around" role="group" aria-label="Quick action buttons">

                            <div class="col-sm-6 col-md-1 p-3 btn-wrapper text-center border-0">
                                <button type="button" class="btn btn-outline-primary" dmx-on:click="modal1.show()">Crate NFT</button>
                            </div>

                            <!-- <div class="col-md-12 grid-margin">
                                                        <div class="card">
                        
                                                            <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                                                                <div class="col-sm-6 col-md-3 p-3 btn-wrapper text-center">
                                                                    <button type="button" class="btn btn-outline-primary" dmx-on:click="modal1.show()">Crate NFT</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modal1" is="dmx-bs5-modal" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Conform</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are You Sure ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" dmx-on:click="api1.load({})">Mint NFT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../../../bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>