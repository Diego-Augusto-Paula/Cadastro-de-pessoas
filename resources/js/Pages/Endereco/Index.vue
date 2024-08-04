<template>
    <guest>
        <template v-slot:header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pessoas
            </h2>
        </template>

        <div class="container-fluid">
            
            <div class="card flex h-screen justify-center mt-5">
                <div class="card-header">
                    <card-header
                        :create="route('pessoa.create')"
                        :searchMethod="search"
                    >
                    </card-header>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-secondary table-striped text-center">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Nome Social</th>
                            <th>CPF</th>
                            <th>Nome do Pai</th>
                            <th>Nome do Mãe</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Editar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            v-for="(pessoa, index) in pessoa?.data"
                            :key="pessoa.id"
                        >
                            <td>
                                {{ pessoa.nome }}
                            </td>
                            <td>
                                {{ pessoa.nomeSocial }}
                            </td>
                            <td>
                                {{ pessoa.cpf }}
                            </td>
                            <td>
                                {{ pessoa.nomePai }}
                            </td>
                            <td>
                                {{ pessoa.nomeMae }}
                            </td>
                            <td>
                                {{ pessoa.telefone }}
                            </td>
                            <td>
                                {{ pessoa.email }}
                            </td>

                            <td class="flex justify-center">
                                <Actions
                                 v-if="endereco?.id"
                                :editUrl="route('endereco.edit', pessoa.id, endereco?.id )"
                                >
                                </Actions>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <Paginator :paginator="users"> </Paginator>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>


    </guest>
</template>
<script>
import CardHeader from "@/Shared/CardHeader";
import Actions from "@/Shared/Actions";
import Paginator from "@/Components/Paginator";
import JetButton from "@/Shared/Button";

import { library } from "@fortawesome/fontawesome-svg-core";
import { faPen,  faBars } from "@fortawesome/free-solid-svg-icons";
import Guest from "@/Layouts/Guest.vue";
library.add(faPen,faBars);

export default {
    name: "index",
    props: ["pessoa"],
    data() {
        return {
        }
    },
    components: {
        CardHeader,
        Actions,
        Paginator,
        JetButton,
        Guest
    },
    methods: {
        search(param) {
            this.$inertia.replace(route("pessoa.index", { search: param }));
        }
    },
    computed:{
    }
};
</script>
