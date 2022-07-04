// on importe les fonctions de vue router depuis la dépendance vue-router
import { createRouter, createWebHistory } from 'vue-router';

// on récupère les composants à utiliser avec notre router
import HomeView from "./views/HomeView.vue";
import TutorialView from "./views/TutorialView.vue";
import TutorialSingleView from "./views/TutorialSingleView.vue";
import TutorialCreateView from "./views/TutorialCreateView.vue";
import TaxonomyCreateView from "./views/TaxonomyCreateView.vue";
import RegisterView from "./views/RegisterView.vue";
import LoginView from "./views/LoginView.vue";
import NotFoundView from "./views/NotFoundView.vue";
import TeamView from "./views/TeamView.vue";
import ContactView from "./views/ContactView.vue";


// on définit des routes. C'est un array qui contient des objets sours la forme {path, component} (on ne choisit pes les noms de propriétés)
// chaque objet est une correspondance entre un chemin et un composant

const routes = [
    { path: '/', component: HomeView, name: "homepage" },
    { path: '/tutoriels', component: TutorialView, name: "tutoList" },
    { path: '/tutoriels/:tutorielId', component: TutorialSingleView, name: "tutorial" },
    { path: '/nouveau-tutoriel', component: TutorialCreateView, name: "tutorial-create"},
    { path: '/nouvelle-taxonomie', component: TaxonomyCreateView, name: "taxonomy-create"},
    { path: '/register', component: RegisterView, name: "register"},
    { path: '/login', component: LoginView, name: "login"},
    { path: '/team', component: TeamView, name: "team"},
    { path: '/contact', component: ContactView, name: "contact"},
    { path: '/:pathMatch(.*)*', component: NotFoundView, name: "error"},
]

// on instancie VueRouter avec la fonction createRouter
const router = createRouter({
    // on utilise le mode d'historique "HTML5" => urls classiques ex. /register
    history: createWebHistory(process.env.APP_URL),
    routes, // short for `routes: routes`
});

// on exporte l'instance de VueRouter créée
export default router;