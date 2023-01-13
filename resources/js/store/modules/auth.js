import authService from '../../services/auth'
import {setItem,removeItem} from '../../helpers/localStorage'
import router from '../../router'

const state = {
    isSubmitting: false,
    isLoading: false,
    currentUser: null,
    validationErrors: null,
    isLoggedIn: false
}

const getters = {
    currentUser: state => {
        return state.currentUser
    },
    isLoggedIn: state => {
        return Boolean(state.isLoggedIn)
    },
    isAnonymous: state => {
        return state.isLoggedIn === false
    }
}

const mutations = {
    loginStart(state){
        state.isSubmitting = true
        state.validationErrors = null
    },
    loginSuccess(state,payload){
        state.isSubmitting = false
        state.currentUser = payload
        state.isLoggedIn = true
    },
    loginFailure(state,payload){
        state.isSubmitting = false
        state.validationErrors = payload
    },

    getCurrentUserStart(state){
        state.isLoading = true
    },
    getCurrentUserSuccess(state,payload){
        state.isLoading = false
        state.currentUser = payload
        state.isLoggedIn = true
    },
    getCurrentUserFailure(state){
        state.isLoading = false
        state.isLoggedIn = false
        state.currentUser = null
    },

    logout(state){
        state.currentUser = null
        state.isLoggedIn = false
    }
}

const actions = {
    async login(context,credentials){
        context.commit('loginStart')
        try{
            const response = (await authService.login(credentials)).data
            context.commit('loginSuccess',response.data)
            setItem('accessToken',response.result.access_token)
        }
        catch(error){
            context.commit('loginFailure',error.response.data.errors)
        }
    },

    async getCurrentUser(context){
        context.commit('getCurrentUserStart')
        try{
            const response = (await authService.getCurrentUser()).data
            context.commit('getCurrentUserSuccess',response.result)
            setItem('user',response.result)
        }
        catch(error){
            context.commit('getCurrentUserFailure',error.response.data.errors)
        }
    },

    logout(context){
        setItem('accessToken','')
        context.commit('logout')
        removeItem('user')
        removeItem('accessToken')
        router.push('/auth/login')
    }
}

export default{
    namespaced: true,
    state,
    mutations,
    getters,
    actions
}