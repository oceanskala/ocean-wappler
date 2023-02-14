<?php
    require "../test/db.php";
    $netwrk = $db->prepare('SELECT * FROM smartContracts WHERE activated=?');
    $netwrk->execute([1]);
    $netwrkcek = $netwrk->fetch(PDO::FETCH_ASSOC);

    $guitarsor = $db->prepare('SELECT * FROM pdf');
    $guitarsor->execute();
    $guitarcek = $guitarsor->fetchAll(PDO::FETCH_ASSOC);


    $current_network = $netwrkcek["networkk"];
    $symbl = $netwrkcek["symbol"];
    $symblArr = ["BNB", "ETH", "MATIC", "AVAX", "TRX", "SOL"];


    $nftcek = array();
    
    for($n = 0;$n< count($guitarcek); $n++) {
        if ($current_network == "All Networks") {
            if ($guitarcek[$n]["hasNft"] != 0) {
            array_push($nftcek, $guitarcek[$n]);
            }
        } elseif (($guitarcek[$n]["hasNft"] =! 0) && ($guitarcek[$n]["_network"] == $current_network)) {
            array_push($nftcek, $guitarcek[$n]);
        }
    }
        $Arrguitar = [];
        $nftArr = [];

        $totalExpense = 0;
        $totalExpenseArr = array();
        $totalExpenseUSD = 0;

        $i = 0;
        $p = 0;
        $k = 0;
        $s = 0;
        $year = date("Y");
        $daysmonth = [];
        $date_time_end;
        $date_time_start;
        $datetime;
        $url;

        if ($nftcek) {
        foreach ($nftcek as $nf) {
            $datetime = $nftcek[$s]["NFTtimedate"];
            $totalExpense += $nftcek[$i]["fee"];
            $i++;
        }
        } else {
        foreach ($guitarcek as $nf) {
            $datetime = $nftcek[$s]["NFTtimedate"];
            $totalExpense += $nftcek[$i]["fee"];
            $i++;
        }
        }

        if ($current_network == "Polygon" || $current_network == "Polygon(Mumbai)") {

        $USDprice = json_decode(convertToUSD("MATIC", "USd"))->USD;

        $totalExpenseUSD = $totalExpense * $USDprice;

        }   
        function convertToUSD($coin, $fiatMoney){

        $url = "https://min-api.cryptocompare.com/data/price?fsym=$coin&tsyms=$fiatMoney";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return ($resp);

        }
?>
<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/dashboard/">
    <script src="../../../dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Shark</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../../bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../css/style.css" />
    <script src="../../../dmxAppConnect/dmxStateManagement/dmxStateManagement.js" defer></script>
    <link rel="stylesheet" href="../../../dmxAppConnect/dmxBootstrap5TableGenerator/dmxBootstrap5TableGenerator.css" />
    <script src="../../../dmxAppConnect/dmxBootstrap5Navigation/dmxBootstrap5Navigation.js" defer></script>
    <script src="../../../dmxAppConnect/dmxBrowser/dmxBrowser.js" defer></script>
    <script src="../../../dmxAppConnect/dmxCharts/Chart.min.js" defer></script>
    <script src="../../../dmxAppConnect/dmxCharts/dmxCharts.js" defer></script>
    <script src="../../../dmxAppConnect/dmxFormatter/dmxFormatter.js" defer></script>
    <base href="/Stellar-master/">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stellar Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body is="dmx-app" id="bodyList">
    <div is="dmx-browser" id="browser1"></div>
    <dmx-query-manager id="query1"></dmx-query-manager>
    <dmx-serverconnect id="serverconnect1" url="../../../dmxConnect/api/listDB.php" dmx-param:section="0"></dmx-serverconnect>

    <dmx-serverconnect id="dashboardcards" url="../../../dmxConnect/api/dashboard.php" dmx-param:section="0"></dmx-serverconnect>
    <dmx-serverconnect id="charts" url="../../../dmxConnect/api/charts.php" dmx-param:section="0"></dmx-serverconnect>
    <div class="container-scroller">
        <?php include '../../partials/_navbar.html'; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include '../../partials/_sidebar.html'; ?>


            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Dashboard</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" style="margin-left: auto;">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Body</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-sm-flex align-items-baseline report-summary-header">
                                                <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row report-inner-cards-wrapper">
                                        <div class=" col-md -6 col-xl report-inner-card">
                                            <div class="inner-card-text">
                                                <span class="report-title">Guitar Count</span>
                                                <h4>{{dashboardcards.data.elementCount[0].elements}}</h4>
                                                <span class="report-count"> 2 Reports</span>
                                            </div>
                                            <div class="inner-card-icon bg-success">
                                                <i class="fas fa-guitar"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl report-inner-card">
                                            <div class="inner-card-text">
                                                <span class="report-title">NFT Count</span>
                                                <h4>{{dashboardcards.data.nftCount[0].nftCount}}</h4>
                                                <span class="report-count"> 3 Reports</span>
                                            </div>
                                            <div class="inner-card-icon bg-danger">
                                                <i class="fas fa-icons"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl report-inner-card">
                                            <div class="inner-card-text">
                                                <span class="report-title">Total dolar expense</span>
                                                <h4>$<?php echo $totalExpenseUSD;?></h4>
                                                <span class="report-count"> 5 Reports</span>
                                            </div>
                                            <div class="inner-card-icon bg-warning">
                                                <i class="fas fa-dollar-sign"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl report-inner-card">
                                            <div class="inner-card-text">
                                                <span class="report-title">Total Coin expense</span>
                                                <h4><?php echo $totalExpense;?> (<?php echo $symbl;?>)</h4>
                                                <span class="report-count"> 9 Reports</span>
                                            </div>
                                            <div class="inner-card-icon bg-primary">
                                                <i class="fab fa-bitcoin"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="grid-margin stretch-card col-xl-7">
                            <div class="card">
                                <div class="card-body">
                                    <dmx-chart id="chart1" width="300" height="300" point-size="" dmx-bind:data="charts.data.doughnat" labels="nft" dataset-1:value="guitar" cutout="" responsive="true" nogrid="true"></dmx-chart>
                                </div>

                            </div>


                        </div>
                        <div class="grid-margin stretch-card col-xl-5">
                            <div class="card">
                                <div class="card-body">
                                    <dmx-chart id="chart2" width="300" height="300" point-size="" type="doughnut" dmx-bind:data="charts.data.doughnat" labels="nft" dataset-1:value="guitar" class="style27" responsive="true"></dmx-chart>

                                </div>

                                <div class="table-responsive">
                                    <table class="table align-items-center">
                                        <tbody>
                                            <tr>
                                                <td><i class="fa fa-circle text-blue mr-2"></i>Guitars</td>
                                                <td>{{dashboardcards.data.elementCount[0].elements}}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa fa-circle text-light-1 mr-2"></i>NFTs</td>
                                                <td>{{dashboardcards.data.nftCount[0].nftCount}}</td>
                                                <td>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Sessions by channel</h4>
                                    <div class="aligner-wrapper">
                                        <canvas id="sessionsDoughnutChart" height="210"></canvas>
                                        <div class="wrapper d-flex flex-column justify-content-center absolute absolute-center">
                                            <h2 class="text-center mb-0 font-weight-bold">8.234</h2>
                                            <small class="d-block text-center text-muted  font-weight-semibold mb-0">Total Leads</small>
                                        </div>
                                    </div>
                                    <div class="wrapper mt-4 d-flex flex-wrap align-items-cente">
                                        <div class="d-flex">
                                            <span class="square-indicator bg-danger ml-2"></span>
                                            <p class="mb-0 ml-2">Assigned</p>
                                        </div>
                                        <div class="d-flex">
                                            <span class="square-indicator bg-success ml-2"></span>
                                            <p class="mb-0 ml-2">Not Assigned</p>
                                        </div>
                                        <div class="d-flex">
                                            <span class="square-indicator bg-warning ml-2"></span>
                                            <p class="mb-0 ml-2">Reassigned</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include '../../partials/_footer.html'; ?>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>










    <script src="../../../bootstrap/5/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <script src="../../vendors/moment/moment.min.js"></script>
    <script src="../../vendors/daterangepicker/daterangepicker.js"></script>
    <script src="../../vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>