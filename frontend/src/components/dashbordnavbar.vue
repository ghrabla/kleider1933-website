<template>
  <nav class="navbar">
    <div>
      <a class="navbar-brand" href="http://localhost:8080/"
        ><i class="fas fa-home mr-2"></i> Dashboard</a>
    </div>
    <div @click="showmenu()" class="burger">
      <i class="fas fa-bars" style="color: white;"></i>
    </div>
    <div class="navbar-menu" :class="this.show ? 'open-menu' : 'closed-menu'">
    <router-link to="/usersdashboard">
      <a class="nav-link" href="#"
        ><i class="fas fa-users mr-2"></i> Users list</a>
      </router-link>
      <a class="nav-link" href="#" @click="showModaladm=true;"
        ><i class="fas fa-user-plus mr-2"></i> Add admin</a>

      <a class="nav-link" href="#" @click="showModal=true;"
        ><i class="fab fa-500px mr-2"></i> Add product
        </a>
<router-link to="/ordersdashboard">
      <a class="nav-link" href="#"
        ><i class="fa fa-first-order"></i> Orders</a></router-link>
        <router-link to="/productdashboard">
      <a class="nav-link" href="#"
        ><i class="fa fa-product-hunt"></i> products</a></router-link>
      <a class="nav-link" href="javascript:void(0)" @click="logout()"
        ><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
    </div>
  </nav>
<div class="close-div" v-if="showModal"  @click="showModal=false;"></div>
  <div class="popup-all" v-if="showModal" >
    <h2>Add product <a href="#"  v-if="showModal=true" @click="showModal=false;"><i class="fa fa-times" aria-hidden="true" style="float: right;"></i></a></h2>
    <label for="">Name*</label>
    <input type="text" placeholder="product name" class="input-pop" v-model="product.name">
     <label for="">Price*</label>
    <input type="text" placeholder="product Price" class="input-pop" v-model="product.price">
      <label for="">quantity*</label>
    <input type="text" placeholder="product quantity" class="input-pop" v-model="product.quantity"/>
     <label for="">Title*</label>
    <input type="text" placeholder="product Title" class="input-pop" v-model="product.title">
    <label for="">Gender*</label>
  <select name="gender" id="gender" v-model="product.gender">
  <option value="" selected disabled>Please select a gender</option>
  <option value="man">man</option>
  <option value="woman">woman</option>
  <option value="kid">kid</option>
</select>
     <label for="">Type*</label>
    <select name="type" id="type" v-model="product.type">
      <option value="" selected disabled>Please select a type</option>
      <option value="blazzer">blazzer</option>
      <option value="watch">watch</option>
      <option value="shoes">shoes</option>
      <option value="t-shirt">t-shirt</option>
      <option value="cap">cap</option>
    </select>
     <label for="">image*</label>
    <input type="file" @change="onFileChanged" class="image" >
    <button @click="addproduct()">valide</button>
  </div>


  
<div class="close-div" v-if="showModaladm"  @click="showModaladm=false;"></div>
  <div class="popup-all" v-if="showModaladm" >
    <h2>Add admin <a href="#"  v-if="showModaladm=true" @click="showModaladm=false;"><i class="fa fa-times" aria-hidden="true" style="float: right;"></i></a></h2>
    <label for="">Fullame*</label>
    <input type="text" placeholder="admin fullname" class="input-pop" v-model="admin.fullname">
     <label for="">Email*</label>
    <input type="text" placeholder="admin email" class="input-pop" v-model="admin.email">
     <label for="">password*</label>
    <input type="text" placeholder="admin password" class="input-pop" v-model="admin.password">
    <button @click="addadmin()">valide</button>
  </div>




</template>

<script>
import router from '@/router';
import Cookies from 'vue-cookies';
 import axios from 'axios';
import Swal from 'sweetalert2';
export default {
  data() {
    return {
      show : false,
      showModal: false,
      showModaladm :false,
      admins : [],
      admin : {id:'',fullname : '',email : '',password : ''},
       products : [],
       product : {id : '',name : '',price : '',title : '',gender : '',type : '',image : '',quantity:''},
       selectedFile: null,
       image:''
    };
  },
   created() {
        this.getproducts();
        // this.addproduct();
        // this.getadmins();
    },
  methods: {
    showmenu(){this.show = !this.show},
logout(){
        // clearCookie('adminID');
        Cookies.remove('adminId');
        this.$router.push('/');
      },

     getproducts(){
            axios.get('http://localhost/kleider1933-website/backend/API/products/read.php')
                .then(response => this.products = response.data)
                .catch(err => console.log(err));
        },
     
         
     addadmin(){
            if(this.admin.fullname !== '' && this.admin.email !== '' && this.admin.password !== ''){
                axios.post('http://localhost/kleider1933-website/backend/API/admins/register.php',{
                    fullname : this.admin.fullname,
                    email : this.admin.email,
                    password : this.admin.password,
                    
                    
                })
                .then(response => {
                    Swal.fire(
                        'Added !',
                        'success'
                    )
                    
                })
                .catch(err => console.log(err));
            }else{
                Swal.fire({
                    title : 'Please fill all the fields !',
                    type : 'warning'
                }).then(() => {
                    $('#addadmin').modal('show')
                })
            }
        },
            addproduct(){
            if(this.product.name !== '' && this.product.price !== ''){
                axios.post('http://localhost/kleider1933-website/backend/API/products/create.php',{
                    name : this.product.name,
                    price : this.product.price,
                    title : this.product.title,
                    gender : this.product.gender,
                    type : this.product.type,
                    image : this.selectedFile.name,
                    quantity : this.product.quantity
                    
                })
                .then(response => {
                    Swal.fire(
                        'Added !',
                        'success'
                    ).then(() => {
                      // Cookies.remove("image");
                      this.$router.go('/productdashboard');
                       
                        // this.getproducts();
                    })
                })
                .catch(err => console.log(err));
            }else{
                Swal.fire({
                    title : 'Please fill all the fields !',
                    type : 'warning'
                }).then(() => {
                    $('#addproduct').modal('show')
                })
            }
        },
           onFileChanged (event) {
         
    this.selectedFile = event.target.files[0];
    Cookies.remove("image");
    Cookies.set("image",this.selectedFile.name);
    console.log(Cookies.get("image"))
    // console.log(this.selectedFile)
  },
  },
};
</script>

<style scoped>
router-link{
    text-decoration: none !important;
}

.burger{
  display: none;
}
.close-div{
  width: 100%;
    height: 100vh;
    background-color: #1b1b1b42;
    position: fixed;
    z-index: 88;
    top: 0%;
}
select{
  padding: 10px;
    margin-bottom: 10px;
    color: white;
    background-color: black;
    width:100%;
}
option{
  padding: 10px;
}
body{
  font-family: "lato", sans-serif;
}
button{
  display: block;
  padding: 15px 50px;
  background-color: black;
  color: white;
  margin-top: 15px;
  margin-left: 40%;
  text-align: center;
  border-radius: 10px;

}
.popup-all{
  font-family: sans-serif;
    position: absolute;
    top: 11%;
    right: 20%;
    z-index: 99;
    background-color: #E5E5E5;
    padding: 0px 35px 20px;
    border-radius: 10px;
}
.popup-all h2{
  font-size: 20px;
    text-align: center;
    padding: 20px;
}
.input-pop{
    padding: 15px 480px 15px 10px;
    border-radius: 10px;
    border: solid 1px;
    border-color: #b1b1b1;
    margin-bottom: 20px;
}
.image{
   padding: 15px 200px;
}
.popup-all label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}
.navbar {
  font-family: "lato", sans-serif;
  display: flex;
  justify-content: space-between;
  padding: 3%;
  background-color: black;
}
.nav-link,.navbar-brand{
    color: white;
    text-decoration: none;
}
.navbar-brand{
    font-size: large;
}
.nav-link{
    margin-right: 15px;
}
 @media screen and (max-width: 768px) {
   .burger{
     display: block;
   }
   .navbar-menu{
     display: flex;
    flex-direction: column;
    gap: 28px;
    position: absolute;
    right: 24%;
    background-color: black;
    padding: 20px 40px;
   }
   .open-menu {
    opacity: 1;
    /* height: 50vh; */
  }
  .closed-menu {
    opacity: 0;
    height: 0;
    padding: 0;
    display: none;
  }
    .popup-all{
   width:76%;
   right:4%;
  }
  .input-pop{
            padding: 5% 27% 5% 6%;
  }
  .image{
    padding: 20px 40px;
  }
  button{
   margin-left:28%;
 }
}
</style>
