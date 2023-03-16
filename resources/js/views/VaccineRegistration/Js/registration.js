const form = {
    vaccine_center_id: 2,
    name: "",
    phone: "",
    email: "",
    nid: "",
    address: "",
    birth_date: "",
};

const ruleValidate = {
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
};

export { form, ruleValidate };
