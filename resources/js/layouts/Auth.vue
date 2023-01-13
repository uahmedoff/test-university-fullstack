<template>
    <div>
        <el-row :gutter="20">
            <el-col :span="12" :offset="6">
                <router-view></router-view>
            </el-col>
        </el-row>
    </div>
</template>

<script>
export default {
    name: 'auth',
}
</script>

<style lang="scss" scoped>
    .el-row {
        margin-top: 100px;
        &:last-child {
            margin-bottom: 0;
        }
    }
</style>