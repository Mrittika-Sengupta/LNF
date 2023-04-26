<?php include('menu.php'); ?>

<div class="main-content">
 
    
    <br /><br />
        <h1>Lost and Found Items</h1>

        <br /><br />

              
                

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                
                ?>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Username</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Select Item Image</th>
                        <th>category</th>
                        <th>location</th>
                        <th>Date</th>
                        <th>Claim</th>
                        <th>Spam</th>

                      
                        
                      
                    </tr>

                    <?php 
                      
                        $sql = "SELECT * FROM found_items";

                 
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                       
                        $sn=1;

                        if($count>0)
                        {
                           
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $username = $row['username'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $image_name = $row['image_name'];
                                $category = $row['category'];
                                $location = $row['location'];
                                $date = $row['date'];
                               
                            

                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $description; ?></td>
                                    <td>
                                    <?php  
                                            if($image_name=="")
                                            {
                                                echo "<div class='error'>Image not Added.</div>";
                                            }
                                            else
                                            {
                                                ?>
                                                <img src="<?php echo SITEURL; ?>image/<?php echo $image_name; ?>" width="100px">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $category; ?></td>
                                    <td><?php echo $location; ?></td>
                                    <td><?php echo $date,"Y/m/d ";; ?></td>  
                                   <td> <button type="submit" name="submit" value="Post Item" class="btn-primary" style= "width:90px">Claim</button> </td>
                                   <td> <button type="submit" name="submit" value="Post Item" class="btn-primary" style= "width:90px">Spam</button> </td> 
                                    
                                <?php
                            }
                        }
                        else
                        {
                           
                            echo "<tr> <td colspan='7' class='error'> Item not Added Yet. </td> </tr>";
                        }

                    ?>

                    
                </table>
    </div>
    
</div>
