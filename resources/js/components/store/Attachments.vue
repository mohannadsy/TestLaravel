<template>
    <div class="container">
       <div class="row py-2">
            <!-- <div class="col">  -->
                <!-- <div class="card"> -->
                    <!-- <div class="card-header">Laravel Vue JS File Upload Demo</div> -->
                    <!-- <div class="card-body"> -->
                        <!-- <div v-if="success != ''" class="alert alert-success">
                            {{success}}
                        </div> -->
                        <form class="form-group row" @submit="formSubmit" enctype="multipart/form-data" method="post">
                            <div class="custom_file col-8">
                                <span> <fa icon="file-arrow-up" class="file-arrow-up" /> اختيار ملف   </span>
                                <span>{{filename}}</span>
                                <input type="file" class="form-control file" v-on:change="onChange"/>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary">حذف</button>
                                <button class="btn btn-primary ">ارفاق</button>
                            </div>


                        </form>

                    <!-- </div> -->
                <!-- </div> -->

            <!-- </div> -->
        </div>
    </div>
</template>

<script>
import ElemetLabel from '../../Shared/ElemetLabel.vue';
    export default {
        components:{
           ElemetLabel,
        },
        props:["filename"],
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
    width:400px;
    height: 40px;
    border: 1px solid #ccc;
    position:relative;
    z-index: 1;
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
    padding:5px 10px;
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
