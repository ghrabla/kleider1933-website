<template>
  <div class="home">
  <Navbar/>
  <logincomp/>
  <Footercomp/>

  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import Navbar from '@/components/navbar.vue'
import logincomp from '@/components/logincomp.vue'
import Footercomp from '@/components/footercomp.vue'


export default {
  name: 'login',
  components: {
    // HelloWorld,
    Navbar,
    logincomp,
    Footercomp
}
}
</script>
<style>
  .home {
  font-family: sans-serif;
}
</style>
