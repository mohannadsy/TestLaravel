<template>
    <div>
        <branch-form  @save-data="saveData"></branch-form>
    </div>
</template>

<script>
import BranchForm from '../../components/branches/BranchForm.vue';
export default {
    components:{
        BranchForm
    },
    methods:{
        saveData(){
             this.$store.dispatch('branches/registerBranch',data);
        }
    }
}
</script>
