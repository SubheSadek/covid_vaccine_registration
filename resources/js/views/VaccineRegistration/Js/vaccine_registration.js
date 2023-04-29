import { reactive, ref, onMounted } from "vue";
import { info, callApi } from "../../../Helpers/apiService.js";

export function useVaccineRegistration() {
    const formValue = reactive({
        vaccine_center_id: "",
        name: "",
        phone: "",
        email: "",
        nid: "",
        address: "",
        birth_date: "",
    });

    const ruleValidate = reactive({
        name: [
            {
                required: true,
                message: "Please input your name",
                trigger: "blur",
            },
            {
                max: 255,
                message: "Name must not be greater than 255 characters",
                trigger: "blur",
            },
        ],
        email: [
            {
                required: true,
                message: "Please input your email",
                trigger: "blur",
            },
            {
                type: "email",
                message: "Please input a valid email",
                trigger: "blur",
            },
        ],
        phone: [
            {
                required: true,
                message: "Please input your phone",
                trigger: "blur",
            },
        ],
        nid: [
            {
                required: true,
                message: "Please input your NID",
                trigger: "blur",
            },
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

    const centers = ref([]);
    const isLoading = ref(false);
    const formRef = ref(null);
    const handleSubmit = async () => {
        formRef.value.validate(async (valid) => {
            if (valid) {
                isLoading.value = true;
                const formData = formatFormData(formValue);
                const res = await callApi("POST", "/register-vccine", formData);
                if (res.status == 200) {
                    window.location.href = "/";
                }
                isLoading.value = false;
            }
        });
    };
    const handleReset = (name) => {
        formRef.value.resetFields();
    };

    function formatFormData(formData) {
        formData["email"] = formData.email.toLowerCase();
        return formData;
    }
    return {
        formValue,
        ruleValidate,
        centers,
        isLoading,
        handleSubmit,
        handleReset,
        formRef,
    };
}
