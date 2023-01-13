import subjectService from '../../services/subjects'

const state = {
    isSubmitting: false,
    isLoading: false,
    allSubjects: [],
    validationErrors: null,
}

const mutations = {
    getAllStart(state){
        state.isLoading = true
        state.validationErrors = null
    },
    getAllSuccess(state,payload){
        state.isLoading = false
        state.allSubjects = payload
        state.isLoggedIn = true
    },
    getAllFailure(state,payload){
        state.isLoading = false
        state.validationErrors = payload
    },
}

const actions = {
    async getAllSubjects(context){
        context.commit('getAllStart')
        try{
            const response = (await subjectService.getAll()).data
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