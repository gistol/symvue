<template>
  <b-navbar :class="navbar">
    <div class="container d-flex justify-content-between">
      <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

      <b-navbar-brand href="/">
        <font-awesome-icon style="font-size: " class="text-secondary" :icon="icons.imdb"/>
        <span class="ml-2">{{ brand_name }}</span>
      </b-navbar-brand>

      <b-collapse is-nav id="nav_collapse" class="navbar-collapse justify-content-end">
        <b-navbar-nav>
          <li class="nav-item">
            <a title="Email" class="nav-link" v-b-tooltip.hover href="mailto:">
              <font-awesome-icon :icon="icons.at"/>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              title="Instagram"
              v-b-tooltip.hover
              href="https://instagram.com/paddingtonbear"
              target="_blank"
            >
              <font-awesome-icon :icon="icons.instagram"/>
            </a>
          </li>

          <li class="nav-item">
            <a
              class="nav-link"
              title="Github"
              v-b-tooltip.hover
              href="https://github.com/jameshcooper"
              target="_blank"
            >
              <font-awesome-icon :icon="icons.github"/>
            </a>
          </li>
        </b-navbar-nav>
      </b-collapse>
    </div>
  </b-navbar>
</template>

<script>
export default {
  name: "NavBar",
  props: ["brand_name"],
  data() {
    return {
      navbar: {
        navbar: true,
        "navbar-dark": true,
        "navbar-expand-lg": true,
        "bg-primary": true,
        toggleable: "md"
      },
      icons: {
        imdb: "star",
        at: "at",
        twitter: ["fab", "twitter-square"],
        facebook: ["fab", "facebook-square"],
        instagram: ["fab", "instagram"],
        github: ["fab", "github"],
        skype: ["fab", "skype"]
      }
    };
  }
};
</script>

<style scoped>
</style>