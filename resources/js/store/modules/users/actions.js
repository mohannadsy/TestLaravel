import { Inertia } from "@inertiajs/inertia";

export default {
    registerUser(context, data) {
        const userData = {
            //id: new Date().toISOString,
            code: data.code,
            name: data.name,
            email: data.email,
            email_verified_at: data.email_verified_at,
            password: data.password,
            branch_name: data.branch_name,
            role: data.role,
            branch_id: data.branch_id,
            first_name: data.first_name,
            middle_name: data.middle_name,
            last_name: data.last_name,
            phone: data.phone,
            id_number: data.id_number,
            current_team_id: data.current_team_id,
            profile_photo_path: data.profile_photo_path,
            mobile: data.mobile
        };
        Inertia.post(route('user.store'), userData);
        context.commit('registerUser', {
            ...userData
        });
    }
};