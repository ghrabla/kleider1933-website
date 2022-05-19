<template>
  <div class="home">
  <Navbar/>
  <loginadmincomp/>
  <Footercomp/>

  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import Navbar from '@/components/navbar.vue'
import loginadmincomp from '@/components/loginadmincomp.vue'
import Footercomp from '@/components/footercomp.vue'


export default {
  name: 'loginadmin',
  components: {
    // HelloWorld,
    Navbar,
    loginadmincomp,
    Footercomp
}
}
</script>
<style>
  .home {
  font-family: sans-serif;
}
</style>
