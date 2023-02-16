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
                for ($r = 0; $r <= $year - 2022; $r++) {
                    if ($r % 4 == 0) {
                        $daysmonth = [31, 29, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
                    } else {
                        $daysmonth = [31, 28, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
                    }
                    for ($o = 1; $o <= count($daysmonth); $o++) {
                        for ($k = 1; $k <= $daysmonth[$o - 1]; $k++) {
                        $r2 = sprintf('%04d', $r + 2022);
                        $o2 = sprintf('%02d', $o);
                        $k2 = sprintf('%02d', $k);
                        $date_time_end = date("$r2-$o2-$k2 23:59:59");
                        $date_time_start = date("$r2-$o2-$k2 00:00:00");

                        if ($date_time_start < $datetime && $datetime < $date_time_end) {
                            $nftArr[$r][$o - 1][$k - 1] += 1;
                        } else {
                            $nftArr[$r][$o - 1][$k - 1] += 0;
                        }
                        }
                    }
                }
                $s++;
            }
        } else {
            foreach ($guitarcek as $nf) {
                $datetime = $nftcek[$s]["NFTtimedate"];
                $totalExpense += $nftcek[$i]["fee"];
                $i++;
                for ($r = 0; $r <= $year - 2022; $r++) {
                    if ($r % 4 == 0) {
                        $daysmonth = [31, 29, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
                    } else {
                        $daysmonth = [31, 28, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
                    }
                    for ($o = 1; $o <= count($daysmonth); $o++) {
                        for ($k = 1; $k <= $daysmonth[$o - 1]; $k++) {

                        $nftArr[$r][$o - 1][$k - 1] = 0;

                        }
                    }
                }
                $s++;
            }
        }

        foreach ($guitarcek as $nf) {
        $datetime = $guitarcek[$p]["timedate"];
        for ($r = 0; $r <= $year - 2022; $r++) {
            if ($r % 4 == 0) {
            $daysmonth = [31, 29, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
            } else {
            $daysmonth = [31, 28, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
            }
            for ($o = 1; $o <= count($daysmonth); $o++) {
            for ($j = 1; $j <= $daysmonth[$o - 1]; $j++) {
                $r2 = sprintf('%04d', $r + 2022);
                $o2 = sprintf('%02d', $o);
                $j2 = sprintf('%02d', $j);
                $date_time_end = date("$r2-$o2-$j2 23:59:59");
                $date_time_start = date("$r2-$o2-$j2 00:00:00");

                if ($date_time_start < $datetime && $datetime < $date_time_end) {
                $Arrguitar[$r][$o - 1][$j - 1] += 1;
                } else {
                $Arrguitar[$r][$o - 1][$j - 1] += 0;
                }
            }
            }
        }
        $p++;
        }

        if ($current_network == "Binance" || $current_network == "BNB(Testnet)") {

            $USDprice = json_decode(convertToUSD("BNB", "USd"))->USD;

            $totalExpenseUSD = $totalExpense * $USDprice;


        } elseif ($current_network == "Ethereum" || $current_network == "Ethereum(Ropsten)") {

            $USDprice = json_decode(convertToUSD("ETH", "USd"))->USD;

            $totalExpenseUSD = $totalExpense * $USDprice;

        } elseif ($current_network == "Polygon" || $current_network == "Polygon(Mumbai)") {

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

        <?php include '../../partials/_navbar.php'; ?><div class="container-fluid page-body-wrapper">
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
                                                <h5 class="font-weight-semibold">Report Summary</h5>
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
                                                <h4><?php echo count($nftcek);?></h4>
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


                    <button type="hidden" id="guitarArr" value="<?php echo json_encode($Arrguitar) ?>" hidden></button>
                    <button type="hidden" id="nftArr" value="<?php echo json_encode($nftArr) ?>" hidden></button>
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row income-expense-summary-chart-text">
                                        <div class="col-xl-4">
                                            <h5><span id="charthead"></span></h5>
                                            <p class="small text-muted">A comparison of people who mark themselves of their ineterest from the date range given above. Learn more.</p>
                                        </div>
                                        <div class=" col-md-3 col-xl-2">
                                            <p class="income-expense-summary-chart-legend"> <span style="border-color: #6469df"></span> Total Guitar Parts </p>
                                            <h3><span id="guitarCount" value="<?php echo count($guitarcek) ?>"><?php echo count($guitarcek) ?></span></h3>
                                        </div>
                                        <div class="col-md-3 col-xl-2">
                                            <p class="income-expense-summary-chart-legend"> <span style="border-color: #37ca32"></span> Total NFTs </p>
                                            <h3><span id="nftCount" value="<?php echo count($nftcek) ?>"><?php echo count($nftcek) ?></span></h3>
                                        </div>
                                        <div class="col-md-6 col-xl-4 d-flex align-items-center">
                                            <div class="input-group" id="income-expense-summary-chart-daterange">
                                                <div class="inpu-group-prepend input-group-text"><i class="icon-calendar"></i></div>
                                                <input type="text" class="form-control">
                                                <div class="input-group-prepend input-group-text"><i class="icon-arrow-down"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row income-expense-summary-chart mt-3">
                                        <div class="col-md-12">
                                            <canvas class="ct-chart" id="income-expense-summary-chart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="grid-margin stretch-card col-xl-5">
                            <div class="card">
                                <div class="card-body">
                                    <dmx-chart id="chart2" width="300" height="300" point-size="" type="doughnut" dmx-bind:data="charts.data.doughnat" labels="nft" dataset-1:value="guitar" class="style27" responsive="true" colors="colors9" thickness="1" cutout="60"></dmx-chart>

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
                    </div><?php include '../../partials/_footer.html'; ?>
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
<script>
    var currentdate = new Date();
        var datetime = currentdate.getFullYear() + "-"
          + (currentdate.getMonth() + 1) + "-"
          + currentdate.getDate() + " " +
          + currentdate.getHours() + ":"
          + currentdate.getMinutes() + ":"
          + currentdate.getSeconds();

        let year = currentdate.getFullYear() - 2022;
        let nthMonth = currentdate.getMonth() + 1;
        let daysmonth = [31, 28, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
        let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let xValues = [];
        let guitarCount = $("#guitarCount").val();
        let nftCount = $("#nftCount").val();

        if (currentdate.getFullYear() % 4 == 0) {
          daysmonth = [31, 29, 31, 30, 31, 30, 31, 30, 31, 30, 31, 30];
        }

        function chartData() {
          xValues = [];
          for (i = 0; i < daysmonth[nthMonth - 1]; i++) {
            xValues[i] = i + 1;
          }
          // console.log(xValues);

          //gitar sayıları
          let a = $("#guitarArr").val();
          const guitarArr = JSON.parse(a);
          // nft sayıları
          let t = $("#nftArr").val();

          const nftArr = JSON.parse(t);

          console.log(nftArr);
          let title = months[nthMonth - 1] + " " + (year + 2022);
          $("#charthead").html(title);

          new Chart("income-expense-summary-chart2", {
            type: "bar",
            data: {
              labels: xValues,
              datasets: [{
                data: guitarArr[year][nthMonth - 1],
                borderColor: "black",
                pointRadius: 0,
                backgroundColor: "#6469df",
                fill: true
              }, {
                data: nftArr[year][nthMonth - 1],
                borderColor: "black",
                pointRadius: 0,
                backgroundColor: "#37ca32",
                fill: true
              }]
            },
            options: {
              legend: { display: false },
              scales: {
                yAxes: [{
                  ticks: {
                    stepSize: 10
                  },
                }]
              },
            }
          });
        }


         $("#backward").click(function () {
          if (nthMonth == 1) {
            if (year == 0) {
              chartData();
            } else {
              nthMonth = 12;
              year = year - 1;
              chartData();
            }

          } else {
            nthMonth = nthMonth - 1;
            chartData();
          }

        });
        $("#forward").click(function () {
          if (nthMonth == 12) {
            if ((year + 2022) == currentdate.getFullYear()) {
              chartData();
            } else {
              year = year + 1;
              nthMonth = 1;
              chartData();

            }
          } else {
            nthMonth = nthMonth + 1;
            chartData();
          }
        });

        chartData();


</script>