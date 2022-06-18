<template>
    <div class="row">
        <div class="col-6">
            <branch-form @save-data="saveData"></branch-form>
        </div>
        <button @click="loadBranches">Get</button>
    </div>
</template>

<script>
import BranchForm from '../../components/branches/BranchForm.vue';
import Button from '../../Jetstream/Button.vue';
export default {
    props:['code','name'],
    components:{
        BranchForm,
        Button
    },
    methods:{
        saveData(data){
            this.$store.dispatch('branches/registerBranch',data);
        },
        loadBranches(){
            this.$store.dispatch('branches/loadBranches');
        }
    }
}
</script>
