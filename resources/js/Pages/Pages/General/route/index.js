import { createRouter, createWebHistory } from "vue-router";
import BranchCreate from "../../Branches/BranchCreate.vue";
const router = createRouter({
    history: createWebHistory,
    routes: [
        { path: '/createBranch', component: BranchCreate },
    ],
});

export default router;
