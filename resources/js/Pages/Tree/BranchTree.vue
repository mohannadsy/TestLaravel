<template>
    <div id="app-custom-gray" class="demo-tree">
        <!-- <div class="col-md-12"><label class="labels">الفرع الرئيسي</label><input type="text" class="form-control" v-model="model[0].label"></div> -->

       <!-- <h1>{{dataModel[0].label}}</h1> -->
    </div>
</template>

  <script type='module'>
  import TreeView from "@grapoza/vue-tree"
 export default {
    components: {
      TreeView
    },
    data() {
      return {
          //dataModel:[]
        // dataModel: [
        //   {
        //       id: "numberOrString",
        //       label: "Root Node"
        //   },
        //   {
        //       id: "numberOrString",
        //       label:"second Node"
        //   }
        //   ]
      }
    }
  }
  </script>
