<template>
  <div class="container">
    <article class="tutorial-box">
      <div class="title-tuto">
        <h1>{{ tutoData.title.rendered }}</h1>
      </div>
      <div
        class="fit-picture"
        :style="{ backgroundImage: 'url(' + getTutorialThumbnail() + ')' }"
      ></div>      
      <div class="buttonCategory">
        <div class="container-category" v-if="tutoData._embedded['wp:term']">
          <button
            class="button-category"
            v-for="categoryTypes in tutoData._embedded['wp:term'][1]"
            :key="categoryTypes.id"
          >
            {{ categoryTypes.name }}
          </button>
        </div>
      </div>
      <div class="buttonFavorite">        
        <button class="button-favorites"> ♡ Favoris ♡</button>        
      </div>
      <section class="second-part">
        <div class="tuto-info">
          <div class="back">            
        <RouterLink to="/tutoriels">
        <button class="backList">
          <span class="texte">
          Retour </span>  </button>
        </RouterLink>
      </div>
          <ul class="informations">
            <li>
              <span class="time">Temps de réalisation : 25 min</span>
            </li>
            <li v-if="tutoData._embedded['author']">
              <span v-html="tutoData._embedded['author'][0].name"></span>
            </li>
            <li>
              <span class="date">{{ tutoData.date }}</span>
            </li>
            <li>
              <div class="rating">
                <div class="stars">
                  <i class="fa fa-star gold"></i>
                  <i class="fa fa-star gold"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="necessary">
          <div class="necessary-tool">
            <section class="tools">
              <h2>Outils</h2>
              <ul class="back-content" v-if="tutoData._embedded['wp:term']">
                <li
                  v-for="tools in tutoData._embedded['wp:term'][2]"
                  :key="tools.id"
                >
                  {{ tools.name }}
                </li>
              </ul>
            </section>
          </div>
          <div class="necessary-material">
          <section class="materials">
            <h2>Matériaux</h2>

            <ul class="back-content" v-if="tutoData._embedded['wp:term']">
              <li
                v-for="materials in tutoData._embedded['wp:term'][0]"
                :key="materials.id"
              >
                {{ materials.name }}
              </li>
            </ul>
          </section>
          </div>
        </div>
        <section class="realisation">
          <h2>Réalisation</h2>
          <div class="back-content" v-html="tutoData.content.rendered"></div>
        </section>
        <span>
          <h2>Commentaires</h2>
        </span>
        <div class="comment" v-for="comment in commentList" :key="comment.id">
          <p class="author">{{ comment.author_name }}:</p>
          <p class="commentaire" v-html="comment.content.rendered"></p>
        </div>
        <div class="comment-form" v-if="isUserConnected">
          <h2>ajouter un commentaire</h2>

          <form @submit.prevent="onCommentSubmit">
            <div>
              <div class="field">
                <textarea
                  v-model="commentContent"
                  placeholder="    Le texte de votre commentaire  "
                  class="textarea field__input"
                ></textarea>
              </div>
            </div>

            <button type="submit" class="button">Envoyer</button>
          </form>
        </div>
      </section>
    </article>
  </div>
</template>

<script>
import tutorialService from "../services/tutorialService.js";
import commentService from "../services/commentService.js";

export default {
  data() {
    return {
      tutoData: {
        title: {
          rendered: "",
        },
        _embedded: {},
        content: { rendered: "" },
      },
      commentList: [],
      commentContent: "",
    };
  },

  computed: {
    isUserConnected() {
      return this.$store.state.isUserConnected;
    },
  },

  methods: {
    getTutorialThumbnail() {
      // si on n'a pas de thumbnail
      if (!this.tutoData.thumbnail) {
        return "https://source.unsplash.com/collection/157&random=100";
      } else {
        return this.tutoData.thumbnail;
      }
    },

    onCommentSubmit() {
      // on accède à la route courante (et à ses paramètres) via this.$route (/!\ != this.$router)
      commentService
        .postComment(this.$route.params.tutorielId, this.commentContent)
        .then((response) => {
          console.log(response);
          this.updateCommentList();
        });
    },
    updateCommentList() {
      commentService
        .getComments(this.$route.params.tutorielId)
        .then((response) => {
          console.log(response);
          this.commentList = response.data;
        });
    },
  },

  mounted() {
    tutorialService
      .getSingleTutorial(this.$route.params.tutorielId)
      .then((response) => {
        // placer ces données dans la data tutoData
        this.tutoData = response.data;
      });

    this.updateCommentList();
  },
};
</script>

<style lang="scss" scoped>

@import"../assets/scss/global";

.container {
  background: #d3d3d3;
  border-radius: 20px;
  margin: 5px;
  display: grid;
  grid-template-columns: 1fr;
  align-content: center;
  justify-content: center;
  align-items: center;
  justify-items: center;
  width: auto;
}
h1{
  text-shadow: 0 0 5px #d4b333;
}
.tutorial-box {
  width: 98%;
  // center image but center second part
  display: grid;
  align-content: center;
  justify-items: stretch;
}

.fit-picture {
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  object-fit: contain;
  width: 100%;
  height: 400px;
  border-radius: 20px;
  margin-bottom: 40px;
}
.title-tuto {
  padding: 20px;
  display: flex;
  justify-content: center;
  font-size: 34px;
  margin-block: 10px;
}
.button-category {
  
  border-radius: 20px;
  cursor: pointer;
  text-shadow: #d3d3d3 3px 0 10px;
  font-weight: bolder;
  text-transform: uppercase;
  text-decoration: none;
  /* width: 150px; */
  padding: 2em;
  border: transparent;
  margin-top: 1em;
  margin-right: 1em;
  opacity: 0.8;
  box-shadow: 1px 12px 40px -2px rgba(0,0,0,0.77);
}
.container-category {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  align-content: center;
  justify-content: center;
}
.buttonFavorite {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-content: center;
}

.button-favorites {
  border-radius: 5px;
  cursor: pointer;
  text-shadow: #d3d3d3 3px 0 10px;
  font-weight: bolder;
  text-transform: uppercase;
  text-decoration: none;
  width: 150px;
  padding: 1.5em;
  border: solid red 2px;
  margin-top: 1em;
  margin-right: 1em;
  margin-bottom: 1em;
  opacity: 0.8; 
  background: indianred; 
  box-shadow: 1px 12px 40px -2px rgba(0,0,0,0.77);
  
}
// css rating stars
.fa-star {
  color: #fff;
  cursor: pointer;
  padding: 0.0625rem;
}

/* If it also carries the '.gold' class, it will be yellow. */
.fa-star.gold {
  color: #ffdc0f;
}

/* The global parent '.rating' positions the star group and the column link. */
.rating {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 10px;
}

/* The '.stars' group positions the stars
	next to each other without spacing. */
.stars {
  display: inline-flex;
  justify-content: center;
  font-size: 1em;
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
  color: #fff;
}
.second-part {
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  align-content: center;
  background: gray;
  //border-radius: 0 0 20px 20px;
  border-radius: 20px;
  margin-bottom: 20px;
  margin-top: 20px;
  box-shadow: 1px 12px 40px -2px rgba(0,0,0,0.77);
}
.time {
  font-weight: bolder;
}
.author {
  padding-right: 10px;
  font-size: 20px;
  font-weight: bolder;
  text-decoration: underline;
}
li {
  padding: 5px;
}
.informations {
  margin-top: 20px;
  padding: 10px;
}
ul.informations {
  display: grid;
  justify-content: center;
  align-content: center;
  align-items: center;
  justify-items: center;
}
.necessary {  
  display: grid;
  justify-content: center;
  align-items: center;
  justify-items: center;
  align-items: start;
  grid-template-columns: 1fr 1fr;
  padding-bottom: 10px;
  text-align: center;
}
@media (max-width: 767px) {
  .necessary {
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    padding-bottom: 10px;
  }
}
@media (max-width: 767px){
  section.tools {
     margin:1px;
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-content: space-between;
    justify-content: center;
    align-items: center;
    

    
}
  
  section.materials{
     margin:1px;
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-content: space-between;
    justify-content: center;
    align-items: center;
    box-shadow: 1px 12px 40px -2px rgba(0,0,0,0.77);
  }
}
.tools {
  margin-right: 25px;
  width: 300px;
  padding: 10px;
  background: #d4b333;
  border-radius: 5px;
  border: solid black 1px;
  text-transform: uppercase;
  display: grid;
  justify-content: center;
  justify-items: center;
  align-items: baseline;
  box-shadow: 1px 12px 40px -2px rgba(0,0,0,0.77);
}

.materials {
  margin-left: 25px;
  width: 300px;
  padding: 10px;
  background: #d4b333;
  border-radius: 5px;
  border: solid black 1px;
  text-transform: uppercase;
  display: grid;
  justify-content: center;
  align-items: baseline;
  box-shadow: 1px 12px 40px -2px rgba(0,0,0,0.77);
}
.realisation {
  
  margin: 10px;
  padding: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.back-content{
  font-size: 18px;
  line-height: 1.5;
}
h2 {
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  align-content: center;
  justify-content: center;
  align-items: center;
  padding: 10px;
  font-weight: bolder;
  font-size: 24px;
  text-decoration: underline;
  text-align: center;
  margin-bottom: 20px;
  text-shadow: 0 0 5px #d4b333;
}
.comment {
  padding: 10px;
  display: flex;
  flex-direction: row;
  align-items: baseline;
  align-content: center;
  flex-wrap: nowrap;
  background: #d3d3d3;
  margin: 2px;
  border-radius: 6px;
  margin-bottom: 15px;
}
p.author {
  padding-right: 10px;
  font-size: 20px;
  font-weight: bolder;
  text-decoration: underline;
}
.commentaire {
  font-style: italic;
}
.field {
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  align-content: center;
  justify-content: center;
  align-items: center;
  padding-top: 10px;
  padding-bottom: 10px;
  margin-left: 2px;
  margin-right: 2px;
}
.textarea.field__input {
  border-radius: 10px;
  width: 300px;
  height: 150px;
  box-shadow: 1px 12px 40px -2px rgba(0,0,0,0.77);
}


.button {
  border-radius: 20px;
  cursor: pointer;
  text-shadow: #d3d3d3 3px 0 10px;
  font-weight: bolder;
  text-transform: uppercase;
  text-decoration: none;
  width: 150px;
  padding: 1em;
  border: transparent;
  margin: 1em;
  opacity: 0.8;
}
form {
  display: flex;
  flex-wrap: nowrap;
  flex-direction: column;
  align-content: center;
  justify-content: center;
  align-items: center;
}
.back {
    padding: 20px;
}
.backList {

  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  align-content: flex-end;
  justify-content: center;
  box-sizing: content-box;
  clip-path: polygon(40% 0%, 40% 20%, 100% 20%, 100% 80%, 40% 80%, 40% 100%, 0% 50%);  
  cursor: pointer;
  height: 90px;
  text-shadow: #d3d3d3 3px 0 10px;
  font-weight: bolder;
  text-transform: uppercase;
  text-decoration: none;  
  padding: 10px;
  border: transparent;
  margin-top: 1em;
  margin-right: 1em;
  opacity: 0.8;
  box-shadow: 1px 12px 40px -2px rgba(0,0,0,0.77);
}
span.texte {
    padding: 2em;
}
</style> 