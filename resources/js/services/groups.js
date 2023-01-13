import http from '../utils/HTTP'

class Group{

    getAll(){
        return http.get(`/schedule/groups`)
    }

}

const group = new Group()
export default group;