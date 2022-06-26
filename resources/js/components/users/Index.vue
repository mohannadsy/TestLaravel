<template>
  <home></home>
  <div class="container-fluide rounded bg-white mb-1">
    <div class="row justify-content-end">
      <div class="col-md-9 border-right">
        <div class="row px-3 mt-1 pb-2">
          <page-title>بطاقة مستخدم</page-title>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group row mt-2">
              <elemet-label class="col-form-label col-md-3">رمز المستخدم</elemet-label>
              <div class="col-8">
                <element-input type="text" class="form-control"/>
              </div>
            </div>
            <div class="form-group row mt-2">
              <elemet-label
                class="col-form-label col-md-3"
                style="padding-left: 6px">اسم المستخدم</elemet-label>
              <div class="col-8">
                <element-input type="text" class="form-control"/>
              </div>
            </div>
            <div class="form-group row mt-2">
              <elemet-label
                class="col-form-label col-md-3"
                style="padding-left: 6px"
                >البريد الالكتروني</elemet-label
              >
              <div class="col-8">
                <element-input type="text" class="form-control"/>
              </div>
            </div>
            <div class="form-group row mt-2">
              <elemet-label class="col-form-label col-md-3">كلمة المرور</elemet-label>
              <div class="col-8">
                <element-input type="text" class="form-control"/>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group row mt-2">
              <elemet-label class="col-form-label col-2">الفرع </elemet-label>
              <div class="col-8">
                <element-input type="text" class="form-control"/>
              </div>
            </div>
            <div class="form-group row mt-2">
              <elemet-label class="col-form-label col-2">الصفة</elemet-label>
              <div class="col-8">
                <v-select :value="rvalue" :options="role" />
              </div>
            </div>
            <div class="form-group row mt-2">
              <div class="col-md-2 justify-content-right">
                <checkbox-switch></checkbox-switch>
              </div>
            </div>
          </div>
        </div>
        <!-- <hr class="new1"> -->
        <div class="row a mt-2">
          <div class="col-5">
            <title-button @click="activeTab = 'BasicInformation'"
              >معلومات أساسية</title-button
            >
            <title-button @click="activeTab = 'Permissions'"
              >صلاحيات</title-button
            >
            <title-button @click="activeTab = 'ExtraOptions'"
              >خيارات إضافية</title-button
            >
          </div>
        </div>
        <basic-information v-if="activeTab === 'BasicInformation'" />
        <permissions v-if="activeTab === 'Permissions'" />
        <extra-options v-if="activeTab === 'ExtraOptions'" />
        <div class="row justify-content-end mb-2">
          <div class="col-md-4">
            <element-button>حفظ</element-button>
            <element-button>جديد</element-button>
            <element-button>تعديل</element-button>
            <element-button>حذف</element-button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Home from "../Home.vue";
import BasicInformation from "./BasicInformation.vue";
import Permissions from "./Permissions.vue";
import ExtraOptions from "./ExtraOptions.vue";
import PageTitle from "../../Shared/PageTitle.vue";
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import VSelect from "../../Shared/VSelect.vue";
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue";
import ElementButton from "../../Shared/ElementButton.vue";
import TitleButton from "../../Shared/TitleButton.vue";
export default {
  components: {
    Home,
    BasicInformation,
    Permissions,
    ExtraOptions,
    PageTitle,
    ElemetLabel,
    ElementInput,
    VSelect,
    CheckboxSwitch,
    ElementButton,
    TitleButton,
  },
  data() {
    return {
      activeTab: "BasicInformation",
      rvalue: "",
      role: ["مدير عام", "محاسب", "كاشير"],
    };
  },
};
</script>
<style scoped>
button {
  margin: 2px;
}
/* hr.new1 {
  border-bottom: 3px solid black;
} */
div.a {
  -webkit-text-decoration-line: overline; /* Safari */
  text-decoration-line: overline;
  border-top: 3px solid black;
}
</style>
