<template>
    <div class="row">
        <div class="col-4">
            <tree-view
             :load-nodes-async="loadNodesAsync"
             v-for="data in dataModel"
             :key="data.id"
             >
             </tree-view>
        </div>
        <div class="col-8">
            <create-branch @add-branch="addBranch"></create-branch>
        </div>
    </div>
</template>

<script>
import CreateBranch from './CreateBranch.vue';
import ShowBranch from './ShowBranch.vue';
import TreeView from "@grapoza/vue-tree"
export default {
        components:{
        CreateBranch,ShowBranch,TreeView
    },
    data() {
        return {
            dataModel: [
          {
            id: '123',
            label: 'الفرع الرئيسي',
          }
          ]
        }
    },
    // mounted(){
    //   this.loadNodesAsync();
    // },
    methods:{
     async loadNodesAsync() {
          return new Promise(resolve => setTimeout(resolve(this.dataModel), 1000));
        },
    addBranch(code,name){
      const newBranch={
        id: code,
        label: name,
        };
        const index = this.dataModel.findIndex(object => object.id === newBranch.id);
        if (index === -1) {
          this.dataModel.push(newBranch);
        }
        //this.dataModel.push(newBranch);
    }
    }
}
</script>

<style>

</style>
