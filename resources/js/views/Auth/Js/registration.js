const form = {
    vaccine_center_id: null,
    name: null,
    phone: null,
    email: null,
    nid: null,
    address: null,
    birth_date: null,
};
const ruleValidate = {
    name: [
        { required: true, message: "Please input your name", trigger: "blur" },
        {
            max: 255,
            message: "Name must not be greater than 255 charecters",
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
        { required: true, message: "Please input your phpne", trigger: "blur" },
    ],
    nid: [
        { required: true, message: "Please input your phpne", trigger: "blur" },
    ],
    birth_date: [
        {
            required: true,
            message: "Please select your birth date",
            trigger: "blur",
        },
    ],
};

export { form, ruleValidate };
