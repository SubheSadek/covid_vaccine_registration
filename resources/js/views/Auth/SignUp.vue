<template>
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            
            <div class="d-flex flex-column flex-lg-row-fluid">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid py-10">
                    <!--begin::Wrapper-->
                    <div class="w-lg-1000px p-10 p-lg-15 mx-auto _box_shadow" style="border-radius: 6px;">
                        <!--begin::Form-->
                        <Form ref="form" :model="form" :rules="ruleValidate" class="form w-100">

                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">SignUp to Referral</h1>
                            </div>
                            
                            <Row :gutter="16">
                                <Col span="12">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="Name" prop="name">
                                            <Input 
                                                show-word-limit maxlength="255"
                                                v-model.trim="form.name" 
                                                type="text" placeholder="Name"
                                                autocomplete="off" size="large">
                                            </Input>
                                        </FormItem>
                                    </div>
                                </Col>

                                <Col span="12">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="Email" prop="email">
                                            <Input 
                                                show-word-limit maxlength="255"
                                                v-model.trim="form.email" 
                                                type="text" placeholder="Email"
                                                autocomplete="off" size="large">
                                            </Input>
                                        </FormItem>
                                    </div>
                                </Col>

                                <Col span="12">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="Phone" prop="phone">
                                            <Input 
                                                show-word-limit maxlength="14"
                                                v-model.trim="form.phone" 
                                                type="text" placeholder="Phone"
                                                autocomplete="off"  size="large">
                                            </Input>
                                        </FormItem>
                                    </div>
                                </Col>

                                <Col span="12">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="NID" prop="nid">
                                            <Input 
                                                show-word-limit maxlength="17"
                                                v-model.trim="form.nid" 
                                                type="text" placeholder="NID"
                                                autocomplete="off" size="large">
                                            </Input>
                                        </FormItem>
                                    </div>
                                </Col>

                                <Col span="12">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="Birth Date" prop="birth_date">
                                            
                                                <DatePicker
                                                    @on-change="e => form.birth_date = e"
                                                    :model-value="form.birth_date"
                                                    format="yyyy-MM-dd" clearable type="date"
                                                    placeholder="Select birth date"
                                                    style="width: 100%" size="large"
                                                />

                                        </FormItem>
                                    </div>
                                </Col>

                                <Col span="12">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="Vaccine Center" prop="vaccine_center_id">
                                            
                                            <SelectSearchOption
                                                v-model:formValue="form.vaccine_center_id"
                                                :initialData="centers"
                                                :title="`Search by center name`"
                                                :url="`vaccine-center-list`"
                                            />
                                               
                                        </FormItem>
                                    </div>
                                </Col>

                                <Col span="24">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="Address" prop="address">
                                            <Input v-model.trim="form.address" :rows="4" type="textarea" placeholder="Address"
                                                autocomplete="off">
                                            </Input>
                                        </FormItem>
                                    </div>
                                </Col>

                            </Row>

                            <div class="text-center">

                                <Button :loading="isLoading" shape="circle" style="height: 51px;" :disabled="isLoading"
                                    @click="handleSubmit('form')" size="large" type="primary" long>
                                    {{ isLoading ? 'Please wait ...' : 'Continue' }}
                                </Button>

                            </div>

                        </Form>

                    </div>

                </div>
            </div>

        </div>

    </div>
</template>

<script>
import SelectSearchOption from '../../Helpers/GlobalComponent/selectSearchOption.vue';
export default {
    name: 'SignUp',
    components: {
        SelectSearchOption
    },
    data() {
        const form = {
            vaccine_center_id: null,
            name: null,
            phone: null,
            email: null,
            nid: null,
            address: null,
            birth_date: null
        };
        const ruleValidate = {
            name: [
                { required: true, message: 'Please input your name', trigger: 'blur' },
                { max: 255, message: 'Name must not be greater than 255 charecters', trigger: 'blur' },
            ],
            email: [
                { required: true, message: 'Please input your email', trigger: 'blur' },
                { type: 'email', message: 'Please input a valid email', trigger: 'blur' },
            ],
            phone: [
                { required: true, message: 'Please input your phpne', trigger: 'blur' },
            ],
            nid: [
                { required: true, message: 'Please input your phpne', trigger: 'blur' },
            ],
            birth_date: [
                { required: true, message: 'Please select your birth date', trigger: 'blur' },
            ],
        };
        return {
            form,
            ruleValidate,
            centers: [],
        };
    },

    methods: {
        handleSubmit(name) {
            this.$refs[name].validate(async (valid) => {
                if (valid) {
                    this.isLoading = true;

                    const formData = this.formatFormData(this.form);
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
            this.form.referred_code = code;
        }
    }
}

</script>
