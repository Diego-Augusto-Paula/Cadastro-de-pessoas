<template>
    <guest>
        <template #header>
            <h2>User Edit</h2>
        </template>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <Back :backUrl="route('pessoa.index')"></Back>
                </div>
                <div class="card-body">
                    <formModule
                        :submitMethod="submit"
                        :isUpdate="true"
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
    name: "Edit",
    props: ["endereco", "errors"],
    components: {
        Back,
        formModule,
    },
    methods: {
        submit(formData) {
            const form = {
                ...formData,
                 pessoa_id: route().params.pessoa,
                 id: route().params.endereco
            }
            this.$inertia.put(route("endereco.update", [route().params.endereco, route().params.pessoa]), formData);
        },
    },
};
</script>
