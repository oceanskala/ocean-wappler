<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/nftList/">
    <script src="../../../dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Untitled Document</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../css/style.css" />
    <script src="../../../dmxAppConnect/dmxStateManagement/dmxStateManagement.js" defer></script>
    <link rel="stylesheet" href="../../../dmxAppConnect/dmxBootstrap5TableGenerator/dmxBootstrap5TableGenerator.css" />
    <script src="../../../dmxAppConnect/dmxBootstrap5Navigation/dmxBootstrap5Navigation.js" defer></script>
    <script src="../../../dmxAppConnect/dmxBrowser/dmxBrowser.js" defer></script>
    <script src="../../../dmxAppConnect/dmxFormatter/dmxFormatter.js" defer></script>
</head>

<body is="dmx-app" id="bodyList">
    <dmx-value id="var1" dmx-bind:value="serverconnect2.data.activeNetwork[0].networkk"></dmx-value>



    <div is="dmx-browser" id="browser1"></div>
    <dmx-query-manager id="query1"></dmx-query-manager>

    <dmx-serverconnect id="serverconnect1" url="../../../dmxConnect/api/nftList.php" dmx-param:section="0"></dmx-serverconnect>
    <dmx-serverconnect id="serverconnect2" url="../../../dmxConnect/api/dashboard.php" dmx-param:section="0"></dmx-serverconnect>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->

        <!-- partial -->
        <?php include '../../partials/_navbar.php'; ?><div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?php include '../../partials/_sidebar.html'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Body List</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">BodyList</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Body</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">

                        <div class="col-xl-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Serialno</th>
                                                    <th>Ipns</th>
                                                    <th>Transaction hash</th>
                                                    <th>Transfer wallet</th>
                                                    <th>Token</th>
                                                    <th>Network</th>
                                                    <th>Media</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody is="dmx-repeat" dmx-generator="bs5table" dmx-bind:repeat="serverconnect1.data.nftListPage.where(`_network`, var1.value, '==')" id="tableRepeat1">
                                                <tr>
                                                    <td dmx-text="serialno"></td>
                                                    <td dmx-text="ipns"></td>
                                                    <td dmx-text="transactionHash"></td>
                                                    <td dmx-text="transferWallet"></td>
                                                    <td dmx-text="tokenId"></td>
                                                    <td dmx-text="_network"></td>
                                                    <td>{{btn1.value}}<button id="btn1" class="btn text-light bg-danger btn-sm" dmx-on:click="browser1.goto('../galley/gallery.php?serial_num='+serialno)">View</button></td>
                                                    <td>{{btn1.value}}<button id="btn2" class="btn text-light bg-danger btn-sm" dmx-on:click="browser1.goto('../galley/gallery.php?serial_num='+serialno)">Transfer NFT</button></td>
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