<template>
  <nav class="navbar">
    <div>
      <a class="navbar-brand" href="#"
        ><i class="fas fa-home mr-2"></i> Dashboard</a>
    </div>
    <div>
      <a class="nav-link" href="#"
        ><i class="fas fa-users mr-2"></i> Users list</a>

      <a class="nav-link" href="#"
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

  <div class="popup-all"  
        v-if="showModal" >
    <h2>Add product <a href="#"  v-if="showModal=true" @click="showModal=false;"><i class="fa fa-times" aria-hidden="true" style="float: right;"></i></a></h2>

    <label for="">Name*</label>
    <input type="text" placeholder="product name" class="input-pop">
     <label for="">Title*</label>
    <input type="text" placeholder="product Title" class="input-pop">
     <label for="">Description*</label>
    <input type="text" placeholder="product Description" class="input-pop">
     <label for="">Type*</label>
    <input type="text" placeholder="product Type" class="input-pop">
     <label for="">Price*</label>
    <input type="text" placeholder="product Price" class="input-pop">
     <label for="">image*</label>
    <input type="file" placeholder="product name" class="image">
    <button>valide</button>
  </div>

</template>

<script>
export default {
  data() {
    return {
      showModal: false,
    };
  },
  methods: {},
};
</script>

<style>
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
