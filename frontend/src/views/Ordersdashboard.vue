<template>
   <!-- <Navbar/> -->
   <Dashbordnavbar/>
   <Ordersdashboard/>
   <Footercomp/>
</template>
<script>
import Dashbordnavbar from "@/components/dashbordnavbar.vue"
import Ordersdashboard from "@/components/Ordersdashboard.vue"
import Footercomp from "@/components/footercomp.vue"

// import Navbar from "@/components/navbar.vue"
 export default {
  name: 'ordersdashboard',
  components: {
    // HelloWorld,
    // Navbar,
    Ordersdashboard,
    Footercomp,
    Dashbordnavbar
}
}
</script>