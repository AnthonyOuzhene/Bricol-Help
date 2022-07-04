<template>
<div>
  <h1>Liste des tutoriels</h1>

  <div class="tutoList">
    <TutoExcerpt
      @click="onTutoClick(currentTutorial.id)"
      v-for="currentTutorial in tutoList"
      :key="currentTutorial.id"
      :tutoData="currentTutorial"
    >
    </TutoExcerpt>
  </div>
</div>
</template>

<script>
import tutorialService from "../services/tutorialService.js";
import TutoExcerpt from "../components/TutoExcerpt.vue";

export default {
  data() {
    return {
      tutoList: [],
    };
  },
  components: {
    TutoExcerpt,
  },
  methods: {
    loadTutorials() {
      tutorialService
        .getTutorials()
        .then((response) => {
          this.tutoList = response.data;
          console.log(response);
        })
        .catch((error) => {
          console.error(error);
        });
    },

    // au clic sur un tuto
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
  // Doit se situer au même niveau que la méthode data()
  mounted() {
    // on charge les données depuis l'API
    this.loadTutorials();
  },
};
</script>

<style scoped>
h1 {
  font-size: 2em;
  text-align: center;
  margin-bottom: 1em;
  text-shadow: 0 0 5px #d4b333;
}

@media (max-width: 768px) {
  .tutoList {
    display: grid;
    grid-template-columns: 100%;
    grid-template-columns: 1fr;
    gap: 10px;
  }
}
@media (min-width: 1024px) {
  .tutoList {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
}
</style>