const routes = [
    {
        path: '/auth',
        name: 'Auth',
        component: () => import('../layouts/Auth.vue'),
        children:[
          {
            path: 'login',
            name: 'Login',
            component: () => import('../pages/Auth/Login.vue'),
          }
        ]
    },
    {
        path: '/',
        component: () => import('../layouts/Main.vue'),
        meta: {
            requiresAuth: true
        },
        children: [
            {
                path: '',
                name: 'Home',
                component: () => import('../pages/Home.vue')
            }
        ]
    },
    {
        path: '/:catchAll(.*)*',
        component: () => import('../pages/Error404.vue')
    }
]

export default routes