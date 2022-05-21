<template>
   <navbar />
   <womenproductcomp />
   <Footercomp/>
   
</template>
 
<script>
import navbar from "@/components/navbar.vue"
import womenproductcomp from "@/components/womenproductcomp.vue"
import Footercomp from "@/components/footercomp.vue"

 export default {
  name: 'womenproduct',
  components: {
      navbar,womenproductcomp,Footercomp   
}, 


//   mounted() {
// 	//   this.filterdata();
//     },
// 	data(){
// 		return {
// 			// currentType: "all",
// 		}
// 	},
//     methods: {
         
//     }
}
</script>