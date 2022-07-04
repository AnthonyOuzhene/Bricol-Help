<template>
  <div class="main-container">
    <h1>Liste des catégories</h1>

    <div class="heading">
      <CategoryTypeExcerpt
        @click="onCategoryTypeFilterClick(currentCategoryType.id)"
        v-model="tutoListByCategory"
        v-for="currentCategoryType in categoryTypeList"
        :key="currentCategoryType.id"
        :categoryTypeData="currentCategoryType"
      >
      </CategoryTypeExcerpt>
    </div>

    <!--     <div>
      <button type="button" @click="clearAllTutorials()">
        Appuyer pour vider la liste
      </button>
    </div> -->

    <div v-show="tutorialList.length > 0">
      <TutoExcerpt
        @click="onTutoClick(currentTutorial.id)"
        v-for="currentTutorial in tutorialList"
        :key="currentTutorial.id"
        :tutoData="currentTutorial"
      >
      </TutoExcerpt>
    </div>
  </div>
</template>


<script>
import categoryTypeService from "../services/categoryTypeService.js";
import tutorialService from "../services/tutorialService.js";
import CategoryTypeExcerpt from "../components/CategoryTypeExcerpt.vue";
import TutoExcerpt from "../components/TutoExcerpt.vue";

export default {
  data() {
    return {
      categoryTypeList: [],
      tutorialList: [],
      tutoListByCategory: [],
      tutoData: {
        _embedded: {},
      },
    };
  },
  components: {
    CategoryTypeExcerpt,
    TutoExcerpt,
  },

  methods: {
    loadCategoryTypes() {
      categoryTypeService.getCategoryTypes().then((response) => {
        this.categoryTypeList = response.data;
      });
    },
    loadTutorialsByCategoryType(id) {
      tutorialService.getTutorialsByCategoryType(id).then((response) => {
        console.log(response.data);
        this.tutorialList = response.data;
      });
    },

    onCategoryTypeFilterClick(id) {
      this.loadTutorialsByCategoryType(id);
    },

    onTutoClick(tutorielId) {
      // on déclenche la navigation vers la route /tutoriel/{id}
      // en passant tutorielId
      this.$router.push({
        name: "tutorial",
        params: {
          tutorielId: tutorielId,
        },
      });
    },
  },

  mounted() {
    this.loadCategoryTypes();
  },

  /*   computed: {
    clearAllTutorials() {
      this.tutorialList = [];
    },
  }, */
};
</script>

<style lang="scss" scoped>


/* HEADING */

 h1 {  
  color: black;
  font-weight: bolder;
  padding-bottom: 10px;
  font-size: 24px;
  margin-bottom: 20px;
  text-align: center;
  text-shadow: 0 0 5px #d4b333;
}

.heading {  
  
  text-align: center;
  display: grid;
  margin-bottom: 50px;
  
}

.heading__title {
  font-weight: 600;
}

.heading__link {
  text-decoration: none;
}

.heading__credits .heading__link {
  color: inherit;
} 
p{
  font-size: 20px;
  line-height: 1.4;
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
</style>