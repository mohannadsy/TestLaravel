<template>
  <form @submit.prevent="submitForm">
    <div class="row">
      <div class="col-md-5">
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-3"
            >رمز المستخدم</elemet-label
          >
          <div class="col-8">
            <element-input
              type="text"
              class="form-control"
              v-model.trim="code"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label
            class="col-form-label col-md-3"
            style="padding-left: 6px"
            >اسم المستخدم</elemet-label
          >
          <div class="col-8">
            <element-input
              type="text"
              class="form-control"
              v-model.trim="name"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label
            class="col-form-label col-md-3"
            style="padding-left: 6px"
            >البريد الالكتروني</elemet-label
          >
          <div class="col-8">
            <element-input
              type="text"
              class="form-control"
              v-model.trim="email"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-3"
            >كلمة المرور</elemet-label
          >
          <div class="col-8">
            <element-input
              type="text"
              class="form-control"
              v-model.trim="password"
            />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-2">الفرع </elemet-label>
          <div class="col-8">
            <element-input
              type="text"
              class="form-control"
              v-model.trim="branch_name"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-2">الصفة</elemet-label>
          <div class="col-8">
            <v-select :options="role" />
          </div>
        </div>
        <div class="form-group row mt-2">
          <div class="col-md-2 justify-content-right">
            <checkbox-switch></checkbox-switch>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import VSelect from "../../Shared/VSelect.vue";
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue";
export default {
  emits: ["save-main"],
  components: {
    ElemetLabel,
    ElementInput,
    VSelect,
    CheckboxSwitch,
  },
  data() {
    return {
      rvalue: "",
      role: ["مدير عام", "محاسب", "كاشير"],
    };
  },
  methods: {
    submitForm() {
      const formData = {
        code: this.code,
        name: this.name,
        email: this.email,
        password: this.password,
        branch_name: this.branch_name,
        //role:this.role
      };
      this.$emit("save-main", formData);
      console.log(formData);
    },
  },
};
</script>

<style>
</style>
