<template>
  <div>
    <div class="text-center">
      <b-spinner v-if="!album" variant="primary" label="Spinning"/>
    </div>
    <section-album v-if="album" :album="album"/>
  </div>
</template>

<script>
import { getAlbum } from "../../plugins/axios";
import SectionAlbum from "../../components/section/SectionAlbum";

export default {
  name: "App_Album",
  props: ["movie"],
  components: {
    SectionAlbum
  },

  data() {
    return {
      album: null
    };
  },

  created() {
    this.fetchAlbum();
  },

  methods: {
    fetchAlbum: function() {
      var jam = this;
      getAlbum(this.movie.imdbID)
        .then(function(response) {
          jam.album = response.data["album"];
        })
        .catch(error => {
          console.log(error.message);
        });
    }
  }
};
</script>