import http from '../utils/HTTP'

class Subject{

    getAll(){
        return http.get(`/schedule/subjects`)
    }

}

const subject = new Subject()
export default subject;