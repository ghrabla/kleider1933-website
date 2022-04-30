<template>
   <!-- <Navbar/> -->
   <Navbar/>
   <Choicelogincomp/>
   <Footercomp/>
</template>
<script>
import Navbar from "../components/navbar.vue"
import Choicelogincomp from "@/components/choicelogincomp.vue"
import Footercomp from "@/components/footercomp.vue"
// import Navbar from "@/components/navbar.vue"
 export default {
  name: 'choicelogincomp',
  components: {
    // HelloWorld,
    // Navbar,
    
    Navbar,
    Choicelogincomp,
    Footercomp
}
}
</script>