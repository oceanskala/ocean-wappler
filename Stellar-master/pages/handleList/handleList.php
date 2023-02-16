<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/handleList/">
    <script src="../../../dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>SHARK</title>

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
    <dmx-serverconnect id="serverconnect1" url="../../../dmxConnect/api/listDB.php" dmx-param:section="1"></dmx-serverconnect>
    <div class="container-scroller" id="navbar">
        <!-- partial:../../partials/_navbar.html -->

        <!-- partial -->
        <?php include '../../partials/_navbar.html'; ?><div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?php include '../../partials/_sidebar.html'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Handle List</h3>
                        <nav aria-label="breadcrumb" class="style15">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">HandleList</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Handle</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="sorting" dmx-on:click="query1.set('sort','serialno');query1.set('dir',query1.data.dir == 'desc' ? 'asc' : 'desc')" dmx-class:sorting_asc="query1.data.sort=='serialno' && query1.data.dir == 'asc'" dmx-class:sorting_desc="query1.data.sort=='serialno' && query1.data.dir == 'desc'">Serialno</th>
                                                    <th class="sorting" dmx-on:click="query1.set('sort','ipns');query1.set('dir',query1.data.dir == 'desc' ? 'asc' : 'desc')" dmx-class:sorting_asc="query1.data.sort=='ipns' && query1.data.dir == 'asc'" dmx-class:sorting_desc="query1.data.sort=='ipns' && query1.data.dir == 'desc'">Ipns</th>
                                                    <th class="sorting" dmx-on:click="query1.set('sort','transferWallet');query1.set('dir',query1.data.dir == 'desc' ? 'asc' : 'desc')" dmx-class:sorting_asc="query1.data.sort=='transferWallet' && query1.data.dir == 'asc'" dmx-class:sorting_desc="query1.data.sort=='transferWallet' && query1.data.dir == 'desc'">Transfer wallet</th>
                                                    <th class="sorting" dmx-on:click="query1.set('sort','hasStock');query1.set('dir',query1.data.dir == 'desc' ? 'asc' : 'desc')" dmx-class:sorting_asc="query1.data.sort=='hasStock' && query1.data.dir == 'asc'" dmx-class:sorting_desc="query1.data.sort=='hasStock' && query1.data.dir == 'desc'">Status</th>
                                                    <th class="sorting" dmx-on:click="query1.set('sort','null');query1.set('dir',query1.data.dir == 'desc' ? 'asc' : 'desc')" dmx-class:sorting_asc="query1.data.sort=='null' && query1.data.dir == 'asc'" dmx-class:sorting_desc="query1.data.sort=='null' && query1.data.dir == 'desc'">Gallery</th>
                                                    <th class="sorting" dmx-on:click="query1.set('sort','null');query1.set('dir',query1.data.dir == 'desc' ? 'asc' : 'desc')" dmx-class:sorting_asc="query1.data.sort=='null' && query1.data.dir == 'asc'" dmx-class:sorting_desc="query1.data.sort=='null' && query1.data.dir == 'desc'">IPNS</th>
                                                    <th class="sorting" dmx-on:click="query1.set('sort','null');query1.set('dir',query1.data.dir == 'desc' ? 'asc' : 'desc')" dmx-class:sorting_asc="query1.data.sort=='null' && query1.data.dir == 'asc'" dmx-class:sorting_desc="query1.data.sort=='null' && query1.data.dir == 'desc'">Create</th>
                                                    <th class="sorting" dmx-on:click="query1.set('sort','null');query1.set('dir',query1.data.dir == 'desc' ? 'asc' : 'desc')" dmx-class:sorting_asc="query1.data.sort=='null' && query1.data.dir == 'asc'" dmx-class:sorting_desc="query1.data.sort=='null' && query1.data.dir == 'desc'">Transfer</th>
                                                </tr>
                                            </thead>
                                            <tbody is="dmx-repeat" dmx-generator="bs5table" dmx-bind:repeat="serverconnect1.data.query" id="tableRepeat1" dmx-state="query1" dmx-sort="sort" dmx-order="dir">
                                                <tr>
                                                    <td dmx-text="serialno"></td>
                                                    <td dmx-text="ipns"></td>
                                                    <td dmx-text="transferWallet"></td>
                                                    <td class="style5">
                                                        <i class="fas fa-check style89 style4" dmx-show="(hasStock == 1)"></i>
                                                        <i class="fas fa-times style88 style3" dmx-show="(hasStock == 0)"></i>
                                                    </td>
                                                    <td class="style11">
                                                        <button class="btn btn-xs btn-sm text-xxl-center btn-success" dmx-on:click="browser1.goto('http://localhost:8100/Stellar-master/pages/galley/gallery.php?serial_num='+serialno)">
                                                            VIEW</button>
                                                    </td>
                                                    <td class="style12">
                                                        <button class="btn btn-xs style91 btn-sm btn-success" dmx-on:click="browser1.goto('https://devocean.skalateknoloji.net/api/manuelIPNS.php?serial_num='+serialno)" dmx-bind:disabled="ipns">
                                                            IPNS</button>
                                                    </td>
                                                    <td class="style13">
                                                        <button class="btn btn-xs 91 style91 btn-sm btn-success" dmx-on:click="browser1.goto('http://localhost:8100/Stellar-master/pages/create/create.php?serial_num='+serialno)" dmx-bind:disabled="((hasNft == 'transferred') || (hasNft == 'has') || (hasStock == 0) || (nftRequest == 0))">
                                                            Create</button>
                                                    </td>
                                                    <td class="style14">
                                                        <button class="btn btn-xs style91 btn-sm btn-success" dmx-on:click="browser1.goto('http://localhost:8100/Stellar-master/pages/transfer/transfer.php?serial_num='+serialno)" dmx-bind:disabled="((hasNft == &quot;transferred&quot;) || (hasNft == 0) ||(hasStock == 0) || (nftRequest == 0) || (transferWallet == NULL) || (transactionHash == NULL))">
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
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>




    <script src="../../../bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>