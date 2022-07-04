<template>
  <section>
    <footer class="footer-distributed">
      <div class="footer-center">
        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>O'Clock</span> Promo Boson</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>09 99 99 99 99</p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p>
            <a href="mailto:support@company.com"
              >support-mural@bricolhelp.com</a
            >
          </p>
        </div>
      </div>

      <div class="footer-left">
        <p class="footer-links">
          <RouterLink to="/">
            <span class="text">Accueil</span>
          </RouterLink>

          <RouterLink to="/tutoriels">
            <span class="text">Tutoriels</span>
          </RouterLink>

          <RouterLink to="team">
            <span class="text">Team</span>
          </RouterLink>

          <RouterLink to="/contact">
            <span class="text">Contact</span>
          </RouterLink>
        </p>
        <div class="footer-icons">
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
          <a href="#"><i class="fa-brands fa-linkedin"></i></a>
          <a href="#"><i class="fa-brands fa-github"></i></a>
        </div>
        <p class="footer-company-name">Bricol'Help © 2022</p>
      </div>

      <div class="footer-right">
        <p class="footer-company-about">
          <span class="right-info" >Info</span>
          Site communautaire, d'entraide et de partage sur le bricolage.
          Ce projet a pu voir le jour à l'aide de quatre développeurs qui ont su se serrer les coudes pendant leur formation.
        </p>

        
      </div>
    </footer>
  </section>
</template>

<script>
export default {
  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
@import"../assets/scss/global";
section {
  width: 100%;
  display: inline-block;
  background: gray;
  text-align: center;
  font-size: 22px;
  font-weight: 700;
  margin-top: 1%;
}

.footer-distributed {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  align-content: center;
  justify-content: center;
  align-items: center;
  justify-items: center;
  background: gray;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
  box-sizing: border-box;
  width: 100%;
  text-align: left;
  font: bold 16px sans-serif;
  padding: 25px 20px;
}
.right-info{
  text-shadow: #d3d3d3 2px 0 20px;
  margin-top: 10px;
}
.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right {
  display: inline-block;
  vertical-align: top;
}

/* Footer left */

.footer-distributed .footer-left {
  width: 100%;
}

/* The company logo */

.footer-distributed h3 {
  color: black;
  font: normal 36px "Open Sans", cursive;
  margin: 0;
}

.footer-distributed h3 span {
  color: #d4b333;
}

/* Footer links */

.footer-distributed .footer-links {
  color: black;
  margin: 20px 0 12px;
  padding: 0;
  text-shadow: #d3d3d3 2px 0 20px;
}

.footer-distributed .footer-links a {
  display: inline-block;
  line-height: 1.8;
  font-weight: 400;
  text-decoration: none;
  color: inherit;
}

.footer-distributed .footer-company-name {
  color: #222;
  font-size: 14px;
  font-weight: normal;
  margin: 0;
}

/* Footer Center */

.footer-distributed .footer-center {
  width: 100%;
}

.footer-distributed .footer-center i {
  background-color: #33383b;
  color: #ffffff;
  font-size: 25px;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  text-align: center;
  line-height: 42px;
  margin: 5px 5px;
  vertical-align: middle;
}

.footer-distributed .footer-center i.fa-envelope {
  font-size: 17px;
  line-height: 38px;
}

.footer-distributed .footer-center p {
  display: inline-block;
  color: black;
  font-weight: 400;
  vertical-align: middle;
  margin: 0;
  text-shadow: #d3d3d3 2px 0 20px;
}

.footer-distributed .footer-center p span {
  display: block;
  font-weight: normal;
  font-size: 14px;
  line-height: 2;
}

.footer-distributed .footer-center p a {
  color: black;
  text-decoration: none;
  
}

.footer-distributed .footer-links a:before {
  content: "  ";
  font-weight: 300;
  font-size: 20px;
  left: 0;
  color: black;
  display: inline-block;
  padding-right: 5px;
  padding-left: 5px;
}

.footer-distributed .footer-links .link-1:before {
  content: none;
}

/* Footer Right */

.footer-distributed .footer-right {
  width: 100%;
}

.footer-distributed .footer-company-about {
  line-height: 20px;
  color: black;
  font-size: 13px;
  font-weight: normal;
  margin: 0;
  
}

.footer-distributed .footer-company-about span {
  display: block;
  color:black;
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 20px;
}

.footer-distributed .footer-icons {
  margin-top: 25px;
}

.footer-distributed .footer-icons a {
  display: inline-block;
  width: 35px;
  height: 35px;
  cursor: pointer;
  background-color: #33383b;
  border-radius: 2px;

  font-size: 20px;
  color: #ffffff;
  text-align: center;
  line-height: 35px;

  margin-right: 3px;
  margin-bottom: 5px;
}




@media (max-width: 767px){


.footer-distributed.footer-center{
  width: 100%;
}
.footer-distributed.footer-left{
  width: 100%;
}
.footer-distributed.footer-right{
  width: 100%;
}
}
@media (max-width: 860px){
  footer.footer-distributed{
    box-sizing: border-box;
    width: 100%;
    text-align: center;
    background: gray;
    grid-template-columns: 1fr;    
    place-content: center;
    place-items: center;
    padding: 25px 20px;
    font: bold 16px sans-serif;
    display: grid;
    box-shadow: 0 1px 1px #0000001f;
    align-content: center;
    justify-content: center;
    align-items: center;
    justify-items: center;
}
}
</style> 