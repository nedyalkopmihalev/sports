import { createRouter, createWebHistory } from "vue-router";
import SportsComponent from "../components/SportsComponent.vue";

const routes = [
    {
        name: "SportsComponent",
        path: "/matches",
        component: SportsComponent,
    },
];

const router = new createRouter({
    routes,
    history: createWebHistory(process.env.BASE_URL),
    mode: "history",
});

export default router;
