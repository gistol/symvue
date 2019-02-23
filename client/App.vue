<template>
<body class="my_app">
  <NavBar :brand_name="brand_name"></NavBar>

  <Header :movie="movie"></Header>

  <router-view :movie="movie"></router-view>

  <Footer></Footer>
</body>
</template>

<script>
// layout
import Header from "./router/layout/Header";
import NavBar from "./router/layout/NavBar";
import Footer from "./router/layout/Footer";
export default {
  name: "my_app",

  components: { Header, NavBar, Footer },

  data() {
    return {
      brand_name: null,
      movie: {
        ImdbId: null,
        Title: null,
        Plot: null,
        Poster: null
      },
      album: null
    };
  },

  created() {
    this.brand_name = document.getElementById("appName").dataset.appName;

    var json_onload = document.getElementById("movie");

    this.movie = JSON.parse(json_onload.dataset.movieInfo);
  },

};
</script>

<style lang="scss">
@import "./design/app.scss";
</style>