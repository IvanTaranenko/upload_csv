import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            component: () => import('../layouts/default.vue'),
            children: [
                {
                    path: 'upload-csv',
                    component: () => import('../components/UploadFile.vue'),
                },
            ],
        },
    ],
})

export default router
