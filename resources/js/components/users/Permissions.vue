<template>
  <div class="scroll pb-2">
    <ul
      class="main"
      v-for="(userPermission, index) in myObj.currentPermissions"
      :key="index"
    >
      <!-- <checkbox-switch v-model="select_all" @click="select"></checkbox-switch> -->
      <!-- <elemet-label>تحديد الكل</elemet-label> -->
      <button @click="ToggleIsExpanded(index)">
        <span class="rightAngle" :class="angle[index]"></span>
      </button>
      <elemet-label> {{ userPermission.caption }}</elemet-label>

      <ul>
        <div v-show="isExpanded[index]">
          <li
            class="col-3"
            v-for="(permission, i) in userPermission.permissions"
            :key="i"
          >
            <checkbox-switch
              :checked="permission.is_active ? true : false"
              v-model="selected[i]"
            >
            </checkbox-switch>
            {{ permission.caption }}
          </li>
        </div>
      </ul>
    </ul>
  </div>
</template>

<script>
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementCheckbox from "../../Shared/ElementCheckbox.vue";
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue";
import axios from "axios";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
  data() {
    return {
        myObj: useForm({
             currentPermissions: this.userPermissions,
        }),

      // currentPermissions:[],
      isExpanded: [],
      angle: [],
      // select_all: false,
      selected: [],
    };
  },
  components: {
    ElemetLabel,
    ElementCheckbox,
    CheckboxSwitch,
  },
  props: {
    userPermissions: Array,
    form:Object,
    // rolePermissions: Array,
    // roleId: Number,
    userId: Number,
  },
  watch: {
    'form.roleId'() {
      console.log("hello from permission");
    //   console.log(this.form.roleId);
      this.myObj.currentPermissions = this.form.rolePermissions;
      this.$emit('send-permissions' , this.myObj.currentPermissions)
    },
    async userId(){
      let result = await axios.get(route("user.showUserPermissions", this.userId));
     this.myObj.currentPermissions = JSON.parse(JSON.stringify(result.data));
    //   this.$emit('send-permissions' , this.myObj.currentPermissions)
    // this.userId = newVal;
    //   console.log(newVal);
    //   let that = this;
    //   this.currentPermissions = this.userPermissions;
    },
    //     roleId: function(newVal, oldVal){
    //       console.log("New value: "+ newVal + ", Old value: " + oldVal);
    //    },
  },

  methods: {
    ToggleIsExpanded(index) {
      this.isExpanded[index] = !this.isExpanded[index];
      this.angle[index] == "angleDown"
        ? (this.angle[index] = "")
        : (this.angle[index] = "angleDown");
    },
    // select() {
    //   //this.selected = [];
    //   console.log(this.selected);
    //   if (!this.select_all) {
    //     for (let i in this.selected) {
    //       this.selected.push(this.selected[i]);
    //     }
    //   }
    // },
  },
  // computed:{
  //   async groupPermissions(){
  //     let role = await axios.get(route("role.show", 1));
  //     return  JSON.parse(JSON.stringify(role.data));
  //   }
  // }
};
</script>

<style scoped>
.main {
  list-style: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}
.rightAngle::before {
  content: "\25B6";
  display: inline-block;
  cursor: pointer;
  padding: 1px;
  transition: 0.2s ease-out;
  transform: rotate(180deg);
}
.angleDown::before {
  content: "\25B6";
  display: inline-block;
  cursor: pointer;
  padding: 1px;
  transform: rotate(90deg);
  transition: 0.2s ease-out;
}

li {
  float: right;
  display: block;
  padding: 20px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111111;
}
button {
  border: none;
  background: none;
}
.scroll {
  /* max-height: 50%; */
  width: 100%;
  overflow-y: scroll;
  max-height: 350px;
  scroll-behavior: smooth;
}
</style>
