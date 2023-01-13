import axios from 'axios'
import {getItem} from '../helpers/localStorage'

axios.defaults.baseURL = '/api'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

axios.interceptors.request.use(config => {
    const accessToken = getItem('accessToken')
    const authorizationToken = accessToken ? `Bearer ${accessToken}` : ''
    config.headers.Authorization = authorizationToken
    return config
})

export default axios