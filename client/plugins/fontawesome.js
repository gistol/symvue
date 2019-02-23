import Vue from "vue";
// the component
import { library } from "@fortawesome/fontawesome-svg-core";
import {
  faAt,
  faHome,
  faStar,
  faHeart
} from "@fortawesome/free-solid-svg-icons";
import {
  faTwitterSquare,
  faFacebookSquare,
  faInstagram,
  faGithub,
  faAws,
  faSkype,
  faImdb
} from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(faAt);
library.add(faHome);
library.add(faStar);
library.add(faTwitterSquare);
library.add(faFacebookSquare);
library.add(faInstagram);
library.add(faGithub);
library.add(faHeart);
library.add(faAws);
library.add(faSkype);
library.add(faImdb);

Vue.component(FontAwesomeIcon.name, FontAwesomeIcon);
