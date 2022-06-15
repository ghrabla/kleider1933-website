<template>
  <div>
    <div class="search-profile">
      <div>
        <i
          class="fa fa-search"
          aria-hidden="true"
          style="position: absolute; left: 134px; top: 140px; color: white"
        ></i>
        <input
          type="text"
          placeholder="search items..."
          class="search"
          v-model="keyword"
        />
      </div>
      <div class="profile">
        <!-- <i class="fa fa-envelope fa-2x" aria-hidden="true" style="color: aquamarine;"></i> -->
        <img src="../assets/kamal.svg" alt="" />
        <span style="font-weight: bold">{{ adminname }}</span>
      </div>
    </div>
    <div class="statistic med">
      <div class="sta-box">
        <div class="sta-img">
          <i
            class="fa fa-bookmark-o fa-2x"
            aria-hidden="true"
            style="color: orange"
          ></i>
        </div>
        <div class="sta-content">
          <div class="sta-text">user items</div>
          <div class="sta-number">{{ products.length }}</div>
        </div>
      </div>
      <div class="sta-box">
        <div class="sta-img">
          <i
            class="fa fa-picture-o fa-2x"
            aria-hidden="true"
            style="color: #00d4ff"
          ></i>
        </div>
        <div class="sta-content">
          <div class="sta-text">user items</div>
          <div class="sta-number">{{ orders.length }}</div>
        </div>
      </div>
      <div class="sta-box">
        <div class="sta-img">
          <i
            class="fa fa-user fa-2x"
            aria-hidden="true"
            style="color: #8610e8"
          ></i>
        </div>
        <div class="sta-content">
          <div class="sta-text">website users</div>
          <div class="sta-number">{{ users.length }}</div>
        </div>
      </div>
      <div class="sta-box">
        <div class="sta-img">
          <i
            class="fa fa-star fa-2x"
            aria-hidden="true"
            style="color: green"
          ></i>
        </div>
        <div class="sta-content">
          <div class="sta-text">store admins</div>
          <div class="sta-number">{{ admins.length }}</div>
        </div>
      </div>
    </div>
    <div class="container1">
      <h2>users Table</h2>
      <ul class="responsive-table">
        <li class="table-header">
          <div class="col col-1">
            <i class="fa fa-snowflake-o" aria-hidden="true"></i>fullname
          </div>
          <div class="col col-3">
            <i class="fa fa-envelope-o" aria-hidden="true"></i> email
          </div>
          <!-- <div class="col col-4"><i class="fa fa-audio-description" aria-hidden="true"></i> Title</div> -->
          <div class="col col-5"><i class="fa-solid fa-key"></i> password</div>
          <div class="col col-8">
            <i class="fa fa-cog fa-spin fa-fw"></i> Action
          </div>
        </li>

        <li class="table-row" v-for="user in filteredList" :key="user.id">
          <div style="display: flex; width: 100%; align-items: center">
            <div class="col col-1" data-label="First name">
              {{ user.fullname }}
            </div>
            <div class="col col-1" data-label="First name" id="fullname-detais">
              {{ user.email }}
            </div>
            <!-- <div  class="col col-1" data-label="First name">{{user.title}}</div> -->
            <div class="col col-1" data-label="First name">
              {{ user.password }}
            </div>
            <div class="col col-8 action-icon" data-label="Action">
              <a href="javascript:void(0)" @click="getuser(user.id)">
                <i class="fa-solid fa-pen" @click="showModal = true"></i
              ></a>
              <a href="javascript:void(0)">
                <i
                  class="fa-solid fa-trash-can"
                  @click="deleteuser(user.id)"
                ></i
              ></a>
            </div>
          </div>
        </li>
        <div aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a
                href="javascript:void(0)"
                class="page-link"
                v-if="page != 1"
                @click="page--"
              >
                Previous
              </a>
              <a
                href="javascript:void(0)"
                class="page-link"
                v-for="pageNumber in pages.slice(page - 1, page + 5)" 
                @click="page = pageNumber"
              >
                {{ pageNumber }}
              </a>
              <a
                href="javascript:void(0)"
                @click="page++"
                v-if="page < pages.length"
                class="page-link"
              >
                Next
              </a>
            </li>
          </ul>
        </div>
      </ul>
    </div>

    <div
      class="close-div-update"
      v-if="showModal"
      @click="showModal = false"
    ></div>
    <div class="popup-all" v-if="showModal">
      <h2>
        update user
        <a
          href="javascript:void(0)"
          v-if="(showModal = true)"
          @click="showModal = false"
          ><i class="fa fa-times" aria-hidden="true" style="float: right"></i
        ></a>
      </h2>
      <label for="">Fullame*</label>
      <input
        type="text"
        placeholder="user name"
        class="input-pop"
        v-model="user.fullname"
      />
      <label for="">Email*</label>
      <input
        type="text"
        placeholder="user Title"
        class="input-pop"
        v-model="user.email"
      />
      <label for="">Password*</label>
      <input
        type="text"
        placeholder="user password"
        class="input-pop"
        v-model="user.password"
      />
      <button @click="updateuser()">valide</button>
    </div>
  </div>
</template>

<script>
import Cookies from "vue-cookies";
import axios from "axios";
import Swal from "sweetalert2";
export default {
  data() {
    return {
      showModal: false,
      showModaldet: false,
      users: [],
      user: { id: "", fullname: "", email: "", password: "" },
      admins: [],
      admin: { id: "", fullname: "", email: "", password: "" },
      products: [],
      product: {
        id: "",
        name: "",
        price: "",
        title: "",
        gender: "",
        type: "",
        image: "",
        fullname: "",
        phone: "",
        email: "",
        city: "",
        adresse: "",
        postale: "",
      },
      orders: [],
      order: {},
      keyword: "",
      nodata: false,
      page: 1,
      perPage: 4,
      pages: [],
      adminname: Cookies.get("adminname"),
    };
  },
  created() {
    this.getproducts();
    this.getusers();
    this.getadmins();
    this.getorders();
  },
  methods: {
    setPages() {
      let numberOfPages = Math.ceil(this.users.length / this.perPage);
      for (let index = 1; index <= numberOfPages; index++) {
        this.pages.push(index);
      }
    },
    paginate(users) {
      let page = this.page;
      let perPage = this.perPage;
      let from = page * perPage - perPage;
      let to = page * perPage;
      return users.slice(from, to);
    },
    getadmins() {
      axios
        .get("http://localhost/kleider1933-website/backend/API/admins/read.php")
        .then((response) => (this.admins = response.data))
        .catch((err) => console.log(err));
    },
    getproducts() {
      axios
        .get(
          "http://localhost/kleider1933-website/backend/API/products/read.php"
        )
        .then((response) => (this.products = response.data))
        .catch((err) => console.log(err));
    },
    getusers() {
      axios
        .get("http://localhost/kleider1933-website/backend/API/users/read.php")
        .then((response) => (this.users = response.data))
        .catch((err) => console.log(err));
    },
    getorders() {
      axios
        .get("http://localhost/kleider1933-website/backend/API/orders/read.php")
        .then((response) => (this.orders = response.data))
        .catch((err) => console.log(err));
    },
    deleteuser(id) {
      Swal.fire({
        title: "Are you sure ?",
        text: "You are going to delete this user",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "black",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
      }).then((result) => {
        if (result.value) {
          axios
            .delete(
              "http://localhost/kleider1933-website/backend/API/users/delete.php?id=" +
                id
            )
            .then((response) => {
              Swal.fire("Deleted !", "success").then(() => {
                this.users = this.users.filter((user) => {
                  return user.id !== id;
                });
              });
            })
            .catch((err) => console.log(err));
        }
      });
    },
    updateuser() {
      axios
        .put(
          "http://localhost/kleider1933-website/backend/API/users/update.php",
          {
            id: this.user.id,
            fullname: this.user.fullname,
            password: this.user.password,
            email: this.user.email,
          }
        )
        .then((response) => {
          Swal.fire("Updated !", "success").then(() => {
            this.getusers();
          });
        })
        .catch((err) => console.log(err));
    },
    getuser(id) {
      axios
        .post(
          "http://localhost/kleider1933-website/backend/API/users/read_single.php?id=" +
            id
        )
        .then((response) => {
          this.user = response.data;
        })
        .catch((err) => console.log(err));
    },
    clearFields() {
      this.user = {
        id: "",
        name: "",
        price: "",
        title: "",
        gender: "",
        type: "",
        image: "",
      };
    },
  },
  computed: {
    // displayedusers () {
    //     return this.paginate(this.users);

    // }

    filteredList() {
      return this.paginate(
        this.users.filter((user) =>
          user.fullname.toLowerCase().includes(this.keyword)
        )
      );
    },
  },
  watch: {
    users() {
      this.setPages();
    },
  },
};
</script>

<style scoped>
.page-item {
  border-radius: 3px;
  padding: 25px 30px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 25px;
  align-items: center;
}
.page-item a {
  color: black;
  text-decoration: none;
}
.img-pr {
  width: 43%;
  height: 7vh;
}

.img-det {
  width: 47%;
  height: 50vh;
}
.close-div-update {
  width: 100%;
  height: 100vh;
  background-color: #1b1b1b42;
  position: fixed;
  top: 0%;
  z-index: 88;
}
select {
  padding: 10px;
  margin-bottom: 10px;
  color: white;
  background-color: black;
}
body {
  font-family: "lato", sans-serif;
}
.table-row a {
  color: black;
}
button {
  display: block;
  padding: 15px 50px;
  background-color: black;
  color: white;
  margin-top: 15px;
  margin-left: 40%;
  text-align: center;
  border-radius: 10px;
}
.popup-all {
  font-family: sans-serif;
  position: absolute;
  top: 11%;
  right: 20%;
  z-index: 99;
  background-color: #e5e5e5;
  padding: 0px 35px 20px;
  border-radius: 10px;
}
.input-pop {
  padding: 15px 480px 15px 10px;
  border-radius: 10px;
  border: solid 1px;
  border-color: #b1b1b1;
  margin-bottom: 20px;
}
.image {
  padding: 15px 200px;
}
.popup-all label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

.search-profile {
  display: flex !important;
  justify-content: space-around !important;
  gap: 26.5rem;
  margin: 20px !important;
  font-family: sans-serif !important;
}
.profile {
  display: flex;
  gap: 10px;
  margin-top: 10px;
}
.profile span {
  margin-top: 15px;
}
.search::placeholder {
  color: white;
}
.search {
  padding: 20px 40px;
  border-radius: 10px;
  color: white;
  border: solid 1px;
  border-color: #b1b1b1;
  margin-top: 10px;
  padding: 12px 81px;
  background-color: #26272e;
}
.sta-img {
  padding: 9px 17px;
  background-color: #26272e;
  border-radius: 10px;
  box-shadow: rgb(149 157 165 / 40%) 0px 8px 24px;
}

.sta-text {
  color: #d3cccc;
}
.sta-number {
  color: white;
  font-weight: bold;
  font-size: 20px;
  margin-top: 5px;
}
.statistic {
  display: flex;
  justify-content: space-around;
  margin: 4%;
  font-family: sans-serif;
}
.sta-box {
  display: flex;
  gap: 10px;
  padding: 15px 20px;
  background: black;
  border-radius: 10px;
}
.container1 {
  font-family: "lato", sans-serif;
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
.message {
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
  box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
}
.action-icon {
  display: flex;
  justify-content: space-evenly;
}
.col-1 {
  flex-basis: 32% !important;
  margin-left: 4%;
}
.col-2 {
  flex-basis: 15%;
}
.col-3 {
  flex-basis: 15%;
}
.col-4 {
  flex-basis: 18%;
}
.col-5 {
  flex-basis: 20%;
}
.col-6 {
  flex-basis: 19%;
}
.col-7 {
  flex-basis: 21%;
}
.col-8 {
  flex-basis: 15%;
  margin-left: 4%;
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
  .statistic,
  .search-profile {
    flex-direction: column;
    gap: 10px;
  }
}
.img-det {
  width: 47%;
  height: 50vh;
}
.close-div-update {
  width: 100%;
  height: 100vh;
  background-color: #1b1b1b42;
  position: fixed;
  top: 0%;
  z-index: 88;
}
select {
  padding: 10px;
  margin-bottom: 10px;
  color: white;
  background-color: black;
}
body {
  font-family: "lato", sans-serif;
}
.table-row a {
  color: black;
}
.search-profile {
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
.profile span {
  margin-top: 15px;
}
.search::placeholder {
  color: white;
}
.search {
  padding: 20px 40px;
  border-radius: 10px;
  color: white;
  border: solid 1px;
  border-color: #b1b1b1;
  margin-top: 10px;
  padding: 12px 81px;
  background-color: #26272e;
}
.sta-img {
  padding: 9px 17px;
  background-color: #26272e;
  border-radius: 10px;
  box-shadow: rgb(149 157 165 / 40%) 0px 8px 24px;
}

.sta-text {
  color: #d3cccc;
}
.sta-number {
  color: white;
  font-weight: bold;
  font-size: 20px;
  margin-top: 5px;
}
.statistic {
  display: flex;
  justify-content: space-around;
  margin: 4%;
  font-family: sans-serif;
}
.sta-box {
  display: flex;
  gap: 10px;
  padding: 15px 20px;
  background: black;
  border-radius: 10px;
}
.container1 {
  font-family: "lato", sans-serif;
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
.message {
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
  box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
}
.action-icon {
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
  .popup-all {
    width: 76%;
    right: 4%;
  }
  .input-pop {
    padding: 5% 27% 5% 6%;
  }
  .image {
    padding: 20px 40px;
  }
  button {
    margin-left: 28%;
  }
  #fullname-detais {
    display: none;
  }
}
</style>
