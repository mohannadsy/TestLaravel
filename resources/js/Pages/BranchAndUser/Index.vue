<template>
    <div class="row">
        <div class="col-6">
            <create-branch></create-branch>
        </div>
        <div class="col-6">
            <show-branch></show-branch>
        </div>
    </div>
</template>

<script>
import CreateBranch from './CreateBranch.vue';
import ShowBranch from './ShowBranch.vue';
export default {
    components:{
        CreateBranch,ShowBranch
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
