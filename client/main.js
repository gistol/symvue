import Vue from "vue";
import VueAnalytics from "vue-analytics";
import BootstrapVue from "bootstrap-vue";
import "./plugins/fontawesome";
import App from "./App";
import router from "./router";

Vue.use(VueAnalytics, {
  id: "UA-",
  router
});

Vue.use(BootstrapVue);

const main = new Vue({
  el: "#app",
  router,
  components: { App },
  template: "<App/>"
});
