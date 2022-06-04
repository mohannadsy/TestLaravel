<template>
    <home></home>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-right">بطاقة فرع</h2>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">رمز الفرع</label><input type="text" class="form-control" value=""></div>
                    <div class="col-md-6"><label class="labels">اسم الفرع</label><input type="text" class="form-control" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">الفرع الرئيسي</label><input type="text" class="form-control"  value=""></div>
                    <div class="col-md-12"><label class="labels">المسؤولية</label><input type="text" class="form-control" value=""></div>
                    <div class="col-md-12"><label class="labels">العنوان</label><input type="text" class="form-control" value=""></div>
                    <div class="col-md-12"><label class="labels">موقع الانترنت</label><input type="text" class="form-control"  value=""></div>
                    <div class="col-md-12"><label class="labels">البريد الالكتروني</label><input type="text" class="form-control"  value=""></div>
                    <div class="col-md-12"><label class="labels">هاتف</label><input type="text" class="form-control" value=""></div>
                    <div class="col-md-12"><label class="labels">جوال</label><input type="text" class="form-control" value=""></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <button class="btn btn-primary">حفظ</button>
                <button class="btn btn-primary">جديد</button>
                <button class="btn btn-primary">تعديل</button>
                <button class="btn btn-primary">حذف</button>
            </div>
        </div>
    </div>
</div>

</template>

<script>
import Home from '../Home.vue'
export default {
    components:{
        Home
    }
}
</script>
