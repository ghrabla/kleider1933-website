<template>
   <!-- <Navbar/> -->
   <Dashbordnavbar/>
   <dashboard/>
   <Footercomp/>
</template>
<script>
import dashboard from "@/components/dashboard.vue"
import Footercomp from "@/components/footercomp.vue"
import Dashbordnavbar from "../components/dashbordnavbar.vue"
// import Navbar from "@/components/navbar.vue"
 export default {
  name: 'productdashboard',
  components: {
    // HelloWorld,
    // Navbar,
    dashboard,
    Footercomp,
    Dashbordnavbar
}
}
</script>