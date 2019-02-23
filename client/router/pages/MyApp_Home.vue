<template>
  <b-container>
    <b-row>
      <b-col sm="5" class="text-center">
        <img :src="movie.Poster">
      </b-col>
      <b-col sm="7">
        <pre>{{ movie }}</pre>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  name: "App-Home",
  props: ["movie"]
};
</script>