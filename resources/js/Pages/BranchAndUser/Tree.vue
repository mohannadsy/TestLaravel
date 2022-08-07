<template>
  <div>
    <page-title class="py-2"><span><fa class="px-2"  icon="users" /></span> {{$t('branchesAndUsers')}}</page-title>
    <div class="row py-2 border-bottom border-dark">
      <div class="col-4" style="padding-left:0">
       <button class="building px-2"><span ><fa class="fa" icon="building" /></span></button>
       <button class="building px-2"><span><fa class="fa" icon="user-plus" /></span></button>
       <button class="building px-2"><span><fa class="fa"  icon="magnifying-glass"/></span></button>
      </div>
     
       <div class="col-7" style="padding-right:3;">
        <element-input ></element-input>
       </div>
       
    </div>
    <div>
      <span
        class="default-pointer"
        @click="toggle"
        @dblclick="makeFolder"
        v-if="isFolder"> 
        <!-- <fa v-if="isOpen" icon="caret-down" />
        <fa v-else icon="caret-left" /> -->

       <fa v-if="isOpen"  icon="circle-minus"  />
        <fa v-else icon="circle-plus"/>
        </span
      >
      <span
        :class="{ bold: isFolder }"
        class="pointer"
        @click="sendNodeType(item, item.id)"
        >{{ item.name }} - {{item.code}}</span
      >
    </div>
    <ul v-show="isOpen" v-if="isFolder">
      <tree-item
       class="branches"
        v-for="(childBranch, index) in item.branches"
        :key="index"
        :item="childBranch"
        @make-folder="$emit('make-folder', $event)"
        @node-type="this.$emit('node-type', $event)"
      ></tree-item>
      <tree-item
        class="users"
        v-for="(childUsers, index) in item.users"
        :key="index"
        :item="childUsers"
        @make-folder="$emit('make-folder', $event)"
        @node-type="this.$emit('node-type', $event)"
      ></tree-item>
    </ul>
  </div>
</template>

<script>
import axios from "axios";
import PageTitle from "../../Shared/PageTitle.vue";
import Button from '../../Jetstream/Button.vue';
import ElementInput from "../../Shared/ElementInput.vue";
export default {
  name: "treeItem",
  components:{
    PageTitle,
    Button,
    ElementInput
},
  props: {
    item: Array,
  },
  data() {
    return {
      isOpen: false,
      nodeType: "",
      nodeId: "",
    };
  },
  computed: {
    isFolder: function () {
      return this.item.branches && this.item.branches.length;
    },
  },
  methods: {
    toggle: function () {
      if (this.isFolder) {
        this.isOpen = !this.isOpen;
      }
    },
    makeFolder: function () {
      if (!this.isFolder) {
        this.$emit("make-folder", this.item);
        this.isOpen = true;
      }
    },

    sendNodeType(item, id) {
      id = item.id;
      if (item.hasOwnProperty("branches")) {
        this.nodeType = "branches";
        this.nodeId = id;
      } else {
        this.nodeType = "users";
        this.nodeId = id;
      }
      this.$emit("node-type", { nodeId: this.nodeId, nodeType: this.nodeType });

    },
  },
};
</script>
<style scoped>
.fa{
  font-size: 25px;
}
.building{
  border:none;
  background-color: #f3f4f6;
}
.a{
  /* -webkit-text-decoration-line: overline;
  text-decoration-line: overline; */
  /* border-bottom: 3px solid black; */
    --bs-gutter-x: 1rem;
   margin-left: 0;
}
.building span{
  font-size:15px ;
}

.pointer {
  cursor: pointer;
  /* font-size: 17px; */
}
.default-pointer {
  cursor: pointer;
  font-size: 20px;
  margin: 0px 3px;
  padding-bottom:20px;
}
/* ul,li {
  line-height:0.5 ;
 

} */
.branches  {
  list-style-type: none;
  margin:0;
  padding: 0;
}

</style>
