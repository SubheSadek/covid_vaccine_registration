import { reactive, ref } from "vue";
import { info, callApi } from "../../../Helpers/apiService.js";

export const form = reactive({
    vaccine_center_id: "",
    name: "",
    phone: "",
    email: "",
    nid: "",
    address: "",
    birth_date: "",
});

export const ruleValidate = reactive({
    name: [
        { required: true, message: "Please input your name", trigger: "blur" },
        {
            max: 255,
            message: "Name must not be greater than 255 characters",
            trigger: "blur",
        },
    ],
    email: [
        { required: true, message: "Please input your email", trigger: "blur" },
        {
            type: "email",
            message: "Please input a valid email",
            trigger: "blur",
        },
    ],
    phone: [
        { required: true, message: "Please input your phone", trigger: "blur" },
    ],
    nid: [
        { required: true, message: "Please input your NID", trigger: "blur" },
    ],
    birth_date: [
        {
            required: true,
            message: "Please select your birth date",
            trigger: "blur",
        },
    ],
    vaccine_center_id: [
        {
            required: true,
            type: "number",
            message: "Please select a vaccine center",
            trigger: "blur",
        },
    ],
});

export const centers = ref([]);

export const isLoading = ref(false);

// export const handleSubmit = (name) => {
//     this.$refs[name].validate(async (valid) => {
//         if (valid) {
//             this.isLoading = true;

//             const formData = this.formatFormData(this.form);
//             const res = await this.callApi('POST', '/register-vccine', formData);
//             if (res.status == 200) {
//                 window.location.href = "/";
//             }
//             this.isLoading = false;
//         }
//     })
// }
// handleReset(name) {
//     this.$refs[name].resetFields();
// },
// formatFormData(formData) {
//     formData['email'] = formData.email.toLowerCase();
//     return formData;
// }
