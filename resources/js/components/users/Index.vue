<template>
  <div class="container-fluide rounded bg-light">
    <div class="row">
      <div class="col-md">
        <div class="row px-3 mt-1 ">
          <page-title> {{$t('userCard')}}</page-title>
        </div>
        <form>
          <main-information :userInformation="userInformation" @save-main="saveMain"></main-information>
        </form>
        <!-- <hr class="new1"> -->
        <div class="row a mt-2">
          <div class="col-5">
            <title-button @click="activeTab = 'BasicInformation'"
              > {{$t('userBasicInfo')}}</title-button
            >
            <title-button @click="activeTab = 'Permissions'"
              >{{$t('userPermissions')}}</title-button
            >
            <title-button @click="activeTab = 'ExtraOptions'"
              >{{$t('userAdditionalOptions')}} </title-button
            >
          </div>
        </div>
        <basic-information
        :userInformation="userInformation"
          v-if="activeTab === 'BasicInformation'"
          @save-basic="saveBasic"
        ></basic-information>
        <permissions v-if="activeTab === 'Permissions'" :groupPermissions="$page['props']['groupPermissions']" :userPermissions="userPermissions"/>
        <extra-options :userInformation="userInformation" v-if="activeTab === 'ExtraOptions'" />
        <div class="row justify-content-end mb-2">
          <div class="col-md-4">
            <element-button @click="submit">{{$t('userSave')}} </element-button>
            <element-button>{{$t('UserNew')}} </element-button>
            <element-button>{{$t('userUpdate')}} </element-button>
            <element-button>{{$t('userDelete')}} </element-button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import Home from "../../Pages/Home1.vue";
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
import { useForm } from "@inertiajs/inertia-vue3";
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
    userPermissions: Array,
    userInformation:Object,
    userId: String,
    errors: Object,
  },
  data() {
    return {
      activeTab: "BasicInformation",
     form: useForm({
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
      (this.form.code = data.code),
        (this.form.name = data.name),
        (this.form.email = data.email),
        (this.form.password = data.password),
        (this.form.branch_id = data.branch_id);
      this.form.role = data.role;
    },
    saveBasic(data) {
      (this.form.first_name = data.first_name),
        (this.form.middle_name = data.middle_name),
        (this.form.last_name = data.last_name),
        (this.form.phone = data.phone),
        (this.form.mobile = data.mobile);
      this.form.id_number = data.id_number;
      this.form.notes = data.notes;
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
/* .container-fluide{
  overscroll-behavior: contain;
} */
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
