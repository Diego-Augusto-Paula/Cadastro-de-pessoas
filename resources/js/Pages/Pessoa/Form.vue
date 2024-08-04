<template>
    <div class="flex h-screen justify-center mt-5">
        <form action="" method="" class="w-1/3" @submit.prevent="submit">
            <div class="col form-group">
                <label for="nome">Nome</label>
                <input
                    type="text"
                    class="form-control"
                    id="nome"
                    v-model="formData.nome"
                    ref="nome"
                    @blur="onConfirm"
                />
                <div v-if="errors.nome" class="text-danger">
                    {{ errors.nome }}
                </div>
            </div>
            <div class="col form-group">
                <label for="nomeSocial">Nome Social</label>
                <input
                    type="text"
                    class="form-control"
                    id="nomeSocial"
                    v-model="formData.nomeSocial"
                    ref="nomeSocial"
                    @blur="onConfirm"
                />
                <div v-if="errors.nomeSocial" class="text-danger">
                    {{ errors.nomeSocial }}
                </div>
            </div>
            <div class="col form-group">
                <label for="cpf">CPF</label>
                <input
                    type="text"
                    class="form-control"
                    id="cpf"
                    v-model="formData.cpf"
                    ref="cpf"
                    @blur="onConfirm"
                />
                <div v-if="errors.cpf" class="text-danger">
                    {{ errors.cpf }}
                </div>
            </div>
            <div class="col form-group">
                <label for="nomePai">Nome do Pai</label>
                <input
                    type="text"
                    class="form-control"
                    id="nomePai"
                    v-model="formData.nomePai"
                    ref="nomePai"
                    @blur="onConfirm"
                />
                <div v-if="errors.nomePai" class="text-danger">
                    {{ errors.nomePai }}
                </div>
            </div>
            <div class="col form-group">
                <label for="nomeMae">Nome do Mãe</label>
                <input
                    type="text"
                    class="form-control"
                    id="nomeMae"
                    v-model="formData.nomeMae"
                    ref="nomeMae"
                    @blur="onConfirm"
                />
                <div v-if="errors.nomeMae" class="text-danger">
                    {{ errors.nomeMae }}
                </div>
            </div>
            <div class="col form-group">
                <label for="telefone">Telefone</label>
                <input
                    type="text"
                    class="form-control"
                    id="telefone"
                    v-model="formData.telefone"
                    ref="telefone"
                    @blur="onConfirm"
                />
                <div v-if="errors.cpf" class="text-danger">
                    {{ errors.telefone }}
                </div>
            </div>
            <div class="col form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    v-model="formData.email"
                    ref="email"
                    @blur="onConfirm"
                />
                <div v-if="errors.email" class="text-danger">
                    {{ errors.email }}
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
    nome: "form",
    props: ["pessoa", "isUpdate", "submitMethod", "errors"],
    components: {
        Multiselect
    },
    data() {
        return {
            formData: {
                nome: this.pessoa?.nome,
                nomeSocial: this.pessoa?.nomeSocial,
                cpf: this.pessoa?.cpf,
                nomePai: this.pessoa?.nomePai,
                nomeMae: this.pessoa?.nomeMae,
                telefone: this.pessoa?.telefone,
                email: this.pessoa?.email,
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
            const nome = this.$refs.nome.value;
            const nomeSocial = this.$refs.nomeSocial.value;
            const cpf = this.$refs.cpf.value;
            const nomePai = this.$refs.nomePai.value;
            const nomeMae = this.$refs.nomeMae.value;
            const telefone = this.$refs.telefone.value;
            const email = this.$refs.email.value;

            if (nome.length === 0){
                this.errors.nome = "Nome é obrigatório.";
                return false;
            }
            this.errors.nome = false;
            if (email.length === 0){
                this.errors.email = "Email é obrigatório.";
                return false;
            }
            this.errors.email = false;

            if (cpf.length < 11) {
                this.errors.cpf = "Digite um CPF válido.";
                return false;
            }
        
            return true;
        }
    }
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
<style scoped>

</style>
