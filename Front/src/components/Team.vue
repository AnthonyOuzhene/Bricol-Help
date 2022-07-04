<template>
  <main class="team">    
    <aside class="profile-card">
      <header>
        <a href="#">
          <img src="../assets/images/ao.jpg" />
        </a>

        <h1>Anthony Ouzhene</h1>

        <h2>- Git Master -</h2>
      </header>

      <div class="profile-bio">
        <p>
          Aime plus Vue.js que Vue.js ne l'aime. Sinon, il préfère plus la
          pop-culture que la bricolage-attitude.
          <br />
          PS : Vive le back !
        </p>
      </div>
    </aside>
    <aside class="profile-card">
      <header>
        <a href="#">
          <img src="../assets/images/jp.jpg" />
        </a>

        <h1>Julien Pichereau</h1>

        <h2>- Product Owner -</h2>
      </header>

      <div class="profile-bio">
        <p>
          Porteur du projet, rayon de soleil de la promo mais gardien de la paix
          avant tout !
        </p>
      </div>
    </aside>
    <aside class="profile-card">
      <header>
        <a href="#">
          <img src="../assets/images/jr.jpg" />
        </a>

        <h1>Julien Reisse</h1>

        <h2>- Référent Technique -</h2>
      </header>

      <div class="profile-bio">
        <p>Maitrise le CSS comme un chef mais un peu moins les git merge.</p>
      </div>
    </aside>
    <aside class="profile-card">
      <header>
        <a href="#">
          <img src="../assets/images/pg.jpg" />
        </a>

        <h1>Pascal Genin</h1>

        <h2>- Scrum Master -</h2>
      </header>

      <div class="profile-bio">
        <p>
          Toujours d'un calme olympien même quand ses collègues sont au bout du
          rouleau !
        </p>
      </div>
    </aside>
    <aside class="profile-card">
      <header>
        <a href="#">
          <img src="../assets/images/zorro.jpg" />
        </a>

        <h1>Ludovic Argenty</h1>

        <h2>- Référent pédagogique -</h2>
      </header>

      <div class="profile-bio">
        <p>
          Helper presque attitré du projet.
          <br />
          Il surgit "hors de la nuit" dans le salon Discord pour nous sauver des
          méchants bugs de Vue.js.
        </p>
      </div>
    </aside>    
  </main>
</template>

<script>
export default {
  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
@import "../assets/scss/components/team";
p {
  line-height: 1.5em;
  font-size: 24px;
}
</style> 
