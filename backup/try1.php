                            <?php
                                $sql="select * from purchase_detail left join product on product.productid=purchase_detail.productid where purchaseid='".$row['purchaseid']."'";
                                $dquery=$conn->query($sql);
                                while($drow=$dquery->fetch_array()){
                                    ?>
                                    <tr>
                        <td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
                        <td><?php echo $row['customer']; ?></td>
                        <td class="text-right">&#82;&#77; <?php echo number_format($row['total'], 2); ?></td>
                        <td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View Sales Details</a>
                            <?php include('sales_modal.php'); ?>
                        
                    </tr>
                                    <?php
                                    
                                }
                            ?>