<template v-slot:activator="{ on }">
  <div>
    <v-app-bar flat>
      <div class="headline text-uppercase ml-0">
        <div v-resize-text>
          <router-link
            :to="{ name: 'home' }"
            tag="span"
            style="cursor: pointer;"
            v-if="isTokenSet"
            >{{ appTitle }}</router-link
          >
          <router-link
            :to="{ name: 'landing' }"
            tag="span"
            style="cursor: pointer;"
            v-else
            >{{ appTitle }}</router-link
          >
        </div>
      </div>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn
          text
          v-for="(item, index) in menuItems"
          :key="index"
          :to="{ name: item.link }"
          exact
          :class="['hidden-sm-and-down', item.class]"
        >
          <v-icon>{{ item.icon }}</v-icon>
          &nbsp;{{ item.title }}
        </v-btn>
      </v-toolbar-items>
    </v-app-bar>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import ResizeText from "vue-resize-text";

export default {
  name: "Toolbar",
  metaInfo() {
    return {
      title: this.$store.getters.appTitle,
      htmlAttrs: {
        lang: this.$i18n.locale,
      },
      meta: [
        { name: "msapplication-TileColor", content: "#ffc40d" },
        { name: "theme-color", content: "#ffffff" },
        {
          name: "apple-mobile-web-app-title",
          content: this.$store.getters.appTitle,
        },
        { name: "application-name", content: this.$store.getters.appTitle },
      ],
      link: [
        {
          rel: "apple-touch-icon",
          sizes: "180x180",
          href: "/apple-touch-icon.png",
        },
        {
          rel: "icon",
          type: "image/png",
          sizes: "32x32",
          href: "/favicon-32x32.png",
        },
        {
          rel: "icon",
          type: "image/png",
          sizes: "16x16",
          href: "/favicon-16x16.png",
        },
        { rel: "manifest", href: "/site.webmanifest" },
        { rel: "mask-icon", color: "#5bbad5", href: "/safari-pinned-tab.svg" },
        { rel: "favicon", href: "/favicon.ico" },
      ],
    };
  },
  directives: {
    ResizeText,
  },
  data() {
    return {
      isDark: false,
      sidebar: false,
    };
  },
  computed: {
    ...mapGetters(["appTitle", "isTokenSet", "user"]),
    admin() {
      return this.user !== null ? this.user.role === "admin" : false;
    },
    adminItems() {
      return [
        {
          title: this.$t("adminItems.CITIES"),
          link: "admin-cities",
          icon: "mdi-city",
          class: "btnAdminCities",
        },
        {
          title: this.$t("adminItems.USERS"),
          link: "admin-users",
          icon: "mdi-account-supervisor",
          class: "btnAdminUsers",
        },
      ];
    },
    menuItems() {
      if (this.isTokenSet) {
        return [
          {
            title: this.$t("menuItems.HOME"),
            link: "home",
            icon: "mdi-home",
            class: "btnHome",
          },
        ];
      }
      return [
        {
          title: this.$t("menuItems.HOME"),
          link: "landing",
          icon: "mdi-home",
        },
        {
          title: "Project",
          link: "project",
          class: "btnAbout",
        },
        {
          title: "Client",
          link: "client",
          class: "btnAbout",
        },
      ];
    },
  },
  methods: {
    userLogout() {
      this.$store.dispatch("userLogout");
    },
  },
  watch: {
    isDark() {
      this.$vuetify.theme.dark = this.isDark;
      localStorage.setItem("dark", this.isDark);
    },
  },
  created() {
    const dark = localStorage.getItem("dark");
    this.isDark = dark ? JSON.parse(dark) : false;
  },
};
</script>
