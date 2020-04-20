<template>
  <v-container fluid>
    <v-layout row wrap>
      <div class="text-center">
        <v-dialog v-model="showVerifyDialog" width="500" persistent>
          <v-card>
            <v-card-title
              class="headline grey lighten-2 black--text dlgVerifyAccount"
              primary-title
            >
              <v-icon class="orange--text">mdi-information</v-icon>
            </v-card-title>
          </v-card>
        </v-dialog>
      </div>
    </v-layout>
    <ProjectDescription />
  </v-container>
</template>

<script>
export default {
  metaInfo() {
    return {
      title: this.$store.getters.appTitle,
      titleTemplate: `Project`,
    };
  },
  data() {
    return {
      name: "",
      showVerifyDialog: "",
    };
  },
};
</script>
