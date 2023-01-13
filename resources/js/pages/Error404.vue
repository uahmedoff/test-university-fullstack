<template>
    <div>
        <el-row :gutter="20">
            <el-col :span="12" :offset="6">
                <el-card class="box-card">
                    Sorry, but there is no page like that.
                </el-card>    
            </el-col>
        </el-row>
    </div>
</template>

<script>
export default {
    name: 'error-page',
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