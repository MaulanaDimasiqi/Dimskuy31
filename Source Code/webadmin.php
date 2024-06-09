<!DOCTYPE html>
<head>
    <title>Admin Home Page</title>
    <style>
      @font-face {
            font-family: font;
            src: url(Montserrat-VariableFont_wght.ttf);
      }
      
        header {
            font-family: font;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f2f2f2;
            padding: 1rem;
            
          }
        
          .logo {
            margin-top: 10px;
            margin-left: 20px;
            width: 175px;
            height: auto;
          }
          
          nav ul {
           
            font-size: 20px;
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
          }
          
          nav li {
            margin-right: 1.5rem;
          }
          
          nav a {
            text-decoration: none;
            color: #333;
          }

          nav ul li a:hover {
            color: black;
        }


          main
          {
            font-family: font;
          
          }

          section{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            margin-top: 50px;
            margin-bottom: 100px;
            gap: 10px;
          }
          .banner 
          {
           margin-top: 8px;
           width: 1500px;
           height: auto;
          }
          
          .image-title-container 
          {
          margin-top: 100px;
          margin-left: 300px;
          display: flex;
          align-items: left;
          }

          .image-title-container img 
          {
          display: flex;
          margin-right: 15px;
          width: 300px;
          height: auto;
          }

          .title 
          {
          display: block;
          margin-left: 20px;
          margin-right: 300px;
          }

          .text-container 
          {
          display: block;
          margin-left: 300px;
          margin-right: 300px;
          }

          .image-button 
          {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            text-decoration: none;
            opacity: 85%;
          }

          .image-button img 
          {
            vertical-align: middle;
            width: 300px;
            transition: 0.3s;
            height: flex;
          }
          
          .image-button img:hover 
          {
            transform: scale(1.1);
          }

          .user-pic
          {
            width: 40px;
            border-radius: 50%;
            cursor: pointer;
            margin-left: 30px;
          }
    </style>
</head>
<body>
  <header>
    <img src="logo no outline2.png" alt="logo" class="logo">
    <nav>
      <ul>
            <li><a href="webadmin.php">Home</a></li>
            <li><a href="venueadmin2.php">Venue</a></li>
            <li><a href="photographyadmin.php">photography</a></li>
            <li><a href="cateringadmin.php">Catering</a></li>
            <li><a href="dressadmin.php">Dress</a></li>
            <li><a href="muaadmin.php">Mua</a></li>
            <li><a href="orderadmin.php">Order</a></li>
            <img src="pro-pic.png" class="user-pic">
            <a href="logout.php">Logout</a>
      </ul>
    </nav>
  </header>
    <main>
      
      
      <img src= "admin.jpg" alt="Home Greeting banner" class="banner">
     
      
      </div>
    </a>
    </main>
</body>
</html>