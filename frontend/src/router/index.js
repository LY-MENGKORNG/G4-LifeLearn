import { createRouter, createWebHistory } from "vue-router";
import routes from "./routes";

const Router = createRouter({
    history: createWebHistory(),
    routes
})

export default Router;