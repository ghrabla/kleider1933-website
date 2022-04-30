<template>
   <div class="register-all"> 
       <div class="register-text"><h2>register</h2></div>
   <div class="register-inputs">
       <label><b>username <i class="fa fa-user" ></i> :</b></label>
       <input type="text" placeholder="username" >
       <label><b>email <i class="fa fa-envelope" ></i> :</b></label>
       <input type="text" placeholder="email" >
       <label><b> Password <i class="fa-solid fa-key"></i> :</b></label>
       <input type="text" placeholder="password " >
       <input type="submit" name="" id="" value="register" class="btn-register">
   </div>
   <div><p>already have an account?</p>
   <h3><a href="">login</a></h3>
   </div>
   </div>

  
</template>



<style>
   label{
       text-align: center;
   }
   .register-text{
       text-align: center;
       margin-bottom: 5%;
   }
   .register-inputs{
       display: flex;
       flex-direction: column;
       gap: 20px;
   }
   .btn-register{
       background-color: black;
       color: white;
       margin: 0px 40%;
   }
   input{
       margin: 0px 30%;
   }
   .register-all{
       margin: 5%;
       background-color: #E5E5E5;
       padding: 4%;
       border-radius: 10px;
        box-shadow: 0px 2px 29px #9e9e9e;
   }
   @media screen and (max-width: 768px) {
       input,.btn-register{
           margin: 0%;
           margin-bottom: 9px;
       }
   }
</style>
