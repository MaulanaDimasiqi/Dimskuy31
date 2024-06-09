<!DOCTYPE html>
<head>
    <title>My Website</title>
    <style>
      @import url(https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap);
    
          
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
        <li><a href="web.php">Home</a></li>
        <li><a href="Venue.php">Venue</a></li>
        <li><a href="photography.php">photography</a></li>
        <li><a href="catering.php">Catering</a></li>
        <li><a href="order.php">Order</a></li>
        <li><a href="booking.php">Booking</a></li>
        <img src="pro-pic.png" class="user-pic">
        <a href="logout.php">Logout</a>
      </ul>
    </nav>
  </header>
    <main>
      
      
      <img src= "home greeting poster2.jpg" alt="Home Greeting banner" class="banner">
      <div class="image-title-container">
        <img src="program foto.jpg" alt="Image">
        <h1 class="title">We Help Couple Make Their Splendour Wedding</h1>
      </div>
      <div class="text-container">
      <p>At Splendour's Organizer, we believe that every love story is beautiful, and every wedding should be as unique and special as the couple at its heart. Our dedicated team of professional wedding planners is here to take the stress out of your big day, ensuring that every detail is perfect, from the first kiss to the last dance.</p>
      <section>
  
        <a href="Vendor.html" class="image-button">
        <img src="photo buttton VN.jpg" alt="Button Image">
       </a>
        <a href="photography.php" class="image-button">
        <img src="photo buttton pg.jpg" alt="Button Image">
       </a>
        <a href="#" class="image-button">
        <img src="photo buttton ctr.png" alt="Button Image">
        </a>
        <a href="#" class="image-button">
          <img src="photo buttton dr.png" alt="Button Image">
          </a>
        <a href="WO - TENTANG KAMI.html" class="image-button">
        <img src="photo buttton AU.jpg" alt="Button Image">
        </a>
      </section>

      <script>
        const button = document.querySelector('#myButton');
        button.addEventListener('click', function() {
          alert('Button was clicked!');
        });
      </script>  
      </div>
    </a>
    </main>
</body>
</html>