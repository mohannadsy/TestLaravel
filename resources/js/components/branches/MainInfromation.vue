<template>
  <div class="row px-3 mt-1 pb-2">
    <page-title>بطاقة فرع</page-title>
  </div>
  <div class="row">
    <div class="col-md-5">
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-4">رمز الفرع</elemet-label>
        <div class="col-8">
          <element-input
            type="text"
            @change="objChanged"
            v-model.trim="myObj.code"
          />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-4">اسم الفرع</elemet-label>
        <div class="col-8">
          <element-input
            type="text"
            @change="objChanged"
            v-model.trim="myObj.name"
          />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-4">
          الفرع الرئيسي</elemet-label
        >
        <div class="col-8">
          <element-input
            type="text"
            @change="objChanged"
            v-model.trim="myObj.branch_id"
          />
        </div>
      </div>
    </div>
    <div class="col-md-4 box">
      <div :class="{ active: myObj.is_active }" class="toggle_container">
        <ToggleButton
          v-model="myObj.is_active"
          @change="objChanged"
          @change-name="triggerToggleEvent"
          :defaultState="myObj.is_active"
          labelEnableText="مفعل"
          labelDisableText="غير مفعل"
        />
      </div>
    </div>
  </div>
</template>

<script>
import PageTitle from "../../Shared/PageTitle.vue";
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import ToggleButton from "../../Shared/ToggleButton.vue";
export default {
  props: ["branchInformaion", "postData"],
  emits: ["save-main"],
  components: {
    PageTitle,
    ElemetLabel,
    ElementInput,
    ToggleButton,
  },
  data() {
    return {
      myObj: {
        code: "",
        name: "",
        branch_id: "",
        is_active: true,
      },
    };
  },
  watch: {
    postData() {
      this.myObj = this.postData;
    },
    branchInformaion() {
      Object.assign(this.myObj, this.branchInformaion);
    },
  },
  computed: {
    objChanged() {
      this.$emit("save-main", this.myObj);
    },
  },
  methods: {
    triggerToggleEvent(value) {
      this.myObj.is_active = value;
      console.log(this.myObj.is_active);
    },
  },
};
</script>

<style>
.box {
  text-align: center;
  margin-bottom: 30px;
}
.toggle_container {
  margin: 0px auto;
  background: #efefef;
  width: 120px;
  padding: 10px 0;
  border-radius: 30px;
  transition: all 0.25s;
}
.toggle_container.active {
  background: #e9ffef;
}
</style>

