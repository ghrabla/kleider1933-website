<template>
<section class="loader-all" v-if="isLoading" >
        <div class="loader">
            <!-- <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
            <span style="--i: 4"></span>
            <span style="--i: 5"></span> -->
            <span style="--i: 6"></span>
            <span style="--i: 7"></span>
            <span style="--i: 8"></span>
            <span style="--i: 9"></span>
            <span style="--i: 10"></span>
            <span style="--i: 11"></span>
            <span style="--i: 12"></span>
            <span style="--i: 13"></span>
            <span style="--i: 14"></span>
            <span style="--i: 15"></span>
            <span style="--i: 16"></span>
            <span style="--i: 17"></span>
            <span style="--i: 18"></span>
            <span style="--i: 19"></span>
            <span style="--i: 20"></span>
        </div>
    </section>
</template>

<script>


export default{
    data(){
    return {
      isLoading: true
    }
  },
  beforeMount () {
    setTimeout(() => {
      this.isLoading = false
    }, 600)
  }
}

</script>


<style>


  body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

section {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #000;
    height: 100vh;
}
.loader-all{
    position:absolute;
    height:100vh;
    width:100%;
}
.loader {
    position: relative;
    width: 120px;
    height: 120px;
    animation: animateBg;
    animation-duration: 2s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
}

@keyframes animateBg {
    0% {
        transform: rotate(0deg);
    }
    50% {
        transform: rotate(180deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

.loader span {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* background-color: bisque; */
    transform: rotate(calc(18deg * var(--i)));
}

.loader span::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: calc(15px * (var(--i) / 20));
    height: calc(15px * (var(--i) / 20));
    border-radius: 50%;
    background-color: #fff;
}

</style>


