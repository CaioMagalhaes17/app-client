#  Documentação da API ao APP de orçamentos para concertos de celulares (cliente)

>## Recursos autenticados 

>Enviar o access_token durante as requisições através do parâmetro header, juntamente com o prefixo 'Authorization: Bearer '.
Rotas Autenticados terão o seguinte icon :lock:

>##### headers
- Accept application/json
- content-type application/json

- ### API 1.0

Icones:
- :lock: Rotas Autenticadas 
- :house: Rotas que não são necessárias autenticação
      - [:house: `Logar com Token`](./docs/v1/Auth/generateToken.md)
      - [:house: `Logar com Usuário e Senha`](./docs/v1/Auth/generateTokenByUserCredentials.md)
      - [:house: `Deslogar`](./docs/v1/Auth/generateTokenByUserCredentials.md)
      - [:house: `Registrar`](./docs/v1/Auth/generateTokenByUserCredentials.md)
- :coffee: Problemas
      - [:lock: `Criar problema`](./docs/v1/problem/register.md)
      - [:lock: `Editar problema`](./docs/v1/problem/edit.md)
      - [:lock: `Deletar problema`](./docs/v1/problem/delete.md)
      - [:lock: `Criar problema`](./docs/v1/problem/register.md)
      - [:lock: `Listar todos os problemas do usuário autenticado`](./docs/v1/problem/getAll.md)
      - [:lock: `Listar um problema`](./docs/v1/problem/getById.md)
  
- :coffee: Orçamentos
      - [:lock: `Aceitar um orçamento`](./docs/v1/budget/acceptBudget.md)
      - [:lock: `Listar um orçamento pelo Id do problema`](./docs/v1/budget/getByProblemId.md)
      - [:lock: `Listar todos orçamentos`](./docs/v1/budget/getAll.md)
      - [:lock: `Listar todos orçamentos aceitos ativos`](./docs/v1/budget/getAcceptedBudgets.md)

  
