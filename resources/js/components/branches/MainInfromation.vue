<template>
  <div class="row px-3 mt-1 pb-2">
    <page-title>بطاقة فرع</page-title>
  </div>
  <div class="row">
    <div class="col-md-5">
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-4">رمز الفرع</elemet-label>
        <div class="col-8">
          <element-input type="text" @change="objChanged" v-model.trim="myObj.code" />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-4">اسم الفرع</elemet-label>
        <div class="col-8">
          <element-input type="text" @change="objChanged" v-model.trim="myObj.name" />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-4">
          الفرع الرئيسي</elemet-label
        >
        <div class="col-8">
          <element-input type="text" @change="objChanged" v-model.trim="myObj.branch_id" />
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group row mt-4">
        <input style="visibility: hidden" />
      </div>
      <div class="form-group row mt-2">
        <div class="col-md-2 justify-content-right">
          <checkbox-switch checked></checkbox-switch>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PageTitle from "../../Shared/PageTitle.vue";
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue";
export default {
    emits: ["save-main"],
  components: {
    PageTitle,
    ElemetLabel,
    ElementInput,
    CheckboxSwitch,
  },
  data() {
    return {
      myObj: {
        code: "",
        name: "",
        branch_id: "",
      },
    };
  },
  methods:{
     objChanged(){
        this.$emit("save-main",this.myObj);
    },
  }
};
</script>

<style>
</style>

