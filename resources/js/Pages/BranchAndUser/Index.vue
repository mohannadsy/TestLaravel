<template>
    <div class="row">
        <div class="col-6">
            <branch-form @save-data="saveData"></branch-form>
        </div>
    </div>
</template>

<script>
import BranchForm from '../../components/branches/BranchForm.vue';
export default {
    props:['code','name'],
    components:{
        BranchForm
    },
    methods:{
        saveData(data){
            this.$store.dispatch('branches/registerBranch',data);
        }
    }
}
</script>
