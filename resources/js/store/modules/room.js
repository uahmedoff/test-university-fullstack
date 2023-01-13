import roomService from '../../services/rooms'

const state = {
    isSubmitting: false,
    isLoading: false,
    allRooms: [],
    validationErrors: null,
}

const mutations = {
    getAllStart(state){
        state.isLoading = true
        state.validationErrors = null
    },
    getAllSuccess(state,payload){
        state.isLoading = false
        state.allRooms = payload
        state.isLoggedIn = true
    },
    getAllFailure(state,payload){
        state.isLoading = false
        state.validationErrors = payload
    },
}

const actions = {
    async getAllRooms(context){
        context.commit('getAllStart')
        try{
            const response = (await roomService.getAll()).data
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