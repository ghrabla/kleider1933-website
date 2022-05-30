<template>
 
  <div class="details-all">
    <!-- <div class="image"> -->
    <img v-bind:src="'../img/'+product.image" alt="" class="image" />
    <!-- </div> -->
    <!-- <img  v-bind:src="'../img/'+product.image" alt=""> -->
   <div class="details-info-all">
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
    
    <div class="details-two">
      <div>
        <span> title: </span>
      <div >{{product.title}}</div>
     <div class="reviews">
        <span> reviews: </span>
       <img src="../assets/image/revstars-removebg-preview.png" alt="" style="    width: 75%;
    height: 10vh;" />
        </div>
     
     </div>
     <div>
        <span> Quantity: </span>
       <div class="">
    <button
      class=""
      @click="increment">
      +
    </button>
    <div style="    font-weight: bold;
    font-size: 23px;" >{{ number }}</div>
    <button
      class=""
      @click="decrement">
      -
    </button>
     </div>
  </div>
      
    </div>
   </div>
  </div>

  
<div class="close-div-update" v-if="showModal"  @click="showModal=false;"></div>
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
    <button @click="addorder()" >send</button>
  </div>

</template>

<script>
import Cookies from 'vue-cookies';

export default {
  data() {
    return {
      number : 1,
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
    increment() {
      this.number++;
    },
    decrement() {
      this.number--;
      if(this.number<1){
        this.number++;
      }
    },
     
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
            if(this.order.city !== '' && this.order.fullame !== ''){
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
                    productId : this.product.id,
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

<style scoped>
.close-div-update{
  width: 100%;
    height: 100vh;
    background-color: #1b1b1b42;
    position: fixed;
    top: 0%;
    z-index: 88;
    cursor: pointer;
}
.reviews{
      margin-top: 40px;
}
/* .details-two div,img{
  margin-top: 10px;
} */
.details-two{
  display: flex;
    flex-direction: column;
    gap: 8%;
}
.details-two span{
  font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase;
}
.details-info-all{
  display: flex;
  justify-content:flex-start;
  border: 1px solid rgb(47, 46, 46);
  padding: 30px 73px;
  flex-grow: 2;
  border-bottom-right-radius: 22px;
  border-top-right-radius: 22px;
}
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
cursor: pointer;
}
.details-two button{
  display: block;
    padding: 10px 15px;
    background-color: black;
    color: white;
    margin-top: 15px;
    margin-left: 40%;
    text-align: center;
    border-radius: 50%;
    font-weight: bold;

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
    transition: all 1s ease;
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
      width: 30%;
    background-color: #e5e5e5;
    padding: 54px 59px 0px 28px;
    border-bottom-left-radius: 22px;
    border-top-left-radius: 22px;
}
.details-all {
  display: flex;
  justify-content: space-around;
  margin: 60px 30px 100px 30px;
  /* flex-wrap: wrap; */
  font-family: "lato", sans-serif;
  
}
.details-info {
  display: flex;
  flex-direction: column;
  gap: 2%;
  width: 100%;
  
}
.details-info span {
  font-weight: bold;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.base {
  /* font-size: 18px;
  font-weight: bold; */
    color: rgb(27, 54, 15);
    font-size: 20px;
    font-weight: bold;
    line-height: 24px;
    font-family: fantasy;
    letter-spacing: 2px;
}
.add {
  text-decoration: none;
  color: black;
  background-color: white;
  padding: 10px 49px;
  border: 1px solid black;
  border-radius: 10px;
  font-weight: bold;
}
.command {
  text-decoration: none;
  color: white;
  background-color: black;
  padding: 10px 45px;
  border-radius: 10px;
  font-weight: bold;
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
    width: 75%;
        border-bottom-left-radius: 0px;
    border-top-left-radius: 0px;
  }
  .details-info-all{
    border-radius: 0px;
    flex-direction: column-reverse;
    padding: 10%;
  }
  .add,.command{
    padding: 10px 18px;
    margin-bottom: 10px;
  }
}
</style>
