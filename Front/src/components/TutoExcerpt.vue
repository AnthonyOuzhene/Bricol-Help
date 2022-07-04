<template>
  <article class="article">
    <a href="javascript:void(0)">
      <img
        class="fit-picture"
        :style="{ backgroundImage: 'url(' + getTutorialThumbnail() + ')' }"
        alt=""
      />

      <div class="title">
        <h1>{{ tutoData.title.rendered }}</h1>

        <div class="category_buton" v-if="tutoData._embedded">
          <button
            v-for="categoryTypes in tutoData._embedded['wp:term'][1]"
            :key="categoryTypes.id"
          >
            {{ categoryTypes.name }}
          </button>
        </div>

        <div class="container__text__star">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
        </div>
        <p>
          {{ tutoData.excerpt }}
        </p>

        <button class="btn">voir plus<i class="fa fa-arrow-right"></i></button>
      </div>
    </a>
  </article>
</template>

<script>
export default {
  data() {
    return {
/*        tutoData: {
         _embedded: {},
       }, */
    };
  },

  props: ["tutoData"],

  methods: {
    getTutorialThumbnail() {
      // si on n'a pas de thumbnail
      console.log(this.tutoData);
      if (!this.tutoData.thumbnail) {
        return "https://picsum.photos/400/200";
      } else {
        return this.tutoData.thumbnail;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@media (max-width: 600px) {
  .article {
    width: auto;
  }
}
a {
  width: 100%;
  text-decoration: none;
  color: black;
}
.article {
  width: auto;
  flex: 1;
  display: flex;
  flex-wrap: nowrap;
  flex-direction: row;
  margin: 10px;
  border-radius: 20px;
  box-shadow: 0 1px 20px #fc9400;
  background: #d3d3d3;
  position: relative;
  margin-bottom: 40px;

  .fit-picture {
    border-radius: 20px;
    height: 200px;
    width: 100%;
    background-size: cover;
    background-repeat: no-repeat;
  }
  .btn {
    position: absolute;
    bottom: -20px;
    right: -0.5px;
    border: none;
    outline: none;
    display: flex;
    align-items: center;
    background-color: #fc9400;
    color: black;
    padding: 20px 30px;
    font-size: 1rem;
    text-transform: uppercase;
    border-radius: 20px;
    cursor: pointer;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.294);
    i {
      margin-left: 20px;
      font-size: 1.5rem;
    }
  }
}
button{
    cursor: pointer;
    text-shadow: 3px 0 10px #d3d3d3;
    text-transform: uppercase;   
    border: #0000;
    margin-top: 1em;
    margin-right: 1em;
    padding: 1em;
    font-weight: bolder;
    text-decoration: none;
    border-radius: 15px;
    box-shadow: 1px 12px 40px -2px #000000c4;
    }
.title {
  text-align: center;
  padding: 40px 40px 60px;
  h1 {
    color: black;
    font-weight: bolder;
    padding-bottom: 10px;
    font-size: 24px;
    text-shadow: 0 0 5px #d4b333;    
  }
  .container__text__star span {
    font-size: 0.8rem;
    color: #ffa800;
    margin: 25px 1px 20px;
  }
  p {
    font-size: 18px;
    line-height: 1.2;
  }
  .container__text__timing {
    display: flex;
    margin: 20px 0 10px;
    .container__text__timing_time {
      margin-right: 40px;
    }
    h2 {
      margin-bottom: 5px;
      font-size: 1rem;
      font-weight: 400;
      color: #818189;
    }
  }
}
</style> 
