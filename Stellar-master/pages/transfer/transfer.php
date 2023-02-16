<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/transfer/">
    <script src="../../../dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Untitled Document</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../css/style.css" />
    <script src="../../../dmxAppConnect/dmxBrowser/dmxBrowser.js" defer></script>
    <script src="../../../dmxAppConnect/dmxBootstrap5Modal/dmxBootstrap5Modal.js" defer></script>
</head>

<body is="dmx-app" id="transfer" class="style16">
    <dmx-api-action id="api2" method="post" url="https://devocean.skalateknoloji.net/api/gasCalculate.php" dmx-param:type="'transfer'" dmx-param:coin="'eth'"></dmx-api-action>
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
                        <h4 class="card-title">Details Card</h4>
                        <p class="paragAboweInp"><b>SERIAL NUMBER</b><input id="text1" name="text1" type="text" class="form-control " disabled="true" dmx-bind:value="query.serial_num"></p>
                        <p class="paragAboweInp"><b>TRANSFER FEE</b><input id="text2" name="text2" type="text" class="form-control " disabled="true" dmx-bind:value="api2.data+'$'"></p>
                        <p class="paragAboweInp"><b>TYPE</b><input id="text4" name="text4" type="text" class="form-control" disabled="true" dmx-bind:value="serverconnect1.data.query[0].section"></p>
                        <div class="d-md-flex row m-0 quick-action-btns justify-content-between border-0" role="group" aria-label="Quick action buttons">
                            <div class="col-sm-6 col-md-2 p-3 text-center btn-wrapper border-0" dmx-on:click="browser1.goto('../galley/guitarInfo/guitarInfo.php?serial_num='+query.serial_num)">
                                <button type="button" class="btn px-0">
                                    <i class="fas fa-info fa-fw"></i> <i class="icon-user mr-2"></i>Info</button>
                            </div>
                            <div class="col-sm-6 col-md-2 p-3 text-center btn-wrapper border-0" dmx-on:click="browser1.goto('../galley/image/image.php?serial_num'+query.serial_num)">
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
                        <!-- <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                            <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                <button type="button" class="btn btn-outline-primary btn-sm" dmx-on:click="browser1.goto('../galley/guitarInfo/guitarInfo.php?serial_num='+query.serial_num)">Guitar Infor</button>
                            </div>
                            <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                <button type="button" class="btn btn-outline-primary btn-sm" dmx-on:click="browser1.goto('../galley/image/image.php?serial_num'+query.serial_num)">Images</button>
                            </div>
                            <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                <button type="button" class="btn btn-outline-primary btn-sm" dmx-on:click="browser1.goto('../galley/video/video.php?serial_num='+query.serial_num)">Videos</button>
                            </div>
                            <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                <button type="button" class="btn btn-outline-primary btn-sm" dmx-on:click="browser1.goto('../galley/audio/audio.php?serial_num='+query.serial_num)">Audios</button>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col heightFull">

            <div class="row quick-action-toolbar row2 shadow">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <h4 class="card-title">NFT Card</h4>
                        <p class="paragAboweInp"><b>FROM (ACCOUNT)</b><input id="text6" name="text2" type="text" class="form-control " disabled="true" value="0x7A038D80Bc5efB71E21dBE2EA229449Fc7E9A4CC"></p>
                        <p class="paragAboweInp"><b>CLIENT (ACCOUNT)</b><input id="text7" name="text3" type="text" class="form-control" dmx-bind:value="serverconnect1.data.query[0].transferWallet"></p>
                        <p class="paragAboweInp"><b>TOKEN ID</b><input id="text8" name="text4" type="text" class="form-control" disabled="true" dmx-bind:value="serverconnect1.data.query[0].tokenId"></p>
                        <div class="d-md-flex row m-0 quick-action-btns justify-content-between border-0" role="group" aria-label="Quick action buttons">
                            <div class="col-sm-6 col-md-2 p-3 text-center btn-wrapper border-0 bg-success" dmx-on:click="modal1.show()">
                                <button type="button" class="btn px-0">
                                    <i class="fas fa-plus"></i>
                                    <i class="icon-book-open mr-2"></i>Transfer</button>
                            </div>
                        </div>
                        <!-- <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                            <div class="col-sm-6 col-md-3 p-3 btn-wrapper text-start">

                                <button type="button" class="btn btn-outline-success text-center btn-sm" dmx-on:click="modal1.show()">Transfer NFT</button>
                            </div>
                        </div> -->
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
                        <button type="button" class="btn btn-primary" dmx-on:click="api1.load({})">Transfer NFT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>