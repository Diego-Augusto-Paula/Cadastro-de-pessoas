<template>
    <div class="flex h-screen justify-center mt-5">
        <form action="" method="" class="w-1/3" @submit.prevent="submit">
            <div class="col form-group">
                <label for="tipoEndereco">Tipo Endereço</label>
                <input
                    type="text"
                    class="form-control"
                    id="tipoEndereco"
                    v-model="formData.tipoEndereco"
                    ref="tipoEndereco"
                    @blur="onConfirm"
                />
                <div v-if="errors.tipoEndereco" class="text-danger">
                    {{ errors.tipoEndereco }}
                </div>
            </div>
            <div class="col form-group">
                <label for="cep">CEP</label>
                <input
                    type="text"
                    class="form-control"
                    id="cep"
                    v-model="formData.cep"
                    ref="cep"
                    @blur="onConfirm"
                />
                <div v-if="errors.cep" class="text-danger">
                    {{ errors.cep }}
                </div>
            </div>
            <div class="col form-group">
                <label for="logradouro">Logradouro</label>
                <input
                    type="text"
                    class="form-control"
                    id="logradouro"
                    v-model="formData.logradouro"
                    ref="logradouro"
                    @blur="onConfirm"
                />
                <div v-if="errors.logradouro" class="text-danger">
                    {{ errors.logradouro }}
                </div>
            </div>
            <div class="col form-group">
                <label for="numero">Número</label>
                <input
                    type="text"
                    class="form-control"
                    id="numero"
                    v-model="formData.numero"
                    ref="numero"
                    @blur="onConfirm"
                />
                <div v-if="errors.numero" class="text-danger">
                    {{ errors.numero }}
                </div>
            </div>
            <div class="col form-group">
                <label for="complemento">Complemento</label>
                <input
                    type="text"
                    class="form-control"
                    id="complemento"
                    v-model="formData.complemento"
                    ref="complemento"
                    @blur="onConfirm"
                />
                <div v-if="errors.complemento" class="text-danger">
                    {{ errors.complemento }}
                </div>
            </div>
            <div class="col form-group">
                <label for="bairro">Bairro</label>
                <input
                    type="text"
                    class="form-control"
                    id="bairro"
                    v-model="formData.bairro"
                    ref="bairro"
                    @blur="onConfirm"
                />
                <div v-if="errors.cpf" class="text-danger">
                    {{ errors.bairro }}
                </div>
            </div>
            <div class="col form-group">
                <label for="estado">Estado</label>
                <input
                    type="estado"
                    class="form-control"
                    id="estado"
                    v-model="formData.estado"
                    ref="estado"
                    @blur="onConfirm"
                />
                <div v-if="errors.estado" class="text-danger">
                    {{ errors.estado }}
                </div>
            </div>
            <div class="col form-group">
                <label for="cidade">Cidade</label>
                <input
                    type="cidade"
                    class="form-control"
                    id="cidade"
                    v-model="formData.cidade"
                    ref="cidade"
                    @blur="onConfirm"
                />
                <div v-if="errors.cidade" class="text-danger">
                    {{ errors.cidade }}
                </div>
            </div>

            <div class="col form-group flex justify-end mt-1">
                <input
                    v-if="isUpdate"
                    type="submit"
                    class="btn btn-block btn-secondary"
                    value="Update"
                />
                <input
                    v-else
                    type="submit"
                    class="btn btn-block btn-secondary"
                    value="Create"
                />
            </div>
        </form>
    </div>
</template>
<script>
import Multiselect from '@vueform/multiselect'
export default {
    tipoEndereco: "form",
    props: ["endereco", "isUpdate", "submitMethod", "errors"],
    components: {
        Multiselect
    },
    data() {
        return {
            formData: {
                tipoEndereco: this.endereco?.tipoEndereco,
                cep: this.endereco?.cep,
                logradouro: this.endereco?.logradouro,
                numero: this.endereco?.numero,
                complemento: this.endereco?.complemento,
                bairro: this.endereco?.bairro,
                estado: this.endereco?.estado,
                cidade: this.endereco?.cidade,
            },
        };
    },
    methods: {
        submit() {
            if(this.onConfirm()){
                this.submitMethod(this.formData);
            }
        },
        onConfirm(){
            const tipoEndereco = this.$refs.tipoEndereco.value;
            const cep = this.$refs.cep.value;
            const logradouro = this.$refs.logradouro.value;
            const numero = this.$refs.numero.value;
            const complemento = this.$refs.complemento.value;
            const bairro = this.$refs.bairro.value;
            const estado = this.$refs.estado.value;
            const cidade = this.$refs.cidade.value;
            return true;
        }
    }
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
<style scoped>

</style>
