        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

<?php
    $date = date('Y-m-d');
    $data = $this->db->query("SELECT *, SUM(bayar) as bayar FROM angsuran WHERE tanggal='$date'")->result_array()[0];

    $m = $this->db->query("SELECT *, SUM(total) as total FROM transaksi_penjualan WHERE id_jenis_pembayaran='1' AND tanggal='$date'")->result_array()[0];

    $n = $this->db->query("SELECT *, SUM(dp) as dp_total FROM transaksi_penjualan WHERE id_jenis_pembayaran != '1' AND tanggal='$date'")->result_array()[0];
?>

        <div class="content mt-3">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-success">
                        <div class="card-body pb-0">
                            <div class="float-right">
                                <i class="fa fa-dollar"></i>
                            </div>
                            <h4 class="mb-0">
                                <span class="count"><?='Rp. ' ;?> <?=number_format($m['total'] + $data['bayar'] + $n['dp_total'],2,',','.');?></span>
                            </h4>
                            <p class="text-light">Pendapatan Hari Ini</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-info">
                        <div class="card-body pb-0">
                            <div class="float-right">
                                <i class="fa fa-share"></i>
                            </div>
                            <h4 class="mb-0">
                                <span class="count"><?='Rp. ' ;?> <?=($today_incoma);?></span>
                            </h4>
                            <p class="text-light">Pengeluaran Hari Ini</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-warning">
                        <div class="card-body pb-0">
                            <div class="float-right">
                                <i class="fa fa-cogs"></i>
                            </div>
                            <h4 class="mb-0">
                                <span class="count"><?=($total_transaksipenjualan);?><?=' Item'?></span>
                            </h4>
                            <p class="text-light">Total Penjualan</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="float-right">
                                <i class="fa fa-cogs"></i>
                            </div>
                            <h4 class="mb-0">
                                <span class="count"><?=($total_transaksipembelian);?><?=' Item'?></span>
                            </h4>
                            <p class="text-light">Total Pembelian</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Grafik Pembelian
                        </div>
                        <div class="card-body">
                        <!-- <?php
                            var_dump($title);
                        ?>  -->
                            <canvas id="myChart1" width="400" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Grafik Penjualan 
                        </div>
                        <div class="card-body">
                            <canvas id="myChart2" width="400" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <script>
                    var ctx1 = document.getElementById('myChart1').getContext('2d');
                    var ctx2 = document.getElementById('myChart2').getContext('2d');
                    var myChart1 = new Chart(ctx1, {
                        type: 'line',
                        data: {
                            labels: [<?=implode(",",$title);?>],
                            datasets: [{
                                label: 'Pembelian',
                                data: [<?=implode(",",$valuepembelian);?>],
                                backgroundColor: "rgba(255, 99, 132, 0.2)",
                                borderColor: "rgba(255, 99, 132, 1)",
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                    var myChart2 = new Chart(ctx2, {
                        type: 'line',
                        data: {
                            labels: [<?=implode(",",$title);?>],
                            datasets: [{
                                label: 'Penjualan',
                                data: [<?=implode(",",$valuepenjualan);?>],
                                backgroundColor: "rgba(99, 255, 132, 0.2)",
                                borderColor: "rgba(99, 255, 132, 1)",
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                    
                </script>

<script src="<?=base_url();?>assets/sufee/vendors/chart.js/dist/Chart.min.js"></script>