<template>
  <main>
		<header>
			<ul class="indicator">
				<li @click="currentType = 'all'" data-filter="all" class="active" ><a href="#">All</a></li>
				<li @click="currentType = 'blazzer'" data-filter="Blazer"><a href="#">Blazzer</a></li>
				<li @click="currentType = 'watch'" data-filter="Watch"><a href="#">Watch</a></li>
				<li @click="currentType = 'shoes'" data-filter="Shoes"><a href="#">Shoes</a></li>
				<li @click="currentType = 't-shirt'" data-filter="t-shirt"><a href="#">T-shirts</a></li>
				<li @click="currentType = 'cap'" data-filter="cap"><a href="#">Cap</a></li>
			</ul>
			<div class="filter-condition">
				<div class="span-select" style="display: flex; flex-direction: column;">
                    <span @click="showsort=!showsort" style="cursor: pointer;">View As a <i class="fa-solid fa-caret-down"></i></span>
					<div v-if="showsort" class="sort-div">
					<a href="javascript:void(0)" @click="sort0()"  class="sort-links">default</a>
					<a href="javascript:void(0)" @click="sort1()"  class="sort-links">Low to high</a>
					<a href="javascript:void(0)" @click="sort2()" class="sort-links">High to low</a>
					</div>
				<!-- </select> -->
                </div>
			</div>
		</header>
		<div class="product-field">
			<ul class="items">
				<li data-category="" data-price="" v-for="product in products.filter(p => p.type === currentType || currentType === 'all')" :key="product.id">
					<picture>
					    <img  v-bind:src="'../img/'+product.image" alt="">
					</picture>
					<div class="detail">
						<p class="icon">
							<span @click="getpush(product.id)"><i class="fa fa-shopping-cart"></i></span>
						   <span><i class="far fa-heart"></i></span>
						   <!-- <span><i class="far fa-share-square"></i></span> -->
						</p>
						<input type="hidden" v-model="product.id">
						<strong>{{product.name}}</strong>
						<!-- <strong>{{product.id}}</strong> -->
						<span>{{product.title}}</span>
						
						<a href="javascript:void(0)" @click="getCookie(product.id)"><small>Buy now</small></a>
					</div>
					<h4>${{product.price}}</h4> 
				</li>			
			</ul>
		</div>
        
	</main>
</template>
<script>
import Cookies from 'vue-cookies';
 import axios from 'axios';
import Swal from 'sweetalert2';
export default {
  data() {
    return {
		currentType: "all",
      showModal: false,
	  showsort : false,
       products : [],
       product : {id : '',name : '',price : '',title : '',gender : '',type : '',image : ''},
	   checklogin : Cookies.get('userId')
    };
  },
   mounted() {
	   this.getproducts();
	   this.colorchanger();
    },
	
  methods: {
 
	// share product to messenger
   

	sort0(){
		this.getproducts();
		this.showsort = !this.showsort;
	},
	 sort1(){
		 this.products.sort((a, b) =>(a.price > b.price ? 1 : -1));
		 this.showsort = !this.showsort;
	 },
	 sort2(){
		 this.products.sort((a, b) =>(a.price > b.price ? -1 : 1));
		 this.showsort = !this.showsort;
	 },


   async getpush(id){
       
   if(!this.checklogin){
	     Swal.fire({
                    title : 'Please login if you wanna add it !',
                    type : 'warning'
                })
   }
   else if(this.checklogin){
	   await axios.post('http://localhost/kleider1933-website/backend/API/products/read_single.php?id=' + id)
                .then(response => {
					this.product = response.data;
                })
	   let respon = await axios.post('http://localhost/kleider1933-website/backend/API/shopcart/check.php', {
                    productId: this.product.id ,       
                    userId: Cookies.get('userId')
                 });
            console.log(respon.data.answer);
   if(respon.data.answer === false){
	   axios.all([
		     await axios.post('http://localhost/kleider1933-website/backend/API/products/read_single.php?id=' + id)
                .then(response => {
					this.product = response.data;
                }),
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
	   
 ])
//   setTimeout(() => {
//       this.$router.push('/productsshop')
//     }, 1100)
	 
	 
 .then(response => {
                    Swal.fire('Saved!', '', 'success')
                })
   }else{
	   Swal.fire({
                    title : 'you added this product before !',
                    type : 'warning'
                })
   }
   }
 },

	  colorchanger(){
      	let field = document.querySelector('.items');
		let li = Array.from(field.children);

		function loopit() {
			for(let i of li){
				const name = i.querySelector('strong');
				const x = name.innerHTML;
				i.setAttribute("data-category", x);
			}

			let indicator = document.querySelector('.indicator').children;

			this.run = function() {
				for(let i=0; i<indicator.length; i++)
				{
					indicator[i].onclick = function () {
						for(let x=0; x<indicator.length; x++)
						{
							indicator[x].classList.remove('active');
						}
						this.classList.add('active');
						const displayItems = this.getAttribute('data-filter');
					};
				}
			}
		}
		new loopit().run();
	  },
	 getCookie(id){
		   
            axios.post('http://localhost/kleider1933-website/backend/API/products/read_single.php?id=' + id)
                .then(response => {
                    this.product = response.data;
		  Cookies.remove('id');			
          Cookies.set('id',this.product.id);
		  this.$router.push('/details');
          console.log(Cookies.get('id'));
                })
                .catch(err => console.log(err));
     },
     getproducts(){
            axios.get('http://localhost/kleider1933-website/backend/API/products/read_woman.php',)
                .then(response => {
					this.products = response.data;
					console.log(this.products)
				})
                .catch(err => console.log(err));
        },
     
		
  },
};
</script>




<style >
  		:root{
			--gra: black;
		}
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		main{
			width: 98%;
			background: white;
			margin: 60px auto;
			font-family: sans-serif;
		}
		header ul li{
			list-style: none;
			padding: 20px;
			margin: 10px;
			float: left;
			font-size: 20px;
			border-radius: 35px;
			/*background: red;*/

		}
		header ul li a{
			color: inherit;
			text-decoration: none;
		}
		header ul li.active{
			background: var(--gra);
		}
		header ul li.active a{
			color: white;
			font-weight: bold;
		}
		.sort-div{
			display:flex;
			flex-direction:column;
			top:46%;
            background:black;
			position:absolute;

		}

		.sort-links{
			color: white;
			font-size: 15px;
			text-decoration: none;
			font-weight: bold;
			padding:5px;
			margin-top: 4px;
		}
		.filter-condition{
			padding: 20px;
			height: 100px;
			font-size: 20px;
			font-weight: bold;
		}
		.filter-condition select{
			width: 120px;
		    padding: 0 0 0 10px;
		    border: none;
		    outline: none;
		    font-weight: bold;
		    color: purple;
		    background: transparent;
		    cursor: pointer;
		}
		.product-field{
			/* padding: 40px 20px; */
		}
		.product-field ul{
			width: 100%;
			display: flex;
			flex-wrap: wrap;
            justify-content: space-around;
		}
		.product-field ul li{
			list-style: none;
			width: 23.4%;
			height: 296px;
			transition: 0.5s all;
			background: whitesmoke;
			/*overflow: hidden;*/
			border-radius: 20px;
			padding: 10px;
			margin: 200px 10px 0 10px;
			position: relative;
		}
		picture{
			background: #eee;
			padding: 5px;
		    position: absolute;
		    right: 0;
		    bottom: 41%;
		    width: 75%;
		    height: 73%;
		    border-radius: 50px 20px 0 20px;
		    transform: skewY(40deg);
		    overflow: hidden;
		    box-shadow: 0px 1px 0px #00000020, -1px 0px 0px #ccc;
		}
		picture img {
		  width: 79%;
		  z-index: 1;
		  transform: skewY(-40deg);
		  /* padding: 25px 0 0 0; */
		}
		.detail{
			width: 100%;
			height: 100%;
		}
		.detail .icon{
			width: 30%;
		    height: 42%;
		    padding: 20px 5px;
		}
		.icon span{
			background: #00000030;
		    display: inline-block;
		    width: 50px;
		    height: 50px;
		    line-height: 50px;
		    text-align: center;
		    padding: 0;
		    border-radius: 50%;
		    margin: 0 0 20px 5px;
		    font-size: 20px;
		    color: white;
		}
		.icon span:hover{
			background: var(--gra);
			cursor: pointer;
		}
		.detail > strong{
			display: inherit;
			margin: 36px 20px 20px 20px;
         font-size: 22px; 
			letter-spacing: 2px;
			color: #555;
		}
		.detail > span{
			display: inherit;
			padding: 0 20px;
    		width: 80%;
		}
		.detail small{
			display: inline-block;
		    padding: 8px 20px;
		    margin: 15px;
		    font-weight: bold;
		    border-radius: 6px;
		    border: 1px solid #999;
		    cursor: pointer;
			color: black;
		}
		.detail small:hover{
			    background: var(--gra);
			    color: white;
			    border-color: cyan;
		}
		li h4{
		    position: absolute;
		    right: 10px;
		    top: 50%;
		    font-size: 30px;
		    color: #555;
		    text-shadow: 1px 1px 2px black;
		}
        .span-select{
            float: right;
        }
        @media screen and (max-width: 768px) {
            .product-field ul {
                    flex-direction: column;
            }
            .product-field ul li {
                width: 71%;
				margin-left: 15%;
            }
        }
</style>
