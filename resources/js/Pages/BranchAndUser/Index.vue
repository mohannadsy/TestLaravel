<template>
  <div class="row">
    <div class="col-3">
      <!-- <tree :branchesWithUsers="$page['props']['branchesWithUsers']"></tree> -->
      <tree
        v-for="branch in branchesWithUsers"
        :key="branch.name"
        class="item"
        :item="branch"
        @node-type="getNodeType($event)"
      ></tree>
      <h1>{{response}}</h1>
    </div>
    <div class="col-9">
      <branch-form v-show="nodeType=='branches'"></branch-form>
      <user-form v-show="nodeType=='users'"  :groupPermissions="$page['props']['groupPermissions']"></user-form>
    </div>
  </div>
</template>
<script>
import Index from "../../components/users/Index.vue";
import IndexVue from "../../components/branches/Index.vue";
import Tree from "./Tree.vue";
export default {
  data() {
    props:['nodId']
    return {
      nodeType: 'branches',
      nodeId:'',
      response:''
    };
  },
  props: {
    branches: Array,
    branchesWithUsers: Array,
    groupPermissions: Array,
  },
  components: {
    userForm: Index,
    branchForm: IndexVue,
    Tree,
    //tree: TreeView,
  },
  methods: {
    // saveData() {
    //   this.$store.dispatch("branches/loadBranches");
    // },
    getNodeType(node){
         this.nodeType = node;
        // this.nodeId = id
        // this.response = response
       console.log( this.nodeType);
    },
  },
};
</script>
<style scoped>
*{
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
</style>
