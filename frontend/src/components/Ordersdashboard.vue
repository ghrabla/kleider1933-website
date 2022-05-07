<template>
<div class="search-profile">
 <div>
    <i class="fa fa-search" aria-hidden="true" style="position: absolute;
    left: 50px;
    top: 140px;
    color: white;"></i>
  <input type="text" placeholder="search items..." class="search">
 </div>
 <div class="profile">
<!-- <i class="fa fa-envelope fa-2x" aria-hidden="true" style="color: aquamarine;"></i> -->
   <img src="../assets/kamal.svg" alt="">
   <span style="font-weight: bold;">Kamal Rhrabla</span>
 </div>
  
</div>
<div class="statistic">
   <div  class="sta-box">
     <div class="sta-img"><i class="fa fa-bookmark-o fa-2x" aria-hidden="true" style="color: orange;"></i></div>
     <div class="sta-content">
       <div class="sta-text">product items</div>
       <div class="sta-number">34664$</div>
     </div>
   </div>
   <div class="sta-box">
     <div class="sta-img"><i class="fa fa-picture-o fa-2x" aria-hidden="true" style="color:#00d4ff;"></i></div>
     <div class="sta-content">
       <div class="sta-text">order items</div>
       <div class="sta-number"> 34664$</div>
     </div>
   </div>
   <div class="sta-box">
     <div class="sta-img"><i class="fa fa-user fa-2x" aria-hidden="true" style="color: #8610e8;"></i></div>
     <div class="sta-content">
       <div class="sta-text">site users</div>
       <div class="sta-number"> 34664$</div>
     </div>
   </div>
   <div class="sta-box">
     <div class="sta-img"><i class="fa fa-star fa-2x" aria-hidden="true" style="color: green;"></i></div>
     <div class="sta-content">
       <div class="sta-text">month items</div>
       <div class="sta-number"> 34664$</div>
     </div>
   </div>
</div>
  <div class="container1">
  <!-- <h2>Responsive Tables Using LI <small>Triggers on 767px</small></h2> -->
  <h2>orders Table</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1"><i class="fa fa-user-o" aria-hidden="true"></i> Name</div>
      <div class="col col-3"><i class="fa fa-mobile" aria-hidden="true"></i> Phone</div>
      <div class="col col-4"><i class="fa fa-map-marker" aria-hidden="true"></i> City</div>
      <div class="col col-5"><i class="fa fa-location-arrow" aria-hidden="true"></i> Adresse</div>
      <div class="col col-6"><i class="fa fa-expand" aria-hidden="true"></i> Postal</div>
      <div class="col col-7"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email</div>
      <div class="col col-8"><i class="fa fa-cog fa-spin fa-fw"></i> Action</div>
    </li>
    
     <li v-for="n in 10" class="table-row" >
      <div style="display: flex;width: 100%;align-items: center;">
        <div  class="col col-1" data-label="First name">kamal</div>
        <div  class="col col-1" data-label="First name">kamal</div>
        <div  class="col col-1" data-label="First name">kamal</div>
        <div  class="col col-1" data-label="First name">kamal</div>
        <div  class="col col-1" data-label="First name">kamal</div>
        <div  class="col col-1" data-label="First name">kamal</div>
        <div class="col col-8 action-icon" data-label="Action">
          <i  class="fa-solid fa-pen" ></i>
          <i  class="fa-solid fa-trash-can" ></i>
          <i class="fa-solid fa-info"></i>
        </div>
      </div>
    </li>
  </ul>
</div>
</template>
<script>

</script>



<style>
.search-profile{
      display: flex;
    justify-content: space-between;
    margin: 20px;
    font-family: sans-serif;
}
.profile {
  display: flex;
  gap: 10px;
  margin-top: 10px;
}
.profile span{
  margin-top: 15px;
}
.search::placeholder{
  color:white;
}
.search{
  padding: 20px 40px;
    border-radius: 10px;
    color: white;
    border: solid 1px;
    border-color: #b1b1b1;
    margin-top: 10px;
    padding: 12px 81px;
    background-color: #26272e;
}
.sta-img{
  padding: 9px 17px;
    background-color: #26272e;
    border-radius: 10px;
   box-shadow: rgb(149 157 165 / 40%) 0px 8px 24px;
}


.sta-text{
      color: #d3cccc;
}
.sta-number{
  color: white;
  font-weight: bold;
  font-size: 20px;
  margin-top: 5px;
}
.statistic{
  display: flex;
  justify-content: space-around;
  margin: 4%;
  font-family: sans-serif;
}
.sta-box{
  display: flex;
    gap: 10px;
    padding: 15px 20px;
    background: black;
    border-radius: 10px;
}
  .container1 {
  font-family: 'lato', sans-serif;
}
.container1 {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
  
}

h2 {
  font-size: 20px;
  margin: 30px 0;
  text-align: center;
 
}
 small {
    font-size: 0.5em;
  }


  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    align-items: center;
   
  }
   .message{
      width: 100%;
      text-align: center;
      color: lawngreen;
    }
  .table-header {
    background-color: black;
    color: white;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.003em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
   
  }
  .action-icon{
    display: flex;
    justify-content: space-evenly;
  }
  .col-1 {
    flex-basis: 15%;
  }
  .col-2 {
    flex-basis: 15%;
  }
  .col-3 {
    flex-basis: 15%;
  }
  .col-4 {
    flex-basis: 10%;
  }
  .col-5 {
    flex-basis: 20%;
  }
  .col-6 {
    flex-basis: 15%;
  }
  .col-7 {
    flex-basis: 15%;
  }
  .col-8 {
    flex-basis: 15%;
  }
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
   
    li {
      display: block;
    }
    .col {
      
      flex-basis: 100%;
      
    }
   
  }

</style>
