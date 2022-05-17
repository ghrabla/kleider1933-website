<template>
 
  <div class="details-all">
    <!-- <div class="image"> -->
    <img v-bind:src="'../img/'+product.image" alt="" class="image" />
    <!-- </div> -->
    <!-- <img  v-bind:src="'../img/'+product.image" alt=""> -->
    <div class="details-info">
      <span> name: </span>
      <div class="base">{{product.name}}</div>
      <span> price: </span>
      <div class="base">{{product.price}}$</div>
      <span> gender: </span>
      <div class="base">{{product.gender}}</div>
      <span> type: </span>
      <div class="base">{{ product.type }}</div>
      <div class="add-div">
        <a href="#" class="add" @click="addshopcart()"
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
    <input type="hidden" placeholder="Full name" class="input-pop" v-model="product.name">
    <input type="hidden" placeholder="Full name" class="input-pop" v-model="product.price">
    <input type="hidden" placeholder="Full name" class="input-pop" v-model="product.title">
    <input type="hidden" placeholder="Full name" class="input-pop" v-model="product.gender">
    <input type="hidden" placeholder="Full name" class="input-pop" v-model="product.type">
    <input type="hidden" placeholder="Full name" class="input-pop" v-model="product.image">
    <label for="">Full name*</label>
    <input type="text" placeholder="Full name" class="input-pop" v-model="order.fullname">
     <label for="">Phone number*</label>
    <input type="text" placeholder="Phone number" class="input-pop" v-model="order.phone">
     <label for="">Email*</label>
    <input type="text" placeholder="Email" class="input-pop" v-model="order.email">
     <label for="">City*</label>
    <input type="text" placeholder="City" class="input-pop" v-model="order.city">
     <label for="">Adresse*</label>
    <input type="text" placeholder="Adresse" class="input-pop" v-model="order.adresse">
     <label for="">Postale code*</label>
    <input type="text" placeholder="Postale code" class="input-pop" v-model="order.postale">
    <button @click="addorder()">send</button>
  </div>

</template>

<script>
import Cookies from 'vue-cookies';

export default {
  data() {
    return {
      showModal: false,
       products : [],
       product : {id : '',name : '',price : '',title : '',gender : '',type : '',image : ''},
       orders:[],
       order : {id : '',fullname : '',phone : '',email : '',city : '',adresse : '',postale : ''}
    };
  },
  created(){
   this.getproduct(Cookies.get('id'));

  },
  methods: {
     
    sweetalertpanier() {
     Swal.fire('Saved!', '', 'success')
    },
    getproduct(id) {
            axios.post('http://localhost/kleider1933-website/backend/API/products/read_single.php?id='+
           id)
                .then(response => {
                    this.product = response.data;
                })
                .catch(err => console.log(err));
        },
   
  
   addorder(){
            if(this.product.name !== '' && this.product.price !== ''){
                axios.post('http://localhost/kleider1933-website/backend/API/orders/create.php',{
                    name : this.product.name,
                    price : this.product.price,
                    title : this.product.title,
                    gender : this.product.gender,
                    type : this.product.type,
                    image : this.product.image,
                    fullname : this.order.fullname,
                    phone : this.order.phone,
                    email : this.order.email,
                    city : this.order.city,
                    adresse : this.order.adresse,
                    postale : this.order.postale,
                    
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
        addshopcart(){
            if(this.product.name !== '' && this.product.price !== ''){
                axios.post('http://localhost/kleider1933-website/backend/API/shopcart/create.php',{
                    name : this.product.name,
                    price : this.product.price,
                    title : this.product.title,
                    gender : this.product.gender,
                    type : this.product.type,
                    image : this.product.image,
                    userId : Cookies.get('userId')
                    
                })
                .then(response => {
                    Swal.fire('Saved!', '', 'success').then(() => {
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
