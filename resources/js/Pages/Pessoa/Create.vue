<template>
    <guest>
        <template #header>
            <h2>User Add</h2>
        </template>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <Back :backUrl="route('pessoa.index')"></Back>
                </div>
                <div class="card-body">
                    <formModule
                        :submitMethod="submit"
                        :isUpdate="false"
                        :user="user"
                        :errors="errors"
                    ></formModule>
                </div>
            </div>
        </div>
    </guest>
</template>
<script>
import Back from "@/Shared/Back";
import formModule from "./Form";
export default {
    name: "Create",
    props: ["user", "errors"],
    components: {
        Back,
        formModule,
    },
    methods: {
        submit(formData) {
            this.$inertia.post(route("pessoa.store"), formData);
        },
    },
};
</script>
