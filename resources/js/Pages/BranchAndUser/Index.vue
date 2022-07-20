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
      <!-- <h1>{{Rec.name}}</h1> -->
    </div>
    <div class="col-9">
      <branch-form v-show="nodeType == 'branches'"></branch-form>
      <user-form
        v-show="nodeType == 'users'"
        :groupPermissions="$page['props']['groupPermissions']"
      ></user-form>
    </div>
  </div>
</template>
<script>
import Index from "../../components/users/Index.vue";
import IndexVue from "../../components/branches/Index.vue";
import Tree from "./Tree.vue";
import axios from "axios";
export default {
  data() {
    return {
      nodeType: "branches",
      nodeId: "",
      Rec:{}
    };
  },
  props: {
    branches: Array,
    branchesWithUsers: Array,
    groupPermissions: Array,
    Rec:Object
  },
  components: {
    userForm: Index,
    branchForm: IndexVue,
    Tree,
  },
  methods: {
    // saveData() {
    //   this.$store.dispatch("branches/loadBranches");
    // },
    getNodeType({nodeId,nodeType}) {
        this.nodeType = nodeType
        this.nodeId = nodeId
        //this.nodeId = response.id
        //this.nodeId = response.nodeId
    // let resss = JSON.parse(JSON.stringify(response))
    //   this.nodeType = resss.node;
    //   console.log(this.nodeType);
    //   this.dataRec = resss;
    //   childRes = this.dataRec.res
    //   //childRes = JSON.parse(JSON.stringify(resss.res))
    //   let cccc = JSON.parse(JSON.stringify(childRes))
    //   //this.nodeId = response.id;
    //   //this.dataRec = reactive(response);
    //   //  this.response = response
    //   //  this.sara = this.response.node
    //   console.log(cccc);
    //   //console.log(this.dataRec.res);
    //console.log(this.nodeId);
      this.Rec = axios.get(route("branch.show",this.nodeId)).then((response)=>response.data)
    //   .then((response)=>{
    //     this.Rec = response.data
    //     //this.$emit("node-type",this.dataToSend);
    //     JSON.parse(JSON.stringify(this.Rec))

    //   })
      console.log(this.Rec)
    },
  },
};
</script>
<style scoped>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
</style>
