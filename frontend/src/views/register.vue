<template>
  <div class="home">
  <Navbar/>
  <registercomp/>
  <Footercomp/>

  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import Navbar from '@/components/navbar.vue'
import registercomp from '@/components/registercomp.vue'
import Footercomp from '@/components/footercomp.vue'


export default {
  name: 'register',
  components: {
    // HelloWorld,
    Navbar,
    registercomp,
    Footercomp
}
}
</script>
<style>
  .home {
  font-family: sans-serif;
}
</style>
