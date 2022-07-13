<template>
  <form @submit.prevent="submitForm">
    <div class="row mt-2">
      <div class="col-md-6">
        <div class="form-group row mt-3">
          <elemet-label class="col-form-label col-3">الاسم الأول</elemet-label>
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
          <elemet-label class="col-form-label col-3">اسم الأب</elemet-label>
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
          <elemet-label class="col-form-label col-md-3"
            >الاسم الأخير</elemet-label
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
          <elemet-label class="col-form-label col-md-3">هاتف</elemet-label>
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
          <elemet-label class="col-form-label col-md-3">جوال</elemet-label>
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
          <elemet-label class="col-form-label col-md-3"
            >الرقم الوطني</elemet-label
          >
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
          <elemet-label class="col-form-label col-md-2">ملاحظات</elemet-label>
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
  components: {
    ElemetLabel,
    ElementInput,
    TextArea,
  },
  methods: {
    objChanged() {
      this.$emit("save-basic", this.myObj);
    },
  },
};
</script>
