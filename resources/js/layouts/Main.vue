<template>
    <el-container style="height: 100%; min-height:700px; border: 1px solid #eee">
        <el-aside width="200px">
            <el-menu :default-openeds="['1', '3']">
                <template slot="title"><i class="el-icon-message"></i>Navigator</template>
                <el-menu-item-group>
                    <template slot="title">Navigator</template>
                    <!-- <el-menu-item :index="`/asdsad`"><i class="el-icon-date"></i> Schedule</el-menu-item> -->
                    <router-link tag="li" class="el-menu-item" to="/"><i class="el-icon-date"></i> Schedule</router-link>
                </el-menu-item-group>
            </el-menu>
        </el-aside>
        <el-container>
            <el-header style="text-align: right; font-size: 12px">
            <el-dropdown trigger="click" @command="handleCommand">
                <span class="el-dropdown-link">
                    <i class="el-icon-user" style="margin-right: 15px"></i>
                    {{ currentUser.name }}
                </span>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item command="logout">Logout</el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            </el-header>
            <el-main>
                <router-view></router-view>
            </el-main>
        </el-container>
    </el-container>
</template>

<script>
    import { mapState,mapActions } from 'vuex';
    export default {
        name: 'main-layout',
        computed:{
            ...mapState('auth',['currentUser'])
        },
        methods:{
            ...mapActions('auth',['logout']),
            handleCommand(command){
                if(command == 'logout')
                    this.logout()
            }
        }
    }
</script>

<style>
    .el-header {
        background-color: #eee;
        color: #333;
        line-height: 60px;
    }
    
    .el-aside {
        color: #333;
        background-color: #fff!important;
        border-right:1px solid #eee;
    }
</style>