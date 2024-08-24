
# Bootstrap no Laravel 10 com Vite

## Requisitos

- **Node.js**: É necessário ter o Node.js instalado. Quando o Node.js é instalado, o NPM também é instalado automaticamente.

## Estrutura de Arquivos

Todos os arquivos CSS e JS devem ser criados no diretório `resources`, localizado na raiz do projeto.

## Instalação das Dependências

Após a instalação do Laravel, execute o comando abaixo para instalar as dependências do Vite que estão listadas no arquivo `package.json`:

```bash
npm install
```

**Dica**: Evite importar o CSS dentro do arquivo JS para não causar lentidão.

## Instalação do Bootstrap

Instale o Bootstrap utilizando o comando:

```bash
npm i bootstrap
```

O Bootstrap será instalado no diretório `node_modules/bootstrap/dist`.

## Configuração do Vite

No arquivo `vite.config.js`, podemos criar apelidos (aliases) para os diretórios onde o Bootstrap e o diretório `resources` estão localizados. Veja a configuração no objeto `resolve`:

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],

    resolve: {
        alias: {
            "@": "/resources/js",
            '~bootstrap': path.resolve(__dirname, "node_modules/bootstrap/dist")
        }
    },
});
```

## Importações nos Arquivos JS e CSS

### JavaScript

No arquivo `app.js`, localizado em `resources/js/app.js`, você pode realizar as importações da seguinte maneira:

```javascript
import '@/bootstrap';
import '~bootstrap/js/bootstrap.bundle.min.js';
```

### CSS

No arquivo `app.css`, localizado em `resources/css/app.css`, você pode realizar as importações assim:

```css
@import url("~bootstrap/css/bootstrap.min.css");
```

## Teste em Modo de Desenvolvimento

Para testar em modo de desenvolvimento, insira o seguinte código no `<head>` do HTML da view master da aplicação para importar os recursos:

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

O Vite possui hot reload, ou seja, as alterações realizadas nos arquivos CSS e JS serão automaticamente atualizadas no navegador.

Para que o Vite funcione em modo de desenvolvimento, abra um terminal e execute o comando:

```bash
npm run dev
```

## Testando com Bootstrap

Crie uma view utilizando classes do Bootstrap para realizar os testes e verificar se os estilos estão sendo aplicados corretamente.

## Compilação para Produção

Quando estiver pronto para trabalhar em modo de produção, será necessário compilar os assets. Para isso, execute o comando abaixo, que irá compilar os assets para dentro da pasta `public`, na raiz do projeto:

```bash
npm run build
```

Após a compilação, altere a chamada dos assets na view. Por exemplo:

### Para CSS:

```html
<link rel="stylesheet" href="{{ asset('build/assets/app-5f3ded15.css') }}">
```

### Para JavaScript:

```html
<script src="{{ asset('build/assets/app-ba970431.js') }}"></script>
```

A função `asset()` retorna os arquivos do diretório `public`.
