<template>
  <v-footer height="60" class="d-block text-center">
    <span>Footer</span>
  </v-footer>
</template>

<script>
export default {
  name: "Footer",
  computed: {
    appVersion() {
      return this.$store.getters.appVersion;
    },
  },
};
</script>
