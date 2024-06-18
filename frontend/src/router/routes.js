import HomeView from "@/views/HomeView.vue";
import MyLearn from "@/views/MyLearn.vue";

const routes = [
    { path: "/", name: "home", component: HomeView },
    { path: "/my-learn", name: "my-learn", component: MyLearn },
];

export default routes;