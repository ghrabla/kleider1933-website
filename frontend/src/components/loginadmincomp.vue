<template>
   <div class="login-all"> 
       <div class="login-text"><h2>login admin</h2></div>
   <div class="login-inputs">
       <label><b>email <i class="fa fa-envelope" ></i> :</b></label>
       <input type="email" placeholder="email" v-model="email">
       <label><b> Password <i class="fa-solid fa-key"></i> :</b></label>
       <input type="password" placeholder="password " v-model="password" >
       <a  href="javascript:void(0)" class="btn-login" @click="login()" >login</a>
   </div>
   <!-- <div><p>you don't have an account?</p>
   <h3><a href="">register</a></h3>
   </div> -->
   </div>

  
</template>

<script>
import Cookies from 'vue-cookies';
 import axios from 'axios';
import Swal from 'sweetalert2';
export default{
 data(){
    return{
      checklogin : null,
      email: "",
      password: "",
      id:""
    }
  },
methods: {

    
    async login() {
    if (this.email != '' && this.password != '') {
      let respon = await axios.post('http://localhost/kleider1933-website/backend/API/admins/login.php', {
        email: this.email,
        password: this.password,
        id:""
      });
      console.log(respon);
      

        if (respon.data.answer === true) {
          Cookies.set('adminId',respon.data.id);
          Cookies.set('adminname',respon.data.fullname);
          console.log(Cookies.get('adminId'));
          console.log(Cookies.get('adminname'));
          this.$router.push('/productdashboard')
        // alert("User exist");

        } else{
        // alert("");
        Swal.fire({
                    title : 'admin does not exist !',
                    type : 'warning'
                })
        }
    } else {
      // alert('');
      Swal.fire({
                    title : 'Please enter your data !',
                    type : 'warning'
                })
    }
    },
}
};

</script>

<style scoped>
   label{
       /* text-align: center; */
       margin: 0px 30%;
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
    text-align: center;
    padding: 10px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: bold;
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
