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
    <center>
        <h2>LAPORAN PENJUALAN</h2>
        <h4>Berdasarkan Periode Bulan</h4>
    </center>

    <br />

    <table border="1" class="table">
        <tr>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Type Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
        <?php
        foreach ($bybulan as $row) {
        ?>
            <<tr>
                <td class="text-center"><?= $row->nomor_faktur; ?></td>
                <td class="text-center"> <?php if ($row->id_jenis_pembayaran == '1') { ?>
                        <span>Cash</span>
                    <?php } elseif ($row->id_jenis_pembayaran == '2') { ?>
                        <span>Kredit Bulanan</span>
                    <?php } elseif ($row->id_jenis_pembayaran == '3') { ?>
                        <span>Kredit Musiman</span>
                    <?php } ?></td>
                <td class="text-center"><?= $row->barang_kode; ?></td>
            </tr>
        <?php }; ?>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>