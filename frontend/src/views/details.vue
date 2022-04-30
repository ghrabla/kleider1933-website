<template>
   <navbar/>
   <detailscomp/>
   <Footercomp/>
   
</template>
 
<script>
import navbar from "@/components/navbar.vue"
import detailscomp from "@/components/detailscomp.vue"
import Footercomp from "@/components/footercomp.vue"

 export default {
  name: 'details',
  components: {
      navbar,detailscomp,Footercomp
    
    
}
}
</script>