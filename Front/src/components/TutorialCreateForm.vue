<template>
  <div class="signup">
    <h1>Proposer un tutoriel</h1>

    <form @submit.prevent="onFormSubmit">
      <div class="field">
        <label class="field__label">Titre</label
        ><input
          v-model="title"
          type="text"
          placeholder="Titre du tutoriel"
          class="field__input"
        />
      </div>

      <!--              <fieldset>
        <legend>Sélectionnez les outils nécessaires</legend>
        <div class="select-box">
          <input class="input-hidden" v-model="tools" />
          <label
            for="tools-select"
            v-for="tools in toolList"
            :key="tools.id"
            :value="tools.id"
          >
            <input class="name-select" type="checkbox" />
            {{ tools.name }}
          </label>
        </div>
      </fieldset> -->

      <div class="select_tool">
        <legend>Sélectionnez les outils nécessaires</legend>
        <select multiple for="tools-select" >
          <option value="">--Selectionnez dans la liste--</option>
          <option v-for="tools in toolList" :key="tools.id" :value="tools.id">
            {{ tools.name }}
          </option>
        </select>
        <div class="indication">
          <p>Maintenez la touche CTRL pour choisir plusieurs outils</p>
        </div>
      </div>

      <div class="select_material">
        <legend>Sélectionnez les matériaux nécessaires</legend>
        <select multiple for="material-select">
          <option value="">--Selectionnez dans la liste--</option>
          <option
            for="materials-select"
            v-for="materials in materialList"
            :key="materials.id"
            :value="materials.id"
          >
            {{ materials.name }}
          </option>
        </select>
        <div class="indication">
          <p>Maintenez la touche CTRL pour choisir plusieurs outils</p>
        </div>
      </div>

      <div class="select_categoryTypes">
        <legend>Sélectionnez les matériaux nécessaires</legend>
        <select multiple for="categoryTypes-select">
          <option value="">--Selectionnez dans la liste--</option>
          <option
            for="categoryTypes-select"
            v-for="categoryTypes in categoryTypeList"
            :key="categoryTypes.id"
            :value="categoryTypes.id"
          >
            {{ categoryTypes.name }}
          </option>
        </select>
        <div class="indication">
          <p>Maintenez la touche CTRL pour choisir plusieurs outils</p>
        </div>
      </div>

      <!--       <fieldset>
        <legend>Sélectionnez les matériaux nécessaires</legend>
        <div class="select-box">
          <input class="input-hidden" v-model="materials" />
          <label
            for="materials-select"
            v-for="materials in materialList"
            :key="materials.id"
            :value="materials.id"
          >
            <input class="name-select" type="checkbox" />
            {{ materials.name }}
          </label>
        </div>
      </fieldset>

      <fieldset>
        <legend>Sélectionnez les catégories adéquates</legend>
        <div class="select-box">
          <input class="input-hidden" v-model="categoryTypes" />
          <label
            for="categoryTypes-select"
            v-for="categoryTypes in categoryTypeList"
            :key="categoryTypes.id"
            :value="categoryTypes.id"
          >
            <input class="name-select" type="checkbox" />
            {{ categoryTypes.name }}
          </label>
        </div>
      </fieldset> -->

      <div class="field">
        <label class="field__level">Niveau de difficulté</label
        ><input
          v-model="rating"
          type="text"
          placeholder="Note"
          class="field__input"
        />
      </div>

      <div class="stars">
        <i class="fa fa-star gold"></i>
        <i class="fa fa-star gold"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </div>

      <div class="field">
        <label class="field__time">Temps estimé</label
        ><input
          v-model="estimated_time"
          type="text"
          placeholder="Temps estimé"
          class="field__input"
        />
      </div>

      <div class="field-realisation">
        <label class="field__rea">Etapes de réalisation</label>
      </div>
      <div class="textarea">
        <textarea
          v-model="content"
          type="text"
          placeholder="realisation"
          class="field__input"
        />
      </div>

      <div v-if="errorMessages" class="alert error">
        {{ errorMessages }}
      </div>
      <section class="button-bottom">
        <div class="validate-button">
          <button class="button" role="submit">Valider</button>
        </div>

        <div class="create-button">
          <RouterLink to="/nouvelle-taxonomie">
            <button class="button">Créer un nouvel outil / matériau</button>
          </RouterLink>
        </div>
      </section>
    </form>
  </div>
</template>

<script>
import tutorialService from "../services/tutorialService.js";
import toolService from "../services/toolService.js";
import materialService from "../services/materialService.js";
import categoryTypeService from "../services/categoryTypeService.js";

export default {
  data() {
    return {
      title: "",
      content: "",
      rating: "",
      estimated_time: "",
      errorMessages: "",
      toolList: [],
      materialList: [],
      categoryTypeList: [],
      tools: "",
      materials: "",
      categoryTypes: "",
    };
  },
  methods: {
    onFormSubmit() {
      const errors = [];

      if (this.title.length < 10) {
        errors.push("Le titre doit contenir au moins dix caractères.");
      }

      if (this.content.length < 10) {
        errors.push(
          "Les étapes de réalisation doivent contenir au moins dix caractères."
        );
      }

      if (this.rate > 5) {
        errors.push("le niveau de difficulté doit être compris entre 1 et 5");
      }

      if (this.estimated_time.length < 5) {
        errors.push("le temps estimé doit être une durée valide");
      }

      this.errorMessages = errors.join(", ");

      const formData = {
        title: this.title,
        content: this.content,
        rating: this.rating,
        estimated_time: this.estimated_time,
        tools: this.tools,
        materials: this.materials,
        categoryTypes: this.categoryTypes,
      };
      // si pas d'erreur => on envoie les données à l'API
      if (!this.errorMessages) {
        tutorialService
          .createTutorial(formData)
          .then((response) => {
            if (!response.data.statusCode || response.data.statusCode === 201) {
              this.$router.push({ name: "tutoList" });
            } else {
              this.errorMessages = response.data.message;
            }
          })
          .catch((error) => {
            this.errorMessages = error.message;
          });
      }
    },

    loadTools() {
      toolService
        .getTools()
        .then((response) => {
          this.toolList = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    loadMaterials() {
      materialService
        .getMaterials()
        .then((response) => {
          this.materialList = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    loadCategoryTypes() {
      categoryTypeService
        .getCategoryTypes()
        .then((response) => {
          this.categoryTypeList = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
  mounted() {
    this.loadTools();
    this.loadMaterials();
    this.loadCategoryTypes();
  },
};
</script>

<style lang="scss" scoped>
.signup {
  width: 80%;
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
  box-sizing: content-box;
  margin-bottom: 20px;
}
.select-box {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  justify-content: center;
  justify-items: center;
  align-items: baseline;
}
fieldset {
  display: contents;
  padding-left: 10%;
  padding-right: 10%;
}
input.field_input {
  padding-left: 10%;
  padding-right: 10%;
}
.necessary {
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  align-content: center;
  justify-content: center;
  align-items: center;
}
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

h1 {
  color: #545454;
  font-size: 1.7em;
  justify-content: center;
  display: flex;
  margin: 30px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.5s ease-in-out;
  padding-top: 30px;
  text-shadow: 0 0 5px #d4b333;
}
legend {
  color: #545454;
  font-size: 1.7em;
  justify-content: center;
  display: flex;
  margin: 30px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.5s ease-in-out;
  padding-top: 30px;
  text-shadow: 0 0 5px #d4b333;
}
input {
  max-width: 300px;
  height: 40px;
  background: #ffffff;
  justify-content: center;
  display: flex;
  margin: 20px auto;
  border: none;
  outline: none;
  border-radius: 5px;
  // width: 50%;
  // padding-left: 10%;
  // padding-right: 10%;
}
.field {
  display: grid;
  grid-template-columns: 1fr;
  justify-items: center;
}
.field__rea,
.field__time,
.field__level {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-content: center;
  justify-content: center;
  align-items: center;
}

.textarea {
  display: flex;
  justify-content: center;
  margin: 10px;
}
.button {
  padding: 1em;
  width: 50%;
  text-align: center;
}
button {
  width: auto;
  max-width: 300px;
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
  border-radius: 15px;
  transition: 0.2s ease-in;
  cursor: pointer;
  box-shadow: 1px 12px 40px -2px rgba(0, 0, 0, 0.77);
}

.rating {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.stars {
  justify-content: center;
  display: flex;
  flex-wrap: nowrap;
  align-content: center;
  align-items: center;
  font-size: 1em;
  margin-top: 10px;
}

/* By default, a star is in gray,
   with padding and a hand-shaped slider. */
.fa-star {
  color: gray;
  cursor: pointer;
  padding: 0.0625rem;
}

/* If it also carries the '.gold' class, it will be yellow. */
.fa-star.gold {
  color: #ffdc0f;
}

/**
	 * And there operates the magic of the ':hover'!
	 */

/* At ":hover" state on parent '.rating',
	we force ALL the stars to turn yellow. */
.stars:hover .fa-star {
  color: #ffdc0f;
}
/* And if the mouse hovers over a particular star,
	we select all the stars that are AFTER this one
	thanks to the operator '~' and we force them in GRAY. */
.stars .fa-star:hover ~ .fa-star {
  color: gray;
}

p,
label {
  font: 1rem "Fira Sans", sans-serif;
  color: #545454;
  margin: 10px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.5s ease-in-out;
}
label {
  display: grid;
  grid-template-columns: 1fr 1fr;
  justify-content: center;
  align-items: center;
  justify-items: end;
}
.input-hidden {
  display: none;
}
.tool {
  display: flex;
}
section.button-bottom {
  display: grid;
}
.validate-button {
  margin: 10px;
}
.create-button {
  margin: 30px;
}
.field__input {
  // text-transform: uppercase;
  box-shadow: 1px 12px 40px -2px rgba(0, 0, 0, 0.77);
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

textarea.field__input {
  padding-top: 36px;
  width: 300px;
  height: 80px;
  border-radius: 5px;
}
a {
  text-decoration: none;
}

.select_tool, .select_material, .select_categoryTypes {
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: center;
    align-items: center;
}
select {
  min-width: 300px;
  min-height: 100px;
}

/* RESPONSIVE */

@media (max-width: 860px) {
  .select-box {
    grid-template-columns: 1fr 1fr 1fr;
  }
}
@media (max-width: 700px) {
  .select-box {
    grid-template-columns: 1fr 1fr;
  }
}
@media (max-width: 430px) {
  .select-box {
    grid-template-columns: 1fr;
  }
}
@media (max-width: 590px) {
  .signup {
    width: 80%;
  }
}

@media (max-width: 400px) {
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