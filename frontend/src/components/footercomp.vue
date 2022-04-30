<template>
 <footer>
   
    <div class="footer">
        <div class = "footer-logo">
            <img src="../assets/logo.svg" alt=""  >
        </div>
      
        <div class="footer-links">
            <div class ="services">
                <h2>Services</h2>
                <a href=""><p>Our news</p></a>
                <a href=""><p>About us</p></a>
               <a href=""><p>Routine check-ups</p></a>
               <a href=""> <p>Surgeries</p></a>
               </div>
               <div class ="services">
                <h2>Support</h2>
               <a href=""> <p >Find a product</p></a>
               <a href=""> <p>Make an meet</p></a>
                <a href=""><p>FAQ</p></a>
                <a href=""><p>Terms of use</p></a>
               </div>
        </div>
    
       <div class="social-network">
           <span>+212 6 00 00 00 00</span>
           <h2>kamalghrabla@gmail.com</h2>
           <div class="social-network-a">
            <a href=""><i class="fa-brands fa-facebook fa-lg"></i></a>
            <a href=""><i class="fa-brands fa-twitter fa-lg"></i></a>
            <a href=""><i class="fa-brands fa-instagram fa-lg"></i></a>
           </div>
       </div>
    </div>
<br>
   <p class="footer-p">kleider1933 © 2022 kamalghrabla Ltd All rights reserved.</p>
  </footer>
</template>
<style>


.footer{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding-top: 50px;
    padding-bottom: 10px;
    font-family: 'lato', sans-serif;

}
.footer-links{
    display: flex;
    gap: 50px;
    padding-right: 25%;
}

.services > p{
    /* font-size: 13px; */
    padding: 4px;
}
.services > h2{
    font-size: 17px;
    padding-left: 6px;
}
.footer-logo > img{
  margin-top: 2px;
}

.footer-p{
    text-align: center;
    margin-bottom: 10px;
    font-weight: bold;
    font-family: 'lato', sans-serif;
}
.social-network span{
    color: black;
    font-weight: bold;
    font-size: 15px;
    
}
.social-network-a{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top: 12px;
    
}
.social-network-a a i{
    color: black;
}
.social-network> h2{
    font-size: 15px;
    margin-top: 5px;
}
.services a{
    text-decoration: none;
    margin-top: 10px;
}
.services a p{
    margin-top: 10px;
}
@media screen and (max-width: 768px) {
  .footer-links{
      padding: 8%;
  }
}
</style>