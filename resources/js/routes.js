import { createWebHistory, createRouter } from "vue-router";

/* Dashboard */
import DashboardLayout from './Layouts/Dashboard';
import DashboardIndex from './Dashboard/Index';
import DashboardRewards from './Dashboard/Rewards';
import DashboardRoles from './Dashboard/Roles';
import DashboardUsers from './Dashboard/Users';

import Error404 from './Errors/404';

const APP_NAME = process.env.MIX_APP_NAME;

export const routes = [
    {
        name: 'dashboard',
        path: '/admin/dashboard',
        component: DashboardLayout,
        redirect: to => {
            return { name: 'dashboard-index' };
        },
        children: [
            {
                name: 'dashboard-index',
                path: 'main',
                component: DashboardIndex,
                meta: { title: 'Dashboard - ' + APP_NAME }
            },
            {
                name: 'dashboard-roles',
                path: 'roles',
                component: DashboardRoles,
                meta: { title: 'Roles - ' + APP_NAME }
            },
            {
                name: 'dashboard-users',
                path: 'users',
                component: DashboardUsers,
                meta: { title: 'Users - ' + APP_NAME },
                children: [
                    {
                        name: 'dashboard-users-user',
                        path: 'user/:id',
                        component: DashboardUsers,
                    }
                ]
            },
            {
                name: 'dashboard-rewards',
                path: 'rewards',
                component: DashboardRewards,
                meta: { title: 'Rewards - ' + APP_NAME }

            },
        ]
    },
    {
        name: 'Error 404',
        path: '/:pathMatch(.*)* ',
        component: Error404,
        meta: { title: 'Page not found - ' + APP_NAME }
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
})

router.beforeEach((to, from, next) => {
    const title = to.meta.title;

    if (title !== undefined) {
        document.title = title;
    }

    next()
});

export default router;
