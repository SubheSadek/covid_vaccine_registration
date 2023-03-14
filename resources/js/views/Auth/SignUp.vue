<template>
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative">

                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <!--begin::Content-->
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <!--begin::Logo-->
                        <router-link to="/" class="py-9 mb-5">
                            <img alt="Logo" :src="`${this.baseUrl}assets/media/logos/logo-2.svg`" class="h-60px" />
                        </router-link>
                        <!--end::Logo-->
                        <!--begin::Title-->
                        <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">Covid Vaccine Registration</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <p class="fw-bold fs-2" style="color: #986923;">Free Vaccine Provided here..
                        </p>
                        <!--end::Description-->
                    </div>

                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                        style="background-image: url(assets/media/illustrations/sketchy-1/13.png)">
                        <!-- <img src="assets/media/illustrations/sketchy-1/13.png" alt=""> -->
                    </div>

                </div>

            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto" style="margin-top:10% !important;">
                        <!--begin::Form-->
                        <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" class="form w-100">

                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">SignUp to Referral</h1>
                            </div>

                            <div class="fv-row mb-10">
                                <FormItem class="form-label fs-6 fw-bolder text-dark" label="Name" prop="name">
                                    <Input v-model.trim="formValidate.name" type="text" placeholder="Name"
                                        autocomplete="off">
                                    </Input>
                                </FormItem>
                            </div>

                            <div class="fv-row mb-10">
                                <FormItem class="form-label fs-6 fw-bolder text-dark" label="Email" prop="email">
                                    <Input v-model.trim="formValidate.email" type="text" placeholder="Email"
                                        autocomplete="off">
                                    </Input>
                                </FormItem>
                            </div>

                            <div class="fv-row mb-10">
                                <FormItem class="form-label fw-bolder text-dark fs-6 mb-0" label="Password" prop="password">
                                    <Input v-model.trim="formValidate.password" type="password" password
                                        placeholder="Password" autocomplete="off">
                                    </Input>
                                </FormItem>
                            </div>

                            <div class="fv-row mb-10">
                                <FormItem class="form-label fw-bolder text-dark fs-6 mb-0" label="Confirm Password"
                                    prop="password_confirmation">
                                    <Input @on-enter="handleSubmit('formValidate')"
                                        v-model.trim="formValidate.password_confirmation" type="password" password
                                        placeholder="Confirm Password" autocomplete="off">
                                    </Input>
                                </FormItem>
                            </div>

                            <div class="text-center">

                                <Button :loading="isLoading" shape="circle" style="height: 51px;" :disabled="isLoading"
                                    @click="handleSubmit('formValidate')" size="large" type="primary" long>
                                    {{ isLoading ? 'Please wait ...' : 'Continue' }}
                                </Button>

                            </div>

                        </Form>

                        <div class="_login_redirect">
                            <router-link to="/">
                                Already have an account ? Login.
                            </router-link>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</template>

<script>
export default {
    name: 'SignUp',
    data() {
        const formValidate = {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
            referred_code: null,
        };
        const ruleValidate = {
            name: [
                { required: true, message: 'Please input your name', trigger: 'blur' },
                { max: 255, message: 'Name must not be greater than 255 charecters', trigger: 'blur' },
            ],
            email: [
                { required: true, message: 'Please input your email', trigger: 'blur' },
                { type: 'email', message: 'Please input a valid email', trigger: 'blur' },
                { max: 255, message: 'Email must not be greater than 255 charecters', trigger: 'blur' },
            ],
            password: [
                { required: true, message: 'Please input your password', trigger: 'blur' },
                { min: 6, message: 'Password must be at least 6 characters', trigger: 'blur' },
            ],
            password_confirmation: [
                {
                    validator: (rule, value, callback) => {
                        if (this.formValidate.password && value === '') {
                            callback(new Error('Please input password confirmation'));
                        } else if (this.formValidate.password && value !== this.formValidate.password) {
                            callback(new Error('Password confirmation is not same with password'));
                        } else {
                            callback();
                        }
                    }, trigger: 'blur'
                },
            ]
        };
        return {
            formValidate,
            ruleValidate,
        };
    },

    methods: {
        handleSubmit(name) {
            this.$refs[name].validate(async (valid) => {
                if (valid) {
                    this.isLoading = true;

                    const formData = this.formatFormData(this.formValidate);
                    const res = await this.callApi('POST', '/web/auth/register', formData);
                    if (res.status == 200) {
                        window.location.href = "/";
                    }
                    this.isLoading = false;
                }
            })
        },
        handleReset(name) {
            this.$refs[name].resetFields();
        },
        formatFormData(formData) {
            formData['email'] = formData.email.toLowerCase();
            return formData;
        }
    },
    created() {
        let code = this.$route.query.code || null;
        if (code) {
            this.formValidate.referred_code = code;
        }
    }
}

</script>
