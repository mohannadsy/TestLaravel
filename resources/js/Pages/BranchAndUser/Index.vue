<template>
    <div class="row">
        <div class="col-6">
            <tree-view id="customtree-async" :load-nodes-async="loadNodesAsync" :model-defaults="modelDefaults"></tree-view>
        </div>
        <div class="col-6">
            <branch-form @save-data="saveData"></branch-form>
        </div>
    </div>
</template>

<script>
import BranchForm from '../../components/branches/BranchForm.vue';
import TreeView from "@grapoza/vue-tree";
export default {
    data() {
        return {
          modelDefaults: {
            loadChildrenAsync: this.loadChildrenAsync,
            deleteTitle: 'Delete this node',
            expanderTitle: 'Expand this node'
          }
        };
      },
      methods: {
         saveData(data){
            this.$store.dispatch('branches/registerBranch',data);
        },
        async loadChildrenAsync(parentModel) {
          return new Promise(resolve => setTimeout(resolve.bind(null, [
            {
              id: this.results[0].id,
              label: this.results[0].branches[0].users[0].name + ' '+ id,
              treeNodeSpec: { deletable: true },
            },
            {
              id: this.results[0].id,
              label: this.results[0].branches[0].name,
              treeNodeSpec: { deletable: true }
            }
          ]), 500));
        },
        async loadNodesAsync() {
          return new Promise(resolve => setTimeout(resolve.bind(null, [
            {
              id: this.results[0].id,
              label: this.results[0].name
            }
          ]), 500));
        }
      },
    props:{
        results: Array
    },
    components:{
        BranchForm,TreeView
    }


}
</script>
