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
    history: createWebHistory(),
    mode: "history",
});

export default router;
