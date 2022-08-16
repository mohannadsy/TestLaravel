<template>
  <div class="container-fluide rounded bg-light">
    <div class="row">
      <div class="col-md">
        <div class="row px-3 mt-1">
          <page-title> {{ $t("userCard") }}</page-title>
        </div>
        <form>
          <main-information
            :userInformation="userInformation"
            :form="form"
            :roleOptions="roleOptions"
            :roleArray="roleArray"
            @save-main="saveMain"
          ></main-information>
        </form>
        <!-- <hr class="new1"> -->
        <div class="row a mt-2">
          <div class="col">
            <title-button :type="'button'" @click="activeTab = 'BasicInformation'">
              {{ $t("userBasicInfo") }}</title-button
            >
            <title-button :type="'button'" @click="activeTab = 'Permissions'">{{
              $t("userPermissions")
            }}</title-button>
            <title-button :type="'button'" @click="activeTab = 'ExtraOptions'"
              >{{ $t("userAdditionalOptions") }}
            </title-button>
          </div>
        </div>
        <basic-information
          :userInformation="userInformation"
          :form="form"
          v-if="activeTab === 'BasicInformation'"
          @save-basic="saveBasic"
        ></basic-information>
        <permissions
          v-if="activeTab === 'Permissions'"
          :form="form"
          :userPermissions="userPermissions"
          :userId="userId"
          @send-permissions="savePermissions"
        />
        <extra-options
          :userInformation="userInformation"
          :form="form"
          v-if="activeTab === 'ExtraOptions'"
        />
        <div class="row justify-content-end mb-2">
          <div class="col-md-4">
            <element-button @click="storeUser"
              >{{ $t("userSave") }}
            </element-button>
            <element-button :type="'button'" @click="newUser"
              >{{ $t("UserNew") }}
            </element-button>
            <element-button>{{ $t("userUpdate") }} </element-button>
            <element-button :type="'button'" @click="deleteUser"
              >{{ $t("userDelete") }}
            </element-button>
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
    userPermissions: Array,
    userInformation: Object,
    userId: String,
    errors: Object,
    roleOptions: Array,
    roleArray: Object,
  },
  data() {
    return {
      activeTab: "BasicInformation",
      rolePermissions:[],
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
        is_active: true,
        roleId: 2,
        // rolePermissions: [],
        currentPermissions:[],
        _token: this.$page.props.csrf_token,
      }),
    };
  },
  watch: {
    'form.roleId'(newVal) {
      console.log("hello from index" + newVal);
    },
  },
//   computed: {
//     rrr() {
//       return this.from.roleId;
//     }
//   },
  methods: {
    saveMain({data,rolePermissions}) {
      //(this.form.rolePermissions = data.rolePermissions),
    this.rolePermissions = rolePermissions;
      (this.form.roleId = data.roleId),
      (this.form.code = data.code),
        (this.form.name = data.name),
        (this.form.email = data.email),
        (this.form.password = data.password),
        (this.form.branch_id = data.branch_id);
      this.form.is_active = data.is_active;
      this.$emit("send-roleId", this.form.roleId);
    },
    saveBasic(data) {
      (this.form.first_name = data.first_name),
        (this.form.middle_name = data.middle_name),
        (this.form.last_name = data.last_name),
        (this.form.phone = data.phone),
        (this.form.mobile = data.mobile);
      (this.form.id_number = data.id_number)
      (this.form.notes = data.notes)
    },
    savePermissions(data){
        (this.form.currentPermissions = data.currentPermissions)
    },
    saveExtra(data) {},
    storeUser() {
      //   this.form.post(route("user.store"));
      this.$inertia.post(route("user.store"), this.form);
      //   console.log(this.form);
    },
    async newUser() {
      //   this.form = useForm({
      //     code: "",
      //     name: "",
      //     email: "",
      //     password: "",
      //     branch_id: "",
      //     role: "Accountant",
      //     first_name: "",
      //     middle_name: "",
      //     last_name: "",
      //     phone: "",
      //     mobile: "",
      //     id_number: "",
      //     notes: "",
      //     is_active: true,
      //     _token: this.$page.props.csrf_token,
      //   });
      //   let rolePermission = await axios.get(route("user.rolePermission", this.roleId));
      //  this.rolePermissions = JSON.parse(JSON.stringify(rolePermission.data));
      //   console.log( typeof( this.roleId));
    },
    deleteUser() {
      Inertia.get(route("user.delete", this.userId), this.form);
    },
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
