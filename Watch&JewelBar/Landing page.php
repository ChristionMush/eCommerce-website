<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch & Jewel Bar</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Jost:ital,wght@0,100..900;1,100..900&family=Nanum+Myeongjo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/7970bed18f.js" crossorigin="anonymous"></script>
    <style>
* {
    margin: 0;
    padding: 0;
    font-family: Montserrat, sans-serif;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    background: white;
    color: #ababab;
}

#header {
    width: 100%;
    height: 79vh;
    background-image: url(https://jackmasonbrand.com/cdn/shop/articles/Blog_DifferentWatchTypes_Hero_1512x741.jpg?v=1655315156);
    background-size: cover;
    background-position: center;
}

.container {
    padding: 10px 10%;
}

nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: white;
    height: 75px;
    padding: 0 20px;
}

nav .header-text {
    margin-top: 0;
    font-size: 30px;
    color: black; /* Changed to black for visibility against white background */
}

nav .header-text h1 {
    font-size: 24px; /* Adjusted for better alignment */
    margin: 0; /* Removed margin for alignment */
}

nav .header-text h1 span {
    color: #AB2B2B;
    font-family: "Great Vibes", cursive;
}

nav ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline-block;
    text-align: center;
    margin: 0 20px; /* Adjusted margin for spacing */
}

nav ul li a {
    color: #ababab;
    text-decoration: none;
    font-size: 18px;
    position: relative;
}

nav ul li a::after {
    content: '';
    width: 0;
    height: 3px;
    background: #AB2B2B;
    position: absolute;
    left: 0;
    bottom: -6px;
    transition: 0.5s;
}

nav ul li a:hover::after {
    width: 100%;
}


/*-----------------------------------------------About Us------------------------------------------------*/
#about{
    padding: 80px 0;
    color: #ababab;
}
.row {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
.about-col-1{
    flex-basis: 35%;
}
.about-col-1 img{
    width: 100%;
    border-radius: 15px;
}
.about-col-2{
    flex-basis: 60%;
}
.sub-title {
    font-size: 60px;
    font-weight: 600;
    color: #ababab;
}
.tab-titles {
    display: flex;
    margin: 20px 0 40px;
}
.tab-links {
    margin-right: 50px;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    position: relative;
}
.tab-links::after{
    content: '';
    width: 0;
    height: 3px;
    background: #AB2B2B;
    position: absolute;
    left: 0;
    bottom: -8px;
    transition: 0.5s;
}
.tab-links.active-link::after{
    width: 50%;
}
.tab-contents ul li{
    list-style: none;
    margin: 10px 0;
}
.tab-contents ul li span{
    color: #AB2B2B;
    font-size: 14px;
}
.tab-contents{
    display: none;
}
.tab-contents.active-tab{
    display: block;
}
.icon {
    width: 70px;
    height: 70px;
    object-fit: cover;
}
/*------------------------------------------------------Display types-------------------------------------*/
#Types{
    padding: 50px 0;
    text-align: center;
}
.type-list{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(50px,1fr));
    grid-gap: 40px;
    margin-top: 50px;
}
.type{
    border-radius: 10px;
    position: relative;
    overflow: hidden;
    height: 100%;
    width: 100%;
}
.type img{
    width: 100%;
    border-radius: 10px;
    display: block;
    transition: transform 0.5s;
}
.layer{
    width: 100%;
    height: 0;
    background: linear-gradient(rgba(0,0,0,0.6), #AB2B2B);
    border-radius: 10px;
    position: absolute;
    left: 0;
    bottom: 0;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0  0px;
    text-align: center;
    font-size: 14px;
    transition: 0.5s;
}
.layer h3{
    font-weight: 500;
    margin-bottom: 20px;
}
.layer a{
    margin-top: 20px;
    color: #AB2B2B;
    text-decoration: none;
    font-size: 18px;
    line-height: 60px;
    background: #fff;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    text-align: center;
}
.type:hover img{
    transform: scale(1.1);
}
.type:hover .layer{
    height: 100%;
}
.btn{
    display: block;
    margin: 50px auto;
    width: fit-content;
    border: 1px solid #AB2B2B;
    padding: 14px 50px;
    border-radius: 6px;
    text-decoration: none;
    color: #fff;
    transition: background 0.5s;
}
.btn:hover{
    background: #AB2B2B;
}
/*---------------------------------------------------Brands-------------------------------------------------------------*/
.div{
    display: block;
}
#Brands {
    text-align: center;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

.sub-title {
    font-size: 2rem;
    margin-bottom: 20px;
}

.brands-list {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 5px;
}

.brand-tile {
    position: relative;
    width: 200px;
    height: 200px;
    margin: 10px;
    overflow: hidden;
}

.brand-tile img {
    width: 150px;
    height: 150px;
    object-fit: cover;
}

.brand-tile a {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    text-decoration: none;
    background: rgba(0, 0, 0, 0);
}
/*---------------------------------------------------Contact Section----------------------------------------*/
.contact-left{
    flex-basis: 35%;
}
.contact-right{
    flex-basis: 60%;
}
.contact-left p{
    margin-top: 30px;
}
.contact-left p i{
    color: #AB2B2B;
    margin-right: 15px;
    font-size: 25px;
}

.btn.btn2{
    display: inline-block;
    background: #AB2B2B;
}
.contact-right form{
    width: 100%;
}
form input, form textarea{
    width: 100%;
    border: 0;
    outline: none;
    background: #ababab;
    padding: 15px;
    margin: 15px 0;
    color: black;
    font-size: 18px;
    border-radius: 5px;
}
form .btn2{
    padding: 14px 60px;
    font-size: 18px;
    margin-top: 20px;
    cursor: pointer;
}
.copyright{
    width: 100%;
    text-align: center;
    padding: 25px 0;
    background: #AB2B2B;
    font-weight: 300;
    margin-top: 20px;
}

    </style>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <div class="header-text">
                    <h1><span>Watch & Jewel Bar</span></h1>
                </div>
                <ul id="sidemenu">
                    <li><a href="#about">Repairs & Maintenance</a></li>
                    <li><a href="#Types">Collection</a></li>
                    <li><a href="#Brands">Brands</a></li>
                    <li><a href="#contact">Enquiries</a></li>
                    <li><a href="Login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </div>
<!--------------------------------------------------------about----------------------------------------------------->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="./Watchengineering.jpeg" >

                </div>
                <div class="about-col-2">
                    <h1 class="sub-title">Repairs & Mantainace</h1>
                    <p>At Watch & Jewel Bar  you will find skilled and friendly staff that are able to assist you with basic watch maintenance while you wait, such as replacing your watch strap and fitting a new battery (for the brands we carry in-store).
                        For more complex watch repairs and servicing, our staff will advise and assist you with booking in your watch to our certified Repair Centres.
                        You will be quoted upfront for any work that has to be carried out on your watch and will be kept advised of the progress of the repair at all times.</p>

                        <div class="tab-titles">
                            <p class="tab-links active-link" onclick="opentab(event, 'repair')">Repairs</p>
                            <p class="tab-links" onclick="opentab(event, 'maintenance')">Maintenance</p>
                        </div>
                        <div class="tab-contents active-tab" id="repair">
                            <ul>
                                <li><span><img class="icon" src="Strap.jpeg" alt=""></span><br>FIT OF WATCH STRAPS</li>
                                <li><span><img class="icon" src="Battery.jpeg" alt=""></span><br>BATTERY REPLACEMENTS</li>
                            </ul>
                        </div>
                        <div class="tab-contents" id="maintenance">
                            <ul>
                                <li><span><img class="icon" src="Glass repair.jpeg" alt=""></span><br>REFURBISHMENT</li>
                                <li><span><img class="icon" src="Repair.jpeg" alt=""></span><br>SERVICING</li>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>
<!-----------------------------------------------------------------Display Types----------------------------------->  

<div id="Types">
    <div class="container">
        <h1 class="sub-title">Watches in our Collection</h1>
        <div class="type-list">
            <div class="type">
                <img src="./Analog.jpeg">
                <div class="layer">
                    <h2>Analog Display</h2>
                    <p>This is the most traditional and common display type for watches—and timepieces in general. Pretty much every classroom in America has an analog clock on the wall…and pretty much every student in America has found themselves staring at the second hand at some point in their tenure. If the clock has hands that turn and point to numbers on a dial, that’s an analog display.</p>
                    <a href="Login.php"><i class="fa-solid fa-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="type">
                <img src="./Digital.jpeg">
                <div class="layer">
                    <h2>Digital Display</h2>
                    <p>Digital displays use an LCD screen to show the time. You’ll find digital displays on ovens, microwaves, coffee machines, and pretty much any appliance that includes a timekeeping feature. Digital watches are popular for their ability to instantly tell time without having to interpret the positioning of the hands on a watch’s face—people who have difficulty reading analog displays will probably prefer digital options.</p>
                    <a href="Login.php"><i class="fa-solid fa-up-right-from-square"></i></a>
                </div>
            </div>
            <div class="type">
                <img src="./Touchscreen.jpeg">
                <div class="layer">
                    <h2>Touch Display</h2>
                    <p>Since smartwatches offer multitudes of features and applications, there’s not enough room on the watch face to display everything at once—necessitating a touchscreen display. This feature makes it possible to switch screens and scroll through messages and articles.</p>
                    <a href="Login.php"><i class="fa-solid fa-up-right-from-square"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------------Brands-------------------------------------------->
<div id="Brands">
    <div class="container">
        <h1 class="sub-title">Featured Brands</h1>
        <div class="brands-list">
            <div class="brand-tile">
                <img src="Gshock.jpeg" alt="">
                <a href="Login.php"></a>
            </div>
            <div class="brand-tile">
                <img src="Rado.jpeg" alt="">
                <a href="Login.php"></a>
            </div>
            <div class="brand-tile">
                <img src="Casio.jpeg" alt="">
                <a href="Login.php"></a>
            </div>
            <div class="brand-tile">
                <img src="Tudor.jpeg" alt="">
                <a href="Login.php"></a>
            </div>
            <div class="brand-tile">
                <img src="Vacheron.jpeg" alt="">
                <a href="Login.php"></a>
            </div>
            <div class="brand-tile">
                <img src="Merable.jpeg" alt="">
                <a href="Login.php"></a>
            </div>
            <div class="brand-tile">
                <img src="Ny.jpeg" alt="">
                <a href="Login.php"></a>
            </div>
            <div class="brand-tile">
                <img src="Fauget.jpeg" alt="">
                <a href="Login.php"></a>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------Contacts-------------------------------------->
<div id="contact">
    <div class="container">
        <div class="row">
            <div class="contact-left">
                <h1 class="sub-title">Repairs Booking and Enquiry:</h1>
                <p><i class="fas fa-paper-plane"></i>:WatchandJewelBar@gmail.com</p>
                <p><i class="fas fa-phone-square-alt"></i>:082 683 4582</p>
                <p><i class="fa-solid fa-shop"></i>:Shop 1008 lower level Heathway center. Beyers Naude &, Castlehill Dr</p>
            </div>
            <div class="contact-right">
                <form name="submit-to-google-sheet">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <textarea name="Message" rows="6" placeholder="Your Message" ></textarea>
                    <button type="submit" class="btn btn2">Submit</button>
                </form>
                <span id="msg"></span>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>copyright © Christion Mushariwa.</p>
    </div>
</div>

<script>
    var tablinks = document.getElementsByClassName("tab-links");
    var tabcontents = document.getElementsByClassName("tab-contents");

    function opentab(event, tabname){
        for(let tablink of tablinks){
            tablink.classList.remove("active-link");
        }
        for(let tabcontent of tabcontents){
            tabcontent.classList.remove("active-tab");
        }
        event.currentTarget.classList.add("active-link");
        document.getElementById(tabname).classList.add("active-tab");
    }
</script>

<script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbxtzeUM_ZByFUFNyB_BncRJLbTfdQoUTRvYVeOUB0D3rT-pC0OxSANYdRShLAfO9ZXpgA/exec'
    const form = document.forms['submit-to-google-sheet']
    const msg = document.getElementById("msg")
  
    form.addEventListener('submit', e => {
      e.preventDefault()
      fetch(scriptURL, { method: 'POST', body: new FormData(form)})
        .then(response => {
            msg.innerHTML = "Message sent successfully"
            setTimeout(function(){
                msg.innerHTML = ""
            },5000)
            form.reset()
        })
        .catch(error => console.error('Error!', error.message))
    })
  </script>
</body>
</html>