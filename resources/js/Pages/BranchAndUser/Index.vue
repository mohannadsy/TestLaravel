<template>
  <div class="row">
    <div class="col-3">
      <!-- <tree :branchesWithUsers="$page['props']['branchesWithUsers']"></tree> -->
      <tree
        v-for="branch in branchesWithUsers"
        :key="branch.name"
        class="item"
        :item="branch"
        @send-data="showType($event)"
      ></tree>
      <input v-model="type"/>
      <h1>{{type}}</h1>
    </div>
    <div class="col-9">
      <branch-form v-if="type==='branches'"></branch-form>
      <user-form v-if="type==='users'" :groupPermissions="$page['props']['groupPermissions']"></user-form>
    </div>
  </div>
</template>
<script>
import Index from "../../components/users/Index.vue";
import IndexVue from "../../components/branches/Index.vue";
import Tree from "./Tree.vue";
export default {
  data() {
    return {
      type: 'users',
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
    saveData() {
      this.$store.dispatch("branches/loadBranches");
    },
    showType(msg){
        this.type = msg
    }
  },
  mounted(){
    console.log('from index' + this.type)
  }
};
</script>

