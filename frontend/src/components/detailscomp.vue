<template>
 
  <div class="details-all">
    <!-- <div class="image"> -->
    <img src="../assets/image/so3.png" alt="" class="image" />
    <!-- </div> -->
    <div class="details-info">
      <span> name: </span>
      <div class="base">jordan-nike 23</div>
      <span> price: </span>
      <div class="base">133$</div>
      <span> version: </span>
      <div class="base">2022</div>
      <span> pointers: </span>
      <div class="base">23 21 55 77</div>
      <div class="add-div">
        <a href="#" class="add" @click="sweetalertpanier()"
          ><i class="fa fa-shopping-cart"></i> add to panier
        </a>
      </div>
      <div class="command-div">
        <a href="#" class="command" @click="showModal=true;"><i class="fa fa-check"></i> command now </a>
      </div>
    </div>
    <div>
      <img
        src="../assets/free.svg"
        alt=""
        style="width: 66%; margin-top: 17%"
      />
    </div>
  </div>

 <div class="popup-all"  
        v-if="showModal" >
    <h3 class="add-title">command now <a href="#"  v-if="showModal=true" @click="showModal=false;"><i class="fa fa-times" aria-hidden="true" style="float: right;"></i></a></h3>

    <label for="">Full name*</label>
    <input type="text" placeholder="Full name" class="input-pop">
     <label for="">Phone number*</label>
    <input type="text" placeholder="Phone number" class="input-pop">
     <label for="">Email*</label>
    <input type="text" placeholder="Email" class="input-pop">
     <label for="">City*</label>
    <input type="text" placeholder="City" class="input-pop">
     <label for="">Adresse*</label>
    <input type="text" placeholder="Adresse" class="input-pop">
     <label for="">Postale code*</label>
    <input type="text" placeholder="Postale code" class="input-pop">
    <button>send</button>
  </div>

</template>

<script>
export default {
  data() {
    return {
      showModal: false,
    };
  },
  methods: {
     
    sweetalertpanier() {
     Swal.fire('Saved!', '', 'success')
    },
   
  },
};
</script>

<style>
.add-title{
  text-align: center;
  padding: 17px;

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
.image-inp{
   padding: 15px 200px;
}
.popup-all label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

.image {
  width: 30%;
}
.details-all {
  display: flex;
  justify-content: space-between;
  margin: 60px 30px 100px 30px;
  /* flex-wrap: wrap; */
  font-family: "lato", sans-serif;
}
.details-info {
  display: flex;
  flex-direction: column;
  gap: 5%;
}
.details-info span {
  font-weight: bold;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.base {
  font-size: 20px;
  font-weight: bold;
  color: #DAA520;
  text-shadow: 1px 1px 2px black;
}
.add {
  text-decoration: none;
  color: white;
  background-color: #74d665;
  padding: 10px 49px;
  border-radius: 10px;
}
.command {
  text-decoration: none;
  color: white;
  background-color: black;
  padding: 10px 45px;
  border-radius: 10px;
}
.add-div,
.command-div {
  margin-top: 10%;
}
@media screen and (max-width: 768px) {
  .details-all {
    flex-direction: column;
    text-align: center;
  }
  .base {
    margin: 6% 0%;
  }
  .image {
    width: 100%;
  }
}
</style>
