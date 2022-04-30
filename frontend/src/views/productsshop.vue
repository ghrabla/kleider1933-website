<template>
   <navbar/>
   <shopcards/>
   <Footercomp/>
   
</template>
 
<script>
import navbar from "@/components/navbar.vue"
import shopcards from "@/components/shopcards.vue"
import Footercomp from "@/components/footercomp.vue"

 export default {
  name: 'productsshop',
  components: {
      navbar,shopcards,Footercomp
    
    
}
}
</script>