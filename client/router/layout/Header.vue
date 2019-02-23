<template>
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">{{ movie.Title }}</h1>
      <p class="lead text-muted">{{ movie.Plot }}</p>
      <p>
        <router-link :to="{ name: 'Home'}" class="btn btn-primary my-2">Welcome</router-link>
        <router-link :to="{ name: 'Album'}" class="btn btn-secondary my-2">Photo Gallery</router-link>
      </p>
    </div>
  </section>
</template>

<script>
export default {
  name: "Header",
  props: ["movie"]
};
</script>
<style>
.jumbotron {
  padding-top: 3rem;
  padding-bottom: 3rem;
  margin-bottom: 0;
  background-color: #fff;
}

@media (min-width: 768px) {
  .jumbotron {
    padding-top: 6rem;
    padding-bottom: 6rem;
  }
}

.jumbotron p:last-child {
  margin-bottom: 0;
}

.jumbotron-heading {
  font-weight: 300;
}

.jumbotron .container {
  max-width: 40rem;
}
</style>