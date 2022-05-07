<template>
  <nav class="navbar">
    <div>
      <a class="navbar-brand" href="#"
        ><i class="fas fa-home mr-2"></i> Dashboard</a>
    </div>
    <div>
      <a class="nav-link" href="#"
        ><i class="fas fa-users mr-2"></i> Users list</a>

      <a class="nav-link" href="#" @click="showModaladm=true;"
        ><i class="fas fa-user-plus mr-2"></i> Add admin</a>

      <a class="nav-link" href="#" @click="showModal=true;"
        ><i class="fab fa-500px mr-2"></i> Add product
        </a>

      <a class="nav-link" href="#"
        ><i class="fa fa-first-order"></i> Orders</a>
      <a class="nav-link" href="#"
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
    <input type="text" placeholder="product Type" class="input-pop" v-model="product.type">
     <label for="">image*</label>
    <input type="text" placeholder="product name" class="image" v-model="product.image">
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
export default {
  data() {
    return {
      showModal: false,
      showModaladm :false,
      admins : [],
      admin : {id:'',fullname : '',email : '',password : ''},
       products : [],
       product : {id : '',name : '',price : '',title : '',gender : '',type : '',image : '',},
    };
  },
   created() {
        this.getproducts();
        // this.getadmins();
    },
  methods: {
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
                    image : this.product.image
                    
                })
                .then(response => {
                    Swal.fire(
                        'Added !',
                        'success'
                    ).then(() => {
                        this.getproducts();
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
  },
};
</script>

<style>

.close-div{
  width: 100%;
    height: 200vh;
    background-color: #1b1b1b42;
    position: fixed;
    z-index: 88;
}
select{
  padding: 10px;
    margin-bottom: 10px;
    color: white;
    background-color: black;
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
</style>
