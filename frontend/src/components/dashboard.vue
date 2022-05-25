<template>
<div class="search-profile">
 <div>
    <i class="fa fa-search" aria-hidden="true" style="position: absolute;
    left: 50px;
    top: 140px;
    color: white;"></i>
  <input type="text" placeholder="search items..." class="search" v-model="query" @keyup="fetchData()">
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
       <div class="sta-number"> {{ orders.length }}</div>
     </div>
   </div>
   <div class="sta-box">
     <div class="sta-img"><i class="fa fa-user fa-2x" aria-hidden="true" style="color: #8610e8;"></i></div>
     <div class="sta-content">
       <div class="sta-text">website users</div>
       <div class="sta-number"> {{ users.length }}</div>
     </div>
   </div>
   <div class="sta-box">
     <div class="sta-img"><i class="fa fa-star fa-2x" aria-hidden="true" style="color: green;"></i></div>
     <div class="sta-content">
       <div class="sta-text">store admins</div>
       <div class="sta-number">{{ admins.length }}</div>
     </div>
   </div>
</div>
  <div class="container1">
  <h2>products Table</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1"><i class="fa fa-snowflake-o" aria-hidden="true"></i> Name</div>
      <div class="col col-3"><i class="fa fa-usd" aria-hidden="true"></i> Price</div>
      <!-- <div class="col col-4"><i class="fa fa-audio-description" aria-hidden="true"></i> Title</div> -->
      <div class="col col-5"><i class="fa fa-product-hunt" aria-hidden="true"></i> Gender</div>
      <div class="col col-6"><i class="fa fa-keyboard-o" aria-hidden="true"></i> Type</div>
      <div class="col col-7"><i class="fa fa-image" aria-hidden="true"></i> Image</div>
      <div class="col col-8"><i class="fa fa-cog fa-spin fa-fw"></i> Action</div>
    </li>
    
     <li  class="table-row" v-for="product in displayedproducts" :key="product.id" >
      <div style="display: flex;width: 100%;align-items: center;">
        <div  class="col col-1" data-label="First name">{{product.name}}</div>
        <div  class="col col-1" data-label="First name">{{product.price}}</div>
        <!-- <div  class="col col-1" data-label="First name">{{product.title}}</div> -->
        <div  class="col col-1" data-label="First name">{{product.gender}}</div>
        <div  class="col col-1" data-label="First name">{{product.type}}</div>
        <div  class="col col-1" data-label="First name"><img  v-bind:src="'../img/'+product.image" alt="" class="img-pr"></div>
        <div class="col col-8 action-icon" data-label="Action">
         <a href="javascript:void(0)" @click="getproduct(product.id)"> <i  class="fa-solid fa-pen" @click="showModal=true;" ></i></a>
         <a href="javascript:void(0)" > <i  class="fa-solid fa-trash-can" @click="deleteproduct(product.id)" ></i></a>
         <a href="javascript:void(0)" @click="getproduct(product.id)"><i class="fa-solid fa-info" @click="showModaldet=true;"></i></a>
        </div>
      </div>
    </li>
    <div aria-label="Page navigation example">
                  <ul class="pagination">
                      <!-- <li class="page-item"> -->
                        <!-- </li> -->
                      <li class="page-item">
                          <a href="javascript:void(0)" class="page-link" v-if="page != 1" @click="page--"> Previous </a>
                          <a href="javascript:void(0)" class="page-link" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}} </a>
                          <a href="javascript:void(0)" @click="page++" v-if="page < pages.length" class="page-link"> Next </a>
                      </li>
                      <!-- <li class="page-item"> -->
                      <!-- </li> -->
                  </ul>
    </div>	
  </ul>
</div>

<div class="close-div-update" v-if="showModal"  @click="showModal=false;"></div>
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


  
<div class="close-div-update" v-if="showModaldet"  @click="showModaldet=false;"></div>
  <div class="popup-all" v-if="showModaldet" >
    <h2>product details <a href="javascript:void(0)"  v-if="showModaldet=true" @click="showModaldet=false;"><i class="fa fa-times" aria-hidden="true" style="float: right;"></i></a></h2>
    <label for="">Name*</label>
    <input type="text" placeholder="product name" class="input-pop" v-model="product.name" disabled>
     <label for="">Title*</label>
    <input type="text" placeholder="product Title" class="input-pop" v-model="product.title" disabled>
   
     <label for="">Type*</label>
    <input type="text" placeholder="product Type" class="input-pop" v-model="product.type" disabled>
     <label for="">Price*</label>
    <input type="text" placeholder="product Price" class="input-pop" v-model="product.price" disabled>
     <label for="">Gender*</label>
      <input type="text" placeholder="product Price" class="input-pop" v-model="product.gender" disabled>
     <label for="">image*</label>
     <img v-bind:src="'../img/'+product.image" alt="" class="img-det">
    <!-- <input type="text" placeholder="product name" class="image" v-model="product.image"> -->
    <!-- <button @click="updateproduct()">valide</button> -->
  </div>
</template>

<script>
import router from '@/router';



export default {
  data() {
    return {
      showModal: false,
      showModaldet: false,
       users : [],
       user : {id:'',fullname : '',email : '',password : ''},
       admins : [],
      admin : {id:'',fullname : '',email : '',password : ''},
       products : [],
       product : {id : '',name : '',price : '',title : '',gender : '',type : '',image : ''},
       orders : [],
       order : {},
       allData:'',
		query:'',
		nodata:false,
     page: 1,
              perPage: 5,
              pages: [],
    };
  },
  created() {
        this.getproducts();
        this.getorders();
        this.getadmins();
        this.getusers();
        this.fetchData();
    },
    methods: {
          setPages () {
              let numberOfPages = Math.ceil(this.products.length / this.perPage);
              for (let index = 1; index <= numberOfPages; index++) {
                  this.pages.push(index);
              }
          },
          paginate (products) {
              let page = this.page;
              let perPage = this.perPage;
              let from = (page * perPage) - perPage;
              let to = (page * perPage);
              return  products.slice(from, to);
          }
      	,fetchData(){
			axios.post('http://localhost/kleider1933-website/backend/API/products/search.php', {
				query:this.query
			}).then(function(response){
				if(response.data.length > 0)
				{
					application.allData = response.data;
					application.nodata = false;
				}
				else
				{
					application.allData = '';
					application.nodata = true;
				}
			});
		},
       getadmins(){
            axios.get('http://localhost/kleider1933-website/backend/API/admins/read.php')
                .then(response => this.admins = response.data)
                .catch(err => console.log(err));
        },
        getusers(){
            axios.get('http://localhost/kleider1933-website/backend/API/users/read.php')
                .then(response => this.users = response.data)
                .catch(err => console.log(err));
        },
        getproducts(){
            axios.get('http://localhost/kleider1933-website/backend/API/products/read.php')
                .then(response => this.products = response.data)
                .catch(err => console.log(err));
        },
         getorders(){
            axios.get('http://localhost/kleider1933-website/backend/API/orders/read.php')
                .then(response => this.orders = response.data)
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
},
  computed: {
          displayedproducts () {
              return this.paginate(this.products);
          }
      },
      watch: {
          products () {
              this.setPages();
          }
      },
      filters: {
          trimWords(value){
              return value.split(" ").splice(0,20).join(" ") + '...';
          }
      }

};
</script>


<style >
.page-item{
      border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    align-items: center;
}
.page-item a{
  color: black;
}
.img-pr{
  width: 43%;
  height: 7vh;
}

.img-det{
  width: 47%;
    height: 50vh;
}
.close-div-update{
  width: 100%;
    height: 100vh;
    background-color: #1b1b1b42;
    position: fixed;
    top: 0%;
    z-index: 88;
}
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
        margin-left: 10%;
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
    .statistic,.search-profile{
      flex-direction: column;
    gap: 10px;
    }

   
  }

</style>
