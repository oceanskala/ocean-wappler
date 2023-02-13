<!doctype html>
<html>

<head>
    <base href="/Stellar-master/pages/dashboard/">
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
    <script src="../../../dmxAppConnect/dmxCharts/Chart.min.js" defer></script>
    <script src="../../../dmxAppConnect/dmxCharts/dmxCharts.js" defer></script>
    <script src="../../../dmxAppConnect/dmxFormatter/dmxFormatter.js" defer></script>
</head>

<body is="dmx-app" id="bodyList">
    <?php
    require "../test/db.php";
    $netwrk = $db->prepare('SELECT * FROM smartContracts WHERE activated=?');
    $netwrk->execute([1]);
    $netwrkcek = $netwrk->fetch(PDO::FETCH_ASSOC);

    $guitarsor = $db->prepare('SELECT * FROM pdf');
    $guitarsor->execute();
    $guitarcek = $guitarsor->fetchAll(PDO::FETCH_ASSOC);


    echo $current_network = $netwrkcek["networkk"];
    $symbl = $netwrkcek["symbol"];
    $symblArr = ["BNB", "ETH", "MATIC", "AVAX", "TRX", "SOL"];

    $nftcek = array();
    $n = 0;
    foreach ($guitarcek as $tt) {
    if ($current_network == "All Networks") {
        if ($guitarcek[$n]["hasNft"] != 0) {
        array_push($nftcek, $guitarcek[$n]);
        }
    } elseif ($guitarcek[$n]["hasNft"] != 0 && $guitarcek[$n]["_network"] == $current_network) {
        // echo "<br>";
        // print_r($guitarcek[$i]);
        array_push($nftcek, $guitarcek[$n]);
    }
    $n++;
    }
    

$Arrguitar = [];
$nftArr = [];

$totalExpanse = 0;
$totalExpanseArr = array();
$totalExpanseUSD = 0;

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
    $totalExpanse += $nftcek[$i]["fee"];
    $i++;
  }
} else {
  foreach ($guitarcek as $nf) {
    $datetime = $nftcek[$s]["NFTtimedate"];
    $totalExpanse += $nftcek[$i]["fee"];
    $i++;
  }
}

        if ($current_network == "Binance" || $current_network == "BNB(Testnet)") {

        $USDprice = json_decode(convertToUSD("BNB", "USd"))->USD;

        $totalExpanseUSD = $totalExpanse * $USDprice;


        } elseif ($current_network == "Ethereum" || $current_network == "Ethereum(Ropsten)") {

        $USDprice = json_decode(convertToUSD("ETH", "USd"))->USD;

        $totalExpanseUSD = $totalExpanse * $USDprice;

        } elseif ($current_network == "Polygon" || $current_network == "Polygon(Mumbai)") {

        $USDprice = json_decode(convertToUSD("MATIC", "USd"))->USD;

        $totalExpanseUSD = $totalExpanse * $USDprice;

        } elseif ($current_network == "AVAX" || $current_network == "Fuji(Testnet)") {

        $USDprice = json_decode(convertToUSD("AVAX", "USd"))->USD;

        $totalExpanseUSD = $totalExpanse * $USDprice;

        } elseif ($current_network == "Tron" || $current_network == "Shasta(Testnet)") {

        $USDprice = json_decode(convertToUSD("TRX", "USd"))->USD;

        $totalExpanseUSD = $totalExpanse * $USDprice;

        } elseif ($current_network == "All Networks") {
        for ($t = 0; $t < count($guitarcek); $t++) {
            $net = $guitarcek[$t]["_network"];
            $totalExpanse2 = $guitarcek[$t]["fee"];

            switch ($net) {
            case "BNB(Testnet)":

                $USDprice = json_decode(convertToUSD("BNB", "USd"))->USD;
                $totalExpanseArr[0] += $totalExpanse2 * $USDprice;
                $totalExpanseUSD += $totalExpanse2 * $USDprice;

                break;
            case "Ethereum(Ropsten)":
                $USDprice = json_decode(convertToUSD("ETH", "USd"))->USD;
                $totalExpanseArr[1] += $totalExpanse2 * $USDprice;
                $totalExpanseUSD += $totalExpanse2 * $USDprice;

                break;
            case "Polygon(Mumbai)":
                $USDprice = json_decode(convertToUSD("MATIC", "USd"))->USD;
                $totalExpanseArr[2] += $totalExpanse2 * $USDprice;
                $totalExpanseUSD += $totalExpanse2 * $USDprice;

                break;
            case "Fuji(Testnet)":
                $USDprice = json_decode(convertToUSD("AVAX", "USd"))->USD;
                $totalExpanseArr[3] += $totalExpanse2 * $USDprice;
                $totalExpanseUSD += $totalExpanse2 * $USDprice;

                break;
            case "Shasta(Testnet)":
                $USDprice = json_decode(convertToUSD("TRX", "USd"))->USD;
                $totalExpanseArr[4] += $totalExpanse2 * $USDprice;
                $totalExpanseUSD += $totalExpanse2 * $USDprice;

                break;
            default:
                $totalExpanseUSD += 0;
                break;
            }


        }
        }

echo $totalExpanseUSD;
exit;
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
    <script is="dmx-flow" id="flow1" type="text/dmx-flow"></script>
    <div is="dmx-browser" id="browser1"></div>
    <dmx-query-manager id="query1"></dmx-query-manager>
    <dmx-serverconnect id="serverconnect1" url="../../../dmxConnect/api/listDB.php" dmx-param:section="0"></dmx-serverconnect>
    <dmx-serverconnect id="charts" url="../../../dmxConnect/api/charts.php" dmx-param:section="0"></dmx-serverconnect>
    <dmx-serverconnect id="dashboardcards" url="../../../dmxConnect/api/dashboard.php" dmx-param:section="0"></dmx-serverconnect>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center">
                <a class="navbar-brand brand-logo" href="../../index.html">
                    <img src="../../images/logo.svg" alt="logo" class="logo-dark" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo-mini.svg" alt="logo" /></a>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?php include '../../partials/_sidebar.html'; ?>
            <!--
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
<li class="nav-item nav-profile">
<a href="#" class="nav-link">
<div class="profile-image">
<img class="img-xs rounded-circle" src="../../images/faces/face8.jpg" alt="profile image">
<div class="dot-indicator bg-success"></div>
</div>
<div class="text-wrapper">
<p class="profile-name">Allen Moreno</p>
<p class="designation">Administrator</p>
</div>
<div class="icon-container">
<i class="icon-bubbles"></i>
<div class="dot-indicator bg-danger"></div>
</div>
</a>
</li>
<li class="nav-item nav-category">
<span class="nav-link">MAIN NAVIGATION</span>
</li>
<li class="nav-item">
<a class="nav-link" href="../../index.html">
<span class="menu-title">Dashboard</span>
<i class="icon-screen-desktop menu-icon"></i>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../../index.html">
<span class="menu-title">Handle List</span>
<i class="icon-screen-desktop menu-icon"></i>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../../index.html">
<span class="menu-title">Body List</span>
<i class="icon-screen-desktop menu-icon"></i>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="../../index.html">
<span class="menu-title">NFT List</span>
<i class="icon-screen-desktop menu-icon"></i>
</a>
</li>
</ul>
</nav>
-->
            <!-- partial -->
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
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="card-text text-center">{{dashboardcards.data.elementCount[0].elements}}</h1>
                                </div>
                                <div class="card-footer">
                                    <p><b>Guitar Count</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="card-text text-center">{{dashboardcards.data.nftCount[0].nftCount}}</h1>
                                </div>
                                <div class="card-footer">
                                    <p><b>NFT Count</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="card-text text-center">{{(dashboardcards.data.nftCount[0].nftCount + dashboardcards.data.elementCount[0].elements)}} ($)</h1>
                                </div>
                                <div class="card-footer">
                                    <p><b>Total $ expense</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="card-text text-center">{{(dashboardcards.data.nftCount[0].nftCount + dashboardcards.data.elementCount[0].elements)}}</h1>
                                </div>
                                <div class="card-footer">
                                    <p><b>Total (BNB) expense</b></p>
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
                                                <td><i class="fa fa-circle text-white mr-2"></i>Guitars</td>
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