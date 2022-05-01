<template>
   <div class="all-choices">
       <div class="products">
         <router-link to="/productdashboard"> <img src="../assets/products.svg" alt="" class="pro"></router-link>
       </div>
       <div class="orders">
          <router-link to="/Ordersdashboard"><img src="../assets/orders.svg" alt="" class="ord"></router-link>
       </div>
   </div>

</template>

<style>
  
   .all-choices{
       margin-top: 5%;
       margin-bottom: 7px;
       display: flex;
       justify-content: space-evenly;
       margin-left: 13%;

   }
   .ord,.pro{
       width: 70%;
   }
   @media screen and (max-width: 768px) {
       .all-choices{
           flex-direction: column;
           gap: 20px;
       }
   }
</style>
