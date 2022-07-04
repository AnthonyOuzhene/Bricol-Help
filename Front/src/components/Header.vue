<template>
  <header class="header logo-only">
    <div class="filter">
      <div class="logo-text-avatar-container">
        <div class="text-container">
          <span class="slogan"
            >POUR LES BRICOLEURS QUI EN ON MARRE TOT !</span
          >
        </div>
        <RouterLink to="/">
          <img
            class="logo"
            src="../assets/images/Bricol__Help-removebg-preview.png"
          />
        </RouterLink>
      </div>
      <div class="navigation-container">
        <input type="checkbox" class="toggler" />
        <div class="hamburger">
          <div></div>
        </div>

        <div class="menu">
          <div class="iconTextMenu-container">
            <ul>
              <li>
                <input type="checkbox" class="toggler" />
                <RouterLink to="/">
                  <span class="icon">
                    <i class="fa-solid fa-house"></i>
                  </span>
                  <span class="text">Accueil</span>
                </RouterLink>
              </li>

              <li>
                <RouterLink to="/tutoriels">
                  <span class="icon">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                  </span>
                  <span class="text">Tutoriels</span>
                </RouterLink>
              </li>

              <li>
                <RouterLink to="/team">
                  <span class="icon">
                    <i class="fa-solid fa-people-carry-box"></i>
                  </span>
                  <span class="text">Team</span>
                </RouterLink>
              </li>

              <li>
                <RouterLink to="/contact">
                  <span class="icon">
                    <i class="fa-solid fa-headset"></i>
                  </span>
                  <span class="text">Contact</span>
                </RouterLink>
              </li>

              <li class="li-dropdown" v-if="isUserConnected">
                <div class="dropdown">
                  <button class="dropbtn">
                    <div class="dropbtn-content">
                      <span class="icon">
                        <img
                          class="bulb"
                          href="#"
                          src="../assets/images/on.png"
                        />
                      </span>

                      <span class="text" v-if="isUserConnected"
                        >{{ fullName }}
                        <i class="fa fa-caret-down"></i>
                      </span>
                    </div>
                  </button>
                  <div class="dropdown-content">
                    <a href="javascript:void(0)" @click="onDisconnectClick"
                      >Déconnexion</a
                    >
                    <RouterLink to="/favoris">Mes Favoris</RouterLink>
                    <RouterLink to="/nouveau-tutoriel"
                      >Proposer un Tutoriel</RouterLink
                    >
                  </div>
                </div>
              </li>
              <li v-else>
                <RouterLink to="/login">
                  <span class="icon">
                    <img class="bulb" href="#" src="../assets/images/off.png" />
                  </span>
                  <span class="text">Connexion</span>
                </RouterLink>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import userService from "../services/userService";

export default {
  data() {
    return {};
  },

  props: ["isUserConnected"],

  methods: {
    onDisconnectClick() {
      this.$store.commit("setUserConnected", false);
      userService.disconnectUser();
    },
  },
  computed: {
    fullName() {
      const firstname = this.$store.state.firstname;
      const lastname = this.$store.state.lastname;
      return firstname + " " + lastname;
    },
  },
};
</script>

<style lang="scss">
//****** header.scss (start code) ******//

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.header {
  text-decoration: none;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  background-image: url("https://www.masculin.com/wp-content/uploads/sites/2/2022/03/outils-de-bricolage-jaunes-1568x788.jpg.webp");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: bottom;
  position: relative;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  box-shadow: 0px 0px 10px rgba(20, 20, 20, 0.2);
  top: 0;
  line-height: 1;
  margin-bottom: 1%;
  height: 100%;

  .filter {
    background-color: rgba(255, 255, 255, 0.3);
  }

  .logo-text-avatar-container {
    display: flex;
    align-items: center;

    .logo {
      vertical-align: middle;
      opacity: 1;
    }

    .text-container {
      display: flex;

      .slogan {
        font-size: 30px;
        font-weight: 900;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        text-shadow: #d4b333 1px 0px 10px;
        padding: 0 5%;
        text-align: center;
      }
    }
  }
}

.bulb {
  display: flex;
  justify-content: center;
  height: 21px;
  width: 20px;
}
.icon {
  display: flex;
  justify-content: center;
}

.bulb-icon-text {
  display: flex;
  justify-content: center;
}

.icon-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

//****** header.scss (end code) ******//

//** Dropdown user connected (start code) **//

.dropdown {
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-decoration: none;
  font-size: 20px;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  z-index: 1;
}

.dropdown .dropbtn {
  text-decoration: none;
  font-size: 20px;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  border: none;
  border-radius: 10px 10px 0 0;
  outline: none;
  color: rgb(0, 0, 0);
  background-color: inherit;
  margin: 0;
  width: 100%;
}

.dropbtn-content {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.fa.fa-caret-down::before {
  display: none;
}

.navbar a:hover,
.dropdown:hover .dropbtn {
  background-color: #545454;
  color: #d4b333;
  border-radius: 10px;
}

.dropdown-content {
  display: none;
  background-color: darkgrey;
}

.dropdown-content a {
  color: black;
  padding: 12px;
  text-decoration: none;
  display: flex;
  justify-content: center;
  text-align: center;
}

.dropdown-content a:hover {
  background-color: #545454;
  border-radius: 10px;
  color: #d4b333;
}

.dropdown:hover .dropdown-content {
  display: flex;
  flex-direction: column;
  justify-content: center;
  border-radius: 0 0 10px 10px;
  z-index: 1;
}

//** Dropdown user connected (end code) **//

@media (min-width: 600px) {
  .header {
    border-radius: 0 0 10px 10px;

    &.logo-only {
      justify-content: center;
    }
  }

  .filter {
    border-radius: 0 0 10px 10px;
  }

  .logo-text-avatar-container {
    justify-content: space-around;
    //padding: 5% 0;

    .logo {
      height: 10rem;
      width: 10rem;
    }
  }

  .toggler {
    display: none;
  }

  .menu {
    background: darkgrey;
    width: 100%;
    height: 80px;
    border-radius: 10px;

    /* APPLYING TRANSITION TO THE MENU :  */

    transition: all 0.4s ease;

    display: flex;
    justify-content: center;
    align-items: center;
  }

  .menu > div {
    width: 100%;
    height: 100px;
  }

  .menu > div > ul {
    width: 100%;
    height: 100px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
  }

  .menu > div > ul > li {
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none;
  }
  .menu > div > ul > li > a {
    color: rgb(0, 0, 0);
    font-size: 20px;
    text-decoration: none;
  }

  .menu > div > ul > li > a > span {
    display: flex;
    justify-content: center;
  }

  .menu > div > ul > li > a:hover {
    color: #d4b333;
  }

  .dropdown .dropbtn {
    padding-bottom: 5%;
    padding-top: 5%;
  }

  .li-dropdown .dropdown:hover {
    margin-top: 75%;
    box-shadow: 0px 0px 10px rgba(20, 20, 20, 0.2);
    border-radius: 10px;
  }
}

@media (max-width: 600px) {
  .logo-text-avatar-container {
    align-items: flex-start;
    justify-content: right;
    padding: 0;
  }

  .header {
    .logo-text-avatar-container {
      .logo {
        width: 5rem;
        height: 5rem;
      }

      .text-container {
        display: none;
        width: 0%;
      }
    }
  }

  .first-part {
    display: none;
  }

  .navigation-container {
    margin: 0;
    padding: 0;
    position: relative;
    height: 40px;
  }

  //****** menu burger code (start) ******//

  .toggler {
    /* ALWAYS KEEPING THE TOGGLER OR THE CHECKBOX ON TOP OF EVERYTHING :  */
    z-index: 30000;
    height: 40px;
    width: 40px;
    position: absolute;
    top: 0;
    left: 0;
    cursor: pointer;
    opacity: 0;
    margin: 0;
  }

  .hamburger {
    position: absolute;
    top: 0;
    left: 0;
    height: 40px;
    width: 40px;
    padding: 0.6rem;
    background: #545454;
    border-radius: 10px;

    /* FOR DISPLAYING EVERY ELEMENT IN THE CENTER : */

    display: flex;
    align-items: center;
    justify-content: center;
  }

  /* CREATING THE MIDDLE LINE OF THE HAMBURGER : */

  .hamburger > div {
    position: relative;
    top: 0;
    left: 0;
    background: #d4b333;
    height: 2px;
    width: 60%;
    transition: all 0.4s ease;
  }

  /* CREATING THE TOP AND BOTTOM LINES : 
TOP AT -10PX ABOVE THE MIDDLE ONE AND BOTTOM ONE IS 10PX BELOW THE MIDDLE: */

  .hamburger > div::before,
  .hamburger > div::after {
    content: "";
    position: absolute;
    top: -10px;
    background: #d4b333;
    width: 100%;
    height: 2px;
    transition: all 0.4s ease;
  }

  .hamburger > div::after {
    top: 10px;
  }

  /* IF THE TOGGLER IS IN ITS CHECKED STATE, THEN SETTING THE BACKGROUND OF THE MIDDLE LAYER TO COMPLETE BLACK AND OPAQUE :  */

  .toggler:checked + .hamburger > div {
    background: rgba(0, 0, 0, 0);
    z-index: 20000;
  }

  .toggler:checked + .hamburger > div::before {
    top: 0;
    transform: rotate(45deg);
    background: black;
  }

  /* AND ROTATING THE TOP AND BOTTOM LINES :  */

  .toggler:checked + .hamburger > div::after {
    top: 0;
    transform: rotate(135deg);
    background: black;
  }

  /* MAIN MENU WITH THE DARKGREY BACKGROUND AND THE TEXT :  */

  .menu {
    background: darkgrey;
    width: 0%;

    /* APPLYING TRANSITION TO THE MENU :  */

    transition: all 0.4s ease;

    display: flex;
    align-items: center;
  }

  /* IF THE TOGGLER IS CHECKED, THEN INCREASE THE WIDTH OF THE MENU TO 30% , CREATING A SMOOTH EFFECT :  */

  .toggler:checked ~ .menu {
    width: 100%;
    padding-top: 5%;
    position: absolute;
    border-radius: 10px;
    z-index: 10000;
  }

  /* STYLING THE LIST :  */

  .menu > div {
    display: flex;
    justify-content: center;
    width: 100%;
    height: 73vh;

    /* HIDDEN INITIALLY  :  */

    visibility: hidden;
  }

  .menu > div > ul {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
  }

  .menu > div > ul > li {
    display: flex;
    justify-content: center;
    list-style: none;
  }

  .menu > div > ul > li > a {
    color: black;
    text-decoration: none;
    font-size: 20px;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  }

  .menu > div > ul > li > a > span {
    display: flex;
    justify-content: center;
  }

  /* WHEN THE TOGGLER IS CHECKED, CHANGE THE VISIBILITY TO VISIBLE :  */

  .toggler:checked ~ .menu > div > ul {
    transition: visibility 0.4s ease;
    transition-delay: 0.1s;
    visibility: visible;
  }

  .toggler:checked ~ .menu > div > ul > li > a:hover {
    color: #d4b333;
  }

  //****** menu burger code (end) ******//

  .dropdown .dropbtn {
    text-decoration: none;
    font-size: 20px;
    display: flex;
    justify-content: center;
    padding-bottom: 10%;
    padding-top: 10%;
  }

  .li-dropdown .dropdown:hover {
    margin-top: 0;
    padding-top: 0;
    box-shadow: 0px 0px 10px rgba(20, 20, 20, 0.2);
    border-radius: 10px;
  }
}
</style>