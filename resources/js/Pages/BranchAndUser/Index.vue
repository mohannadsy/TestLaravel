<template>
    <div class="row">
    <form method="post">
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
    </form>
    </div>
</template>

<script>
import CreateBranch from './CreateBranch.vue';
import ShowBranch from './ShowBranch.vue';
import TreeView from "@grapoza/vue-tree";
import { useForm } from "@inertiajs/inertia-vue3";
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
    // setup() {
    //     const form = useForm({
    //        code: null,
    //        name: null,
    //     });

    //     return { form };
    // },
    methods:{
     async loadNodesAsync() {
          return new Promise(resolve => setTimeout(resolve(this.dataModel), 1000));
        },
    async addBranch(){
    //   const newBranch=useForm({
    //     id: code,
    //     label: name,
    //     });
        //const index = this.dataModel.findIndex(object => object.id === newBranch.id);
        //const index = this.dataModel.findIndex(object => object.id === this.form.id);
        //if (index === -1) {
        //this.dataModel.push(this.form);
        //}
        //this.branch.post(route("branch.store"));
        let response = await this.$inertia.post('\store',this.code,this.name);
        //this.dataModel.push(newBranch);
    }
    }
}
</script>

<style>

</style>
