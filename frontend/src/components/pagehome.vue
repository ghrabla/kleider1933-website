<template>
  <div class="container-content">
    <div class="container-pics">
      <div>
        <router-link to="/kidproduct">
        <img src="../assets/kid.svg" alt="" />
        <a href="#"
          ><img src="../assets/kidtext.svg" alt="" class="text-links"
        /></a>
        </router-link>
      </div>
      <div>
        <router-link to="/womenproduct">
        <img src="../assets/women.svg" alt="" style="width: 87%" />
        <a href="#"
          ><img src="../assets/womentext.svg" alt="" class="text-links"
        /></a>
        </router-link>
      </div>
      <div>
        <router-link to="/productsshop">
        <img src="../assets/man.svg" alt="" style="width: 84%" />
        <a href="#"
          ><img src="../assets/mantext.svg" alt="" class="text-links"
        /></a>
        </router-link>
      </div>
    </div>
    <h2 class="text-choose">
      Chose from here the best product for men women and kids.
    </h2>
  </div>
  <br>
  <br>
  <div class="information-about">
    <div class="new-pro-why">
      <h2>
        NEW PRODUCTS <br />
        Do you know why <br />
        Kreide1933.com?
      </h2>
      <p class="new-k-p">
        Kreide1933.com an online platform in which you will find everything
        related to men,<br />
        women and children. Kreide1933.com provides the customer with a variety
        of needs that <br />
        increase their elegance at work or at home and facilitate their daily
        life. <br />
        Thanks to your trust, we are the best in the competition market. <br />
        Contact us, we'll take care of you!
      </p>
    </div>
    <div>
        <img src="../assets/cps.svg" alt="" style="width: 74%;">
        
    </div>
  </div>
   <section class="contact">
      

       <div> 
          <h2 class = "contactTitle">contact us</h2>
          <div class="input-div">
            <input type="text" placeholder="name">
            <input type="text" placeholder="phone">
          </div>
          <br>
         <div class="input-div">
            <input type="text" placeholder="email">
            <input type="text" placeholder="subjuct">
         </div>
         <br>
         <textarea name="" id="" cols="30" rows="10" placeholder="write message"></textarea>
         <br>
         <br>
         <a href="" class="contact-button">Send message</a>
       </div>

     </section>
</template>
<style >

.container-pics {
  display: flex;
  justify-content: space-evenly;
}
.container-content {
  background-color: #e5e5e5;
  margin: 50px;
  padding: 10px;
  border-radius: 5px;
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.text-choose {
  text-align: center;
  font-weight: bold;
  padding: 2%;
}
.text-links {
  margin-left: 23%;
}
.new-pro-why{
    padding-bottom: 2%;
    line-height: 36px;
}
.new-k-p{
line-height: 30px;
}
.information-about{
    margin: 2%;
    display: flex;
    justify-content: space-evenly;
}

.contact{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    background-color: #e5e5e5;
    margin: 50px;
    padding: 10px;
    border-radius: 5px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.contact img{
    float: left;
    width: 90%;
}
.contactTitle{
    font-size: 22px;
    text-align: center;
    padding-bottom: 20px;
}
input{
    padding: 20px 40px;
    border-radius: 10px;
    border: solid 1px;
    border-color: #b1b1b1;
}
.input-div{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    gap: 40px;
}
textarea{
    padding: 20px;
    width: 100%;
    height: 30%;
    border-radius: 10px;
    border: solid 1px;
    border-color: #9e9e9e;
}
.contact-button{
    background-color: black;
    text-decoration: none;
    color: white;
    padding: 10px 20px;
    border-radius: 10px;
}
@media screen and (max-width: 768px) {
  .new-k-p br {
    display: none ;
  }
    .container-pics{
        flex-direction: column-reverse;
    }
    .container-content{
      margin: 50px 0px;
    }
    .information-about{
        flex-direction: column;
        gap: 31px;
        text-align: center;
    }
    .contact{
        background: none;
            box-shadow: none;
    }
    textarea{
        width: 88%;
    }
}
  

</style>
