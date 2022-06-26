<template>
  <div class="row mt-2">
    <div class="col-md-6">
      <div class="form-group row mt-3">
        <elemet-label class="col-form-label col-3">الاسم الأول</elemet-label>
        <div class="col-8">
          <element-input type="text" class="form-control" />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-3">اسم الأب</elemet-label>
        <div class="col-md-8">
          <element-input type="text" class="form-control" />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3"
          >الاسم الأخير</elemet-label
        >
        <div class="col-md-8">
          <element-input type="text" class="form-control" />
        </div>
      </div>

      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3">اسم الأم</elemet-label>
        <div class="col-md-8">
          <element-input type="text" class="form-control" />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3">هاتف</elemet-label>
        <div class="col-md-8">
          <element-input type="text" class="form-control" />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3">جوال</elemet-label>
        <div class="col-md-8">
          <element-input type="text" class="form-control" />
        </div>
      </div>
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-3"
          >الرقم الوطني</elemet-label
        >
        <div class="col-md-8">
          <element-input type="text" class="form-control" />
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group row mt-2">
        <elemet-label class="col-form-label col-md-2">ملاحظات</elemet-label>
        <div class="col-md-9">
          <text-area class="form-control"></text-area>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import TextArea from "../../Shared/TextArea.vue";
export default {
  components: {
    ElemetLabel,
    ElementInput,
    TextArea,
  },
};
</script>
