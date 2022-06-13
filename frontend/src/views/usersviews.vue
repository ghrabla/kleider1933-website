<template>
  <div class="home">
  <Dashbordnavbar/>
  <Usersdashboard/> 
  <Footercomp/>

  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import Dashbordnavbar from '@/components/dashbordnavbar.vue'
import Usersdashboard from '@/components/usersdashboard.vue'
import Footercomp from '@/components/footercomp.vue'
import Cookies from 'vue-cookies'


export default {
  name: 'usersdashboard',
  components: {
    // HelloWorld,
    Dashbordnavbar,
    Usersdashboard,
    Footercomp
},

created(){
  let checkcok = Cookies.get('adminId');
  if(!checkcok){
    this.$router.push('/loginadmin');
    
  }
}
}
</script>
<style>
  .home {
  font-family: sans-serif;
}
</style>
