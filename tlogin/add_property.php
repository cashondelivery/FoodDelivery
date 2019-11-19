<?php 
   include('includes/header.php');
extract($_REQUEST);
include'includes/connect.php';
if(isset($submit))
{

$file=$_FILES['file']['name'];
  
  $query="insert into property values('','$title','$bedroom','$hall','$kitchan','$bathroom','$balcony','$price','$sqr_price','$add','$video','$file','$description','$location','$property_owner','$property_type','$lot_size','$sold','$land_area',now())";  
  $r=mysqli_query($connect,$query);
  move_uploaded_file($_FILES['file']['tmp_name'],"images/property_image/".$_FILES['file']['name']); 
  

//Condition to check data successful to add or not.
if($r)
{
  $msg='<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Property Data Add successful.
  </div>';    
}
else
{
$msg='<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Property Data Add Not successful.
  </div>';

}
        
}

?>  
    <!-- Header -->
    
    <section>
<header>
 
</header>      
       <!-- Left Sidebar -->


<?php include('includes/sidebar.php');?>
        <!-- #END# Left Sidebar -->
        <section class="content">
        <div class="container-fluid">
            <?php echo @$msg;?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            
                            

                                       
                                         <!-- <div class="row">
                                            <div class="col col-lg-6"><br>


                                             <input type="hidden" name="lat" id="lat">
                                             <input type="hidden" name="lng" id="lng">
      


                                                <div class="pac-card" id="pac-card"><br>
                                                        <div id="pac-container">
                                                        <input id="pac-input" type="text" placeholder="Enter a location">
                                                        </div>
                                            </div>
                                            <div id="map" style="height: 400px;width: 650px"></div>
                                                    <div id="infowindow-content">
                                                        <img src="" width="16" height="16" id="place-icon">
                                                        <span id="place-name"  class="title"></span><br>
                                                        <span id="place-address"></span>
                                                    </div><br>
                                            </div>
                                         </div> -->

                                         <div><?php include'user-map.php'; ?></div>
                                                     
                                    </div>


                                        <br><input type="submit" name="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

            <?php include'include/footer.php';?>