<template>
   <!-- <Navbar/> -->
   <Navbar/>
   <Choicedashboard/>
   <Footercomp/>
</template>
<script>
import Navbar from "../components/navbar.vue"
import Choicedashboard from "@/components/choicedashboard.vue"
import Footercomp from "@/components/footercomp.vue"
// import Navbar from "@/components/navbar.vue"
 export default {
  name: 'choicedashboard',
  components: {
    // HelloWorld,
    // Navbar,
    
    Navbar,
    Choicedashboard,
    Footercomp
}
}
</script>