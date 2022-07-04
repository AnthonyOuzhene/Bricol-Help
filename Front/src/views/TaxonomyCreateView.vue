<template>
    <TaxonomyCreateForm v-if="isUserConnected"></TaxonomyCreateForm>
</template>

<script>
import TaxonomyCreateForm from '../components/TaxonomyCreateForm.vue';

export default {
      components: {
    TaxonomyCreateForm,
  },
  computed: {
    isUserConnected() {
      return this.$store.state.isUserConnected;
    },
  },
}
</script>

<style lang="scss" scoped>

</style>