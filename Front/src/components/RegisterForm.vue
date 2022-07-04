<template>
  <div class="signup">
    <form @submit.prevent="OnRegisterFormSubmit">
      <label for="chk" aria-hidden="true">Inscription</label>

      <input
        v-model="username"
        type="text"
        name="txt"
        placeholder="Pseudo de bricoleur"
      />

      <input type="email"
      v-model="email"
      name="email"
      placeholder="Email" />

      <input
        v-model="password"
        type="password"
        name="password"
        placeholder="Mot de passe"
      />

      <input
        v-model="passwordConfirm"
        type="password"
        name="password_confirm"
        placeholder="Confirmez votre mot de passe"
      />

      <!-- On affiche chaque message contenu dans formErrors : -->
      <div v-if="errorMessages" class="alert error">
        {{ errorMessages }}
      </div>

      <button class="button" role="submit">Valider</button>
    </form>
  </div>
</template>

<script>
import userService from "../services/userService";

export default {
  data() {
    return {
      username: "",
      email: "",
      password: "",
      passwordConfirm: "",
      errorMessages: "",
    };
  },
  methods: {
    OnRegisterFormSubmit() {
      // Préparer les données en stockant les erreurs dans un array
      const errors = [];

      // analyse des valeurs saisies

      // champ pseudo :
      if (this.username.length < 2) {
        errors.push("Le pseudo doit contenir au moins deux caractères.");
      }
      // champ email :
      if (this.email.search("@") === -1 || this.email.search(".")) {
        errors.push("Le format de l'adresse email est incorrect.");
      }
      // champ password :
      if (this.password !== this.passwordConfirm) {
        errors.push("Les mots de passe ne correspondent pas.");
      }

      this.errorMessages = errors.join(", ");

      // Authentifier le user

      // si pas d'erreur => on envoie les données à l'API
      if (!this.errorMessages) {
        userService
          .registerUser({
            username: this.username,
            email: this.email,
            password: this.password,
          })
          .then((response) => {
            // une mauvaise pratique dans le développement de jwt-auth nous oblige à gérer manuellement le status HTTP
            // si jwt auth refuse une action (par ex. registration), il renverra une erreur mais dans une réponse avec code de succès
            if (!response.data.statusCode || response.data.statusCode === 200) {
              // on peut utiliser this.$router qui correspond au routeur instancié dans router.js et fourni à vue dans index.js
              this.$router.push("/login");
            } else {
              this.errorMessages = response.data.message;
            }
          })
          .catch((error) => {
            // sinon (erreur côté WP à la création), on affiche les erreurs dans le template
            this.errorMessages = error.response.data.message;
          });
      }
    }
  },
};
</script>

chk

<style lang="css" scoped>

.form {
  width: 50%;
  background: rgb(84, 84, 84);
  background: linear-gradient(
    360deg,
    rgba(84, 84, 84, 1) 0%,
    rgba(0, 0, 0, 1) 35%,
    rgba(212, 179, 51, 1) 100%
  );
  padding-bottom: 20px;
  overflow: hidden;
  border-radius: 10px;
  box-shadow: 5px 20px 50px #000;
  display: block;
  margin-left: auto;
  margin-right: auto;
 
}

.button {
  padding: 1em;
  width: 30%;
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
  font-size: 1.7em;
  justify-content: center;
  display: flex;
  margin: 30px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.5s ease-in-out;
  padding-top: 30px;
}

input {
  width: 70%;
  height: 40px;
  background: #ffffff;
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
  background: #d4b333;
  font-size: 1em;
  font-weight: bold;
  outline: none;
  border: none;
  border-radius: 5px;
  transition: 0.2s ease-in;
  cursor: pointer;
}

button:hover {
  background: white;
}
.signup {
  width: 50%;
  height: 400px;
  background: rgb(84, 84, 84);
  background: linear-gradient(
    360deg,
    rgba(84, 84, 84, 1) 0%,
    rgba(212, 179, 51, 1) 35%,
    darkgrey 100%
  );
  border-radius: 10 px;
  transition: 0.8s ease-in-out;
  box-shadow: 5px 20px 50px rgb(0, 0, 0);
  display: block;
  margin-left: auto;
  margin-right: auto;
  border-radius: 10px;
}
.login label {
  font-size: 3em;
  color: #545454;
 
}

@media (max-width: 590px) {
  .signup {
    width: 80%;
  }
}


@media (max-width: 400px){
  .signup {
    width: 90%;
  }
}


@media (max-width: 354px) {
  .signup {
    width: 100%;
  }
}
</style> 