<template>
  <div>
    <ul class="main" v-for="(groupPermission, index) in groupPermissions" :key="index">
      <button @click="ToggleIsExpanded(index)">
        <span class="rightAngle"></span>
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
  // data: {
  //     return: {
  //         isExpanded: true,
  //     },
  // },
  // mounted() {
  //     var toggleNodeGroup = document.getElementsByClassName("rightAngle");
  //     for (var i = 0; i < toggleNodeGroup.length; i++) {
  //         toggleNodeGroup[i].addEventListener("click", function () {
  //             this.parentElement
  //                 .querySelector(".permisiions_ul")
  //                 .classList.toggle("active");
  //             this.classList.toggle("angleDown");
  //         });
  //     }
  // },
  methods: {
    ToggleIsExpanded(index) {
     this.isExpanded[index] = !this.isExpanded[index];


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
</style>
