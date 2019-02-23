<template>
  <div class="album pt-5">
    <div class="container">
      <div class="row"> 
        <div v-for="(v,k) in album" :key="k" class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg
              class="bd-placeholder-img card-img-top"
              width="100%"
              height="225"
              xmlns="http://www.w3.org/2000/svg"
              preserveAspectRatio="xMidYMid slice"
              focusable="false"
              role="img"
              aria-label="Placeholder: Thumbnail"
            >
              <title>App</title>
              <rect width="100%" height="100%" fill="#2A7797"></rect>
              <image :href="v.path.small" width="100%" height="100%"></image>
              <text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>
            </svg>
            <div class="card-body">
              <p class="card-text">{{ v.name }}</p>
              <p class="card-text">Image width 350px</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div v-for="(v,k) in album" :key="k" class="col-md-12">
          <div class="card mb-4 shadow-sm">
            <svg
              class="bd-placeholder-img card-img-top"
              width="100%"
              height="500"
              xmlns="http://www.w3.org/2000/svg"
              preserveAspectRatio="xMidYMid slice"
              focusable="false"
              role="img"
              aria-label="Placeholder: Thumbnail"
            >
              <title>App</title>
              <rect width="100%" height="100%" fill="#2A7797"></rect>
              <image :href="v.path.medium" width="100%" height="100%"></image>
              <text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>
            </svg>
            <div class="card-body">
              <p class="card-text">{{ v.name }}</p>
              <p class="card-text">Image width 800px</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <pre>{{ album }}</pre>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Section_Album",
  props: ["album"],
  data() {
    return {
      ready: false,
      header: 0
    };
  },
  watch: {
    album() {
      this.ready = true;
    }
  },
  computed: {
    totalPhotos() {
      return this.album.length;
    }
  }
};
</script>