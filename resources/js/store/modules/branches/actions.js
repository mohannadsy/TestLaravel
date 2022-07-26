import { Inertia } from "@inertiajs/inertia";
import axios from "axios";


export default {
    registerBranch(context, data) {
        const branchData = {
            //id: new Date().toISOString,
            code: data.code,
            name: data.name,
            branch_id: data.branch_id,
            responsibility: data.responsibility,
            address: data.address,
            website: data.website,
            email: data.email,
            phone: data.phone,
            mobile: data.mobile,
            is_active: data.is_active
        };
        // const response = await fetch(route('branch.store'), {
        //     method: 'POST',
        //     body: branchData
        // })
        // axios.post('branch.store', branchData);
        Inertia.post(route('branch.store'), branchData);
        context.commit('newBranch', {
            ...branchData
        });
        console.log(branchData)
    },
    // axios.get(route("branch.show", this.nodeId))
    async updateProduct({ commit }, branch) {
        // commit('setProductIsUpdating', true);
        // commit('setProductIsUpdating', true);
        await axios.post(route('branch.update', branch.id), branch)
            .then(res => {
                commit('saveUpdatedProduct', res.data.data);
                //commit('setProductIsUpdating', false);
            }).catch(err => {
                console.log('error', err);
                //commit('setProductIsUpdating', false);
            });
    },
    // async edit({ commit }, branch) {
    //     let response = Inertia.post(route('branch.update', branch.id), branch);
    //     //let response = await Api().put(`/videos/${video.id}`, video);
    //     let newBranch = response.data.data.attributes;
    //     commit('EDIT_BRANCH', newBranch);
    //     return newBranch;
    // },
    // editBranch(context, { data, nodeId }) {
    //     const branchData = {
    //         id: nodeId,
    //         code: data.code,
    //         name: data.name,
    //         branch_id: data.branch_id,
    //         responsibility: data.responsibility,
    //         address: data.address,
    //         website: data.website,
    //         email: data.email,
    //         phone: data.phone,
    //         mobile: data.mobile,
    //         is_active: data.is_active
    //     };
    //     Inertia.post(route('branch.update', branchData.id), branchData);
    //     context.commit('newrBranch', {
    //         ...branchData
    //     });
    // },
    async loadBranches() {
        //const response = Inertia.get(route('branch.TreeOfMainBranch'));
        let messages = [];
        const response = await fetch(Inertia.get(route('branch.index')));
        const responseData = response.json();
        //const response = fetch(Inertia.get(route('branch.index')));
        console.log(responseData);
        // const responseData = await response.json;
        // console.log(responseData);
        // if (!response.ok) {
        //     ///
        // }
        // const branches = [];
        // for (const key in responseData) {
        //     const branch = {
        //         id: key,
        //         code: responseData[key].code,
        //         name: responseData[key].name,
        //         branch_id: responseData[key].branch_id,
        //         responsibility: responseData[key].responsibility,
        //         address: responseData[key].address,
        //         website: responseData[key].website,
        //         email: responseData[key].email,
        //         phone: responseData[key].phone,
        //         mobile: responseData[key].mobile,
        //         //branches: responseData[key].branches
        //     };
        //     console.log(branch);
        //     branches.push(branch);
        // }
        // context.commit('setBranches', branches);
        // console.log('hi');
        // console.log(branches);
        // console.log('hiiiii');
    }
};