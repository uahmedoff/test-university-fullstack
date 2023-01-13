<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default{
        name: 'app', 
        mounted(){
            this.$store.dispatch('auth/getCurrentUser')
        }
    }
</script>

<style>
    body{
        padding: 0;
        margin: 0;
    }
    .text-center{
        text-align: center;
    }
    .text-red{
        color: red;
    }
    .el-dropdown-link {
        cursor: pointer;
    }
</style>