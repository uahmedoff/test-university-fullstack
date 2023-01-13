import Vue from 'vue'
import Vuex from 'vuex'

import auth from './modules/auth'
import schedule from './modules/schedule'
import groups from './modules/group'
import subjects from './modules/subject'
import rooms from './modules/room'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules:{
        auth,
        schedule,
        groups,
        subjects,
        rooms
    }
})

export default store