<template>
    <div>
        <h2 class="text-center">
            Schedule 
            <el-button 
                v-if="$can('create schedule')"
                type="success" 
                size="mini"
                @click="addNew"
            >
                <i class="el-icon-plus"></i>
            </el-button>
        </h2>


        <el-button 
            type="secondary" 
            size="mini"
            @click="resetForm();getAllScheduleData()"
        >
            Clear filters
        </el-button>
        <table>
            <tr>
                <th>#</th>
                <th width="150">Group</th>
                <th>Subject</th>
                <th width="100">Room</th>
                <th width="200">Teacher</th>
                <th width="100">Day</th>
                <th width="50">Class time</th>
                <th width="110">Action</th>
            </tr>
            <tr>
                <th></th>
                <th>
                    <el-select 
                        v-model="form.group_id" 
                        placeholder="Select group..."
                        @change="getAllScheduleData"
                        clearable
                    >
                        <el-option
                        v-for="gr in allGroups"
                        :key="'gr'+gr.id"
                        :label="gr.name"
                        :value="gr.id">
                        </el-option>
                    </el-select>
                </th>
                <th>
                    <el-select 
                        v-model="form.subject_id" 
                        placeholder="Select subject..."
                        @change="getAllScheduleData"
                        clearable    
                    >
                        <el-option
                        v-for="sbj in allSubjects"
                        :key="'sbj'+sbj.id"
                        :label="sbj.name"
                        :value="sbj.id">
                        </el-option>
                    </el-select>
                </th>
                <th>
                    <el-select 
                        v-model="form.room_id" 
                        placeholder="Select room..."
                        @change="getAllScheduleData"
                        clearable
                    >
                        <el-option
                        v-for="rm in allRooms"
                        :key="'rm'+rm.id"
                        :label="rm.name"
                        :value="rm.id">
                        </el-option>
                    </el-select>
                </th>
                <th>
                    <!-- <input v-model="group_id" type="text"> -->
                </th>
                <th>
                    <el-select 
                        v-model="form.day_of_the_week" 
                        placeholder="Select room..."
                        @change="getAllScheduleData"
                        clearable
                    >
                        <el-option
                        v-for="day in ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']"
                        :key="'day'+day"
                        :label="day"
                        :value="day">
                        </el-option>
                    </el-select>
                </th>
                <th>
                    <el-time-select
                        v-model="form.classtime"
                        :picker-options="{
                            start: '09:00',
                            step: '01:30',
                            end: '18:00'
                        }"
                        placeholder="Select time"
                        @change="getAllScheduleData"
                    >
                    </el-time-select>
                </th>
                <th></th>
            </tr>
            <tr v-for="item,index in all" :key="'sch'+index">
                <td>{{ ++index }}</td>
                <td>{{ item.group_name }}</td>
                <td>{{ item.subject_name }}</td>
                <td>{{ item.room_name }}</td>
                <td>
                    {{ item.teacher_firstname }}
                    {{ item.teacher_lastname }}
                </td>
                <td>{{ item.day_of_the_week }}</td>
                <td>{{ moment(item.classtime,"HH:mm:ss").format("HH:mm") }}</td>
                <td>
                    <el-button 
                        v-if="$can('update schedule')"
                        type="primary" 
                        size="mini"
                        @click="edit(item.id)"
                    >
                        <i class="el-icon-edit"></i>
                    </el-button>
                    <el-button 
                        v-if="$can('delete schedule')"  
                        type="danger" 
                        size="mini"
                        @click="remove(item.id)"
                    >
                        <i class="el-icon-delete"></i>
                    </el-button>
                </td>
            </tr>
        </table>

        <el-dialog title="Add new" :visible.sync="dialogFormVisible">
        <el-form :model="form">
            <el-form-item label="Group" :label-width="formLabelWidth">
                <el-select 
                    v-model="form.group_id" 
                    placeholder="Select group..."
                >
                    <el-option
                    v-for="gr in allGroups"
                    :key="'gr'+gr.id"
                    :label="gr.name"
                    :value="gr.id">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="Subject" :label-width="formLabelWidth">
                <el-select 
                    v-model="form.subject_id" 
                    placeholder="Select subject..."
                >
                    <el-option
                    v-for="sj in allSubjects"
                    :key="'sj'+sj.id"
                    :label="sj.name"
                    :value="sj.id">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="Room" :label-width="formLabelWidth">
                <el-select 
                    v-model="form.room_id" 
                    placeholder="Select room..."
                >
                    <el-option
                    v-for="romm in allRooms"
                    :key="'rommgr'+romm.id"
                    :label="romm.name"
                    :value="romm.id">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="Day" :label-width="formLabelWidth">
                <el-select 
                    v-model="form.day_of_the_week" 
                    placeholder="Select day..."
                >
                    <el-option
                    v-for="day in ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']"
                    :key="'day'+day"
                    :label="day"
                    :value="day">
                    </el-option>
                </el-select>
             </el-form-item>   
             <el-form-item label="Class time" :label-width="formLabelWidth">
                <el-time-select
                    v-model="form.classtime"
                    :picker-options="{
                        start: '09:00',
                        step: '01:30',
                        end: '18:00'
                    }"
                    placeholder="Select time"
                >
                </el-time-select>
            </el-form-item>
        </el-form>
        <span slot="footer" class="dialog-footer">
            <el-button @click="dialogFormVisible = false">Cancel</el-button>
            <el-button type="primary" @click="save">Save</el-button>
        </span>
        </el-dialog>

    </div>
</template>

<script>
import moment from 'moment'
import { mapState,mapActions } from 'vuex'
export default {
    name: 'home',
    data(){
        return {
            form: {
                group_id: '',
                subject_id: '',
                room_id: '',
                day_of_the_week: '',
                classtime: '',
            },
            moment,
            dialogFormVisible: false,
            formLabelWidth: '120px', 
            save_button: '55',
        }
    },
    computed:{
        ...mapState('schedule',['all','one']),
        ...mapState('groups',['allGroups']),
        ...mapState('subjects',['allSubjects']),
        ...mapState('rooms',['allRooms'])
    },
    methods:{
        ...mapActions('schedule',['getAll','store','getOne','update','delete']),
        ...mapActions('groups',['getAllGroups']),
        ...mapActions('subjects',['getAllSubjects']),
        ...mapActions('rooms',['getAllRooms']),
        getAllScheduleData(){
            this.getAll({
                group_id: this.form.group_id,
                subject_id: this.form.subject_id,
                room_id: this.form.room_id,
                day_of_the_week: this.form.day_of_the_week,
                classtime: this.form.classtime,
            })
        },
        resetForm(){
            this.form.group_id = ''
            this.form.subject_id = ''
            this.form.room_id = ''
            this.form.day_of_the_week = ''
            this.form.classtime = ''
        },
        addNew(){
            this.save_button = 'create'
            this.resetForm()
            this.dialogFormVisible = true
        },
        async edit(id){
            this.save_button = 'update'
            await this.resetForm()
            await this.getOne(id)
            this.form = this.one
            this.dialogFormVisible = true
        },
        async save(){
            this.dialogFormVisible = false
            if(this.save_button == 'create')
                await this.store(this.form)
            else if(this.save_button == 'update'){
                await this.update(this.form)    
            }
            this.resetForm()
            this.getAllScheduleData()
        },
        async remove(id){
            if(confirm('Are you sure you want to delete?')){
                await this.delete(id)
                await this.getAllScheduleData()
            }
        }
    },
    mounted(){
        this.getAllScheduleData()
        this.getAllGroups()
        this.getAllSubjects()
        this.getAllRooms()
    }
}
</script>

<style lang="scss">
    table{
        width:100%;
        border: 1px solid #ccc;
        border-collapse:collapse;
        & td{
            border: 1px solid #ccc;
            border-collapse: collapse;
        }
        th,td{
            padding:10px
        }
    }
</style>