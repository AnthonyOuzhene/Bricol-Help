<template>
  <TutorialCreateForm v-if="isUserConnected"></TutorialCreateForm>
</template>

<script>
import TutorialCreateForm from "../components/TutorialCreateForm.vue";

export default {
  components: {
    TutorialCreateForm,
  },
  computed: {
    isUserConnected() {
      return this.$store.state.isUserConnected;
    },
  },
};
</script>