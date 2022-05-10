<template>
  <main>
		<header>
			<ul class="indicator">
				<li @click="currentType = 'all'" data-filter="all" class="active"><a href="#">All</a></li>
				<li @click="currentType = 'blazzer'" data-filter="Blazer"><a href="#">Blazzer</a></li>
				<li @click="currentType = 'watch'" data-filter="Watch"><a href="#">Watch</a></li>
				<li @click="currentType = 'shoes'" data-filter="Shoes"><a href="#">Shoes</a></li>
				<li @click="currentType = 'Mobile'" data-filter="Mobile"><a href="#">Mobiles</a></li>
				<li @click="currentType = 'Accessories'" data-filter="Accessories"><a href="#">Accessories</a></li>
			</ul>
			<div class="filter-condition">
				<div class="span-select">
                    <span>View As a</span>
				<select name="" id="select">
					<option value="Default">Default</option>
					<option value="LowToHigh">Low to high</option>
					<option value="HighToLow">High to low</option>
				</select>
                </div>
			</div>
		</header>
		<div class="product-field">
			<ul class="items">
				<li data-category="" data-price="" v-for="product in products.filter(p => p.type === currentType || currentType === 'all')" :key="product.id">
					<picture>
						<img src="../assets/image/so3.png" alt="">
					</picture>
					<div class="detail">
						<p class="icon">
						   <span><i class="far fa-heart"></i></span>
						   <span><i class="far fa-share-square"></i></span>
						   <span><i class="fas fa-shopping-basket"></i></span>
						</p>
						<input type="hidden" v-model="product.id">
						<strong>{{product.type}}</strong>
						<span>{{product.title}}</span>
						<a href="/details" @click="getCookie(product.id)"><small>Buy now</small></a>
					</div>
					<h4>${{product.price}}</h4>
				</li>

				<!-- <li data-category="" data-price="" >
					<picture>
						<img src="../assets/image/so3.png" alt="">
					</picture>
					<div class="detail">
						<p class="icon">
						   <span><i class="far fa-heart"></i></span>
						   <span><i class="far fa-share-square"></i></span>
						   <span><i class="fas fa-shopping-basket"></i></span>
						</p>
						<strong>Blazer</strong>
						<span>hhhhhhhhhhhhhh</span>
						<router-link to="/details" ><small @click="getproduct(product.id)">Buy now</small></router-link>
					</div>
					<h4>$42.5</h4>
				</li> -->
				
			</ul>
		</div>
        
	</main>
</template>
<script>
import Cookies from 'vue-cookies';
export default {
  data() {
    return {
		currentType: "all",
      showModal: false,
       products : [],
       product : {id:''},
	//    proid: {id}
    };
  },
   mounted() {
	   this.getproducts();
    },
  methods: {
	 getCookie(id){
		   
            axios.post('http://localhost/kleider1933-website/backend/API/products/read_single.php?id=' + id)
                .then(response => {
                    this.product = response.data;
          Cookies.set('id',this.product.id);
          console.log(Cookies.get('id'));
                })
                .catch(err => console.log(err));
       
         // it gets the cookie called `username`
     },
     getproducts(){
            axios.get('http://localhost/kleider1933-website/backend/API/products/read_woman.php',)
                .then(response => {
					this.products = response.data;
				})
                .catch(err => console.log(err));
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
		/* header{
			width: 100%;
			height: 100px;
			border-bottom: 2px solid #e5e5e5;
			display: flex;
			align-items: center;
			justify-content: space-between;
		} */
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
			padding: 40px 20px;
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
			height: 400px;
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
		    height: 85%;
		    border-radius: 50px 20px 0 20px;
		    transform: skewY(40deg);
		    overflow: hidden;
		    box-shadow: 0px 1px 0px #00000020, -1px 0px 0px #ccc;
		}
		picture img {
		  width: 95%;
		  z-index: 1;
		  transform: skewY(-40deg);
		  padding: 25px 0 0 0;
		}
		.detail{
			width: 100%;
			height: 100%;
		}
		.detail .icon{
			width: 30%;
		    height: 55%;
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
			margin: 20px;
			font-size: 30px;
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
                width: 79%;
            }
        }
</style>
