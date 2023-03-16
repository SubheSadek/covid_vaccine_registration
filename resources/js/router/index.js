import { createRouter, createWebHistory } from "vue-router";
const auth = window.authUser || null;
const routes = [
    {
        path: "/",
        name: "home",
        component: () => import("../views/Main/Home.vue"),
        meta: {
            title: "Dashboard",
            menuName: "Dashboard",
            icon: "homeIcon",
        },
    },

    {
        path: "/vaccine-registration",
        name: "vaccineRegistration",
        component: () =>
            import("../views/VaccineRegistration/VaccineRegistraion.vue"),
        meta: {
            title: "Vaccine Registration",
            menuName: "Vaccine Registration",
            icon: null,
            status: 0,
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title;
    next();
});

export default router;
