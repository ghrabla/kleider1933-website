<template>
   <div class="login-all"> 
       <div class="login-text"><h2>login</h2></div>
   <div class="login-inputs">
       <label><b>email <i class="fa fa-envelope" ></i> :</b></label>
       <input type="text" placeholder="email" >
       <label><b> Password <i class="fa-solid fa-key"></i> :</b></label>
       <input type="text" placeholder="password " >
       <router-link to="/choicedash"><input type="submit" name="" id="" value="login" class="btn-login"></router-link>
   </div>
   <div><p>you don't have an account?</p>
   <h3><a href="">register</a></h3>
   </div>
   </div>

  
</template>



<style>
   label{
       text-align: center;
   }
   .login-text{
       text-align: center;
       margin-bottom: 5%;
   }
   .login-inputs{
       display: flex;
       flex-direction: column;
       gap: 20px;
   }
   .btn-login{
       background-color: black;
       color: white;
       margin: 0px 40%;
   }
   input{
       margin: 0px 30%;
   }
   .login-all{
       margin: 5%;
       background-color: #E5E5E5;
       padding: 4%;
       border-radius: 10px;
        box-shadow: 0px 2px 29px #9e9e9e;
   }
   @media screen and (max-width: 768px) {
       input,.btn-login{
           margin: 0%;
           margin-bottom: 9px;
       }
   }
</style>
