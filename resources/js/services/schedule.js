import http from '../utils/HTTP'

class Schedule{

    getAll(params){
        return http.get(`/schedule`,{
            params:{
                ...params
            }
        })
    }
    
    store(params){
        return http.post(`/schedule`,{
            ...params
        })
    }

    getOne(id){
        return http.get(`/schedule/${id}`)
    }

    update(params){
        return http.put(`/schedule/${params.id}`,{
            ...params
        })
    }

    delete(id){
        return http.delete(`/schedule/${id}`)
    }

}

const schedule = new Schedule()
export default schedule;