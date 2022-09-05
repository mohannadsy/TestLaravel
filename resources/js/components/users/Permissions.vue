<template>
  <div class="scroll pb-2">
    <ul
      class="main"
      v-for="(userPermission, index) in myObj.currentPermissions"
      :key="index"
    >
      <!-- <checkbox-switch v-model="select_all" @click="select"></checkbox-switch> -->
      <!-- <elemet-label>تحديد الكل</elemet-label> -->
      <button @click="toggleIsExpanded(index)">
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
              @change-value="triggerToggleEvent($event, index, i)"
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
import { useForm } from "@inertiajs/inertia-vue3";
export default {
  data() {
    return {
      selectedItem: {
        index: [],
      },
      myObj: useForm({
        currentPermissions: [],
      }),
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
    form: Object,
    rolePermissions: Array,
    userId: Number,
  },
  watch: {
    form() {
      this.myObj = this.form;
    },
    userPermissions() {
      this.myObj.currentPermissions = this.userPermissions;
      this.$emit("send-permissions", this.myObj);
    },
    rolePermissions() {
      this.myObj.currentPermissions = this.rolePermissions;
      this.$emit("send-permissions", this.myObj);
      console.log(this.myObj.currentPermissions);
    },
  },

  methods: {
    toggleIsExpanded(index) {
      this.isExpanded[index] = !this.isExpanded[index];
      this.angle[index] == "angleDown"
        ? (this.angle[index] = "")
        : (this.angle[index] = "angleDown");
    },

    triggerToggleEvent(value, row, column) {
      this.myObj.currentPermissions[row].permissions[column].is_active = value;
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
