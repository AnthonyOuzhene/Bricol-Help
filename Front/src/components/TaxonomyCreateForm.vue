<template>
  <div class="taxonomy-form">
    <div class="content">
      <div class="title_form">
        <h2>Proposer un nouvel outil</h2>
      </div>
      <div class="form-tool">
        <form class="toolForm">
          <div class="field">
            <label class="field__tool"></label
            ><input
              v-model="toolName"
              type="text"
              placeholder="Nom de l'outil"
              class="field__input"
            />
          </div>
        </form>
      </div>
      <div class="validate-button">
        <button class="button" role="submit" @click="onToolFormSubmit">
          Valider
        </button>
      </div>
    </div>
    <div class="content">
      <div class="title_form">
        <h2>Proposer un nouveau materiau</h2>
      </div>
      <form class="materialForm">
        <div class="field">
          <label class="field__material"></label
          ><input
            v-model="materialName"
            type="text"
            placeholder="Nom du matériau"
            class="field__input"
          />
        </div>
      </form>

      <div v-if="errorMessages" class="alert error">
        {{ errorMessages }}
      </div>
      <div class="validate-button">
        <button class="button" role="submit" @click="onMaterialFormSubmit">
          Valider
        </button>
      </div>
    </div>

    <!-- On affiche chaque message contenu dans formErrors : -->
    <div v-if="errorMessages" class="alert error">
      {{ errorMessages }}
    </div>
  </div>
</template>

<script>
import toolService from "../services/toolService.js";
import materialService from "../services/materialService.js";

export default {
  data() {
    return {
      toolName: "",
      materialName: "",
      errorMessages: "",
    };
  },
  methods: {
    onToolFormSubmit() {
      const errors = [];

      if (this.toolName.length < 2) {
        // on ajoute un message d'erreur dans l'array errors
        errors.push(
          "Le nom de l'outil doit contenir au moins deux caractères."
        );
      }

      this.errorMessages = errors.join(", ");

      if (!this.errorMessages) {
        toolService
          .createTool({ name: this.toolName })
          .then((response) => {
            console.log(response);
            if (!response.data.statusCode || response.data.statusCode === 201) {
              this.$router.push({ name: "tutorial-create" });
            } else {
              this.errorMessages = response.data.message;
            }
          })
          .catch((error) => {
            this.errorMessages = error.message;
          });
      }
    },
    onMaterialFormSubmit() {
      if (this.materialName.length < 2) {
        // on ajoute un message d'erreur dans l'array errors
        errors.push(
          "Le nom du materiau doit contenir au moins deux caractères."
        );
      }

      this.errorMessages = errors.join(", ");

      if (!this.errorMessages) {
        materialService
          .createMaterial({ name: this.materialName })
          .then((response) => {
            console.log(response);
            if (!response.data.statusCode || response.data.statusCode === 201) {
              this.$router.push({ name: "tutorial-create" });
            } else {
              this.errorMessages = response.data.message;
            }
          })
          .catch((error) => {
            this.errorMessages = error.message;
          });
      }
    },
  },
};
</script>

<style lang="scss" scoped>
/*FORM */
.taxonomy-form {
  width: 80%;
  border-radius: 10 px;
  box-sizing: content-box;
  background: linear-gradient(360deg, #545454 0%, #d4b333 35%, #a9a9a9 100%);
  border-radius: 10px;

  margin-bottom: 20px;
  margin-left: auto;
  margin-right: auto;
  padding: 20px;
  transition: all 0.8s ease-in-out;

  box-shadow: 5px 20px 50px #000;
}
.content {
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  align-content: center;
  justify-content: center;
  align-items: center;
}

h2 {
  text-align: center;
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  align-content: center;
  justify-content: center;
  align-items: center;
  padding: 10px;
  font-weight: bolder;
  font-size: 24px;
  text-transform: uppercase;
  color: #545454;
  text-shadow: 0 0 5px #d4b333;
}

.field {
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  align-content: center;
  justify-content: center;
  align-items: center;
  padding: 10px;
  font-weight: bolder;
  font-size: 24px;
  text-transform: uppercase;
  color: #545454;
}
.field__input {
  text-transform: uppercase;
}

.field__input {
  text-align: center;
}
::-webkit-input-placeholder {
  text-align: center;
}
:-moz-placeholder {
  text-align: center;
}

input {
  width: 150px;
  height: 40px;
  background: #ffffff;
  justify-content: center;
  display: flex;
  border: none;
  outline: none;
  border-radius: 5px;
  margin: 10px;
}
.field__material {
  text-align: center;
}
button.button {
  padding: 7px;
  width: 150px;
  max-width: 150px;
  justify-content: center;
  color: #545454;
  background: #d4b333;
  font-size: 1em;
  font-weight: bold;
  outline: none;
  border: none;
  border-radius: 15px;
  transition: 0.2s ease-in;
  cursor: pointer;
  margin: 20px;
  box-shadow: 1px 12px 40px -2px rgba(0, 0, 0, 0.77);
}
.validate-button {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-content: center;
  justify-content: center;
  align-items: center;
}
</style>