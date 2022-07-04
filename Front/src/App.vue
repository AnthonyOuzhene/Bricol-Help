<template>
  <div>
    <!-- call layouts components-->
    <Header :isUserConnected="isUserLoggedIn"></Header>
    <RouterView> </RouterView>    
    <Footer></Footer>
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

export default {
  data() {
    return {};
  },

  // declaration of external components using in current components
  components: {
    Header,    
    Footer,
  },
  mounted() {
    // on force la réévaluation de la présence du token et la répercution de cet état sur les composants qui utilisent ce state
    this.$store.commit("updateUserStatus");
    this.$store.commit("updateUserFirstname");
    this.$store.commit("updateUserLastname");

  },
  computed: {
    isUserLoggedIn() {
      return this.$store.state.isUserConnected;
    },
  },
};
</script>

<style lang="scss">
// import style of component

@import "./assets/scss/main.scss";
</style>
