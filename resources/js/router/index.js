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
        path: "/register",
        name: "register",
        component: () => import("../views/Auth/SignUp.vue"),
        meta: {
            title: "SignUp",
            menuName: "SignUp",
            icon: null,
            status: 0,
            isAuthenticated: true,
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
