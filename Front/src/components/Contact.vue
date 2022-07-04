<template>
  <div>
    <div class="slider">
      <button @click="previous" type="button" class="btn btn-left">
        <img src="../assets/images/chevron-left.svg" alt="" class="icone" />
      </button>

      <div
        class="container-slides"
        :style="{
          transform: `translateX(${index}px)`,
          transition: `${transition}`,
        }"
      >
        <img src="https://cdn.pixabay.com/photo/2017/10/26/17/51/under-construction-2891888_960_720.jpg" class="img-slider" />
        <img src="../assets/images/img1.jpg" class="img-slider" />
        <img src="../assets/images/img2.jpg" class="img-slider" />
        <img src="../assets/images/img3.jpg" class="img-slider" />
        <img src="../assets/images/img4.jpg" class="img-slider" />
        <img src="../assets/images/img5.jpg" class="img-slider" />
        <img src="../assets/images/img6.jpg" class="img-slider" />
      </div>

      <button @click="next" type="button" class="btn btn-right">
        <img src="../assets/images/chevron-right.svg" alt="" class="icone" />
      </button>
    </div>
    <div class="background">
      <img src="https://cdn.pixabay.com/photo/2017/10/26/17/51/under-construction-2891888_960_720.jpg">
    </div>
  </div>
</template>


<script>
export default {
  name: "Slider",
  data() {
    return {
      plumberImage: "../assets/images/plumber.jpg",
      index: 0,
      transition: "transform 1s ease",
    };
  },
  methods: {
    // On veut que notre image défile
    next() {
      // console.log(this.index);
      if (this.index === -3000) {
        this.transition = "none";
        this.index = 0;
      } else {
        this.transition = "transform 1s ease";
        this.index -= 500;
      }
    },
    previous() {
      if (this.index === 0) {
        this.transition = "none";
        this.index = -3000;
      } else {
        this.transition = "transform 1s ease";
        this.index += 500;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import"../assets/scss/global";

.image {
  display: flex;
  justify-content: center;
  align-items: center;
}



.container-slides {
  display: flex;
}

.img-slider {
  width: 100%;
  height: auto;
  border-radius: 15px;
}

.btn {
  outline: none;
  border: none;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: block;
  position: absolute;
  z-index: 1000;
  cursor: pointer;

  display: flex;
  justify-content: center;
  align-items: center;
}

.icone {
  width: 15px;
}

.btn-left {
  top: 50%;
  left: 5px;
  transform: translateY(-50%);
}

.btn-right {
  top: 50%;
  right: 5px;
  transform: translateY(-50%);
}

@media (max-width:600px){
  .slider {
    display: none;
  }
  img {
    width: 100%;
    border-radius: 15px;
    padding: 1%;
  }
}
@media (min-width:600px){

  .slider {
  width: 500px;
  height: 300px;
  margin: 5% auto;
  overflow: hidden;
  position: relative;
  border-radius: 15px;
}

  .background {
    display: none;
  }

}


</style> 