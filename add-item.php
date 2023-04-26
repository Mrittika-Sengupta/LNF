<?php include('menu.php'); ?>



        
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
      
<?php 

if(isset($_POST['submit']))

{
  
    $title = $_POST['title'];
    $username = $_POST['username'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $date = $_POST['date'];
 

   
    if(isset($_FILES['image']['name']))
    {
        
        $image_name = $_FILES['image']['name'];
        if($image_name!="")
        {
            $ext = end(explode('.', $image_name));

           
            $image_name = "Item-Name-".rand(0000,9999).".".$ext; 
            $src = $_FILES['image']['tmp_name'];

           
            $dst = "image/".$image_name;
            $upload = move_uploaded_file($src, $dst);
            if($upload==false)
            {
               
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                header('location:'.SITEURL.'add-item.php');
                die();
            }

        }

    }
    else
    {
        $image_name = ""; 
    }

    $sql2 = "INSERT INTO found_items SET 

      
        title = '$title',
        username = '$username',
        description = '$description',
        image_name = '$image_name',
        category = '$category',
        location = '$location',
        date= '$date'
        
    ";

    $res2 = mysqli_query($conn, $sql2);
    if($res2 == true)
    {
        $_SESSION['add'] = "<div class='success'>Item Added Successfully.</div>";
        header('location:'.SITEURL.'manage-item.php');
    }
    else
    {
        $_SESSION['add'] = "<div class='error'>Failed to Add Item.</div>";
        header('location:'.SITEURL.'manage-item.php');
    }
}
?>

<main>
<table>
        <div class="header">
          <h2>Post your item</h2>
  

          <form action="" method="POST" enctype="multipart/form-data">
          




  <tr>
  <td>   <label for= "username"> Username: </label> </td>
     
  <td> <input type="text" name="username" placeholder="Username" value='<?php echo $_SESSION['username']; ?>'required > </td>
        
    </tr>

    <tr>
        <td><label for= "title"> Title: </label> </td>
        <td>
            <input type="text" name="title" placeholder="Title of the Item" required>
        </td>
    </tr>


    <tr>
        <td><label for="description">Description: </label> </td>
        <td>
            <textarea name="description" cols="30" rows="5" placeholder="The Item is from..e.g. Lost or Found" required></textarea>
        </td>
    </tr>
     
    <tr>
        <td><label for= "image" > Select Image: </label></td>
        <td>
        <input type="file" name="image" required>
        </td>
    </tr>
    <tr>
  <td>  <label for="category">Item Type: </label> </td>
  <td>
<select name="category" id="category" required>

<option value="abstract">Abstract</option>
<option value="documents">Documents</option>
<option value="others">Others</option>
</select>
  



            </select>
        </td>
    </tr>

    <tr>

    <td>  <label for="location">location: </label> </td>
<td><select name="location" id="location" required> 
<option value="canteen">Canteen</option>
<option value="studyhall">StudyHall</option>
<option value="others">Others</option> 
</select>
</select>


        </td>
    </tr>
    <tr>
        <td><label for="date">date: </label> </td></td>
        <td>
            <input type="date" name="date" required>   
        </td>
    </tr>


    <tr>
        <td colspan="2">
            <button type="submit" name="submit" value="Post Item" class="btn-primary">Post Item</button>
        </td>
    </tr>


</form>



    </main>
</table>

  </div>



  

    </div>
</div>

