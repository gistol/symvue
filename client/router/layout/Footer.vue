<template>
  <footer class="my-3">
    <b-container>
      <b-row class="text-center">
        <b-col>
          <span class>
            <a class="text-dark category" :title="now" v-b-tooltip.hover href target="_blank">
              Built
              with
              <font-awesome-icon :icon="icons.love"/>
            </a>
          </span>
        </b-col>
      </b-row>
    </b-container>
  </footer>
</template>

<script>
export default {
  computed: {
    now() {
      return new Date().getFullYear();
    }
  },
  data() {
    return {
      icons: {
        love: ["fas", "heart"]
      }
    };
  }
};
</script>

<style>
footer {
  padding-top: 3rem;
  padding-bottom: 3rem;
}

footer p {
  margin-bottom: 0.25rem;
}
</style>