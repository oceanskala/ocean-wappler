<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/handleList/">
    <script src="../../../dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Untitled Document</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../css/style.css" />
    <script src="../../../dmxAppConnect/dmxStateManagement/dmxStateManagement.js" defer></script>
    <link rel="stylesheet" href="../../../dmxAppConnect/dmxBootstrap5TableGenerator/dmxBootstrap5TableGenerator.css" />
    <script src="../../../dmxAppConnect/dmxBootstrap5Navigation/dmxBootstrap5Navigation.js" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <script src="../../../dmxAppConnect/dmxBrowser/dmxBrowser.js" defer></script>
</head>

<body is="dmx-app" id="handleList">


    <div is="dmx-browser" id="browser1"></div>
    <dmx-query-manager id="query1"></dmx-query-manager>
    <dmx-serverconnect id="serverconnect1" url="../../../dmxConnect/api/listDB.php" dmx-param:section="0"></dmx-serverconnect>
    <header><?php include '../../partials/_navbar.html'; ?></header>
    <div class="row justify-content-xxl-start">
        <div class="col-md-2 col-xxl-2">
            <?php include '../../partials/_sidebar.html'; ?>
        </div>
        <div class="col-md shadow nftTable col-md-10">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table class="table table-striped table-bordered table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>serialno</th>
                                    <th>Ipns</th>
                                    <th>Transfer wallet</th>
                                    <th>Status</th>
                                    <th>Gallary</th>
                                    <th>IPNS</th>
                                    <th>Create</th>
                                    <th>Transfer</th>
                                </tr>
                            </thead>
                            <tbody is="dmx-repeat" dmx-generator="bs5table" dmx-bind:repeat="serverconnect1.data.query" id="tableRepeat1">
                                <tr>
                                    <td dmx-text="serialno"></td>
                                    <td dmx-text="ipns">{{ipns}}</td>
                                    <td dmx-text="transferWallet">{{transferWallet}}</td>
                                    <td>
                                        <i class="fas fa-check style89 style1" dmx-show="(hasStock == 1)"></i>
                                        <i class="fas fa-times style88 style2" dmx-show="(hasStock == 0)"></i>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-xs btn-sm text-xxl-center" dmx-on:click="browser1.goto('../galley/gallery.php?serial_num='+serialno)">
                                            VIEW</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-xs style91 btn-sm" dmx-on:click="browser1.goto('https://devocean.skalateknoloji.net/api/manuelIPNS.php?serial_num='+serialno)" dmx-bind:disabled="!ipns">
                                            IPNS</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-xs 91 style91 btn-sm" dmx-on:click="browser1.goto('../create/create.php?serial_num='+serialno)" dmx-bind:disabled="((hasNft == 'transferred') || (hasNft == 'has') || (hasStock == 1) || (nftRequest == 0))">
                                            Create</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-xs style91 btn-sm" dmx-on:click="browser1.goto('../transfer/transfer.php?serial_num='+serialno)" dmx-bind:disabled="((hasNft == &quot;transferred&quot;) || (hasNft == 0) ||(hasStock == 0) || (nftRequest == 0) || (transferWallet == &quot;&quot;))">
                                            Transfer</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="../../../bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>