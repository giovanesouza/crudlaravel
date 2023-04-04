<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{

// ************** CONTROLLER DE RECURSOS DA APLICAÇÃO **************

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lista todos os posts
        $posts = Post::all();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Necessita de um formulário para enviar (método GET)

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
        
        
               return $post;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Recebe os datos do CREATE (método POST)

        // No futuro receberá um post com um novo recurso
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Igual a rota Read

        $post = new Post();

        $post = $post->find($id); // find() busca com base na chave primária | parâmetro passado

        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Exibe FORMULÁRIO de EDIÇÃO - Recebe id do registro
        $posts = Post::find($id)->update([
            'author' => 'Desconhecido'
        ]); // Pega todos os registros e atualiza 

        return $posts; // Retorna a qtd de registros afetados
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // ATUALIZA DE FATO O REGISTRO
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Equivale ao delete
                // EXCLUSÃO EM MASSA
        $post = Post::find($id)->delete();
        return $post;
    }
}
