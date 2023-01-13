<template>
    <el-card class="box-card">
        <h1 class="text-center">Test university schedule system</h1>
        <el-form 
            ref="form" 
            label-width="120px"
            @submit.prevent.native="signin"
        >
            <el-form-item label="Email">
                <el-col :span="23">
                    <el-input v-model="credentials.email"></el-input>
                    <small 
                        v-if="validationErrors && validationErrors.email"
                        class="text-red"
                    >
                        {{ validationErrors.email[0] }}
                    </small>
                </el-col>
            </el-form-item>
            <el-form-item label="Password">
                <el-col :span="23">
                    <el-input type="password" v-model="credentials.password"></el-input>
                    <small 
                        v-if="validationErrors && validationErrors.password"
                        class="text-red"
                    >
                        {{ validationErrors.password[0] }}
                    </small>
                </el-col>    
            </el-form-item>
            <el-form-item>
                <el-button v-if="isSubmitting" type="primary" :loading="true">Submitting...</el-button>
                <el-button v-else type="primary" native-type="submit" center>Sign in</el-button>      
            </el-form-item>
        </el-form>
    </el-card>
</template>

<script>
import {mapState,mapGetters,mapActions} from 'vuex'
export default{
    data(){
        return {
            credentials: {
                'email': '',
                'password': ''
            }
        } 
    },
    computed:{
        ...mapState('auth',['validationErrors','isSubmitting']),
        ...mapGetters('auth',['currentUser'])
    },
    methods:{
        ...mapActions('auth',['login','getCurrentUser']),
        async signin(){
            await this.login(this.credentials)
            await this.getCurrentUser()
            this.$router.push('/')
        }
    }
}
</script>