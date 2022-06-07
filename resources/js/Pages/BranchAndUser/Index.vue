<template>
    <div class="row">
        <div class="col-6">
            <branch-tree></branch-tree>
        </div>
        <div class="col-6">
            <create-branch></create-branch>
        </div>
    </div>
</template>

<script>
import CreateBranch from './CreateBranch.vue';
import BranchTree from '../Tree/BranchTree.vue';
export default {
    components:{
        CreateBranch,BranchTree
    },
    computed:{
        showPara(){
            console.log("helo");
        }
    }
}
</script>


<style>

</style>
