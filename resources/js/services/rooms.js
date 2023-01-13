import http from '../utils/HTTP'

class Room{

    getAll(){
        return http.get(`/schedule/rooms`)
    }

}

const room = new Room()
export default room;