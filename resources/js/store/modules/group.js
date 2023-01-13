import groupService from '../../services/groups'

const state = {
    isSubmitting: false,
    isLoading: false,
    allGroups: [],
    validationErrors: null,
}

const mutations = {
    getAllStart(state){
        state.isLoading = true
        state.validationErrors = null
    },
    getAllSuccess(state,payload){
        state.isLoading = false
        state.allGroups = payload
        state.isLoggedIn = true
    },
    getAllFailure(state,payload){
        state.isLoading = false
        state.validationErrors = payload
    },
}

const actions = {
    async getAllGroups(context){
        context.commit('getAllStart')
        try{
            const response = (await groupService.getAll()).data
            context.commit('getAllSuccess',response.result.data)
        }
        catch(error){
            context.commit('getAllFailure',error.response.data.errors)
        }
    },
}

export default{
    namespaced: true,
    state,
    mutations,
    actions
}