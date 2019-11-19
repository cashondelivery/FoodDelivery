<!-- Sales Details -->
<?php
//library phpqrcode
include "phpqrcode/qrlib.php";
include 'koneksi.php';
 
//direktory tempat menyimpan hasil generate qrcode jika folder belum dibuat maka secara otomatis akan membuat terlebih dahulu
$tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);
 
?>

            <div class="modal-body">
                <div class="container-fluid">
                    
                    <table class="table table-bordered table-striped">
                        
                        <tbody>
                            <?php
                                $sql="select * from purchase_detail left join product on product.productid=purchase_detail.productid where purchaseid='".$row['purchaseid']."'";
                                $dquery=$db1->query($sql);
                                $isi_teks1="";
                                $tot='0';
                                while($row=$dquery->fetch_array()){
                                    ?>
                                   
                                        
                                            <?php
                                           
                                            $teks = $row['productname'];
                                            $teks2 = $row['price'];
                                            $teks3 = $row['quantity'];
                                            $a= "PRODUCT NAME :";
                                            $b= "PRICE :";
                                            $c= "QUALITY :";

                                            $tot=$tot+($teks2*$teks3);
                                            

                                            $isi_teks1 = $isi_teks1. $a." ".$teks."\n ".$b." ".$teks2."\n ".$c." ".$teks3."\n "."\n "."\n ";



                //Nama file yang akan disimpan pada folder temp 

                                            
                                                                        ?>
                                                                        
                                     
                                    <?php
                                    
                                }
                                            $new=$isi_teks1."TOTAL :RM".$tot;
                                            $namafile1 = $teks.".png";
                                            //Kualitas dari QRCode 
                                            $quality1 = 'H'; 
                                            //Ukuran besar QRCode
                                            $ukuran1 = 4; 
                                            $padding1 = 0; 
                                            QRCode::png($new,$tempdir.$namafile1,$quality1,$ukuran1,$padding1);
                                            echo "Please Take Picture or ScreenShot This QR CODE. Thank You :)";

                            ?>

                                <td style="padding: 20px;"><img src="temp/<?php echo $namafile1; ?>" width="200px"></td>                            
                        </tbody>`
                        

                    </table>

                </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
