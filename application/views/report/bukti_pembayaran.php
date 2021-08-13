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
    p{
        font-size:20px;
    }
</style>
</head>

<body class="A4">
    <center>
        <h2>BUKTI PEMBAYARAN</h2>
        <h2>ANJAYA MEBEL</h2>
    </center>
    
    <br />
    <table>
        <tr>
            <td colspan="2">BUKTI PEMBAYARAN ANGSURAN</td>
        </tr>
        <tr>
            <td>NOMOR FAKTUR :</td><td><?php echo $data[0]['nomor_faktur'] ?></td>
        </tr>
        <tr>
            <td>TELAH MENERIMA DARI :</td><td><?php echo $data[0]['nama_pembeli'] ?></td>
        </tr>
        <tr>
            <td>SEJUMLAH :</td><td><?php echo $data[0]['total'] / 10 ?></td>
        </tr>
        <tr>
            <td>ANGSURAN KE - :</td><td><?php echo $data[0]['angsuran_ke'] ?></td>
        </tr>
        <tr>
            <td></td><td></td>
        </tr>
        <tr>
            <td></td><td><br><br></td>
        </tr>
        <tr>
            <td></td><td>Banyuwangi, <?php echo $data[0]['tanggal'] ?></td>
        </tr>
        <tr>
            <td></td><td>Kolektor <br><br></td>
        </tr>
        <tr>
            <td></td><td><br><br><u><b>Lika Nofita Sari</b></u></td>
        </tr>
    </table>


    <script>
        window.print();
    </script>
</body>

</html>