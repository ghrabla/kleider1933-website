<template>
  <div class="home">
  <loader/>
  <Navbar/>
  <pagehome/>
  <Footercomp/>

  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import loader from '../components/loader.vue'
import Navbar from '@/components/navbar.vue'
import pagehome from '@/components/pagehome.vue'
// import footer from '@/components/footer.vue'
import Footercomp from '../components/footercomp.vue'

export default {
  name: 'HomeView',
  components: {
    // HelloWorld,
    loader,
    Navbar,
    pagehome,
    Footercomp
}
}
</script>
<style>
  .home {
  font-family: sans-serif;
  /* font-size: 14px; */
}
</style>
