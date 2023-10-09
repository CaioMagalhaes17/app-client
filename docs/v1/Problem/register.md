## Criar Problema

Esse Endpoint é responsável por criar um problema, para que posteriormente, receba um orçamento

```http
  POST client/problem/register
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `desc_problem`      | `string` | **Obrigatório**. Descrição do problema |
| `model_problem`      | `string` | **Obrigatório**. Modelo do celular |
| `brand_problem`      | `string` | **Obrigatório**. Marca do celular |
| `usage_time_problem`      | `string` | **Obrigatório**. Tempo de uso do celular em mm/yyyy - mm/yyyy|

**Códigos de retorno da Aplicação:**

| Código   | Causa       |
| :---------- | :--------- |
| `200`      | Problema Criado |
| `400`      | Parâmetros inválidos | 
| `401`      | Usuário Não autenticado ou usuário não tem permissão para realizar a ação|

