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
    <script src="../../../dmxAppConnect/dmxBootstrap5Navigation/dmxBootstrap5Navigation.js" defer></script>
    <script src="../../../dmxAppConnect/dmxBootstrap5Modal/dmxBootstrap5Modal.js" defer></script>
    <script src="../../../dmxAppConnect/dmxBrowser/dmxBrowser.js" defer></script>
</head>

<body is="dmx-app" id="examp">
    <dmx-serverconnect id="serverconnect1" url="../../../dmxConnect/api/serialnoDB.php" dmx-param:filter="query.serial_num" dmx-param:serialno="query.serial_num"></dmx-serverconnect>
    <dmx-api-action id="api1" method="post" url="http://devocean.skalateknoloji.net:3000/transferNFT/" data-type="json" dmx-header:authorization="'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InNrYWxhdGVrQGdtYWlsLmNvbSIsImRhdGUiOiIyMDIzLjAyLjA2IDE3OjEwOjMzIn0.519sIJFcTBzXCRxNwx85QIqNnUqe80I8vyBeK-p54Uw'" dmx-param:serial_num="query.serial_num" noload dmx-data:from="'0x7A038D80Bc5efB71E21dBE2EA229449Fc7E9A4CC'" dmx-data:to="text3.value" dmx-data:id="serverconnect1.data.query[0].tokenId" dmx-data:network="serverconnect1.data.query[0]._network" dmx-data:serialno="query.serial_num"></dmx-api-action>


    <div is="dmx-browser" id="browser1"></div>






    <?php include '../../partials/_navbar.html'; ?>
    <div class="row row1 row-cols-7">
        <div class="col colSideBar">
            <?php require '../../partials/_sidebar.html'; ?>
        </div>



        <div class="col heightFull">



            <div class="row quick-action-toolbar row2 shadow">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-header d-block d-md-flex card-header2">
                            <h5 class="mb-0">Details</h5>
                        </div>
                        <p class="paragAboweInp"><b><i>SERIAL NUMBER</i></b><input id="text1" name="text1" type="text" class="form-control " disabled="true" dmx-bind:value="query.serial_num"></p>
                        <p class="paragAboweInp"><b><i>TRANSFER FEE</i></b><input id="text2" name="text2" type="text" class="form-control " disabled="true" dmx-text="serverconnect1.data.query[0].transferFee"></p>

                        <p class="paragAboweInp"><b><i>TYPE</i></b><input id="text4" name="text4" type="text" class="form-control " disabled="true" dmx-bind:value="serverconnect1.data.query[0].section"></p>
                        <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                            <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
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
        <div class="col heightFull">

            <div class="row quick-action-toolbar row2 shadow">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-header d-block d-md-flex card-header2">
                            <h5 class="mb-0">NFT</h5>
                        </div>
                        <p class="paragAboweInp"><b><i>FROM (ACCOUNT)</i></b><input id="text6" name="text2" type="text" class="form-control " disabled="true" value="0x7A038D80Bc5efB71E21dBE2EA229449Fc7E9A4CC"></p>
                        <p class="paragAboweInp"><b><i>CLIENT (ACCOUNT)</i></b><input id="text7" name="text3" type="text" class="form-control" dmx-bind:value="serverconnect1.data.query[0].transferWallet"></p>
                        <p class="paragAboweInp"><b><i>TOKEN ID</i></b><input id="text8" name="text4" type="text" class="form-control" disabled="true" dmx-bind:value="serverconnect1.data.query[0].tokenId"></p>
                        <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                            <div class="col-sm-6 col-md-3 p-3 btn-wrapper text-start">

                                <button type="button" class="btn btn-outline-success text-center btn-sm" dmx-on:click="modal1.show()">Transfer NFT</button>
                            </div>
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