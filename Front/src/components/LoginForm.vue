<template>
  <div class="form">
    <input type="checkbox" id="chk" aria-hidden="true" />

    <div class="login">
      <form @submit.prevent="onLoginFormSubmit">
        <label for="chk" aria-hidden="true">Connexion</label>

        <input
          v-model="username"
          type="text"
          name="username"
          placeholder="Pseudo de bricoleur"
          required=""
        />

        <input
          v-model="password"
          type="password"
          name="password"
          placeholder="Mot de passe"
          required=""
        />

        <button class="button" type="submit">Se connecter</button>
        <RouterLink to="/register">
          <button class="button">S'inscrire</button>
        </RouterLink>
      </form>

      <div v-if="errorMessages" class="alert error">
        {{ errorMessages }}
      </div>
    </div>
  </div>
</template>

<script>
import userService from "../services/userService.js";
import store from '../store.js';


export default {
  data() {
    return {
      errorMessages: "",
      username: "",
      password: "",
    };
  },
  methods: {
    onLoginFormSubmit() {
      // on valide les saisies
      const errors = [];

      if (this.username.length <= 3) {
        errors.push("Le nom d'utilisateur n'est pas valide.");
      }

      if (this.password.length <= 3) {
        errors.push("Le mot de passe n'est pas valide.");
      }

      this.errorMessages = errors.join(", ");

      // si pas de message d'erreur
      if (!this.errorMessages) {
        // on s'authentifie avec l'API
        userService
          .connectUser({
            username: this.username,
            password: this.password,
          })
          .then((response) => {
            store.commit("setUserConnected", true);
            // si on s'est bien connecté, on navigue vers la home
            this.$router.push("/");
          })
          .catch((error) => {
            // sinon on affiche l'erreur
            console.log(error);
          });
      }
    },
  },
};
</script>



<style lang="css" scoped>
.form {
  width: 50%;
  background: rgb(84, 84, 84);
  background: linear-gradient(
    360deg,
    rgba(84, 84, 84, 1) 0%,
    rgba(212, 179, 51, 1) 35%,
    darkgrey 100%
  );
  overflow: hidden;
  border-radius: 10px;
  box-shadow: 5px 20px 50px rgb(0, 0, 0);
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.button {
  padding: 1em;
  display: inline-block;
  width: 45%;
  margin: 10px 2.5% 10px 2.5%;
  text-align: center;
}

#chk {
  display: none;
}

.login {
  position: relative;
  width: 100%;
  height: 100%;
}

label {
  color: #545454;
  font-size: 3em;
  justify-content: center;
  display: flex;
  margin: 60px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.5s ease-in-out;
}

input {
  width: 50%;
  height: 40px;
  background: rgb(255, 255, 255);
  justify-content: center;
  display: flex;
  margin: 20px auto;
  padding: 10px;
  border: none;
  outline: none;
  border-radius: 5px;
}

button {
  width: auto;
  max-width: 100%;
  height: auto;
  max-height: 100%;
  margin: auto;
  justify-content: center;
  display: block;
  color: #545454;
  background: rgb(255, 255, 255);
  font-size: 1em;
  font-weight: bold;
  outline: none;
  border: none;
  border-radius: 5px;
  transition: 0.2s ease-in;
  cursor: pointer;
  justify-content: center;
}

button:hover {
  background: white;
}
.signup {
  height: 400px;
  background: rgb(84, 84, 84);
  background: linear-gradient(
    360deg,
    rgba(84, 84, 84, 1) 0%,
    rgba(0, 0, 0, 1) 35%,
    rgba(212, 179, 51, 1) 100%
  );
  border-radius: 10px;
  transform: translateY(-180px);
  transition: 0.8s ease-in-out;
}
.login label {
  font-size: 3em;
  color: #545454;
  transform: scale(0.6);
}



@media (max-width: 590px) {
  input[data-v-2e2a2b] {
    font-size: 80%;
  }
  .form[data-v-2e2a2b] {
    width: 90%;
  }
}

@media (max-width: 378px) {
  .form[data-v-2e2a2b] {
    width: 100%;
  }
}
</style> 