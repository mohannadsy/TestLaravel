<template>
  <div class="scroll">
    <ul class="main" v-for="(groupPermission, index) in groupPermissions" :key="index">
      <button @click="ToggleIsExpanded(index)">
        <span class="rightAngle" :class="angle[index]"  ></span>
      </button>
      <elemet-label> {{ groupPermission.caption }}</elemet-label>
      <ul >
        <div v-show="isExpanded[index]">
            <li
            class="col-3"
            v-for="(permission, i) in groupPermission.permissions"
            :key="i"
            >

            <checkbox-switch> </checkbox-switch>
            {{ permission.caption }}
            </li>
        </div>
      </ul>
      <ul >
        <div v-show="isExpanded[index]">
            <li
            class="col-3"
            v-for="(permission, i) in groupPermission.permissions"
            :key="i"
            >

            <checkbox-switch> </checkbox-switch>
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

export default {
  data() {
    return {
      isExpanded: [],
      angle:[],
    };
  },
  components: {
    ElemetLabel,
    ElementCheckbox,
    CheckboxSwitch,
  },
  props: {
    groupPermissions: Array,
  },
  methods: {
    ToggleIsExpanded(index) {
     this.isExpanded[index] = !this.isExpanded[index];
     this.angle[index]=="angleDown" ? this.angle[index]="" : this.angle[index]="angleDown";
    },
  },
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
button{
    border: none;
}
.scroll{
    max-height: 50%;
    width:100%;
   overflow: scroll;
   max-height: 350px;
}
</style>
