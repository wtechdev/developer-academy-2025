<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Log;

class PostController extends Controller
{
    const N_ELEMENT_PAGE = 10;

    /**
     * Mostra l'elenco dei post.
     * @return Renderable
     */
    public function index(): Renderable
    {
        $posts = Post::orderBy("created_at", "Desc")
            ->paginate(self::N_ELEMENT_PAGE);
        return view('post.index')->with([
            "posts" => $posts,
        ]);
    }

    /**
     * Mostra il form di creazione di un nuovo post.
     * @param  Request  $request
     * @return Renderable
     */
    public function create(Request $request): Renderable
    {
        $old = $request->old();

        $field = [
            "title" => "",
            "text" => "",
        ];
        $field = array_merge($field, $old);

        return view('post.create-edit')->with([
            "route" => "post.store",
            "azione" => "create",
            "campi" => $field,
        ]);
    }

    /**
     * Salva i dati del post ricevuti dal form.
     * @param  PostRequest  $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request): RedirectResponse
    {
        try {
            // Creo il post
            $post = Post::create([
                "title" => $request->title,
                "text" => $request->text,
                "date" => now(),
                "user_id" => auth()->user()->id,
            ]);
            // Recupero e inserisco l'immagine nella media gallery
            $filesImmagine = $request->file('image');
            $post->addMedia($filesImmagine)
                ->toMediaCollection('immagine', 'mediagallery');
            return back()->with("success", "Post creato con successo");
        } catch (Exception $error) {
            Log::error('Errore salvataggio post',
                [
                    'error' => $error->getMessage(),
                    'trace' => $error->getTraceAsString(),
                ]);
        }
        return back()->with("alert", "Errore creazione post");
    }

    /**
     * Mostra il singolo post.
     * @param  string  $id
     * @return Renderable
     */
    public function show(string $id): Renderable
    {
        $post = Post::findOrFail($id);
        return view('post.show')->with([
            "post" => $post,
        ]);
    }

    /**
     * Mostra il form di creazione di un nuovo post.
     * @param  string  $id
     * @param  Request  $request
     * @return Renderable
     */
    public function edit(string $id, Request $request): Renderable
    {
        $old = $request->old();

        $post = Post::find($id);
        if ($post === null) {
            $field = [
                "title" => "",
                "text" => "",
            ];
        } else {
            $field = [
                "title" => $post->title,
                "text" => $post->text,
            ];
        }

        $field = array_merge($field, $old);

        return view('post.create-edit')->with([
            "route" => "post.update",
            "azione" => "edit",
            "campi" => $field,
            "id_post" => $id,
            "post" => $post,
        ]);
    }

    /**
     * Modifica i dati del post ricevuti dal form
     * @param  PostRequest  $request
     * @param  string  $id
     * @return RedirectResponse
     */
    public function update(PostRequest $request, string $id): RedirectResponse
    {
        try {
            $post = Post::findOrFail($id);
            // Se il post NON ha un'immagine E non viene inviata una nuova immagine → ERRORE
            if (!$post->hasMedia('immagine') && !$request->hasFile('image')) {
                return back()->with("alert", "Inserire immagine");
            }
            $post->title = $request->title;
            $post->text = $request->text;
            $post->save();
            if ($request->hasFile('image')) {
                $filesImmagine = $request->file('image');
                $post->addMedia($filesImmagine)
                    ->toMediaCollection('immagine', 'mediagallery');
            }
            return back()->with("success", "Post modificato con successo");
        } catch (Exception $error) {
            Log::error('Errore modifica post',
                [
                    'error' => $error->getMessage(),
                    'trace' => $error->getTraceAsString(),
                ]);
        }
        return back()->with("alert", "Errore modifica post");
    }

    /**
     * Elimina il post con l'id passato
     * @param  string  $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $post = Post::findOrFail($id);
            if ($post->hasMedia('immagine')) {
                $media = $post->getFirstMedia('immagine');
                if ($media !== null) {
                    $media->delete();
                }
            }
            $post->delete();
            return back()->with("success", "Post eliminato con successo");
        } catch (Exception $error) {
            Log::error('Errore eliminazione post',
                [
                    'error' => $error->getMessage(),
                    'trace' => $error->getTraceAsString(),
                ]);
        }
        return back()->with("alert", "Errore eliminazione post");
    }
}
