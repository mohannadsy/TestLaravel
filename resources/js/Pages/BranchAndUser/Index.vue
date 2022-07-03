<!-- <template>
    <div class="row">
        <div class="col-6">
            <tree-view ref="tree" id="customtree-async" :load-nodes-async="loadNodesAsync" :model-defaults="modelDefaults"></tree-view>
        </div>
        <div class="col-6">
            <branch-form @save-data="saveData"></branch-form>
        </div>
        <button @click="hide">Hide</button>
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
        hide(){
          this.$refs.tree.show()
        },
         saveData(data){
            this.$store.dispatch('branches/registerBranch',data);
        },
        async loadChildrenAsync(parentModel) {
          return new Promise(resolve => setTimeout(resolve.bind(null, !parentModel.isUser ? this.getChilds(parentModel) : []
          ), 100));
        },
        async loadNodesAsync() {
          return new Promise(resolve => setTimeout(resolve.bind(null, this.getParents()), 100));
        },
        getParents(){
          let tempBranches = [];
          this.branches.forEach(branch => {
            tempBranches.push({
              id : branch.id,
              label : branch.name,
              branches : branch.branches,
              users : branch.users
            });
          });
          return tempBranches;
        },
        getChilds(parent){
          let tempBranches = [];
          // Add branches to tree
          parent.branches.forEach(branch => {
            tempBranches.push({
              id : branch.id,
              label : branch.name,
              branches : branch.branches,
              users : branch.users
            });
          });
          // Add users with permissions to tree
          parent.users.forEach(user => {
              tempBranches.push({
              id : user.id,
              label : user.name,
              permissions : user.permisssions,
              isUser : true
            });
          });
          return tempBranches;
        }
      },
    props:{
        branches: Array
    },
    components:{
        BranchForm,TreeView
    }


}
</script> -->
<template>
  <user-form></user-form>
  <button @click="saveData">loading</button>
</template>

<script>
import IndexVue from "../../components/users/Index.vue";
export default {
  components: {
    userForm: IndexVue,
  },
  methods:{
     saveData(){
            this.$store.dispatch('branches/loadBranches');
        },
  }
};
</script>
