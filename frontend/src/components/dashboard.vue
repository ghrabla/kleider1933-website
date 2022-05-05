<template>
<div class="search-profile">
 <div>
    <i class="fa fa-search" aria-hidden="true" style="position: absolute;
    left: 50px;
    top: 140px;
    color: white;"></i>
  <input type="text" placeholder="search items..." class="search">
 </div>
 <div class="profile">
<!-- <i class="fa fa-envelope fa-2x" aria-hidden="true" style="color: aquamarine;"></i> -->
   <img src="../assets/kamal.svg" alt="">
   <span style="font-weight: bold;">Kamal Rhrabla</span>
 </div>
  
</div>
<div class="statistic">
   <div  class="sta-box">
     <div class="sta-img"><i class="fa fa-bookmark-o fa-2x" aria-hidden="true" style="color: orange;"></i></div>
     <div class="sta-content">
       <div class="sta-text">product items</div>
       <div class="sta-number">{{ products.length }}</div>
     </div>
   </div>
   <div class="sta-box">
     <div class="sta-img"><i class="fa fa-picture-o fa-2x" aria-hidden="true" style="color:#00d4ff;"></i></div>
     <div class="sta-content">
       <div class="sta-text">order items</div>
       <div class="sta-number"> 34664$</div>
     </div>
   </div>
   <div class="sta-box">
     <div class="sta-img"><i class="fa fa-user fa-2x" aria-hidden="true" style="color: #8610e8;"></i></div>
     <div class="sta-content">
       <div class="sta-text">site users</div>
       <div class="sta-number"> 34664$</div>
     </div>
   </div>
   <div class="sta-box">
     <div class="sta-img"><i class="fa fa-star fa-2x" aria-hidden="true" style="color: green;"></i></div>
     <div class="sta-content">
       <div class="sta-text">month items</div>
       <div class="sta-number"> 34664$</div>
     </div>
   </div>
</div>
  <div class="container1">
  <h2>products Table</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1"><i class="fa fa-snowflake-o" aria-hidden="true"></i> Name</div>
      <div class="col col-3"><i class="fa fa-usd" aria-hidden="true"></i> Price</div>
      <div class="col col-4"><i class="fa fa-audio-description" aria-hidden="true"></i> Title</div>
      <div class="col col-5"><i class="fa fa-product-hunt" aria-hidden="true"></i> Gender</div>
      <div class="col col-6"><i class="fa fa-keyboard-o" aria-hidden="true"></i> Type</div>
      <div class="col col-7"><i class="fa fa-image" aria-hidden="true"></i> Image</div>
      <div class="col col-8"><i class="fa fa-cog fa-spin fa-fw"></i> Action</div>
    </li>
    
     <li  class="table-row" v-for="product in products" :key="product.id" >
      <div style="display: flex;width: 100%;align-items: center;">
        <div  class="col col-1" data-label="First name">{{product.name}}</div>
        <div  class="col col-1" data-label="First name">{{product.price}}</div>
        <div  class="col col-1" data-label="First name">{{product.title}}</div>
        <div  class="col col-1" data-label="First name">{{product.gender}}</div>
        <div  class="col col-1" data-label="First name">{{product.type}}</div>
        <div  class="col col-1" data-label="First name">{{product.image}}</div>
        <div class="col col-8 action-icon" data-label="Action">
         <a href="javascript:void(0)" @click="getproduct(product.id)"> <i  class="fa-solid fa-pen" @click="showModal=true;" ></i></a>
         <a href="javascript:void(0)" > <i  class="fa-solid fa-trash-can" @click="deleteproduct(product.id)" ></i></a>
         <a href="javascript:void(0)"><i class="fa-solid fa-info"></i></a>
        </div>
      </div>
    </li>
  </ul>
</div>


  <div class="popup-all" v-if="showModal" >
    <h2>update product <a href="javascript:void(0)"  v-if="showModal=true" @click="showModal=false;"><i class="fa fa-times" aria-hidden="true" style="float: right;"></i></a></h2>
    <label for="">Name*</label>
    <input type="text" placeholder="product name" class="input-pop" v-model="product.name">
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
     <label for="">Price*</label>
    <input type="text" placeholder="product Price" class="input-pop" v-model="product.price">
     <label for="">image*</label>
    <input type="text" placeholder="product name" class="image" v-model="product.image">
    <button @click="updateproduct()">valide</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showModal: false,
       products : [],
       product : {id : '',name : '',price : '',title : '',gender : '',type : '',image : ''},
    };
  },
  created() {
        this.getproducts();
    },
    methods: {
      
        getproducts(){
            axios.get('http://localhost/kleider1933-website/backend/API/products/read.php')
                .then(response => this.products = response.data)
                .catch(err => console.log(err));
        },
        deleteproduct(id){
            Swal.fire({
                title: 'Are you sure ?',
                text: "You are going to delete this product",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'black',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText : 'Cancel'
            }).then((result) => {
                if (result.value) {
                    axios.delete('http://localhost/kleider1933-website/backend/API/products/delete.php?id=' + id)
                        .then(response => {
                            Swal.fire(
                                'Deleted !',
                                'success'
                            ).then(() => {
                                this.products = this.products.filter(product => {
                                    return product.id !== id;
                                })
                            })
                        })
                        .catch(err => console.log(err));
                }
            })
        },
         updateproduct() {
            axios.put('http://localhost/kleider1933-website/backend/API/products/update.php', {
              
                 id : this.product.id,
                 name : this.product.name,
                 price : this.product.price,
                 title : this.product.title,
                 gender : this.product.gender,
                 type : this.product.type,
                 image : this.product.image
            })
                .then(response => {
                    Swal.fire(
                        'Updated !',
                        'success'
                    ).then(() => {
                        this.getproducts();
                    })
                })
                .catch(err => console.log(err));
        },
        getproduct(id) {
            axios.post('http://localhost/kleider1933-website/backend/API/products/read_single.php?id=' + id)
                .then(response => {
                    this.product = response.data;
                })
                .catch(err => console.log(err));
        },
        clearFields(){
            this.product = {id : '',name : '',price : '',title : '',gender : '',type : '',image : ''};
        }
}
};
</script>


<style>
select{
  padding: 10px;
    margin-bottom: 10px;
    color: white;
    background-color: black;
}
body{
  font-family: "lato", sans-serif;
}
.table-row a{
  color: black;
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

.search-profile{
      display: flex;
    justify-content: space-between;
    margin: 20px;
    font-family: sans-serif;
}
.profile {
  display: flex;
  gap: 10px;
  margin-top: 10px;
}
.profile span{
  margin-top: 15px;
}
.search::placeholder{
  color:white;
}
.search{
  padding: 20px 40px;
    border-radius: 10px;
    color: white;
    border: solid 1px;
    border-color: #b1b1b1;
    margin-top: 10px;
    padding: 12px 81px;
    background-color: #26272e;
}
.sta-img{
  padding: 9px 17px;
    background-color: #26272e;
    border-radius: 10px;
   box-shadow: rgb(149 157 165 / 40%) 0px 8px 24px;
}


.sta-text{
      color: #d3cccc;
}
.sta-number{
  color: white;
  font-weight: bold;
  font-size: 20px;
  margin-top: 5px;
}
.statistic{
  display: flex;
  justify-content: space-around;
  margin: 4%;
  font-family: sans-serif;
}
.sta-box{
  display: flex;
    gap: 10px;
    padding: 15px 20px;
    background: black;
    border-radius: 10px;
}
  .container1 {
  font-family: 'lato', sans-serif;
}
.container1 {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
  
}

h2 {
  font-size: 20px;
  margin: 30px 0;
  text-align: center;
 
}
 small {
    font-size: 0.5em;
  }


  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    align-items: center;
   
  }
   .message{
      width: 100%;
      text-align: center;
      color: lawngreen;
    }
  .table-header {
    background-color: black;
    color: white;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.003em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
   
  }
  .action-icon{
    display: flex;
    justify-content: space-evenly;
  }
  .col-1 {
    flex-basis: 15%;
  }
  .col-2 {
    flex-basis: 15%;
  }
  .col-3 {
    flex-basis: 15%;
  }
  .col-4 {
    flex-basis: 18%;
  }
  .col-5 {
    flex-basis: 20%;
  }
  .col-6 {
    flex-basis: 19%;
  }
  .col-7 {
    flex-basis: 21%;
  }
  .col-8 {
    flex-basis: 15%;
  }
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
   
    li {
      display: block;
    }
    .col {
      
      flex-basis: 100%;
      
    }
   
  }

</style>
