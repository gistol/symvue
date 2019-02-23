import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./pages/MyApp_Home";
import Album from "./pages/MyApp_Album";

Vue.use(VueRouter);

const router = new VueRouter({
  mode: "history",
  routes: [
    {
      path: "/",
      name: "Home",
      component: Home
    },
    {
      path: "/album",
      name: "Album",
      component: Album
    }
    // {
    //     'path': '/another-url',
    //     'component': Album,
    // }
  ]
});

export default router;
