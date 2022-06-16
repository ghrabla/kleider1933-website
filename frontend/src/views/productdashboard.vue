<template>
   <!-- <Navbar/> -->
   <Dashbordnavbar/>
   <dashboard/>
   <Footercomp/>
</template>
<script>
import dashboard from "@/components/dashboard.vue"
import Footercomp from "@/components/footercomp.vue"
import Dashbordnavbar from "../components/dashbordnavbar.vue"
import Cookies from 'vue-cookies';

// import Navbar from "@/components/navbar.vue"
 export default {
  name: 'productdashboard',
  
  components: {
    // HelloWorld,
    // Navbar,
    dashboard,
    Footercomp,
    Dashbordnavbar
},
beforeMount(){
  let checkcok = Cookies.get('adminId');
  if(!checkcok){
    this.$router.push('/loginadmin');
    
  }
},
methods : {
  getproducts() {
      axios
        .get(
          "http://localhost/kleider1933-website/backend/API/products/read.php"
        )
        .then((response) => (this.products = response.data))
        .catch((err) => console.log(err));
    }
}
}
</script>
<!-- <style scoped></style> -->