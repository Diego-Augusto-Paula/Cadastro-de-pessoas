<template>
    <guest>
        <template #header>
            <h2>Endereco Add</h2>
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
                        :endereco="endereco"
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
    props: ["pessoa", "endereco", "errors"],
    components: {
        Back,
        formModule,
    },
    methods: {
        submit(formData) {
            const form = {
                ...formData,
                 pessoa_id: route().params.pessoa
            }
            this.$inertia.post(route("endereco.store", route().params.pessoa), form);
        },
    },
};
</script>
