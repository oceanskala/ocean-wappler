<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/ex/">
    <script src="../../../dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Untitled Document</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../css/style.css" />
</head>

<body is="dmx-app" id="example3">

    <div class="row">
        <div class="col-sm-2" id="sideBarInclude">
            <?php include '../../partials/_sidebar.html'; ?>
        </div>
        <div class="col col-xxl" id="BodyColumn">
            <div class="row" id="bodyRow">
                <div class="col col-xxl-12 shadow">
                    <div class="row quick-action-toolbar row2">
                        <div class="col-md-12 grid-margin">


                            <div class="card">
                                <div class="card-header d-block d-md-flex card-header2">
                                    <h5 class="mb-0">NFT</h5>
                                </div>

                                <div class="row quick-action-toolbar row2 justify-content-xxl-center">
                                    <p class="paragAboweInp"><b><i class="style43">SERİAL NO</i></b></p>
                                    <input id="text4" name="text2" type="text" class="form-control style26" disabled="true" value="0x7A038D80Bc5efB71E21dBE2EA229449Fc7E9A4CC">
                                </div>
                                <div class="row quick-action-toolbar row2 justify-content-xxl-center">
                                    <p class="paragAboweInp"><b><i class="style42">TRANSFER FEE</i></b></p>
                                    <input id="text5" name="text3" type="text" class="form-control style26" dmx-bind:value="serverconnect1.data.query[0].transferWallet">
                                </div>
                                <div class="row quick-action-toolbar row2 justify-content-xxl-center">
                                    <p class="paragAboweInp"><b><i class="style41">TYPE</i></b></p>
                                    <input id="text6" name="text4" type="text" class="form-control style26" disabled="true" dmx-bind:value="serverconnect1.data.query[0].tokenId">
                                </div>
                                <div class="d-md-flex row m-0 quick-action-btns justify-content-xxl-center" role="group" aria-label="Quick action buttons" id="buttonsRow">
                                    <div class="col-sm-6 col-md-2 p-3 text-center btn-wrapper">
                                        <button type="button" class="btn btn-outline-primary btn-sm" dmx-on:click="browser1.goto('http://localhost:8100/Stellar-master/pages/guitarInfo/guitarInfo.php?serial_num='+query.serial_num)">Guitar Infor</button>
                                    </div>
                                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                        <button type="button" class="btn btn-outline-primary btn-sm" dmx-on:click="browser1.goto('http://localhost:8100/Stellar-master/pages/image/image.php?serial_num'+query.serial_num)">Images</button>
                                    </div>
                                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                        <button type="button" class="btn btn-outline-primary btn-sm" dmx-on:click="browser1.goto('http://localhost:8100/Stellar-master/pages/video/video.php?serial_num='+query.serial_num)">Videos</button>
                                    </div>
                                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                        <button type="button" class="btn btn-outline-primary btn-sm" dmx-on:click="browser1.goto('http://localhost:8100/Stellar-master/pages/audio/audio.php?serial_num='+query.serial_num)">Audios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-xxl-12 shadow">
                    <div class="row quick-action-toolbar row2">
                        <div class="col-md-12 grid-margin">


                            <div class="card">
                                <div class="card-header d-block d-md-flex card-header2">
                                    <h5 class="mb-0">NFT</h5>
                                </div>

                                <div class="row quick-action-toolbar row2 justify-content-xxl-center">
                                    <p class="paragAboweInp"><b><i class="style43">FROM (ACCOUNT)</i></b></p>
                                    <input id="text3" name="text2" type="text" class="form-control style26" disabled="true" value="0x7A038D80Bc5efB71E21dBE2EA229449Fc7E9A4CC">
                                </div>
                                <div class="row quick-action-toolbar row2 justify-content-xxl-center">
                                    <p class="paragAboweInp"><b><i class="style42">CLIENT (ACCOUNT)</i></b></p>
                                    <input id="text1" name="text3" type="text" class="form-control style26" dmx-bind:value="serverconnect1.data.query[0].transferWallet">
                                </div>
                                <div class="row quick-action-toolbar row2 justify-content-xxl-center">
                                    <p class="paragAboweInp"><b><i class="style41">TOKEN ID</i></b></p>
                                    <input id="text2" name="text4" type="text" class="form-control style26" disabled="true" dmx-bind:value="serverconnect1.data.query[0].tokenId">
                                </div>
                                <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                                    <div class="col-sm-6 col-md-3 p-3 btn-wrapper text-start style40">

                                        <button type="button" class="btn btn-outline-success text-center btn-sm" dmx-on:click="modal1.show()">Transfer NFT</button>
                                    </div>
                                </div>
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