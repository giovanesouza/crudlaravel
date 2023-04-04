<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // MÉTODOS

    // CREATE
    public function create(Request $request)
    {
        // post que será incluído no BD
        $new_post = [
            'title' => 'Meu primeiro post',
            'content' => 'Conteúdo qualquer',
            'author' => 'Giovane'
        ];


        // Forma mais convencional de criar um registro no banco
        // Instanciamento do Model
        //$post = new Post($new_post);
        //$post->save(); // salva os valores no BD


        // Outra forma
        $post = new Post();
        $post->title = 'Meu segundo post';
        $post->content = 'Conteúdo qualquer';
        $post->author = 'Souza';

        $post->save(); // salva os valores no BD


        dd($post); // Mostra os atributos com os seus respectivos valores (Exibe do model e não do BD)

    }


    // READ - Retorna um registro
    public function read(Request $r)
    {
        $post = new Post();

        $post = $post->find(2); // find() busca com base na chave primária

        //$posts = $post->all(); // Método All() pega todos os dados
        // $posts = $post->where(); // where() busca com base em algum dado específico
        // 

        // dd($post);
        return $post;

    }


    // READ - Retorna todos os registros
    public function all(Request $r)
    {

        // Método estático all, não precisa instanciar uma nova classe
        $posts = Post::all(); // Este código é uma forma abreviada de escrever o código abaixo

        /*
        $posts = new Post();
        $posts = $posts->all();
        */


        return $posts;

    }



    // Update
    public function update(Request $request)
    {

        // ATUALIZA 1 POST

        // Para fazer um Update é necessário inserir uma condição
        // $post = Post::find(1); // $post representa o objeto no banco que tem o id informado

        // $post->title = 'Meu post atualizado'; // Modifica o valor do título (porém não salva no banco)

        // $post->save(); // SAlva as alterações no BD

        // return $post;


        // ATUALIZA TODOS OS POSTS QUE ATENDENREM A CONDIÇÃO
        $posts = Post::where('id', '>', 0)->update([
            'author' => 'Desconhecido'
        ]); // Pega todos os registros e atualiza 
/*
Neste caso não precisa do método save()
para alterar mais dados -> separar cada atributo por vírgula
Ex.: 'author' => 'Desconhecido',
            'title' => 'alterado'

*/

        return $posts; // Retorna a qtd de registros afetados

    }


    // Delete
    public function delete(Request $request)
    {

        $post = Post::find(5); // Seleciona o registro a ser excluído

        // Se o registro existir => Exclui
        if ($post) {
            return $post->delete(); // Apaga o registro -> retorna a quantidade de itens excluídos
        }

        // Caso contrário, exibe msg abaixo
        return 'Não existe post com esse id';


        // EXCLUSÃO EM MASSA
        // $post = Post::where('id', '>', 0)->delete();
        //return $post;


    }



}