export default [
  {
    path: "/home",
    name: "home",
    meta: {
      requiresAuth: true,
    },
    component: () =>
      import(/* webpackChunkName: "home" */ "@/components/Home.vue"),
  },
  {
    path: "/project",
    name: "project",
    component: () =>
      import(/* webpackChunkName: "home" */ "@/components/Project.vue"),
  },
  {
    path: "/client",
    name: "client",
    component: () =>
      import(/* webpackChunkName: "home" */ "@/components/Client.vue"),
  },
];
