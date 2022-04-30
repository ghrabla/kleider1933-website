<template>
   <navbar/>
   <kidproductcomp/>
   <Footercomp/>
   
</template>
 
<script>
import navbar from "@/components/navbar.vue"
import kidproductcomp from "@/components/kidproductcomp.vue"
import Footercomp from "@/components/footercomp.vue"

 export default {
  name: 'kidproduct',
  components: {
      navbar,kidproductcomp,Footercomp
    
    
}
}
</script>