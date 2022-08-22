<template>
    <form @submit="formSubmit" enctype="multipart/form-data" method="post">
        <div class="form-group row py-2">
            <div class="custom_file col-2 px-2">
                <span> <fa icon="file-arrow-up" class="file-arrow-up" /> اختيار ملف   </span>                               
                <element-input type="file" class=" file" v-on:change="onChange" />
            </div>
            <div class="custom_filename col-5" >
                <span class="filename">{{this.path.name}}</span>
            </div>
            <div class="col-4">
                <element-button class="btn btn-primary ">ارفاق</element-button>
                <element-button class="btn btn-primary">حذف</element-button>  
            </div>
        </div>
    </form>
</template>

<script>
import ElemetLabel from '../../Shared/ElemetLabel.vue';
import ElementInput from '../../Shared/ElementInput.vue';
import ElementButton from '../../Shared/ElementButton.vue';
    export default {
        components:{
           ElemetLabel,
           ElementInput,
            ElementButton,
        },
        data() {
            return {
                name: '',
                path: '',
                success: ''
            };
        },
        methods: {
            onChange(e) {
                this.path = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let data = new FormData();
                data.append('path', this.path);
                axios.post('/upload', data, config)
                    .then(function (res) {
                        existingObj.success = res.data.success;
                    })
                    .catch(function (err) {
                        existingObj.output = err;
                    });
            }
        }
    }
</script>
<style scoped>
.custom_file{
    background-color: #eee;
    width:150px;
    height: 40px;
    border: 1px solid #ccc;
    position:relative;
    z-index: 1;
    margin-left: 10px;
}
.custom_filename{
    background-color: #eee;
    width:450px;
    height: 40px;
    border: 1px solid #ccc;
    /* position:relative; */
    /* z-index: 1; */
    overflow: hidden;
}

.custom_file input[type="file"] {
    width: 100%;
    height: 100%;
    opacity:0;
    position: absolute;
    top: 0;
    left: 0;
    z-index:3;

}
.custom_file  span{
    padding:7px 10px;
    display: block;
    font-size: 18px;
}
.custom_filename > span{
    padding:5px 5px;
    display: block;
    font-size: 18px;
}

button{
    margin-inline: 8px;
}
.file-arrow-up{
    font-size: 25px;
}
</style>
