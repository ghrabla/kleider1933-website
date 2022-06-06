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


export default {
  name: 'usersdashboard',
  components: {
    // HelloWorld,
    Dashbordnavbar,
    Usersdashboard,
    Footercomp
}
}
</script>
<style>
  .home {
  font-family: sans-serif;
}
</style>
