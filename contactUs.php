<?php
    SESSION_start();
    require ("../database/Classes/productClass.php");
    require ("../database/Classes/userClass.php");
    require ("../database/Classes/adminClass.php");
    header('Cache-Control: no cache');
    
    
    
    if(isset($_POST['loginSubmit'])){
        
        $db_obj=new dbconnect;
         if((strpos($_POST['email'],'\'') === false)&&(strpos($_POST['psw'],'\'') === false))
        {
        $sql="SELECT * FROM users WHERE Email = '" .$_POST['email']."' AND Password = '".$_POST['psw']."';";  
        $sqlAdmin = "SELECT * FROM admin WHERE username = '" .$_POST['email']."' AND Password = '".$_POST['psw']."';"; 
        
	    $qresult=$db_obj->executesql($sql);	
        
        if($obj = mysqli_fetch_array($qresult))
        {
            $sqlCart = "INSERT INTO `cart` (`cartID`) VALUES (NULL);";
            $cartResult=$db_obj->executesql($sqlCart);
            $sqlCart2 = "SELECT * FROM cart ORDER BY cartid DESC limit 1;";
            $cartResult2=$db_obj->executesql($sqlCart2);
             $row=mysqli_fetch_array($cartResult2);
            $_SESSION['userCartID'] =$row['cartID'];
            $user = new userClass($obj['ID'],$obj['FirstName'],$obj['LastName'],$obj['Email'],$obj['Password'],$obj['age'],$obj['PhoneNumber'],$obj['Gender'],$obj['balance']);
            $_SESSION['userID'] = $user->getUserID();
            $_SESSION['userFirstName'] = $user->getFname();
            $_SESSION['balance'] = $user->getBalance();
        }
        
        else if($obj = mysqli_fetch_array($db_obj->executesql($sqlAdmin)))
        {
            $sqlCart = "INSERT INTO `cart` (`cartID`) VALUES (NULL);";
            $cartResult=$db_obj->executesql($sqlCart);
            $sqlCart2 = "SELECT * FROM cart ORDER BY cartid DESC limit 1;";
            $cartResult2=$db_obj->executesql($sqlCart2);
             $row=mysqli_fetch_array($cartResult2);
            $_SESSION['userCartID'] =$row['cartID'];
            $admin = new adminClass($obj['username'],$obj['name'],$obj['Password']);
            $_SESSION['username'] =  $admin->getAdminID();
            $_SESSION['name'] = $admin->getName();
            echo $admin->create_table();
        }
    
        else
        {
            echo "<script type='text/javascript'>alert('Incorrect Email or Password');</script>";
        }
         }
        $db_obj->disconnect();
    }
    if(isset($_POST['searchbtn'])){
		if(($_POST['Search']!=="")&&($_POST['Search']!=="Search...")){
			$stack = array();
		
		$db_obj=new dbconnect;
		$sql="SELECT * FROM product WHERE approved = 1 AND cquantity > 0 AND title LIKE '%".$_POST['Search']."%'";
		$qresult=$db_obj->executesql($sql);
		if($qresult){
			while($row=mysqli_fetch_array($qresult)){
				array_push($stack,$row['PID']);
			
		}
		}
		}
			$_SESSION['SProducts']=$stack;
			header ('Location:http://localhost/dokanProject/php/Search.php');
	}
if(isset($_POST['subbtnn'])){
    
$code = $_POST['textarea2'];  
$db_obj=new dbconnect;
if($code) {       

$sql="SELECT * FROM prepaid WHERE ID = 0 AND pno = '". $code."' ;";
$qresult=$db_obj->executesql($sql);
$row=mysqli_fetch_array($qresult);
if($qresult->num_rows==1){
    $sql1="UPDATE prepaid SET ID = ".$_SESSION['userID']." WHERE pno = '".$code."' ;";
    $qresult1=$db_obj->executesql($sql1);
    $sql2="UPDATE users SET balance = (balance + * 0.5 ".$row['value'].") WHERE ID = ".$_SESSION['userID'];
    $db_obj->executesql($sql2);
    echo '<script>alert("Congrats, Credited'.$row['value'].'$ !")</script>';
}

    
}

    }
if(isset($_POST['subbtn'])){
    
$code = $_POST['textarea2'];
$value1 = $_POST['textarea3'];  
$value1=substr($value1,0,strlen($value1)-1); 
$db_obj=new dbconnect;
if($value1) {       

$username = $_SESSION['username'];
$sql="INSERT INTO prepaid (pno , username ,  Value)
VALUES('".$code."','".$username."','".$value1."');";
$qresult=$db_obj->executesql($sql);
}
}
?>
<div id="myModalyy" class="modalyy">
      <div class="modal-contentyy">
        <span class="closeyy" onclick="hides();" >&times;</span>
          <?php
             $x=new adminClass(1,1,123);
            echo $x->create_table();
            ?>
                </div></div>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="../css/navFooter.css" />
    <link rel="stylesheet" type="text/css" href="../css/contactUs.css" />
</head>
<body>
    <div class="topDiv">
            <div class="dropbtn">
                <button id="dropBTN"><img src="../images/united_states_of_america_square_icon_metallic_frame_64.png" width="30" height="15" />ENGLISH &#x25BC;</button>
                <div class="langdropdown-content">
                    <a href="#"><img src="../images/egypt_square_icon_64.png" width="30" height="15" /> عربي</a>
                </div>
            </div>
        </div>

    
     
        <nav>
            <ul>
                <?php
                if(isset($_SESSION['userID']) || isset($_SESSION['username']))
                {?>
                <li><a href="../php/mycart.php" id="cart">MY CART </a></li>
                <?php }
                else{
                    ?>
                    <li><button id="sellProduct" href="" onclick="document.getElementById('id01').style.display='block' ">MY CART</button></li>
                <?php }
                if(isset($_SESSION['userID']) || isset($_SESSION['username']))
                {?>
                <li><a href="../php/adminAddProduct.php">SELL ON DOKKAN</a></li>
                <?php }
                else{
                    ?>
                    <li><button id="sellProduct" href="" onclick="document.getElementById('id01').style.display='block' ">SELL ON DOKKAN</button></li>
                <?php }
                    ?>
                <li id="urAcc">
                   <?php
                    if(isset($_SESSION['userID']))
                    {
                        ?>
                        <a href="#" id="navName">HI,<?php echo $_SESSION['userFirstName'] ?>&#9660;  </a>
                        <div class="Acc-content">
                        <h3 id="h22">Your Account</h3>
                        <a href="userAccount.php" class="accContent">Your Account</a>
                        <a href="userAccount.php" class="accContent">Your Orders</a>
                        <a class="accContent" onclick="document.getElementById('id03').style.display='block' " style="width:auto;">Redeem</a>
                        <a href="../php/logout.php" class="accContent">Logout</a>
                        </div>
                    <?php
                    }
                    else if(isset($_SESSION['username']))
                    {
                        ?>
                        <a href="#" id="navName">HI, <?php echo $_SESSION['name']?> &#9660;  </a>
                        <div class="Acc-content">
                        <h3 id="h22">YOUR MENU</h3>
                                                <a class="accContent" onclick="document.getElementById('id01a').style.display='block'" >Create Voucher</a>

                        <a class="accContent" onclick="showTable();">New Product Requests</a>
                        <a class="accContent" href="stats.php">Statistics</a>
                        <a href="../php/logout.php" class="accContent">Logout</a>
                        </div>
                    <?php
                    }
                    
                    else{
                        ?>
                        <a href="#" id="navName">YOUR ACCOUNT &#9660;</a>
                        <div class="yourAcc-content">
                        <button id="loginBtn" onclick="document.getElementById('id01').style.display='block' ">Login</button>
                        <p>New Customer?</p>
                        <a href="../php/signup.php" id="signUpAnchor">Sign Up!</a>
                        </div>
                    <?php }
                    ?>
                    
                    
                </li>
            </ul>
            <a href="../php/home.php"><img id="logo" src="../images/Logo.png" width="300" height="100 " /></a>
            <button id="menuBtn" onclick="showMenu();">&#x2630;</button>

        </nav>

        <div class="menuNav">
            <ul>
                <li>
                    <a href="../php/category.php"><span class="spn">&#9664;</span>Electronics</a>
                    <ul>
                        <li><a href="../php/product.php" onclick="set('TV');">TV</a></li>
                        <li><a href="../php/product.php" onclick="set('Mobiles');">MOBILE PHONES</a></li>
                        <li><a href="../php/product.php" onclick="set('Laptops');">LAPTOPS</a></li>
                        <li><a href="../php/product.php" onclick="set('Printers');">PRINTERS</a></li>
                        <li><a href="../php/product.php" onclick="set('Consoles');">CONSOLES</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../php/Accessories.php"><span class="spn">&#9664;</span >Accessories</a>
                    <ul id="accUL">
                        <li><a href="../php/product.php" onclick="set('Gaming Pads');">GAMING PADS</a></li>
                        <li><a href="../php/product.php" onclick="set('Keyboards');">KEYBOARDS</a></li>
                        <li><a href="../php/product.php" onclick="set('Speakers');">SPEAKERS</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../php/Fashion.php"><span class="spn">&#9664;</span >Fashion</a>
                    <ul id="fashUL">
                        <li>
                            <a href="../php/.php"><span class="spn">&#9664;</span>MEN</a>
                            <ul>
                                <li><a href="../php/product.php" onclick="set('MShirt');">SHIRTS</a></li>
                                <li><a href="../php/product.php" onclick="set('MBlazer');">BLAZERS</a></li>
                                <li><a href="../php/product.php" onclick="set('MTrousers');">TROUSERS</a></li>
                                <li><a href="../php/product.php" onclick="set('MShoes');">SHOES</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../php/.php"><span class="spn">&#9664;</span >WOMEN</a>
                            <ul id="womenUL">
                                <li><a href="../php/product.php" onclick="set('WShirt');">SHIRTS</a></li>
                                <li><a href="../php/product.php" onclick="set('WBlouses');">BLOUSES</a></li>
                                <li><a href="../php/product.php" onclick="set('WHandbags');">HANDBAGS</a></li>
                                <li><a href="../php/product.php" onclick="set('WShoes');">SHOES</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="../php/Books.php"><span class="spn">&#9664;</span >Books & Audible</a>
                    <ul id="booksUL">
                        <li><a href="../php/product.php" onclick="set('Books');">Books</a></li>
                        <li><a href="../php/product.php" onclick="set('Audible');">Audible</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    <div id="id01a" class="modala">

            <form class="modala-content animate" method="post">
                    <span onclick="close12()" class="closea" title="Close Modal">&times;</span>
					
                
					<div class="imgcontainera" id="myContainer">
                            <img src="../images/Logo.png" alt="Avatar" class="avatara" >
                        </div>
					<select id="thedropdown" class="dropdowna" name="textarea3">
                      <option disabled selected value>  Select an the value </option>
                      <option>5$</option>
                      <option>10$</option>
                      <option>20$</option>
                      <option>50$</option>
                      <option>100$</option>
                      <option>200$</option>
                      <option>1000$</option>
                    </select>
					<br />
					<input type="text" value="Code will be generated here..."rows="4" cols="80" size="50" name="textarea2" id="ta2" class="texta2" autocomplete="off" readonly>
					<button id="btnt" type="button" onclick="randomString()" class="genCode ColorRed">Generate</button>
					<button id="btnt" type="submit" name="subbtn"  class="genCode1 ColorGreen">Submit</button>
                 
                                        <p class="p">Generate a voucher code</p>

				
            </form>
        
        </div>
    <div id="id03" class="modals">

            <form class="modal-contents animates" method="post">
                    <span onclick="close13()" class="closes" title="Close Modal">&times;</span>
					
                
					<div class="imgcontainers" id="myContainer">
                            <img src="../images/Logo.png" alt="Avatar" class="avatar" width="300" height="150">
                        </div>

					<br />
					<input type="text" placeholder="Enter code here" rows="4" cols="80" size="50" name="textarea2" id="ta2" class="text2" autocomplete="off">
					<button id="btnt" type="submit" name="subbtnn"  class="genCode1 ColorGreen">Redeem</button>
                 
                                        <p class="p">Redeem a voucher code</p>

				
            </form>
        
        </div>
    <datalist id="mylist">
    </datalist>
    <div class="searchDiv">
        <form method = "POST"id="searchForm" name="form1">
            <input type="text" id="inputs" onkeyup="searchInput(this.value)" list="mylist" autocomplete="off" id="mylist" name="Search" placeholder="Search..." />
            <button name ="searchbtn"type="submit"><img src="../images/search_box_icon.png" /></button>
        </form>
    </div>

    <div id="id01" class="modal">

        <form id="form1" class="modal-content animate" method="POST">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="../images/Logo.png" alt="Avatar" class="avatar" width="400">
            </div>

            <div class="loginContainer">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <input type="submit" id="loginBtnMenu" name="loginSubmit">
                <input type="checkbox" checked="checked">Remember me
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="forgotPassword.php">password?</a></span>
            </div>
        </form>
    </div>

     <div id="auNav" class="auTop">
        <img src="../images/cuImages/Customer.jpg" alt="avatar" class="auIcons">
        <img src="../images/cuImages/Careers.jpg" alt="avatar" class="auIcons">
        <img src="../images/cuImages/Sales.png" alt="avatar" class="auIcons">
        
        <p class="auP1">Providing 100%<br /> <b class="b"> Private</b> <br />Customer Support.</p>
        <p class="auP2">Dokan offers <br /> <b class="b">Careers</b> <br />in a multitude of areas.</p>
        <p class="auP3">With the best<br /> <b class="b">Sales Inquiry</b> <br />service.</p>
    </div>
    <div class="midSection">
        <div class="top">
            <img src="../images/cuImages/contact-us-hero.jpg" height="500" width="1580" />
            <h1 id="contactMain">Contact Us</h1>
            <p id="firstParg">Dokkan is here to provide you with more information, answer any questions you may have and create an effective solution for your instructional needs.</p>
            <a class="a" href="#formaya">&#9661;</a>
        </div>

    </div>

    <br />
    <br />
    <br />


    <form>
            <div class="subs" id="formaya">
                <label class="title">Please fill out this form and we will be in touch with lightening speed</label>
                <br />
                <br />
                <label class="lName"><b>Name</b></label>
                <br />
                <br />
                <input type="text" placeholder="Enter Name" name="name" class="eName" required>
                <br />
                <br />
                <label class="lMail"><b>E-Mail</b></label>
                <br />
                <input type="text" id="emailInput" placeholder="Enter Email" name="email" class="eMail" required>
                <br />

                <br />
                <label class="lOrder"><b>Order Number (If queried)</b></label>
                <br />
                <input type="text" placeholder="Enter Order Number" name="orderNum" class="eOrder" required>
                <br />
                <br />
                <label class="lSubject"><b>Subject</b></label>
                <br />
                <select class="dropdownc">
                    <option>--None--</option>
                    <option>Check Order Status</option>
                    <option>Cancel Order</option>
                    <option>Return Order</option>
                    <option>Others</option>
                </select>
                <br />
                <label class="lDesc"><b>Your Problem</b></label>
                <textarea class="tArea" placeholder="Description"></textarea>

                <br />
                <button type="submit" name="subbtn" class="sButton ColorRed">Submit</button>
            </div>
    </form>
         <div id="auNav" class="auTop">
        <img src="../images/cuImages/Customer.jpg" alt="avatar" class="auIcons">
        <img src="../images/cuImages/Careers.jpg" alt="avatar" class="auIcons">
        <img src="../images/cuImages/Sales.png" alt="avatar" class="auIcons">
        
        <p class="auP1">Providing 100%<br /> <b class="b"> Private</b> <br />Customer Support.</p>
        <p class="auP2">Dokan offers <br /> <b class="b">Careers</b> <br />in a multitude of areas.</p>
        <p class="auP3">With the best<br /> <b class="b">Sales Inquiry</b> <br />service.</p>
    </div>



    <footer style="margin-top:1245px;">
            <div class="botnav" id="mybotnav">
                <p>Let Us Help You</p>
                <ul>
                    <li><a href="contactus.html">Contact Us</a></li>
                    <li><a href="contactus.html">Your Account</a></li>
                    <li><a href=HelpCenter.html>Help Center</a></li>
                    <li><a href=HowtoShoponDokan.html>How to Shop on Dokan</a></li>
                    <li><a href=return.html>Return policy</a></li>
                    <li id="corp">&#169 2017 Dokan.com</li>
                </ul>
                <div id="x">
                    In Partnership With:


                </div>
                <div class="pnav" id="mynav">
                    <p>Make money with us</p>
                    <ul>
                        <li><a href=BecomeanAffiliatePartner.html>Become an Affiliate Partner</a></li>
                        <li><a href="adminAddProduct.php">Sell a product</a></li>
                    </ul>
                </div>
                <div class="onav" id="myonav">
                    <p>GET TO KNOW US</p>

                    <ul>
                        <li><a href="contactus.html">About Us</a></li>
                        <li><a href="contactus.html">Careers</a></li>
                        <li><a href="contactus.html">Privacy Policy</a></li>
                        <li><a href="contactus.html">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="socialnav" id="mysocialnav">
                    <p>Follow us on</p>
                    <a href=facebook.com><img src="../images/footerImgs/index.png" alt="Facebook.com/dokan" height="40" width="40"></a>
                    <a href=twitter.com><img src="../images/footerImgs/iindex.png" alt="twitter.com/dokan" height="35" width="35"></a>
                    <a href=facebook.com><img src="../images/footerImgs/iiindex.png" alt="Facebook.com/dokan" height="40" width="40"></a>
                    <a href=facebook.com><img src="../images/footerImgs/iiiindex.png" alt="Facebook.com/dokan" height="40" width="40"></a>
                    <a href=facebook.com><img src="../images/footerImgs/iiiiindex.png" alt="Facebook.com/dokan" height="40" width="40"></a>
                    <p id="contact">Payment methods</p>
                    <a href=facebook.com><img src="../images/footerImgs/iiiiiindex.png" alt="Facebook.com/dokan" height="40" width="40"></a>
                    <a href=facebook.com><img src="../images/footerImgs/iiiiiiindex.png" alt="Facebook.com/dokan" height="40" width="40"></a>
                    <a href=facebook.com><img src="../images/footerImgs/iiiiiiii.jpg" alt="Facebook.com/dokan" height="40" width="45"></a>

                    <p id="contact">Contact Us On</p>
                    <aside id="white">19648</aside>

                </div>

                <a href=facebook.com id="doksh"><img src="../images/footerImgs/miu-logo.jpg" alt="miu-logo.jpg" height="37" width="37"></a>
            </div>
        </footer>


    
    <script src="../js/cookie.js"></script>
    <script src="../js/JavaScript.js"></script> 
    <script src="../js/Owl%20Carousel/jquery-3.2.1.min.js"></script>
    <script src="../js/Owl Carousel/owl.carousel.min.js"></script>
</body>
</html>