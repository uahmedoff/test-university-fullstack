import {getItem} from './localStorage'

export function initialize(store,router){
    router.beforeEach((to,from,next) => {
        const requiresAuth = to.matched.some(record => record.meta.requiresAuth)
        const currentUser = !!(store.state.auth.currentUser || getItem('user'))
        if(requiresAuth && !currentUser){
            console.log('login page')
            next('/auth/login')
        }  
        else if(currentUser && to.path == '/auth/login'){
            console.log('home page')
            next('/')
        }
        else{
            console.log('next')
            next()
        }
    })
}