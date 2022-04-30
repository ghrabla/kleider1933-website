<template>

  <main>
    <div class="container">
      <div class="image_section">
        <img src="../assets/loginIMG.png" alt="" />
      </div>
      <div class="form" action="" >
        <div >
          <h2><b> login to your account As :</b> </h2>
         <router-link to="/login"> <input type="submit" value="Admin" /></router-link>
          <input type="submit" value="Client"/>
  
        </div>
        
      </div>
    </div>
  </main>
 
</template>




 


<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Parisienne&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500&display=swap");

/* form  */

main {
  margin-top: 10%;
  height: auto;
//   margin: 5% 10% 5% 10%;
  padding: 0 2% 0 2%;
  display: flex;
    justify-content: center;
}

.container {
  height: 66vh;
  width: 80%;
  display: flex;
  border-radius: 15px;
  background: #ffffff;
  box-shadow: 15px 15px 40px #b3b3b3, -15px -15px 40px #ffffff;
}

.container .image_section {
  width: 100%;
}

.container .image_section img {
  width: 100%;
  height: 100%;
  border-radius: 15px 0 0 15px;
}

.container .form {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  padding: 0 3% 0 3%;
  justify-content: center;
  align-content: center;
  background-color: #f7f9f9;
  border-radius: 0 15px 15px 0;
    h2{
      text-align: center;
      margin-bottom: 4%;
    }
  .success {
    display: flex;
    flex-direction: column;
    align-items: center;
    i {
      font-size: 10rem;
      color: #45a049;
      margin-bottom: 5vh;
      align-items: center;
    }
    h3 {
      color: #45a049;
    }
  }
  .reservation {
    margin-top: 51px;
    label {
      font-weight: 600;
      margin-left: 29%;
    }
    input {
      margin-top: 30px !important;
    }
  }
}

.container .form input[type="text"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.container .form input[type="number"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.container .form input[type="date"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.container .form input[type="submit"] {
  width: 100%;
  background-color: black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.container .form input[type="submit"]:hover {
  background-color: #6b8eba;
}
</style>



