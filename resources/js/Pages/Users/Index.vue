<template>
    <home></home>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-right">بطاقة مستخدم</h2>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">رمز المستخدم</label><input type="text" class="form-control" value=""></div>
                    <div class="col-md-6"><label class="labels">اسم المستخدم</label><input type="text" class="form-control" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">الفرع </label><input type="text" class="form-control"  value=""></div>
                    <div class="col-md-12"><label class="labels">البريد الالكتروني</label><input type="text" class="form-control" value=""></div>
                    <div class="col-md-12"><label class="labels">كلمة المرور</label><input type="text" class="form-control" value=""></div>
                    <div class="col-md-12"><label class="labels">الصفة</label><input type="text" class="form-control"  value=""></div>
                    <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">الاسم الأول</label><input type="text" class="form-control" value=""></div>
                    <div class="col-md-6"><label class="labels">الاسم الأخير</label><input type="text" class="form-control" value=""></div>
                    </div>
                     <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">اسم الأب</label><input type="text" class="form-control" value=""></div>
                    <div class="col-md-6"><label class="labels">اسم الأم</label><input type="text" class="form-control" value=""></div>
                    </div>
                    <div class="col-md-12"><label class="labels">الرقم الوطني</label><input type="text" class="form-control"  value=""></div>
                    <div class="col-md-12"><label class="labels">هاتف</label><input type="text" class="form-control" value=""></div>
                    <div class="col-md-12"><label class="labels">جوال</label><input type="text" class="form-control" value=""></div>
                    <div class="col-md-12"><label class="labels">ملاحظات</label><textarea type="text" class="form-control" value=""></textarea></div>
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
