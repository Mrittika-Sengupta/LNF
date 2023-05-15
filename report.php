<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UFT-8" />
    <title>Lost & Found</title>
    <link rel="icon" type="image/x-icon" href="icon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="stylenavside.css" />
    <link rel="stylesheet" href="stylehome.css">
    <link rel="stylesheet" href="styleclaim.css" />
</head>

<body>
    <div class="container">
        <aside>
            <img src="logo.png" alt="lost and found" class="logo" />

            <div class="sidebar">
                <ul>
                    <li class="=active">
                        <a href="home.html"><i class="fas fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="post.html"><i class="fas fa-file"></i>Post Item</a>
                    </li>
                    <li>
                        <a href="sale.html"><i class="fas fa-shopping-basket"></i>Items for Sale</a>
                    </li>
                    <li>
                        <a href="claim.html"><i class="fas fa-exclamation"></i>My Claims</a>
                    </li>
                </ul>
            </div>
        </aside>

        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
            </h2>

            <div class="search">
                <form action="#">
                    <i class="fas fa-search"></i>
                    <input type="search" placeholder="Search here" />
                </form>
            </div>

            <div class="user">
                <ul>
                    <li>
                        <a href="user.html">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                    <li>
                        <a href="start.html">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </header>

        <main>
            <h2>Validate your Claim</h2>

            <form action="home.html" method="post">

                <label for="img">Select image to upload:</label>
                <input type="file" placeholder="Select image to upload:" name="fileToUpload" id="fileToUpload"
                    required />

                <label>Name</label>
                <input type="text" name="uname" placeholder="User Name">

                <label>Address</label>
                <input type="text" name="address" placeholder="Address">

                <label>Lost Date-Time: </label>
                <input type="datetime-local" id="datetime">
        
                <label>Location: </label>
                <input type="text" name="address" />

                <label>Validation</label>
                <input style="height:150px;font-size:12pt;" ..... type="text" name="password"
                    placeholder="i.e, This product is from... "><br>

                <button type="submit">Claim</button>
        </main>

    </div>


</body>

</html>