<template>
  <!-- <loader/> -->
   <navbar/>
   <detailscomp/>
   <Footercomp/>
   
</template>
 
<script>
// import loader from '../components/loader.vue'
import navbar from "@/components/navbar.vue"
import detailscomp from "@/components/detailscomp.vue"
import Footercomp from "@/components/footercomp.vue"
import Cookies from "vue-cookies"


 export default {
  name: 'details',
  components: {
      // loader,
      navbar,detailscomp,Footercomp
},
beforeMount(){
  let checkcok = Cookies.get('id');
  if(!checkcok){
    this.$router.push('/');
    
  }
},

data(){
    return {
      isLoading: true
    }
  },

// beforeMount(){
//   let checkcok = Cookies.get('userId');
//   console.log(checkcok);
//   if(!checkcok){
//     this.$router.push('/login');
//     Swal.fire(
//        'please login to see details',
//        'warning'
//     )
//   }
// }
}
</script>