<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Review Makanan</title>
    <link rel="stylesheet" href="FrontPage.css">
    <link rel="stylesheet" href="images.css">
    
    
</head>

<body>
    
    <nav>
        <div class="logo">
            <h3><a href="#home">Food Reviews</a></h3>
        </div>
        <ul class="link">
            
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="list.php">List</a></li>   
            <li><a href="#about">About</a></li>
            <li><a href="myReviews.php">My Reviews</a></li>

            <!-- <li><a href="addReview.php">Review</a></li>
            <li><a href="tambahResto.html">Add Resto</a></li> -->
        </ul>

        <div class="io">
            <div class="in" style="overflow: unset;">
            <?php if(isset($_SESSION['login'])){?>
                <a href="logout.php" id="login">Logout</a>
            
            
            <?php }else{?>
                <a href="LoginRegister.html" id="login">Login/Register</a>
            
            <?php }?>
            
            </div>
        </div>

    
    </nav>

    <section class="home" id="home">
        <div class="penjelasan">
            <h1>Food Reviews</h1>
            <h3>Welcome to Food Reviews 
               <?php if(isset($_SESSION['login'])){?>
                <?php echo $_SESSION['nama'],"!!";?>
                
                <?php }else{?>
                <?php echo "!!";?>
                <?php }?> 
        
            </h3>
            <br> <br>
            
        </div>
    </section>
    
   

    <section class="gallery" id="gallery">
        <h1>Gallery</h1> 
        <div class="container">
        <img src="Gambar/nasgor.jpg" class="jumbo" alt="main">
        <div>
            <img src="Gambar/mekdi.jpg" alt="mekdi" class="thumb" id ="mekdi">
            <img src="Gambar/nasgor.jpg" alt="nasgor" class="thumb" id = "nasgor">
            <img src="Gambar/satey.jpg" alt="sosis" class="thumb" id = "satey">
            <img src="Gambar/rendang.jpg" alt="rendang" class="thumb" id ="rendang">
            <img src="Gambar/soto.jpg" alt="soto" class="thumb" id = "soto">
            <img src="Gambar/buryam.jpg" alt="bubur ayam" class="thumb" id = "buryam">

        </div>
        </div>

    </section>

 <!--    <section class="list" id="list">
        <h1>List</h1>
        <div class="semualist">
            

            <table>
                <tr>
                    
                    <th  class="header-top1">Nama Resto</th>
                    <th  class="header-top2">Menu Tersedia</th>
                    <th  class="header-top3">Alamat</th>
                </tr>
              
                <tr class="data">
                    
                    <td>McDonald's Otista</td>
                    <td>Ayam goreng, burger, kentang, soda, dan lain-lain</td>
                    <td> Jl. Otto Iskandardinata No.Kav.125-127, Bidara Cina, Kec. Jatinegara, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13330</td>
                    
                </tr>
                <tr class="data">
                    
                    <td>Rumah Makan Padang Sari Alam</td>
                    <td>Rendang, ayam goreng, ayam bakar, ayam sayur, ayam pop, berbagai macam ikan, perkedel, telur dadar, dan sebagainya</td>
                    <td>Jl. Otista Raya No.56, RT.1/RW.15, Bidara Cina, Kec. Jatinegara, Jakarta Timur, Daerah Khusus Ibukota Jakarta 13330</td>
                   
                </tr>
                <tr class="data">
                    
                    <td>Bubur Ayam JPO KPPN Jakarta III</td>
                    <td>Bubur Ayam dan aneka sate</td>
                    <td>Di trotorar Jalan Otto Iskandardinata No.53-55, RT.5/RW.9, Bidara Cina, Kec. Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13330</td>
                    
                </tr>
                <tr class="data">
                    
                    <td>a</td>
                    <td>a</td>
                    <td>a</td>
                   
                </tr>
                <tr class="data">
                    
                    <td>a</td>
                    <td>a</td>
                    <td>a</td>
                   
                </tr>
                <tr class="data">
                    
                    <td>a</td>
                    <td>a</td>
                    <td>a</td>
                    
                </tr>
                <tr class="data">
                    
                    <td>a</td>
                    <td>a</td>
                    <td>a</td>
                    
                    
                </tr>
                <tr class="data">
                    
                    <td>a</td>
                    <td>a</td>
                    <td>a</td>
                    
                    
                </tr>
                
               
            </table>    
        </div>
    </section> -->

    



<section class="about" id="about">
    <div class="penjelasan">
        <h1>About Us</h1> 
        <br> <br>
        <p>This website is created to help people to find their favorite food</p>
    </div>
</section>

<footer style="text-align: left;font-size:20px; margin: 10px;"> &copy; Alwan Rahmana </footer> <hr>
<script src="script.js" > </script>
</body>
</html>