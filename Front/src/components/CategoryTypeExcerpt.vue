<template>
  <div class="cards">
    <div v-if="imgNumber > 0" class="card" :class="`card-${imgNumber}`">
      <h2 class="card__title">{{ categoryTypeData.name }}</h2>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      imgNumber: 0,
    };
  },
  props: ["categoryTypeData"],

  mounted() {
    this.selectImg(this.categoryTypeData.name);
  },

  methods: {
    selectImg(categoryName) {
      switch (categoryName) {
        case "Décoration intérieure":
          this.imgNumber = 7;
          break;
        case "Peinture":
          this.imgNumber = 6;
          break;
        case "Electricité":
          this.imgNumber = 2;
          break;
        case "Plomberie":
          this.imgNumber = 1;
          break;
        case "Tapisserie":
          this.imgNumber = 5;
          break;
        case "Revêtement de sol":
          this.imgNumber = 4;
          break;
        case "Menuiserie":
          this.imgNumber = 3;
          break;

        default:
          this.imgNumber = 1;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import"../assets/scss/global";

/*  HEADING  */
.heading{
  display: grid;
  
}
/* BREAKPOINT */
@media (max-width:767px){
    .heading{
    text-align: center;
    grid-template-columns: 1fr;
    display: grid;
    }
}
@media (min-width:608px){
    .heading{
    text-align: center;
    grid-template-columns: 1fr 1fr;
    display: grid;
    }
}
@media (min-width:912px){
    .heading{
    text-align: center;
    grid-template-columns: 1fr 1fr 1fr ;
    display: grid;
    }
}
@media (min-width:1216px){
    .heading{
    text-align: center;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    display: grid;
    }
}
/* CARDS */

.cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  cursor: pointer;
}

.card {
  margin: 2px;
  padding: 5px;
  width: 50%;
  min-width: 300px;
  min-height: 200px;
  display: grid;
  align-content: center;
  justify-content: center;
  justify-items: center;
  grid-template-rows: 20px 50px 1fr 50px;
  border-radius: 10px;
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.2s;
}

.card:hover {
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
  transform: scale(1.01);
}

.card__link,
.card__exit,
.card__icon {
  position: relative;
  text-decoration: none;
  color: rgba(255, 255, 255, 0.9);
  text-shadow: black 1px 0 10px;
  font-size: 20px;
  //text-shadow: #d4b333 3px 0 10px;
}

.card__link::after {
  position: absolute;
  top: 25px;
  left: 0;
  content: "";
  width: 0%;
  height: 3px;
  background-color: rgba(255, 255, 255, 0.6);
  transition: all 0.5s;
}

.card__link:hover::after {
  width: 100%;
}

.card__exit {
  grid-row: 1/2;
  justify-self: end;
}

.card__icon {
  grid-row: 2/3;
  font-size: 30px;
}

.card__title {
  color: black;
  text-shadow: 0px 0px 5px #d4b333;
  grid-row: 3;
  font-weight: bolder;
  font-size: 26px;
  display: flex;
  align-items: center;
}

.card__apply {
  grid-row: 4/5;
  align-self: center;
}

/* CARD BACKGROUNDS */

.card-1 {
  background-image: url("../assets/images/plumber.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}

.card-2 {
  background-image: url("../assets/images/electricity.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}

.card-3 {
  background-image: url("../assets/images/wood2.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}

.card-4 {
  background-image: url("../assets/images/floor.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}

.card-5 {
  background-image: url("../assets/images/tapestry.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}

.card-6 {
  background-image: url("../assets/images/painting.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}

.card-7 {
  background-image: url("../assets/images/deco.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}


</style> 