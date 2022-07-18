<template>
  <div class="container-fluide rounded bg-white mb-1">
    <div class="row justify-content-end">
      <div class="col-md-12 border-right">
        <div class="row px-3 mt-1 pb-2">
          <page-title>بطاقة مستخدم</page-title>
        </div>
        <form>
          <main-information @save-main="saveMain"></main-information>
        </form>
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
        <basic-information
          v-if="activeTab === 'BasicInformation'"
          @save-basic="saveBasic"
        ></basic-information>
        <permissions v-if="activeTab === 'Permissions'" :groupPermissions="$page['props']['groupPermissions']"/>
        <extra-options v-if="activeTab === 'ExtraOptions'" />
        <div class="row justify-content-end mb-2">
          <div class="col-md-4">
            <element-button @click="submit">حفظ</element-button>
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
import { Inertia } from "@inertiajs/inertia";
import Home from "../../Pages/Home.vue";
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
import MainInformation from "./MainInformation.vue";
import { reactive } from "vue";
export default {
  components: {
    MainInformation,
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
   props: {
        groupPermissions:Array,
    },
  data() {
    return {
      activeTab: "BasicInformation",
      postData: reactive({
        code: "",
        name: "",
        email: "",
        password: "",
        branch_id: "",
        role: "",
        first_name: "",
        middle_name: "",
        last_name: "",
        phone: "",
        mobile: "",
        id_number: "",
        notes: "",
        _token: this.$page.props.csrf_token,
      }),
    };
  },
  methods: {
    saveMain(data) {
      (this.postData.code = data.code),
        (this.postData.name = data.name),
        (this.postData.email = data.email),
        (this.postData.password = data.password),
        (this.postData.branch_id = data.branch_id);
      this.postData.role = data.role;
    },
    saveBasic(data) {
      (this.postData.first_name = data.first_name),
        (this.postData.middle_name = data.middle_name),
        (this.postData.last_name = data.last_name),
        (this.postData.phone = data.phone),
        (this.postData.mobile = data.mobile);
      this.postData.id_number = data.id_number;
      this.postData.notes = data.notes;
    },
    saveExtra(data) {},
    submit() {
      // Inertia.post(route('user.store'), this.postData);
      this.$store.dispatch("users/registerUser", this.postData);
    },
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
