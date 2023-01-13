import http from '../utils/HTTP'

class Auth{

    login(credentials){
        return http.post(`/auth/login`,credentials)
    }

    getCurrentUser(){
        return http.get(`/auth/me`)
    }

}

const auth = new Auth()
export default auth;