<?php
//library phpqrcode
include "phpqrcode/qrlib.php";
include 'koneksi.php';
 
//direktory tempat menyimpan hasil generate qrcode jika folder belum dibuat maka secara otomatis akan membuat terlebih dahulu
$tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);
 
?>
<html>
<head>
</head>
<body>
    <div align="center" style="margin-top: 50px;">

 
    <table border="1">
        <tbody>
        <?php
            $no = 1;
         
             
            $sql = "select * from purchase_detail left join product on product.productid=purchase_detail.productid where purchaseid='".$row['purchaseid']."'";
            $dquery=$db1->query($sql);
            while($drow=$dquery->fetch_array()){
            
                $teks = $row['productname'];
                $teks2 = $row['price'];
                $teks3 = $row['quality'];
                $a= "PRODUCT NAME :";
                $b= "PRICE :";
                $c= "QUALITY :";
      

               
 
                //Isi dari QRCode Saat discan
                $isi_teks1 = $a." ".$teks."\n".$b." ".$teks2."\n".$c." ".$teks3;
                
                //Nama file yang akan disimpan pada folder temp 
                $namafile1 = $teks.".png";
                //Kualitas dari QRCode 
                $quality1 = 'H'; 
                //Ukuran besar QRCode
                $ukuran1 = 4; 
                $padding1 = 0; 
                QRCode::png($isi_teks1,$tempdir.$namafile1,$quality1,$ukuran1,$padding1);
        ?>
            
                <td style="padding: 20px;"><img src="temp/<?php echo $namafile1; ?>" width="200px"></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
 
</body>
</html>
<?php mysqli_close($db1); ?>