
<?php include('partials/menu.php'); ?>


              
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
              
              <main>
           
      <br><br><br><br>


      <div class="items">

        <div class="product">
        

                    <?php 
                        
                        $sql = "SELECT * FROM found_items";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                    ?>

                   

                <h3><?php echo $count; ?></h3>
             <h3>Total posts</h3>
             </div>

                <div class="product">

                    <?php 
                        
                        $sql2 = "SELECT * FROM users";
                        $res2 = mysqli_query($conn, $sql2);
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h3><?php echo $count2; ?></h3>
                    <h3>Total Users</h3>
             </div>

          



</div>
</div>
</main>

</div>
              

               

          

