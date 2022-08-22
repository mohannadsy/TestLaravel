<template>
    <div class="container">
       
        <!-- <div class="col">  -->
            <!-- <div class="card"> -->
                <!-- <div class="card-header">Laravel Vue JS File Upload Demo</div> -->
                <!-- <div class="card-body"> -->
                    <!-- <div v-if="success != ''" class="alert alert-success">
                        {{success}}
                    </div> -->
                    <file-attachments   />
                    <image-attachments />

                    <!-- </div> -->
                <!-- </div> -->

            <!-- </div> -->
    </div>
</template>

<script>
import fileAttachments from './fileAttachments.vue';
import imageAttachments from './imageAttachments.vue'
    export default {
        components:{
            fileAttachments,
            imageAttachments
        },
        // props:["filename"],
        // data() {
        //     return {
        //         name: '',
        //         path: '',
        //         success: ''
        //     };
        // },
        // methods: {
        //     onChange(e) {
        //         this.path = e.target.files[0];
        //     },
        //     formSubmit(e) {
        //         e.preventDefault();
        //         let existingObj = this;
        //         const config = {
        //             headers: {
        //                 'content-type': 'multipart/form-data'
        //             }
        //         }
        //         let data = new FormData();
        //         data.append('path', this.path);
        //         axios.post('/upload', data, config)
        //             .then(function (res) {
        //                 existingObj.success = res.data.success;
        //             })
        //             .catch(function (err) {
        //                 existingObj.output = err;
        //             });
        //     }
        // }
    }
</script>
<style scoped>

</style>
