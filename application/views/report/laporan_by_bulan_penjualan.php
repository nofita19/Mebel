<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berdasarkan bulan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    
<style>
  .center {
  margin-left: auto;
  margin-right: auto;
    }
@page { size: A4 }
  
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
</style>
</head>

<body class="A4">

<?php
    if ($bulanawal == "1") {
        $bl1 = "Januari";
    }elseif ($bulanawal == "2") {
        $bl1 = "Februari";
    }elseif ($bulanawal == "3") {
        $bl1 = "Maret";
    }elseif ($bulanawal == "4") {
        $bl1 = "April";
    }elseif ($bulanawal == "5") {
        $bl1 = "Mei";
    }elseif ($bulanawal == "6") {
        $bl1 = "Juni";
    }elseif ($bulanawal == "7") {
        $bl1 = "Juli";
    }elseif ($bulanawal == "8") {
        $bl1 = "Agustus";
    }elseif ($bulanawal == "9") {
        $bl1 = "September";
    }elseif ($bulanawal == "10") {
        $bl1 = "Oktober";
    }elseif ($bulanawal == "11") {
        $bl1 = "November";
    }elseif ($bulanawal == "12") {
        $bl1 = "Desember";
    }


    if ($bulanakhir == "1") {
        $bl2 = "Januari";
    }elseif ($bulanakhir == "2") {
        $bl2 = "Februari";
    }elseif ($bulanakhir == "3") {
        $bl2 = "Maret";
    }elseif ($bulanakhir == "4") {
        $bl2 = "April";
    }elseif ($bulanakhir == "5") {
        $bl2 = "Mei";
    }elseif ($bulanakhir == "6") {
        $bl2 = "Juni";
    }elseif ($bulanakhir == "7") {
        $bl2 = "Juli";
    }elseif ($bulanakhir == "8") {
        $bl2 = "Agustus";
    }elseif ($bulanakhir == "9") {
        $bl2 = "September";
    }elseif ($bulanakhir == "10") {
        $bl2 = "Oktober";
    }elseif ($bulanakhir == "11") {
        $bl2 = "November";
    }elseif ($bulanakhir == "12") {
        $bl2 = "Desember";
    }

?>
    <center>
        <h2>LAPORAN PENJUALAN</h2>
        <h4>Berdasarkan Periode Bulan</h4>
        <h4><?php echo $bl1." - ".$bl2." - ".$tahun ?></h4>
    </center>

    <br />

    <table border="1" class="table">
    <tr>
            <th>Nomor Faktur</th>
            <th>Tanggal Transaksi</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Type Barang</th>
            <th>Nama Pembeli</th>
            <th>Alamat</th>
            <th>No Telpon</th>
            <th>Jenis Pembayaran</th>
            <th>Harga</th>
            <th>DP</th>
            <th>Jumlah Angsuran</th>  
            <th>Jumlah</th>          
            <th>Sisa Angsuran</th>          
            <th>Jumlah Bayar</th>
        </tr>
        <?php
        // $ini_dp = 0;
        $ini_sub_total = 0;
        foreach ($bybulan as $row) {
        ?>
            <tr>
                <td class="text-center"><?= $row->nomor_faktur; ?></td>
                <td class="text-center"><?= $row->tanggal; ?></td>
                <td class="text-center"><?= $row->barang_nama; ?></td>
                <td class="text-center"><?= $row->jenis_bahan; ?></td>
                <td class="text-center"><?= $row->type_barang; ?></td>
                <td class="text-center"><?= $row->nama_pembeli; ?></td>
                <td class="text-center"><?= $row->alamat_pembeli; ?></td>
                <td class="text-center"><?= $row->no_telp; ?></td>
                <td class="text-center"> <?php if ($row->id_jenis_pembayaran == '1') { ?>
                        <span>Cash</span>
                    <?php } elseif ($row->id_jenis_pembayaran == '2') { ?>
                        <span>Kredit Bulanan</span>
                    <?php } elseif ($row->id_jenis_pembayaran == '3') { ?>
                        <span>Kredit Musiman</span>
                    <?php } ?></td>
                <td class="text-center"><?= $row->harga; ?></td>
                <td class="text-center"><?= $row->dp; ?></td>
                <td class="text-center"> <?php if ($row->id_jenis_pembayaran == '1') { ?>
                        <span>Lunas</span>
                    <?php } elseif ($row->id_jenis_pembayaran == '2') { ?>
                        <span>10 Angsuran</span>
                    <?php } elseif ($row->id_jenis_pembayaran == '3') { ?>
                        <span>4 Angsuran</span>
                    <?php } ?></td>
                    <td class="text-center"><?= $row->jumlah; ?></td>
                    <td>
                        <?php if ($row->id_jenis_pembayaran == '1') { ?>
                            <span>0</span>
                        <?php } elseif ($row->id_jenis_pembayaran == '2') { 
                            $bg = $this->db->query("SELECT COUNT(nomor_faktur) as angsuranx FROM angsuran WHERE nomor_faktur='$row->nomor_faktur'")->result_array()[0];
                            echo 10 - $bg['angsuranx'];
                        } elseif ($row->id_jenis_pembayaran == '3') { 
                            $bg = $this->db->query("SELECT COUNT(nomor_faktur) as angsuranx FROM angsuran WHERE nomor_faktur='$row->nomor_faktur'")->result_array()[0];
                            echo 4 - $bg['angsuranx'];
                            
                        }?>
                    </td>
                    <td>
                            <?php 
                            $d = 0;
                            if ($row->id_jenis_pembayaran == '1') { ?>
                                <?php echo $row->sub_total ?>
                            <?php } elseif ($row->id_jenis_pembayaran == '2') { 
                                if ($row->dp == 0) {
                                    echo "0";
                                }else{
                                    echo $row->dp;
                                }
                            } elseif ($row->id_jenis_pembayaran == '3') { 
                                if ($row->dp == 0) {
                                    echo "0";
                                }else{
                                    echo $row->dp;
                                }
                            }?>
                    </td>

<?php 
    $da = $this->db->query("SELECT *, COUNT(nomor_faktur) as angsuranx FROM angsuran WHERE nomor_faktur='$row->nomor_faktur'")->result_array();

    for ($i=0; $i < $da[0]['angsuranx']; $i++) { 
?>

                        <td>
                                <tr>
                                    <td colspan="13"><?php echo $row->nomor_faktur; ?></td>
                                    <td>Angsuran Ke <?php echo $i + 1 ?></td>
                                    <td>
                                        <?php if ($row->id_jenis_pembayaran == '1') { ?>
                                            <?php echo $row->sub_total; ?>
                                        <?php } elseif ($row->id_jenis_pembayaran == '2') { 
                                            echo $da[0]['bayar'];
                                        } elseif ($row->id_jenis_pembayaran == '3') { 
                                            echo $da[0]['bayar'];
                                        }?>
                                    </td>
                                </tr>
                           
                        </td>
<?php } ?>
                        

                <!-- <td class="text-center">
                                
                </td> -->
                <!-- <td class="text-center"><?= $row->tanggal; ?></td>
                <td class="text-center"><?= $row->jumlah; ?></td> -->
                <!-- <td class="text-center"><?= $row->harga; ?></td> -->
                <!-- <td class="text-center">
                                <?php if ($row->id_jenis_pembayaran == '1') { ?>
                                    <span><?php echo $row->total ?></span>
                                <?php } elseif ($row->id_jenis_pembayaran == '2') { 
                                    $bg = $this->db->query("SELECT SUM(bayar) as angsuranx FROM angsuran WHERE nomor_faktur='$row->nomor_faktur'")->result_array()[0];
                                    echo $bg['angsuranx'];
                                } elseif ($row->id_jenis_pembayaran == '3') { 
                                    $bg = $this->db->query("SELECT SUM(bayar) as angsuranx FROM angsuran WHERE nomor_faktur='$row->nomor_faktur'")->result_array()[0];
                                    echo $bg['angsuranx'];                                  
                                }?>
                </td> -->
            </tr>
        <?php }; ?>
        <?php
            foreach ($sum as $r) {
            ?>
                <tr>
                    <td colspan="14" align="right"><strong>Jumlah Total</strong></td>
                    <td colspan="1" align="right"><strong>
                                    <?php
                                    $hasilkal = 0;
                                    $h = 0;
                                    $m = 0;
                                     if (!empty($row->id_jenis_pembayaran)) {
                                        if ($row->id_jenis_pembayaran == '1') { ?>
                                            <?php
                                                $hasilkal = $this->db->query("SELECT SUM(total) as gaes FROM transaksi_penjualan WHERE id_jenis_pembayaran='1'")->result_array();
                                                $m += $hasilkal[0]['gaes'];
                                            ?>
                                            <?php } elseif ($row->id_jenis_pembayaran == '2' || $row->id_jenis_pembayaran == '3') { 
                                                $h = $this->db->query("SELECT SUM(bayar) as ang FROM angsuran")->result_array();
                                                print_r($h);
                                            }
                                     }else{
                                        $hasilkal = 0;
                                        $ra=0;
                                        $h = 0;
                                     }
                                     $h = $this->db->query("SELECT SUM(bayar) as ang FROM angsuran")->result_array();
                                        $ra = $this->db->query("SELECT SUM(dp) as dp FROM transaksi_penjualan")->result_array();
                                        // var_dump($ra);
                                        // die;
                                        echo $ra[0]['dp'] + $hasilkal[0]['gaes'] + $h[0]['ang'];;
                                    ?>
                                    
                    </strong></td>
                </tr>
            <?php }; ?>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>