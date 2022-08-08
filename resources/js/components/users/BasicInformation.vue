<template>
  <form @submit.prevent="submitForm">
    <div class="row mt-2">
      <div class="col-md-6">
        <div class="form-group row mt-3">
          <elemet-label class="col-form-label col-3"
            >{{ $t("firstName") }}
          </elemet-label>
          <div class="col-8">
            <element-input
              type="text"
              class="form-control"
              @change="objChanged"
              v-model.trim="myObj.first_name"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-3"
            >{{ $t("fatherName") }}
          </elemet-label>
          <div class="col-md-8">
            <element-input
              type="text"
              class="form-control"
              @change="objChanged"
              v-model.trim="myObj.middle_name"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-3">
            {{ $t("lastName") }}</elemet-label
          >
          <div class="col-md-8">
            <element-input
              type="text"
              class="form-control"
              @change="objChanged"
              v-model.trim="myObj.last_name"
            />
          </div>
        </div>

        <!-- <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3">اسم الأم</elemet-label>
        <div class="col-md-8">
          <element-input type="text" class="form-control" />
        </div>
      </div> -->
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-3">
            {{ $t("userPhone") }}</elemet-label
          >
          <div class="col-md-8">
            <element-input
              type="text"
              class="form-control"
              @change="objChanged"
              v-model.trim="myObj.phone"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-3">
            {{ $t("userMobile") }}</elemet-label
          >
          <div class="col-md-8">
            <element-input
              type="text"
              class="form-control"
              @change="objChanged"
              v-model.trim="myObj.mobile"
            />
          </div>
        </div>
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-3">
            {{ $t("idNumber") }}
          </elemet-label>
          <div class="col-md-8">
            <element-input
              type="text"
              class="form-control"
              @change="objChanged"
              v-model.trim="myObj.id_number"
            />
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group row mt-2">
          <elemet-label class="col-form-label col-md-2">
            {{ $t("userNotes") }}</elemet-label
          >
          <div class="col-md-9">
            <text-area
              class="form-control"
              @change="objChanged"
              v-model.trim="myObj.notes"
            ></text-area>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import TextArea from "../../Shared/TextArea.vue";
export default {
  data() {
    return {
      myObj: {
        first_name: "",
        middle_name: "",
        last_name: "",
        phone: "",
        mobile: "",
        id_number: "",
        notes: "",
      },
    };
  },
  emits: ["save-basic"],
  props: ["userInformation", "form"],
  components: {
    ElemetLabel,
    ElementInput,
    TextArea,
  },
  watch: {
    form() {
      this.myObj = this.form;
    },
    userInformation() {
      Object.assign(this.myObj, this.userInformation);
    },
  },
  methods: {
    objChanged() {
      this.$emit("save-basic", this.myObj);
    },
  },
};
</script>
