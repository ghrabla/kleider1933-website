<template>
  <div class="app" >
    <transition name="fade" appear>
      <div
        class="modal-overlay"
        v-if="showModal"
        @click="showModal = !showModal"
      ></div>
    </transition>
    <transition name="slide" appear>
      <div class="modal" v-if="showModal">
        <a href="#" class="button" @click="showModal = false">
          <i class="fa fa-window-close"></i>Close Modal
        </a>
        <h3 >products bascket</h3>

     <div v-if="checklogin || shopcarts.length==0">
          <div  v-for="shopcart in shopcarts" :key="shopcart.id"  class="mini-product"  >
          <img v-bind:src="'../img/'+shopcart.image" alt="">
          <div>
            <h3>{{ shopcart.name }}</h3>
            <span>{{ shopcart.gender }}</span>
            <p>{{ shopcart.price }}$</p>
          </div>
          <div>
            <i class="fa fa-window-close" style="color: red;" @click="deleteshopcart(shopcart.id)"></i>
          </div>
        </div>
        
        <!-- <div v-else-if="response.data[0].status == false" style="font-weight: bold; color: red; margin-top: 10%;">there is no carts</div> -->
      <div class="panier-btns"  >
          <div class="add-div">
          <a href="#" class="add" @click="sweetalertpanier()"
            ><i class="fa fa-calculator" ></i> {{ shopcarts.length * 75 }}$
          </a>
        </div>
        <div class="command-div">
          <a href="" class="command"
            ><i class="fa fa-trash"></i> Remove all
          </a>
        </div>
      </div>
     </div>
        <div v-else-if="this.message!=true" style="font-weight: bold; color: red; margin-top: 10%;">there is no carts</div>
        
      </div>
    </transition>
  </div>
  <header>
    <div class="navbar-information">
      <div>free delivery</div>
      <div>Up to 50% off</div>
      <div>Return possible within 7 days</div>
      <div>
        <i class="fa-solid fa-thumbs-up"></i> More than 4000 satisfied customers
      </div>
    </div>
  </header>

  <nav id="navbar" >
    <img src="../assets/burger.svg" alt="" class="burger" @click="showMenu()" />
    <div class="navbar">
      <div class="navbar-logo">
        <img src="../assets/logo.svg" alt="" />
      </div>

      <div
        class="navbar-lists"
        :class="this.showMobileMenu ? 'open-menu' : 'closed-menu'"
      >
        <ul>
          <li><router-link to="/"><a href="">Home</a></router-link></li>

          <li >
              <a href="javascript:void(0)" @click="showlinksf()" >Product</a>
             <div class="product-links" v-if="showlinks"  >
               
              <a href="/productsshop">man</a>
           
              <a href="/womenproduct">woman</a>
            
              <a href="/kidproduct">kid</a>
             </div>
          </li>
          <li>
            <a href="#" @click="showModal = true"
              ><i class="fa fa-shopping-cart"></i>bascket <span class="many-cart" v-if="shopcarts.length>0">{{ shopcarts.length  }}</span></a
            >
          </li>
          <li v-if="!checklogin">
            <router-link to="/login"
              ><a href="" class="login"
                ><i class="fas fa-sign-in-alt mr-2"></i>login</a
              ></router-link
            >
          </li>
                <li v-if="checklogin" >
           <a href="" class="login" @click="logout()"
                ><i class="fas fa-sign-in-alt mr-2"></i>logout</a
              >
          </li>
          <li v-if="!checklogin" >
            <router-link to="/register"
              ><a href="" class="register" style="color: white"
                ><i class="fas fa-user-plus mr-2"></i>register</a
              ></router-link
            >
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import Cookies from 'vue-cookies';
export default {
  el: "#app",
  data() {
    return {
       checklogin : Cookies.get('userId'),
      showMobileMenu: false,
      showModal: false,
      showlinks: false,
      shopcarts:[],
      shopcart:{},
      message:''
      // totalp : null
      
    };
  },
  created(){
    this.getshopcarts(Cookies.get('userId'));
    // this.total();
  },
  methods: {
    // total () {

    //  totalp =  shopcarts.reduce((accumulator, current) => accumulator + current.price, 0)
    //  return this.totalp;
    // },
   logout(){
     Cookies.remove('userId');
     this.$router.push('/');
   },
     showlinksf() {
      this.showlinks = !this.showlinks;
    },
    showMenu() {
      this.showMobileMenu = !this.showMobileMenu;
    },
      getshopcarts(userId){
            axios.get('http://localhost/kleider1933-website/backend/API/shopcart/read.php?userId='
            +userId)
                .then(response => {
					this.shopcarts = response.data;
          this.message =  console.log(response.data);
          


				})
                .catch(err => console.log(err));
        },
         deleteshopcart(id){
            Swal.fire({
                title: 'Are you sure ?',
                text: "You are going to delete this shopcart",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'black',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText : 'Cancel'
            }).then((result) => {
                if (result.value) {
                    axios.delete('http://localhost/kleider1933-website/backend/API/shopcart/delete.php?id=' + id)
                        .then(response => {
                            Swal.fire(
                                'Deleted !',
                                'success'
                            ).then(() => {
                                this.shopcarts = this.shopcarts.filter(shopcart => {
                                    return shopcart.id !== id;
                                })
                            })
                        })
                        .catch(err => console.log(err));
                }
            })
        },
  },
};
</script>

<style>
body{
  font-family: "lato", sans-serif;
}
header,
nav {
  font-family: sans-serif;
}

.product-links{
    position: absolute;
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 10px;
    text-align: center;
    background-color: black;
    padding: 10px;
    
}
.product-links a{
  color: white !important;
  border-top: white 1px solid;
  padding-top: 5px ;
}
.many-cart{
  position: relative;
    right: 3%;
    top: 0px;
    color: white;
    background-color: black;
    padding: 2px 7px;
    border-radius: 50%;
    font-weight: bold;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}
.navbar-information {
  display: flex;
  justify-content: space-between;
  padding: 5px 50px;
  background: black;
  color: white;
  text-align: center;
}

.navbar-lists ul {
  list-style-type: none;
  display: flex;
  margin-top: 35px;
}
.navbar-lists ul li {
  list-style-type: none;
  margin-right: 50px;
}
.navbar-lists ul li a {
  text-decoration: none;
  font-weight: bold;
  color: black;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.login:hover {
  color: white;
  background-color: black;
  padding: 10px;
  border-radius: 10px;
}
.login {
  color: black;
  background-color: none;
  border: 1px solid black;
  padding: 10px;
  border-radius: 10px;
}
.register {
  color: white;
  background-color: black;
  /* border: 1px solid black; */
  padding: 10px;
  border-radius: 10px;
}

.navbar {
  display: flex;
  justify-content: space-around;
  padding-top: 30px;
}
.burger {
  margin-top: 13%;
  margin-right: 14px;
  float: right;
  display: none;
}

.app {
  font-family: sans-serif;
  background-color: white;
  position: fixed;
  width: 35%;
  text-align: center;
  right: 0%;
  z-index: 99;
  border-radius: 10px;
  box-shadow: 0px 2px 29px #9e9e9e;
}
.modal {
  padding: 20px;
  height: 100vh;
}
.button {
  float: right;
  text-decoration: none;
    color: #6a6868;
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
  margin-top: 8%;
}
.mini-product {
    display: flex;
    justify-content: space-between;
        box-shadow: rgb(0 0 0 / 2%) 0px 1px 3px 0px, rgb(27 31 35 / 15%) 0px 0px 0px 1px;
    padding: 10px;
  margin: 7% 0%;
}
.mini-product p{
    color: #DAA520;
    text-shadow: 1px 1px 2px black;
    font-weight: bold;
    font-size: 20px;
}
.mini-product img{
  width: 22%;
  height: 15vh;
}
.panier-btns{
  margin: auto;
}

/* .slide-enter-active,
.slide-leave-active {
  -webkit-transition: -webkit-transform 0.5s;
  transition: -webkit-transform 0.5s;
  transition: transform 0.5s, -webkit-transform 0.5s;
}

.slide-enter,
.slide-leave-to {
  -webkit-transform: translateY(100%) translateX(50vw);
  transform: translateY(100%) translateX(50vw);
} */

/*# sourceMappingURL=style.css.map */
@media screen and (max-width: 768px) {
 
 .app{
   width: 100%;
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
  .navbar-lists {
    background-color: black;
      position: absolute;
    right: 6%;
    top: 23%;
    padding: 27px 73px;
    border-radius: 18px;

  }
  .navbar-lists ul {
    flex-direction: column;
    margin-top: 0px;
  }
  .navbar-lists ul li {
    margin-top: 15%;
    text-align: center;
  }
  .navbar-lists ul li a {
    color: white;
    /* font-weight: bold; */
  }
  .navbar-logo {
        margin-right: 55%;
  }
  .navbar-information div:not(:nth-child(2)) {
    display: none;
  }
  .navbar-information div:nth-child(2) {
    margin-left: 35%;
  }
  .burger {
    display: block;
  }
}
</style>
