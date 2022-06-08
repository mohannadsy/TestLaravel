<template>
    <div class="row">
        <div class="col-4">
            <tree-view  id="my-tree" :load-nodes-async="loadNodesAsync" :model-defaults="modelDefaults"  ></tree-view>
        </div>
        <div class="col-4">
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
            modelDefaults: {
            loadNodesAsync: this.loadNodesAsync,
          },
            dataModel: [
          {
            id: '123',
            label: 'الفرع الرئيسي',
            children: [
                {
                  id: '1',
                  label: "اللاذقية",
                }]
          },{
              id:'123',
              label:'جبلة'
          }
          ]
        }
    },
    methods:{
     async loadNodesAsync() {
          return new Promise(resolve => setTimeout(resolve.bind(null, this.dataModel), 1000));
        },
    addBranch(code,name){
      console.log('Yesss');
      const newBranch={
        id: code,
        label: name
        };
    this.dataModel.push(newBranch);
    console.log('Nooo');
    console.log(this.dataModel)
    }
    }
}
</script>

<style>

</style>
