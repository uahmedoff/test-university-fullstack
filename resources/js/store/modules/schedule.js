import scheduleService from '../../services/schedule'

const state = {
    isSubmitting: false,
    isLoading: false,
    all: [],
    one: {},
    validationErrors: null,
}

const mutations = {
    getAllStart(state){
        state.isLoading = true
        state.validationErrors = null
    },
    getAllSuccess(state,payload){
        state.isLoading = false
        state.all = payload
        state.isLoggedIn = true
    },
    getAllFailure(state,payload){
        state.isLoading = false
        state.validationErrors = payload
    },

    storeStart(state){
        state.isSubmitting = true
        state.validationErrors = null
    },
    storeSuccess(state,payload){
        state.isSubmitting = false
        state.validationErrors = null
    },
    storeFailure(state,payload){
        state.isSubmitting = false
        state.validationErrors = payload
    },

    getOneStart(state){
        state.isLoading = true
        state.validationErrors = null
    },
    getOneSuccess(state,payload){
        state.isLoading = false
        state.one = payload
        state.validationErrors = null
    },
    getOneFailure(state,payload){
        state.isLoading = false
        state.validationErrors = payload
    },

    updateStart(state){
        state.isSubmitting = true
        state.validationErrors = null
    },
    updateSuccess(state){
        state.isSubmitting = false
        state.validationErrors = null
    },
    updateFailure(state,payload){
        state.isSubmitting = false
        state.validationErrors = payload
    },

    deleteStart(state){
        state.isSubmitting = true
        state.validationErrors = null
    },
    deleteSuccess(state){
        state.isSubmitting = false
        state.validationErrors = null
    },
    deleteFailure(state,payload){
        state.isSubmitting = false
        state.validationErrors = payload
    },
}

const actions = {
    async getAll(context,params){
        context.commit('getAllStart')
        try{
            const response = (await scheduleService.getAll(params)).data
            context.commit('getAllSuccess',response.result.data)
        }
        catch(error){
            context.commit('getAllFailure',error.response.data.errors)
        }
    },

    async store(context,params){
        context.commit('storeStart')
        try{
            const response = (await scheduleService.store(params)).data
            context.commit('storeSuccess',response.result)
        }
        catch(error){
            context.commit('storeFailure',error.response.data.errors)
        }
    },

    async getOne(context,id){
        context.commit('getOneStart')
        try{
            const response = (await scheduleService.getOne(id)).data
            context.commit('getOneSuccess',response.result)
        }
        catch(error){
            context.commit('getOneFailure',error.response.data.errors)
        }
    },

    async update(context,params){
        context.commit('updateStart')
        try{
            const response = (await scheduleService.update(params)).data
            context.commit('getOneSuccess',response.data)
        }
        catch(error){
            context.commit('getOneFailure',error.response.data.errors)
        }
    },

    async delete(context,id){
        context.commit('deleteStart')
        try{
            const response = (await scheduleService.delete(id)).data
            context.commit('deleteSuccess',response.data)
        }
        catch(error){
            context.commit('deleteFailure',error.response.data.errors)
        }
    },
}

export default{
    namespaced: true,
    state,
    mutations,
    actions
}